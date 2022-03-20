<x-app-layout>
    <div class="container">

        <div class="row">
            <div class="col-xl-8 col-lg-8 col-md-8 mx-auto">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="p-5">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
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
                                            <td>{{ $password->id }}</td>
                                            <td>{{ $password->name }}</td>
                                            <td>{{ $password->description }}</td>
                                            <td>
                                                <a href="{{ route('password.show', $password->id) }}">
                                                    <button class="btn btn-sm btn-primary">View</button>
                                                </a>
                                            </td>
                                            <td><button class="btn btn-sm btn-warning">Edit</button></td>
                                            <td>
                                                <form action="{{ route('password.destroy', $password->id) }}" method="POST">
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>
