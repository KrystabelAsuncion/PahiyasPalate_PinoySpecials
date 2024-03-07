@extends('Auth.layout')
@section('content')

<nav class="navbar navbar-expand-lg sticky-top" style="background: #f7b87e;">
    <a href="#" class="navbar-brand">
        <img src="img/logo_ic/logo11.png" width="50" class="img-fluid px-2 mx-2">
        <span class="fw-bold h4">Pinoy Specials</span>
    </a>
    <button class="navbar-toggler mx-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon p-3"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
        <ul class="navbar-nav nav-underline d-flex justify-content-sm-center">
            <!--hometab-->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('guest-dashboard') }}">
                    <span class="h3">Home</span>
                </a>
            </li>
            <!--categories-->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('guestCategory') }}">
                    <span class="h3">Categories</span>
                </a>
            </li>

            <!--PopularTab-->
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('guestPopular') }}">
                    <span class="h3">Popular</span>
                </a>
            </li>

            <!--add recipe-->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('addrecipe') }}">
                    <span class="h3">Make Recipe</span>
                </a>
            </li>

            <!--AboutTab-->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('about') }}">
                    <span class="h3">About us</span>
                </a>
            </li>

            <!--contactTab-->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('contact') }}">
                    <span class="h3">Contact us</span>
                </a>
            </li>

            <!--Profile-->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('profile') }}">
                    <span class="h3 ms-2">{{$username}}</span>
                </a>
            </li>

        </ul>
    </div>
</nav>

@endsection
