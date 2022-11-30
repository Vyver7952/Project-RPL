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
                <label for="peminjamanid" class="form-label">ID Simpanan</label>
                <input type="text" class="form-control" id="peminjamanid" name="peminjamanid" value="P-@Lpad($idpeminjaman)" readonly>
                <input type="text" class="form-control" id="idpeminjaman" name="idpeminjaman" value="{{ $idpeminjaman }}" readonly hidden>
            </div>
            <div class="mb-3">
                <label for="nasabah_id" class="form-label">Nasabah</label>
                <select class="form-select" name="nasabah_id">
                    <option disabled selected hidden>Pilih Nasabah</option>
                    @foreach ($nasabah as $n)
                        <option value="{{ $n['id'] }}">N-@Lpad($n->id) --- {{ $n['nama'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="saldo" class="form-label">Nominal</label>
                <div class="input-group">
                    <span class="input-group-text">Rp</span>
                    <input type="text" class="form-control @error('saldo') is-invalid @enderror" id="saldo"
                        name="saldo" value="{{ old('saldo') }}" required>
                    @error('saldo')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <legend for="hasilKeputusan" class="col-form-label">Hasil Keputusan</legend>
                @error('hasilKeputusan')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <div class="form-check form-check-inline">
                    <input class="form-check-input @error('hasilKeputusan') is-invalid @enderror"
                        type="radio" name="hasilKeputusan" id="hasilKeputusan_yes" value="1" required>
                    <label class="form-check-label" for="hasilKeputusan_yes">Ya</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input @error('hasilKeputusan') is-invalid @enderror"
                        type="radio" name="hasilKeputusan" id="hasilKeputusan_no" value="0" required checked>
                    <label class="form-check-label" for="hasilKeputusan_no">Tidak</label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Create Peminjaman</button>
            <a href="/simpanan" class="btn btn-danger">Cancel</a>
        </form>
    </div>
@endsection
