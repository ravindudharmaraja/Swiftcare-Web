@extends('ambulance.layouts.app')
@section('content')

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Recent Booking</h4>
                <p class="card-description"> You can <code>cancel</code> pending request only</p>
                <div class="col-lg-12">
                    <div id="map" style="width: 100%; height: 500px;"></div>
                </div>
            </div>
        </div>
    </div>
   
    <script>
        function initMap() {
            if ("geolocation" in navigator) {
                // Request the user's location
                navigator.geolocation.getCurrentPosition(function (position) {
                    var userLocation = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };

                    var map = new google.maps.Map(document.getElementById('map'), {
                        center: userLocation,
                        zoom: 15 // You can adjust the zoom level as needed
                    });

                    // Create a marker for the user's location
                    var userMarker = new google.maps.Marker({
                        position: userLocation,
                        map: map,
                        title: 'User Location',
                        icon: {
                            path: google.maps.SymbolPath.CIRCLE,
                            fillColor: 'blue',
                            fillOpacity: 1,
                            strokeColor: 'white',
                            strokeWeight: 2,
                            scale: 10
                        }
                    });

                    // Fetch emergency booking data from the database
                   // Retrieve the booking ID from the URL
            var urlParams = new URLSearchParams(window.location.search);
            var selectedBookingId = urlParams.get('booking_id');
            var emergencyBookings = @json($emergencyBookings); // Assuming you pass the data from your controller

            // Filter the emergencyBookings array to get the selected booking
            var selectedBooking = emergencyBookings.find(function (booking) {
                return booking.id == selectedBookingId;
            });

            // Display a marker for the selected booking
            if (selectedBooking) {
                var bookingLocation = {
                    lat: parseFloat(selectedBooking.latitude), // Convert to float
                    lng: parseFloat(selectedBooking.longitude) // Convert to float
                };

                var bookingMarker = new google.maps.Marker({
                    position: bookingLocation,
                    map: map,
                    title: selectedBooking.name,
                    icon: {
                        path: google.maps.SymbolPath.CIRCLE,
                        fillColor: 'red',
                        fillOpacity: 1,
                        strokeColor: 'white',
                        strokeWeight: 2,
                        scale: 10
                    }
                });
            }
            // Create a DirectionsService and DirectionsRenderer
            var directionsService = new google.maps.DirectionsService();
            var directionsRenderer = new google.maps.DirectionsRenderer();

            // Configure the directions request
            var request = {
                origin: userLocation,
                destination: bookingLocation,
                travelMode: google.maps.TravelMode.DRIVING, // You can change the travel mode as needed
            };

            // Send the request to the DirectionsService
            directionsService.route(request, function(result, status) {
                if (status == google.maps.DirectionsStatus.OK) {
                    // Display the route on the map
                    directionsRenderer.setDirections(result);
                    directionsRenderer.setMap(map);
                } else {
                    // Handle errors, e.g., directions not found
                    console.error('Error displaying directions:', status);
                }
            });
        });
            } else {
                // Handle the case where geolocation is not supported
                var map = new google.maps.Map(document.getElementById('map'), {
                    center: { lat: 0, lng: 0 },
                    zoom: 7
                });
                console.log("Geolocation is not supported.");
            }
        }
    </script>
       
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBHZJjA4WH--aPUGgf3nLc5HSAUBzhrdY4&callback=initMap"></script>


             
@endsection