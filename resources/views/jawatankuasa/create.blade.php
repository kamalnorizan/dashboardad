@extends('layouts.app')

@section('title',$laporan->tajuk)

@section('head')

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
                    <h3>Senarai Penemuan </h3>
                </div>
                <div class="ibox-content">
                    <table class="table">
                        <tr>
                            <td>Bil</td>
                            <td>Tajuk Laporan</td>
                            <td>Tarikh Laporan</td>
                            <td>Kategori Laporan</td>
                            <td>Status</td>
                            <td>Tindakan</td>
                        </tr>
                        @foreach ($jawatankuasa as $key=>$laporan)
                        <tr>
                            <td>
                                {{(($jawatankuasa->currentPage()-1)*20)+$key+1}}
                            </td>
                            <td>
                                {{$laporan->tajuk}}
                            </td>
                            <td>
                                {{$laporan->tarikh}}
                            </td>
                            <td>
                                {{$laporan->kategoriaudit->name}}
                            </td>
                            <td>
                                {{-- {{$laporan->progress->name}} --}}
                            </td>

                            <td>
                                 {{-- <a href="{{route('jawatankuasa.edit',['laporan'=>$laporan->id])}}" class="btn btn-sm btn-info"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a> --}}

                                 <a class="btn btn-primary btn-sm" data-toggle="modal" href='#tambahpenemuan-modal'<i class="fa fa-plus"></i> Semakan</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    {{$jawatankuasa->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="tambahpenemuan-modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Semakan Jawatankuasa </h4>
            </div>
            {{-- {!! Form::open(['method' => 'POST', 'route' => 'laporan.store']) !!} --}}
            {!! Form::model($jawatankuasa, ['route' => ['jawatankuasa.store', $laporan->id], 'method' => 'POST']) !!}
            <div class="modal-body">
                {!! Form::hidden('laporan_id', $laporan->id, ['id'=>'laporan_id']) !!}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('perenggan') ? ' has-error' : '' }}">
                            {!! Form::label('perenggan', 'Perenggan Penemuan') !!}
                            {!! Form::text('perenggan', null, ['class' => 'form-control', 'required' => 'required']) !!}
                            <small class="text-danger">{{ $errors->first('perenggan') }}</small>
                        </div>
                    </div>
                </div>

                <div class="form-group{{ $errors->has('penemuan') ? ' has-error' : '' }}">
                    {!! Form::textarea('penemuan', $penemuan->penemuan ??'', ['class' => 'form-control', 'required' => 'required']) !!}
                    <small class="text-danger">{{ $errors->first('penemuan') }}</small>
                </div>

                <div class="row">
                    <div class="dropdown col-md-6">
                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Status
                        <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                          <li><a href="#">Tiada Tindakan</a></li>
                          <li><a href="#">Dalam Tindakan</a></li>
                          <li><a href="#">Selesai</a></li>
                        </ul>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('perenggan') ? ' has-error' : '' }}">
                            {!! Form::label('perenggan', 'Ulasan Jawatankuasa Audit') !!}
                            {!! Form::text('perenggan', null, ['class' => 'form-control', 'required' => 'required']) !!}
                            <small class="text-danger">{{ $errors->first('perenggan') }}</small>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>


@endsection

@section('script')
@endsection


