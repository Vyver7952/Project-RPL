@extends('layouts.main')

@section('container')
@if (session()->has('alert'))
        <div class="alert alert-danger alert-dismissible mx-auto col-sm-3" role="alert">
            {{ session('alert') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><b>Setor</b> Peminjaman</h1>
    </div>

    <div class="col-lg-8 mx-auto">
        <form action="/peminjaman/setor/{{ $peminjaman['id'] }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="peminjamanid" class="form-label">ID Peminjaman</label>
                <input type="text" class="form-control" id="peminjamanid" name="peminjamanid" value="P-@Lpad($peminjaman['id'])" readonly>
                <input type="text" class="form-control" id="idpeminjaman" name="idpeminjaman" value="{{ $peminjaman['id'] }}" readonly hidden>
            </div>
            <div class="mb-3">
                <label for="nasabah_id" class="form-label">Nasabah</label>
                {{-- <input type="text" class="form-control" id="nasabah_id" name="nasabah_id" value="{{ $peminjaman->nasabah->nama }}" readonly> --}}
            </div>
            <div class="mb-3">
                <label for="nominalSetor" class="form-label">Nominal Setor</label>
                <div class="input-group">
                    <span class="input-group-text">Rp</span>
                    <input type="text" class="form-control @error('nominalSetor') is-invalid @enderror" id="nominalSetor"
                        name="nominalSetor" value="{{ old('nominalSetor') }}" required>
                    @error('nominalSetor')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Create Setor Peminjaman</button>
            <a href="/peminjaman" class="btn btn-danger">Cancel</a>
        </form>
    </div>
@endsection
