@extends('layouts.app')

@section('title','Laporan')

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
                    <h3>Borang Tambah Laporan</h3>
                </div>
                <div class="ibox-content">
                    {!! Form::open(['method' => 'POST', 'route' => 'laporan.store', 'enctype'=>'multipart/form-data']) !!}

                    @include('laporan._form')

                    <div class="pull-right">
                        {!! Form::reset("Reset", ['class' => 'btn btn-warning']) !!}
                        &nbsp;
                        {!! Form::submit("Seterusnya", ['class' => 'btn btn-primary']) !!}
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
<script>
    $(document).ready(function () {
        $('#kategori').change(function (e) {
            e.preventDefault();
            $('#subkategori_col').find('option').remove();
            $.ajax({
                type: "get",
                url: "/laporan/getSubkategori/"+$(this).val(),
                success: function (response) {
                    if(response.length){
                        $.each(response, function (i, item) {
                            $('#subkategori').append('<option value="'+item['id']+'">'+item['name']+'</option>');
                        });
                        $('#subkategori_col').removeClass('hidden');
                    }else{
                        $('#subkategori_col').addClass('hidden');
                        $('#subkategori_col').find('option').remove();
                    }
                },
                error: function(error){
                    $('#subkategori_col').addClass('hidden');
                    $('#subkategori_col').find('option').remove();
                }
            });
        });
    });

    $('#tambahAhli').click(function (e) {
        var options='<option>Sila Pilih Ahli</option>';
        $.ajax({
            type: "get",
            url: "/laporan/getJawatankuasa",
            success: function (response) {
                $.each(response, function (i, item) {
                    options +='<option value="'+item['id']+'">'+item['name']+'</option>';
                });

                $('#jawatankuasa').append(
                '<div class="row"><div class="col-md-10"><select id="jawatankuasa[]" class="form-control" required="required" name="jawatankuasa[]">'+options+'</select></div><div class="col-md-2"><button type="button" class="btn btn-large btn-block btn-danger" onclick="removeField(this)"><i class="fa fa-times"></i> Padam</button></div></div>'
                );
            }
        });
    });

    function removeField(dom) {
        $(dom).parent().parent().remove();
    }
</script>
@endsection
