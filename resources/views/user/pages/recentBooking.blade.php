@extends('user.layouts.app')
@section('content')

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Recent Booking</h4>
            <p class="card-description"> You can <code>cancel</code> pending request only</p>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>NAME</th>
                            <th>HOSPITAL</th>
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
                        @if ($booking->user_id == auth()->user()->id)
                        <tr>
                            <td>{{ $booking->user->name }}</td>
                            <td>{{ $booking->hospital->name }}</td>
                            <td>{{ $booking->vehicle->title }}</td>
                            <td class="text-info">{{ $booking->fromdate }}</td>
                            <td class="text-info">{{ $booking->todate }}</td>
                            <td>{{ $booking->time }}</td>
                            @if ($booking->status == 'pending')
                            <td><label class="badge badge-warning">Pending</label></td>
                            @elseif ($booking->status == 'declined')
                            <td><label class="badge badge-danger">Declined</label></td>
                            @elseif ($booking->status == 'accepted')
                            <td><label class="badge badge-success">Accepted</label></td>
                            @endif
                            <td class="text-center">
                                <a href="" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Delete Booking"
                                    onclick="event.preventDefault(); deleteBooking({{ $booking->id }})">
                                    <i class="cursor-pointer fas fa-trash text-secondary"></i>
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