@extends ('Auth.layout')
@section('content')



<form action="{{url('/update/{id}')}}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Recipe name</label>
        <input type="text" name="recipe_name" class="form-control" value="{{$recipe->recipe_name}}">
    </div>

    <div class="row">
        <div class="col">
            <div class="mb-3">
                <label>Recipe description</label>
                <textarea name="recipe_description" value="{{$recipe->recipe}}"
                class="form-control" cols="10" rows="5"></textarea>
            </div>
        </div>

        <div class="col">
            <div class="mb-3 input-group">
                <label>Recipe steps</label>
                <div id="recipeSteps">
                    <input type="text" placeholder="order" name="order" class="form-control">
                    <textarea name="instruction" class="form-control" placeholder="instruction"></textarea>
                </div>
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

<script>
    function addRecipeStep() {
        var stepsContainer = document.getElementById('recipeSteps');

        var newStep = document.createElement('div');
        newStep.classList.add('step'); // Add a class for styling
        newStep.innerHTML = `
            <input type="text" placeholder="Order" name="order[]" class="form-control">
            <textarea name="instruction[]" class="form-control" cols="2" rows="2" placeholder="Instruction"></textarea>
            <div class="input-group-append">
                <button type="button" class="btn btn-danger" onclick="removeStep(this)">Remove</button>
            </div>
        `;

        stepsContainer.appendChild(newStep);
    }

    function removeStep(btn) {
        var stepToRemove = btn.parentNode.parentNode; // Get the parent of the button's parent
        stepToRemove.parentNode.removeChild(stepToRemove);
    }
</script>



@endsection
