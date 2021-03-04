@extends('layouts.app')

@section('title','Kemaskini Kata Laluan')

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
                    <h3>Borang Kemaskini Kata Laluan</h3>
                </div>
                <div class="ibox-content">
                    {!! Form::model($user, ['route' =>['profile.katalaluan.Updatepassword', $user->id], 'method' => 'PUT']) !!}

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Kata Laluan Baru') }}</label>

                        <div class="col-md-6">
                            <input type="password" class="form-control" id="new_password" name="new_password">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Sahkan Kata Laluan') }}</label>

                        <div class="col-md-6">
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password">
                        </div>
                    </div>


                        <div class="btn-group pull-right">
                            {!! Form::submit("Kemaskini", ['class' => 'btn btn-success']) !!}
                        </div>
                        <br>
                        <br>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')


@endsection

