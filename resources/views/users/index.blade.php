@extends('layouts.main')

@section('container')
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible mx-auto col-sm-3" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="table-title border-bottom mb-3">
        <div class="row">
            <div class="col-sm-8">
                <h2><b>Detail</b> Users</h2>
            </div>
            <div class="col-sm-4">
                <form action="/users">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Search..." name="search"
                            value="{{ request('search') }}">
                        <button class="btn btn-outline-secondary" type="submit"> <i class="bi bi-search"></i> </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="d-flex justify-content-end mb-3">
            <a href="/users/create" class="badge bg-success p-2"><span data-feather="plus"></span> Add User</a>
        </div>
    </div>
    @if ($users->count())
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Username</th>
                    <th scope="col">Password</th>
                    <th scope="col">Is Admin</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user['name'] }}</td>
                        <td>{{ $user['email'] }}</td>
                        <td>{{ $user['username'] }}</td>
                        <td>{{ $user['password'] }}</td>
                        @if ($user->is_admin)
                            <td>Yes</td>
                        @else
                            <td>No</td>
                        @endif
                        <td>
                            <a href="/users/{{ $user['id'] }}" class="badge bg-primary"><span
                                    data-feather="eye"></span></a>
                            <a href="/users/{{ $user['id'] }}/edit" class="badge bg-warning"><span
                                    data-feather="edit"></span></a>
                            <form action="/users/{{ $user['id'] }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><span
                                        data-feather="trash-2"></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="text-center fs-4">User Not Found</p>
    @endif

    <br>
    {{ $users->onEachSide(1)->links() }}
@endsection
