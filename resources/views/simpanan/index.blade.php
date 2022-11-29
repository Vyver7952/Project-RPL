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
                <h2><b>Detail</b> Simpanan</h2>
            </div>
            <div class="col-sm-4">
                <form action="/simpanan">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Search..." name="search">
                        <button class="btn btn-outline-secondary" type="submit"> <i class="bi bi-search"></i> </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col sm-8">
                <div class="d-flex justify-content-end">
                    <a href="/simpanan/create" class="badge bg-success p-2" name="add"><span data-feather="plus"></span> Tambah Transaksi Simpanan</a>
                </div>
            </div>
        </div>
    </div>
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Nasabah</th>
                <th scope="col">Saldo Simpanan</th>
                <th scope="col">Transaksi Terakhir</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($simpanan as $s)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $s['nasabah']->nama }}</td>
                    <td>@convert($s->saldo)</td>
                    <td>{{ \Carbon\Carbon::parse($s['updated_at'])->format('D, d M Y H:i:s') }}</td>
                    <td>
                        <a href="/simpanan/{{ $s['id'] }}" class="badge bg-primary"><span
                                data-feather="eye"></span></a>
                        {{-- <a href="/simpanan/{{ $s->id }}/edit" class="badge bg-warning"><span
                                data-feather="edit"></span></a> --}}
                        <form action="/simpanan/{{ $s['id'] }}" method="post" class="d-inline">
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

    <br>
    {{ $simpanan->onEachSide(1)->links() }}
@endsection
