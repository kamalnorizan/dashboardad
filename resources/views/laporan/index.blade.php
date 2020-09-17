@extends('layouts.app')

@section('title','Laporan Penemuan')

@section('head')
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
                    <h3>Senarai Laporan Penemuan </h3>
                </div>
                <div class="ibox-content">
                    <table class="table">
                        <tr>
                            <td>Bil.</td>
                            <td>Tajuk Laporan</td>
                            <td>Tarikh Laporan</td>
                            <td>Kategori Audit </td>
                            <td>Status</td>
                            <td>Tindakan</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                    </table>
                    <br>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
@endsection


