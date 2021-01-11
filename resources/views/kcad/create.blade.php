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
                            <th>Bil</th>
                            <th>Perenggan</th>
                            <th>Penemuan Audit</th>
                            <th>Auditi</th>
                            <td>Status</td>
                            <td>Tindakan</td>
                        </tr>
                        @foreach ($kcad as $key=>$laporan)
                        <tr>
                            <td>
                                {{(($kcad->currentPage()-1)*20)+$key+1}}
                            </td>
                            <td>
                                {{$laporan->perenggan}}
                            </td>
                            <td>
                                {!!$laporan->penemuan!!}
                            </td>
                            {{-- <td> auditi yang bertanggungjawab --}}
                                {{-- {{$laporan->kategoriaudit->name}} --}}
                            </td>
                            <td>
                                {{-- {{$penemuan->progress->name}} --}}
                            </td>

                            <td>
                                 <a class="btn btn-primary btn-sm" data-penemuan="{{$laporan}}" data-toggle="modal" href='#tambahpenemuan-modal'<i class="fa fa-plus"></i> Semakan</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    {{-- {{$kcad->links()}} --}}
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
                <h4 class="modal-title">Semakan Ketua Audit </h4>
            </div>
            {{-- {!! Form::open(['method' => 'POST', 'route' => 'laporan.store']) !!} --}}
            {!! Form::model($kcad, ['route' => ['kcad.store', $laporan->id], 'method' => 'POST']) !!}
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
                    {!! Form::textarea('penemuan', $penemuan->penemuan ??'', ['class' => 'form-control', 'required' => 'required', 'id'=>'penemuan']) !!}
                    <small class="text-danger">{{ $errors->first('penemuan') }}</small>
                </div>
                {{-- ini untuk selection lulus @ pindaan, if pindaan akan kluar text untuk ulasan --}}
                <div class="row">
                    <div class="dropdown col-md-6">
                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Status
                        <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                          <li><a href="#">Lulus</a></li>
                          <li><a href="#">Pindaan</a></li>
                        </ul>

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
<script>
    $('#tambahpenemuan-modal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var penemuan = button.data('penemuan');
        console.log(penemuan);
        $('#laporan_id').val(penemuan['id']);
        $('#perenggan').val(penemuan['perenggan']);
        $('#penemuan').text(penemuan['penemuan']);
    });
</script>

@endsection


