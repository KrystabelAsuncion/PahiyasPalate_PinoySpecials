<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container mt-5">
        <div class="display-1 text-center my-5">ONE TO MANY RS</div>
        <div class="row border">
            <div class="col border">
                <div class="row">
                    <div class="col">
                        <div class="row">
                            <div class="col">
                                <h1>Recipes</h1>
                            </div>

                            <div class="col-auto my-auto">
                                <a class="btn btn-lg btn-success" href="{{ route('recipe.create') }}">Add Student</a>
                            </div>
                        </div>
                    </div>

                </div>
                @foreach ($recipes as $recipe)
                    <div class="row">
                        <div class="col border d-inline">
                            <b>Name: </b>{{$recipe->recipe_name}}
                            <div class="row">
                                <div class="col">
                                    <b>Course: </b>{{$recipe->recipe_description}}
                                    <div class="row">
                                        <div class="col">
                                            <b>Recipe id: </b>{{$recipe->id}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col">

                                    <!--action buttons-->
                                    <a class="btn btn-lg btn-outline-secondary" href="{{route('recipe.edit',$recipe->id)}}">EDIT</a>
                                    <a class="btn btn-lg btn-danger" href="{{route('recipe.destroy',$recipe->id)}}">DELETE</a>
                                </div>
                            </div>

                        </div>

                        <div class="col">
                            <h1>Steps</h1>
                            <div class="row">
                                <div class="col border">
                                    <h4>Order</h4>
                                </div>
                                <div class="col border">
                                    <h4>Instruction</h4>
                                </div>
                            </div>
                            @foreach ($recipe->steps as $step)
                                <div class="row">
                                    <div class="col border">
                                        {{$step->order}}
                                    </div>
                                    <div class="col border">
                                        {{$step->instruction}}
                                    </div>

                                </div>
                            @endforeach

                        </div>
                        <div class="col">
                            <h1>Ingredients</h1>
                            <div class="row">
                                <div class="col border">
                                    <h4>name</h4>
                                </div>
                            </div>
                            @foreach ($recipe->ingredients as $ing)
                                <div class="row">
                                    <div class="col border">
                                        {{$ing->ingredient_name}}
                                    </div>

                                </div>
                            @endforeach
                        </div>
                        <div class="col">
                            <h1>image</h1>
                            <div class="row">
                                <div class="col border">
                                    <img src="{{ asset('storage/images/'.$recipe->recipe_image) }}" alt="Recipe Image">
                                </div>
                                <div class="col border">
                                    {{$recipe->link}}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="row">
            <!--category-->
            <div class="col ">
                <h1>Category</h1>
                <div class="row">
                    <div class="col">
                        <div class="row">
                            <div class="col border">
                                <h4>Name</h4>
                            </div>
                            <div class="col border">
                                <h4>Levels</h4>
                            </div>
                        </div>
                    </div>
                </div>
                @foreach ($category as $data)
                    <div class="row">
                        <div class="col">
                            <div class="row">
                            </div>
                            <div class="row">
                                <div class="col border">
                                    {{$data->category}}
                                </div>
                                <div class="col border">
                                    @foreach ($data->levels as $level)
                                        {{ $level->level }}
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>


</body>
</html>
