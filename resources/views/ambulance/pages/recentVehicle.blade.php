@extends('ambulance.layouts.app')
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
                                    <th>BRAND</th>
                                    <th>REG.NO</th>
                                    <th>FUEL TYPE</th>
                                    <th>SEATS</th>
                                    <th>PRICE</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($vehicles as $vehicle)
                                    @if ($vehicle->hospital_id == auth()->user()->id)
                                        <tr>
                                            <td>{{ $vehicle->title }}</td>
                                            <td>{{ $vehicle->brand }}</td>
                                            <td>{{ $vehicle->plate_number }}</td>
                                            <td>{{ $vehicle->fuel }}</td>
                                            <td>{{ $vehicle->capacity }}</td>
                                            <td>{{ $vehicle->price }}</td>   
                                                                             
                                            <td class="text-center">
                                                <a href="" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Delete Booking" onclick="event.preventDefault(); deleteBooking({{ $vehicle->id }})">
                                                    <i class="cursor-pointer mdi mdi-trash text-secondary"></i>
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
</div>



              
@endsection