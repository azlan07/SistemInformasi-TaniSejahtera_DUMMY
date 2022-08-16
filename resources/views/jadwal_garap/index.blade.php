@extends('layouts.app', [
    'namePage' => 'Table Jadwal Garap',
    'class' => 'sidebar-mini',
    'activePage' => 'jadwal_garap',
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
                        <h4 class="card-title">Jadwal Garap Kel-Tani Sejahtera</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <a href="/jadwal_garap/create" class="btn btn-primary">Tambah Data Jadwal</a>
                                <tr class="text-primary">
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Sawah</th>
                                    <th>Tanggal Garap</th>
                                    <th>Edit</th>
                                </tr>

                                @foreach ($jadwal_garaps as $jadwal_garap)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $jadwal_garap->anggota->nama }}</td>
                                        <td>{{ $jadwal_garap->sawah->nama }}</td>
                                        <td>{{ $jadwal_garap->tanggal_garap }}</td>
                                        <td class="d-grid gap-2 d-md-flex justify-content">
                                            <a href="/jadwal_garap/{{ $jadwal_garap->id }}/edit"
                                                class="btn btn-warning">Edit</a>
                                            <form class="d-inline" action="/jadwal_garap/{{ $jadwal_garap->id }}"
                                                method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger"
                                                    onclick="return confirm('Yakin akan menghapus data?')">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                            {{ $jadwal_garaps->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
