@extends('layouts.app')

@section('title','Laporan Audit & Penemuan')

@section('head')
<link href="{{ asset('res/css/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">
@endsection
@section('custom_css')
<style >
   div.dataTables_length {
    margin-right: 1em;
}
</style>
@endsection


@section('action')
<a href="{{route('laporan.create')}}" class="btn btn-md btn-primary btn-md">
    <i class='fa fa-plus-circle'></i> Tambah Laporan Penemuan</a>
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
                    <table class="table" id="laporanajax">
                        <thead>
                            <tr>
                                <th>Bil.</th>
                                <th>Tajuk Laporan</th>
                                <th>Tarikh Laporan</th>
                                <th>Kategori Audit </th>
                                <th>Status</th>
                                <th>Tindakan</th>
                            </tr>
                        </thead>
                    </table>
                    <br>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
<script src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
<script>
    $(document).ready(function () {
        var table=$('#laporanajax').DataTable({
            processing: true,
            responsive: true,
            serverSide: true,
            "contentType": "application/json;charset=utf-8",
            ajax:{
                url: "/laporan/ajaxlaporan",
            },
            columns:[
                {
                    data: 'no_bil',
                    name: 'no_bil'
                },
                {
                    data: 'tajuk',
                    name: 'tajuk'
                },
                {
                    data: 'tarikh',
                    name: 'tarikh'
                },
                {
                    data: 'kategori',
                    name: 'kategori'
                },
                {
                    data: 'status',
                    name: 'status'
                },
                {
                    searchable: false,
                    data: 'tindakan',
                    name: 'tindakan'
                }
                ],
            "drawCallback": function(settings) {
                table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                    cell.innerHTML = i+1;
                });
            }
        });
        table.on( 'order.dt search.dt', function () {
            table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();
    });
</script>
@endsection


