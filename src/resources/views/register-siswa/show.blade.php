@extends('adminlte::page')
@section('title', 'Daftar Siswa')
@section('content_header')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
            <li class="breadcrumb-item"><a href="/mst-pangkat">
                    Daftar Siswa</a></li>
            <li class="breadcrumb-item active" aria-current="page">Lihat</li>
        </ol>
    </nav>
@stop
@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">
                                <h3>Lihat Daftar Siswa</h3>
                            </span>
                        </div>

                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('daftar-siswa.index') }}">
                                Kembali</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <strong>Nama:</strong>
                            {{ $registerSiswa->nama }}
                        </div>

                        <div class="form-group">
                            <strong>Alamat:</strong>
                            {{ $registerSiswa->alamat }}
                        </div>

                        <div class="form-group">
                            <strong>Tanggal Lahir:</strong>
                            {{ $registerSiswa->tanggal_lahir }}
                        </div>

                        <div class="form-group">
                            <strong>Agama:</strong>
                            {{ $registerSiswa->getAgama() }}
                        </div>

                        <div class="form-group">
                            <strong>Jenis Kelamin:</strong>
                            {{ $registerSiswa->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}
                        </div>

                        <div class="form-group">
                            <strong>Alamat:</strong>
                            {{ $registerSiswa->alamat }}
                        </div>

                        <div class="form-group">
                            <strong>Nilai Bahasa Indonesia:</strong>
                            {{ $registerSiswa->nilai_ind }}
                        </div>

                        <div class="form-group">
                            <strong>Nilai Matematika:</strong>
                            {{ $registerSiswa->nilai_mtk }}
                        </div>

                        <div class="form-group">
                            <strong>Nilai IPA:</strong>
                            {{ $registerSiswa->nilai_ipa }}
                        </div>

                        <div class="form-group">
                            <strong>Total Nilai:</strong>
                            {{ $registerSiswa->total_nilai }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
