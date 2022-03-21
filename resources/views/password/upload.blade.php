<x-app-layout>
    <div class="container">
        <div class="row">

            <div class="col-md-5 mx-auto">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">

                        <div class="p-5">

                            <div class="text-center mt-2 mb-2">
                                @if (session()->has('success'))
                                    <span class="text-success">{{ session('success') }}</span>
                                @endif
                            </div>

                            <section>
                                <form action="{{ route('password.upload') }}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="mb-4">
                                        <label for="form-label" for="file">Upload (CSV Format Only) <span class="text-danger">*</span></label>

                                        <input
                                            type="file"
                                            name="file"
                                            id="file"
                                            wire:model="file"
                                            class="form-control @error('file') is-invalid @enderror">

                                        @error('file')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <button class="btn btn-dark">Upload</button>
                                </form>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>
