<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Demo rue du commerce - accueil</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <link href="{{ asset('css/front.css') }}" rel="stylesheet">
</head>
<body>
<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
    <a href="{{ route('welcome') }}" class="my-0 mr-md-auto">
        <img src="{{ asset('/assets/images/logo.png') }}" alt="logo" class="logo">
    </a>
    <a class="btn btn-outline-primary" href="{{ route('products.index') }}" >Accès Back-Office</a>
    <nav class="my-2 my-md-0 mr-md-3">
        <div class="dropdown">
            <button type="button" class="btn btn-info" data-toggle="dropdown">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i> Panier <span class="badge badge-pill badge-danger product-quantity-total hidden">0</span>
            </button>
            <div class="dropdown-menu">
                <div class="row total-header-section">
                    <div class="col-lg-6 col-sm-6 col-6">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="badge badge-pill badge-danger product-quantity-total hidden">0 produits</span>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-6 total-section text-right">
                        <p>Total: <span class="text-info product-total-price">0€</span></p>
                    </div>
                </div>
                <div id="cart-product-list">
                </div>
                <div class="row">
                    <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                        <button class="btn btn-primary btn-block">Commander</button>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!--
    <a class="btn btn-outline-primary" href="#">Sign up</a>
    -->
</div>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        @yield('breadcrumb')
    </ol>
</nav>
@yield('title_page')
<div class="container-fluid">
    @yield('content')
</div>
<script src="{{ asset('js/app.js')}}"></script>
</body>
</html>
