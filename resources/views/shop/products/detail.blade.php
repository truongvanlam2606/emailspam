@extends('shop.layouts.layout')
@section('title', __("Home"))
@section('content')
@push('css')
<style>

    /*****************globals*************/
    body {
    font-family: 'open sans';
    overflow-x: hidden; }

    img {
    max-width: 100%; }

    .preview {
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -webkit-flex-direction: column;
        -ms-flex-direction: column;
            flex-direction: column; }
    @media screen and (max-width: 996px) {
        .preview {
        margin-bottom: 20px; } }

    .preview-pic {
    -webkit-box-flex: 1;
    -webkit-flex-grow: 1;
        -ms-flex-positive: 1;
            flex-grow: 1; }

    .preview-thumbnail.nav-tabs {
    border: none;
    margin-top: 15px; }
    .preview-thumbnail.nav-tabs li {
        width: 18%;
        margin-right: 2.5%; }
        .preview-thumbnail.nav-tabs li img {
        max-width: 100%;
        display: block; }
        .preview-thumbnail.nav-tabs li a {
        padding: 0;
        margin: 0; }
        .preview-thumbnail.nav-tabs li:last-of-type {
        margin-right: 0; }

    .tab-content {
    overflow: hidden; }
    .tab-content img {
        width: 100%;
        -webkit-animation-name: opacity;
                animation-name: opacity;
        -webkit-animation-duration: .3s;
                animation-duration: .3s; }

    .card {
    margin-top: 50px;
    background: #eee;
    padding: 3em;
    line-height: 1.5em; }

    @media screen and (min-width: 997px) {
    .wrapper {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex; } }

    .details {
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -webkit-flex-direction: column;
        -ms-flex-direction: column;
            flex-direction: column; }

    .colors {
    -webkit-box-flex: 1;
    -webkit-flex-grow: 1;
        -ms-flex-positive: 1;
            flex-grow: 1; }

    .product-title, .price, .sizes, .colors {
    text-transform: UPPERCASE;
    font-weight: bold; }

    .checked, .price span {
    color: #ff9f1a; }

    .product-title, .rating, .product-description, .price, .vote, .sizes {
    margin-bottom: 15px; }

    .product-title {
    margin-top: 0; }

    .size {
    margin-right: 10px; }
    .size:first-of-type {
        margin-left: 40px; }

    .color {
    display: inline-block;
    vertical-align: middle;
    margin-right: 10px;
    height: 2em;
    width: 2em;
    border-radius: 2px; }
    .color:first-of-type {
        margin-left: 20px; }

    .add-to-cart, .like {
    background: #ff9f1a;
    padding: 1.2em 1.5em;
    border: none;
    text-transform: UPPERCASE;
    font-weight: bold;
    color: #fff;
    -webkit-transition: background .3s ease;
            transition: background .3s ease; }
    .add-to-cart:hover, .like:hover {
        background: #b36800;
        color: #fff; }

    .not-available {
    text-align: center;
    line-height: 2em; }
    .not-available:before {
        font-family: fontawesome;
        content: "\f00d";
        color: #fff; }

    .orange {
    background: #ff9f1a; }

    .green {
    background: #85ad00; }

    .blue {
    background: #0076ad; }

    .tooltip-inner {
    padding: 1.3em; }

    @-webkit-keyframes opacity {
    0% {
        opacity: 0;
        -webkit-transform: scale(3);
                transform: scale(3); }
    100% {
        opacity: 1;
        -webkit-transform: scale(1);
                transform: scale(1); } }

    @keyframes opacity {
    0% {
        opacity: 0;
        -webkit-transform: scale(3);
                transform: scale(3); }
    100% {
        opacity: 1;
        -webkit-transform: scale(1);
                transform: scale(1); } }

    /*# sourceMappingURL=style.css.map */

    .tab-wrapper{
        /* border: solid 1px #ff9f1a; */

        border: 1px solid rgba(0,0,0,.125);
        border-radius: 0.25rem;
    }
    .tab-wrapper ul{
        overflow: hidden;
        background: #ff9f1a;
        margin: 0px;
        padding: 0px;
    }
    .tab-wrapper ul li{
        float: left;
        list-style: none;
        padding: 10px 20px;
        background: #348ec9;
        margin-right: 5px;
        margin-top: 5px;
    }
    .tab-wrapper ul li.active{
        background: #Fff;
    }
    .tab-wrapper ul li.active a{
        color: blue;
    }
    .tab-wrapper ul li a{
        color: #fff;
        text-transform: uppercase;
        text-decoration: none;
    }
    .tab-content{
        padding: 20px;
        min-height: 300px
    }
    .tab-item{
        display: none;
    }

</style>

@endpush

<div class="container">
    <div class="card">
        <div class="container-fliud">
            <div class="wrapper row">
                <div class="preview col-md-6">
                    <div class="preview-pic tab-content slick-images">


                        @if ($product->images->isNotEmpty())
                            @foreach ($product->images as $image)
                                <div class="tab-pane" id="pic-5">
                                    <img src="{{asset('storage/' .$image->path)}}" alt="{{$image->name}}"/>
                                </div>

                            @endforeach
                        @else
                            <div class="tab-pane" id="pic-5">
                                <img src="https://via.placeholder.com/600" />
                            </div>
                        @endif

                    </div>
                </div>
                <div class="details col-md-6">
                    <h3 class="product-title">{{$product->name}}</h3>
                    <div class="rating">
                        <div class="stars">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                        </div>
                        <span class="review-no">41 reviews</span>
                    </div>
                    <p class="product-description">
                        {!! $product->description !!}
                    </p>
                    <h4 class="price">Price: <span> {{$product->price }} USD</span></h4>
                    <div class="action">
                        <button class="add-to-cart btn btn-default addProductToCart" data-productId="{{$product->id}}" type="button">add to cart</button>
                        <button class="like btn btn-default" type="button"><span class="fa fa-heart"></span></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="tab-wrapper">
        <ul class="tab" style="background:#ff9f1a">
            <li>
                <a href="#tab-main-info">Description</a>
            </li>
            <li>
                <a href="#tab-image">Devile</a>
            </li>
            <li>
                <a href="#tab-seo">Warranty</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-item" id="tab-main-info">
               <p> {!! $product->description !!} </p>
            </div>
            <div class="tab-item" id="tab-image">
                <p> {!! $product->delivery !!}</p>
            </div>
            <div class="tab-item" id="tab-seo">
                <p>{!! $product->warranty_info !!}</p>
            </div>
        </div>
    </div>


</div>
@endsection

@push('scripts')
  <script>
    jQuery(document).ready(function($)
    {

        function activeTab(obj)
        {
            $('.tab-wrapper ul li').removeClass('active');
            $(obj).addClass('active');
            var id = $(obj).find('a').attr('href');
            $('.tab-item').hide();
            $(id) .show();
        }

        $('.tab li').click(function(){
            activeTab(this);
            return false;
        });

        activeTab($('.tab li:first-child'));
    });

    </script>
@endpush

