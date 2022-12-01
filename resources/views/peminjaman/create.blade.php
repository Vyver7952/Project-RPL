@extends('layouts.main')

@section('container')
@if (session()->has('alert'))
        <div class="alert alert-danger alert-dismissible mx-auto col-sm-3" role="alert">
            {{ session('alert') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><b>Create</b> New Peminjaman</h1>
    </div>

    <div class="col-lg-8 mx-auto">
        <form action="/peminjaman" method="post">
            @csrf
            <div class="mb-3">
                <label for="peminjamanid" class="form-label">ID Peminjaman</label>
                <input type="text" class="form-control" id="peminjamanid" name="peminjamanid" value="P-@Lpad($idpeminjaman)" readonly>
            </div>
            <div class="mb-3">
                <label for="nasabah_id" class="form-label">Nasabah</label>
                <select class="form-select" name="nasabah_id">
                    <option disabled selected hidden>Pilih Nasabah</option>
                    @foreach ($nasabah as $n)
                        <option value="{{ $n['id'] }}">N-@Lpad($n['id']) --- {{ $n['nama'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="nominal" class="form-label">Nominal</label>
                <div class="input-group">
                    <span class="input-group-text">Rp</span>
                    <input type="text" class="form-control @error('nominal') is-invalid @enderror" id="nominal"
                        name="nominal" value="{{ old('nominal') }}" required>
                    @error('nominal')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            {{-- <div class="mb-3">
                <label for="syaratPeminjaman" class="form-label">Dokumen Peminjaman</label>
                <div class="input-group">
                    <input type="file" class="form-control @error('syaratPeminjaman') is-invalid @enderror" id="syaratPeminjaman"
                        name="syaratPeminjaman" required>
                    @error('syaratPeminjaman')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div> --}}
            <div class="mb-3">
                <label for="jangkaWaktu" class="form-label">Jangka Waktu</label>
                <select class="form-select" name="jangkaWaktu">
                    <option disabled selected hidden>Pilih Jangka Waktu</option>
                    @foreach ($jangkaWaktu as $waktu)
                        <option value="{{ $waktu }}">{{ $waktu }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Create Peminjaman</button>
            <a href="/peminjaman" class="btn btn-danger">Cancel</a>
        </form>
    </div>
@endsection
