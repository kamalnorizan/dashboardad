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
                    {!! Form::open(['method' => 'POST', 'route' => 'laporan.store']) !!}

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
                    console.log(response);
                    $.each(response, function (i, item) {
                        $('#subkategori').append('<option value="'+item['id']+'">'+item['name']+'</option>');
                    });

                    $('#subkategori_col').removeClass('hidden');
                },
                error: function(error){
                    $('#subkategori_col').find('option').remove();
                    $('#subkategori_col').addClass('hidden');
                }
            });
        });
    });
</script>
@endsection


