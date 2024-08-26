@extends('hospital.layouts.app')
@section('content')

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Non-Emergency Booking</h4>
            <p class="card-description"> You can <code>cancel</code> pending request only</p>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>NAME</th>
                            <th>AMBULANCE</th>
                            <th>FROM</th>
                            <th>TO</th>
                            <th>TIME</th>
                            <th>STATUS</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bookings as $booking)
                        @if ($booking->hospital_id == auth()->user()->id)
                        <tr>
                            <td>{{ $booking->user->name }}</td>
                            <td>{{ $booking->vehicle->title }}</td>
                            <td class="text-info">{{ $booking->fromdate }}</td>
                            <td class="text-info">{{ $booking->todate }}</td>
                            <td>{{ $booking->time }}</td>
                            @if ($booking->status == 'pending')
                            <td><label class="badge badge-outline-warning">Pending</label></td>
                            @elseif ($booking->status == 'declined')
                            <td><label class="badge badge-outline-danger">Declined</label></td>
                            @elseif ($booking->status == 'accepted')
                            <td><label class="badge badge-outline-success">Accepted</label></td>
                            @endif
                            
                            <td class="text-center">
                                <a href="#" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Assign Driver"
                                    data-toggle="modal" data-target="#assignAmbulanceModal{{ $booking->id }}">
                                    <i class="mdi mdi-car-wash"></i>
                                </a>
                                |
                                <a href="#" class="mx-3" data-bs-toggle="tooltip"
                                    data-bs-original-title="Cancel Request"
                                    onclick="event.preventDefault(); cancelRequest({{ $booking->id }})">
                                    <i class="mdi mdi-close-box"></i>
                                </a>
                                |
                                <a href="" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Delete Booking"
                                    onclick="event.preventDefault(); deleteBooking({{ $booking->id }})">
                                    <i class="mdi mdi-delete"></i>
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
@endsection

<script>
    function openAssignAmbulanceModal(bookingId) {
        // Open the corresponding modal for the specific emergency booking
        $('#assignAmbulanceModal' + bookingId).modal('show');
    }
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
    function deleteBooking(bookingId) {
        if (confirm('Are you sure you want to delete this booking?')) {
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
                    console.log('Booking deleted successfully');
                },
                error: function (xhr, status, error) {
                    // Handle the error response, e.g., display an error message
                    console.error('Error deleting the booking: ' + error);
                }
            });
        }
    }
</script>