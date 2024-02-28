<style>
    .section-posts, .section-users {
    max-height: 400px; /* Adjust the height as needed */
    overflow-y: auto; /* Add vertical scroll if content exceeds the height */
    }
</style>


@extends('Admin.layout')
@section('content')

<!--navbar-->
<nav class="navbar bg-light sticky-top bg-dark mb-4">
    <div class="container-fluid">
        <span class="navbar-brand mb-0 h1" style="color: white">ADMIN PS</span>
    </div>
    <div class="container-fluid justify-content-center">
        <div class="nav nav-pills me-3 h3" id="v-pills-tab" role="tablist">
            <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home"
            type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Dashboard</button>

            <button class="nav-link" id="v-pills-database-tab" data-bs-toggle="pill" data-bs-target="#v-pills-database"
            type="button" role="tab" aria-controls="v-pills-database" aria-selected="false">Add content</button>

            <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages"
            type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Messages</button>
            <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</button>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="container">
        <!--content-->
        <div class="tab-content h4" id="v-pills-tabContent">
            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                <div class="container">
                    <!--tables-->
                    <section class="section-posts">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-2">
                                    <div class="card p-2">
                                        <h1>Users</h1>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="card p-2">
                                        <h1>Posts</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="my-5">
                        <h1>Posts</h1>
                        <table class="table table-bordered">
                            <thead class="text-center">
                                <tr>
                                    <th style="background: gainsboro;">Recipe_name</th>
                                    <th style="background: rgb(137, 186, 137);">Recipe_description</th>
                                    <th style="background: rgb(245, 182, 182);">Recipe_category</th>
                                    <th style="background: rgb(211, 205, 149);">Recipe_ingredients</th>
                                    <th  style="background: rgb(255, 219, 151);">Recipe_steps</th>
                                    <th>Recipe_image</th>
                                    <th style="background: rgb(158, 106, 106);">Author</th>
                                    <th style="background: rgb(193, 255, 193);">Views</th>
                                    <th style="background: rgb(255, 255, 175);">Bookmark</th>
                                    <th>Youtube Link</th>
                                    <th>Operation</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach ($recipes as $item)
                                    <tr>
                                        <td>{{$item->recipe_name}}</td>
                                        <td>{{$item->recipe_description}}</td>
                                        <td>{{$item->category->name}}</td>
                                        <td>
                                            {{$item->recipe_ingredients}}
                                        </td>

                                        <td>{{$item->recipe_steps}}</td>
                                        <td>{{$item->recipe_image}}</td>
                                        <td>author</td>
                                        <td>{{$item->views}}</td>
                                        <td>bookmark</td>

                                        <td>
                                            <button class="btn btn-outline-success">Edit</button>
                                            <button class="btn btn-outline-danger">Delete</button>
                                            <button class="btn btn-outline-secondary">Add Ingredients</button>
                                            <button class="btn btn-outline-primary">Add Steps</button>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </section>

                    <hr class="my-5">
                    <section class="section-users">
                        <h1>Users</h1>
                        <table class="table table-bordered custom-table" style="width: 100%;">
                            <thead class="text-center">
                                <tr>
                                    <th>User id</th>
                                    <th>Username</th>
                                    <th>User Email</th>
                                    <th>User Password</th>
                                    <th>Created time</th>
                                </tr>
                            </thead>
                            <tbody class="text-center fs-5">
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->username}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->password}}</td>
                                        <td>{{ $user->created_at->format('Y-m-d H:i:s') }}</td>
                                        <td>
                                            <button class="btn btn-outline-success">Edit</button>
                                            <button class="btn btn-outline-danger">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </section>
                </div>
            </div>

            <div class="tab-pane fade" id="v-pills-database" role="tabpanel" aria-labelledby="v-pills-database-tab">
                <div class="container">
                    <!--inputdata-->
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{session('status')}}
                    </div>
                    @endif
                    <!--form-->
                    <div class="container">
                        <form action="{{route('input')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">

                                <div class="col">
                                    <div class="mb-3 mt-3">
                                        <label for="name" class="form-label">Recipe name</label>
                                        <input type="text" class="form-control" id="name" placeholder="Enter name" name="recipe_name">
                                    </div>

                                    <div class="mb-3 mt-3">
                                        <label for="description" class="form-label">Recipe description</label>
                                        <textarea class="form-control" id="description" rows="4" name="recipe_description"></textarea>
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="cat" class="form-label">Recipe category</label>
                                        <input type="text" class="form-control" id="cat" placeholder="Enter category" name="recipe_category">
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="mb-3 mt-3">
                                        <label for="ingredients" class="form-label">Recipe ingredients</label>
                                        <textarea class="form-control" id="ingredients" rows="4" name="recipe_ingredients"></textarea>
                                    </div>

                                    <div class="mb-3 mt-3">
                                        <label for="steps" class="form-label">Recipe steps</label>
                                        <textarea class="form-control" id="ingredients" rows="4" name="recipe_steps"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3 mt-3">
                                        <label for="image" class="form-label">Image input</label>
                                        <input type="file" name="recipe_image" class="form-control">
                                    </div>
                                </div>
                                <!--<td>$item->recipe_link</td>
                                <div class="col">
                                    <div class="mb-3 mt-3">
                                        <label for="yt" class="form-label">Recipe Youtube</label>
                                        <input type="text" class="form-control" id="yt" placeholder="Enter Youtube Link" name="recipe_link">
                                    </div>
                                </div>-->
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">

            </div>
            <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">...</div>

        </div>
    </div>
</div>

@endsection
