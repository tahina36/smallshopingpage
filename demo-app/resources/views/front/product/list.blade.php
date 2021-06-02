@extends('.front.layout')

@section('breadcrumb')
    <li class="breadcrumb-item active"><a href="#">Accueil</a></li>
@endsection

@section('title_page')
    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h1 class="display-4">Liste des produits</h1>
        <p class="lead">Voici une liste de nos produits</p>
    </div>
@endsection

@section('content')
    <div class="card-deck mb-3 text-center">
        <div class="row">
            @foreach($products as $product)
                <div class="px-2">
                    <div class="card" style="width: 18rem;">
                        @if (count($product->images) > 0)
                            <img src="{{ route('file.display_uploaded_image', $product->images[0]->filename) }}" class="card-img-top" alt="Image {{ $product->name }}">
                        @endif
                        <div class="card-header">
                            <h4 class="my-0 font-weight-normal">{{ $product->name }}</h4>
                        </div>
                        <div class="card-body">
                            <h1 class="card-title pricing-card-title">{{ $product->price }}€</h1>
                            <a href="{{ route('products.show', $product) }}" type="button" class="btn btn-lg btn-block btn-outline-primary">Voir la fiche produit</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
