@extends('layouts.app')

@section('title','Kategori Audit')

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
                    <h3> Tambah Kategori Audit</h3>
                </div>
                <div class="ibox-content">
                    {!! Form::open(['method' => 'POST', 'route' => 'kategoriaudit.store']) !!}

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group{{ $errors->has('subkategori') ? ' has-error' : '' }}">
                                {!! Form::label('subkategori', 'Parent') !!}
                                {!! Form::select('subkategori',$parentCatOpts, null, ['id' => 'subkategori', 'class' => 'form-control', 'required' => 'required']) !!}
                                <small class="text-danger">{{ $errors->first('subkategori') }}</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                {!! Form::label('name', 'Nama Kategori Audit') !!}
                                {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                                <small class="text-danger">{{ $errors->first('name') }}</small>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="pull-right">
                                {!! Form::reset("Reset", ['class' => 'btn btn-warning']) !!}
                                {!! Form::submit("Daftar", ['class' => 'btn btn-primary']) !!}
                            </div>
                        </div>
                        <br><br>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('res/js/plugins/select2/select2.full.min.js') }}"></script>
<script>
        $('#tambah_kategori_btn').click(function (e) {
            var options='<option>Sila Tambah Sub Kategori</option>';
            e.preventDefault();
            $.ajax({
                type: "get",
                url: "/kategori/getSubkategori",
                success: function (response) {
                    $.each(response, function (i, item) {
                    options +='<option value="'+item['id']+'">'+item['name']+'</option>';
                     });
                    $('#tambahkategori').append('<div class="row"><div class="col-md-5"><div class="form-group"><label id="subkategori" class="form-control " required="required" name="subkategori">'+response+'</label></div></div><divclass="col-md-2"><button class="btn btn-block btn-danger" type="button" onclick="$(this).parent().parent().remove();"><i class="fa fa-times"></i>Padam</button></div></div></div>');
                }
            });
        });
        $('.removeBtn').click(function (e) {
            e.preventDefault();
            $(this).parent().parent().remove();
        });
    });
</script>
@endsection
