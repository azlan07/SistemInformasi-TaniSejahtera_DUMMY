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
                    <div class="card-header">
                        <h4 class="card-title">Entry Data Jadwal Garap Kel-Tani Sejahtera</h4>
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <form action="/jadwal_garap" method="post">
                                    @csrf
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
                                    <div class="form-group">
                                        <label class="form-label">Sawah</label>
                                        <select class="form-control" name="sawah_id">
                                            @foreach ($sawahs as $sawah)
                                                @if (old('sawah_id') == $sawah->id)
                                                    <option value="{{ $sawah->id }}" selected>{{ $sawah->nama }}
                                                    </option>
                                                @else
                                                    <option value="{{ $sawah->id }}">{{ $sawah->nama }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="tanggal_garap" class="form-label">Tanggal Garap</label>
                                        <input type="date" class="form-control @error('tanggal_garap') is-invalid @enderror"
                                            id="tanggal_garap" name="tanggal_garap" value="{{ old('tanggal_garap') }}">
                                        @error('tanggal_garap')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"></label>
                                        <button type="submit" name="submit" class="btn btn-primary float-end">Create
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
