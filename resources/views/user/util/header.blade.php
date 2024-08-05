<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/user/css/style.css">
    <!-- Add Font Awesome CDN link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        .navbar-brand img {
            height: 50px;
            width: auto;
        }

        .navbar-nav {
            display: flex;
            align-items: center;
        }

        .navbar-nav li {
            list-style: none;
            margin: 0 10px;
        }

        .navbar-nav li a {
            text-decoration: none;
            font-size: 17px;
        }

        .form-inline {
            display: flex;
            align-items: center;
        }

        .nav-item.active>a {
            color: red;
        }
    </style>
</head>

<body>
    <!-- header section starts -->
    <header class="header_section">
        <div class="container">
            <nav class="navbar navbar-expand-lg custom_nav-container ">
                <a class="navbar-brand" href="{{ url('/') }}"><img src="/user/images/logo.png" alt="Logo" /></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class=""> </span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item {{ request()->routeIs('redirect') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('redirect') }}">
                                <i class="fas fa-home"></i> Home <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        
                        <li class="nav-item {{ request()->routeIs('user.productsPage') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('user.productsPage') }}">
                                <i class="fas fa-tags"></i> Products
                            </a>
                        </li>
                        <li class="nav-item {{ request()->routeIs('user.cart') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('user.cart') }}">
                                <i class="fas fa-shopping-cart"></i> Cart
                            </a>
                        </li>

                        <li class="nav-item">
                            <x-app-layout>
                            </x-app-layout>
                        </li>

                        <li>
                            <form class="form-inline">
                                <button class="btn my-2 my-sm-0 nav_search-btn" type="submit">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <!-- end header section -->
</body>

</html>
