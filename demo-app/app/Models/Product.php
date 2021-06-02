<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'price', 'description', 'created_at', 'updated_at', 'brand_id', 'warranty_type_id', 'shipping_type_id'];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function ShippingType()
    {
        return $this->belongsTo(ShippingType::class);
    }

    public function WarrantyType()
    {
        return $this->belongsTo(WarrantyType::class);
    }

    public function Images()
    {
        return $this->hasMany(Image::class,);
    }
}
