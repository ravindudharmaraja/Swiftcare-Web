@extends('hospital.layouts.app')
@section('content')

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Cutternt Drivers</h4>
            <p class="card-description"> You can <code>cancel</code> pending request only</p>
            <div class="col-lg-12 grid-margin"><a class="nav-link btn btn-success create-new-button"
                    href="{{ route('hospital.new.driver') }}">+ Add New Driver</a></div>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>NAME</th>
                            <th>EMAIL</th>
                            <th>VEHICLE</th>
                            <th>STATUS</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ambulances as $driver)
                        @if ($driver->hospital_id == auth()->user()->id)
                        <tr>
                            <td><img src="{{ $driver->profile }}" alt="Driver Image" width="100"></td>
                            <td>{{ $driver->name }}</td>
                            <td>{{ $driver->email }}</td>
                            <td>{{ $driver->status }}</td>
                            @if ($driver->status == 'available')
                            <td><label class="badge badge-outline-success">Available</label></td>
                            @else
                            <td><label class="badge badge-outline-danger">Busy</label></td>
                            @endif
                            <td class="text-center">
                                <a href="#" class="mx-3" data-bs-toggle="tooltip"
                                    data-bs-original-title="Cancel Request"
                                    onclick="event.preventDefault(); editDriver({{ $driver->id }})">
                                    <i class="mdi mdi-account-settings"></i>
                                </a>
                                |
                                <a href="" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Delete Booking"
                                    onclick="event.preventDefault(); deleteDriver({{ $driver->id }})">
                                    <i class="mdi mdi-account-remove"></i>
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