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
            <li class="nav-item">
                <a class="nav-link" href="{{ route('popular') }}">
                    <span class="h3">Popular</span>
                </a>
            </li>

            <!--add recipe-->
            <li class="nav-item active" role="presentation">
                <a class="nav-link active" id="add-tab" data-bs-toggle="tab"
                href="#addTabPane" role="tab" aria-controls="addTabPane"
                aria-selected="true">
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
    <!--makerecipe-->
    <div class="tab-content" id="addContent">

        <div class="tab-pane active" id="addTabPane" role="tabpanel" aria-labelledby="add-tab" tabindex="0">

            <div class="container-fluid">

                <div class="container-fluid">
                    <div class="row text-center my-3">
                        <span class="display-3 fw-bold">Make your own Pinoy Recipe</span>
                    </div>

                    <div class="row my-4">

                        <span class="display-5 fs-2 text-center">
                            Get ready to embark on a flavorful adventure through the vibrant world of Filipino cuisine.
                            Our webpage is your one-stop destination for sharing, discovering, and indulging in authentic Pinoy recipes that capture the essence of Filipino culture and tradition.
                        </span>
                    </div>

                    <div class="row shadow-lg py-2 mx-2 mb-3" style="background-color: #e4c1a0; width: 120rem;">

                        @if(session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form action="{{route('recipe.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row p-2">
                                <div class="col-lg-4 col-md-4 mx-auto">
                                    <!--name-->
                                    <div class="row">
                                        <div class="col-sm-12 my-2">
                                            <div class="row mb-3">
                                                <label for="name">Recipe Name</label>
                                                <div class="col-sm-12">
                                                  <input type="text" class="form-control" id="name" name="recipe_name" placeholder="Name of your recipe">
                                                </div>
                                            </div>
                                            <!--category-->
                                            <div class="row">
                                                <label for="category_id">Category</label>
                                                <div class="col-sm-12">
                                                    <select id="category_id" name="category_id" class="form-select mb-3" required>
                                                        <option value="" selected>Select Category</option>
                                                        @foreach($category as $category)
                                                            <option value="{{ $category->id }}">{{ $category->category }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <!--level-->
                                            <div class="row">
                                                <label for="level_id">Level</label>
                                                <div class="col-sm-12">
                                                    <select id="level_id" name="level_id" class="form-select mb-3" required>
                                                        <option value="" selected>Select Level</option>
                                                        @foreach($level as $level)
                                                            <option value="{{ $level->id }}">{{ $level->level }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <!--description-->
                                            <div class="row">
                                                <label for="desc">Recipe Description</label>
                                                <div class="col-sm-12">
                                                    <textarea name="recipe_description" class="form-control" placeholder="Description for your Recipe" id="desc" style="height: 90px"></textarea>
                                                </div>
                                            </div>
                                            <!--image-->
                                            <div class="row">
                                                <label for="image">Add Image</label>
                                                <div class="col-sm-12">
                                                    <input type="file" class="form-control" name="recipe_image" multiple>
                                                </div>
                                            </div>
                                            <!--link-->
                                            <div class="row mb-3">
                                                <label for="link">Add Link</label>
                                                <div class="col-sm-12">
                                                    <input type="url" class="form-control" name="link" placeholder="Youtube link">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 mx-auto">
                                    <!--ingredients-->
                                    <div class="row">
                                        <div class="col-sm-12 my-2">

                                            <div class="form-floating">
                                                <div class="mb-3" id="ingredients-container">
                                                    <label for="ingredients">Ingredients:</label>
                                                    <div class="ingredients-fields">
                                                        <div class="ingredients-field">
                                                            <input type="text" name="ingredients[0][ingredient_name]" class="form-control mb-2" placeholder="e.g 1/2 cup of sugar">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <button class="btn btn-warning " type="button" id="add-ingredients">Add ingredients</button>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-4 mx-auto">
                                    <!--steps-->

                                    <div class="form-floating my-2">
                                        <div class="col-sm-12">
                                            <div class="mb-3" id="steps-container">
                                                <label for="steps">Steps:</label>
                                                <div class="steps-fields">
                                                    <div class="steps-field">
                                                        <input type="text" name="steps[0][order]" class="form-control mb-2" placeholder="e.g Combine Dry Ingredients:" >
                                                        <textarea type="text" name="steps[0][instruction]" class="form-control mb-2" placeholder="e.g In a large bowl, whisk together the flour..." ></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <button class="btn btn-warning " type="button" id="add-steps">Add steps</button>
                                    </div>
                                </div>

                                <div class="row justify-content-center text-center">
                                    <button type="submit" class="btn btn-success w-25 ">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

        </div>

    </div>

</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
    $("#add-steps").click(function() {
        var index = $(".steps-field").length; // Get the current number of steps fields
        var html = `
            <div class="steps-field">
                <input type="text" name="steps[${index}][order]" class="form-control mb-2" placeholder="Add more" required>
                <textarea type="text" name="steps[${index}][instruction]" class="form-control mb-2" placeholder="Instruction" required></textarea>
            </div>`;
        $(".steps-fields").append(html);
    });
});


    $(document).ready(function() {
        $("#add-ingredients").click(function() {
            var index = $(".ingredients-field").length; // Get the current number of subject fields
            var html = `
                            <div class="ingredients-field">
                                <input type="text" name="ingredients[${index}][ingredient_name]" class="form-control mb-2" placeholder="Add more ingredient" >
                            </div>`;
            $(".ingredients-fields").append(html);
        });
    });
</script>

@endsection
