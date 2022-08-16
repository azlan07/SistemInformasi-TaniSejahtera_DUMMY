@extends('layouts.app', [
    'namePage' => 'Table Iuran Bulanan',
    'class' => 'sidebar-mini',
    'activePage' => 'iuran_bulanan',
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
                        <h4 class="card-title">Iuran Bulanan Kel-Tani Sejahtera</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <a href="/iuran_bulanan/create" class="btn btn-primary">Tambah Data Iuran</a>
                                <tr class="text-primary">
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Tanggal</th>
                                    <th>Setoran</th>
                                    <th>Saldo</th>
                                    <th>Edit</th>
                                </tr>

                                @foreach ($iuran_bulanans as $iuran)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $iuran->anggota->nama }}</td>
                                        <td>{{ $iuran->tanggal }}</td>
                                        <td>{{ $iuran->setoran }}</td>
                                        <td>{{ $iuran->saldo }}</td>
                                        <td class="d-grid gap-2 d-md-flex justify-content">
                                            <a href="/iuran_bulanan/{{ $iuran->id }}/edit"
                                                class="btn btn-warning">Edit</a>
                                            <form class="d-inline" action="/iuran_bulanan/{{ $iuran->id }}"
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
                            {{ $iuran_bulanans->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
