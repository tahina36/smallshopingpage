@extends('.backoffice.layout_backoffice')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>

    <div class="card uper">
        <div class="card-header">
            Mettre à jour un produit
        </div>

        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif

            <form method="post" action="{{ route('products.update', $product) }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="marque">Nom du produit</label>
                    <input type="text" class="form-control" name="name" value="{{ $product->name }}"/>
                </div>

                <div class="form-group">
                    <label for="prix">Marque :</label>
                    <div class="select">
                        <select class="form-control" name="brand_id">
                            @foreach($brands as $brand)
                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="prix">Politique de livraison :</label>
                    <div class="select">
                        <select class="form-control" name="shipping_type_id">
                            @foreach($shippingRules as $shippingRule)
                                <option value="{{ $shippingRule->id }}">{{ $shippingRule->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="prix">Politique de garantie :</label>
                    <div class="select">
                        <select class="form-control" name="warranty_type_id">
                            @foreach($warranties as $warranty)
                                <option value="{{ $warranty->id }}">{{ $warranty->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="prix">Prix :</label>
                    <input type="text" class="form-control" name="price" value="{{ $product->price }}"/>
                </div>
                <div class="form-group">
                    <label for="marque">Description</label>
                    <textarea type="text" class="form-control" name="description">{{ $product->description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="images">Ajouter des images</label>
                    <input type="file" name="images[]" multiple class="form-control">
                </div>
                <div class="form-group">
                    <h2>Images du produit</h2>
                    <div class="row">
                        @foreach($product->images as $image)
                            <div class="px-2">
                                <div class="card" style="width: 18rem;">
                                    <img src="{{ route('file.display_uploaded_image', $image->filename) }}" class="card-img-top" alt="Image {{ $loop->index }}">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $image->filename }}</h5>
                                        <input type="checkbox" name="remove[]" value="{{ $image->id }}">
                                        <label>Supprimer cette image</label><br/><br/>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="px-2">
                    <button type="submit" class="btn btn-primary">Mettre à jour le produit</button>
                    <a href="{{ route('products.remove', ['id' => $product->id]) }}" class="btn btn-danger">Supprimer ce produit</a>
                </div>
            </form>
        </div>
    </div>
@endsection
