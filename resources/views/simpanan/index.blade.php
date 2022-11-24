@extends('layouts.main')

@section('container')
    <div class="table-title">
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
        <div class="d-flex justify-content-end">
            <a href="" class="badge bg-success p-2"><span data-feather="plus"></span> Add Simpanan</a>
        </div>
    </div>
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Nasabah</th>
                <th scope="col">Saldo Simpanan</th>
                <th scope="col">Transaksi Terakhir</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($simpanan as $s)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $s->nasabah->nama }}</td>
                    <td>@convert($s->saldo)</td>
                    <td>{{ $s->updated_at }}</td>
                    <td>
                        <a href="/simpanan/{{ $s->id }}" class="badge bg-primary"><span
                                data-feather="eye"></span></a>
                        <a href="" class="badge bg-warning"><span data-feather="edit"></span></a>
                        <a href="" class="badge bg-danger"><span data-feather="trash-2"></span></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <br>
    {{ $simpanan->onEachSide(1)->links() }}
@endsection
