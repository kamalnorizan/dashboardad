@extends('layouts.app')

@section('title','Kemaskini Pengguna')

@section('head')
<link href="{{ asset('res/css/plugins/chosen/chosen.css') }}"
rel="stylesheet">

<style>
    .chosen-container {
        width: 100% !important;
    }
</style>
@endsection

@section('action')
@endsection

@section('content')
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h3>Borang Kemaskini Maklumat Pengguna</h3>
                </div>
                <div class="ibox-content">

                    {!! Form::model($user, ['route' => ['user.update', Auth()->user()->id], 'method' => 'PUT', 'enctype'=>'multipart/form-data']) !!}

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
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('jawatan_id') ? ' has-error' : '' }}">
                                {!! Form::label('jawatan_id', 'Jawatan') !!}
                                {!! Form::select('jawatan_id',$titleOpts, null, ['id' => 'jawatan_id', 'class' => 'form-control', 'required' => 'required']) !!}
                                <small class="text-danger">{{ $errors->first('jawatan_id') }}</small>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group{{ $errors->has('org_type_id') ? ' has-error' : '' }}">
                                {!! Form::label('org_type_id', 'Jenis Organisasi') !!}
                                {!! Form::select('org_type_id',$orgTypeOpts, $selectedorganisasi->id, ['id' => 'org_type_id', 'class' => 'form-control', 'required' => 'required']) !!}
                                <small class="text-danger">{{ $errors->first('org_type_id') }}</small>
                            </div>
                        </div>
                        <div class="col-md-4 hidden" id='col_negeri'>
                            <div class="form-group{{ $errors->has('negeri') ? ' has-error' : '' }}">
                                {!! Form::label('negeri', 'Negeri') !!}
                                {!! Form::select('negeri',$stateOpts, 0, ['id' => 'negeri', 'class' => 'form-control']) !!}
                                <small class="text-danger">{{ $errors->first('negeri') }}</small>
                            </div>
                        </div>
                        <div class="col-md-4" id='col_org'>
                            <div class="form-group{{ $errors->has('organisasi_id') ? ' has-error' : '' }}">
                                {!! Form::label('organisasi_id', 'Organisasi') !!}
                                {!! Form::select('organisasi_id',[], null, ['id' => 'organisasi_id', 'class' => 'form-control', 'required' => 'required']) !!}
                                <small class="text-danger">{{ $errors->first('organisasi_id') }}</small>
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
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('role[]') ? ' has-error' : '' }}">
                                {!! Form::label('role[]', 'Peranan') !!}
                                {!! Form::select('role[]',$role_opts,0, ['id' => 'roledrop', 'class' => 'form-control', 'required' => 'required', 'multiple']) !!}
                                <small class="text-danger">{{ $errors->first('role[]') }}</small>
                            </div>

                        </div>
                    </div>
                    <div class="btn-group pull-right">
                        {!! Form::submit("Kemaskini", ['class' => 'btn btn-success']) !!}
                    </div>

                    {!! Form::close() !!}
                    <br><br>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('res/js/plugins/chosen/chosen.jquery.js') }}"></script>

<script>
    $(document).ready(function () {
        getOrganisasi();
        $('#org_type').change(function (e) {
            if($(this).val()=='2'){
                $('#col_negeri').removeClass('hidden');
                $('#col_org').addClass('hidden');
            }else{
                $('#col_negeri').addClass('hidden');
                $('#col_org').removeClass('hidden');
                getOrganisasi();
            }

        });

        $("#roledrop").chosen();

        $('#assignrole-modal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                var user_id = button.data('user_id');

                $('#user_id_assignrole').val(user_id);
        });

        $('#negeri').change(function (e) {
            $('#col_org').removeClass('hidden');
            getOrganisasiNegeri();
        });


    });

    function getOrganisasi(){
        $('#organisasi_id').find('option').remove();
        var orgType = $('#org_type').val();
        $.ajax({
            type: "get",
            url: "/user/getOrg/"+orgType,
            success: function (response) {
                $.each(response, function (index, org) {
                    $('#organisasi_id').append('<option value="'+org['id']+'" >'+org['name']+'</option>')
                });
            }
        });
    }

    function getOrganisasiNegeri(){
        $('#organisasi_id').find('option').remove();
        var orgType = $('#org_type').val();
        var negeri = $('#negeri').val();
        $.ajax({
            type: "get",
            url: "/user/getOrg/"+orgType+"/"+negeri,
            success: function (response) {
                $.each(response, function (index, org) {
                    $('#organisasi_id').append('<option value="'+org['id']+'" >'+org['name']+'</option>')
                });
            }
        });
    }
</script>
@endsection

