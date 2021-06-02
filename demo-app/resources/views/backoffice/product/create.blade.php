@extends('.backoffice.layout_backoffice')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>

    <div class="card uper">
        <div class="card-header">
            Ajouter un produit
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

            <form method="post" action="{{ route('products.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="marque">Nom du produit</label>
                    <input type="text" class="form-control" name="name"/>
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
                    <input type="text" class="form-control" name="price"/>
                </div>
                <div class="form-group">
                    <label for="marque">Description</label>
                    <textarea type="text" class="form-control" name="description"></textarea>
                </div>
                <div class="form-group">
                    <label for="images">Images</label>
                    <input type="file" name="images[]" multiple class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Ajouter</button>
            </form>
        </div>
    </div>
@endsection
