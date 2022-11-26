@extends('layouts.main')

@section('container')
    <div class="table-title border-bottom mb-3">
        <div class="row">
            <div class="col-sm-8">
                <h2><b>Detail</b> Peminjaman</h2>
            </div>
            <div class="col-sm-4">
                <form action="/peminjaman">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Search..." name="search">
                        <button class="btn btn-outline-secondary" type="submit"> <i class="bi bi-search"></i> </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="d-flex justify-content-end mb-3">
            <a href="" class="badge bg-success p-2"><span data-feather="plus"></span> Add Peminjaman</a>
        </div>
    </div>
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Nasabah</th>
                <th scope="col">Nominal Peminjaman</th>
                <th scope="col">Tanggal Pengajuan</th>
                <th scope="col">Jangka Waktu</th>
                <th scope="col">Hasil Keputusan</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($peminjaman as $p)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $p->nasabah->nama }}</td>
                    <td>@convert($p->nominal)</td>
                    <td>{{ \Carbon\Carbon::parse($p->tanggalPengajuan)->format('D, d M Y H:i:s') }}</td>
                    <td>{{ $p->jangkaWaktu }}</td>
                    @if ($p->hasilKeputusan)
                        <td>Yes</td>
                    @else
                        <td>No</td>
                    @endif
                    <td>
                        <a href="/peminjaman/{{ $p->id }}" class="badge bg-primary"><span
                                data-feather="eye"></span></a>
                        <a href="" class="badge bg-warning"><span data-feather="edit"></span></a>
                        <a href="" class="badge bg-danger"><span data-feather="trash-2"></span></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <br>
    {{ $peminjaman->onEachSide(1)->links() }}
@endsection
