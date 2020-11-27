
@extends('Admin.layouts.adminLayout')
@section('content')
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 col-12 align-self-center">
                <h3 class="text-themecolor mb-0">Dashboard</h3>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
            <div class="col-md-7 col-12 align-self-center d-none d-md-block">
                <div class="d-flex mt-2 justify-content-end">
                    <div class="d-flex mr-3 ml-2">
                        <div class="chart-text mr-2">
                            <h6 class="mb-0"><small>THIS MONTH</small></h6>
                            <h4 class="mt-0 text-info">$58,356</h4>
                        </div>
                        <div class="spark-chart">
                            <div id="monthchart"></div>
                        </div>
                    </div>
                    <div class="d-flex ml-2">
                        <div class="chart-text mr-2">
                            <h6 class="mb-0"><small>LAST MONTH</small></h6>
                            <h4 class="mt-0 text-primary">$48,356</h4>
                        </div>
                        <div class="spark-chart">
                            <div id="lastmonthchart"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">

            <div class="row">
                <!-- Column -->
                <div class="col-lg-6 col-md-12">
                    <div class="card bg-primary">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="mr-3 align-self-center">
                                    <h1 class="text-white"><i class="ti-pie-chart"></i></h1>
                                </div>
                                <div>
                                    <h3 class="card-title text-white">Bandwidth usage</h3>
                                    <h6 class="card-subtitle text-white op-5">March 2020</h6>
                                </div>
                            </div>
                            <div class="row my-2">
                                <div class="col-4 align-self-center">
                                    <h2 class="font-weight-light text-white text-nowrap">50 GB</h2>
                                </div>
                                <div class="col-8 pb-3 pt-2 align-self-center">
                                    <div class="usage chartist-chart" style="height:65px"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <!-- Column -->
                <div class="col-lg-6 col-md-12">
                    <div class="card bg-success">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="mr-3 align-self-center">
                                    <h1 class="text-white"><i class="icon-cloud-download"></i></h1>
                                </div>
                                <div>
                                    <h3 class="card-title text-white">Download count</h3>
                                    <h6 class="card-subtitle text-white op-5">March 2020</h6>
                                </div>
                            </div>
                            <div class="row my-2">
                                <div class="col-4 align-self-center">
                                    <h2 class="font-weight-light text-white text-nowrap text-truncate">35487</h2>
                                </div>
                                <div class="col-8 pb-3 pt-2 text-right">
                                    <div class="spark-count" style="height:65px"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Column -->
            </div>
            <!-- Row -->
            <!-- Row -->

        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer">
            © 2020 Material Pro Admin by wrappixel.com
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
@stop
