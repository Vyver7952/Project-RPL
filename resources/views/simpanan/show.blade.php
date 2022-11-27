@extends('layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><b>View Simpanan</b> | {{ $simpanan->nasabah->nama }}</h1>
    </div>

    <div class="col-lg-8 mx-auto">
        <form action="/simpanan" method="post">
            @csrf
            <div class="mb-3">
                <label for="simpanid" class="form-label">ID Simpanan</label>
                <input type="text" class="form-control" id="simpanid" name="simpanid" value="S-@Lpad($simpanan->id)" disabled>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Nasabah</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $simpanan->nasabah->nama }}"
                    disabled>
            </div>
            <div class="mb-3">
                <label for="saldo" class="form-label">Saldo</label>
                <input type="text" class="form-control" id="saldo" name="saldo" value="@convert($simpanan->saldo)"
                    disabled>
            </div>
            <div class="mb-3">
                <label for="created_at" class="form-label">Tanggal Pembuatan</label>
                <input type="text" class="form-control" id="created_at" name="created_at"
                    value="{{ \Carbon\Carbon::parse($simpanan->created_at)->format('D, d M Y H:i:s') }}" disabled>
            </div>
            <div class="mb-3">
                <label for="updated_at" class="form-label">Transaksi Terakhir</label>
                <input type="text" class="form-control" id="updated_at" name="updated_at"
                    value="{{ \Carbon\Carbon::parse($simpanan->updated_at)->format('D, d M Y H:i:s') }}" disabled>
            </div>
        </form>
        <a href="/simpanan" class="btn btn-danger">Back</a>
    </div>

    <div class="table-title border-top mt-3 mb-5">
        <div class="row">
            <div class="col-sm-8 pt-3">
                <h2><b>Detail</b> Transaksi</h2>
            </div>
        </div>
    </div>
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tanggal Transaksi</th>
                <th scope="col">Nominal</th>
                <th scope="col">Status</th>
                <th scope="col">Saldo Simpanan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transaksi as $t)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ \Carbon\Carbon::parse($t->created_at)->format('D, d M Y H:i:s') }}</td>
                    <td>@convert($t->nominal)</td>
                    <td>{{ $t->status }}</td>
                    <td>@convert($t->saldo_total)</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $transaksi->onEachSide(1)->links() }}
@endsection
