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
        <ul class="navbar-nav nav-underline d-flex flex-row justify-content-sm-center" role="tablist">
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
            <li class="nav-item active" role="presentation">
                <a class="nav-link active" id="popular-tab" data-bs-toggle="tab"
                href="#popularTabPane" role="tab" aria-controls="popularTabPane"
                aria-selected="true">
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
    <!--popular-->
    <div class="tab-content" id="popularContent">

        <div class="tab-pane active" id="popularTabPane" role="tabpanel" aria-labelledby="popular-tab" tabindex="0">

            <div class="container-fluid">

                <!--search-->
                <div class="row mt-5">
                    <div class="col-4 mx-auto">
                        <form action="{{ route('popular') }}" method="GET">
                            <div class="input-group">
                                <input type="search" name="search" class="form-control rounded fs-4" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                                <button type="submit" class="btn btn-outline-secondary fs-4" data-mdb-ripple-init><i class="fa fa-search" aria-hidden="true"></i></button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Placeholder for search results -->
                <div class="row mt-3">
                    <div class="col-4 mx-auto">
                        @if (!empty($searchQuery))
                            <h4>Search Results for "{{ $searchQuery }}"</h4>
                            @if ($recipes->isEmpty())
                                <p>No recipes found matching the search query.</p>
                            @else
                                <!-- Loop through and display search results -->
                                @foreach ($recipes as $recipe)
                                    <!-- Display each recipe -->
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $recipe->recipe_name }}</h5>
                                            <p class="card-text">{{ $recipe->recipe_description }}</p>
                                            <!-- Add more details or buttons if needed -->
                                            <div class="card-footer bg-transparent mx-auto" style="border: none;">
                                                <a href="{{ route('recipe.show', $recipe->id) }}" class="btn btn-outline-secondary btn-lg mb-3 w-100">View Recipe</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        @endif
                    </div>
                </div>

                <!--mostviewed-->
                <h1 class="mb-2 mt-4">Most viewed Recipes</h1>
                <div class="row shadow-lg p-4 overflow-auto" style="white-space: nowrap; height: 510px;">
                    <!-- Check if most viewed recipes exist -->
                    @if ($mostViewedRecipe->isNotEmpty())
                        @foreach ($mostViewedRecipe as $mostViewedRecipe)
                            <div class="col-md-4 col-lg-3 col-sm-6 mb-4" style="display: inline-block; white-space: normal;">
                                <div class="card text-center" style="background-color: #fed8b5a5;">
                                    <!-- Image -->
                                    <div class="card-img">
                                        <!-- Replace with actual image source -->
                                        <img src="{{ asset('storage/images/' . $mostViewedRecipe->recipe_image) }}" class="card-img-top img-fluid" style="height: 250px; object-fit: cover;" alt="Recipe Image">
                                    </div>
                                    <!-- Title -->
                                    <div class="card-header">
                                        <h2 class="h3">{{ $mostViewedRecipe->recipe_name }}</h2>
                                    </div>
                                    <!-- Description -->
                                    <div class="card-body" style="height: 150px;">
                                        <p class="card-text">{{ $mostViewedRecipe->recipe_description }}</p>
                                        <!-- Full view recipe -->
                                        <div class="row mt-3">
                                            <div class="col">
                                                <a class="btn btn-outline-secondary w-100" href="{{ route('recipe.show', $mostViewedRecipe->id) }}">View Recipe</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Views count -->
                                    <div class="card-footer text-muted">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                        <span>{{ $mostViewedRecipe->views_count }} views</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <!-- Display a message if no most viewed recipes are found -->
                        <div class="col">
                            <p>No most viewed recipes found.</p>
                        </div>
                    @endif
                </div>

                <!--mostLiked-->
                <h1 class="mb-4 mt-4">Most Liked Recipes</h1>
                <div class="container-fluid">
                    <div class="row shadow-lg p-4 overflow-auto mb-5" style="white-space: nowrap; height: 460px;">
                        <!-- Check if most liked recipes exist -->
                        @if ($mostLikedRecipe->isNotEmpty())
                            @foreach ($mostLikedRecipe as $mostLikedRecipe)
                                <div class="col-md-4 col-lg-3 col-sm-6 mb-4" style="display: inline-block; white-space: normal;">
                                    <div class="card text-center" style="background-color: #fed8b5a5; height: 100%;">
                                        <!-- Image -->
                                        <div class="card-img">
                                            <!-- Replace with actual image source -->
                                            <img src="{{ asset('storage/images/' . $mostLikedRecipe->recipe_image) }}" class="card-img-top img-fluid" style="max-height: 200px; object-fit: cover;" alt="Recipe Image">
                                        </div>
                                        <!-- Title -->
                                        <div class="card-header">
                                            <h2 class="h3">{{ $mostLikedRecipe->recipe_name }}</h2>
                                        </div>
                                        <!-- Description -->
                                        <div class="card-body" style="height: 150px;">
                                            <p class="card-text">{{ $mostLikedRecipe->recipe_description }}</p>
                                            <!-- Full view recipe -->
                                            <div class="row mt-3">
                                                <div class="col">
                                                    <a class="btn btn-outline-secondary w-100" href="{{ route('recipe.show', $mostLikedRecipe->id) }}">View Recipe</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Likes count -->
                                        <div class="card-footer text-muted">
                                            <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                                            <span>{{ $mostLikedRecipe->likes }} likes</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <!-- Display a message if no most liked recipes are found -->
                            <div class="col">
                                <p>No most liked recipes found.</p>
                            </div>
                        @endif
                    </div>
                </div>


            </div>
        </div>
    </div>

</div>

@endsection
