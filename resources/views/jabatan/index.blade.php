@extends('layouts.app', [
    'namePage' => 'Table Jabatab',
    'class' => 'sidebar-mini',
    'activePage' => 'jabatan',
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
                        <h4 class="card-title">Jabatan Kel-Tani Sejahtera</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <a href="/jabatan/create" class="btn btn-primary">Tambah Data Jabatan</a>
                                <tr class="text-primary">
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Jabatan</th>
                                    <th>Edit</th>
                                </tr>

                                @foreach ($jabatans as $jabatan)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $jabatan->anggota->nama }}</td>
                                        <td>{{ $jabatan->jabatan }}</td>
                                        <td class="d-grid gap-2 d-md-flex justify-content">
                                            <a href="/jabatan/{{ $jabatan->id }}/edit"
                                                class="btn btn-warning">Edit</a>
                                            <form class="d-inline" action="/jabatan/{{ $jabatan->id }}"
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
                            {{ $jabatans->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
