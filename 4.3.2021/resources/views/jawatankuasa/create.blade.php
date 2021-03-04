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

<button type="button" @if ($auditipenemuan->whereIn('progress_id',['1','5','10'])->count()>0 && $auditipenemuan->whereIn('progress_id',['10','5'])->count()==$auditipenemuan->count()) disabled @else onClick="$('#form_jawatankuasa').submit();" @endif class="btn btn-primary">Hantar Auditi</button>

{!! Form::open(['method' => 'POST', 'route' => 'kcad.kcadhantarstatus', 'id'=>'form_kcadhantarstatus']) !!}
    {!! Form::hidden('laporan_id', $auditipenemuan->first()->laporan_id, ['id'=>'laporan_id']) !!}
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
                            <td>Bil</td>
                            <td>Perenggan</td>
                            <td withd="50%">Penemuan</td>
                            <td>Auditi</td>
                            <td>Organisasi</td>
                            <td>Status</td>
                            <td>Status Ulasan</td>
                            <td>Tindakan</td>
                        </tr>
                        @foreach ($auditipenemuan as $key=>$auditip)
                        <tr>
                            <td>
                                {{-- {{(($auditipenemuan->currentPage()-1)*20)+$key+1}} --}}
                                {{$key+1}}
                            </td>
                            <td>
                                {{$auditip->penemuan->perenggan}}
                            </td>
                            <td>
                                @php
                                    $string=$auditip->penemuan->penemuan;
                                    $stringlength = 100;
                                    if (strlen($auditip->penemuan->penemuan) > $stringlength)
                                    {
                                        $string = wordwrap($auditip->penemuan->penemuan, 100);
                                        $i = strpos($string, "\n");
                                        if ($i) {
                                            $string = substr($string, 0, $i);
                                        }
                                    }
                                @endphp
                                {!! $string !!}
                            </td>
                            <td>
                                {{$auditip->auditiuser->name}}
                            </td>
                            <td>
                                {{$auditip->auditiuser->organisasi->nickname}}
                            </td>
                            <td>

                                @if($auditip->progress_id == 7)
                                <img src="{{ asset("assets/img/red.jpeg") }}" alt=""/>
                                @elseif ($auditip->progress_id == 9)
                                <img src="{{ asset("assets/img/yellow.jpeg") }}" alt=""/>
                                @elseif ($auditip->progress_id == 10)
                                <img src="{{ asset("assets/img/green.jpeg") }}" alt=""/>
                                @else
                                {{$auditip->progress->name}}
                                @endif
                            </td>
                            <td>
                                @if ($auditip->maklumbalas->where('ulasan','')->count()>0)
                                    <i class="fa fa-info-circle text-warning fa-2x"></i>

                                @else
                                <i class="fa fa-check text-success fa-2x"></i>
                                @endif
                            </td>

                            <td>
                                 {{-- <a href="{{route('jawatankuasa.edit',['laporan'=>$laporan->id])}}" class="btn btn-sm btn-info"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a> --}}

                                 <a class="btn btn-primary btn-sm" href="{{route('jawatankuasa.show',['auditipenemuan'=>$auditip->id])}}"></i> Semakan</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    {{-- {{$auditipenemuan->links()}} --}}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
@endsection

