

<div class="page-header">
  <div class="position-absolute fixed-top ms-auto w-50 h-100 rounded-3 z-index-0 d-none d-sm-none d-md-block me-n4" style="background-image: url(../../assets/img/examples/blog3.jpg); background-size: cover;">
  </div>
  <div class="container py-5">
    <div class="row">
      <div class="col-lg-7 d-flex justify-content-center flex-column">
        <div class="card card-body d-flex justify-content-center shadow-lg p-5 blur align-items-center">
        <h2>Initiate Emergency Booking</h2>
            <form action="{{ route('emergency.booking') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="location">Your Location:</label>
                    <input type="text" id="location" name="location" placeholder="Enter your location" required>
                    <button id="autoFillButton">Auto-fill with Current Location</button>

                </div>
                <div class="form-group">
                    <label for="emergency_details">Emergency Details:</label>
                    <textarea id="emergency_details" name="emergency_details" placeholder="Describe the emergency" required></textarea>
                </div>
                <div class="form-group">
                    <label for="urgency_level">Urgency Level:</label>
                    <select id="urgency_level" name="urgency_level" required>
                        <option value="high">High</option>
                        <option value="medium">Medium</option>
                        <option value="low">Low</option>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit">Submit Emergency Request</button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
    const locationInput = document.getElementById('location');
    const autoFillButton = document.getElementById('autoFillButton');

    // Check if geolocation is available in the browser
    if ('geolocation' in navigator) {
        autoFillButton.addEventListener('click', function () {
            // Get the user's current position
            navigator.geolocation.getCurrentPosition(function (position) {
                const latitude = position.coords.latitude;
                const longitude = position.coords.longitude;

                // Autofill the location input field with the coordinates
                locationInput.value = `Latitude: ${latitude}, Longitude: ${longitude}`;
            });
        });
    }

</script>
