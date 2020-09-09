@extends('layouts.app')

@section('title','Permission & Role')

@section('head')
@endsection

@section('action')
@endsection

@section('content')
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h3>Senarai Permission <button type="button" class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#tambahpermission_modal">
                            <i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah Permission
                        </button></h3>
                </div>
                <div class="ibox-content">
                    <table class="table">
                        <tr>
                            <td>
                                Permission
                            </td>
                            <td>
                                Tindakan
                            </td>
                        </tr>
                        @foreach ($permissions as $permission)
                        <tr>
                            <td>
                                {{ucfirst($permission->name)}}
                            </td>
                            <td>

                            </td>
                        </tr>
                        @endforeach
                    </table>
                    <br>{{$permissions->links()}}
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h3>Senarai Role<button type="button" class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#tambahrole_model">
                            <i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah Role
                        </button></h3>
                </div>
                <div class="ibox-content">
                    <table class="table">
                        <tr>
                            <td>Role</td>
                            <td>Permissions</td>
                            <td>Tindakan</td>
                        </tr>
                        @foreach ($roles as $role)
                        <tr>
                            <td>
                                {{$role->name}} <br>
                            </td>
                            <td>
                                @foreach ($role->permissions as $permission)

                                <a onclick="confirm('Adakah anda pasti untuk membuang hak akses kepada role ini?');" href="{{route('permission.revokepermissionfromrole',['permission'=>$permission->id,'role'=>$role->id])}}" class="badge badge-primary">{{$permission->name}}</a>
                                @endforeach
                            </td>
                            <td>
                                <div class="form-group{{ $errors->has('permission_assign') ? ' has-error' : '' }}">
                                    {!! Form::select('permission_assign',$permission_opts, 0, ['id' => 'permission_assign', 'class' => 'form-control permission_assign', 'required' => 'required', 'data-id'=>$role->id]) !!}
                                    <small class="text-danger">{{ $errors->first('permission_assign') }}</small>
                                </div>
                                <button tton type="button" class="btn btn-info btn-sm" data-toggle="modal" data-role_name="{{$role->name}}" data-role_id="{{$role->id}}" data-target="#beripermission_modal">
                                    Beri Permission
                                </button>
                                <a class="btn btn-danger btn-sm" href="{{route('permission.resetrolepermissions',['role'=>$role->id])}}" onclick="return confirm('Adakah anda pasti?')">Reset Permission</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="beripermission_modal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Beri Permission Kepada Role <span id="roletitle"></span>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button></h3>
            </div>
            {!! Form::open(['method' => 'POST', 'route' => 'permission.beripermissiontorole']) !!}
            <div class="modal-body">
                <label for="checkbox_permission[]">
                    <input type="checkbox" id="checkAll"> Check All
                </label>
                {!! Form::hidden('role', 'value', ['id'=>'role_beripermissiontorole']) !!}
                <div class="row">
                    @foreach ($permission_opts as $key=>$permission)
                    <div class="col-md-3">
                        <div class="form-group">
                            <div class="checkbox{{ $errors->has('checkbox_permission[]') ? ' has-error' : '' }}">
                                <label for="checkbox_permission[]">
                                    {!! Form::checkbox('checkbox_permission[]',$key, null, ['id' => 'checkbox_permission'.$key]) !!} {{$permission}}
                                </label>
                            </div>
                            <small class="text-danger">{{ $errors->first('checkbox_permission[]') }}</small>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="tambahrole_model" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Tambah Role</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {!! Form::open(['method' => 'POST', 'route' => 'permission.storerole']) !!}
            <div class="modal-body">

                <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
                    {!! Form::label('role', 'Nama Role') !!}
                    {!! Form::text('role', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    <small class="text-danger">{{ $errors->first('role') }}</small>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="tambahpermission_modal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Tambah Permission</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {!! Form::open(['method' => 'POST', 'route' => 'permission.storepermission']) !!}
            <div class="modal-body">
                <div class="form-group{{ $errors->has('permission') ? ' has-error' : '' }}">
                    {!! Form::label('permission', 'Nama Permission') !!}
                    {!! Form::text('permission', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    <small class="text-danger">{{ $errors->first('permission') }}</small>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function () {
        $('.permission_assign').change(function (e) {
            // alert($(this).attr('data-id'));
            var role = $(this).attr('data-id');
            var permission = $(this).val();

            window.location.href = "/permission/assignpermissiontorole/"+role+"/"+permission;

        });

        $('#beripermission_modal').on('show.bs.modal', function (event) {
            $('input:checkbox').prop('checked', false);
            var button = $(event.relatedTarget);
            var role_id = button.data('role_id');
            var role_name = button.data('role_name');
            $('#roletitle').html(role_name);
            $('#role_beripermissiontorole').val(role_id);

            $.ajax({
                type: "get",
                url: "/permission/checkpermission/"+role_id,
                success: function (response) {
                    $.each(response, function (key, permission) {
                        $('#checkbox_permission'+permission['id']).prop('checked', true);
                    });
                }
            });
        });

        $("#checkAll").click(function () {
            $('input:checkbox').not(this).prop('checked', this.checked);
        });
    });
</script>
@endsection
