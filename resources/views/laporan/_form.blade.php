<div class="row">
    <div class="col-md-6">
        <div class="form-group{{ $errors->has('tahun') ? ' has-error' : '' }}">
            {!! Form::label('tahun', 'Tahun') !!}
            {!! Form::text('tahun', null, ['class' => 'form-control', 'required' => 'required']) !!}
            <small class="text-danger">{{ $errors->first('tahun') }}</small>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group{{ $errors->has('organisasi_id') ? ' has-error' : '' }}">
            {!! Form::label('organisasi_id', 'Auditi') !!}
            {!! Form::select('organisasi_id',$org_Opts,0, ['id' => 'organisasi_id', 'class' => 'form-control', 'required' => 'required']) !!}
            <small class="text-danger">{{ $errors->first('organisasi_id') }}</small>
        </div>
    </div>
</div>

<div class="form-group{{ $errors->has('tajuk_laporan') ? ' has-error' : '' }}">
    {!! Form::label('tajuk_laporan', 'Tajuk Laporan') !!}
    {!! Form::text('tajuk_laporan', null, ['class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('tajuk_laporan') }}</small>
</div>
<div class="row">
    <div class="col-md-6" >
      <div class="form-group{{ $errors->has('tarikh_laporan') ? ' has-error' : '' }}">
        {!! Form::label('tarikh_laporan', 'Tarikh Laporan') !!}
         {!! Form::date('tarikh_laporan', null, ['class' => 'form-control', 'required' => 'required']) !!}
         <small class="text-danger">{{ $errors->first('tarikh_laporan') }}</small>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6" >
        <div class="form-group{{ $errors->has('kategori') ? ' has-error' : '' }}">
            {!! Form::label('kategori', 'Kategori') !!}
            {!! Form::select('kategori',$kategori_opts,0, ['id' => 'kategori', 'class' => 'form-control', 'required' => 'required']) !!}
            <small class="text-danger">{{ $errors->first('kategori') }}</small>
        </div>
    </div>
    <div class="col-md-6 hidden" id="subkategori_col">
        <div class="form-group{{ $errors->has('subkategori') ? ' has-error' : '' }}">
            {!! Form::label('subkategori', 'Sub Kategori') !!}
            {!! Form::select('subkategori',[], null, ['id' => 'subkategori', 'class' => 'form-control']) !!}
            <small class="text-danger">{{ $errors->first('subkategori') }}</small>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12" >
        <div class="form-group{{ $errors->has('jawatankuasa[]') ? ' has-error' : '' }}">
            {!! Form::label('jawatankuasa[]', 'Ahli Jawatankuasa') !!} <button type="button" id="tambahAhli" class="btn btn-xs btn-primary"><i class="fa fa-plus"></i> Tambah</button>
            {!! Form::select('jawatankuasa[]', $jawatankuasa_opts, null, ['id' => 'jawatankuasa[]', 'class' => 'form-control', 'required' => 'required']) !!}
            <small class="text-danger">{{ $errors->first('jawatankuasa[]') }}</small>
        </div>
    </div>
</div>
<div id="jawatankuasa">

</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group{{ $errors->has('tajuk_attachment') ? ' has-error' : '' }}">
            {!! Form::label('tajuk_attachment', 'Tajuk Laporan Attachment') !!}
            {!! Form::text('tajuk_attachment', null, ['class' => 'form-control', 'required' => 'required']) !!}
            <small class="text-danger">{{ $errors->first('tajuk_attachment') }}</small>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group{{ $errors->has('attachment') ? ' has-error' : '' }}">
            {!! Form::label('attachment', 'File') !!}
            {!! Form::file('attachment', ['required' => 'required']) !!}
            <p class="help-bootock"><i>Sila muat naik pdf laporan asal</i></p>
            <small class="text-danger">{{ $errors->first('attachment') }}</small>
        </div>
    </div>
</div>


