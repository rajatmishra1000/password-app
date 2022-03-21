<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="mt-4 d-flex justify-content-between">
                <span>Welcome Back, {{ Auth::user()->name }}</span>

                <div>
                    <button class="btn btn-sm btn-outline-danger" wire:click="download">
                        <i class="fa-solid fa-download"></i>
                    </button>
                    <a href="{{ route('password.upload-view') }}">
                        <button class="btn btn-sm btn-outline-dark">
                            <i class="fa-solid fa-upload"></i>
                        </button>
                    </a>
                </div>
            </div>
            <div class="card o-hidden border-0 shadow-lg mb-5 mt-1">
                <div class="card-body p-0">
                    <section>
                        <div class="p-5">

                            <div class="text-center">
                                @if (session()->has('success'))
                                    <span class="text-success">{{ session('success') }}</span>
                                @endif
                            </div>

                            <a href="{{ route('password.create') }}">
                                <button class="btn btn-sm btn-success opacity-75 mb-2">
                                    <i class="fa-solid fa-circle-plus"></i>
                                </button>
                            </a>

                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Password</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($passwords as $password)
                                            <tr>
                                                <td>
                                                    @if ($uniqueId === $password->id && $showPassword)
                                                        <button class="btn btn-sm btn-info opacity-75" wire:click="encryptPassword()">
                                                            <i class="fa fa-eye-slash"></i>
                                                        </button>
                                                    @else
                                                        <button class="btn btn-sm btn-warning text-white" wire:click="decryptPassword({{ $password->id }})">
                                                            <i class="fa-solid fa-eye"></i>
                                                        </button>
                                                    @endif
                                                </td>
                                                <td>{{ $password->name }}</td>
                                                <td>{{ $password->description }}</td>
                                                <td>
                                                    @if ($uniqueId === $password->id && $showPassword)
                                                        {{ $passwordValue }}
                                                    @else
                                                        *******
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('password.update-item', $password->id) }}">
                                                        <button class="btn btn-sm btn-light opacity-75">
                                                            <i class="fa-solid fa-pen-to-square"></i>
                                                        </button>
                                                    </a>
                                                </td>
                                                <td>
                                                    <form wire:submit.prevent="destroy({{ $password->id }})" method="POST">
                                                        @method('DELETE')
                                                        @csrf

                                                        <button
                                                            class="btn btn-sm btn-danger"
                                                            onclick="return confirm('Are you sure you want to delete?')">
                                                            <i class="fa-solid fa-trash-can"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center">No Data Found.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>

                                {{ $passwords->links() }}
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>

</div>
