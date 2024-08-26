@extends('user.layouts.app')
@section('content')

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Payment</h4>
            <p class="card-description"> You can <code>cancel</code> pending request only</p>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>HOSPITAL</th>
                            <th>AMBULANCE</th>
                            <th>PRICE</th>
                            <th>Payment</th>
                            <th>STATUS</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bookings as $booking)
                        @if ($booking->user_id == auth()->user()->id)
                        <tr>
                            <td>{{ $booking->hospital->name }}</td>
                            <td>{{ $booking->vehicle->title }}</td>
                            <td>{{ $booking->price }}</td>
                            <td>{{ $booking->payment->status }}</td>
                            @if ($booking->status == 'pending')
                            <td><label class="badge badge-warning">Pending</label></td>
                            @elseif ($booking->status == 'declined')
                            <td><label class="badge badge-danger">Declined</label></td>
                            @elseif ($booking->status == 'accepted')
                            <td><label class="badge badge-success">Accepted</label></td>
                            @endif
                            <td>
                                <?php if ($booking->payment->status == 'Unpaid'): ?>
                                <button type="button" class="btn btn-outline-secondary btn-fw"
                                    onclick="redirectToPayment('{{ $booking->id }}')">Pay</button>
                                <?php elseif ($booking->payment->status == 'Paid'): ?>
                                You already Paid
                                <?php endif; ?>
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
    function redirectToPayment(bookingId) {
        var checkoutUrl = "{{ route('user.checkout', ':bookingId') }}";
        checkoutUrl = checkoutUrl.replace(':bookingId', bookingId);
        window.location.href = checkoutUrl;
    }
</script>




@endsection