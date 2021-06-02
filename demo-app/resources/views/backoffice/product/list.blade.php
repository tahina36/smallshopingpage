@extends('.backoffice.layout_backoffice')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>

    <div class="card uper">
        <div class="card-header">
            Liste des produits
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Nom</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            @if (count($product->images) > 0)
                                <td>{{ $product->images[0]->filename }}</td>
                            @else
                                <td></td>
                            @endif
                            <td>
                                <a href="{{ route('products.edit', ['product' => $product]) }}" class="btn btn-info">Modifier</a>
                                <a href="{{ route('products.remove', ['id' => $product->id]) }}" class="btn btn-danger">Supprimer</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <a href="{{ route('products.create') }}" class="btn btn-dark">Ajouter une marque</a>
                <a href="{{ route('products.create') }}" class="btn btn-success">Ajouter un produit</a>
            </div>
        </div>
    </div>

@endsection
