@extends ('Auth.layout')
@section('content')

<table class="table table-bordered">
    <thead>
        <tr>
            <th>id</th>
            <th>Category</th>
            <th>levels</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($category as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->category}}</td>
                <td>
                    @foreach ($item->level as $level)
                        {{ $level->level }}
                        @if (!$loop->last)
                            <br>    <!-- Add a comma if it's not the last level -->
                        @endif
                    @endforeach
                </td>
            </tr>
        @endforeach

    </tbody>

</table>

<table class="table">
    <thead>
        <tr>
            <th>id</th>
            <th>recipe_name</th>
            <th>category</th>
            <th>level</th>
            <th>description</th>
            <th>action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($recipe as $item)
            <tr>

                <td>{{$item->id}}</td>
                <td>{{$item->recipe_name}}</td>
                <td>{{$item->category->category}}</td>
                <td>{{$item->level->level}}</td>
                <td>{{$item->recipe_description}}</td>
                <td>
                    <a href="{{url('/edit/{id}')}}" class="btn btn-outline-secondary">
                        edit
                    </a>
                    <button class="btn btn-outline-danger">
                        delete
                    </button>
                </td>

            </tr>
        @endforeach

    </tbody>
</table>


<form action="{{route('store')}}" method="POST">
    @csrf

    <div class="mb-3">
        <label>Recipe name</label>
        <input type="text" name="recipe_name" class="form-control">
    </div>

    <div class="row">
        <div class="col">
            <div class="mb-3">
                <label>Recipe description</label>
                <textarea name="recipe_description" class="form-control" cols="10" rows="5"></textarea>
            </div>
        </div>

        <div class="col">
            <div class="mb-3 input-group">
                <label>Recipe steps</label>
                <textarea name="instruction" class="form-control" rows="5" style="width: 600px;" placeholder="instruction"></textarea>
            </div>
        </div>
    </div>

    <div class="mb-3">
        <label>Select category</label>
        <select name="category_id" class="form-control">
            @foreach ($category as $item)
                <option value="{{$item->id}}">{{$item->category}}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Select Level</label>
        <select name="level_id" class="form-control">
            @foreach ($levels->take(3) as $item)
                <option value="{{$item->id}}">{{$item->level}}</option>
            @endforeach
        </select>
    </div>

    <button class="btn btn-success" type="submit">
        submit
    </button>

</form>




@endsection
