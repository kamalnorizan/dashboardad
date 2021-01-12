@extends('layouts.app')

@section('title','Maklumbalas Auditi')

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
                            <td>Status</td>
                            <td>Tindakan</td>
                        </tr>
                        @foreach ($laporan as $key=>$laporan_item)
                        <tr>
                            <td>
                                {{(($laporan->currentPage()-1)*20)+$key+1}}
                            </td>
                            <td>
                                {{$laporan_item->tajuk}}
                            </td>
                            <td>
                                {{$laporan_item->tarikh}}
                            </td>
                            <td>
                                {{$laporan_item->kategoriaudit->name}}
                            </td>
                            <td>
                                {{-- {{$laporan_item->progress->name}} --}}
                            </td>

                            <td>
                                 <a href="{{route('maklumbalas.create',['laporan'=>$laporan_item->id])}}" class="btn btn-sm btn-info"><i class="fa fa-pencil" aria-hidden="true"></i> Penemuan</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    {{$laporan->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
@endsection

