@extends('layouts.app')

@section('title','Jawatan')

@section('head')
@endsection

@section('action')
@endsection

@section('content')
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h3>Borang Kemaskini Maklumat Jawatan</h3>
                </div>
                <div class="ibox-content">
                    {!! Form::model($jawatan, ['route' =>['jawatan.update', $jawatan->id], 'method' => 'PUT']) !!}

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                {!! Form::label('name', 'Nama Jawatan') !!}
                                {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                                <small class="text-danger">{{ $errors->first('name') }}</small>
                            </div>
                        </div>
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
@endsection

