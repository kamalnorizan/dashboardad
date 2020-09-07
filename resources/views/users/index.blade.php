@extends('layouts.app')

@section('title','Pengurusan Pengguna')

@section('head')
@endsection

@section('action')
<a href="{{route('user.create')}}" class="btn btn-md btn-primary"><i class="fa fa-plus-circle"></i> Daftar Pengguna</a>
@endsection

@section('content')
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h3>Senarai Pengguna</h3>
                </div>
                <div class="ibox-content">
                    <table class="table">
                        <tr>
                            <td>Bil.</td>
                            <td>Nama</td>
                            <td>No K/P</td>
                            <td>Jawatan</td>
                            <td>Organisasi</td>
                            <td>Peranan</td>
                            <td>Tindakan</td>
                        </tr>
                        @foreach ($users as $key=>$user)
                        <tr>
                            <td>
                                {{(($users->currentPage()-1)*20)+$key+1}}
                            </td>
                            <td>
                                {{$user->name}}
                            </td>
                            <td>
                                {{$user->ic}}
                            </td>
                            <td>
                                {{$user->jawatan->name}}
                            </td>
                            <td>
                                {{$user->organisasi->nickname}}
                            </td>
                            <td>
                                Admin
                            </td>
                            <td>
                                Tindakan
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    {{$users->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
@endsection

