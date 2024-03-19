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
                <a class="nav-link" href="{{ route('guestAddRecipeDisabled') }}">
                    <span class="h3">Make Recipe</span>
                </a>
            </li>

            <!--AboutTab-->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('guest-about') }}">
                    <span class="h3">About us</span>
                </a>
            </li>

            <!--contactTab-->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('guest-contact') }}">
                    <span class="h3">Contact us</span>
                </a>
            </li>

            <!--Profile-->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('guest-profile') }}">
                    <span class="h3 ms-2">{{$username}}</span>
                </a>
            </li>

        </ul>
    </div>
</nav>

<div class="tab-content">
    <!--category-->
<div class="tab-content" id="categoryContent">

            <div class="tab-pane active" id="categoryTabPane" role="tabpanel" aria-labelledby="category-tab" tabindex="0">

                <div class="container-fluid">

                    <!--breakfast-->
                    <div class="row">
                        <span class="display-4 mt-2">Breakfast</span>
                    </div>

                    <div class="row justify-content-start mt-3 shadow-lg p-4">
                        <!-- Looping breakfast recipes -->
                        @php $count = 0; @endphp
                        @foreach ($breakfastCategories as $recipe)
                            @if ($count < 3)
                                <div class="col-md-4"> <!-- Use col-md-4 to make each column occupy 1/3 of the row -->
                                    <div class="card shadow-lg mb-4 h-100">
                                        <!-- Photo -->
                                        @if ($recipe->recipe_image)
                                            <img src="{{ asset('storage/images/' . $recipe->recipe_image) }}" class="card-img-top img-fluid" style="height: 200px; object-fit: cover;" alt="Recipe Image">
                                        @else
                                            <div class="card-img-top bg-secondary text-white text-center py-5">No Image Available</div>
                                        @endif
                                        <div class="card-body">
                                            <!-- Title -->
                                            <h1 class="card-title mb-3">
                                                {{ $recipe->recipe_name }}
                                                @if (Auth::check())
                                                    @if (Auth::user()->hasBookmarked($recipe->id))
                                                        <!-- If the recipe is bookmarked by the user, show the unbookmark button -->
                                                        <form action="{{ route('recipe.unbookmark', $recipe->id) }}" method="POST" class="float-end">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-secondary">
                                                                <i class="fa fa-bookmark" aria-hidden="true"></i>
                                                            </button>
                                                        </form>
                                                    @else
                                                        <!-- If the recipe is not bookmarked by the user, show the bookmark button -->
                                                        <form action="{{ route('recipe.bookmark', $recipe->id) }}" method="POST" class="float-end">
                                                            @csrf
                                                            <button type="submit" class="btn btn-outline-dark">
                                                                <i class="fa fa-bookmark" aria-hidden="true"></i>
                                                            </button>
                                                        </form>
                                                    @endif
                                                @else
                                                    <span class="d-inline-block float-end" tabindex="0" data-bs-toggle="tooltip" title="Log in to bookmark">
                                                    <button type="submit" class="btn btn-outline-dark" disabled>
                                                        <i class="fa fa-bookmark" aria-hidden="true"></i>
                                                    </button>
                                                </span>
                                                
                                                @endif
                                            </h1>
                                            <p class="card-text mb-3 fs-5"><strong class="fs-5">Category:</strong> {{ $recipe->category }}</p>
                                            <!-- Preview -->
                                            <p class="card-text fs-5">{{ $recipe->recipe_description }}</p>
                                        </div>
                                        <!-- View Recipe Button -->
                                        <div class="card-footer bg-transparent mx-auto" style="border: none;">
                                            <a href="{{ route('recipe.show', $recipe->id) }}" class="btn btn-outline-secondary btn-lg mb-3 w-100">View Recipe</a>
                                        </div>
                                    </div>
                                </div>
                                @php $count++; @endphp
                            @endif
                        @endforeach


                        <!--GET all posts for Breakfast-->
                        <div class="row text-start m-4">
                            <a class="text-dark" data-bs-toggle="collapse" href="#collapsebfast" role="button" aria-expanded="false" aria-controls="collapsebfast" style="text-decoration: none;">
                                <span class="display-6 fs-2 fw-bold">View All</span>
                            </a>
                        </div>
                        <div class="collapse" id="collapsebfast">
                            <div class="row justify-content-between mt-2 overflow-auto h-100" style="height: 500px;">
                                @foreach ($breakfastCategories as $recipe)
                                    <div class="row g-2 mb-3 px-1">
                                        <div class="col-md-4">
                                            <div class="card shadow-lg h-100">
                                                <!-- Photo -->
                                                <div class="row g-2">
                                                    <div class="col-md-4">
                                                        @if ($recipe->recipe_image)
                                                            <img src="{{ asset('storage/images/' . $recipe->recipe_image) }}" class="card-img-top img-fluid" style="height: 200px; object-fit: cover;" alt="Recipe Image">
                                                        @else
                                                            <div class="card-img-top bg-secondary text-white text-center py-5">No Image Available</div>
                                                        @endif
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="card-body">
                                                            <!-- Title -->
                                                            <h2 class="card-title mb-3">{{ $recipe->recipe_name }}
                                                                @if (Auth::check())
                                                                @if (Auth::user()->hasBookmarked($recipe->id))
                                                                    <!-- If the recipe is bookmarked by the user, show the unbookmark button -->
                                                                    <form action="{{ route('recipe.unbookmark', $recipe->id) }}" method="POST" class="float-end">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="btn btn-secondary">
                                                                            <i class="fa fa-bookmark" aria-hidden="true"></i>
                                                                        </button>
                                                                    </form>
                                                                    @else
                                                                        <!-- If the recipe is not bookmarked by the user, show the bookmark button -->
                                                                        <form action="{{ route('recipe.bookmark', $recipe->id) }}" method="POST" class="float-end">
                                                                            @csrf
                                                                            <button type="submit" class="btn btn-outline-dark">
                                                                                <i class="fa fa-bookmark" aria-hidden="true"></i>
                                                                            </button>
                                                                        </form>
                                                                    @endif
                                                                @else
                                                                    <span class="d-inline-block float-end" tabindex="0" data-bs-toggle="tooltip" title="Log in to bookmark">
                                                                        <button type="submit" class="btn btn-outline-dark" disabled>
                                                                            <i class="fa fa-bookmark" aria-hidden="true"></i>
                                                                        </button>
                                                                    </span>
                                                                @endif
                                                            </h2>

                                                            <p class="card-text mb-3 fs-5"><strong class="fs-5">Category:</strong> {{ $recipe->category }}</p>
                                                            <!-- Preview -->
                                                            <p class="card-text fs-6">{{ $recipe->recipe_description }}</p>
                                                        </div>
                                                    </div>
                                                    <!-- View Recipe Button -->
                                                    <div class="card-footer bg-transparent mx-auto" style="border: none; height: 60px;">
                                                        <a href="{{ route('recipe.show', $recipe->id) }}" class="btn btn-outline-secondary btn-lg w-100">View Recipe</a>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!--Lunch-->
                    <div class="row">
                        <div class="col my-auto mt-5 ps-2 m-3" style="text-align: start;">
                            <span class="display-4 mt-2">Lunch</span>
                        </div>
                    </div>

                    <div class="row justify-content-start mt-5 shadow-lg p-4">
                        @php $count = 0; @endphp
                        @foreach ($lunchCategories as $recipe)
                            @if ($count < 3)
                                <div class="col-md-4"> <!-- Use col-md-4 to make each column occupy 1/3 of the row -->
                                    <div class="card shadow-lg mb-4 h-100">
                                        <!-- Photo -->
                                        @if ($recipe->recipe_image)
                                            <img src="{{ asset('storage/images/' . $recipe->recipe_image) }}" class="card-img-top img-fluid" style="height: 200px; object-fit: cover;" alt="Recipe Image">
                                        @else
                                            <div class="card-img-top bg-secondary text-white text-center py-5">No Image Available</div>
                                        @endif
                                        <div class="card-body">
                                            <!-- Title -->
                                            <h1 class="card-title mb-3">
                                                {{ $recipe->recipe_name }}
                                                @if (Auth::check())
                                                    @if (Auth::user()->hasBookmarked($recipe->id))
                                                        <!-- If the recipe is bookmarked by the user, show the unbookmark button -->
                                                        <form action="{{ route('recipe.unbookmark', $recipe->id) }}" method="POST" class="float-end">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-secondary">
                                                                <i class="fa fa-bookmark" aria-hidden="true"></i>
                                                            </button>
                                                        </form>
                                                    @else
                                                        <!-- If the recipe is not bookmarked by the user, show the bookmark button -->
                                                        <form action="{{ route('recipe.bookmark', $recipe->id) }}" method="POST" class="float-end">
                                                            @csrf
                                                            <button type="submit" class="btn btn-outline-dark">
                                                                <i class="fa fa-bookmark" aria-hidden="true"></i>
                                                            </button>
                                                        </form>
                                                    @endif
                                                @else
                                                    <span class="d-inline-block float-end" tabindex="0" data-bs-toggle="tooltip" title="Log in to bookmark">
                                                        <button type="submit" class="btn btn-outline-dark" disabled>
                                                                <i class="fa fa-bookmark" aria-hidden="true"></i>
                                                        </button>
                                                    </span>
                                                @endif
                                            </h1>
                                            <p class="card-text mb-3 fs-5"><strong class="fs-5">Category:</strong> {{ $recipe->category }}</p>
                                            <!-- Preview -->
                                            <p class="card-text fs-5">{{ $recipe->recipe_description }}</p>
                                        </div>
                                        <!-- View Recipe Button -->
                                        <div class="card-footer bg-transparent mx-auto" style="border: none;">
                                            <a href="{{ route('recipe.show', $recipe->id) }}" class="btn btn-outline-secondary btn-lg mb-3 w-100">View Recipe</a>
                                        </div>
                                    </div>
                                </div>
                                @php $count++; @endphp
                            @endif
                        @endforeach
                        <!--GET all posts for Lunch-->
                        <div class="row text-start m-4">
                            <a class="text-dark" data-bs-toggle="collapse" href="#collapselunch" role="button" aria-expanded="false" aria-controls="collapselunch" style="text-decoration: none;">
                                <span class="display-6 fs-2 fw-bold">View All</span>
                            </a>
                        </div>
                        <div class="collapse" id="collapselunch">
                            <div class="row justify-content-between mt-2 overflow-auto h-100" style="height: 500px;">
                                @foreach ($lunchCategories as $recipe)
                                    <div class="row g-2 mb-3 px-1">
                                        <div class="col-md-4">
                                            <div class="card shadow-lg h-100">
                                                <!-- Photo -->
                                                <div class="row g-2">
                                                    <div class="col-md-4">
                                                        @if ($recipe->recipe_image)
                                                            <img src="{{ asset('storage/images/' . $recipe->recipe_image) }}" class="card-img-top img-fluid" style="height: 200px; object-fit: cover;" alt="Recipe Image">
                                                        @else
                                                            <div class="card-img-top bg-secondary text-white text-center py-5">No Image Available</div>
                                                        @endif
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="card-body">
                                                            <!-- Title -->
                                                            <h2 class="card-title mb-3">{{ $recipe->recipe_name }}
                                                                @if (Auth::check())
                                                                @if (Auth::user()->hasBookmarked($recipe->id))
                                                                    <!-- If the recipe is bookmarked by the user, show the unbookmark button -->
                                                                    <form action="{{ route('recipe.unbookmark', $recipe->id) }}" method="POST" class="float-end">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="btn btn-secondary">
                                                                            <i class="fa fa-bookmark" aria-hidden="true"></i>
                                                                        </button>
                                                                    </form>
                                                                    @else
                                                                        <!-- If the recipe is not bookmarked by the user, show the bookmark button -->
                                                                        <form action="{{ route('recipe.bookmark', $recipe->id) }}" method="POST" class="float-end">
                                                                            @csrf
                                                                            <button type="submit" class="btn btn-outline-dark">
                                                                                <i class="fa fa-bookmark" aria-hidden="true"></i>
                                                                            </button>
                                                                        </form>
                                                                    @endif
                                                                @else
                                                                    <span class="d-inline-block float-end" tabindex="0" data-bs-toggle="tooltip" title="Log in to bookmark">
                                                                        <button type="submit" class="btn btn-outline-dark" disabled>
                                                                            <i class="fa fa-bookmark" aria-hidden="true"></i>
                                                                        </button>
                                                                    </span>
                                                                @endif
                                                            </h2>

                                                            <p class="card-text mb-3 fs-5"><strong class="fs-5">Category:</strong> {{ $recipe->category }}</p>
                                                            <!-- Preview -->
                                                            <p class="card-text fs-6">{{ $recipe->recipe_description }}</p>
                                                        </div>
                                                    </div>
                                                    <!-- View Recipe Button -->
                                                    <div class="card-footer bg-transparent mx-auto" style="border: none; height: 60px;">
                                                        <a href="{{ route('recipe.show', $recipe->id) }}" class="btn btn-outline-secondary btn-lg w-100">View Recipe</a>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div>

                    <!--Dinner-->
                    <div class="row">
                        <div class="col my-auto mt-5 ps-2 m-3" style="text-align: start;">
                            <span class="display-4 mt-2">Dinner</span>
                        </div>
                    </div>

                    <div class="row justify-content-start mt-5 mb-5 shadow-lg p-4">
                        @php $count = 0; @endphp
                        @foreach ($dinnerCategories as $recipe)
                            @if ($count < 3)
                                <div class="col-md-4"> <!-- Use col-md-4 to make each column occupy 1/3 of the row -->
                                    <div class="card shadow-lg mb-4 h-100">
                                        <!-- Photo -->
                                        @if ($recipe->recipe_image)
                                            <img src="{{ asset('storage/images/' . $recipe->recipe_image) }}" class="card-img-top img-fluid" style="height: 200px; object-fit: cover;" alt="Recipe Image">
                                        @else
                                            <div class="card-img-top bg-secondary text-white text-center py-5">No Image Available</div>
                                        @endif
                                        <div class="card-body">
                                            <!-- Title -->
                                            <h1 class="card-title mb-3">
                                                {{ $recipe->recipe_name }}
                                                @if (Auth::check())
                                                    @if (Auth::user()->hasBookmarked($recipe->id))
                                                        <!-- If the recipe is bookmarked by the user, show the unbookmark button -->
                                                        <form action="{{ route('recipe.unbookmark', $recipe->id) }}" method="POST" class="float-end">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-secondary">
                                                                <i class="fa fa-bookmark" aria-hidden="true"></i>
                                                            </button>
                                                        </form>
                                                    @else
                                                        <!-- If the recipe is not bookmarked by the user, show the bookmark button -->
                                                        <form action="{{ route('recipe.bookmark', $recipe->id) }}" method="POST" class="float-end">
                                                            @csrf
                                                            <button type="submit" class="btn btn-outline-dark">
                                                                <i class="fa fa-bookmark" aria-hidden="true"></i>
                                                            </button>
                                                        </form>
                                                    @endif
                                                @else
                                                    <span class="d-inline-block float-end" tabindex="0" data-bs-toggle="tooltip" title="Log in to bookmark">
                                                        <button type="submit" class="btn btn-outline-dark" disabled>
                                                            <i class="fa fa-bookmark" aria-hidden="true"></i>
                                                        </button>
                                                    </span>
                                                @endif
                                            </h1>
                                            <p class="card-text mb-3 fs-5"><strong class="fs-5">Category:</strong> {{ $recipe->category }}</p>
                                            <!-- Preview -->
                                            <p class="card-text fs-5">{{ $recipe->recipe_description }}</p>
                                        </div>
                                        <!-- View Recipe Button -->
                                        <div class="card-footer bg-transparent mx-auto" style="border: none;">
                                            <a href="{{ route('recipe.show', $recipe->id) }}" class="btn btn-outline-secondary btn-lg mb-3 w-100">View Recipe</a>
                                        </div>
                                    </div>
                                </div>
                                @php $count++; @endphp
                            @endif
                        @endforeach
                        <!--GET all posts for Dinner-->
                        <div class="row text-start m-4">
                            <a class="text-dark" data-bs-toggle="collapse" href="#collapsedinner" role="button" aria-expanded="false" aria-controls="collapsedinner" style="text-decoration: none;">
                                <span class="display-6 fs-2 fw-bold">View All</span>
                            </a>
                        </div>
                        <div class="collapse" id="collapsedinner">
                            <div class="row justify-content-between mt-2 overflow-auto h-100" style="height: 500px;">
                                @foreach ($dinnerCategories as $recipe)
                                    <div class="row g-2 mb-3 px-1">
                                        <div class="col-md-4">
                                            <div class="card shadow-lg h-100">
                                                <!-- Photo -->
                                                <div class="row g-2">
                                                    <div class="col-md-4">
                                                        @if ($recipe->recipe_image)
                                                            <img src="{{ asset('storage/images/' . $recipe->recipe_image) }}" class="card-img-top img-fluid" style="height: 200px; object-fit: cover;" alt="Recipe Image">
                                                        @else
                                                            <div class="card-img-top bg-secondary text-white text-center py-5">No Image Available</div>
                                                        @endif
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="card-body">
                                                            <!-- Title -->
                                                            <h2 class="card-title mb-3">{{ $recipe->recipe_name }}
                                                                @if (Auth::check())
                                                                @if (Auth::user()->hasBookmarked($recipe->id))
                                                                    <!-- If the recipe is bookmarked by the user, show the unbookmark button -->
                                                                    <form action="{{ route('recipe.unbookmark', $recipe->id) }}" method="POST" class="float-end">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="btn btn-secondary">
                                                                            <i class="fa fa-bookmark" aria-hidden="true"></i>
                                                                        </button>
                                                                    </form>
                                                                    @else
                                                                        <!-- If the recipe is not bookmarked by the user, show the bookmark button -->
                                                                        <form action="{{ route('recipe.bookmark', $recipe->id) }}" method="POST" class="float-end">
                                                                            @csrf
                                                                            <button type="submit" class="btn btn-outline-dark">
                                                                                <i class="fa fa-bookmark" aria-hidden="true"></i>
                                                                            </button>
                                                                        </form>
                                                                    @endif
                                                                @else
                                                                    <span class="d-inline-block float-end" tabindex="0" data-bs-toggle="tooltip" title="Log in to bookmark">
                                                                        <button type="submit" class="btn btn-outline-dark" disabled>
                                                                            <i class="fa fa-bookmark" aria-hidden="true"></i>
                                                                        </button>
                                                                    </span>
                                                                @endif
                                                            </h2>

                                                            <p class="card-text mb-3 fs-5"><strong class="fs-5">Category:</strong> {{ $recipe->category }}</p>
                                                            <!-- Preview -->
                                                            <p class="card-text fs-6">{{ $recipe->recipe_description }}</p>
                                                        </div>
                                                    </div>
                                                    <!-- View Recipe Button -->
                                                    <div class="card-footer bg-transparent mx-auto" style="border: none; height: 60px;">
                                                        <a href="{{ route('recipe.show', $recipe->id) }}" class="btn btn-outline-secondary btn-lg w-100">View Recipe</a>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div>

                    <!--snacks-->
                    <div class="row">
                        <div class="col my-auto mt-5 ps-2 m-3" style="text-align: start;">
                            <span class="display-4 mt-2">Snacks</span>
                        </div>
                    </div>

                    <div class="row justify-content-start mt-5 mb-5 shadow-lg p-4">
                        @php $count = 0; @endphp
                        @foreach ($snacksCategories as $recipe)
                            @if ($count < 3)
                                <div class="col-md-4"> <!-- Use col-md-4 to make each column occupy 1/3 of the row -->
                                    <div class="card shadow-lg mb-4 h-100">
                                        <!-- Photo -->
                                        @if ($recipe->recipe_image)
                                            <img src="{{ asset('storage/images/' . $recipe->recipe_image) }}" class="card-img-top img-fluid" style="height: 200px; object-fit: cover;" alt="Recipe Image">
                                        @else
                                            <div class="card-img-top bg-secondary text-white text-center py-5">No Image Available</div>
                                        @endif
                                        <div class="card-body">
                                            <!-- Title -->
                                            <h1 class="card-title mb-3">
                                                {{ $recipe->recipe_name }}
                                                @if (Auth::check())
                                                    @if (Auth::user()->hasBookmarked($recipe->id))
                                                        <!-- If the recipe is bookmarked by the user, show the unbookmark button -->
                                                        <form action="{{ route('recipe.unbookmark', $recipe->id) }}" method="POST" class="float-end">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-secondary">
                                                                <i class="fa fa-bookmark" aria-hidden="true"></i>
                                                            </button>
                                                        </form>
                                                    @else
                                                        <!-- If the recipe is not bookmarked by the user, show the bookmark button -->
                                                        <form action="{{ route('recipe.bookmark', $recipe->id) }}" method="POST" class="float-end">
                                                            @csrf
                                                            <button type="submit" class="btn btn-outline-dark">
                                                                <i class="fa fa-bookmark" aria-hidden="true"></i>
                                                            </button>
                                                        </form>
                                                    @endif
                                                @else
                                                    <span class="d-inline-block float-end" tabindex="0" data-bs-toggle="tooltip" title="Log in to bookmark">
                                                         <button type="submit" class="btn btn-outline-dark" disabled>
                                                            <i class="fa fa-bookmark" aria-hidden="true"></i>
                                                        </button>
                                                    </span>
                                                @endif
                                            </h1>
                                            <p class="card-text mb-3 fs-5"><strong class="fs-5">Category:</strong> {{ $recipe->category }}</p>
                                            <!-- Preview -->
                                            <p class="card-text fs-5">{{ $recipe->recipe_description }}</p>
                                        </div>
                                        <!-- View Recipe Button -->
                                        <div class="card-footer bg-transparent mx-auto" style="border: none;">
                                            <a href="{{ route('recipe.show', $recipe->id) }}" class="btn btn-outline-secondary btn-lg mb-3 w-100">View Recipe</a>
                                        </div>
                                    </div>
                                </div>
                                @php $count++; @endphp
                            @endif
                        @endforeach
                        <!--GET all posts for snacks-->
                        <div class="row text-start m-4">
                            <a class="text-dark" data-bs-toggle="collapse" href="#collapsesnacks" role="button" aria-expanded="false" aria-controls="collapsesnacks" style="text-decoration: none;">
                                <span class="display-6 fs-2 fw-bold">View All</span>
                            </a>
                        </div>

                        <div class="collapse" id="collapsesnacks">
                            <div class="row justify-content-between mt-2 overflow-auto h-100" style="height: 500px;">
                                @foreach ($snacksCategories as $recipe)
                                    <div class="row g-2 mb-3 px-1">
                                        <div class="col-md-4">
                                            <div class="card shadow-lg h-100">
                                                <!-- Photo -->
                                                <div class="row g-2">
                                                    <div class="col-md-4">
                                                        @if ($recipe->recipe_image)
                                                            <img src="{{ asset('storage/images/' . $recipe->recipe_image) }}" class="card-img-top img-fluid" style="height: 200px; object-fit: cover;" alt="Recipe Image">
                                                        @else
                                                            <div class="card-img-top bg-secondary text-white text-center py-5">No Image Available</div>
                                                        @endif
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="card-body">
                                                            <!-- Title -->
                                                            <h2 class="card-title mb-3">{{ $recipe->recipe_name }}
                                                                @if (Auth::check())
                                                                @if (Auth::user()->hasBookmarked($recipe->id))
                                                                    <!-- If the recipe is bookmarked by the user, show the unbookmark button -->
                                                                    <form action="{{ route('recipe.unbookmark', $recipe->id) }}" method="POST" class="float-end">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="btn btn-secondary">
                                                                            <i class="fa fa-bookmark" aria-hidden="true"></i>
                                                                        </button>
                                                                    </form>
                                                                    @else
                                                                        <!-- If the recipe is not bookmarked by the user, show the bookmark button -->
                                                                        <form action="{{ route('recipe.bookmark', $recipe->id) }}" method="POST" class="float-end">
                                                                            @csrf
                                                                            <button type="submit" class="btn btn-outline-dark">
                                                                                <i class="fa fa-bookmark" aria-hidden="true"></i>
                                                                            </button>
                                                                        </form>
                                                                    @endif
                                                                @else
                                                                    <span class="d-inline-block float-end" tabindex="0" data-bs-toggle="tooltip" title="Log in to bookmark">
                                                                        <button type="submit" class="btn btn-outline-dark" disabled>
                                                                            <i class="fa fa-bookmark" aria-hidden="true"></i>
                                                                        </button>
                                                                    </span>
                                                                @endif
                                                            </h2>

                                                            <p class="card-text mb-3 fs-5"><strong class="fs-5">Category:</strong> {{ $recipe->category }}</p>
                                                            <!-- Preview -->
                                                            <p class="card-text fs-6">{{ $recipe->recipe_description }}</p>
                                                        </div>
                                                    </div>
                                                    <!-- View Recipe Button -->
                                                    <div class="card-footer bg-transparent mx-auto" style="border: none; height: 60px;">
                                                        <a href="{{ route('recipe.show', $recipe->id) }}" class="btn btn-outline-secondary btn-lg w-100">View Recipe</a>
                                                    </div>

                                                </div>
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
</div>

@endsection
