@extends('ambulance.layouts.app')
@section('content')
<div class="col-md-4 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <div class="chartjs-size-monitor">
                <div class="chartjs-size-monitor-expand">
                    <div class=""></div>
                </div>
                <div class="chartjs-size-monitor-shrink">
                    <div class=""></div>
                </div>
            </div>
            <h4 class="card-title">Vehicle Details</h4> 
           <div>
                <img src="{{ $vehicle->image1 }}" alt="Vehicle Image" width="285">
           </div>
            <div class="bg-gray-dark d-flex d-md-block  py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
                <div class="text-md-center text-xl-left">
                    <h6 class="mb-1">Name :</h6>
                    <p class="text-muted mb-0">{{ $vehicle->title }}</p>
                </div>
                <div class="text-md-center text-xl-left">
                    <h6 class="mb-1">Model :</h6>
                    <p class="text-muted mb-0">{{ $vehicle->brand }}</p>
                </div>
                <div class="text-md-center text-xl-left">
                    <h6 class="mb-1">Reg. No :</h6>
                    <p class="text-muted mb-0">{{ $vehicle->plate_number }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
              
@endsection