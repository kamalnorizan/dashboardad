@extends('layouts.app')

@section('title','Paparan Penemuan')

@section('head')

<link href="{{ asset('res/css/plugins/summernote/summernote.min.css') }}" rel="stylesheet">
<link href="{{ asset('res/css/plugins/select2/select2.min.css') }}" rel="stylesheet">
<style>
    .note-editor {
        height: auto !important;
        min-height: 100px;
    }

    .select2-container--default .select2-selection--single {
        background-color: #fff;
        border: 1px solid #e5e6e7;
        border-radius: 1px;
        padding: 6px 12px;
        height: 34px;
        font-size: 14px;
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered {
        color: #444;
        line-height: 1.42857143;
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 34px;
        position: absolute;
        top: 1px;
        right: 1px;
        width: 20px;
    }

    .select2-container--open{
        border-radius: 1px;
        border: 1px solid #1ab394;
    }
</style>
@endsection

@section('action')
@endsection

@section('content')
<div class="wrapper wrapper-content">
    <div class="row">

            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h3>Paparan Penemuan</h3>
                </div>
                <div class="ibox-content">
                    {!! Form::hidden('penemuan', $penemuan->id, ['id'=>'penemuan_id']) !!}

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('perenggan') ? ' has-error' : '' }}">
                                {!! Form::label('perenggan', 'Perenggan Penemuan') !!}
                                {!! Form::text('perenggan',$penemuan->perenggan, ['class' => 'form-control', 'required' => 'required','disabled']) !!}
                                <small class="text-danger">{{ $errors->first('perenggan') }}</small>
                            </div>
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('penemuan') ? ' has-error' : '' }}">
                        {!! Form::textarea('penemuan', $penemuan->penemuan , ['class' => 'form-control summernote', 'required' => 'required', 'rows'=>'4','id'=>'penemuan']) !!}
                        <small class="text-danger">{{ $errors->first('penemuan') }}</small>
                    </div>



                    <div id="tambahorg">
                        {!! Form::label('organisasi_id[]', 'Tindakan Auditi') !!} <button disabled type="button" class="btn btn-primary btn-xs" id="tambah_org_btn"><i class="fa fa-plus"></i> Tambah</button>
                        @foreach ($penemuan->audities as $auditi)
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group{{ $errors->has('organisasi_id[]') ? ' has-error' : '' }}">

                                    {!! Form::select('organisasi_id[]',$org_opts, $auditi->organisasi_id, ['id' => 'organisasi_id', 'class' => 'form-control select2 org_id', 'required' => 'required','disabled']) !!}
                                    <small class="text-danger">{{ $errors->first('organisasi_id[]') }}</small>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group{{ $errors->has('auditi[]') ? ' has-error' : '' }}">
                                    {!! Form::select('auditi[]',$auditi->organisasi->users->pluck('name','id'), $auditi->auditi, ['id' => 'auditi', 'class' => 'form-control auditi', 'required' => 'required','disabled']) !!}
                                    <small class="text-danger">{{ $errors->first('auditi[]') }}</small>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <button disabled class="btn btn-block btn-danger removeBtn" type="button"><i class="fa fa-times"></i>Padam</button>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <div class="btn-group pull-right">

                        <a href="{{ route('penemuan.index', $penemuan->laporan_id ) }}" class="btn btn-success">Tutup</a>
                    </div>

                    {!! Form::close() !!}
                    <br>
                    <br>
                </div>
            </div>
        </div>

</div>
@endsection

@section('script')
<script src="{{ asset('res/js/plugins/summernote/summernote.js') }}"></script>
<script src="{{ asset('res/js/plugins/select2/select2.full.min.js') }}"></script>
<script>
    $(document).ready(function () {
        $(".select2").select2();
        $('.summernote').summernote({
            height: 200,                 // set editor height
            minHeight: null,             // set minimum height of editor
            maxHeight: 300
        });
        $('#penemuan').summernote('disable');

        function removeOrg(dom) {
            alert(dom);
            $(dom).parent().parent().remove();
        }



        $('#tambah_org_btn').click(function (e) {
            e.preventDefault();
            $.ajax({
                type: "get",
                url: "/penemuan/getorganisasi",
                success: function (response) {
                    $('#tambahorg').append('<div class="row"><div class="col-md-5"><div class="form-group"><select id="organisasi_id" class="form-control select2 org_id" required="required" name="organisasi_id[]">'+response+'</select></div></div><div class="col-md-5"><div class="form-group"><select id="auditi" class="form-control auditi" required="required" name="auditi[]"></select></div></div><div class="col-md-2"><button class="btn btn-block btn-danger" type="button" onclick="$(this).parent().parent().remove();"><i class="fa fa-times"></i>Padam</button></div></div></div>');
                    $(".select2").select2();
                    $('.org_id').on('select2:select', function (e) {
                        var pegawai = $(this).closest('.row').find('.auditi');
                        $(pegawai).find('option').remove();
                        var organisasi_id = $(this).val();
                        $.ajax({
                            type: "get",
                            url: "/penemuan/getpegawai/"+organisasi_id,
                            success: function (response) {
                                if (response.length < 1) {
                                    alert('Tiada auditee yang telah didaftarkan kepada organisasi yang dipilih. Sila daftarkan Auditee kepada organisasi');
                                    $(this).val(0);
                                }else{
                                    $.each(response, function (indexInArray, value) {
                                        $(pegawai).append('<option value="'+value.id +'">'+value.name+'</option>')
                                    });
                                }

                            }
                        });
                    });
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
