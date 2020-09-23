@extends('layouts.app')

@section('title',$laporan->tajuk)

@section('head')
<link href="{{ asset('res/css/plugins/summernote/summernote.min.css') }}" rel="stylesheet">
<style>
    .note-editor {
        height: auto !important;
        min-height: 100px;
    }
</style>
@endsection

@section('action')
<a class="btn btn-primary btn-sm" data-toggle="modal" href='#tambahpenemuan-modal'><i class="fa fa-plus"></i> Tambah Penemuan</a>

@endsection

@section('content')
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h3>Senarai Penemuan</h3>
                </div>
                <div class="ibox-content">
                    <table class="table" id="penemuanajax">
                        <thead>
                            <tr>
                                <th>Bil</th>
                                <th>Perenggan</th>
                                <th>Penemuan Audit</th>
                                <th>Tindakan Auditi</th>
                                <th>Pegawai Bertanggungjawab</th>
                                <th>Tindakan</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="tambahpenemuan-modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Borang Tambah Penemuan</h4>
            </div>
            {!! Form::open(['method' => 'POST', 'route' => 'penemuan.store']) !!}
            <div class="modal-body">
                {!! Form::hidden('laporan_id', $laporan->id, ['id'=>'laporan_id']) !!}
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
                    {!! Form::textarea('penemuan', $claim_report->penemuan ?? '', ['class' => 'form-control summernote', 'required' => 'required', 'rows'=>'1']) !!}
                    <small class="text-danger">{{ $errors->first('penemuan') }}</small>
                </div>
                <div class="row">
                    <div class="col-md-6" >
                        <div class="form-group{{ $errors->has('organisasi_id[]') ? ' has-error' : '' }}">
                            {!! Form::label('organisasi_id[]', 'Tindakan Auditi') !!} <button type="button" class="btn btn-primary btn-xs" id="tambah_org_btn"><i class="fa fa-plus"></i> Tambah</button>
                            {!! Form::select('organisasi_id[]',$org_opts, 0, ['id' => 'organisasi_id', 'class' => 'form-control', 'required' => 'required', 'onchange'=>'showname(this)']) !!}
                            <small class="text-danger">{{ $errors->first('organisasi_id[]') }}</small>
                        </div>
                    </div>
                    <div class="col-md-6 hidden pegawaidiv">
                        <div class="form-group{{ $errors->has('user_id[]') ? ' has-error' : '' }}">
                            {!! Form::label('user_id[]', 'Pegawai Bertanggunjawab') !!}
                            {!! Form::select('user_id[]',[], null, ['id' => 'user_id', 'class' => 'form-control pegawai', 'required' => 'required']) !!}
                            <small class="text-danger">{{ $errors->first('user_id[]') }}</small>
                        </div>
                    </div>
                </div>
                <div id="tambahorg">

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
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
<script src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('res/js/plugins/summernote/summernote.js') }}"></script>
<script>
    $(document).ready(function () {
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

        $('#penemuanajax').DataTable({
            processing: true,
            responsive: true,
            serverSide: true,
            "contentType": "application/json;charset=utf-8",
            ajax:{
                url: "/penemuan/ajaxpenemuan/{{$laporan->id}}",
            },
            columns:[
                {
                    data: 'no_bil',
                    name: 'no_bil'
                },
                {
                    data: 'perenggan',
                    name: 'perenggan'
                },
                {
                    data: 'penemuanaudit',
                    name: 'penemuanaudit'
                },
                {
                    data: 'tindakanauditi',
                    name: 'tindakanauditi'
                },
                {
                    data: 'pegawai',
                    name: 'pegawai'
                },
                {
                    data: 'tindakan',
                    name: 'tindakan'
                }
            ]
        });

    });

    $('#tambah_org_btn').click(function (e) {
            e.preventDefault();
            $.ajax({
                type: "get",
                url: "/penemuan/getorganisasi",
                success: function (response) {
                    $('#tambahorg').append('<div class="row"><div class="col-md-6"><div class="form-group"><label for="organisasi_id[]" class="hidden-md hidden-lg">Tindakan Auditi</label><select onchange="showname(this)" class="form-control" required="required" name="organisasi_id[]">'+response+'</select></div></div><div class="col-md-4 hidden pegawaidiv"><div class="form-group"><label for="user_id[]" class="hidden-md hidden-lg">Pegawai Bertanggunjawab</label><select class="form-control pegawai" required="required" name="user_id[]"><option value="38">Novella Crooks</option></select><small class="text-danger"></small></div></div><div class="col-md-2"><button class="btn btn-block btn-danger" type="button" onclick="removeOrg(this)"><i class="fa fa-times"></i></button></div></div></div>');
                }
            });
        });

        function showname(dom){
            // $('#user_id').find('option').remove();
            var pegawai = $(dom).parent().parent().parent().find($('select.pegawai'));
            var pegawaidiv = $(dom).parent().parent().parent().find($('div.pegawaidiv'));
            $(pegawai).find('option').remove();
            console.log($(pegawai));
            var organisasi_id = $(dom).val();
            $.ajax({
                type: "get",
                url: "/penemuan/getpegawai/"+organisasi_id,
                success: function (response) {
                    if (response.length < 1) {
                        alert('Tiada auditee yang telah didaftarkan kepada organisasi yang dipilih. Sila daftarkan Auditee kepada organisasi');
                        $(dom).val(0);
                        $(pegawaidiv).addClass('hidden');
                    }else{
                        $.each(response, function (indexInArray, value) {
                            $(pegawai).append('<option value="'+value.id +'">'+value.name+'</option>')
                        });

                        $(pegawaidiv).removeClass('hidden');
                    }

                }
            });

        }

    function removeOrg(dom) {
            $(dom).parent().parent().remove();
        }
</script>
@endsection


