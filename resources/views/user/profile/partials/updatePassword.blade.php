@extends('user.layouts.app')

@section('content')
<br>
<div class="container">
    <div class="card">
        <div class="card-body p-5">
                <header>
                    <h2 class="text-lg font-medium text-gray-900">Update Password</h2>

                    <p class="mt-1 text-sm text-gray-600">Ensure your account is using a long, random password to stay secure.</p>
                </header>

                <form method="post" action="" class="mt-6 space-y-6" enctype="multipart/form-data">
                    @csrf
                    @method('patch')

                    <div class="form-group">
                        <label for="exampleInputPassword4">Current Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword4" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword4">New Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword4" placeholder="Password">
                      </div>
                    <div class="form-group">
                        <label for="exampleInputPassword4">Confirm Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword4" placeholder="confirm_Password">
                    </div>


                    <div class="col-md-12">
                        <button type="submit" class="btn bg-gradient-dark w-100">Save</button>
                    </div>
                </form>
        </div>
    </div>
</div>
        
@endsection





