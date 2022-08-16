@extends('layouts.app', [
    'namePage' => 'Table Peminjaman Traktor',
    'class' => 'sidebar-mini',
    'activePage' => 'traktor',
])

@section('content')
    <div class="panel-header panel-header-sm">
    </div>

    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Entry Data Peminjaman Traktor Kel-Tani Sejahtera</h4>
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <form action="/traktor" method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="kode_traktor" class="form-label">Kode Traktor</label>
                                        <input type="text"
                                            class="form-control @error('kode_traktor') is-invalid @enderror"
                                            id="kode_traktor" name="kode_traktor" value="{{ old('kode_traktor') }}">
                                        @error('kode_traktor')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Nama</label>
                                        <select class="form-control" name="id_anggota">
                                            @foreach ($anggotas as $anggota)
                                                @if (old('id_anggota') == $anggota->id)
                                                    <option value="{{ $anggota->id }}" selected>{{ $anggota->nama }}
                                                    </option>
                                                @else
                                                    <option value="{{ $anggota->id }}">{{ $anggota->nama }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="tanggal_pinjam" class="form-label">Tanggal Pinjam</label>
                                        <input type="date"
                                            class="form-control @error('tanggal_pinjam') is-invalid @enderror"
                                            id="tanggal_pinjam" name="tanggal_pinjam" value="{{ old('tanggal_pinjam') }}">
                                        @error('tanggal_pinjam')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="tanggal_kembali" class="form-label">Tanggal Kembali</label>
                                        <input type="date"
                                            class="form-control @error('tanggal_kembali') is-invalid @enderror"
                                            id="tanggal_kembali" name="tanggal_kembali"
                                            value="{{ old('tanggal_kembali') }}">
                                        @error('tanggal_kembali')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"></label>
                                        <button type="submit" name="submit" class="btn btn-primary float-end">Create
                                            Peminjaman</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
