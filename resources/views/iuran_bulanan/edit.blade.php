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
                    <div class="card-header">
                        <h4 class="card-title">Edit Data Anggota Kel-Tani Sejahtera</h4>
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <form action="/iuran_bulanan/{{ $iuran_bulanans->id }}" method="post">
                                    @method('PUT')
                                    @csrf
                                    <div class="form-group">
                                        <label class="form-label">Nama</label>
                                        <select class="form-control" name="id_anggota">
                                            @foreach ($anggotas as $anggota)
                                                @if (old('id_anggota', $iuran_bulanans->id_anggota) == $anggota->id)
                                                    <option value="{{ $anggota->id }}" selected>{{ $anggota->nama }}
                                                    </option>
                                                @else
                                                    <option value="{{ $anggota->id }}">{{ $anggota->nama }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="tanggal" class="form-label">Tanggal</label>
                                        <input type="date" class="form-control @error('tanggal') is-invalid @enderror"
                                            id="tanggal" name="tanggal" value="{{ old('tanggal', $iuran_bulanans->tanggal) }}">
                                        @error('tanggal')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="setoran" class="form-label">Setoran</label>
                                        <input type="text" class="form-control @error('setoran') is-invalid @enderror"
                                            id="setoran" name="setoran" value="{{ old('setoran', $iuran_bulanans->setoran) }}">
                                        @error('setoran')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="saldo" class="form-label">Saldo</label>
                                        <input type="text" class="form-control @error('saldo') is-invalid @enderror"
                                            id="saldo" name="saldo" value="{{ old('saldo', $iuran_bulanans->saldo) }}">
                                        @error('saldo')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"></label>
                                        <button type="submit" name="submit" class="btn btn-primary float-end">Update
                                            Iuran</button>
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
