@extends('hospital.layouts.app')
@section('content')
<div class="col-12 grid-margin">
    <div class="card h-50 p-4">
        <div class="card-body ">
            <h4 class="card-title">Add New Driver</h4>
            <form role="form" id="booking-form" method="post" autocomplete="off" action="{{ url('/api/driver') }}">
                @csrf
                <hr>
                <p class="card-description">Driver info</p>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Name <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="name" id="name">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Email <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="email" id="email">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Password <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                                <input type="password" class="form-control" name="password" id="password">
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <p class="card-description"> Additional Details </p>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Assign Vehicle </label>
                        <div class="col-sm-12">
                            <select class="form-control" name="vehicle_id" id="vehicle_id">
                                @foreach($vehicles as $vehicle)
                                @if($vehicle->hospital_id == auth()->user()->id && $vehicle->status == 'available')
                                <option value="{{$vehicle->id}}">{{$vehicle->title}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <!-- <div class="form-check form-switch d-flex align-items-center mb-4">
										<input class="form-check-input" type="checkbox" id="terms_conditions" name="terms_conditions" checked="">
										<label class="form-check-label ms-3 mb-0" for="terms_conditions">I agree to the <a href="javascript:;" class="text-dark"><u>Terms and Conditions</u></a>.</label>
									</div> -->
                        <br>
                    </div>
                    <input type="hidden" name="hospital_id" value="{{ Auth::id() }}">
                    <div class="col-md-12">
                        <button type="submit" class="btn bg-gradient-dark w-100">Add a Driver</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


@endsection