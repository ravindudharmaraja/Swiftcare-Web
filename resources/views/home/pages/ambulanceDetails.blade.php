@extends('home.layout.default')

@section('content')
<main id="main" class="">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">
        <ol>
          <li><a href="/">Home</a></li>
          <li>Ambulance</li>
        </ol>
        <h2>Ambulance Details</h2>
      </div>
    </section>
    <!-- End Breadcrumbs -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-8">
            <div class="portfolio-details-slider swiper swiper-initialized swiper-horizontal swiper-pointer-events swiper-backface-hidden">
              <div class="swiper-wrapper align-items-center" id="swiper-wrapper-07b4f49877104022d" aria-live="off" style="transform: translate3d(-2088px, 0px, 0px); transition-duration: 0ms;"><div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-active" data-swiper-slide-index="2" role="group" aria-label="3 / 3" style="width: 696px;">
                  <img src="{{ $vehicles->image2 }}" alt="">
                </div>

                <div class="swiper-slide swiper-slide-duplicate-next" data-swiper-slide-index="0" role="group" aria-label="1 / 3" style="width: 696px;">
                  <img src="{{ $vehicles->image3 }}" alt="">
                </div>

                <div class="swiper-slide swiper-slide-prev" data-swiper-slide-index="1" role="group" aria-label="2 / 3" style="width: 696px;">
                  <img src="{{ $vehicles->image4 }}" alt="">
                </div>

                <div class="swiper-slide swiper-slide-active" data-swiper-slide-index="2" role="group" aria-label="3 / 3" style="width: 696px;">
                  <img src="{{ $vehicles->image1 }}" alt="">
                </div>

              <div class="swiper-slide swiper-slide-duplicate swiper-slide-next" data-swiper-slide-index="0" role="group" aria-label="1 / 3" style="width: 696px;">
                  <img src="assets/img/portfolio/portfolio-1.jpg" alt="">
                </div></div>
              <div class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets swiper-pagination-horizontal"><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 1"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 2"></span><span class="swiper-pagination-bullet swiper-pagination-bullet-active" tabindex="0" role="button" aria-label="Go to slide 3" aria-current="true"></span></div>
            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>

            @auth
                <form method="GET" action="{{ route('bookNow', ['id' => $vehicles->id]) }}" class="php-email-form">
                    <button type="submit">Book</button>
                </form>
            @else
                <p>Please <a href="{{ route('login') }}">login</a> to book a vehicle.</p>
            @endauth
          </div>

          <div class="col-lg-4">
            <div class="portfolio-info">
              <h3>Vehicle information</h3>
              <ul>
                <li><strong>Hospital Name</strong>: {{ $vehicles->hospital->name }}</li>
                <li><strong>Price</strong>: Rs.{{ $vehicles->price }}.00 /Perday</li>
                <li><strong>Name</strong>: {{ $vehicles->title }}({{ $vehicles->brand }})</li>
                <li><strong>Fuel Type</strong>: {{ $vehicles->fuel }}</li>
                <li><strong>Register No</strong>: {{ $vehicles->plate_number }}</li>
                <li><strong>Seat Capacity</strong>: {{ $vehicles->capacity }}</li>
              </ul>
            </div>
            <div class="portfolio-info">
              <h3>Vehicle Overview</h3>
              <p>
                {{ $vehicles->overview }}
              </p>
            </div>
            <div class="portfolio-info">
              <h3>Vehicle Facilities</h3>
                <div class="row">
                    <div class="col-md-6">
                        <div class="checkbox checkbox-inline">
                            <input type="checkbox" id="inlineCheckbox1" name="airconditioner" value="1" {{ $vehicles->airconditioner == 1 ? 'checked' : '' }} disabled>
                            <label for="inlineCheckbox1"> Air Conditioner </label>
                        </div>       
                        <div class="checkbox checkbox-inline">
                            <input type="checkbox" id="powerdoorlocks" name="powerdoorlocks" value="1" {{ $vehicles->powerdoorlocks == 1 ? 'checked' : '' }} disabled>
                            <label for="powerdoorlocks"> Power Door Locks </label>
                        </div>        
                        <div class="checkbox checkbox-inline">
                            <input type="checkbox" id="leatherseats" name="leatherseats" value="1" {{ $vehicles->leatherseats == 1 ? 'checked' : '' }} disabled>
                            <label for="leatherseats"> Leather Seats </label>
                        </div>        
                        <div class="checkbox checkbox-inline">
                            <input type="checkbox" id="brakeassist" name="brakeassist" value="1" {{ $vehicles->brakeassist == 1 ? 'checked' : '' }} disabled>
                            <label for="brakeassist"> Brake Assist </label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="checkbox checkbox-inline">
                            <input type="checkbox" id="powersteering" name="powersteering" value="1" {{ $vehicles->powersteering == 1 ? 'checked' : '' }} disabled>
                            <label for="inlineCheckbox5"> Power Steering </label>
                        </div>
                        <div class="checkbox checkbox-inline">
                            <input type="checkbox" id="driverairbag" name="driverairbag" value="1" {{ $vehicles->driverairbag == 1 ? 'checked' : '' }} disabled>
                            <label for="driverairbag">Driver Airbag</label>
                        </div>
                        <div class="checkbox checkbox-inline">
                            <input type="checkbox" id="passengerairbag" name="passengerairbag" value="1" {{ $vehicles->passengerairbag == 1 ? 'checked' : '' }} disabled>
                            <label for="passengerairbag"> Passenger Airbag </label>
                        </div>
                        <div class="checkbox checkbox-inline">
                            <input type="checkbox" id="powerwindow" name="powerwindow" value="1" {{ $vehicles->powerwindow == 1 ? 'checked' : '' }} disabled>
                            <label for="powerwindow"> Power Windows </label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="checkbox checkbox-inline">
                            <input type="checkbox" id="cdplayer" name="cdplayer" value="1" {{ $vehicles->cdplayer == 1 ? 'checked' : '' }} disabled>
                            <label for="cdplayer"> CD Player </label>
                        </div>
                        <div class="checkbox h checkbox-inline">
                            <input type="checkbox" id="centrallocking" name="centrallocking" value="1" {{ $vehicles->centrallocking == 1 ? 'checked' : '' }} disabled>
                            <label for="centrallocking">Central Locking</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="checkbox checkbox-inline">
                            <input type="checkbox" id="crashcensor" name="crashcensor" value="1" {{ $vehicles->crashcensor == 1 ? 'checked' : '' }} disabled>
                            <label for="crashcensor"> Crash Sensor </label>
                        </div>
                        <div class="checkbox checkbox-inline">
                            <input type="checkbox" id="antilockbrakingsys" name="antilockbrakingsys" value="1" {{ $vehicles->antilockbrakingsys == 1 ? 'checked' : '' }} disabled>
                            <label for="antilockbrakingsys"> ABS </label>
                        </div>
                    </div>
                </div>                           
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Portfolio Details Section -->
     @include('home.elements.footer')
  </main>
@endsection