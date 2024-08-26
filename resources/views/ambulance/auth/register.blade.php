@extends('admin.layouts.default')
@section('content')
<div class="row">
    <br>
    <br>
</div>
<div class="container my-auto">
        <div class="row">
            <div class="col-lg-4 col-md-8 col-12 mx-auto">
                <div class="card z-index-0 fadeIn3 fadeInBottom">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                            <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Register</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="registrationForm" class="text-start" method="POST" action="{{ route('ambulance.register') }}">
                            @csrf
                            <!-- Step 1: Personal Information (Initially hidden) -->
                            <h4 class="text-center">User Information</h4>
                            
                                <br>
                                <div class="input-group input-group-outline mb-3">
                                    <label class="form-label" for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                                <div class="input-group input-group-outline mb-3">
                                    <label class="form-label" for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div>
                                <div class="input-group input-group-outline mb-3">
                                    <label class="form-label" for="password_confirmation">Confirm Password</label>
                                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                                </div>
                                <div class="form-check form-switch d-flex align-items-center mb-3">
                                    <input class="form-check-input" type="checkbox" id="rememberMe" checked>
                                    <label class="form-check-label mb-0 ms-3" for="rememberMe">Remember me</label>
                                </div>
                                 
                                    <div class="col-8">
                                    <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Register</button>
                                    </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection