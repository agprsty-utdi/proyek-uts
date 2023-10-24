@extends('adminlte::page')
@section('title', 'Daftar Siswa')
@section('content_header')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">
                Daftar Siswa</li>
        </ol>
    </nav>
@stop
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex;
justify-content: space-between;
align-items: center;">
                            <span id="card_title">
                                <h3>INFORMASI PENERIMAAN SISWA BARU SMP NEGERI 1
                                    PERIODE TAHUN AKADEMIK 2022/2023</h3>
                            </span>
                            <div class="float-right">
                                @include('register-siswa.search', [
                                    'url' => 'daftar-siswa',
                                    'link' => 'daftar-siswa',
                                ])

                            </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        <th>NO PEND</th>
                                        <th>NAMA</th>
                                        <th>BHS IND</th>
                                        <th>MTK</th>
                                        <th>IPA</th>
                                        <th>TOTAL</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($registerSiswa as $registerSiswas)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $registerSiswas->no_pendaftaran }}</td>
                                            <td>{{ $registerSiswas->nama }}</td>
                                            <td>{{ $registerSiswas->nilai_ind }}</td>
                                            <td>{{ $registerSiswas->nilai_mtk }}</td>
                                            <td>{{ $registerSiswas->nilai_ipa }}</td>
                                            <td>{{ $registerSiswas->total_nilai }}</td>
                                            <td>
                                                <form
                                                    action="{{ route('daftar-siswa.destroy', $registerSiswas->no_pendaftaran) }}"
                                                    method="POST">
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('daftar-siswa.show', $registerSiswas->no_pendaftaran) }}">
                                                        <i class="fa fa-fw fa-eye"></i> Lihat</a>
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('daftar-siswa.edit', $registerSiswas->no_pendaftaran) }}">
                                                        <i class="fa fa-fw fa-edit"></i> Ubah</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        <i class="fa fa-fw fa-trash">
                                                        </i> Hapus
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $registerSiswa->links('pagination::bootstrap-4') !!}
            </div>
        </div>
    </div>
@endsection
