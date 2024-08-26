@extends('hospital.layouts.app')

@section('content')
<br>
<div class="container">
    <div class="card">
        <div class="card-body p-5">
             @include('user.profile.partials.update-profile-information-form')
        </div>
    </div>
    <br>
    <div class="card">
        <div class="card-body p-5">
             @include('user.profile.partials.update-password-form')
        </div>
    </div>
    <br>
    <div class="card">
        <div class="card-body p-5">
            @include('user.profile.partials.delete-user-form')
        </div>
    </div>
</div>
        
@endsection
