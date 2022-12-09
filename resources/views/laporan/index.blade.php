@extends('layouts.main')

@section('container')
    <div class="row border-bottom mb-3">
        <div class="col-sm-8">
            <h2><b>Laporan</b> Simpan Pinjam</h2>
        </div>
    </div>
    <div class="col-lg-8 mx-auto">
        <form action="/laporan" method="POST">
            @csrf
            <div class="mb-3">
                <label for="jangkaWaktu" class="form-label">Jangka Waktu</label>
                <select class="form-select" name="jangkaWaktu">
                    <option disabled selected hidden>Pilih Jangka Waktu</option>
                    @foreach ($waktu as $w)
                        <option value="{{ $w }}">{{ $w }} Bulan</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary" id="button"><i class="bi bi-download"></i> Download</button>
        </form>
    </div>
@endsection
