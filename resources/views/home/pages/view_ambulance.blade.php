@extends('home.layout.default')

@section('content')

<header>
    <div id="carouselExampleControls" class="carousel slide pointer-event" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active carousel-item-start">
                <div class="page-header min-vh-75" style="background-image: url('https://uploads-ssl.webflow.com/6436c2585cb0dc081fbc8cfe/643735408ac92318b999c85a_Road-Ambulance-Services.jpg');" loading="lazy">
                    <div class="container">
                        <div class="col-lg-6 my-auto">
                            <h4 class="text-white mb-0 fadeIn1 fadeInBottom">{{ $vehicle->brand }}</h4>
                            <h1 class="text-white fadeIn2 fadeInBottom">{{ $vehicle->title }}</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item carousel-item-next carousel-item-start">
                <div class="page-header min-vh-75" style="background-image: url('https://uploads-ssl.webflow.com/6436c2585cb0dc081fbc8cfe/643735408ac92318b999c85a_Road-Ambulance-Services.jpg');" loading="lazy">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6 my-auto">
                                <h4 class="text-white mb-0 fadeIn1 fadeInBottom">{{ $vehicle->brand }}</h4>
                                <h1 class="text-white fadeIn2 fadeInBottom">{{ $vehicle->title }}</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item carousel-item-next carousel-item-start">
                <div class="page-header min-vh-75" style="background-image: url('https://uploads-ssl.webflow.com/6436c2585cb0dc081fbc8cfe/643735408ac92318b999c85a_Road-Ambulance-Services.jpg');" loading="lazy">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6 my-auto">
                                <h4 class="text-white mb-0 fadeIn1 fadeInBottom">{{ $vehicle->brand }}</h4>
                                <h1 class="text-white fadeIn2 fadeInBottom">{{ $vehicle->title }}</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="min-vh-75 position-absolute w-100 top-0">
        <a class="carousel-control-prev ms-0 ms-md-n5 mt-12 mb-n7 mt-md-0 mb-md-0" href="#carouselExampleControls" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon position-absolute bottom-50" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </a>
        <a class="carousel-control-next ms-0 ms-md-n5 mt-12 mb-n7 mt-md-0 mb-md-0" href="#carouselExampleControls" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon position-absolute bottom-50" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </a>
    </div>
    <div class="card shadow-lg mt-n5 mx-4 mb-4">
        <div class="card-body">
            <div class="container-fluid px-0">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-2 mb-2">
                                    <div style="background-color: antiquewhite;" class="card shadow-sm border d-flex align-items-center justify-content-center fadeIn1 fadeInBottom" >
                                        <div class="card-body text-center">
                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                            <h5>{{ $vehicle->plate_number }}</h5>
                                            <p>Reg.No</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2 mb-2">
                                    <div style="background-color: azure;" class="card shadow-sm border d-flex align-items-center justify-content-center fadeIn2 fadeInBottom">
                                        <div class="card-body text-center">
                                            <i class="fa fa-gas-pump" aria-hidden="true"></i>
                                            <h5 class="align-items-center">{{ $vehicle->fuel }}</h5>
                                            <p>Fuel Type</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2 mb-2">
                                    <div style="" class="card shadow-sm border d-flex align-items-center justify-content-center fadeIn3 fadeInBottom">
                                        <div class="card-body text-center">
                                            <i class="fa fa-user-plus" aria-hidden="true"></i>
                                            <h5>{{ $vehicle->capacity }}</h5>
                                            <p>Seats</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2 mb-2">
                                </div>
                                <div class="col-md-4 mb-2">
                                    <div class=" align-items-right justify-content-right">
                                        <div class="card-body text-right">
                                            <h5 style="color:red">Rs.{{ $vehicle->price }}.00 </h5>
                                            <p>Pre Day</p>
                                            
                                            <h5 style="color:gray">{{ $vehicle->hospital->name }}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="listing_more_info">
                                <div class="listing_detail_wrap">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-pills nav-fill p-1" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link mb-0 px-0 py-1 d-flex align-items-center justify-content-center active" data-bs-toggle="tab" href="#vehicle-overview" role="tab" aria-controls="vehicle-overview" aria-selected="true">
                                                <i class="material-icons text-sm me-2">dashboard</i> Overview
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link mb-0 px-0 py-1 d-flex align-items-center justify-content-center" data-bs-toggle="tab" href="#accessories" role="tab" aria-controls="accessories" aria-selected="false">
                                                <i class="material-icons text-sm me-2">dashboard</i> Accessories
                                            </a>
                                        </li>
                                    </ul>
                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane active" id="vehicle-overview">
                                            <br>
                                            <p>{{ $vehicle->overview }}</p>
                                        </div>
                                        <!-- Accessories -->
                                        <div role="tabpanel" class="tab-pane" id="accessories">
                                            <br>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <div class="checkbox checkbox-inline">
														<input type="checkbox" id="inlineCheckbox1" name="airconditioner" value="1" {{  $vehicle->airconditioner == 1 ? 'checked' : '' }} disabled>
														<label for="inlineCheckbox1"> Air Conditioner </label>
													</div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="checkbox checkbox-inline">
														<input type="checkbox" id="powerdoorlocks" name="powerdoorlocks" value="1" {{  $vehicle->powerdoorlocks == 1 ? 'checked' : '' }} disabled>
														<label for="powerdoorlocks"> Power Door Locks </label>
													</div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="checkbox checkbox-inline">
														<input type="checkbox" id="antilockbrakingsys" name="antilockbrakingsys" value="1" {{  $vehicle->antilockbrakingsys == 1 ? 'checked' : '' }} disabled>
														<label for="antilockbrakingsys"> AntiLock Braking System </label>
													</div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="checkbox checkbox-inline">
														<input type="checkbox" id="brakeassist" name="brakeassist" value="1" {{  $vehicle->brakeassist == 1 ? 'checked' : '' }} disabled>
														<label for="brakeassist"> Brake Assist </label>
													</div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <div class="checkbox checkbox-inline">
														<input type="checkbox" id="powersteering" name="powersteering" value="1" {{  $vehicle->powersteering == 1 ? 'checked' : '' }} disabled>
														<label for="inlineCheckbox5"> Power Steering </label>
													</div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="checkbox checkbox-inline">
														<input type="checkbox" id="driverairbag" name="driverairbag" value="1" {{  $vehicle->driverairbag == 1 ? 'checked' : '' }} disabled>
														<label for="driverairbag">Driver Airbag</label>
													</div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="checkbox checkbox-inline">
														<input type="checkbox" id="passengerairbag" name="passengerairbag" value="1" {{  $vehicle->passengerairbag == 1 ? 'checked' : '' }} disabled>
														<label for="passengerairbag"> Passenger Airbag </label>
													</div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="checkbox checkbox-inline">
														<input type="checkbox" id="powerwindow" name="powerwindow" value="1" {{  $vehicle->powerwindow == 1 ? 'checked' : '' }} disabled>
														<label for="powerwindow"> Power Windows </label>
													</div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <div class="checkbox checkbox-inline">
														<input type="checkbox" id="cdplayer" name="cdplayer" value="1" {{  $vehicle->cdplayer == 1 ? 'checked' : '' }} disabled>
														<label for="cdplayer"> CD Player </label>
													</div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="checkbox h checkbox-inline">
														<input type="checkbox" id="centrallocking" name="centrallocking" value="1" {{  $vehicle->centrallocking == 1 ? 'checked' : '' }} disabled>
														<label for="centrallocking">Central Locking</label>
													</div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="checkbox checkbox-inline">
														<input type="checkbox" id="crashcensor" name="crashcensor" value="1" {{  $vehicle->crashcensor == 1 ? 'checked' : '' }} disabled>
														<label for="crashcensor"> Crash Sensor </label>
													</div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="checkbox checkbox-inline">
														<input type="checkbox" id="leatherseats" name="leatherseats" value="1" {{  $vehicle->leatherseats == 1 ? 'checked' : '' }} disabled>
														<label for="leatherseats"> Leather Seats </label>
													</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <!--Side-Bar (Moved to the left)-->
                        <aside class="col-md-3">
                            <div class="card shadow">
                                <div class="card-body" style="background-color: #c5c5c5; border-radius: 10px;" >
                                    <div class="sidebar_widget">
                                        <div class="widget_heading" style="text-align: center;">
                                            <h5><i class="fa fa-envelope text-center" aria-hidden="true"></i> Book Now</h5>
                                        </div>
                                        <form method="post" action="{{ url('/api/bookings/create') }}">
                                        <div class="input-group input-group-static mb-4">
                                            <label for="date">From</label>
                                            <input type="date" class="form-control" name="fromdate" id="fromdate" required>
                                        </div>
                                        <div class="input-group input-group-static mb-4">
                                            <label for="date">To</label>
                                            <input type="date" class="form-control" name="todate" id="todate" required>
                                        </div>
                                        <div class="input-group input-group-static mb-4">
                                            <label for="time">Time</label>
                                            <input type="time" class="form-control" name="time" id="time" required>
                                        </div>
                                            <div class="form-group">
                                                <textarea rows="4" class="form-control" name="message" id="message" placeholder="Message" required></textarea>
                                            </div>
                                            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                            <input type="hidden" name="hospital_id" value="{{ $vehicle->hospital->id }}">
                                            <input type="hidden" name="vehicle_id" value="{{ $vehicle->id }}">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn bg-gradient-dark w-100">Book Ambulance</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </aside>
                        <!--/Side-Bar-->
                    </div>
                    <div class="space-20"></div>
                    <div class="divider"></div>
                </div>
            </div>
        </div>
    </div>  
</header>

@endsection
