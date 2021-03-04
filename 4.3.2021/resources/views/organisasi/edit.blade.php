@extends('layouts.app')

@section('title','Organisasi')

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
                    <h3>Borang Kemaskini Maklumat Organisasi</h3>
                </div>
                <div class="ibox-content">
                    {!! Form::model($organisasi, ['route' => ['organisasi.update', $organisasi->id], 'method' => 'PUT']) !!}

                        @include('organisasi._form')

                        <div class="btn-group pull-right">
                            {!! Form::submit("Kemaskini", ['class' => 'btn btn-success']) !!}
                        </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
@endsection

