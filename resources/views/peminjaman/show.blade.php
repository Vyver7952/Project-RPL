@extends('layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><b>View Peminjaman</b> | {{ $peminjaman['nasabah']->nama }}</h1>
    </div>

    <div class="col-lg-8 mx-auto">
        <form action="/peminjaman" method="post">
            @csrf
            <div class="mb-3">
                <label for="simpanid" class="form-label">ID Peminjaman</label>
                <input type="text" class="form-control" id="simpanid" name="simpanid" value="P-@Lpad($peminjaman['id'])" disabled>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Nasabah</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $peminjaman['nasabah']->nama }}"
                    disabled>
            </div>
            <div class="mb-3">
                <label for="nominal" class="form-label">Nominal</label>
                <input type="text" class="form-control" id="nominal" name="nominal" value="@convert($peminjaman['nominal'])"
                    disabled>
            </div>
            <div class="mb-3">
                <label for="tanggalPengajuan" class="form-label">Tanggal Pengajuan</label>
                <input type="text" class="form-control" id="tanggalPengajuan" name="tanggalPengajuan"
                    value="{{ \Carbon\Carbon::parse($peminjaman['tanggalPengajuan'])->format('D, d M Y H:i:s') }}" disabled>
            </div>
            <div class="mb-3">
                <label for="updated_at" class="form-label">Setoran Terakhir</label>
                <input type="text" class="form-control" id="updated_at" name="updated_at"
                    value="{{ \Carbon\Carbon::parse($peminjaman['updated_at'])->format('D, d M Y H:i:s') }}" disabled>
            </div>
        </form>
        <a href="/peminjaman" class="btn btn-danger">Back</a>
    </div>

    <div class="table-title border-top mt-3 mb-5">
        <div class="row">
            <div class="col-sm-8 pt-3">
                <h2><b>Detail</b> Setoran</h2>
            </div>
        </div>
    </div>
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tanggal Setoran</th>
                <th scope="col">Nominal</th>
                <th scope="col">Sisa Pembayaran</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transaksi as $t)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ \Carbon\Carbon::parse($t['created_at'])->format('D, d M Y H:i:s') }}</td>
                    <td>@convert($t['nominalSetor'])</td>
                    <td>@convert($t['sisaPembayaran'])</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $transaksi->onEachSide(1)->links() }}
@endsection
