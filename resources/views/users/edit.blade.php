@extends('layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit User | {{ $user->name }}</h1>
    </div>

    <div class="col-lg-8 mx-auto">
        <form action="/users/{{ $user->id }}" method="post">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="userid" class="form-label">User ID</label>
                <input type="text" class="form-control" id="userid" name="userid" value="U-@Lpad($user->id)" readonly>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror"
                    id="name" name="name" value="{{ old('title', $user->name) }}" required>
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror"
                    id="email" name="email" value="{{ old('email', $user->email) }}" required>
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control @error('username') is-invalid @enderror" id="username"
                    name="username" value="{{ old('username', $user->username) }}" required>
                @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                    name="password" required>
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                    id="password_confirmation" name="password_confirmation" required>
                @error('password_confirmation')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <legend for="is_admin" class="col-form-label">Admin</legend>
                @error('is_admin')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <div class="form-check form-check-inline">
                    <input class="form-check-input @error('is_admin') is-invalid @enderror"
                        type="radio" name="is_admin" id="isadmin_yes" value="1" required {{ ($user->is_admin == true) ? 'checked' : '' }}>
                    <label class="form-check-label" for="isadmin_yes">Ya</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input @error('is_admin') is-invalid @enderror"
                        type="radio" name="is_admin" id="isadmin_no" value="0" required {{ ($user->is_admin == false) ? 'checked' : '' }}>
                    <label class="form-check-label" for="isadmin_no">Tidak</label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Update User</button>
            <a href="/users" class="btn btn-danger">Cancel</a>
        </form>
    </div>
@endsection
