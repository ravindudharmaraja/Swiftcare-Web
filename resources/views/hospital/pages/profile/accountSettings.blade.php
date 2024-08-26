@extends('hospital.layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body p-5">
             <section>
                <header>
                    <h2 class="text-lg font-medium text-gray-900">
                        {{ __('Profile Information') }}
                    </h2>

                    <p class="mt-1 text-sm text-gray-600">
                        {{ __("Update your account's profile information and email address.") }}
                    </p>
                </header>

                <form id="send-verification" method="post" action="{{ route('hospital.verification.send') }}">
                    @csrf
                </form>

                <form method="post" action="{{ route('user.profile.update') }}" class="mt-6 space-y-6">
                    @csrf
                    @method('patch')

                    
                    <div class="form-group">
                        <label for="exampleTextarea1">Name<span style="color:red;">*</span></label>
                        <div class="input-group" data-bs-target="#timepicker-example" data-toggle="datetimepicker">
                            <input type="text" class="form-control datetimepicker-input" placeholder="{{ $user->name }}" name="name" id="name">
                            <!-- <div class="input-group-addon input-group-append"><i class="mdi mdi-clock input-group-text"></i></div> -->
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleTextarea1">Email<span style="color:red;">*</span></label>
                        <div class="input-group" data-bs-target="#timepicker-example" data-toggle="datetimepicker">
                            <input type="text" class="form-control datetimepicker-input" placeholder="{{ $user->email }}" name="email" id="email">
                            <!-- <div class="input-group-addon input-group-append"><i class="mdi mdi-clock input-group-text"></i></div> -->
                            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                                <div>
                                    <p class="text-sm mt-2 text-gray-800">
                                        {{ __('Your email address is unverified.') }}

                                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                            {{ __('Click here to re-send the verification email.') }}
                                        </button>
                                    </p>

                                    @if (session('status') === 'verification-link-sent')
                                        <p class="mt-2 font-medium text-sm text-green-600">
                                            {{ __('A new verification link has been sent to your email address.') }}
                                        </p>
                                    @endif
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-12">
                    <button type="submit" class="btn bg-gradient-dark w-100">Save</button>


                        @if (session('status') === 'profile-updated')
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
    <br>
    <div class="card">
        <div class="card-body p-5">
           <section class="space-y-6">
                <header>
                    <h2 class="text-lg font-medium text-gray-900">
                        {{ __('Delete Account') }}
                    </h2>

                    <p class="mt-1 text-sm text-gray-600">
                        {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
                    </p>
                </header>

                <x-danger-button
                    x-data=""
                    x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
                >{{ __('Delete Account') }}</x-danger-button>

                <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
                    <form method="post" action="{{ route('user.profile.destroy') }}" class="p-6">
                        @csrf
                        @method('delete')

                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Are you sure you want to delete your account?') }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600">
                            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                        </p>

                        <div class="mt-6">
                            <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                            <x-text-input
                                id="password"
                                name="password"
                                type="password"
                                class="mt-1 block w-3/4"
                                placeholder="{{ __('Password') }}"
                            />

                            <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
                        </div>

                        <div class="mt-6 flex justify-end">
                            <x-secondary-button x-on:click="$dispatch('close')">
                                {{ __('Cancel') }}
                            </x-secondary-button>

                            <x-danger-button class="ml-3">
                                {{ __('Delete Account') }}
                            </x-danger-button>
                        </div>
                    </form>
                </x-modal>
            </section>
        </div>
    </div>
</div>
        
@endsection
