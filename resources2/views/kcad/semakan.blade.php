@extends('layouts.app')

@section('title','Semakan Penemuan')

@section('head')
<link href="{{ asset('res/css/plugins/summernote/summernote.min.css') }}" rel="stylesheet">
<style>
    .note-editor {
        height: auto !important;
        min-height: 100px;
    }
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
                    <h3>{{$penemuan->laporan->tajuk}}</h3>
                </div>
                <div class="ibox-content">
                    {!! Form::open(['method' => 'POST', 'route' => 'kcad.semakanupdate']) !!}
                    <div class="modal-body">
                        {!! Form::hidden('penemuan_id', $penemuan->id, ['id'=>'penemuan_id']) !!}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group{{ $errors->has('perenggan') ? ' has-error' : '' }}">
                                    {!! Form::label('perenggan', 'Perenggan Penemuan') !!}
                                    {!! Form::text('perenggan', $penemuan->perenggan, ['class' => 'form-control', 'required' => 'required','disabled']) !!}
                                    <small class="text-danger">{{ $errors->first('perenggan') }}</small>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group{{ $errors->has('penemuan') ? ' has-error' : '' }}">
                                    {!! Form::label('penemuan', 'Penemuan') !!}
                                    <small class="text-danger">{{ $errors->first('penemuan') }}</small>
                                    {!! Form::textarea('penemuan', $penemuan->penemuan ?? '', ['class' => 'form-control summernote', 'required' => 'required', 'rows'=>'4','id'=>'penemuan']) !!}
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                                    {!! Form::label('status', 'Status') !!}
                                    {!! Form::select('status', $statusOpt, null, ['id' => 'status', 'class' => 'form-control', 'required' => 'required']) !!}
                                    <small class="text-danger">{{ $errors->first('status') }}</small>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group{{ $errors->has('ulasan') ? ' has-error' : '' }}">
                                    {!! Form::label('ulasan', 'Ulasan') !!}
                                    {!! Form::textarea('ulasan', null, ['class' => 'form-control', 'required' => 'required']) !!}
                                    <small class="text-danger">{{ $errors->first('ulasan') }}</small>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary pull-right">Simpan</button>
                            </div>
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

