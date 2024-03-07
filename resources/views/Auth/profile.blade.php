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
                <a class="nav-link" href="{{ route('dashboard') }}">
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
            <li class="nav-item active" role="presentation">
                <a class="nav-link active" id="User-tab" data-bs-toggle="tab"
                href="#UserTabPane" role="tab" aria-controls="UserTabPane"
                aria-selected="true">
                <img src="{{ asset(Auth::user()->profile_image) }}" alt="Profile Image" class="rounded-circle" style="width: 30px; height: 30px; object-fit: cover;">
                <span class="h3 ms-2">{{Auth::user()->username}}</span>
                </a>
            </li>

        </ul>
    </div>
</nav>

<div class="tab-content">

    <!--profile-->
    <div class="tab-content justify-content-center" id="userContent">
        <div class="tab-pane active" id="UserTabPane" role="tabpanel" aria-labelledby="User-tab" tabindex="0">
            <div class="container d-flex justify-content-center">

                <div class="row my-4 align-items-center d-flex justify-content-center">

                    <div class="col-lg-3 p-4 me-3 shadow" style=" border-radius: 20px; height: 450px; background-color:#f7b97ebb;">
                        <div class="row justify-content-center">
                            @if(Auth::user()->profile_image)
                                <!-- If user has a profile image -->
                                <div class="row" style="width: 350px; height:250px;">
                                    <img src="{{ asset(Auth::user()->profile_image) }}" class="rounded-circle img-fluid" style="background-color: none; object-fit:cover;">
                                </div>
                            @else
                                <!-- If user has no profile image -->
                                <div class="row align-content-center text-center" style="height: 245px; background:whitesmoke;">
                                    <div>No Profile Image</div>
                                </div>
                            @endif
                        </div>

                        <h2>{{ Auth::user()->username }}</h2>
                        <h3>{{ Auth::user()->email }}</h3>

                        <div class="row">
                            <div class="row">
                                <div class="row">
                                    <h5>Bookmarked Recipes: <span class="text-muted">{{ $bookmarkedRecipeCount }}</span></h5>
                                </div>
                                <div class="row">
                                    <h5>Published Recipes: <span class="text-muted">{{ $publishedRecipeCount }}</span></h5>
                                </div>
                            </div>
                        </div>
                        <div class="row mx-auto justify-content-center mt-3">
                            <a href="{{ route('logout') }}" type="button" class="btn btn-outline-dark"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                            style="width: 20rem;">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                            </form>
                        </div>
                    </div>

                    <div class="col-lg-6 mt-4">
                        <h1>Edit your details</h1>
                        <div class="row shadow p-4 fs-2" style="width: 700px; border-radius: 20px; background-color:#f7b97ebb;">

                            <form action="{{ route('profile.update') }}" method="POST" >
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email address</label>
                                            <input type="email" class="form-control fs-3" id="email" name="email" placeholder="Email" value="{{ Auth::user()->email }}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="usn" class="form-label">Username</label>
                                            <input type="text" class="form-control fs-3" id="usn" name="username" placeholder="Username" value="{{ Auth::user()->username }}">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3 mt-2">
                                            <label for="new_password">New Password:</label>
                                            <input type="password" class="form-control fs-3" name="new_password" id="new_password" required>
                                        </div>
                                        <div class="mb-3 my-4">
                                            <label for="confirm_password">Confirm New Password:</label>
                                            <input type="password" class="form-control fs-3" name="confirm_password" id="confirm_password" required>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-outline-secondary fs-4" style="width: 150px; height: 35px;">
                                    Save changes
                                </button>
                            </form>

                            <div class="row mt-3">
                                <form action="{{ route('upload.profile.image') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <div class="row">
                                            <div class="col col-sm-3">
                                                <label for="user_pic" class="form-label"><h4>Change Profile Pic</h4></label>
                                            </div>
                                            <div class="col">
                                                <input class="form-control" name="profile_image" id="user_pic" type="file" accept="image/*">
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-outline-success">Upload Image</button>
                                        @if(session('success'))
                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                <strong>Success!</strong> {{ session('success') }}
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                        @endif

                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>

                    <div class="row mt-3 overflow-auto">
                        <h1>Published Recipes</h1>
                        @foreach ($publishedRecipes as $recipe)
                            <div class="col-auto">
                                <div class="card shadow" style="width: 20rem; height: 18rem; background: whitesmoke;">
                                    <div class="card-body">
                                        <h4 class="card-title">{{ $recipe->recipe_name }}</h4>
                                        <div class="row mb-1">
                                            <div class="col">
                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                                <span>{{ $recipe->views_count }} views</span>
                                            </div>
                                            <div class="col">
                                                <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                                                <span>{{ $recipe->likes }} likes</span>
                                            </div>
                                        </div>
                                        <p class="card-text">{{ $recipe->recipe_description }}</p>
                                    </div>
                                    <div class="card-footer">
                                        <a href="{{ route('recipe.show', $recipe->id) }}" class="btn btn-outline-secondary btn-lg mb-3 w-100">View Recipe</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="row mt-3">
                        <h1>Bookmarked Recipes</h1>
                        @foreach ($bookmarkedRecipes as $recipe)
                            <div class="col-auto">
                                <div class="card shadow" style="width: 20rem; height: 18rem; background: whitesmoke;">
                                    <div class="card-body">
                                        <h4 class="card-title">{{ $recipe->recipe->recipe_name }}</h4>
                                        <div class="row mb-1">
                                            <div class="col">
                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                                <span>{{ $recipe->recipe->views_count }} views</span>
                                            </div>
                                            <div class="col">
                                                <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                                                <span>{{ $recipe->recipe->likes }} likes</span>
                                            </div>
                                        </div>
                                        <p class="card-text">{{ $recipe->recipe->recipe_description }}</p>
                                    </div>
                                    <div class="card-footer">
                                        <a href="{{ route('recipe.show', $recipe->id) }}" class="btn btn-outline-secondary btn-lg mb-3 w-100">View Recipe</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
