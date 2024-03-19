@extends('Admin.layout')
@section('content')



<style>

    header{
        height: 50px;
        width: 100%;
        background: bisque;
    }

</style>

<!--navbar-->
<header>



</header>
<div class="d-flex align-items-start mt-3">
    <div class="nav flex-column nav-pills me-3 display-6" id="v-pills-tab" role="tablist" aria-orientation="vertical">
        <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home"
        type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">
            Dashboard
        </button>
        <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile"
        type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">
            Profile
        </button>
        <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Messages</button>
        <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</button>

    </div>
    <div class="tab-content" id="v-pills-tabContent">
        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
            <h1>Dashboard</h1>

            <h2>$userCount</h2>
        </div>
        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">...</div>
        <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">...</div>
        <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">...</div>

    </div>
</div>



@endsection
