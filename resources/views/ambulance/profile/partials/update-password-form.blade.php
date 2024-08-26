<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('user.password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div class="input-group input-group-static mb-4">
            <label for="current_password" class="form-label">Current Password <span style="color:red;">*</span></label>
            <input class="form-control" name="current_password" id="current_password" placeholder=""  type="text"/>
        </div>
        <div class="input-group input-group-static mb-4">
            <label for="password" class="form-label">New Password <span style="color:red;">*</span></label>
            <input class="form-control" name="password" id="password" placeholder=""  type="text"/>
        </div>
        <div class="input-group input-group-static mb-4">
            <label for="password_confirmation" class="form-label">Confirm Password <span style="color:red;">*</span></label>
            <input class="form-control" name="password_confirmation" id="password_confirmation" placeholder=""  type="text"/>
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
