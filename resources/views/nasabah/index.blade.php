@extends('layouts.main')

@section('container')
    <div class="table-title">
        <div class="row">
            <div class="col-sm-8">
                <h2><b>Detail</b> Nasabah</h2>
            </div>
            <div class="col-sm-4">
                <form action="/nasabah">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Search..." name="search">
                        <button class="btn btn-outline-secondary" type="submit"> <i class="bi bi-search"></i> </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Nasabah</th>
                <th scope="col">Tanggal Registrasi</th>
                <th scope="col">Terakhir di Update</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($nasabah as $n)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $n->nama }}</td>
                    <td>{{ $n->created_at }}</td>
                    <td>{{ $n->updated_at }}</td>
                    <td>
                        <a href="/nasabah/{{ $n->id }}" class="badge bg-primary"><span
                                data-feather="eye"></span></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <br>
    {{ $nasabah->onEachSide(1)->links() }}
@endsection
