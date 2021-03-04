@extends('layouts.app')

@section('title','Status Laporan Audit')

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
                            <th>Tarikh Terkini Dikemaskini</th>
                            <th>Kategori Laporan</th>
                            <th>Status</th>
                            <th>Tindakan</th>

                        </tr>
                        @foreach ($statistik as $key=>$laporan)
                        <tr>
                            <td>
                                {{(($statistik->currentPage()-1)*10)+$key+1}}
                            </td>
                            <td>
                                {{$laporan->tajuk}}
                            </td>
                            <td>
                                {{\Carbon\Carbon::parse($laporan->updated_at)->format('d-m-Y')}}
                            </td>
                            <td>
                                {{$laporan->kategoriaudit->name}}
                            </td>
                            <td>
                                {{$laporan->status}}

                            </td>
                            <td>
                                 <a href="{{route('statistik.create',['laporan'=>$laporan->id])}}" class="btn btn-sm btn-info"><i class="fa fa-eye" aria-hidden="true"></i> Lihat Penemuan</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    {{$statistik->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
@endsection

