@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Sistem Dashboard Audit Dalam ') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }} <br>
                    <div class="wrapper wrapper-content">

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="ibox float-e-margins">
                                    <div class="ibox-title">
                                        <span class="label label-success pull-right">Laporan</span>

                                    </div>
                                    <div class="ibox-content">
                                        {{-- <h3> {{$laporan->count()}}</h3> --}}
                                        <?php
                                        // $connection =mysqli_connect("localhost","root","","dashboardadv6");
                                        // $query="SELECT id FROM `laporan` WHERE status='jawatankuasa' ";

                                        // $query_run=mysqli_query($connection, $query);

                                        // $row=mysqli_num_rows($query_run);

                                        // echo '<h3>'.$row.'</h3>';

                                        ?>

                                        <div class="stat-percent font-bold text-success"><i class="fa fa-bolt"></i></div>
                                        <small>Jumlah Laporan</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="ibox float-e-margins">
                                    <div class="ibox-title">
                                        <span class="label label-info pull-right">Draf Penemuan</span>

                                    </div>
                                    <div class="ibox-content">
                                        <?php
                                        // $connection =mysqli_connect("localhost","root","","dashboardadv6");
                                        // $query="SELECT id FROM `auditipenemuan` WHERE progress_id = 1 ";

                                        // $query_run=mysqli_query($connection, $query);

                                        // $row=mysqli_num_rows($query_run);

                                        // echo '<h3>'.$row.'</h3>';

                                        ?>

                                        <div class="stat-percent font-bold text-success"><i class="fa fa-bolt"></i></div>
                                        <small>Jumlah Draf Penemuan</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="ibox float-e-margins">
                                    <div class="ibox-title">
                                        <span class="label label-danger pull-right">Tiada Tindakan</span>

                                    </div>
                                    <div class="ibox-content">
                                        <?php
                                        // $connection =mysqli_connect("localhost","root","","dashboardadv6");
                                        // $query="SELECT id FROM `auditipenemuan` WHERE status_hantar='jawatankuasa' AND progress_id = 7 ";

                                        // $query_run=mysqli_query($connection, $query);

                                        // $row=mysqli_num_rows($query_run);

                                        // echo '<h3>'.$row.'</h3>';

                                        ?>
                                        <div class="stat-percent font-bold text-info"></div>
                                        <small>Jumlah Penemuan Tiada Tindakan</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="ibox float-e-margins">
                                    <div class="ibox-title">
                                        <span class="label label-warning pull-right">Dalam Tindakan</span>

                                    </div>
                                    <div class="ibox-content">
                                        <?php
                                        // $connection =mysqli_connect("localhost","root","","dashboardadv6");
                                        // $query="SELECT id FROM `auditipenemuan` WHERE status_hantar='jawatankuasa' AND progress_id = 9 ";

                                        // $query_run=mysqli_query($connection, $query);

                                        // $row=mysqli_num_rows($query_run);

                                        // echo '<h3>'.$row.'</h3>';

                                        ?>
                                        <div class="stat-percent font-bold text-navy"> </div>
                                        <small>Jumlah Penemuan Dalam Tindakan</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="ibox float-e-margins">
                                    <div class="ibox-title">
                                        <span class="label label-primary pull-right">Selesai</span>

                                    </div>
                                    <div class="ibox-content">
                                        <?php
                                        // $connection =mysqli_connect("localhost","root","","dashboardadv6");
                                        // $query="SELECT id FROM `auditipenemuan` WHERE status_hantar='jawatankuasa' AND progress_id = 10 ";

                                        // $query_run=mysqli_query($connection, $query);

                                        // $row=mysqli_num_rows($query_run);

                                        // echo '<h3>'.$row.'</h3>';

                                        ?>
                                        <div class="stat-percent font-bold text-danger"></div>
                                        <small>Jumlah Penemuan Selesai</small>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

