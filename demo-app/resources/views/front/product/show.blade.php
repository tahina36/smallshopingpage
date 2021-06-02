@extends('.front.layout')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Accueil</a></li>
    <li class="breadcrumb-item active"><a href="#">{{ $product->name }}</a></li>
@endsection

@section('content')
    <div class="row">
        <div class="col-sm">
            @if (count($product->images) > 0)
                <div>
                    <img src="{{ route('file.display_uploaded_image', $product->images[0]->filename) }}" class="img-fluid main-product-image" alt="Image {{ $product->name }}">
                </div>
                <div class="row m-3">
                    @foreach($product->images as $image)
                        <div class="px-2">
                            <div class="product-thumbnails">
                                <img src="{{ route('file.display_uploaded_image', $image->filename) }}" class="img-thumbnail thumbnail-product" alt="Image {{ $loop->index }}">
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p>Aucune image disponible</p>
            @endif
        </div>
        <div class="col-sm">
            <div class="jumbotron jumbotron-product">
                <h1 class="display-4">{{ $product->name }}</h1>
                <div class="media">
                    <p class="align-self-end mr-3 brand-name">{{ $product->brand->name }}</p>
                    <div class="media-body">
                        <div class="row product-price-details">
                            <div class="col">
                                <i class="previous-price">35€</i>
                            </div>
                            <div class="col">
                                <p>{{ $product->price }}€</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Description</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="shipping-tab" data-toggle="tab" href="#shipping" role="tab" aria-controls="shipping" aria-selected="false">Livraison</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="warranty-tab" data-toggle="tab" href="#warranty" role="tab" aria-controls="warranty" aria-selected="false">Garantie & Paiement</a>
                    </li>
                </ul>
                <div class="tab-content tab-content-product p-3" id="myTabContent">
                    <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">{{ $product->description }}</div>
                    <div class="tab-pane fade" id="shipping" role="tabpanel" aria-labelledby="shipping-tab">{{ $product->shippingType->content }}</div>
                    <div class="tab-pane fade" id="warranty" role="tabpanel" aria-labelledby="warranty-tab">{{ $product->warrantyType->content }}</div>
                </div>
            </div>
            <div class="product-details-cart-actions">
                <span class="pqt-minus">-</span>
                <input id="quantity" type="number" min="1" value="1" max="99">
                <span class="pqt-plus">+</span>
                <button class="btn btn-outline-secondary" id="add-to-cart" data-name="{{ $product->name }}" data-image=@if (count($product->images) > 0){{ route('file.display_uploaded_image', $product->images[0]->filename) }}@else""@endif data-price="{{ $product->price }}">Ajouter au panier</button>
            </div>
        </div>
    </div>
@endsection
