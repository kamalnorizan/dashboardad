@extends('layouts.app')

@section('title','Jawatan')

@section('head')
@endsection

@section('action')
<a href="{{route('jawatan.create')}}" class="btn btn-md btn-primary"><i class="fa fa-plus-circle"></i> Tambah Jawatan</a>
@endsection

@section('content')
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h3>Senarai Jawatan</h3>
                </div>
                <div class="ibox-content">
                    <table class="table">
                        <tr>
                            <td>Bil</td>
                            <td>Nama Jawatan</td>
                            <td>Tindakan</td>
                        </tr>
                        @foreach ($jawatans as $key=>$jawatan)
                        <tr>
                            <td>
                                {{(($jawatans->currentPage()-1)*20)+$key+1}}
                            </td>
                            <td>
                                {{$jawatan->name}}
                            </td>

                            <td>


                                <form method="POST" action="{{route('jawatan.destroy',['jawatan'=>$jawatan->id])}}">
                                    
                                    <a href="{{route('jawatan.edit',['jawatan'=>$jawatan->id])}}" class="btn btn-sm btn-info"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>

                                    <a href="#" class="btn btn-danger btn-sm removejawatan" data-id="{{$jawatan->id}}"><i class="fa fa-times"></i> Padam</a>

                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                </form>

                            </td>
                        </tr>
                        @endforeach
                    </table>
                    {{$jawatans->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function () {
        $('.removejawatan').click(function (e) {
            e.preventDefault();

            if(confirm('Are you sure')){
                $(e.target).closest('form').submit();
            }
        });
    });
</script>
@endsection



