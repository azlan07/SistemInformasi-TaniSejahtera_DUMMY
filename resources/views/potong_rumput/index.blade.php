@extends('layouts.app', [
    'namePage' => 'Table Peminjaman Potong Rumput',
    'class' => 'sidebar-mini',
    'activePage' => 'potong_rumput',
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
                        <h4 class="card-title">Peminjaman Potong Rumput Kel-Tani Sejahtera</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <a href="/potong_rumput/create" class="btn btn-primary">Tambah Data Peminjaman</a>
                                <tr class="text-primary">
                                    <th>No</th>
                                    <th>Kode Potong Rumput</th>
                                    <th>Nama</th>
                                    <th>Tanggal Pinjam</th>
                                    <th>Tanggal Kembali</th>
                                    <th>Edit</th>
                                </tr>

                                @foreach ($potong_rumputs as $iuran)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $iuran->kode_potong_rumput }}</td>
                                        <td>{{ $iuran->anggota->nama }}</td>
                                        <td>{{ $iuran->tanggal_pinjam }}</td>
                                        <td>{{ $iuran->tanggal_kembali }}</td>
                                        <td class="d-grid gap-2 d-md-flex justify-content">
                                            <a href="/potong_rumput/{{ $iuran->id }}/edit"
                                                class="btn btn-warning">Edit</a>
                                            <form class="d-inline" action="/potong_rumput/{{ $iuran->id }}"
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
                            {{ $potong_rumputs->links('pagination::bootstrap-5') }}
                        </div>
                        <a href="/printPotongR" target="_blank" class="btn btn-primary">Print</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
