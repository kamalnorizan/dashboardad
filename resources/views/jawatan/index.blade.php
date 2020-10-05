@extends('layouts.app')

@section('title','Jawatan')

@section('head')
@endsection

@section('action')
<a href="{{route('jawatan.create')}}" class="btn btn-md btn-primary"><i class="fa fa-plus-circle"></i> Tambah Jawatan</a>
@endsection

@section('content')
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h3>Senarai Jawatan</h3>
                </div>
                <div class="ibox-content">
                    <table class="table">
                        <tr>
                            <td>Bil</td>
                            <td>Nama Jawatan</td>
                            <td>Tindakan</td>
                        </tr>
                        @foreach ($jawatans as $key=>$jawatan)
                        <tr>
                            <td>
                                {{(($jawatans->currentPage()-1)*20)+$key+1}}
                            </td>
                            <td>
                                {{$jawatan->name}}
                            </td>

                            <td>
                            <a href="{{route('jawatan.edit',['jawatan'=>$jawatan->id])}}" class="btn btn-sm btn-info"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    {{$jawatans->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
@endsection



