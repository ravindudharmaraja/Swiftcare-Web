@extends('hospital.layouts.app')

@section('content')

<div class="container">
    <div class="card">
        <div class="card-body p-5">
             <section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('hospital.password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div class="form-group">
            <label for="exampleTextarea1">Current Password<span style="color:red;">*</span></label>
            <div class="input-group" data-bs-target="#timepicker-example" data-toggle="datetimepicker">
                <input type="text" class="form-control datetimepicker-input" data-bs-target="#timepicker-example" name="current_password" id="current_password">
                <!-- <div class="input-group-addon input-group-append"><i class="mdi mdi-clock input-group-text"></i></div> -->
            </div>
        </div>
        <div class="form-group">
            <label for="exampleTextarea1">New Password<span style="color:red;">*</span></label>
            <div class="input-group" data-bs-target="#timepicker-example" data-toggle="datetimepicker">
                <input type="text" class="form-control datetimepicker-input" data-bs-target="#timepicker-example" name="password" id="password">
                <!-- <div class="input-group-addon input-group-append"><i class="mdi mdi-clock input-group-text"></i></div> -->
            </div>
        </div>
        <div class="form-group">
            <label for="exampleTextarea1">Confirm Password<span style="color:red;">*</span></label>
            <div class="input-group" data-bs-target="#timepicker-example" data-toggle="datetimepicker">
                <input type="text" class="form-control datetimepicker-input" data-bs-target="#timepicker-example" name="password_confirmation" id="password_confirmation">
                <!-- <div class="input-group-addon input-group-append"><i class="mdi mdi-clock input-group-text"></i></div> -->
            </div>
        </div>

        <div class="col-md-12">
        <button type="submit" class="btn bg-gradient-dark w-100">Save</button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>

        </div>
    </div>
    
</div>
        
@endsection
