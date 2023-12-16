<div class="card w-50">
    <div class="card-body">
        <section>
            <header>
                <h2 class="fs-4 fw-medium text-gray-900">
                    {{ __('Profile Information') }}
                </h2>

                <p class="mt-1 text-sm text-gray-600">
                    {{ __("Update your account's profile information and email address.") }}
                </p>
            </header>
            
            @if (session()->has('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <strong>Success!</strong> {{ session('status') }}
            </div>
            @endif
            
            <form method="post" action="{{ route('admin.profile.update') }}" class="mt-6">
                @csrf
                @method('patch')

                <div class="mb-3">
                    <label for="fname" class="form-label">{{__('First Name')}}</label>
                    <input id="fname" name="fname" type="text" class="form-control w-75" value="{{ old('fname', $user->fname) }}" required autofocus autocomplete="fname">
                    <div class="invalid-feedback">
                        @error('fname'){{ $message }}@enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="lname" class="form-label">{{__('Last Name')}}</label>
                    <input id="lname" name="lname" type="text" class="form-control w-75" value="{{ old('lname', $user->lname) }}" required autofocus autocomplete="lname">
                    <div class="invalid-feedback">
                        @error('lname'){{ $message }}@enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="gender" class="form-label">{{__('Gender')}}</label>
                    <input id="gender" name="gender" type="text" class="form-control w-75" value="{{ old('gender', $user->gender) }}" required autofocus autocomplete="gender">
                    <div class="invalid-feedback">
                        @error('gender'){{ $message }}@enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="contact" class="form-label">{{__('Contact Number')}}</label>
                    <input id="contact" name="contact" type="text" class="form-control w-75" value="{{ old('contact', $user->contact) }}" required autofocus autocomplete="contact">
                    <div class="invalid-feedback">
                        @error('contact'){{ $message }}@enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">{{__('Address')}}</label>
                    <input id="address" name="address" type="text" class="form-control w-75" value="{{ old('address', $user->address) }}" required autofocus autocomplete="address">
                    <div class="invalid-feedback">
                        @error('address'){{ $message }}@enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">{{__('Email')}}</label>
                    <input id="email" name="email" type="email" class="form-control w-75" value="{{ old('email', $user->email) }}" required autocomplete="username">
                    <div class="invalid-feedback">
                        @error('email'){{ $message }}@enderror
                    </div>

                    @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                        <div class="mt-2">
                            <p class="text-sm text-gray-800">
                                {{ __('Your email address is unverified.') }}
                                <button form="send-verification" class="underline text-sm text-gray-600">
                                    {{ __('Click here to re-send the verification email.') }}
                                </button>
                            </p>

                            @if (session('status') === 'verification-link-sent')
                                <p class="mt-2 font-medium text-sm text-success">
                                    {{ __('A new verification link has been sent to your email address.') }}
                                </p>
                            @endif
                        </div>
                    @endif
                </div>

                <div class="d-flex align-items-center gap-4">
                    <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>

                    @if (session('status') === 'profile-updated')
                        <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600">
                            {{ __('Saved.') }}
                        </p>
                    @endif
                </div>
            </form>
        </section>
    </div>
</div>
