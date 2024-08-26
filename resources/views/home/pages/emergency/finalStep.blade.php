@extends('home.layout.default')

@section('content')
<main id="main">
        <section id="contact" class="contact">
            <div class="process-wrapper">
                
                <div id="progress-bar-container">
                    <ul>
                    <li class="step {{ $emergencyBooking->progress == 1 ? 'active' : '' }}"><div class="step-inner">Place Order</div></li>
                    <li class="step {{ $emergencyBooking->progress == 2 ? 'active' : '' }}"><div class="step-inner">Confirmed by Hospital</div></li>
                    <li class="step {{ $emergencyBooking->progress == 3 ? 'active' : '' }}"><div class="step-inner">Assign Ambulance</div></li>
                    <li class="step {{ $emergencyBooking->progress == 4 ? 'active' : '' }}"><div class="step-inner">Arrival of Ambulance</div></li>
                </ul>

                    <div id="line">
                        <div id="line-progress"></div>
                    </div>
                </div>

                <div id="progress-content-section">
                    <div class="section-content discovery{{ $emergencyBooking->progress == 1 ? ' active' : '' }}">
                        <span class="bi bi-person"></span>
                        <h2>Place Order</h2>
                        <p>Please wait for confirmation from the hospital. You will receive a notification as soon as the hospital confirms your request. Thank you for your patience and understanding during this critical time. </p>
                    </div>

                    <div class="section-content strategy{{ $emergencyBooking->progress == 2 ? ' active' : '' }}">
                        <h2>Confirmed by Hospital</h2>
                        <p>Please be patient as we work to assign an ambulance for your emergency. Our team is actively coordinating with ambulance services to ensure a swift response. You will track once the ambulance is assigned and route. Thank you for your understanding and cooperation during this crucial time.</p>
                    </div>

                    <div class="section-content creative{{$emergencyBooking->progress == 3 ? ' active' : '' }}">
                        <h2>Assign Ambulance</h2>
                        <p>An ambulance has been assigned and is on the way to your location. Our team is actively monitoring the situation, and you will receive real-time updates on the ambulance's progress. Thank you for your patience and cooperation. Your safety is our top priority.</p>
                    </div>

                    <div class="section-content production{{ $emergencyBooking->progress == 4 ? ' active' : '' }}">
                        <h2>Arrival of Ambulance</h2>
                        <p>Thank you!</p>
                    </div>
                </div>
                
            </div>
        </section>

@include('home.elements.footer')
</main>
<!-- Invoice Modal -->
<div class="modal fade" id="invoiceModal" tabindex="-1" aria-labelledby="invoiceModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="invoiceModalLabel">Invoice</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Container for the content you want to print -->
                <div id="printableContent">
                    <!-- Your invoice card content here -->
                    <!-- Example: -->
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Invoice Details</h5>
                            <!-- Your invoice details -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="printInvoiceBtn">Print</button>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script>
    $(document).ready(function() {
        // Get the progress value from the server-side variable, e.g., $emergencyBooking->progress
        var progress = {{ $emergencyBooking->progress ?? 1 }}; // Default to 1 if not set

        // Add the "active" class to the appropriate step
        $(".step").removeClass("active");
        $(".step:nth-child(-n+" + progress + ")").addClass("active");

        // Set the width of the progress bar
        var width = (progress - 1) * 33;
        $("#line-progress").css("width", width + "%");
    });
</script>
<!-- <script>
    $(document).ready(function() {
        // Get the progress value from the server-side variable, e.g., $emergencyBooking->progress
        var progress = {{ $emergencyBooking->progress ?? 1 }}; // Default to 1 if not set

        // Add the "active" class to the appropriate step
        $(".step").removeClass("active");
        $(".step:nth-child(-n+" + progress + ")").addClass("active");

        // Set the width of the progress bar
        var width = (progress - 1) * 33;
        $("#line-progress").css("width", width + "%");

        // Automatically view invoice when progress reaches 4
        if (progress == 3) {
            window.location.href = "{{ route('invoice') }}";
        }
    });
</script> -->
<script>
    $(document).ready(function() {
        var progress = {{ $emergencyBooking->progress ?? 1 }};
        $(".step").removeClass("active");
        $(".step:nth-child(-n+" + progress + ")").addClass("active");
        var width = (progress - 1) * 33;
        $("#line-progress").css("width", width + "%");

        // Automatically open the invoice modal when progress reaches 3
        if (progress == 4) {
            $("#invoiceModal").modal("show");
        }
    });
</script>
<script>
    $(document).ready(function() {
        // Code for progress and modal opening here...

        // Print button functionality
        $("#printInvoiceBtn").click(function() {
            window.print(); // Open browser's print dialog
        });
    });
</script>


@endsection
