<div class="form-group{{ $errors->has('code_ppk') ? ' has-error' : '' }}">
    {!! Form::label('code_ppk', 'Kod PPK') !!}
    {!! Form::text('code_ppk', null, ['class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('code_ppk') }}</small>
</div>
<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    {!! Form::label('name', 'Nama Organisasi') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('name') }}</small>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group{{ $errors->has('nickname') ? ' has-error' : '' }}">
            {!! Form::label('nickname', 'Nama Singkatan') !!}
            {!! Form::text('nickname', null, ['class' => 'form-control', 'required' => 'required']) !!}
            <small class="text-danger">{{ $errors->first('nickname') }}</small>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group{{ $errors->has('org_type_id') ? ' has-error' : '' }}">
            {!! Form::label('org_type_id', 'Jenis Organisasi') !!}
            {!! Form::select('org_type_id',$org_type_opts, null, ['id' => 'org_type_id', 'class' => 'form-control', 'required' => 'required']) !!}  
            <small class="text-danger">{{ $errors->first('org_type_id') }}</small>
        </div>
    </div>
</div>
<div class="form-group{{ $errors->has('address1') ? ' has-error' : '' }}">
    {!! Form::label('address1', 'Alamat') !!}
    {!! Form::text('address1', null, ['class' => 'form-control', 'required' => 'required', 'placeholder'=>'Alamat 1']) !!}
    <small class="text-danger">{{ $errors->first('address1') }}</small>
</div>
<div class="form-group{{ $errors->has('address2') ? ' has-error' : '' }}">
    {!! Form::text('address2', null, ['class' => 'form-control', 'required' => 'required', 'placeholder'=>'Alamat 2']) !!}
    <small class="text-danger">{{ $errors->first('address2') }}</small>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="form-group{{ $errors->has('postcode') ? ' has-error' : '' }}">
            {!! Form::label('postcode', 'Poskod') !!}
            {!! Form::text('postcode', null, ['class' => 'form-control', 'required' => 'required']) !!}
            <small class="text-danger">{{ $errors->first('postcode') }}</small>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
            {!! Form::label('city', 'Bandar') !!}
            {!! Form::text('city', null, ['class' => 'form-control', 'required' => 'required']) !!}
            <small class="text-danger">{{ $errors->first('city') }}</small>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group{{ $errors->has('negeri_id') ? ' has-error' : '' }}">
            {!! Form::label('negeri_id', 'Negeri') !!}
            {!! Form::select('negeri_id',$negeri_opts,null, ['id' => 'negeri_id', 'class' => 'form-control', 'required' => 'required']) !!}
            <small class="text-danger">{{ $errors->first('negeri_id') }}</small>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            {!! Form::label('email', 'Alamat Email') !!}
            {!! Form::email('email', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'eg: foo@bar.com']) !!}
            <small class="text-danger">{{ $errors->first('email') }}</small>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group{{ $errors->has('phoneNumber') ? ' has-error' : '' }}">
            {!! Form::label('phoneNumber', 'No Telefon') !!}
            {!! Form::text('phoneNumber', null, ['class' => 'form-control', 'required' => 'required']) !!}
            <small class="text-danger">{{ $errors->first('phoneNumber') }}</small>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group{{ $errors->has('faxNumber') ? ' has-error' : '' }}">
            {!! Form::label('faxNumber', 'No Fax') !!}
            {!! Form::text('faxNumber', null, ['class' => 'form-control']) !!}
            <small class="text-danger">{{ $errors->first('faxNumber') }}</small>
        </div>
    </div>
</div>
