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
                <a class="nav-link active" href="{{ route('guestCategory') }}">
                    <span class="h3">Categories</span>
                </a>
            </li>

            <!--PopularTab-->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('guestPopular') }}">
                    <span class="h3">Popular</span>
                </a>
            </li>

            <!--add recipe-->
            <li class="nav-item">
                <a class="nav-link" href="">
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

<div class="tab-content">
    <!--about-->
    <div class="tab-content" id="aboutContent">

        <div class="tab-pane active" id="aboutTabPane" role="tabpanel" aria-labelledby="about-tab" tabindex="0">

            <div class="container-fluid">

                <div class="row text-center my-3">

                    <h1 class="display-2">We are the Pahiyas Palate!</h1>

                    <div class="row text-center my-2">

                        <h3 class="display-6 fs-2">
                            Welcome to Pahiyas Palate, the passionate team behind Pinoy Specials, your ultimate guide to exploring the rich and diverse flavors of Filipino cuisine!
                            At Pahiyas Palate, we're dedicated to celebrating the culinary heritage of the Philippines, offering you a tantalizing journey through the vibrant tapestry of Pinoy flavors.
                            Our team is fueled by a love for Filipino food and a commitment to sharing its stories with the world
                        </h3>
                    </div>
                </div>

                <!--team profile-->
                <div class="container">
                    <div class="row py-3 g-3">

                        <div class="col-xl-2 col-lg-4 col-md-4 col-sm-6 mx-auto">
                            <div class="shadow-lg py-3 profile" style="background-color: #f7b87e;">
                                <div class="card h-100 px-3" style="background-color:#f7b87e; border:none;">
                                    <div class="card-img">
                                        <img src="{{asset('img/devs/mara.jpg')}}" class="card-img-top img-fluid rounded-circle" alt="Profile Image">
                                    </div>
                                    <div class="card-body mt-2" style="background-color: antiquewhite; border-radius: 20px;">
                                        <h4 class="card-title">Mara Louise T. Pulicay</h4>
                                        <div class="card-text">
                                            <span>Role</span><br>
                                            <span>Location</span>
                                        </div>
                                        <div class="card-footer">
                                            icons
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-2 col-lg-4 col-md-4 col-sm-6 mx-auto">
                            <div class="shadow-lg py-3 profile" style="background-color: #f7b87e;">
                                <div class="card h-100 px-3" style="background-color:#f7b87e; border:none;">
                                    <div class="card-img">
                                        <img src="{{asset('img/devs/mara.jpg')}}" class="card-img-top img-fluid rounded-circle" alt="Profile Image">
                                    </div>
                                    <div class="card-body mt-2" style="background-color: antiquewhite; border-radius: 20px;">
                                        <h4 class="card-title">Mara Louise T. Pulicay</h4>
                                        <div class="card-text">
                                            <span>Role</span><br>
                                            <span>Location</span>
                                        </div>
                                        <div class="card-footer">
                                            icons
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-2 col-lg-4 col-md-4 col-sm-6 mx-auto">
                            <div class="shadow-lg py-3 profile" style="background-color: #f7b87e;">
                                <div class="card h-100 px-3" style="background-color:#f7b87e; border:none;">
                                    <div class="card-img">
                                        <img src="{{asset('img/devs/mara.jpg')}}" class="card-img-top img-fluid rounded-circle" alt="Profile Image">
                                    </div>
                                    <div class="card-body mt-2" style="background-color: antiquewhite; border-radius: 20px;">
                                        <h4 class="card-title">Mara Louise T. Pulicay</h4>
                                        <div class="card-text">
                                            <span>Role</span><br>
                                            <span>Location</span>
                                        </div>
                                        <div class="card-footer">
                                            icons
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-2 col-lg-4 col-md-4 col-sm-6 mx-auto">
                            <div class="shadow-lg py-3 profile" style="background-color: #f7b87e;">
                                <div class="card h-100 px-3" style="background-color:#f7b87e; border:none;">
                                    <div class="card-img">
                                        <img src="{{asset('img/devs/mara.jpg')}}" class="card-img-top img-fluid rounded-circle" alt="Profile Image">
                                    </div>
                                    <div class="card-body mt-2" style="background-color: antiquewhite; border-radius: 20px;">
                                        <h4 class="card-title">Mara Louise T. Pulicay</h4>
                                        <div class="card-text">
                                            <span>Role</span><br>
                                            <span>Location</span>
                                        </div>
                                        <div class="card-footer">
                                            icons
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-2 col-lg-4 col-md-4 col-sm-6 mx-auto">
                            <div class="shadow-lg py-3 profile" style="background-color: #f7b87e;">
                                <div class="card h-100 px-3" style="background-color:#f7b87e; border:none;">
                                    <div class="card-img">
                                        <img src="{{asset('img/devs/mara.jpg')}}" class="card-img-top img-fluid rounded-circle" alt="Profile Image">
                                    </div>
                                    <div class="card-body mt-2" style="background-color: antiquewhite; border-radius: 20px;">
                                        <h4 class="card-title">Mara Louise T. Pulicay</h4>
                                        <div class="card-text">
                                            <span>Role</span><br>
                                            <span>Location</span>
                                        </div>
                                        <div class="card-footer">
                                            icons
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
