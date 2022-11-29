@extends('layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><b>View Nasabah</b> | {{ $nasabah['nama'] }}</h1>
    </div>

    <div class="col-lg-8 mx-auto">
        <form action="/users" method="post">
            @csrf
            <div class="mb-3">
                <label for="userid" class="form-label">User ID</label>
                <input type="text" class="form-control" id="userid" name="userid" value="N-@Lpad($nasabah['id'])" disabled>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $nasabah['nama'] }}"
                    disabled>
            </div>
            <div class="mb-3">
                <label for="created_at" class="form-label">Tanggal Pendaftaran</label>
                <input type="text" class="form-control" id="created_at" name="created_at"
                    value="{{ \Carbon\Carbon::parse($nasabah['created_at'])->format('D, d M Y H:i:s') }}" disabled>
            </div>
            <div class="mb-3">
                <label for="updated_at" class="form-label">Terakhir di Update</label>
                <input type="text" class="form-control" id="updated_at" name="updated_at"
                    value="{{ \Carbon\Carbon::parse($nasabah['updated_at'])->format('D, d M Y H:i:s') }}" disabled>
            </div>
            <div class="mb-3">
                <label for="simpanan" class="form-label">Simpanan</label>
                <input type="text" class="form-control" id="simpanan" name="simpanan"
                @if (empty($nasabah['simpanan']->saldo))
                    value = "Tidak Memiliki Simpanan"
                @else
                    value="@convert($nasabah['simpanan']->saldo)"
                @endif
                    disabled>
            </div>
            <div class="mb-3">
                <label for="peminjaman" class="form-label">Peminjaman</label>
                <input type="text" class="form-control" id="peminjaman" name="peminjaman"
                @if (empty($nasabah['peminjaman']->nominal))
                    value = "Tidak Memiliki Peminjaman"
                @else
                    value = "@convert($nasabah['peminjaman']->nominal)"
                @endif
                    disabled>
            </div>
        </form>
        <a href="/nasabah" class="btn btn-danger">Back</a>
    </div>
@endsection
