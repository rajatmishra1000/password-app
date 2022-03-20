<x-guest-layout>
    <div class="container">

        <div class="row">
            <div class="col-xl-5 col-lg-6 col-md-8 mx-auto">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="p-5">
                            <div class="text-center">
                                <x-application-logo width="70px"/>
                            </div>

                            <x-auth-session-status class="alert alert-success mt-3 mb-3" :status="session('status')" />

                            <form method="POST" action="{{ route('register') }}" class="user">
                                @csrf

                                <!-- Name -->
                                <div class="form-group mb-3">
                                    <label for="name"
                                        class="form-label">Name
                                    </label>

                                    <input id="name"
                                        type="text"
                                        name="name" value="{{ old('name') }}"
                                        class="form-control @error('name') is-invalid @enderror"
                                        required autofocus>

                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Email Address -->
                                <div class="form-group mb-3">
                                    <label for="email"
                                        class="form-label">Email
                                    </label>

                                    <input id="email"
                                        type="email"
                                        name="email" value="{{ old('email') }}"
                                        class="form-control @error('email') is-invalid @enderror"
                                        required autofocus>

                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Password -->
                                <div class="form-group mb-3">
                                    <label for="password" class="form-label">Password</label>

                                    <input id="password"
                                        type="password"
                                        name="password"
                                        class="form-control @error('password') is-invalid @enderror"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>


                                <!-- Confirm Password -->
                                <div class="form-group mb-3">
                                    <label for="password_confirmation" class="form-label">Confirm Password</label>

                                    <input id="password_confirmation"
                                        type="password"
                                        name="password_confirmation"
                                        class="form-control @error('password_confirmation') is-invalid @enderror">

                                    @error('password_confirmation')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-dark btn-block mb-3">Register</button>

                            </form>

                            <hr class="mt-3">

                            <div class="text-center">

                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" class="text-dark" style="text-decoration: none">
                                        {{ __('Forgot your password?') }}
                                    </a>&nbsp;&nbsp;&nbsp;
                                @endif

                                <a href="{{ route('login') }}" class="text-dark" style="text-decoration: none">Already registered?</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-guest-layout>
