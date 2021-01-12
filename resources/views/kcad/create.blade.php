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
<button type="button" @if ($kcad->whereIn('progress_id',['1','5', '8'])->count()>0) disabled @else onClick="$('#form_kcadhantarstatus').submit();" @endif class="btn btn-primary">Hantar</button>

<button type="button" @if ($kcad->whereIn('progress_id',['0','1','2','4','6','7','8'])->count()>0) disabled @else onClick="$('#form_kcadhantarjawatankuasa').submit();" @endif class="btn btn-warning">Hantar Jawatankuasa</button>

{!! Form::open(['method' => 'POST', 'route' => 'kcad.kcadhantarstatus', 'id'=>'form_kcadhantarstatus']) !!}
    {!! Form::hidden('laporan_id', $kcad->first()->laporan_id, ['id'=>'laporan_id']) !!}
{!! Form::close() !!}

{!! Form::open(['method' => 'POST', 'route' => 'kcad.kcadhantarjawatankuasa', 'id'=>'form_kcadhantarjawatankuasa']) !!}
    {!! Form::hidden('laporan_id', $kcad->first()->laporan_id, ['id'=>'laporan_id']) !!}
{!! Form::close() !!}

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
                            <th width="50%">Penemuan Audit</th>
                            <th>Auditi</th>
                            <td>Status</td>
                            <td>Tindakan</td>
                        </tr>
                        @foreach ($kcad as $key=>$penemuan)
                        <tr>
                            <td>
                                {{(($kcad->currentPage()-1)*20)+$key+1}}
                            </td>
                            <td>
                                {{$penemuan->perenggan}}
                            </td>
                            <td>
                                @php
                                    $string=$penemuan->penemuan;
                                    $stringlength = 100;
                                    if (strlen($penemuan->penemuan) > $stringlength)
                                    {
                                        $string = wordwrap($penemuan->penemuan, 100);
                                        $i = strpos($string, "\n");
                                        if ($i) {
                                            $string = substr($string, 0, $i);
                                        }
                                    }
                                @endphp
                                {!! $string !!}
                            </td>
                            <td>
                                @foreach ($penemuan->audities as $auditi)
                                    - {{$auditi->auditiuser->name}} <br>
                                @endforeach
                            </td>
                            <td>
                                {{$penemuan->progress->name}}
                            </td>

                            <td>
                                 <a class="btn btn-primary btn-sm" @if($penemuan->progress->name=='Gugur') disabled @else href='{{route('kcad.show',['penemuan'=>$penemuan->id])}}' @endif  ><i class="fa fa-plus"></i> Semakan</a>
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


