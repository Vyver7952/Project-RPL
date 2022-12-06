@extends('layouts.main')

@section('container')
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible mx-auto col-sm-3" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="table-title border-bottom mb-3">
        <div class="row">
            <div class="col-sm-8">
                <h2><b>Detail</b> Peminjaman</h2>
            </div>
            <div class="col-sm-4">
                <form action="/peminjaman">
                    <div class="input-group mb-3">
                        @if (request('nasabah'))
                            <input type="hidden" class="form-control" name="nasabah" value="{{ request('nasabah') }}">
                        @endif
                        <input type="text" class="form-control" placeholder="Search..." name="search"
                            value="{{ request('search') }}">
                        <button class="btn btn-outline-secondary" type="submit"> <i class="bi bi-search"></i> </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="d-flex justify-content-end mb-3">
            <a href="/peminjaman/create" class="badge bg-success p-2"><span data-feather="plus"></span> Add Peminjaman</a>
        </div>
    </div>
    @if ($peminjaman->count())
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
                        <td>{{ $p['nasabah']->nama }}</td>
                        <td>@convert($p['nominal'])</td>
                        <td>{{ \Carbon\Carbon::parse($p['created_at'])->format('D, d M Y H:i:s') }}</td>
                        <td>{{ $p['jangkaWaktu'] }}</td>
                        @if ($p->hasilKeputusan)
                            <td>Yes</td>
                        @else
                            <td>No</td>
                        @endif
                        <td>
                            <a href="/peminjaman/{{ $p['id'] }}" class="badge bg-primary"><span
                                    data-feather="eye"></span></a>
                            @if (auth()->user()->is_admin)
                                <a href="/peminjaman/{{ $p['id'] }}/edit" class="badge bg-warning"><span
                                        data-feather="edit"></span></a>
                            @endif
                            <form action="/peminjaman/{{ $p['id'] }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><span
                                        data-feather="trash-2"></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="text-center fs-4">Nasabah Not Found</p>
    @endif
    <br>
    {{ $peminjaman->onEachSide(1)->links() }}
@endsection
