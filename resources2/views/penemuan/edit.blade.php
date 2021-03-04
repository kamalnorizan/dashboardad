@extends('layouts.app')

@section('title','Kemaskini Penemuan')

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
        @if ($penemuan->ulasanpenemuan->first())

        <div class="col-lg-8">
        @else
        <div class="col-lg-12">

        @endif
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h3>Borang Kemaskini Penemuan</h3>
                </div>
                <div class="ibox-content">
                    {!! Form::model($penemuan, ['route' => ['penemuan.update', $penemuan->id], 'method' => 'PUT', 'enctype'=>'multipart/form-data']) !!}

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('perenggan') ? ' has-error' : '' }}">
                                {!! Form::label('perenggan', 'Perenggan Penemuan') !!}
                                {!! Form::text('perenggan', null, ['class' => 'form-control', 'required' => 'required']) !!}
                                <small class="text-danger">{{ $errors->first('perenggan') }}</small>
                            </div>
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('penemuan') ? ' has-error' : '' }}">
                        {!! Form::textarea('penemuan', $penemuan->penemuan ?? '', ['class' => 'form-control summernote', 'required' => 'required', 'rows'=>'1']) !!}
                        <small class="text-danger">{{ $errors->first('penemuan') }}</small>
                    </div>



                    <div id="tambahorg">
                        {!! Form::label('organisasi_id[]', 'Tindakan Auditi') !!} <button type="button" class="btn btn-primary btn-xs" id="tambah_org_btn"><i class="fa fa-plus"></i> Tambah</button>
                        @foreach ($penemuan->audities as $auditi)
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group{{ $errors->has('organisasi_id[]') ? ' has-error' : '' }}">

                                    {!! Form::select('organisasi_id[]',$org_opts, $auditi->organisasi_id, ['id' => 'organisasi_id', 'class' => 'form-control select2 org_id', 'required' => 'required']) !!}
                                    <small class="text-danger">{{ $errors->first('organisasi_id[]') }}</small>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group{{ $errors->has('auditi[]') ? ' has-error' : '' }}">
                                    {!! Form::select('auditi[]',$auditi->organisasi->users->pluck('name','id'), $auditi->auditi, ['id' => 'auditi', 'class' => 'form-control auditi', 'required' => 'required']) !!}
                                    <small class="text-danger">{{ $errors->first('auditi[]') }}</small>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-block btn-danger removeBtn" type="button"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <div class="btn-group pull-right">
                        {!! Form::submit("Kemaskini", ['class' => 'btn btn-success']) !!}
                    </div>

                    {!! Form::close() !!}
                    <br>
                    <br>
                </div>
            </div>
        </div>
        @if ($penemuan->ulasanpenemuan->first())
        <div class="col-md-4">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Ulasan</h5>

                </div>
                <div class="ibox-content inspinia-timeline">
                    <div class="timeline-item">
                        @foreach ($penemuan->ulasanpenemuan->sortByDesc('created_at') as $ulasan)

                        <div class="row">
                            <div class="col-sm-4 date">
                                <i class="fa fa-info"></i>
                                {{\Carbon\Carbon::parse($ulasan->created_at)->format('d-m-Y')}}
                                <br>
                                <small class="text-navy">{{\Carbon\Carbon::parse($ulasan->created_at)->format('H:i:s')}}</small>
                            </div>
                            <div class="col-sm-8 content no-top-border">
                                <p class="m-b-xs"><strong>Ulasan</strong></p>

                                <p>{{$ulasan->ulasan}}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @endif
        {{-- @if ($penemuan->audits()->first())
        <div class="col-md-4">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Rekod</h5>

                </div>
                <div class="ibox-content inspinia-timeline">
                    @foreach ($penemuan->audits as $audit)
                        {{$audit->event}} : {{$audit}}
                    @endforeach
                </div>
            </div>
        </div>
        @endif --}}

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
            maxHeight: 300,             // set maximum height of editor
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['insert', [ 'picture']],
            ]
        });

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
                    $('#tambahorg').append('<div class="row"><div class="col-md-5"><div class="form-group"><select id="organisasi_id" class="form-control select2 org_id" required="required" name="organisasi_id[]">'+response+'</select></div></div><div class="col-md-5"><div class="form-group"><select id="auditi" class="form-control auditi" required="required" name="auditi[]"></select></div></div><div class="col-md-2"><button class="btn btn-block btn-danger" type="button" onclick="$(this).parent().parent().remove();"><i class="fa fa-times"></i></button></div></div></div>');
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
