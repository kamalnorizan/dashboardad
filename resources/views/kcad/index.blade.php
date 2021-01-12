@extends('layouts.app')

@section('title','Ketua Cawangan Audit')

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
                    <h3>Senarai Laporan Audit </h3>
                </div>
                <div class="ibox-content">
                    <table class="table">
                        <tr>
                            <td>Bil</td>
                            <td>Tajuk Laporan</td>
                            <td>Tarikh Laporan</td>
                            <td>Kategori Laporan</td>
                            {{-- <td>Status</td> --}}
                            <td>Tindakan</td>
                        </tr>
                        @foreach ($kcad as $key=>$laporan)
                        <tr>
                            <td>
                                {{(($kcad->currentPage()-1)*20)+$key+1}}
                            </td>
                            <td>
                                {{$laporan->tajuk}}
                            </td>
                            <td>
                                {{\Carbon\Carbon::parse($laporan->tarikh)->format('d-m-Y')}}
                            </td>
                            <td>
                                {{$laporan->kategoriaudit->name}}
                                {{-- @foreach ($laporan->audities as $auditi)
                                    - {{$auditi->auditiuser->name}} <br>
                                @endforeach --}}
                            </td>
                            {{-- <td>
                                {{$laporan->progress->name}}
                            </td> --}}

                            <td>
                                 <a href="{{route('kcad.create',['laporan'=>$laporan->id])}}" class="btn btn-sm btn-info"><i class="fa fa-pencil" aria-hidden="true"></i> Penemuan</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    {{$kcad->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
@endsection

