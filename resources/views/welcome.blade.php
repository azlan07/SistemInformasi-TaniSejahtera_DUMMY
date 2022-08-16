@extends('layouts.app', [
    'namePage' => 'Front-End',
    'class' => 'login-page sidebar-mini ',
    'activePage' => 'welcome',
    'backgroundImage' => asset('assets') . '/img/bg14.jpg',
])

@section('content')
    <div class="content">
        <div class="container">
            <div class="col-md-12 ml-auto mr-auto">
                <div class="header bg-gradient-primary py-10 py-lg-2 pt-lg-12">
                    <div class="container">
                        <div class="header-body text-center mb-7">
                            <div class="row justify-content-center">
                                <div class="col-lg-12 col-md-9">
                                    <h3 class="text-white">{{ __('Sistem Informasi Tani Sejahtera') }}</h3>
                                    <p class="text-lead text-light mt-3 mb-0">
                                        @include('alerts.migrations_check')
                                    </p>
                                </div>

                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Table Anggota</h4>
                                            <p class="category">Data-data anggota kelompok tani sejahtera Nagari Sumanik</p>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <tr class="text-dark">
                                                        <th>No</th>
                                                        <th>NIK</th>
                                                        <th>Nama</th>
                                                        <th>Kelamin</th>
                                                        <th>Sawah</th>
                                                        <th>Alamat</th>
                                                    </tr>

                                                    @foreach ($anggotas as $anggota)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $anggota->nik }}</td>
                                                            <td>{{ $anggota->nama }}</td>
                                                            <td>{{ $anggota->jenis_kelamin }}</td>
                                                            <td>{{ $anggota->sawah->nama }}</td>
                                                            <td>{{ $anggota->alamat }}</td>
                                                        </tr>
                                                    @endforeach
                                                </table>
                                                {{ $anggotas->links('pagination::bootstrap-5') }}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Table Sawah</h4>
                                            <p class="category">Data-data sawah kelompok tani sejahtera Nagari Sumanik</p>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <tr class="text-dark">
                                                        <th>No</th>
                                                        <th>Nama</th>
                                                      </tr>

                                                      @foreach ($sawahs as $sawah)
                                                      <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $sawah->nama}}</td>
                                                      </tr>
                                                    @endforeach
                                                </table>
                                                {{$sawahs->links('pagination::bootstrap-5')}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 ml-auto mr-auto">
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            demo.checkFullPageBackgroundImage();
        });
    </script>
@endpush
