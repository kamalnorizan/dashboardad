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

{{-- <a href="#" class="btn btn-success btn-sm">Hantar</a> --}}
{!! Form::open(['method' => 'POST', 'route' => 'maklumbalas.auditihantarjawatankuasa']) !!}
    {!! Form::hidden('laporan_id', $laporan->id, ['id'=>'laporan_id']) !!}
    <button type="submit" class="btn btn-success btn-sm" @if($laporan->auditipenemuan->whereIn('status_jawatankuasa',['0','2'])->count()>0) disabled @endif>Hantar Jawatankuasa</button>
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
                            <th class="text-center">Bil</th>
                            {{-- <th>Perenggan</th> --}}
                            <th width="50%">Penemuan Audit</th>
                            <th  class="text-center">Status</th>
                            <th  class="text-center">Status Tindakan</th>
                            <th  class="text-center">Tindakan</th>
                        </tr>
                        @foreach ($laporan->auditipenemuan as $key=>$auditipenemuan)
                        <tr>
                            <td align="center">
                                {{ $key+1 }}
                            </td>
                            {{-- <td>
                                {{$auditipenemuan->penemuan->perenggan}}
                            </td> --}}
                            <td>
                                @php
                                $string = $auditipenemuan->penemuan->penemuan;
                                $stringlength = 100;
                                if (strlen($auditipenemuan->penemuan->penemuan) > $stringlength)
                                {
                                    $string = wordwrap($auditipenemuan->penemuan->penemuan, 100);
                                    $i = strpos($string, "\n");
                                    if ($i) {
                                        $string = substr($string, 0, $i);
                                    }
                                }
                                @endphp
                                {!! $string !!}...
                            </td>
                            <td align="center">
                                {{$auditipenemuan->progress->name}}
                            </td>
                            <td align="center">
                                @if ($auditipenemuan->status_jawatankuasa == 0 || $auditipenemuan->status_jawatankuasa == 2)
                                    <i class="fa fa-exclamation-circle fa-2x text-warning"></i>
                                @else
                                    <i class="fa fa-check-circle fa-2x text-success"></i>

                                @endif
                            </td>
                            <td align="center">
                                 <a class="btn btn-primary btn-sm" data-toggle="modal" href='{{route('maklumbalas.edit',['auditipenemuan'=>$auditipenemuan->id])}}'<i class="fa fa-plus"></i> Semakan</a>

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
