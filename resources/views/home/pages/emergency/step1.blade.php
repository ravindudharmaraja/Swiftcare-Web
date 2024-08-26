@extends('home.layout.default')

@section('content')
<main id="main">
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
            <h5>Select Your Location on Map</h5>
            <br>
            <div class="row">
                <div class="col-lg-8">
                    <div id="map" style="width: 100%; height: 400px;"></div>
                </div>
                <div class="col-lg-4">
                    <form method="post" action="{{ route('post.step1') }}" class="php-email-form">
                        @csrf
                        <h3>Contact Details</h3>
                        <p class="small-text" style="color: gray; font-family: 'Poppins', sans-serif; font-size: 14px;">Provide accurate contact details below. Your information is crucial for reaching you.</p>
                        <div class="form-group mt-3">
                            <input type="text" class="form-control" name="name" id="name" placeholder="Name" required>
                        </div>
                        <div class="form-group mt-3">
                            <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Mobile no." required>
                        </div>
                        <input type="hidden" name="latitude" id="latitude">
                        <input type="hidden" name="longitude" id="longitude">
                        <div class="my-3">
                            <div class="loading">Loading</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Your message has been sent. Thank you!</div>
                        </div>
                        <!-- <button type="button" id="selectLocationButton">
                            Mark Current Location
                        </button>   -->
                        <div class="text-center">
                            <button type="submit">NEXT</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
<!-- End Contact Section -->
    @include('home.elements.footer')
</main>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var map;
        var marker;

        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: { lat: 0, lng: 0 },
                zoom: 7
            });

            marker = new google.maps.Marker({
                map: map,
                position: map.getCenter(),
                draggable: true,
                title: 'Your Location',
                icon: {
                        path: google.maps.SymbolPath.CIRCLE,
                        fillColor: 'red',
                        fillOpacity: 1,
                        strokeColor: 'white',
                        strokeWeight: 2,
                        scale: 10
                    }
            });

            // Get user's location when the page loads
            getUserLocation();

            // Add a click event listener to the map to capture the selected location
            google.maps.event.addListener(map, 'click', function (event) {
                updateLocationInput(event.latLng.lat(), event.latLng.lng());
                marker.setPosition(event.latLng);
            });
        }

        function getUserLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function (position) {
                    var userLocation = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };
                    map.setCenter(userLocation);
                    marker.setPosition(userLocation);
                    updateLocationInput(userLocation.lat, userLocation.lng);
                });
            } else {
                alert('Geolocation is not supported by your browser.');
            }
        }

        function updateLocationInput(latitude, longitude) {
            document.getElementById('latitude').value = latitude;
            document.getElementById('longitude').value = longitude;
        }

        initMap();
    });
</script>


<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBHZJjA4WH--aPUGgf3nLc5HSAUBzhrdY4&callback=initMap"></script>
</main>
@endsection
