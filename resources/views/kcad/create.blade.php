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
{!! Form::open(['method' => 'POST', 'route' => 'kcad.kcadhantarstatus']) !!}

    {!! Form::hidden('laporan_id', $kcad->first()->laporan_id, ['id'=>'laporan_id']) !!}

        <button type="submit" @if ($kcad->where('progress_id',1)->count()+$kcad->where('progress_id',8)->count()>0 && $kcad->where('progress_id',1)->count()) disabled @endif class="btn btn-primary">Hantar</button>

{!! Form::close() !!}
{{-- <a href="#" @if ($kcad->where('progress_id',1)->count()+$kcad->where('progress_id',8)->count()>0 && $kcad->where('progress_id',1)->count()) disabled @endif class="btn btn-primary">Hantar</a> --}}
{{-- {{$kcad->where('progress_id',1)->count()+$kcad->where('progress_id',8)->count()}} --}}
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
                            <td>
                                @foreach ($laporan->audities as $auditi)
                                    - {{$auditi->auditiuser->name}} <br>
                                @endforeach
                            </td>
                            <td>
                                {{$laporan->progress->name}}
                            </td>

                            <td>
                                 <a class="btn btn-primary btn-sm" @if($laporan->progress->name=='Gugur') disabled @else href='{{route('kcad.show',['penemuan'=>$laporan->id])}}' @endif  ><i class="fa fa-plus"></i> Semakan</a>
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


