@extends('layouts.app', [
    'namePage' => 'Table Anggota',
    'class' => 'sidebar-mini',
    'activePage' => 'anggota',
])

@section('content')
    <div class="panel-header panel-header-sm">
    </div>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    @if (session()->has('pesan'))
                        <div class="alert alert-info alert-with-icon alert-dismissible fade show" data-notify="container">
                            <button type="button" aria-hidden="true" class="close"data-bs-dismiss="alert" aria-label="Close">
                                <i class="now-ui-icons ui-1_simple-remove"></i>
                            </button>
                            <span data-notify="icon" class="now-ui-icons ui-1_bell-53"></span>
                            <span data-notify="message">{{ session('pesan') }}</span>
                        </div>
                    @endif

                    <div class="card-header">
                        <h4 class="card-title">Anggota Kel-Tani Sejahtera</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <a href="/anggota/create" class="btn btn-primary">Tambah Data Anggota</a>
                                <tr class="text-dark">
                                    <th>No</th>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>Kelamin</th>
                                    <th>Sawah</th>
                                    <th>Alamat</th>
                                    <th>Edit</th>
                                </tr>

                                @foreach ($anggotas as $anggota)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $anggota->nik }}</td>
                                        <td>{{ $anggota->nama }}</td>
                                        <td>{{ $anggota->jenis_kelamin }}</td>
                                        <td>{{ $anggota->sawah->nama }}</td>
                                        <td>{{ $anggota->alamat }}</td>
                                        <td class="d-grid gap-2 d-md-flex justify-content">
                                            <a href="/anggota/{{ $anggota->id }}/edit" class="btn btn-warning">Edit</a>
                                            <form class="d-inline" action="/anggota/{{ $anggota->id }}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger"
                                                    onclick="return confirm('Yakin akan menghapus data?')">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                            {{ $anggotas->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
