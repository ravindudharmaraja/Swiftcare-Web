@extends('user.layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body p-5">
            <header>
                <h2 class="text-lg font-medium text-gray-900">Profile Information</h2>
                <p class="mt-1 text-sm text-gray-600">Your account's profile information and email address.</p>
            </header>

            <form method="post" action="" class="mt-6 space-y-6" enctype="multipart/form-data">
                @csrf
                @method('patch')

                <div class="col-md-6">
                    <div class="input-group input-group-static mb-4">
                        <label for="profileImage">Profile Image <span style="color:red;">*</span></label>
                        <div class="rounded-profile-image-container">
                            <img id="profileImagePreview" style="width: 50%; height: 100%; object-fit: cover;"
                                src="{{$user->profile}}" alt="Profile Image">
                        </div>
                        <input class="form-control" name="profileImage" id="profileImage" accept="image/*" type="file"
                            style="display: none;">
                        <button type="button" class="btn btn-primary mt-2"
                            onclick="document.getElementById('profileImage').click()">Upload Image</button>
                    </div>
                </div>

                <!-- <div class="col-md-6">
                        <div class="input-group input-group-static mb-4">
                            <label for="profileImage">Profile Image <span style="color:red;">*</span></label>
                            <input class="form-control" name="profileImage" id="profileImage" accept="image/*" type="file">
                        </div>
                    </div> -->
                <!-- <div class="form-group">
                        <label>Profile Image</label>
                        <div class="input-group col-xs-12">
                            <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image" id="profileImageLabel">
                            <span class="input-group-append">
                                <label for="profileImage" class="file-upload-browse btn btn-primary">Upload</label>
                                <input class="form-control" name="profileImage" id="profileImage" accept="image/*" type="file" style="display: none;">
                            </span>
                        </div>
                    </div> -->

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="{{ $user->name }}">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email"
                        placeholder="{{ $user->email }}">
                </div>

                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" name="address"
                        placeholder="{{ $user->address }}">
                </div>

                <div class="col-md-12">
                    <button type="submit" class="btn bg-gradient-dark w-100">Save</button>
                </div>
            </form>
        </div>
    </div>
    <br>
    <br>
    <div class="card">
        <div class="card-body p-5">
            <section class="space-y-6">
                <h2 class="text-lg font-medium text-gray-900">Delete Account</h2>
                <p class="mt-1 text-sm text-gray-600">Once your account is deleted, all of its resources and data will
                    be permanently deleted. Before deleting your account, please download any data or information that
                    you wish to retain.</p>
            </section>
            <button type="button" class="btn btn-inverse-danger btn-fw" id="deleteBtn">Delete</button>
        </div>
    </div>
</div>

<script>
    // Add event listener to the label for profile image upload
    document.getElementById('profileImageLabel').addEventListener('click', function () {
        document.getElementById('profileImage').click();
    });

    // Display the selected profile image name in the text input
    document.getElementById('profileImage').addEventListener('change', function () {
        var fileName = this.files[0].name;
        document.getElementById('profileImageLabel').value = fileName;
    });
</script>


@endsection