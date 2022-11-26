@extends('layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create New Simpanan</h1>
    </div>

    <div class="col-lg-8 mx-auto">
        <form action="/simpanan" method="post">
            @csrf
            <div class="mb-3">
                <label for="simpanid" class="form-label">ID Simpanan</label>
                <input type="text" class="form-control" id="simpanid" name="simpanid" value="S-@Lpad($idsimpanan)" readonly>
                <input type="text" class="form-control" id="idsimpanan" name="idsimpanan" value="{{ $idsimpanan }}" readonly hidden>
            </div>
            <div class="mb-3">
                <label for="nasabah_id" class="form-label">Nasabah</label>
                <select class="form-select" name="nasabah_id">
                    <option disabled selected hidden>Pilih Nasabah</option>
                    @foreach ($nasabah as $n)
                        <option value="{{ $n->id }}">N-@Lpad($n->id) --- {{ $n->nama }}</option>
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
            <button type="submit" class="btn btn-primary">Create Simpanan</button>
            <a href="/simpanan" class="btn btn-danger">Cancel</a>
        </form>
    </div>
@endsection
