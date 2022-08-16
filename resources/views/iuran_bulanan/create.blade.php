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
                        <h4 class="card-title">Entry Data Iuran Kel-Tani Sejahtera</h4>
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <form action="/iuran_bulanan" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label class="form-label">Nama</label>
                                        <select class="form-control" name="id_anggota">
                                            @foreach ($anggotas as $iuran)
                                                @if (old('id_anggota') == $iuran->id)
                                                    <option value="{{ $iuran->id }}" selected>{{ $iuran->nama }}
                                                    </option>
                                                @else
                                                    <option value="{{ $iuran->id }}">{{ $iuran->nama }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="tanggal" class="form-label">Tanggal</label>
                                        <input type="date" class="form-control @error('tanggal') is-invalid @enderror"
                                            id="tanggal" name="tanggal" value="{{ old('tanggal') }}">
                                        @error('tanggal')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="setoran" class="form-label">Setoran</label>
                                        <input type="text" class="form-control @error('setoran') is-invalid @enderror"
                                            id="setoran" name="setoran" value="{{ old('setoran') }}">
                                        @error('setoran')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="saldo" class="form-label">Saldo</label>
                                        <input type="text" class="form-control @error('saldo') is-invalid @enderror"
                                            id="saldo" name="saldo" value="{{ old('saldo') }}">
                                        @error('saldo')
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
