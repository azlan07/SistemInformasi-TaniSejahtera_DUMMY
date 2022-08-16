<link href="{{ asset('assets') }}/css/bootstrap.min.css" rel="stylesheet" />
<link href="{{ asset('assets') }}/css/now-ui-dashboard.css?v=1.3.0" rel="stylesheet" />
<!-- CSS Just for demo purpose, don't include it in your project -->
<link href="{{ asset('assets') }}/demo/demo.css" rel="stylesheet" />
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
                    <h4 class="card-title">Peminjaman Traktor Kel-Tani Sejahtera</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            {{-- <a href="/traktor/create" class="btn btn-primary">Tambah Data Peminjaman</a> --}}
                            <tr class="text-primary">
                                <th>No</th>
                                <th>Kode Traktor</th>
                                <th>Nama</th>
                                <th>Tanggal Pinjam</th>
                                <th>Tanggal Kembali</th>
                                {{-- <th>Edit</th> --}}
                            </tr>

                            @foreach ($traktors as $iuran)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $iuran->kode_traktor }}</td>
                                    <td>{{ $iuran->anggota->nama }}</td>
                                    <td>{{ $iuran->tanggal_pinjam }}</td>
                                    <td>{{ $iuran->tanggal_kembali }}</td>
                                    {{-- <td class="d-grid gap-2 d-md-flex justify-content">
                                        <a href="/traktor/{{ $iuran->id }}/edit"
                                            class="btn btn-warning">Edit</a>
                                        <form class="d-inline" action="/traktor/{{ $iuran->id }}"
                                            method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Yakin akan menghapus data?')">Hapus</button>
                                        </form>
                                    </td> --}}
                                </tr>
                            @endforeach
                        </table>
                        {{-- {{ $traktors->links('pagination::bootstrap-5') }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    window.print();
</script>
