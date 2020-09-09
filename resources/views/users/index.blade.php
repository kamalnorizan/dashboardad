@extends('layouts.app')

@section('title','Pengurusan Pengguna')

@section('head')
<link href="{{ asset('res/css/plugins/select2/select2.min.css') }}" rel="stylesheet">
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

<a class="btn btn-primary" data-toggle="modal"  href='#assignrole-modal'>Trigger modal</a>
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

<div class="modal fade" id="assignrole-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Peranan</h4>
            </div>
            {!! Form::open(['method' => 'POST', 'url' => 'user.assignrole']) !!}
            <div class="modal-body">
                {!! Form::hidden('user_id', 'value', ['id'=>'user_id_assignrole']) !!}
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

@endsection

@section('script')
<script src="{{ asset('res/js/plugins/select2/select2.full.min.js') }}"></script>

@endsection

