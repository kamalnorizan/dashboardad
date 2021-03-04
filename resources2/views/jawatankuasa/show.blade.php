@extends('layouts.app')

@section('title','Semakan Penemuan')

@section('head')
<link href="{{ asset('res/css/plugins/summernote/summernote.min.css') }}" rel="stylesheet">
<style>
    .note-editor {
        height: auto !important;
        min-height: 100px;
    }

    .blink {
        -webkit-animation: blink 1s step-end infinite;
        animation: blink 1s step-end infinite;
    }
    @-webkit-keyframes blink { 50% { visibility: hidden; }}
    @keyframes blink { 50% { visibility: hidden; }}
</style>
@endsection

@section('action')

@endsection

@section('content')
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h3>{{$auditipenemuan->laporan->tajuk}}</h3>
                </div>
                <div class="ibox-content">
                    {!! Form::open(['method' => 'POST', 'route' => 'jawatankuasa.store']) !!}
                    <div class="modal-body">
                        {!! Form::hidden('penemuan_id', $auditipenemuan->penemuan->id, ['id'=>'penemuan_id']) !!}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group{{ $errors->has('perenggan') ? ' has-error' : '' }}">
                                    {!! Form::label('perenggan', 'Perenggan Penemuan') !!}
                                    {!! Form::text('perenggan', $auditipenemuan->penemuan->perenggan, ['class' => 'form-control', 'required' => 'required','disabled']) !!}
                                    <small class="text-danger">{{ $errors->first('perenggan') }}</small>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group{{ $errors->has('penemuan') ? ' has-error' : '' }}">
                                    {!! Form::label('penemuan', 'Penemuan') !!}
                                    <small class="text-danger">{{ $errors->first('penemuan') }}</small>
                                    {!! Form::textarea('penemuan', $auditipenemuan->penemuan->penemuan ?? '', ['class' => 'form-control summernote', 'required' => 'required', 'rows'=>'4','id'=>'penemuan']) !!}
                                </div>
                            </div>

                            <div class="col-md-12">
                                <hr>
                                <h2>Maklumbalas Auditi</h2>
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
                            @if ($auditipenemuan->progress_id != '10')


                            {!! Form::hidden('maklumbalas_id', $maklumbalas->id, ['id'=>'maklumbalas_id']) !!}
                            <div class="col-md-12">
                                <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                                    {!! Form::label('status', 'Status') !!}
                                    {!! Form::select('status', $statusOpt, $auditipenemuan->progress_id, ['id' => 'status', 'class' => 'form-control', 'required' => 'required']) !!}
                                    <small class="text-danger">{{ $errors->first('status') }}</small>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group{{ $errors->has('ulasan') ? ' has-error' : '' }}">
                                    {!! Form::label('ulasan', 'Ulasan') !!}
                                    {!! Form::textarea('ulasan', $ulasan->ulasan, ['class' => 'form-control', 'required' => 'required']) !!}
                                    <small class="text-danger">{{ $errors->first('ulasan') }}</small>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary pull-right">Simpan</button>
                            </div>
                            @endif
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
<script src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('res/js/plugins/summernote/summernote.js') }}"></script>
<script>
    $('.summernote').summernote({
            height: 200,                 // set editor height
            minHeight: null,             // set minimum height of editor
            maxHeight: 300
        });
    $('#penemuan').summernote('disable');

</script>
@endsection

