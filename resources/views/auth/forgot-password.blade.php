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


                            <p class="mt-4">
                                Forgot your password?
                            </p>

                            <p>No problem.
                                Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</p>

                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf

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

                                <button type="submit" class="btn btn-dark btn-block mb-3">Email Password Reset Link</button>


                            </form>
                            <hr class="mt-3">

                            <div class="text-center">

                                <a href="{{ route('login') }}" class="text-dark" style="text-decoration: none">
                                    {{ __('Already Registered?') }}
                                </a>&nbsp;&nbsp;&nbsp;

                                <a href="{{ route('register') }}" class="text-dark" style="text-decoration: none">Create an Account!</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-guest-layout>
