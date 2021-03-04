@extends('layouts.app')

@section('title',$laporan->tajuk)

@section('head')

<style>
    .note-editor {
        height: auto !important;
        min-height: 100px;
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
                    <h3>Senarai Penemuan </h3>
                </div>
                <div class="ibox-content">
                    <table class="table">
                        <tr>
                            <th>Bil</th>
                            <th>Perenggan</th>
                            <th width="50%">Penemuan Audit</th>
                            <th>Auditi</th>
                            <th>Status</th>


                        </tr>
                        @foreach ($kcad as $key=>$penemuan)
                        <tr>
                            <td>
                                {{(($kcad->currentPage()-1)*20)+$key+1}}
                            </td>
                            <td>
                                {{$penemuan->perenggan}}
                            </td>
                            <td>
                                @php
                                    $string=$penemuan->penemuan;
                                    $stringlength = 100;
                                    if (strlen($penemuan->penemuan) > $stringlength)
                                    {
                                        $string = wordwrap($penemuan->penemuan, 100);
                                        $i = strpos($string, "\n");
                                        if ($i) {
                                            $string = substr($string, 0, $i);
                                        }
                                    }
                                @endphp
                                {!! $string !!}
                            </td>
                            <td>
                                @foreach ($penemuan->audities as $auditi)
                                    - {{$auditi->auditiuser->name}} <br><br><br>
                                @endforeach
                            </td>
                            <td>

                                @foreach ($penemuan->auditipenemuan as $auditip)

                                @if ($auditip->status_hantar == 'auditi'|| $auditip->status_hantar == 'jawatankuasa')
                                @if($auditip->progress_id == 7)
                                - <img src="{{ asset("assets/img/red.jpeg") }}" alt=""/> <br> <br>
                                @elseif ($auditip->progress_id == 9)
                                - <img src="{{ asset("assets/img/yellow.jpeg") }}" alt=""/><br> <br>
                                @elseif ($auditip->progress_id == 10)
                                - <img src="{{ asset("assets/img/green.jpeg") }}" alt=""/><br> <br>
                                @else
                                -{{$auditip->progress->name}} <br>
                                @endif

                                 @else
                                    {{$penemuan->progress->name}}
                                    @endif

                                    @endforeach

                            </td>



                        </tr>
                        @endforeach
                    </table>
                    {{-- {{$kcad->links()}} --}}
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('script')


@endsection


