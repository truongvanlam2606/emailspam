<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
     <link rel="stylesheet" href="{{asset('css/style.css')}}" />
     <link rel="stylesheet" href="{{asset('css/reponsive.css')}}" />
     {{-- <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script> --}}
     @stack('head')
     @stack('css')
</head>

<body>
    @php
        $cart = Session::get('cart');
    @endphp
    @include('shop.carts.modal')
    <!-- header -->
    <header>
        <nav>
            <div class="content-nav w-70">
                <ul>
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li><a href="{{url('/')}}">Products</a></li>
                    <li><a href="{{url('/')}}">Contact</a></li>
                    <li><a href="{{url('/')}}">About</a></li>
                </ul>
                <form>
                    <input type="text" name="search" placeholder="Search product..." />
                    <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                </form>
            </div>
            <!-- The Modal -->
            <button id="cart" class="w-30">
                <i class="fa fa-shopping-basket" aria-hidden="true"> <span id="loadCartQty"> {{ $cart ? count($cart) : ''}}</span></i>
                    Carts
            </button>
        </nav>

    </header>
    <!-- content -->
    <section class="wrapper">

        @yield('content')

    </section>
    <!-- footer -->
    <footer>
        <div class="footer-item">
        </div>
    </footer>
    <!-- script -->

    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="{{asset('js/main.js')}}"></script>
    @stack('scripts')

</body>

</html>
