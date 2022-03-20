<div class="container">
    <div class="row">

        <div class="col-md-12">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <div class="p-5">

                        <div class="text-center">
                            @if (session()->has('success'))
                                <span class="text-success">{{ session('success') }}</span>
                            @endif
                        </div>

                        <a href="{{ route('password.create') }}">
                            <button class="btn btn-sm btn-dark mb-2">Create</button>
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
                                                    <button class="btn btn-sm btn-dark opacity-75" wire:click="encryptPassword()">Hide</button>
                                                @else
                                                    <button class="btn btn-sm btn-dark" wire:click="decryptPassword({{ $password->id }})">Show</button>
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
                                                    <button class="btn btn-sm btn-dark opacity-75">Edit</button>
                                                </a>
                                            </td>
                                            <td>
                                                <form wire:submit.prevent="destroy({{ $password->id }})" method="POST">
                                                    @method('DELETE')
                                                    @csrf

                                                    <button class="btn btn-sm btn-danger">Delete</button>
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
                </div>
            </div>
        </div>
    </div>

</div>
