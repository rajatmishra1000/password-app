<div class="container">
    <div class="row">

        <div class="col-md-5 mx-auto">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">

                    <div class="p-5">

                        <div class="text-center mt-2">
                            @if (session()->has('success'))
                                <span class="text-success">{{ session('success') }}</span>
                            @endif
                        </div>

                        <section>
                            <form wire:submit.prevent="store" method="POST">
                                @csrf

                                <div class="mb-4">
                                    <label for="form-label" for="name">Name <span class="text-danger">*</span></label>

                                    <input
                                        type="text"
                                        name="name"
                                        id="name"
                                        wire:model="name"
                                        class="form-control @error('name') is-invalid @enderror">

                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="form-label" for="description">Description</label>

                                    <textarea name="description" wire:model="description" id="description" cols="15" rows="5" class="form-control @error('description') is-invalid @enderror"></textarea>

                                    @error('description')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="form-label" for="password">Password <span class="text-danger">*</span></label>

                                    <input
                                        type="password"
                                        wire:model="password"
                                        name="password"
                                        id="password"
                                        class="form-control @error('password') is-invalid @enderror">

                                    @error('password')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <button class="btn btn-dark">Add Item</button>
                            </form>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
