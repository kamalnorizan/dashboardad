@extends('layouts.app')

@section('title','Organisasi')

@section('head')
@endsection

@section('action')
<a class="btn btn-primary btn-md" href="{{route('organisasi.create')}}"><i class="fa fa-plus-circle"></i> Tambah Organisasi</a>
@endsection

@section('content')
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h3>Senarai Organisasi</h3>
                </div>
                <div class="ibox-content">
                    <table class="table">
                        <tr>
                            <td>Nama</td>
                            <td>Jenis</td>
                            <td>Negeri</td>
                            <td>No Tel</td>
                            <td>Email</td>
                            <td>Tindakan</td>
                        </tr>
                        @foreach ($organizations as $organisasi)
                        <tr>
                            <td>
                                {{$organisasi->name}}
                            </td>
                            <td>
                                {{$organisasi->org_type->name}}
                            </td>
                            <td>
                                {{$organisasi->negeri->name}}
                            </td>
                            <td>
                                {{$organisasi->phoneNumber}}
                            </td>
                            <td>
                                {{$organisasi->email}}
                            </td>
                            <td>
                            <a href="{{route('organisasi.edit',['organisasi'=>$organisasi->id])}}" class="btn btn-sm btn-info"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    {{$organizations->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
@endsection

