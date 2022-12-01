@extends('layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><b>Edit Peminjaman</b> | {{ $peminjaman['nasabah']->nama }}</h1>
    </div>

    <div class="col-lg-8 mx-auto">
        <form action="/peminjaman/{{ $peminjaman['id'] }}" method="post">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="peminjamanid" class="form-label">ID Peminjaman</label>
                <input type="text" class="form-control" id="peminjamanid" name="peminjamanid" value="P-@Lpad($peminjaman['id'])"
                    readonly>
            </div>
            <div class="mb-3">
                <label for="nasabahidDummy" class="form-label">Nasabah</label>
                <input type="text" class="form-control" id="nasabahidDummy" name="nasabahidDummy"
                    value="{{ $peminjaman['nasabah']->nama }}" readonly>
                <input type="text" class="form-control" id="nasabah_id" name="nasabah_id"
                    value="{{ $peminjaman['nasabah']->id }}" readonly hidden>
            </div>
            <div class="mb-3">
                <label for="nominal" class="form-label">Nominal</label>
                <input type="text" class="form-control" id="nominalDummy" name="nominalDummy" value="@convert($peminjaman['nominal'])"
                    readonly>
                <input type="number" class="form-control" id="nominal" name="nominal"
                    value="{{ $peminjaman['nominal'] }}" readonly hidden>
            </div>
            {{-- <div class="mb-3">
                <label for="syaratPeminjaman" class="form-label">Dokumen Peminjaman</label>
                <div class="input-group">
                    <input type="file" class="form-control @error('syaratPeminjaman') is-invalid @enderror" id="syaratPeminjaman"
                        name="syaratPeminjaman" readonly>
                    @error('syaratPeminjaman')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div> --}}
            <div class="mb-3">
                <label for="tanggalPengajuanDummy" class="form-label">Tanggal Pengajuan</label>
                <input type="text" class="form-control" id="tanggalPengajuanDummy" name="tanggalPengajuanDummy"
                    value="{{ \Carbon\Carbon::parse($peminjaman['tanggalPengajuan'])->format('D, d M Y H:i:s') }}" readonly>
                <input type="text" class="form-control" id="tanggalPengajuan" name="tanggalPengajuan"
                    value="{{ $peminjaman['tanggalPengajuan'] }}" readonly hidden>
            </div>
            <div class="mb-3">
                <label for="jangkaWaktu" class="form-label">Jangka Waktu</label>
                <input type="number" class="form-control" id="jangkaWaktu" name="jangkaWaktu"
                    value="{{ $peminjaman['jangkaWaktu'] }}" readonly>
            </div>
            <div class="mb-3">
                <legend for="hasilKeputusan" class="col-form-label">Hasil Keputusan</legend>
                @error('hasilKeputusan')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <div class="form-check form-check-inline">
                    <input class="form-check-input @error('hasilKeputusan') is-invalid @enderror" type="radio"
                        name="hasilKeputusan" id="hasilKeputusan_yes" value="1" required
                        {{ $peminjaman['hasilKeputusan'] == true ? 'checked' : '' }}>
                    <label class="form-check-label" for="hasilKeputusan_yes">Ya</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input @error('hasilKeputusan') is-invalid @enderror" type="radio"
                        name="hasilKeputusan" id="hasilKeputusan_no" value="0" required
                        {{ $peminjaman['hasilKeputusan'] == false ? 'checked' : '' }}>
                    <label class="form-check-label" for="hasilKeputusan_no">Tidak</label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Update Peminjaman</button>
            <a href="/peminjaman" class="btn btn-danger">Cancel</a>
        </form>
    </div>
@endsection
