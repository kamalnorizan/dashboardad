@extends('layouts.app')

@section('title','Kategori Audit')

@section('head')
@endsection

@section('action')
<a class="btn btn-primary btn-md" href="{{route('kategori.create')}}"><i class="fa fa-plus-circle"></i> Tambah Kategori Audit</a>
@endsection

@section('content')
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h3>Senarai Kategori Audit</h3>
                </div>
                <div class="ibox-content">
                    <table class="table">
                        <tr>
                            <td>Nama Kategori</td>
                            <td>Subkategori</td>
                            <td>Tindakan</td>
                        </tr>
                        @foreach ($kategori as $kategoriaudit)
                        <tr>
                            <td>
                                {{$kategoriaudit->name}}
                            </td>
                            <td>
                                <ul>
                                    @foreach ($kategoriaudit->subkategoriad as $subkategori)
                                        <li>{{$subkategori->name}}</li>
                                    @endforeach
                                </ul>
                                {{-- {{$kategoriaudit->parentkategori->name ?? ''}} --}}
                            </td>
                            <td>
                                    <a href="{{route('kategoriaudit.edit',['kategoriaudit'=>$kategoriaudit->id])}}" class="btn btn-sm btn-info"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    {{$kategori->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
@endsection




