@extends('Auth.layout')

@section('content')

<!--HEADER-->
<header>
    <div class="row" style="background-color: #5A352C; color: white;">
        <div class="col-md-6">
            <a href="#" class="navbar-brand">
                <img src="img/logo 1.png" alt="PS_logo" width="90" heigt="80" class="img-fluid d-inline-block align-text-center">
                <strong class="text-uppercase fw-bold h3">Pinoy Specials</strong>
            </a>
        </div>
    </div>

    <!--Navbar-->
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: rgba(236, 167, 102, 0.50);">
        <div class="container-fluid justify-content-between">

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav nav-underline flex-row" role="tablist" id="Tabs">

                    <li class="nav-item me-2 me-lg-0 active" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#homeTabPane" type="button" role="tab" aria-controls="homeTabPane" aria-selected="true">
                            <span class="h4">Home</span>
                        </button>
                    </li>

                    <li class="nav-item me-2 me-lg-0 dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <span class="h4">Categories</span><span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">C1</a></li>
                            <li><a class="dropdown-item" href="#">C2</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">C3</a></li>
                        </ul>
                    </li>

                    <li class="nav-item me-2 me-lg-0 active" role="presentation">
                        <button class="nav-link" id="popular-tab" data-bs-toggle="tab" data-bs-target="#popularTabPane" type="button" role="tab" aria-controls="popularTabPane" aria-selected="true">
                            <span class="h4">Popular Dishes</span>
                        </button>
                    </li>

                    <li class="nav-item me-2 me-lg-0 active" role="presentation">
                        <button class="nav-link" id="pabout-tab" data-bs-toggle="tab" data-bs-target="#aboutTabPane" type="button" role="tab" aria-controls="aboutTabPane" aria-selected="true">
                            <span class="h4">About Us</span>
                        </button>
                    </li>

                    <li class="nav-item me-2 me-lg-0 active" role="presentation">
                        <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contactTabPane" type="button" role="tab" aria-controls="contactTabPane" aria-selected="true">
                            <span class="h4">Contact Us</span>
                        </button>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="" class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ $username}}
                        </a>
                        <ul class="dropdown-menu">
                        <li><a href="{{route('logout')}} " onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                            class="drodown-item fw-bold"
                            style="text-decoration: none; color:black;">
                            Log out</a></li>
                            <form id="logout-form" action="{{route('logout')}}" method="POST">
                                @csrf
                            </form>
                        </ul>
                    </li>
                </ul>
            </div>

        </div>
    </nav>

</header>

<!--Home Content-->
<div class="tab-content" id="homeContent" style="background-image: url(''); background-color: #FEE9D6;">
    <div class="tab-pane fade show active" id="homeTabPane" role="tabpanel"
    aria-labelledby="home-tab" tabindex="0">

        <div class="container">

            <div class="row justify-content-center text-uppercase fw-bold display-2 p-4">
                Welcome to pinoy specials
            </div>

            <div class="row m-3 mt-5">
                <div class="col justify-content-center">
                    <img src="img/LOGO.png" alt="" class="img-fluid d-none d-md-block" width="300px" height="350px">
                </div>
                <div class="col-8 justify-content-center m-5 text-center">
                    <span class="h2 lh-base">
                        Welcome to Pinoy Specials, your ultimate destination for
                        unlocking the rich and diverse world of Filipino cuisine!
                        Our user user-friendly website and application are meticulously
                        crafted to ignite and guide your passion for cooking, bringing
                        the heart of the Philippines right to your kitchen.
                    </span>
                </div>
            </div>

            <div class="row m-6 p-5 mt-5 justify-content-center">
                <span class="display-6 fs-2 text-center lh-base d-none d-md-block">
                    Whether you’re a Filipino Cuisine connoisseur or just beggining to explore
                    its wonders, Pinoy Specials is here to accompany you a flavorful journey.
                    Elevate your cooking experience, celebrate the rich tapestry of Filipino flavors,
                    and make every meal a memorable one with Pinoy Specials- where passion meets plate!
                </span>
            </div>
        </div>

        <hr class="mt-5 mx-auto" style="width: 85%; border-width: 3px;">

        <div class="container shadow-lg mx-auto p-5 mt-5" style="background-color: rgba(236, 167, 102, 0.50); border-radius: 50px;">
            <div class="row justify-content-center" >
                <div class="col justify-content-center col-lg-4 col-md-6 col-sm-12 mb-4">
                    <div class="card mx-auto" style="width: 25rem; background-color: rgba(236, 167, 102, 0.05); border: 0;">
                        <img src="img/book.jpeg" class="rounded-circle card-img" alt="" width="250px" height="300px">
                        <div class="card-body text-center">
                            <div class="card-text">
                                <span class="h1">Embark on a delicious and flavorful dishes.</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col justify-content-center">
                    <div class="card mx-auto" style="width: 25rem; background-color: rgba(236, 167, 102, 0.05); border: 0;">
                        <img src="img/chef.jpeg" class="rounded-circle card-img" alt="" width="300px" height="300px">
                        <div class="card-body text-center">
                            <div class="card-text">
                                <span class="h1">Discover Filipino Wonders</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col justify-content-center">
                    <div class="card mx-auto" style="width: 25rem; background-color: rgba(236, 167, 102, 0.05); border: 0;">
                        <img src="img/bookmark.jpeg" class="rounded-circle card-img" alt="" width="250px" height="300px">
                        <div class="card-body text-center">
                            <div class="card-text">
                                <span class="h1">Save your favorite recipes.</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr class="mt-5 mx-auto" style="width: 85%; border-width: 3px;">

        <div class="container my-5 text-center">

            <div class="row">
                <div class="row justify-content-center text-uppercase fw-bold display-2 p-4">
                    Meet the Filipino chefs!
                </div>

                <div class="row my-3 p-3">
                    <span class="display-6 my-1 text-uppercase">
                        Explore the famous Filipino Chefs who have mastered the art of creating their mouth watering dishes.
                    </span>
                </div>
            </div>
        </div>

        <div class="container shadow-lg mx-auto p-5 mt-5" style="background-color: rgba(236, 167, 102, 0.50); border-radius: 250px;">
            <div class="row align-items-center">

                <div class="col-4 my-auto">
                    <div class="card" style="width: 40rem; background: none; border: none;">
                        <img src="img/Claude tayag.png" class="img-fluid card-img-center m-3" alt="" width="400px" height="500px">
                    </div>
                </div>

                <div class="col-4">
                    <span class="display-5 fw-bold">Claude Tayag</span>
                    <div class="card" style="width: 40rem; background: none; border: none;">
                        <div class="card-body">
                            <div class="card-text fs-3 p-4">
                                Chef Tayag is renowned for his innovative take on Filipino cuisine.
                                One of his notable dishes is Kambingan,
                                showcasing his creativity in preparing goat meat.
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-3">
                    <div class="card align-items-center" style="width: 30rem; background: none; border: none;">
                        <img src="img/Claude.JPG" class="img-fluid card-img-center rounded-circle mb-5" alt="" width="250px" height="500px">
                        <button style="width: 15rem;" class="btn btn-outline-secondary" type="button">click here</button>
                    </div>
                </div>
            </div>

        </div>

        <div class="container shadow-lg mx-auto p-5 mt-5" style="background-color: rgba(236, 167, 102, 0.50); border-radius: 250px;">
            <div class="row align-items-center">

                <div class="col-4 my-auto">
                    <div class="card" style="width: 40rem; background: none; border: none;">
                        <img src="img/chef_logro.png" class="img-fluid card-img-center rounded-circle m-3" alt="" width="400px" height="500px">
                    </div>
                </div>

                <div class="col-4">
                    <span class="display-5 fw-bold">Pablo "Boy" Logro</span>
                    <div class="card" style="width: 40rem; background: none; border: none;">
                        <div class="card-body">
                            <div class="card-text fs-3 p-4">
                                Chef Pablo "Boy" Logro is a well-known Filipino chef who gained fame through his
                                culinary expertise and television appearances. Chef Boy Logro is associated with various Filipino dishes,
                                and one of his famous dishes is "Lechon Belly."
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-3">
                    <div class="card align-items-center" style="width: 30rem; background: none; border: none;">
                        <img src="img/Claude.JPG" class="img-fluid card-img-center rounded-circle mb-5" alt="" width="250px" height="500px">
                        <button style="width: 15rem;" class="btn btn-outline-secondary" type="button">click here</button>
                    </div>
                </div>
            </div>

        </div>




    </div>
</div>

<!--popular contents-->
<div class="tab-content" id="popularContent">
    <div class="tab-pane fade active" id="popularTabPane" role="tabpanel"
    aria-labelledby="popular-tab" tabindex="0">

        popular contents
    </div>
</div>

<div class="tab-content" id="aboutContent">
    <div class="tab-pane fade active" id="aboutTabPane" role="tabpanel"
    aria-labelledby="about-tab" tabindex="0">
        About Us is clicked
    </div>
</div>

<div class="tab-content" id="contactContent">
    <div class="tab-pane fade active" id="contactTabPane" role="tabpanel"
    aria-labelledby="contact-tab" tabindex="0">
        Contact us is clicked
    </div>
</div>
