@extends('Auth.layout')
@section('content')

<nav class="navbar navbar-expand-lg sticky-topx" style="background: #f7b87e;">
    <a href="#" class="navbar-brand">
        <img src="img/logo_ic/logo11.png" width="50" class="img-fluid px-2 mx-2">
        <span class="fw-bold h4">Pinoy Specials</span>
    </a>
</nav>



<!--recipelayout-->
<div class="container">

    <div class="row">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb fs-4">
                <!-- Home link -->
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="text-dark" style="text-decoration: none;">Home</a></li>
                <!-- Category link -->
                <li class="breadcrumb-item"><a href="{{ route('category') }}" class="text-dark" style="text-decoration: none;">Categories</a></li>
                <!-- Current category (active) -->
                <li class="breadcrumb-item">{{ $currentCategory->category }}</li>
                <!-- Recipe (if available) -->
                @isset($currentRecipe)
                    <li class="breadcrumb-item fw-bold active" aria-current="page"><a href="{{ route('recipe.show', $currentRecipe->id) }}" class="text-dark" style="text-decoration: none;">{{ $currentRecipe->recipe_name }}</a></li>
                @endisset
            </ol>
        </nav>
    </div>

    <div class="row mt-3">

        <div class="col text-center shadow my-3 mx-3">

            <div class="row d-none d-lg-block">
                <img src="{{ asset('storage/images/' . $recipe->recipe_image) }}" class="img mt-2" style="height: 280px; object-fit: cover;">
            </div>
            <h2 class="fw-bold mt-3">{{$recipe->recipe_name}}</h2>
            @if ($recipe->user)
                <h4 class="text-muted">Author: {{ $recipe->user->username }}</h4>
            @endif
            <div class="row my-3">
                <div class="col">
                    <span class="fs-6 mx-1 fw-bold">Views<span class="badge rounded-pill bg-info text-dark mx-2 fs-6">{{ $recipe->views_count }}</span></span>
                    <span class="fs-6 mx-1 fw-bold">Likes<span class="badge rounded-pill bg-info text-dark mx-2 fs-6">{{ $likesCount }}</span></span>
                </div>

            </div>
            <div class="row">
                <div class="col text-center">
                    <div class="row">
                        <div class="col">
                            <!--bookmark-->
                            @if (Auth::check())
                                @if (Auth::user()->hasBookmarked($recipe->id))
                                    <!-- If the recipe is bookmarked by the user, show the unbookmark button -->
                                    <form action="{{ route('recipe.unbookmark', $recipe->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-dark mb-3" style="width: 100%  ;"><i class="fa fa-bookmark" aria-hidden="true"></i> Unbookmark</button>
                                    </form>
                                @else
                                    <!-- If the recipe is not bookmarked by the user, show the bookmark button -->
                                    <form action="{{ route('recipe.bookmark', $recipe->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-outline-secondary mb-3" style="width: 100%;"><i class="fa fa-bookmark" aria-hidden="true"></i> Bookmark</button>
                                    </form>
                                @endif
                            @else
                                <p>Please log in to bookmark recipes.</p>
                            @endif
                        </div>
                        <div class="col">
                            <!-- Like Button -->
                            @if ($recipe->isLikedBy(auth()->user()))
                            <form method="POST" action="{{ route('recipe.unlike', $recipe) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"  style="width: 100%;"><i class="fa fa-thumbs-o-down mx-2" aria-hidden="true"></i>Unlike</button>
                            </form>
                            @else
                                <form method="POST" action="{{ route('recipe.like', $recipe) }}">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-primary" style="width: 100%;"><i class="fa fa-thumbs-o-up mx-2" aria-hidden="true"></i>Like</button>
                                </form>
                            @endif
                        </div>

                    </div>
                </div>
            </div>

        </div>

        <div class="col-sm-4 mt-3 text-center-sm">
            <h2 class="fw-bold">Ingredients</h2>
            <div class="row ms-3">
                @if ($recipe->ingredients)
                <ul>
                    @foreach ($recipe->ingredients as $item)
                        <li class="fs-4 ms-5">{{ $item->ingredient_name }}</li>
                    @endforeach
                </ul>
                @endif
            </div>
        </div>

        <div class="col d-none d-lg-block">
            <p>Recommended tutorial</p>

            <!-- 16:9 aspect ratio -->
            <div class="embed-responsive embed-responsive-16by9">
                @if ($recipe->link)
                    <iframe class="embed-responsive-item" src="{{ $recipe->link }}" allowfullscreen></iframe>
                @else
                    <p>No tutorial available</p>
                @endif
            </div>
        </div>

    </div>

    <div class="row text-center-sm mx-auto my-3">
        <h2 class="fw-bold">Instructions</h2>
        @if ($recipe->steps)
        <ul class="mx-5">
            @foreach ($recipe->steps as $item)
            <li class="mb-4">
                <div class="row">
                    <div class="col-auto col-sm-6 col-lg-auto">
                        <span class="fw-bold h3">{{$item->order}}:</span>
                    </div>
                    <div class="col-sm-4 col-lg-6">
                        <span class="h4">{{$item->instruction}}</span>
                    </div>
                </div>
            </li>
            @endforeach
        </ul>
        @endif
    </div>

</div>



@endsection
