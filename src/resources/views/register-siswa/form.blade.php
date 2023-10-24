<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-row mb-2">
            {{ Form::label('Nama', 'Nama', ['class' => 'col-sm-3 col-form-label', 'style' => 'font-weight:bold;']) }}
            <div class="col-sm-9">
                {{ Form::text('nama', $registerSiswa->nama, [
                    'class' => 'form-control' . ($errors->has('nama') ? ' is-invalid' : ''),
                    'placeholder' => 'Nama',
                    'required' => 'required'
                ]) }}
                {!! $errors->first(
                    'nama',
                    '<div class="invalid-feedback">
                            :message</p>',
                ) !!}
            </div>
        </div>
        <div class="form-row mb-2">
            {{ Form::label('Alamat', 'Alamat', ['class' => 'col-sm-3 col-form-label', 'style' => 'font-weight:bold;']) }}
            <div class="col-sm-9">
                {{ Form::text('alamat', $registerSiswa->alamat, [
                    'class' => 'form-control' . ($errors->has('alamat') ? ' is-invalid' : ''),
                    'placeholder' => 'Alamat',
                    'required' => 'required'
                ]) }}
                {!! $errors->first('alamat', '<div class="invalid-feedback">:message</p>') !!}
            </div>
        </div>
        <div class="form-row mb-2">
            {{ Form::label('tanggal_lahir', 'Tanggal Lahir', [
                'class' => 'col-sm-3 col-form-label',
                'style' => 'font-weight:bold;',
            ]) }}
            <div class="col-sm-9">
                {{ Form::date('tanggal_lahir', $registerSiswa->tanggal_lahir, [
                    'class' => 'form-control' . ($errors->has('tanggal_lahir') ? ' is-invalid' : ''),
                    'placeholder' => 'Alamat',
                ]) }}
                {!! $errors->first('tanggal_lahir', '<div class="invalid-feedback">:message</p>') !!}
            </div>
        </div>
        <div class="form-row mb-2">
            {{ Form::label('jenis_kelamin', 'Jenis Kelamin', [
                'class' => 'col-sm-3 col-form-label',
                'style' => 'font-weight:bold;',
            ]) }}
            <div class="col-sm-9">
                {!! Form::radio('jenis_kelamin', 'L', $registerSiswa->jenis_kelamin == 'L' ? true : false) !!} Laki-laki
                {!! Form::radio('jenis_kelamin', 'P', $registerSiswa->jenis_kelamin == 'P' ? true : false) !!} Perempuan
                {!! $errors->first(
                    'jenis_kelamin',
                    '<div class="invalid-feedback">
                :message</define_syslog_variables>',
                ) !!}
            </div>
        </div>
        <div class="form-row mb-2">
            {{ Form::label('Asal Sekolah', 'Asal Sekolah', ['class' => 'col-sm-3 col-form-label', 'style' => 'font-weight:bold;']) }}
            <div class="col-sm-9">
                {{ Form::text('asal_sekolah', $registerSiswa->asal_sekolah, [
                    'class' => 'form-control' . ($errors->has('asal_sekolah') ? ' is-invalid' : ''),
                    'placeholder' => 'Asal Sekolah',
                ]) }}
                {!! $errors->first(
                    'asal_sekolah',
                    '<div class="invalid-feedback">
                            :message</p>',
                ) !!}
            </div>
        </div>
        <div class="form-row mb-2">
            {{ Form::label('Agama', 'Agama', ['class' => 'col-sm-3 col-form-label', 'style' => 'font-weight:bold;']) }}
            <div class="col-sm-9">
                {{ Form::select('agama', \App\Models\RegisterSiswa::listAgama(), $registerSiswa->agama, [
                    'id' => 'agama',
                    'class' => 'form-control' . ($errors->has('agama') ? 'is-invalid' : ''),
                    'placeholder' => '--- pilih ---',
                ]) }}
                {!! $errors->first(
                    'agama',
                    '<div class="invalid-feedback">
                :message</div>',
                ) !!}
            </div>
        </div>
        <div class="form-row mb-2">
            {{ Form::label('Nilai Bahasa Indonesia', 'Nilai Bahasa Indonesia', ['class' => 'col-sm-3 col-form-label', 'style' => 'font-weight:bold;']) }}
            <div class="col-sm-9">
                {{ Form::number('nilai_ind', $registerSiswa->nilai_ind, [
                    'class' => 'form-control' . ($errors->has('nilai_ind') ? ' is-invalid' : ''),
                    'placeholder' => 'Nilai Bahasa Indonesia',
                    'step' => '0.01',
                ]) }}
                {!! $errors->first(
                    'nilai_ind',
                    '<div class="invalid-feedback">
                            :message</p>',
                ) !!}
            </div>
        </div>
        <div class="form-row mb-2">
            {{ Form::label('Nilai IPA', 'Nilai IPA', ['class' => 'col-sm-3 col-form-label', 'style' => 'font-weight:bold;']) }}
            <div class="col-sm-9">
                {{ Form::number('nilai_ipa', $registerSiswa->nilai_ipa, [
                    'class' => 'form-control' . ($errors->has('nilai_ipa') ? ' is-invalid' : ''),
                    'placeholder' => 'Nilai IPA',
                    'step' => '0.01',
                ]) }}
                {!! $errors->first(
                    'nilai_ipa',
                    '<div class="invalid-feedback">
                            :message</p>',
                ) !!}
            </div>
        </div>
        <div class="form-row mb-2">
            {{ Form::label('Nilai Matematika', 'Nilai Matematika', ['class' => 'col-sm-3 col-form-label', 'style' => 'font-weight:bold;']) }}
            <div class="col-sm-9">
                {{ Form::number('nilai_mtk', $registerSiswa->nilai_mtk, [
                    'class' => 'form-control' . ($errors->has('nilai_mtk') ? ' is-invalid' : ''),
                    'placeholder' => 'Nilai Matematika',
                    'step' => '0.01',
                ]) }}
                {!! $errors->first(
                    'nilai_mtk',
                    '<div class="invalid-feedback">
                            :message</p>',
                ) !!}
            </div>
        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</div>
