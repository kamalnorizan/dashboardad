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
                            <th>Bil</th>
                            <th>Tajuk Laporan</th>
                            <th>Tarikh Laporan</th>
                            <th>Kategori Laporan</th>
                            {{-- <td>Status</td> --}}
                            <th>Tindakan</th>
                        </tr>
                        @foreach ($kcad as $key=>$laporan)
                        <tr>
                            <td>
                                {{(($kcad->currentPage()-1)*10)+$key+1}}
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

                                 <a class="btn btn-danger btn-sm" href="{{route('laporan.show',['laporan'=>$laporan->id])}}"><i class="fa fa-eye" aria-hidden="true"></i>
                                Laporan </a>
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

