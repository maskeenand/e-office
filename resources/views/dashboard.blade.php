
@extends('ekuitas/app')

@section('title','LSIT - EKUITAS')

@section('content')
<html>
    <body>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard E-Office</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-x font-weight-bold text-primary text-uppercase mb-1">
                                Penerimaan (AHS)</div>
                            <div class="h4 mb-0 font-weight-bold text-gray-800">
                                <?php
                               // require 'dbconfig.php';
                                $conn = mysqli_connect("202.93.229.174","u_ekuitas","3ku!t45DB143","ekuitas_ais_dev");
                                $query ="SELECT * FROM mahasiswa where kode_referal_pmb ='b119e338-0'";
                                $query_run = mysqli_query($conn, $query);

                                $row = mysqli_num_rows($query_run);

                                echo '<h1>'.$row.'</h1>';

                             ?>
                             </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-graduation-cap fa-3x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-x font-weight-bold text-success text-uppercase mb-1">
                                Penerimaan  (PMB)</div>
                            <div class="h4 mb-0 font-weight-bold text-gray-800">
                                <?php
                                // require 'dbconfig.php';
                                 $conn = mysqli_connect("202.93.229.174","u_ekuitas","3ku!t45DB143","ekuitas_ais_dev");
                                 $query ="SELECT * FROM mahasiswa where TahunMasuk='2023' and NPM IS NULL and StatusPindahan='B'";
                                 $query_run = mysqli_query($conn, $query);

                                 $row = mysqli_num_rows($query_run);

                                 echo '<h1>'.$row.'</h1>';

                              ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-graduation-cap fa-3x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Penerimaan Pindahan (PMB)
                            </div>
                            <div class="h4 mb-0 font-weight-bold text-gray-800">
                                <?php
                                // require 'dbconfig.php';
                                        $conn = mysqli_connect("202.93.229.174","u_ekuitas","3ku!t45DB143","ekuitas_ais_dev");
                                        $query ="SELECT * FROM mahasiswa where TahunMasuk='2023' and NPM IS NULL and StatusPindahan='P'";
                                        $query_run = mysqli_query($conn, $query);

                                        $row = mysqli_num_rows($query_run);

                                        echo '<h1>'.$row.'</h1>';

                                          ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Pending Requests</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->

    <div class="row">
        <div class="col-xl-6 col-lg-5">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Calon Mahasiswa AHS</h6>
            </div>
            <div class="card-body">
                <div class="chart-bar">
                    <div class="chartjs-size-monitor">
                        <div class="chartjs-size-monitor-expand">
                            <div class="">
                                </div>
                            </div>
                            <div class="chartjs-size-monitor-shrink">
                                <div class="">
                                </div>
                            </div>
                        </div>
                    <canvas id="myBarChart" width="1778" height="640" style="display: block; height: 320px; width: 889px;" class="chartjs-render-monitor"></canvas>
                </div>
            </div>
        </div>
        </div>





        <!-- Area Chart -->
        <div class="col-xl-6 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Calon Mahasiswa PMB</h6>
                </div>
                <div class="card-body">
                    <div class="chart-bar">
                        <div class="chartjs-size-monitor">
                            <div class="chartjs-size-monitor-expand">
                                <div class="">
                                    </div>
                                </div>
                                <div class="chartjs-size-monitor-shrink">
                                    <div class="">
                                    </div>
                                </div>
                            </div>
                        <canvas id="myBarChartpmb" width="1778" height="640" style="display: block; height: 320px; width: 889px;" class="chartjs-render-monitor"></canvas>
                  </div>
                </div>
            </div>
        </div>

    </div>
</div>

</html>
</body>




@endsection

