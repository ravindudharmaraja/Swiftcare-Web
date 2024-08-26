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
            <h2>Booking2</h2>
        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container">
            <h5>Select Hospital on Map</h5>
            <br>
            <div class="row">
                <div class="col-lg-8">
                    <div id="map" style="width: 100%; height: 400px;"></div>
                </div>
                <div class="col-lg-4">
                    <form action="{{ route('post.step2') }}" method="post" role="form" class="php-email-form">
                            @csrf
                            <h5 class="card-title" id="hospitalName"></h5>
                            <hr>
                            <p class="card-text" id="hospitalDetails"></p>
                            <input type="hidden" name="hospital_id" id="hospital_id" value="">

                            <div class="text-center">
                                <button type="submit">Book Now</button>
                            </div>
                        </form>
                </div>

                <!-- <div id="hospitalCard" style="display: none;">
                    <div class="card-body">
                        <form action="{{ route('post.step2') }}" method="post" role="form" class="php-email-form">
                            @csrf
                            <h5 class="card-title" id="hospitalName"></h5>
                            <p class="card-text" id="hospitalDetails"></p>
                            <input type="hidden" name="hospital_id" id="hospital_id" value="">

                            <div class="text-center">
                                <button type="submit">Book Now</button>
                            </div>
                        </form>
                    </div>
                </div> -->


            </div>
        </div>
    </section><!-- End Contact Section -->
    @include('home.elements.footer')
</main>
<script>
    function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
            center: { lat: {{$emergencyBooking->latitude}}, lng: {{$emergencyBooking->longitude}} },
            zoom: 10
        });

        @if(!empty($hospitals))
            @foreach($hospitals as $hospital)
                var latitude = {{ $hospital->latitude }};
                var longitude = {{ $hospital->longitude }};
                var name = '{{ $hospital->name }}';
                var details = '{{ $hospital->email }}';
                var id = {{ $hospital->id }}; // Note: Removed single quotes

                var marker = new google.maps.Marker({
                    position: { lat: latitude, lng: longitude },
                    map: map,
                    title: name,
                    icon: {
                        path: google.maps.SymbolPath.CIRCLE,
                        fillColor: 'blue',
                        fillOpacity: 1,
                        strokeColor: 'white',
                        strokeWeight: 2,
                        scale: 10
                    }
                });

                // Add a click event listener to the marker
                marker.addListener('click', (function(name, details, id) {
                    return function() {
                        // Populate the card with hospital details
                        document.getElementById('hospitalName').textContent = name;
                        document.getElementById('hospitalDetails').textContent = details;
                        document.getElementById('hospital_id').value = id; // Set the selected hospital ID

                        // Show the card
                        document.getElementById('hospitalCard').style.display = 'block';
                    };
                })(name, details, id));
            @endforeach
        @endif
    }
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBHZJjA4WH--aPUGgf3nLc5HSAUBzhrdY4&callback=initMap"></script>
</main>
@endsection
