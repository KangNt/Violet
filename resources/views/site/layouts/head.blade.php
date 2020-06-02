<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Yoga Studio Template">
    <meta name="keywords" content="Yoga, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Violet | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset ('site/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset ('site/css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset ('site/css/nice-select.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset ('site/css/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset ('site/css/magnific-popup.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset ('site/css/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset ('site/css/style.css')}}" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <!-- <div id="preloder">
        <div class="loader"></div>
    </div> -->

    <!-- Search model -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search model end -->

    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="container-fluid">
            <div class="inner-header">
                <div class="logo">
                    <a href="/"><img src="{{ asset('site/img/logo.png')}}" alt=""></a>
                </div>
                <div class="header-right">
                    <img src="{{ asset('site/img/icons/search.png')}}" alt="" class="search-trigger" >
                    <img src="{{ asset('site/img/icons/man.png')}}" alt="" href="/profile">
                    <a href="/checkout">
                        <img src="{{ asset('site/img/icons/bag.png')}}" alt="">
                        <span>2</span>
                    </a>
                </div>
                <div class="user-access">
                    <a href="/register">Register</a>
                    <a href="/signIn" class="in">Sign in</a>
                </div>
                <nav class="main-menu mobile-menu">
                    <ul>
                        <li><a class="active" href="/">Home</a></li>
                        <li><a href="/categories">Categories</a>
                            <ul class="sub-menu">
                                <li><a href="/dresses">Dresses</a></li> 
                                <li><a href="/bags">Bags</a></li>
                                <li><a href="/shoes">Shoes</a></li>
                                <li><a href="/accesories">Accesories</a></li>
                                <li><a href="/shoppingCart">Shopping Card</a></li>
                                <li><a href="/checkout">Check out</a></li>
                            </ul>
                        </li>
                        <li><a href="/about">About</a></li>
                        <li><a href="/contacts">Contact</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>