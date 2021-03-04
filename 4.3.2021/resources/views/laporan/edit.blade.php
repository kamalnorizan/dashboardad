@extends('layouts.app')

@section('title',$laporan->tajuk)

@section('head')
<link href="{{ asset('res/css/plugins/select2/select2.min.css') }}" rel="stylesheet">
<style>
    .note-editor {
        height: auto !important;
        min-height: 100px;
    }
    .select2-container--default .select2-selection--single {
        background-color: #fff;
        border: 1px solid #e5e6e7;
        border-radius: 1px;
        padding: 6px 12px;
        height: 34px;
        font-size: 14px;
    }
    .select2-container--default .select2-selection--single .select2-selection__rendered {
        color: #444;
        line-height: 1.42857143;
    }
    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 34px;
        position: absolute;
        top: 1px;
        right: 1px;
        width: 20px;
    }
    .select2-container--open{
        border-radius: 1px;
        border: 1px solid #1ab394;
    }
</style>
@endsection

@section('custom_css')
<style type="text/css">
    .datepicker-dropdown {
        z-index: 9999 !important;
    }
</style>
@endsection

@section('content')
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h3>Borang Kemaskini Maklumat Laporan</h3>
                </div>
                <div class="ibox-content">
                    {!! Form::model($laporan, ['route' =>['laporan.update', $laporan->id], 'method' => 'PUT', 'enctype'=>'multipart/form-data']) !!}

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
                                {!! Form::select('organisasi_id',$org_Opts,null, ['id' => 'organisasi_id', 'class' => 'form-control', 'required' => 'required']) !!}
                                <small class="text-danger">{{ $errors->first('organisasi_id') }}</small>
                            </div>
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('tajuk') ? ' has-error' : '' }}">
                        {!! Form::label('tajuk', 'Tajuk Laporan') !!}
                        {!! Form::text('tajuk', null, ['class' => 'form-control', 'required' => 'required']) !!}
                        <small class="text-danger">{{ $errors->first('tajuk') }}</small>
                    </div>
                    <div class="row">
                        <div class="col-md-6" >
                          <div class="form-group{{ $errors->has('tarikh') ? ' has-error' : '' }}">
                            {!! Form::label('tarikh', 'Tarikh Laporan') !!}
                            <div class="input-group date datepicker">
                                <input type="text" class="form-control" id="tarikh" name="tarikh" value="{{ Carbon\Carbon::parse($laporan->tarikh)->format('Y-m-d') }}">
                                <span class="input-group-addon input-group-append border-left">
                                    <span class="mdi mdi-calendar input-group-text"></span>
                                </span>
                            </div>

                            <small class="text-danger">{{ $errors->first('tarikh') }}</small>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6" >
                            <div class="form-group{{ $errors->has('kategori_id') ? ' has-error' : '' }}">
                                {!! Form::label('kategori_id', 'Kategori') !!}
                                {!! Form::select('kategori_id',$kategori_opts, $selectedkategori->id, ['id' => 'kategori_id', 'class' => 'form-control', 'required' => 'required']) !!}
                                <small class="text-danger">{{ $errors->first('kategori_id') }}</small>
                            </div>
                        </div>
                        <div class="col-md-6 @if($selectedkategori->subkategoriad->count()==0) hidden @endif" id="subkategori_col">
                            <div class="form-group{{ $errors->has('subkategori') ? ' has-error' : '' }}">
                                {!! Form::label('subkategori', 'Sub Kategori') !!}
                                {!! Form::select('subkategori',$subkategori_opts, $selectedsubkategori->id, ['id' => 'subkategori', 'class' => 'form-control']) !!}
                                <small class="text-danger">{{ $errors->first('subkategori') }}</small>
                            </div>
                        </div>
                    </div>
                    <div id="jawatankuasaDiv">
                        <div class="row" >
                            <div class="col-md-12">
                                <div class="form-group{{ $errors->has('jawatankuasa[]') ? ' has-error' : '' }}">
                                    {!! Form::label('jawatankuasa[]', 'Ahli Jawatankuasa') !!} <button type="button" id="tambahAhli" class="btn btn-xs btn-primary"><i class="fa fa-plus"></i> Tambah</button>
                                    {{-- {!! Form::select('jawatankuasa[]', $jawatankuasa_opts, Auth::user()->id, ['id' => 'jawatankuasa[]', 'class' => 'form-control', 'required' => 'required']) !!}
                                    <small class="text-danger">{{ $errors->first('jawatankuasa[]') }}</small> --}}
                                </div>
                            </div>
                        </div>
                        {!! Form::hidden('jawatankuasa[]', $laporan->auditor, ['id'=>'jawatankuasa[]']) !!}
                        {!! Form::hidden('jawatankuasa[]', $laporan->kcad, ['id'=>'jawatankuasa[]']) !!}
                        @foreach ($laporan->jawatankuasa as $jawatankuasaselected)
                        {{-- {{$jawatankuasaselected->id}} --}}
                        <div class="row" >
                            <div class="col-md-10">
                                <div class="form-group{{ $errors->has('jawatankuasa[]') ? ' has-error' : '' }}">
                                    {{-- {!! Form::select('jawatankuasa[]', $jawatankuasa_opts, $jawatankuasaselected->user_id, ['id' => 'jawatankuasa[]', 'class' => 'form-control', 'required' => 'required']) !!} --}}
                                    <select @if($laporan->status =='jawatankuasa' || $jawatankuasaselected->user_id == $laporan->kcad || $jawatankuasaselected->user_id == $laporan->auditor) disabled  @endif name="jawatankuasa[]" id="" class="form-control " required>
                                        @foreach ($jawatankuasa_opts as $key=>$item)
                                            <option @if($key==$jawatankuasaselected->user_id) selected @endif value="{{$key}}">{{$item}}</option>
                                        @endforeach
                                    </select>
                                    <small class="text-danger">{{ $errors->first('jawatankuasa[]') }}</small>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <button type="button" @if($laporan->status =='jawatankuasa' || $jawatankuasaselected->user_id == $laporan->kcad || $jawatankuasaselected->user_id == $laporan->auditor ) @endif class='btn btn-danger btn-block removeBtn'> <i class="fa fa-times"></i> Padam</button>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('attachment') ? ' has-error' : '' }}">
                                {!! Form::label('attachment', 'Laporan Asal') !!}
                                {!! Form::file('attachment',null,$laporan->attachment->url,['required' => 'required'] ) !!}
                                <p class="help-bootock"><i>Sila muat naik pdf laporan asal</i></p>
                                <small class="text-danger">{{ $errors->first('attachment') }}</small>
                            </div>
                        </div>
                    </div>

                        <div class="well">
                            <a href="{{ route('attachment.getfile',['attachment'=>$laporan->attachment->id]) }}">{{$laporan->attachment->title}}</a>
                        </div>

                    <div class="btn-group pull-right">
                        {!! Form::submit("Kemaskini", ['class' => 'btn btn-success']) !!}
                    </div>
                    <br>
                        <br>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function () {
        $('#kategori_id').change(function (e) {
            e.preventDefault();
            $('#subkategori').find('option').remove();
            $.ajax({
                type: "get",
                url: "/laporan/getSubkategori/"+$(this).val(),
                success: function (response) {
                    if(response.length){
                        $.each(response, function (i, item) {
                            $('#subkategori').append('<option value="'+item['id']+'">'+item['name']+'</option>');
                        });
                        $('#subkategori_col').removeClass('hidden');
                    }else{
                        $('#subkategori_col').addClass('hidden');
                        $('#subkategori_col').find('option').remove();
                    }
                },
                error: function(error){
                    $('#subkategori_col').addClass('hidden');
                    $('#subkategori_col').find('option').remove();
                }
            });
        });
    });
    $('#tambahAhli').click(function (e) {
        var options='<option>Sila Pilih Ahli</option>';
        $.ajax({
            type: "get",
            url: "/laporan/getJawatankuasa",
            success: function (response) {
                $.each(response, function (i, item) {
                    options +='<option value="'+item['id']+'">'+item['name']+'</option>';
                });
                // console.log(response);
                $('#jawatankuasaDiv').append(
                '<div class="row"><div class="col-md-10"><select id="jawatankuasa[]" class="form-control select2 org_id" required="required" name="jawatankuasa[]">'+options+'</select></div><div class="col-md-2"><button type="button" class="btn btn-large btn-block btn-danger" onclick="$(this).parent().parent().remove();"><i class="fa fa-times"></i> Padam</button></div></div>'
                );
            }
        });
    });
    $('.removeBtn').click(function (e) {
            e.preventDefault();
            $(this).parent().parent().remove();
        });
</script>
@endsection
