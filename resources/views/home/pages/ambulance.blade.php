@extends('home.layout.default')

@section('content')
<main id="main" class="scrolled-offset">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="/">Home</a></li>
          <li>Ambulance</li>
        </ol>
        <h2>Ambulance</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Booking Now Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container">

        <div class="row">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-hospital">Hospital</li>
              <li data-filter=".filter-company">Company</li>
            </ul>
          </div>
        </div>

        <div class="row portfolio-container" style="position: relative; height: 1410px;">
         @foreach ($vehicles->chunk(4) as $chunk)
          @foreach ($chunk as $vehicle)

          <div class="col-lg-4 col-md-6 portfolio-item filter-hospital" style="position: absolute; left: 0px; top: 0px;">
            <div class="portfolio-wrap">
              <img src="{{ $vehicle->image1 }}" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>{{ $vehicle->hospital->name }}</h4>
                <h5>{{ $vehicle->brand }}, {{ $vehicle->title }}</h5>
                <p>
                    <i class="bx bx-gas-pump" aria-hidden="true"></i> {{ $vehicle->fuel }} &nbsp; | &nbsp;
                    <i class="bx bx-car" aria-hidden="true"></i> {{ $vehicle->plate_number }} &nbsp; | &nbsp;
                    <i class="bx bx-user" aria-hidden="true"></i> {{ $vehicle->capacity }} seat
                </p> 
                <div class="portfolio-links">
                  <!-- <a href="{{ url('vehicle/{id}', ['id' => $vehicle->id]) }}"  class="portfolio-lightbox" title="App 1"><i class="bx bx-plus"></i></a> -->
<a href="{{ route('ambulanceDetails', ['id' => $vehicle->id]) }}" title="More Details"><i class="bx bx-link"></i></a>

                </div>
              </div>
            </div>
          </div>
         @endforeach
          @endforeach
        </div>

      </div>
    </section><!-- End Portfolio Section -->

     <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients">
      <div class="container">

        <div class="section-title">
          <h2>Clients</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="clients-slider swiper">
           <div class="swiper-wrapper align-items-center">
            <div class="swiper-slide"><img src="{{ asset('img/clients/client-1.png') }}" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="{{ asset('img/clients/client-2.png') }}" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="{{ asset('img/clients/client-3.png') }}" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="{{ asset('img/clients/client-4.png') }}" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="{{ asset('img/clients/client-5.png') }}" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="{{ asset('img/clients/client-6.png') }}" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="{{ asset('img/clients/client-7.png') }}" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="{{ asset('img/clients/client-8.png') }}" class="img-fluid" alt=""></div>
          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Clients Section -->
    @include('home.elements.footer')
  </main>
  @endsection