@extends('ambulance.layouts.app')
@section('content')

<div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Recent Booking</h4>
                    <p class="card-description"> You can <code>cancel</code> pending request only</p>
                    @if(session('error'))
                    <div class="alert alert-error">
                        {{ session('error') }}
                    </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>NAME</th>
                                    <th>MOBILE</th>
                                    <th>STATUS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($emergencyBookings as $emergencyBooking)
                                    @if ($emergencyBooking->ambulance_id == auth()->user()->id)
                                        <tr>
                                            <td>{{ $emergencyBooking->name }}</td>
                                            <td>{{ $emergencyBooking->mobile }}</td>
                                            @if ($emergencyBooking->status == 'requested')
                                                <td><label class="badge badge-info">Requested</label></td>
                                            @elseif ($emergencyBooking->status == 'declined')
                                                <td><label class="badge badge-danger">Declined</label></td>
                                            @elseif ($emergencyBooking->status == 'pending')
                                                <td><label class="badge badge-warning">Pending</label></td>
                                            @elseif ($emergencyBooking->status == 'accepted')
                                                <td><label class="badge badge-success">Accepted</label></td>
                                            @endif                                   
                                            <td class="text-center">
                                                <a href="#" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Accept Request" onclick="event.preventDefault(); acceptRequest({{ $emergencyBooking->id }})">
                                                    Accept Request <i class="cursor-pointer mdi mdi-times-circle text-danger"></i>
                                                </a>
                                                |
                                                <a href="#" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Cancel Request" onclick="event.preventDefault(); cancelRequest({{ $emergencyBooking->id }})">
                                                    Cancel Request <i class="cursor-pointer mdi mdi-times-circle text-danger"></i>
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
       
    <script>
        function acceptRequest(bookingId) {
            if (confirm('Are you sure you want to accept this Request?')) {
                // Send an AJAX request to cancel the booking
                $.ajax({
                    type: 'POST',
                    url: '{{ route('accept.request') }}',
                    data: {
                        '_token': '{{ csrf_token() }}',
                        'booking_id': bookingId
                    },
                    success: function (data) {
                        // Handle the success response, e.g., update the UI or show a success message
                        console.log('Accept Request successfully');

                        // Redirect to the map page with the booking ID
                        var mapPageUrl = '{{ route('ambulance.map') }}' + '?booking_id=' + bookingId;
                        window.location.href = mapPageUrl;
                    },
                    error: function (xhr, status, error) {
                        // Handle the error response, e.g., display an error message
                        console.error('Error accept the request: ' + error);
                    }
                });
            }
        }
    </script>

  <script>
        function cancelRequest(bookingId) {
            if (confirm('Are you sure you want to cancel this request?')) {
                // Send an AJAX request to cancel the booking
                $.ajax({
                    type: 'POST',
                    url: '{{ route('cancel.request') }}',
                    data: {
                        '_token': '{{ csrf_token() }}',
                        'booking_id': bookingId
                    },
                    success: function (data) {
                        // Handle the success response, e.g., update the UI or show a success message
                        console.log('Request canceled successfully');
                    },
                    error: function (xhr, status, error) {
                        // Handle the error response, e.g., display an error message
                        console.error('Error canceling the request: ' + error);
                    }
                });
            }
        }
    </script>            
@endsection