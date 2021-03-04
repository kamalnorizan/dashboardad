@extends('layouts.app')

@section('title','Kategori')

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
                    <h3>Borang Kemaskini Maklumat Kategori</h3>
                </div>
                <div class="ibox-content">
                    {!! Form::open(['method' => 'POST', 'route' => 'kategori.update']) !!}
                        <div class="form-group{{ $errors->has('subkategori') ? ' has-error' : '' }}">
                            {!! Form::label('subkategori', 'Parent Kategori') !!}
                            {!! Form::select('subkategori',$parentCatOpts,$kategori->subkategori, ['id' => 'subkategori', 'class' => 'form-control', 'required' => 'required']) !!}
                            <small class="text-danger">{{ $errors->first('subkategori') }}</small>
                        </div>
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            {!! Form::label('name', 'Nama Kategori') !!}
                            {!! Form::text('name', $kategori->name, ['class' => 'form-control', 'required' => 'required']) !!}
                            <small class="text-danger">{{ $errors->first('name') }}</small>
                        </div>
                        {!! Form::hidden('kategori_id', $kategori->id, ['id'=>'kategori_id']) !!}

                        <div class="btn-group pull-right">
                            {!! Form::submit("Kemaskini", ['class' => 'btn btn-success']) !!}
                        </div>
                        <br><br>
                    {!! Form::close() !!}
                </div>
            </div>
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h3>Senarai Sub Kategori</h3>
                </div>
                <div class="ibox-content">
                    <table class="table">
                        <tr class="tr">
                            <td>
                                No.
                            </td>
                            <td>
                                Nama
                            </td>
                            <td>
                                Tindakan
                            </td>
                        </tr>
                        @foreach ($kategori->subkategoriad as $key=>$subkategori)
                        <tr class="tr">
                            <td>
                                {{$key +1}}
                            </td>
                            <td>
                                {{$subkategori->name}}
                            </td>
                            <td>

                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

@section('script')
@endsection

