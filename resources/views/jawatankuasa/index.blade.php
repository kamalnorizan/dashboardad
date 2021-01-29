@extends('layouts.app')

@section('title','Jawatankuasa Audit')

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
                        @php
                            $i=1;
                        @endphp
                        @foreach ($jawatankuasa as $key=>$ajk)
                            @if($ajk->laporan->auditipenemuan->where('status_hantar','auditi')->count() == 0)
                                <tr>
                                    <td>
                                        {{(($jawatankuasa->currentPage()-1)*20)+$i}}
                                        @php
                                            $i++;
                                        @endphp
                                    </td>
                                    <td>
                                        {{$ajk->laporan->tajuk}}
                                    </td>
                                    <td>
                                        {{$ajk->laporan->tarikh}}
                                    </td>
                                    <td>
                                        {{$ajk->laporan->kategoriaudit->name}}
                                    </td>
                                    <td>
                                        {{-- {{$ajk->progress->name}} --}}
                                    </td>

                                    <td>
                                        <a href="{{route('jawatankuasa.create',['laporan'=>$ajk->laporan->id])}}" class="btn btn-sm btn-info"><i class="fa fa-pencil" aria-hidden="true"></i> Penemuan</a>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </table>
                    {{$jawatankuasa->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
@endsection

