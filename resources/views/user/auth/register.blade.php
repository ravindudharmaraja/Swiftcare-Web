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
                            <div class="row mt-3">
                                <div class="col-2 text-center ms-auto">
                                    <a class="btn btn-link px-3" href="javascript:;">
                                        <i class="fa fa-facebook text-white text-lg" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <div class="col-2 text-center px-1">
                                    <a class="btn btn-link px-3" href="javascript:;">
                                        <i class="fa fa-github text-white text-lg" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <div class="col-2 text-center me-auto">
                                    <a class="btn btn-link px-3" href="javascript:;">
                                        <i class="fa fa-google text-white text-lg" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="registrationForm" class="text-start" method="POST" action="{{ route('register') }}">
                            @csrf
                            <!-- Step 1: Personal Information (Initially hidden) -->
                            <div class="step" id="step1">
                            <h4 class="text-center">User Information</h4>
                            <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-group input-group-outline my-3">
                                            <label class="form-label" for="first_name">First Name</label>
                                            <input type="text" class="form-control" id="first_name" name="first_name" required autofocus>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group input-group-outline my-3">
                                            <label class="form-label" for="last_name">Last Name</label>
                                            <input type="text" class="form-control" id="last_name" name="last_name" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="input-group input-group-outline mb-3">
                                    <label class="form-label" for="contact_number">Contact Number</label>
                                    <input type="contact_number" class="form-control" id="contact_number" name="contact_number" required>
                                </div>
                                <div class="input-group input-group-outline mb-3">
                                    <label class="form-label" for="address">Address</label>
                                    <input type="address" class="form-control" id="address" name="address" required>
                                </div>
                               
                                <button type="button" class="btn bg-gradient-primary w-100 my-4 mb-2" id="nextStep1">Next</button>
                            </div>

                            <!-- Step 2: Account Information -->
                            <div class="step2" id="step2">
                            <h4 class="text-center">User Registation</h4>
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
                                <div class="row">
                                    <!-- Previous Button -->
                                    <div class="col-4">
                                    <button type="button" class="btn bg-gradient-primary w-100 my-4 mb-2" id="prevStep2"><i class="fa fa-arrow-left" aria-hidden="true"></i></button>
                                    </div>
                                    
                                    <!-- Register Button (5 out of 7 columns) -->
                                    <div class="col-8">
                                    <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Register</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection