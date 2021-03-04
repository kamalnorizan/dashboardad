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
                            <th>Bil</th>
                            <th>Tajuk Laporan</th>
                                <th>Tarikh Laporan</th>
                                    <th>Kategori Laporan</th>
                                        <th width="30%">Laporan Audit Penuh</th>
                                            <th>Tindakan</th>
                        </tr>
                        @php
                            $i=1;
                        @endphp
                        @foreach ($laporan as $key=>$laporan_item)
                        @if ($laporan_item->auditipenemuan->where('status_hantar','auditi')->count()>0)
                        <tr>
                            <td>
                                {{(($laporan->currentPage()-1)*10)+$i}}
                                        @php
                                            $i++;
                                        @endphp
                            </td>
                            <td>
                                {{$laporan_item->tajuk}}
                            </td>
                            <td>

                                {{\Carbon\Carbon::parse($laporan_item->tarikh)->format('d-m-Y')}}
                            </td>
                            <td>
                                {{$laporan_item->kategoriaudit->name}}
                            </td>
                            <td>
                                {{--{{$laporan_item->attachment->url}}--}}
                                <a href="{{ route('attachment.getfile',['attachment'=>$laporan_item->attachment->id]) }}">{{$laporan_item->attachment->title}}</a>

                            </td>

                            <td>
                                <a href="{{route('maklumbalas.create',['laporan'=>$laporan_item->id])}}" class="btn btn-sm btn-info"><i class="fa fa-pencil" aria-hidden="true"></i> Penemuan</a>
                           </td>
                       </tr>
                       @endif
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
