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
        <ul class="navbar-nav nav-underline d-flex flex-row justify-content-sm-center">
            <!--hometab-->
            <li class="nav-item active">
                <a class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#homeTabPane" role="tab" aria-controls="homeTabPane" aria-selected="true">
                    <span class="h3">Home</span>
                </a>
            </li>
            <!--categories-->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('category') }}">
                    <span class="h3">Categories</span>
                </a>
            </li>

            <!--PopularTab-->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('popular') }}">
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
                    <img src="{{ asset(Auth::user()->profile_image) }}" alt="Profile Image" class="rounded-circle" style="width: 30px; height: 30px; object-fit: cover;">
                    <span class="h3 ms-2">{{Auth::user()->username}}</span>
                </a>
            </li>

        </ul>
    </div>
</nav>

<div class="tab-content">

    <!--home-->
    <div class="tab-content" id="homeContent">

        <div class="tab-pane fade show active" id="homeTabPane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">

            <div class="container-fluid px-4">

                <div class="row text-center my-4">
                    <span class="display-1 text-uppercase fw-bold">
                        Welcome to pinoy specials
                    </span>
                </div>

                <div class="row">

                    <div class="col-lg-3 p-4 text-center">
                        <img src="img/logo_ic/LOGO.png" class="img-fluid  d-none d-lg-block" style="width: 310px;">
                    </div>

                    <div class="col d-flex align-items-center text-center" style="font-weight: normal;">
                        <h2 class="display-5">Welcome to Pinoy Specials, your ultimate destination for
                            unlocking the rich and diverse world of Filipino cuisine!
                            Our user user-friendly website and application are meticulously
                            crafted to ignite and guide your passion for cooking, bringing
                            the heart of the Philippines right to your kitchen.</h2>
                    </div>
                </div>

                <div class="row text-center my-4">
                    <span class="display-6 fs-21 my-auto">
                        Whether you’re a Filipino Cuisine connoisseur or just beggining to explore
                    its wonders, Pinoy Specials is here to accompany you a flavorful journey.
                    Elevate your cooking experience, celebrate the rich tapestry of Filipino flavors,
                    and make every meal a memorable one with Pinoy Specials- where passion meets plate!
                    </span>
                </div>

                <hr class="my-4 mx-auto" style="width: 85%; border-width: 3px;">

                <div class="row gy-3 mx-3">

                    <div class="col-lg-3 col-sm-7 mx-auto text-center py-3" style="border-radius: 40px; background-color: #eca766a5;">
                        <img src="img/logo_ic/book.jpeg" class="rounded-circle img-fluid" width="300px" height="300px">
                        <span class="display-5 mx-auto p-1">Embark on a delicious and flavorful dishes.</span>
                    </div>

                    <div class="col-lg-3 col-sm-7 mx-auto text-center py-3" style="border-radius: 40px; background-color: #eca766a5;">
                        <img src="img/logo_ic/chef.jpeg" class="rounded-circle img-fluid" width="300px" height="300px">
                        <span class="display-5 mx-auto p-1">Discover Filipino Wonders.</span>
                    </div>

                    <div class="col-lg-3 col-sm-7 mx-auto text-center py-3" style="border-radius: 40px; background-color: #eca766a5;">
                        <img src="img/logo_ic/book.jpeg" class="rounded-circle img-fluid" width="300px" height="300px">
                        <span class="display-5 mx-auto p-1">Save your favorite recipes.</span>
                    </div>
                </div>

                <hr class="my-4 mx-auto" style="width: 85%; border-width: 3px;">

                <div class="row text-center">
                    <span class="text-uppercase display-2 fw-bold">Meet the Filipino chefs!</span>
                    <div class="row">
                        <span class="text-uppercase display-5 p-5">Explore the famous Filipino Chefs who have mastered the art of creating their mouth watering dishes.</span>
                    </div>
                </div>

                <!--claudetayag-->
                <div class="row mt-5 shadow-lg p-5 mx-5 claude" style="border-radius: 70px; background-color: #f7c699b7;">

                    <div class="col col-sm-8 col-md-11 col-lg-3">
                        <img src="img/chef/CLAUDETAYAG.png" class="img-fluid d-block" style="max-width: 325px">
                    </div>

                    <div class="col col-lg-5 align-self-center text-center">
                        <span class="display-3 fw-bold text-sm-center">Claude Tayag</span>
                        <div class="row display-6 fs-2 p-5 d-none d-md-none d-lg-block">
                            Chef Tayag is renowned for his innovative take on Filipino cuisine.
                            One of his notable dishes is Kambingan,
                            showcasing his creativity in preparing goat meat.
                        </div>
                    </div>

                    <div class="col col-md-4 d-none d-md-none d-lg-block">
                        <div class="card shadow align-items-center p-5 mt-4 imgcard"
                        style="width: 30rem; background: #FEE9D6; border: none; border-radius: 50px;"
                        data-bs-toggle="popover" data-bs-trigger="hover" data-bs-html="true" data-bs-placement="left"
                        data-bs-content="<div class='card text-center'><div class='card-header'>
                            <img src='img/foods/kambingan.JPG' class='img-fluid rounded-circle card-img-center' width='200'><h1>KAMBINGAN</h1></div>
                            <div class='card-body'><h5>Kambingan by Claude Tayag offers a savory twist to goat meat, featuring bold flavors
                                and traditional Filipino spices, crafted with Chef Tayag's culinary finesse.</h5></div></div>">

                            <img src="img/foods/kambingan.JPG" class="img-fluid rounded-circle card-img-center" width="250">
                            <span class="mt-4 h2">Kambingan</span>
                        </div>
                    </div>
                </div>

                <!--logro-->
                <div class="row mt-5 shadow-lg mx-5 p-5" style="border-radius: 70px; background-color: #f7c699b7;">

                    <div class="col col-sm-6 col-md-11 col-lg-3">
                        <img src="img/chef/CHEFBOYLOGRO.png" class="img-fluid d-block" style="max-width: 325px">
                    </div>

                    <div class="col col-lg-5 align-self-center text-center">
                        <span class="display-3 fw-bold">Pablo "Boy" Logro</span>
                        <div class="row display-6 fs-2 p-5 d-none d-md-block">
                            Chef Pablo "Boy" Logro is a well-known Filipino chef who gained fame through his
                            culinary expertise and television appearances. Chef Boy Logro is associated with various Filipino dishes,
                            and one of his famous dishes is "Lechon Belly."
                        </div>
                    </div>
                    <div class="col col-md-4 d-none d-md-block">
                        <div class="card shadow align-items-center p-5 mt-4" style="width: 30rem; background: #FEE9D6; border: none; border-radius: 50px;"
                        data-bs-toggle="popover" data-bs-trigger="hover" data-bs-html="true" data-bs-placement="left"
                        data-bs-content="<div class='card text-center'><div class='card-header'>
                            <img src='img/foods/lechonBelly.JPG' class='img-fluid rounded-circle card-img-center' width='200'><h1>Lechon Belly</h1></div>
                            <div class='card-body'><h5>Chef Boy Logro's Lechon Belly presents a succulent and crispy pork belly dish, meticulously
                                roasted to perfection, showcasing the renowned chef's expertise in Filipino Cuisine.</h5></div></div>">

                            <img src="img/foods/lechonBelly.JPG" class="img-fluid rounded-circle card-img-center" width="250">
                            <span class="mt-4 h2">Lechon Belly</span>
                        </div>
                    </div>
                </div>

                <!--Tatung Sarthou-->
                <div class="row mt-5 shadow-lg mx-5 p-5" style="border-radius: 50px;  background-color: #f7c699b7;">

                    <div class="col col-sm-6 col-md-11 col-lg-3">
                        <img src="img/chef/TATUNGSARTHOU.png" class="img-fluid d-block" style="max-width: 325px">
                    </div>

                    <div class="col col-lg-5 align-self-center text-center">
                        <span class="display-3 fw-bold">Tatung Sarthou</span>
                        <div class="row display-6 fs-2 p-5 d-none d-md-block">
                            Chef Tatung is known for his advocacy of promoting Filipino cuisine and culinary heritage.
                            Adobong Pula, a red-hued version of the classic adobo, is one of his creations.
                        </div>
                    </div>
                    <!--food image-->
                    <div class="col col-md-4 d-none d-md-block">
                        <div class="card shadow align-items-center p-5 mt-4" style="width: 30rem; background: #FEE9D6; border: none; border-radius: 50px;"
                        data-bs-toggle="popover" data-bs-trigger="hover" data-bs-html="true" data-bs-placement="left"
                        data-bs-content="<div class='card text-center'><div class='card-header'>
                            <img src='img/foods/adobongpula.JPG' class='img-fluid rounded-circle card-img-center' width='200'><h1>Adobong Pula</h1></div>
                            <div class='card-body'><h5>Adobong Pula by Tatung Sarthou delivers a unique take on the classic adobo, infused with rich red ingredients and intricate flavors, reflecting Chef Sarthou's innovative approach to Filipino cooking.</h5></div></div>">
                            <img src="img/foods/adobongPula.JPG" class="img-fluid rounded-circle card-img-center" width="250">
                            <span class="mt-4 h2">Adobong Pula</span>
                        </div>
                    </div>
                </div>

                <!--Jp Anglo-->
                <div class="row mt-5 shadow-lg mx-5 p-5" style="border-radius: 50px; background-color: #f7c699b7;">

                    <div class="col col-sm-6 col-md-11 col-lg-3">
                        <img src="img/chef/JPANGLO.png" class="img-fluid d-block" style="max-width: 325px">
                    </div>

                    <div class="col col-lg-5 align-self-center text-center">
                        <span class="display-3 fw-bold">Jp Anglo</span>
                        <div class="row display-6 fs-2 p-5 d-none d-md-block">
                            Chef JP Anglo is known for his innovative approach to Filipino cuisine and his advocacy for local ingredients.
                            Talangka Rice, featuring crab fat, is one of his well-known dishes.
                        </div>
                    </div>

                    <div class="col col-md-4 d-none d-md-block">
                        <div class="card shadow align-items-center p-5 mt-4" style="width: 30rem; background: #FEE9D6; border: none; border-radius: 50px;"
                        data-bs-toggle="popover" data-bs-trigger="hover" data-bs-html="true" data-bs-placement="left"
                        data-bs-content="<div class='card text-center'><div class='card-header'>
                            <img src='img/foods/talangkaRice.JPG' class='img-fluid rounded-circle card-img-center' width='200'><h1>Talangka Rice</h1></div>
                            <div class='card-body'><h5>Talangka Rice by JP Anglo harmonizes the distinct taste of crab fat or talangka with fragrant rice, creating a delectable fusion dish that highlights Chef Anglo's creative culinary flair.</h5></div></div>">
                            <img src="img/foods/talangkaRice.JPG" class="img-fluid rounded-circle card-img-center" width="250">
                            <span class="mt-4 h2">Talangka Rice</span>
                        </div>
                    </div>

                </div>

                <!--Margarita Flores-->
                <div class="row mt-5 shadow-lg p-5 mx-5" style="border-radius: 50px; background-color: #f7c699b7;">

                    <div class="col col-sm-6 col-md-11 col-lg-3">
                        <img src="img/chef/MARGARITA.png" class="img-fluid d-block" style="max-width: 325px;">
                    </div>

                    <div class="col col-lg-5 align-self-center text-center">
                        <span class="display-3 fw-bold">Margarita Flores</span>
                        <div class="row display-6 fs-2 p-5 d-none d-md-block">
                                Chef Flores is known for her culinary expertise in various cuisines, including Filipino.
                                While she has showcased a variety of dishes, her take on Lechon de Leche Sinigang is notable.
                        </div>
                    </div>

                    <div class="col col-md-4 d-none d-md-block">
                        <div class="card shadow align-items-center p-5 text-center" style="width: 30rem; background: #FEE9D6; border: none; border-radius: 50px;"
                        data-bs-toggle="popover" data-bs-trigger="hover" data-bs-html="true" data-bs-placement="left"
                        data-bs-content="<div class='card text-center'><div class='card-header'>
                            <img src='img/foods/lechonsinigang.JPG' class='img-fluid rounded-circle card-img-center' width='200'><h1>Lechon De Leche Sinigang</h1></div>
                            <div class='card-body'><h5>Lechon de Leche Sinigang by Margarita Flores reimagines the traditional sinigang by incorporating tender lechon de leche, adding a delightful twist to the beloved Filipino sour soup, curated by Chef Flores's culinary expertise.</h5></div></div>">

                            <img src="img/foods/lechonsinigang.jpg" class="img-fluid rounded card-img-center rounded-circle" width="220px" height="200px">
                            <span class="mt-4 h2">Lechon De Leche Sinigang</span>
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </div>


</div>

@endsection
