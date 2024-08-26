@extends('hospital.layouts.app')
@section('content')

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Emergency Booking</h4>
            <p class="card-description"> You can <code>cancel</code> pending request only</p>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>NAME</th>
                            <th>MOBILE</th>
                            <th>STATUS</th>
                            <th>ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($emergencyBookings as $emergencyBooking)
                        @if ($emergencyBooking->hospital_id == auth()->user()->id)
                        <tr>
                            <td>{{ $emergencyBooking->name }}</td>
                            <td>{{ $emergencyBooking->mobile }}</td>
                            @if ($emergencyBooking->status == 'pending')
                            <td><label class="badge badge-outline-warning">Pending</label></td>
                            @elseif ($emergencyBooking->status == 'declined')
                            <td><label class="badge badge-outline-danger">Declined</label></td>
                            @elseif ($emergencyBooking->status == 'requested')
                            <td><label class="badge badge-outline-info">Requested</label></td>
                            @elseif ($emergencyBooking->status == 'accepted')
                            <td><label class="badge badge-outline-success">Accepted</label></td>
                            @endif
                            <td class="text-center">
                                <a href="#" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Assign Driver"
                                    data-toggle="modal" data-target="#assignAmbulanceModal{{ $emergencyBooking->id }}">
                                    <i class=" mdi mdi-car-wash"></i>
                                </a>
                                |
                                <a href="#" class="mx-3" data-bs-toggle="tooltip"
                                    data-bs-original-title="Cancel Request"
                                    onclick="event.preventDefault(); cancelRequest({{ $emergencyBooking->id }})">
                                    <i class="mdi mdi-close-box"></i>
                                </a>
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal Dialog for Assigning Driver -->
@foreach($emergencyBookings as $emergencyBooking)
<div class="modal fade" id="assignAmbulanceModal{{ $emergencyBooking->id }}" tabindex="-1" role="dialog"
    aria-labelledby="assignAmbulanceModalLabel" aria-hidden="true">
    <!-- Modal content for each emergency booking -->
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="assignAmbulanceModalLabel">Assign Ambulance</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h6>Select an ambulance to assign:</h6>
                <form method="post" action="{{ route('assign.ambulance') }}">
                    @csrf
                    <input type="hidden" name="emergency_booking_id" value="{{ $emergencyBooking->id }}">
                    <ul>
                        @foreach ($ambulances as $ambulance)
                        @if ($ambulance->status === 'available')
                        <li>
                            <label>
                                <input type="radio" name="selected_ambulance" value="{{ $ambulance->id }}">
                                {{ $ambulance->name }}
                            </label>
                        </li>
                        @endif
                        @endforeach
                    </ul>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary"
                    onclick="document.querySelector('#assignAmbulanceModal{{ $emergencyBooking->id }} form').submit();">Assign</button>
            </div>
        </div>
    </div>
</div>
@endforeach



<script>
    function openAssignAmbulanceModal(emergencyBookingId) {
        // Open the corresponding modal for the specific emergency booking
        $('#assignAmbulanceModal' + emergencyBookingId).modal('show');
    }
</script>

<script>
    function cancelRequest(bookingId) {
        if (confirm('Are you sure you want to cancel this booking?')) {
            // Send an AJAX request to cancel the booking
            $.ajax({
                type: 'POST',
                url: '{{ route('cancel.booking') }}',
                data: {
                    '_token': '{{ csrf_token() }}',
                    'booking_id': bookingId
                },
                success: function (data) {
                    // Handle the success response, e.g., update the UI or show a success message
                    console.log('Booking canceled successfully');
                },
                error: function (xhr, status, error) {
                    // Handle the error response, e.g., display an error message
                    console.error('Error canceling the booking: ' + error);
                }
            });
        }
    }
</script>
@endsection