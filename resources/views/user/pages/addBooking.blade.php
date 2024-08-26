@extends('user.layouts.app')
@section('content')
<div class="col-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Create New Booking</h4>
      <p class="card-description"> Basic form elements </p>
      <form class="forms-sample" method="post" action="{{ route('user.post.booking') }}">
        @csrf
        <div class="form-group">
          <label for="selectVehicle">Ambulance</label>
          <select class="form-control" id="selectVehicle">
            @foreach ($vehicles as $vehicle)
            <option>{{ $vehicle->title }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="exampleInputCity1">Date</label>
          <div id="datepicker-popup" class="input-group date datepicker">
            <div class="input-group input-daterange d-flex align-items-center">
              <input type="text" class="form-control" value="2012-04-05" name="fromdate" id="fromdate">
              <div class="input-group-addon input-group-append"><i class="mdi mdi-calendar input-group-text"></i></div>
              <div class="input-group-addon mx-4">to</div>
              <input type="text" class="form-control" value="2012-04-19" name="todate" id="todate">
              <div class="input-group-addon input-group-append"><i class="mdi mdi-calendar input-group-text"></i></div>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="exampleTextarea1">Time</label>
          <div class="input-group" data-bs-target="#timepicker-example" data-toggle="datetimepicker">
            <input type="text" class="form-control datetimepicker-input" data-bs-target="#timepicker-example"
              name="time" id="time">
            <div class="input-group-addon input-group-append"><i class="mdi mdi-clock input-group-text"></i></div>
          </div>
        </div>
        <div class="form-group">
          <label for="exampleTextarea1">Message</label>
          <textarea class="form-control" name="message" id="message" rows="4"></textarea>
        </div>
        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
        <input type="hidden" name="hospital_id" value="{{ $vehicle->hospital->id }}">
        <input type="hidden" name="vehicle_id" value="{{ $vehicle->id }}">
        <button type="submit" class="btn btn-primary me-2">Submit</button>
        <button class="btn btn-dark">Cancel</button>
      </form>
    </div>
  </div>
</div>

@endsection