<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Students create</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>

    <div class="container d-flex justify-content-center">
        <div class="card p-4">
            <h1 class="mx-auto">Add Recipe</h1>
            <form action="{{ route('recipe.store') }}" method="POST" class="mx-auto" style="width: 500px;"  enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="recipe_name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="desc">Description:</label>
                    <input type="text" id="desc" name="recipe_description" class="form-control" required>
                </div>

                <label for="category_id">Category</label>
                <select id="category_id" name="category_id" class="form-select mb-3" required>
                    <option value="" selected>Select Category</option>
                    @foreach($category as $category)
                        <option value="{{ $category->id }}">{{ $category->category }}</option>
                    @endforeach
                </select>

                <label for="level_id">Level</label>
                <select id="level_id" name="level_id" class="form-select mb-3" required>
                    <option value="" selected>Select Level</option>
                    @foreach($level as $level)
                        <option value="{{ $level->id }}">{{ $level->level }}</option>
                    @endforeach
                </select>

                <label for="image">Add Image</label>
                <input type="file" class="form-control" name="recipe_image" multiple>

                <label for="link">Add Link</label>
                <input type="url" class="form-control" name="link" placeholder="Youtube link">

                <div class="row">
                    <div class="col">
                        <div class="mb-3" id="steps-container">
                            <label for="steps">Steps:</label>
                            <div class="steps-fields">
                                <div class="steps-field">
                                    <input type="text" name="steps[0][order]" class="form-control mb-2" placeholder="Step #" >
                                    <input type="text" name="steps[0][instruction]" class="form-control mb-2" placeholder="Instruction" >
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <button class="btn btn-warning " type="button" id="add-steps">Add steps</button>
                        </div>
                    </div>
                    <!--ingredients -->
                    <div class="col">
                        <div class="mb-3" id="ingredients-container">
                            <label for="ingredients">Ingredients:</label>
                            <div class="ingredients-fields">
                                <div class="ingredients-field">
                                    <input type="text" name="ingredients[0][ingredient_name]" class="form-control mb-2" placeholder="Name" >
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <button class="btn btn-warning " type="button" id="add-ingredients">Add ingredients</button>
                        </div>
                    </div>
                </div>

                <button class="btn btn-success" type="submit">Submit</button>
                <a class="btn btn-dark" href="{{route('recipe.dashboard')}}">Back to Home</a>

            </form>
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#add-steps").click(function() {
                var index = $(".ingredients-field").length; // Get the current number of subject fields
                var html = `
                    <div class="steps-field">
                        <input type="text" name="steps[${index}][order]" class="form-control mb-2" placeholder="Step #" required>
                        <input type="text" name="steps[${index}][instruction]" class="form-control mb-2" placeholder="Instruction" required>
                    </div>`;
                $(".steps-fields").append(html);
            });
        });

        $(document).ready(function() {
            $("#add-ingredients").click(function() {
                var index = $(".ingredients-field").length; // Get the current number of subject fields
                var html = `
                                <div class="ingredients-field">
                                    <input type="text" name="ingredients[${index}][ingredient_name]" class="form-control mb-2" placeholder="Name" >


                                </div>`;
                $(".ingredients-fields").append(html);
            });
        });
    </script>
</body>
</html>
