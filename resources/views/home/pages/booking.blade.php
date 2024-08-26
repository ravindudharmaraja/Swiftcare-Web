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
        <h2>Booking</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        

        <div class="row">

          <div class="col-lg-8">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4622.960014541677!2d80.70180643961989!3d6.646449187185387!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae3f340fe7adc7b%3A0x644a4b5a08997d83!2sBalangoda!5e0!3m2!1sen!2slk!4v1696481609657!5m2!1sen!2slk" width="100%" height="370" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>

          <div class="col-lg-4">
            <form method="post" action="{{ route('user.post.booking') }}"  class="php-email-form">
              @csrf
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="date" name="fromdate" class="form-control" id="fromdate" placeholder="From" required="">
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="date" class="form-control" name="todate" id="todate" placeholder="To" required="">
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="time" class="form-control" name="time" id="time" placeholder="Time" required="">
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required=""></textarea>
              </div>
              <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
              <input type="hidden" name="hospital_id" value="{{ $vehicles->hospital->id }}">
              <input type="hidden" name="vehicle_id" value="{{ $vehicles->id }}">
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Book Now</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->
    @include('home.elements.footer')

  </main>
  
    @endsection