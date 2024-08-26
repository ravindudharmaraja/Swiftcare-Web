@extends('user.layouts.app')
@section('content')
<div class="row">
    <div class="col-md-8 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Checkout</h4>

                <form class="forms-sample" method="post" action="https://sandbox.payhere.lk/pay/checkout">
                    <p class="card-description"> Personal Information </p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputName1">First Name</label>
                                <input type="text" class="form-control" name="first_name" value="{{ $booking->user->name }}"
                                    placeholder="{{ $booking->user->name }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputName1">Last Name</label>
                                <input type="text" class="form-control" name="last_name" value="{{ $booking->user->name }}"
                                    placeholder="{{ $booking->user->name }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputName1">Email</label>
                                <input type="email" class="form-control" name="email" value="{{ $booking->user->email }}"
                                    placeholder="{{ $booking->user->email }}">
                            </div>
                        </div>
                    </div>

                    <p class="card-description"> Billing Address </p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputName1">Address</label>
                                <input type="text" class="form-control" name="address" value="{{ $booking->user->address }}"
                                    placeholder="{{ $booking->user->address }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputName1">City</label>
                                <input type="text" class="form-control" name="city" value="" placeholder="City">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputName1">Country</label>
                                <input type="text" class="form-control" name="country" value="Sri Lanka" placeholder="Country">
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="merchant_id" value="{{ $merchantId }}"> <!-- Replace your Merchant ID -->
                    <input type="hidden" name="return_url" value="{{ $returnUrl }}">
                    <input type="hidden" name="cancel_url" value="{{ $cancelUrl }}">
                    <input type="hidden" name="notify_url" value="{{ $notifyUrl }}">
                    <input type="hidden" name="order_id" value="{{ $orderId }}">
                    <input type="hidden" name="items" value="{{ $items }}">
                    <input type="hidden" name="currency" value="{{ $currency }}">
                    <input type="hidden" name="amount" value="{{ $amount }}">
                    <input type="hidden" name="hash" value="{{ $hash }}">
                    <br>
                    <div class="col-md-12">
                        <button type="submit" class="btn bg-gradient-dark w-100">Proceed to Pay</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Order Summery</h4>
                <p class="card-description"> Basic form layout </p>
                <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
                    <div class="text-md-center text-xl-left">
                        <h6 class="mb-1">Original Price</h6>
                        <p class="text-muted mb-0">{{ date('d M Y, h:iA') }}</p>
                    </div>
                    <div class="align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
                        <h6 class="font-weight-bold mb-0">{{ $booking->price }}</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection