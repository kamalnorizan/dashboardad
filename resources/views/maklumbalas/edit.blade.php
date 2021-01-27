@extends('layouts.app')

@section('title','Maklumbalas')

@section('head')
<link href="{{ asset('res/css/plugins/summernote/summernote.min.css') }}" rel="stylesheet">
@endsection

@section('action')
@endsection

@section('content')
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h3>Penemuan</h3>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-md-1">

                            {{$penemuan->perenggan}}
                        </div>
                        <div class="col-md-11">
                            {!! $penemuan->penemuan !!}

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h3>Rekod Maklumbalas dan Ulasan</h3>
                </div>
                <div class="ibox-content">
                    <div id="vertical-timeline" class="vertical-container dark-timeline">
                        @foreach ($auditipenemuan->maklumbalas as $maklumbalas)
                        <div class="vertical-timeline-block">
                            <div class="vertical-timeline-icon navy-bg">
                                <i class="fa fa-briefcase"></i>
                            </div>
                            <div class="vertical-timeline-content">
                                <h2>Maklumbalas <div class="badge badge-primary">{{$maklumbalas->progres->name}}</div></h2>
                                {!!$maklumbalas->maklumbalas!!}
                                <hr>
                                @if ($maklumbalas->attachments->first())
                                <p>Dokumen sokongan seperti lampiran</p>
                                @endif
                                <ul>
                                    @foreach ($maklumbalas->attachments as $item)
                                    <li><a href="{{route('attachment.getfile',['attachment'=>$item->id])}}">{{$item->title}}</a></li>
                                    @endforeach
                                </ul>
                                <span class="vertical-date">
                                    <small>{{\Carbon\Carbon::parse($maklumbalas->created_at)->format('d-m-Y')}}</small>
                                </span>
                            </div>
                        </div>
                            @if ($maklumbalas->ulasan != '')
                                <div class="vertical-timeline-block">
                                    <div class="vertical-timeline-icon blue-bg">
                                        <i class="fa fa-check"></i>
                                    </div>
                                    <div class="vertical-timeline-content">
                                        <h2>Ulasan</h2>
                                        <p>{!!$maklumbalas->ulasan!!}</p>

                                        <span class="vertical-date">
                                            <small>{{\Carbon\Carbon::parse($maklumbalas->created_at)->format('d-m-Y')}}</small>
                                        </span>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if ($auditipenemuan->maklumbalas->first()->progress_id!='10')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h3>Maklumbalas</h3>
                </div>
                <div class="ibox-content">
                    {!! Form::open(['method' => 'POST', 'route' => 'maklumbalas.store', 'enctype'=>'multipart/form-data']) !!}
                    @if ($maklumbalasterkini)
                        {!! Form::hidden('maklumbalas_id', $maklumbalasterkini->id, ['id'=>'maklumbalas_id']) !!}
                    @endif
                    {!! Form::hidden('auditipenemuan_id', $auditipenemuan->id, ['id'=>'auditipenemuan_id']) !!}
                        <div class="form-group{{ $errors->has('maklumbalas') ? ' has-error' : '' }}">
                            {{-- {!! Form::label('maklumbalas', 'Maklumbalas') !!} --}}
                            {!! Form::textarea('maklumbalas', $maklumbalasterkini->maklumbalas ?? '', ['class' => 'form-control summernote', 'required' => 'required']) !!}
                            <small class="text-danger">{{ $errors->first('maklumbalas') }}</small>
                        </div>
                        <hr>
                        <h3>Lampiran</h3>
                        <table class="table">
                                <tr>
                                    <td width="80%">
                                        Dokumen
                                    </td>
                                    <td width="20%">
                                        Tindakan
                                    </td>
                                </tr>
                                @if (!empty($maklumbalasterkini->attachments))
                                    @foreach ($maklumbalasterkini->attachments as $attachment)
                                    <tr>
                                        <td>
                                            <a class="btn btn-link" href="{{route('attachment.getfile',['attachment'=>$attachment->id])}}" target="blank">{{$attachment->title}}
                                        </td>
                                        <td>
                                            <a class="btn btn-block btn-danger" href="{{ asset($attachment->url) }}" target="blank">Padam
                                        </td>
                                    </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="2" align="center">
                                            <span style="font-size: 16px; color:grey">Tiada Lampiran</span>
                                        </td>
                                    </tr>
                                @endif
                            </table>
                            </a> <br>
                        <div class="form-group{{ $errors->has('filesokongan[]') ? ' has-error' : '' }}">
                            {!! Form::label('filesokongan[]', 'Tambah Fail') !!} <button type="button" id="btn_tambahFail" class="btn btn-xs btn-success"><i class="fa fa-plus"></i> Tambah</button>
                            {!! Form::file('filesokongan[]') !!}
                            <p class="help-bootock">*.pdf, *.xlsx, *.docx</p>
                            <small class="text-danger">{{ $errors->first('filesokongan[]') }}</small>
                        </div>
                        <div id="senaraifail">

                        </div>

                        <div class="btn-group pull-right">
                            {!! Form::submit("Simpan", ['class' => 'btn btn-success']) !!}
                        </div>

                    {!! Form::close() !!}
                    <br><br>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection

@section('script')
<script src="{{ asset('res/js/plugins/summernote/summernote.js') }}"></script>
<script src="{{ asset('res/js/plugins/select2/select2.full.min.js') }}"></script>
<script>
    $('.summernote').summernote({
            height: 200,                 // set editor height
            minHeight: null,             // set minimum height of editor
            maxHeight: 300,             // set maximum height of editor
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['insert', [ 'picture']],
            ]
        });

        $('#btn_tambahFail').click(function (e) {
            $('#senaraifail').append('<div class="form-group"><label for="filesokongan[]">Tambah Fail</label> <button type="button" id="btn_padamFail" onClick="$(this).parent().remove()" class="btn btn-xs btn-danger"><i class="fa fa-minus"></i> Padam</button><input name="filesokongan[]" type="file" id="filesokongan[]"><p class="help-bootock">*.pdf, *.xlsx, *.docx</p><small class="text-danger"></small></div>');

        });
</script>
@endsection
