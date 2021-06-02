<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Image;
use App\Models\ShippingType;
use App\Models\WarrantyType;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('front/product/list', compact('products'));
    }

    /**
     * Display a listing of the resource in admin context.
     *
     * @return \Illuminate\Http\Response
     */
    public function listAdmin() {
        $products = Product::all();
        return view('backoffice/product/list', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::all();
        $shippingRules = ShippingType::all();
        $warranties = WarrantyType::all();
        return view('backoffice/product/create', compact('brands', 'shippingRules', 'warranties'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required',
            'images' => 'required',
            'brand_id' => 'required',
            'shipping_type_id' => 'required',
            'warranty_type_id' => 'required',
        ]);

        $validatedData = array_merge($validatedData, ['created_at' => now()]);
        $product = Product::create($validatedData);

        if ($request->hasfile('images')) {
            $images = $request->file('images');

            foreach($images as $image) {
                $new_name = time()."_".strtolower($image->getClientOriginalName());
                $image->storeAs('uploads', $new_name, 'public');
                Image::create([
                    'filename' => $new_name,
                    'product_id' => $product->id
                ]);
            }
        }

        return redirect('/dashboard')->with('success', 'produit créer avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('front/product/show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $brands = Brand::all();
        $shippingRules = ShippingType::all();
        $warranties = WarrantyType::all();
        return view('backoffice/product/edit', compact('brands', 'shippingRules', 'warranties', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required',
            'brand_id' => 'required',
            'shipping_type_id' => 'required',
            'warranty_type_id' => 'required',
        ]);

        $validatedData = array_merge($validatedData, ['created_at' => now()]);
        $product->update($validatedData);
        $destroyImages = [];

        if ($request->get('remove') != null) {
            foreach ($request->get('remove') as $imageToRemove) {
                $destroyImages[] = $imageToRemove;
            }
            Image::destroy($destroyImages);
        }

        if ($request->hasfile('images')) {
            $images = $request->file('images');
            foreach($images as $image) {
                $new_name = time()."_".strtolower($image->getClientOriginalName());
                $image->storeAs('uploads', $new_name, 'public');
                Image::create([
                    'filename' => $new_name,
                    'product_id' => $product->id
                ]);
            }
        }
        return redirect('/dashboard')->with('success', 'produit mis à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);
        return redirect('/dashboard')->with('success', 'produit supprimé avec succès');
    }
}
