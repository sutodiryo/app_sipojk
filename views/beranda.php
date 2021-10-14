<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo MAIN_TITLE ?></title>
    <meta name="description" content="<?php echo MAIN_DESC ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="<?php echo base_url()?>assets/apple-icon.png">
    <link rel="shortcut icon" href="<?php echo base_url()?>assets/favicon.ico">

    <link rel="stylesheet" href="<?php echo base_url()?>assets/vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/vendors/jqvmap/dist/jqvmap.min.css">
    
    <link rel="stylesheet" href="<?php echo base_url()?>assets/assets/css/style.css">
    
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>

<body>

    <!-- Left Panel -->
    <?php $this->load->view("layout/left_panel"); ?>
    <!-- Left Panel -->

    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <?php $this->load->view("layout/header"); ?>
        <!-- Header-->

        <div class="content mt-3">

            <?php   echo $this->session->flashdata('report');
                    echo $this->session->flashdata('akses_ditolak');?>
            <div class="col-lg-6">
                <div class="col-lg-12">
                <div class="col-xl-6 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="stat-widget-one">
                                <div class="stat-icon dib"><i class="ti-plus text-success border-success"></i></div>
                                <div class="stat-content dib">
                                    <div class="stat-text">Pembukaan</div>
                                    <div class="stat-digit"><?php echo $buka;?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="stat-widget-one">
                                <div class="stat-icon dib"><i class="ti-location-pin text-primary border-primary"></i></div>
                                <div class="stat-content dib">
                                    <div class="stat-text">Relokasi</div>
                                    <div class="stat-digit"><?php echo $relokasi;?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>

                <div class="col-lg-12">
                <div class="col-xl-6 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="stat-widget-one">
                                <div class="stat-icon dib"><i class="ti-lock text-warning border-warning"></i></div>
                                <div class="stat-content dib">
                                    <div class="stat-text">Penutupan</div>
                                    <div class="stat-digit"><?php echo $tutup;?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="stat-widget-one">
                                <div class="stat-icon dib"><i class="ti-email text-danger border-danger"></i></div>
                                <div class="stat-content dib">
                                    <div class="stat-text">Ditegaskan</div>
                                    <div class="stat-digit"><?php echo $ditegaskan;?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>


            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <h4 class="card-title mb-0">Pengajuan</h4>
                                <div class="small text-muted">Per Tahun 2019</div>
                            </div>
                            
                            <div class="col-sm-8 hidden-sm-down">
                                <a href="<?php echo base_url('bpr/penegasan')?>"><button type="button" class="btn btn-primary float-right bg-flat-color-1"><i class="fa fa-cloud-download"></i></button></a>
                            </div>
                            


                        </div>
                        <!--/.row-->
                        <div class="chart-wrapper mt-4">
                            <canvas id="trafficChart" style="height:200px;" height="200"></canvas>
                        </div>

                    </div>
                    <div class="card-footer">
                        <ul>
                            <li>
                                <div class="text-muted">Visits</div>
                                <strong>29.703 (40%)</strong>
                                <div class="progress progress-xs mt-2" style="height: 5px;">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 40%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </li>
                            <li class="hidden-sm-down">
                                <div class="text-muted">Unique</div>
                                <strong>24.093 (20%)</strong>
                                <div class="progress progress-xs mt-2" style="height: 5px;">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 20%;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </li>
                            <li>
                                <div class="text-muted">Pageviews</div>
                                <strong>78.706 Views (60%)</strong>
                                <div class="progress progress-xs mt-2" style="height: 5px;">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 60%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </li>
                            <li class="hidden-sm-down">
                                <div class="text-muted">Users</div>
                                <strong>22.123 (80%)</strong>
                                <div class="progress progress-xs mt-2" style="height: 5px;">
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 80%;" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </li>
                            <li class="hidden-sm-down">
                                <div class="text-muted">Bounce Rate</div>
                                <strong>40.15%</strong>
                                <div class="progress progress-xs mt-2" style="height: 5px;">
                                    <div class="progress-bar" role="progressbar" style="width: 40%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            
        </div> <!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <script src="<?php echo base_url()?>assets/vendors/jquery/dist/jquery.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>assets/assets/js/main.js"></script>


    <script src="<?php echo base_url()?>assets/vendors/chart.js/dist/Chart.bundle.min.js"></script>
    <script src="<?php echo base_url()?>assets/assets/js/dashboard.js"></script>
    <!-- <script src="<?php echo base_url()?>assets/assets/js/widgets.js"></script> -->
    <!--   <script src="<?php echo base_url()?>assets/vendors/jqvmap/dist/jquery.vmap.min.js"></script> -->
    <script src="<?php echo base_url()?>assets/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script><!-- 
    <script src="<?php echo base_url()?>assets/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script> -->
<!--     <script>


        (function($) {
            "use strict";

            jQuery('#vmap').vectorMap({
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: ['#1de9b6', '#03a9f5'],
                normalizeFunction: 'polynomial'
            });
        })(jQuery);
    </script> -->

</body>

</html>
