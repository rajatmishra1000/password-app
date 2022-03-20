<x-guest-layout>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mx-auto">

                <div style="margin-top: 10vw;">
                    <h2 class="text-center">Password Management Application</h2>
                    <p class="text-center">
                        <i>A very simple application to manage and store passwords.</i>
                    </p>

                    <div class="mt-5 d-flex justify-content-center">
                        <a href="{{ route('login') }}" class="btn btn-dark m-1">
                            Log in to Application
                        </a>
                        <a href="{{ route('register') }}" class="btn btn-dark opacity-75 m-1">
                            Create an Account!
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-guest-layout>

