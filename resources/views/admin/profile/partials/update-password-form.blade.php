<div class="card w-50">
    <div class="card-body">
        <section>
            <header>
                <h2 class="fs-4 fw-medium text-gray-900">
                    {{ __('Update Password') }}
                </h2>

                <p class="mt-1 text-sm text-gray-600">
                    {{ __('Ensure your account is using a long, random password to stay secure.') }}
                </p>
            </header>

            <form method="post" action="{{ route('admin.password.update') }}" class="mt-6 space-y-6">
                @csrf
                @method('put')

                <div class="mb-3">
                    <label for="current_password" class="form-label">{{__('Current Password')}}</label>
                    <input id="current_password" name="current_password" type="password" class="form-control w-75" autocomplete="current-password">
                    <div class="invalid-feedback">
                        @error('current_password'){{ $message }}@enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">{{__('New Password')}}</label>
                    <input id="password" name="password" type="password" class="form-control w-75" autocomplete="new-password">
                    <div class="invalid-feedback">
                        @error('password'){{ $message }}@enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">{{__('Confirm Password')}}</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" class="form-control w-75" autocomplete="new-password">
                    <div class="invalid-feedback">
                        @error('password_confirmation'){{ $message }}@enderror
                    </div>
                </div>

                <div class="d-flex align-items-center gap-4">
                    <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>

                    @if (session('status') === 'password-updated')
                        <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600">
                            {{ __('Saved.') }}
                        </p>
                    @endif
                </div>
            </form>
        </section>
    </div>
</div>
