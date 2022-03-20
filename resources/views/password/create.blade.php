<x-app-layout>
    <div class="container">

        <div class="row">
            <div class="col-xl-8 col-lg-8 col-md-8 mx-auto">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="p-5">
                            <form action="{{ route('password.store') }}" method="POST">
                                @csrf

                                <div class="mb-4">
                                    <label for="form-label" for="name">Name <span class="text-danger">*</span></label>

                                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror">

                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="form-label" for="description">Description</label>

                                    <textarea name="description" id="description" cols="15" rows="5" class="form-control @error('description') is-invalid @enderror"></textarea>

                                    @error('description')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="form-label" for="password">Password <span class="text-danger">*</span></label>

                                    <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror">

                                    @error('password')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <button class="btn btn-primary">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>
