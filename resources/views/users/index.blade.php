@extends('layouts.main')

@section('container')
    <div class="table-title">
        <div class="row row-cols-2">
            <div class="col-sm-8">
                <h2>Users <b>Details</b></h2>
            </div>
            <div class="col-sm-4">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
                    <input type="text" class="form-control" placeholder="Search" aria-label="Search"
                        aria-describedby="basic-addon1">
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-end">
            <a href="" class="badge bg-success p-2"><span data-feather="plus"></span> Add User</a>
        </div>
    </div>
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">E-mail</th>
                <th scope="col">Is Admin</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    @if ($user->is_admin)
                        <td>Yes</td>
                    @else
                        <td>No</td>
                    @endif
                    <td>
                        <a href="/users/{{ $user->id }}" class="badge bg-primary" id="detailProductModal"><span
                                data-feather="eye"></span></a>
                        <a href="" class="badge bg-warning"><span data-feather="edit"></span></a>
                        <a href="" class="badge bg-danger"><span data-feather="trash-2"></span></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <br>
    {{ $users->onEachSide(1)->links() }}
@endsection
