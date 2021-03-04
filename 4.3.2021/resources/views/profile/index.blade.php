@extends('layouts.app')

@section('title',$user->name)

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
                    <h3>Profil Pengguna
                        <a class="btn btn-outline btn-primary pull-right" data-toggle="modal" href='#kemaskiniprofile-modal'><i class="fa fa-pencil"></i> Kemaskini Profile</a></h3>
                    <br>
                </div>
                <div class="ibox-content">
                            <div class="row pull-center">

                                    <div class="wrapper pb-3">
                                        <h3>{{$user->name}}</h3>
                                        <p class="text-muted">{{$user->jawatan->name}}</p>
                                        <p class="mt-4 card-text">
                                            <i class="fa fa-list-alt"></i> {{$user->ic}}<br>
                                            <i class="fa fa-phone"></i> {{ $user->phoneNum }}<br>
                                            <i class="fa fa-envelope"></i> {{ $user->email }}<br>
                                        </p>
                                        <p class="mt-4 card-text">
                                           <i class="fa fa-university"></i> Organisasi: <b>{{$user->organisasi->nickname}}</b><br>
                                        </p>
                                        <p >
                                            Peranan:@foreach ($user->roles as $role)
                                            <a class="badge badge-warning">{{$role->name}}</a>

                                                @endforeach
                                        </p>
                                    </div>

                            </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="kemaskiniprofile-modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Borang Kemaskini Profil Pengguna</h4>
            </div>

            <div class="modal-body">
                {!! Form::model($user, ['route' => ['user.updateprofile', $user->id], 'method' => 'PUT']) !!}
                @csrf
                @method('PUT')
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    {!! Form::label('name', 'Nama') !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    <small class="text-danger">{{ $errors->first('name') }}</small>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('ic') ? ' has-error' : '' }}">
                            {!! Form::label('ic', 'No Kad Pengenalan') !!}
                            {!! Form::text('ic', null, ['class' => 'form-control', 'required' => 'required']) !!}
                            <small class="text-danger">{{ $errors->first('ic') }}</small>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            {!! Form::label('email', 'Alamat Email') !!}
                            {!! Form::email('email', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'eg: foo@bar.com']) !!}
                            <small class="text-danger">{{ $errors->first('email') }}</small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('phoneNum') ? ' has-error' : '' }}">
                            {!! Form::label('phoneNum', 'No Telefon') !!}
                            {!! Form::text('phoneNum', null, ['class' => 'form-control', 'required' => 'required']) !!}
                            <small class="text-danger">{{ $errors->first('phoneNum') }}</small>
                        </div>
                    </div>
                </div>

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
@endsection

