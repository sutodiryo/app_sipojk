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
    <link rel="stylesheet" href="<?php echo base_url()?>assets/vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">

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
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                Pemantauan <strong>Status Pengajuan</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nomor Urut</th>
                                            <th>Nomor Surat</th>
                                            <th>Judul Pengajuan</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $no=0;
                                        foreach ($pengajuan as $p) {
                                            $no++;
                                            echo "<tr>
                                            <td>$no</td>
                                            <td>$p->nosurat</td>
                                            <td>$p->judul</td>";

                                            if ($p->statuspengajuan == 0) {
                                                echo "<td><center><button type='button' class='btn btn-info'>Disubmit<br><i class='fa fa-clock-o'></i> $p->tglsubmit </button></center></td></tr>";
                                            } elseif ($p->statuspengajuan == 1) {
                                                echo "<td><center><button type='button' class='btn btn-primary'>Data Lengkap & Sesuai </button></center></td></tr>";
                                            } elseif ($p->statuspengajuan == 2) {
                                                echo "<td><center><button type='button' class='btn btn-warning'>Pengajuan Diproses OJK</button></center></td></tr>";
                                            } elseif ($p->statuspengajuan == 3) {
                                                echo "<td><center><button type='button' class='btn btn-danger'>Ditegaskan<br><i class='fa fa-clock-o'></i> $p->tglpenegasan </button></center></td></tr>";
                                            }
                                            
                                            
                                        } ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->

    <!-- Right Panel -->


    <script src="<?php echo base_url()?>assets/vendors/jquery/dist/jquery.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>assets/assets/js/main.js"></script>

    <script src="<?php echo base_url()?>assets/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/jszip/dist/jszip.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/pdfmake/build/vfs_fonts.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/datatables.net-buttons/js/buttons.colVis.min.js"></script>
    <script src="<?php echo base_url()?>assets/assets/js/init-scripts/data-table/datatables-init.js"></script>


</body>

</html>
