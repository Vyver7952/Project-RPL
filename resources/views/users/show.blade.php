@extends('layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">View User | {{ $user->name }}</h1>
    </div>

    <div class="col-lg-8 mx-auto">
        <form action="/users" method="post">
            @csrf
            <div class="mb-3">
                <label for="userid" class="form-label">User ID</label>
                <input type="text" class="form-control" id="userid" name="userid" value="{{ $user->id }}" disabled>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}"
                    disabled>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}"
                    disabled>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" value="{{ $user->username }}"
                    disabled>
            </div>
            <div class="mb-3">
                <legend for="is_admin" class="col-form-label">Admin</legend>
                @if ($user->is_admin)
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="is_admin" id="isadmin_yes" value="1"
                            checked>
                        <label class="form-check-label" for="isadmin_yes">Ya</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="is_admin" id="isadmin_no" value="0"
                            checked>
                        <label class="form-check-label" for="isadmin_no">Tidak</label>
                    </div>
                @else
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="is_admin" id="isadmin_yes" value="1"
                            checked>
                        <label class="form-check-label" for="isadmin_yes">Ya</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="is_admin" id="isadmin_no" value="0"
                            checked>
                        <label class="form-check-label" for="isadmin_no">Tidak</label>
                    </div>
                @endif
            </div>
            <div class="mb-3">
                <label for="created_at" class="form-label">Tanggal Pembuatan</label>
                <input type="text" class="form-control" id="created_at" name="created_at" value="{{ \Carbon\Carbon::parse($user->created_at)->format('D, d M Y') }}"
                    disabled>
            </div>
            <div class="mb-3">
                <label for="updated_at" class="form-label">Terakhir di Update</label>
                <input type="text" class="form-control" id="updated_at" name="updated_at" value="{{ \Carbon\Carbon::parse($user->updated_at)->format('D, d M Y') }}"
                    disabled>
            </div>
        </form>
        <a href="/users" class="btn btn-danger">Back</a>
    </div>
@endsection
