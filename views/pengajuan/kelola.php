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
    <link rel="stylesheet" href="<?php echo base_url()?>assets/vendors/datatables.net-as-bs4/css/as.bootstrap4.min.css">

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

                    <?php echo $this->session->flashdata('notif');?>

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong><?php echo $page ?></strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nomor Surat</th>
                                            <th>Judul Pengajuan</th>
                                            <th><center>Dokumen</center></th>
                                            <th><center>Status Proses</center></th>
                                            <th><center></center></th>
                                            <!-- <th><center>Dokumen</center></th> -->
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        foreach ($pengajuan as $p)
                                        {
                                            echo "<tr>
                                            <td style=\"font-size:80%;\">$p->nosurat</td>
                                            <td style=\"font-size:80%;\">$p->judul</td>";

                                            //STATUS DOKUMEN
                                            echo "<td style=\"font-size:80%;\">";
                                            echo "<center><a href='".base_url('pengajuan/detail/')."$p->surat' class='btn btn-info btn-lg'><i class='fa fa-search-plus'></i> Lihat</a></center>";

                                            echo "</td>";
                                            //END OF STATUS DOKUMEN

                                            //STATUS PENGAJUAN
                                            echo "<td><center>";

                                                if ($p->statuspengajuan == 0) {
                                                    echo "<button class='btn btn-outline-secondary type='button' data-toggle='dropdown'>Disubmit<br><i class='fa fa-clock-o'></i> $p->tglsubmit</button>";
                                                } elseif ($p->statuspengajuan == 1) {
                                                    echo "<button class='btn btn-outline-warning type='button' data-toggle='dropdown'>Dokumen Sesuai<br><i class='fa fa-clock-o'></i> $p->tglditerima</button>";
                                                } elseif ($p->statuspengajuan == 2) {
                                                    echo "<button class='btn btn-outline-primary type='button' data-toggle='dropdown'>Diproses OJK</button>
                                                            <ul class='dropdown-menu'>";
                                                } elseif ($p->statuspengajuan == 3) {
                                                    echo "<button class='btn btn-outline-success type='button' data-toggle='dropdown'>Ditegaskan<br><i class='fa fa-clock-o'></i> $p->tglpenegasan</button>";
                                                }

                                            echo "</center></td>";
                                            //STATUS PENGAJUAN

                                            echo "<td><center>";
                                            ?>
                                                <a class="btn btn-lg btn-danger" href="<?php echo base_url('pengajuan/hapus'); echo $p->surat;?>" onclick="return confirm('Hapus Pengajuan ini?')">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            <?php
                                            echo "</tr>";
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
    <script src="<?php echo base_url()?>assets/vendors/datatables.net-as/js/dataTables.as.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/datatables.net-as-bs4/js/as.bootstrap4.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/jszip/dist/jszip.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/pdfmake/build/vfs_fonts.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/datatables.net-as/js/as.html5.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/datatables.net-as/js/as.print.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/datatables.net-as/js/as.colVis.min.js"></script>
    <script src="<?php echo base_url()?>assets/assets/js/init-scripts/data-table/datatables-init.js"></script>


</body>

</html>
