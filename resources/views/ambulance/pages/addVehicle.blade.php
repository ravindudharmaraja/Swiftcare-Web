@extends('hospital.layouts.app')

@section('content')

<div class="col-12 grid-margin">
                <div class="card h-50 p-4">
                  <div class="card-body ">
                    <h4 class="card-title">Add New Vehicle</h4>
                    <form role="form" id="booking-form" method="post" autocomplete="off" action="{{ url('/api/vehicle') }}">
					@csrf
                      <p class="card-description">Vehicle info</p>
					  <hr>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Title <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                              <input type="text" class="form-control" name="title" id="title">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Brand <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                              <select class="form-control" name="brand" id="brand">
                                <option value="Audi">Audi</option>
								<option value="BMW">BMW</option>
								<option value="Chevrolet">Chevrolet</option>
								<option value="Dodge">Dodge</option>
								<option value="Ferrari">Ferrari</option>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Vehicle Overview <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                              <input type="text" class="form-control" name="overview" id="overview">
                            </div>
                          </div>
                        </div>
                      </div>
					  <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-6 col-form-label">Price Per Day <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                              <input type="text" class="form-control" name="price" id="price">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Fuel Type <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                              <select class="form-control" name="fuel" id="fuel">
                                <option value="Petrol">Petrol</option>
								<option value="Desel">Desel</option>
								<option value="Bio Gas">Bio Gas</option>
								<option value="Electric">Electric</option>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
					  <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-6 col-form-label">Reg.No. <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                              <input type="text" class="form-control" name="plate_number" id="plate_number">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-6 col-form-label">Seating Capacity <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                              <input type="text" class="form-control" name="capacity" id="capacity">
                            </div>
                          </div>
                        </div>
                      </div>
					  <hr>
					  <p class="card-description"> Image Upload </p>
					  <hr>
                      <div class="row">
								<div class="col-md-6">
									<div class="input-group input-group-static mb-4">
										<label for="image1">Profile Image <span style="color:red;">*</span></label>
										<input class="form-control" name="image1" id="image1" accept="image/*" type="file">
									</div>
								</div>
								<div class="col-md-6">
									<div class="input-group input-group-static mb-4">
										<label for="image2"> Image 2</label>
										<input class="form-control" name="image2" id="image2" accept="image/*" type="file">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="input-group input-group-static mb-4">
										<label for="image3">Image 3</label>
										<input class="form-control" name="image3" id="image3" accept="image/*" type="file">
									</div>
								</div>
								<div class="col-md-6">
									<div class="input-group input-group-static mb-4">
										<label for="image4">Image 4</label>
										<input class="form-control" name="image4" id="image4" accept="image/*" type="file">
									</div>
								</div>
							</div>
							<div>
							<hr>
							<p class="card-description">Accessories</p>
							<hr>
							<div class="row">
								<div class="col-md-3">
								<div class="form-check">
									<label class="form-check-label">
									<input type="checkbox" class="form-check-input" id="airconditioner" name="airconditioner" value="1" checked=""> Air Conditioner <i class="input-helper"></i></label>
								</div>
								</div>
								<div class="col-md-3">
								<div class="form-check">
									<label class="form-check-label">
									<input class="form-check-input" type="checkbox" id="powerdoorlocks" name="powerdoorlocks" value="1">Power Door Locks<i class="input-helper"></i></label>
								</div>
								</div>
								<div class="col-md-3">
								<div class="form-check">
									<label class="form-check-label">
									<input class="form-check-input" type="checkbox" id="antilockbrakingsystem" name="antilockbrakingsystem" value="1">AntiLock Braking System<i class="input-helper"></i></label>
								</div>
								</div>
								<div class="col-md-3">
								<div class="form-check">
									<label class="form-check-label">
									<input class="form-check-input" type="checkbox" id="brakeassist" name="brakeassist" value="1">Brake Assist<i class="input-helper"></i></label>
								</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-3">
								<div class="form-check">
									<label class="form-check-label">
									<input type="checkbox" class="form-check-input" id="powersteering" name="powersteering" value="1" checked="">Power Steering<i class="input-helper"></i></label>
								</div>
								</div>
								<div class="col-md-3">
								<div class="form-check">
									<label class="form-check-label">
									<input class="form-check-input" type="checkbox" id="driverairbag" name="driverairbag" value="1">Driver Airbag<i class="input-helper"></i></label>
								</div>
								</div>
								<div class="col-md-3">
								<div class="form-check">
									<label class="form-check-label">
									<input class="form-check-input" type="checkbox" id="passengerairbag" name="passengerairbag" value="1">Passenger Airbag<i class="input-helper"></i></label>
								</div>
								</div>
								<div class="col-md-3">
								<div class="form-check">
									<label class="form-check-label">
									<input class="form-check-input" type="checkbox" id="powerwindow" name="powerwindow" value="1">Power Window<i class="input-helper"></i></label>
								</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-3">
								<div class="form-check">
									<label class="form-check-label">
									<input type="checkbox" class="form-check-input" id="centrallocking" name="centrallocking" value="1" checked="">Centrallocking<i class="input-helper"></i></label>
								</div>
								</div>
								<div class="col-md-3">
								<div class="form-check">
									<label class="form-check-label">
									<input class="form-check-input" type="checkbox" id="crashcensor" name="crashcensor" value="1">Crash Sensor<i class="input-helper"></i></label>
								</div>
								</div>
								<div class="col-md-3">
								<div class="form-check">
									<label class="form-check-label">
									<input class="form-check-input" type="checkbox" id="cdplayer" name="cdplayer" value="1">CD Player<i class="input-helper"></i></label>
								</div>
								</div>
								<div class="col-md-3">
								<div class="form-check">
									<label class="form-check-label">
									<input class="form-check-input" type="checkbox" id="leatherseats" name="leatherseats" value="1">Leather Seats<i class="input-helper"></i></label>
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
						<button type="submit" class="btn bg-gradient-dark w-100">Add an Ambulance</button>
					</div>
				</div>
            </form>
        </div>
    </div>
</div>
<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



@endsection