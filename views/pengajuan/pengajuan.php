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

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong>Pengajuan Masuk</strong> (<?php echo $tipe;?>)
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nomor Surat</th>
                                            <th>Judul Pengajuan</th>
                                            <th><center>Dokumen</center></th>
                                            <th><center>Status</center></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        foreach ($pengajuan as $p) {
                                            echo "<tr>
                                            <td style=\"font-size:80%;\">$p->nosurat</td>
                                            <td style=\"font-size:80%;\">$p->judul</td>";

                                            
                                            if ($p->statuspengajuan != 3) {
                                                echo "<td><center>";
                                                
                                                if ($p->tipe == 1) {
                                                    echo "  <div class='dropdown'><button class='btn btn-outline-info dropdown-toggle' type='button' data-toggle='dropdown'>Surat</button>
                                                            <ul class='dropdown-menu'>
                                                            <li><a href='".base_url('upload/')."$p->surat' target='_blank' class='btn btn-success btn-sm btn-block'><i class='fa fa-eye'></i> Lihat Surat Pengajuan</a></li>
                                                            <li><a href='".base_url('staf/y/')."$p->surat' class='btn btn-success btn-sm btn-block'><i class='fa fa-thumbs-up'></i> Sesuai</a></li>
                                                            <li><a href='".base_url('staf/x/')."$p->surat' onclick=\"return confirm('Dokumen tidak sesuai?')\" class='btn btn-danger btn-sm btn-block'><i class='fa fa-thumbs-down'></i> Tidak sesuai</a></li>
                                                            </ul></div>

                                                            <div class='dropdown'><button class='btn btn-outline-primary dropdown-toggle' type='button' data-toggle='dropdown'>Akta Sewa</button>
                                                            <ul class='dropdown-menu'>
                                                            <li><a href='".base_url('upload/')."$p->aktasewa' target='_blank' class='btn btn-success btn-sm btn-block'><i class='fa fa-eye'></i> Lihat Akta Sewa</a></li>
                                                            <li><a href='".base_url('staf/y/')."$p->aktasewa' class='btn btn-success btn-sm btn-block'><i class='fa fa-thumbs-up'></i> Sesuai</a></li>
                                                            <li><a href='".base_url('staf/x/')."$p->aktasewa' onclick=\"return confirm('Dokumen tidak sesuai?')\" class='btn btn-danger btn-sm btn-block'><i class='fa fa-thumbs-down'></i> Tidak sesuai</a></li>
                                                            </ul></div>

                                                            <div class='dropdown'><button class='btn btn-outline-warning dropdown-toggle' type='button' data-toggle='dropdown'>Struktur Organisasi</button>
                                                            <ul class='dropdown-menu'>
                                                            <li><a href='".base_url('upload/')."$p->strukturorg' target='_blank' class='btn btn-success btn-sm btn-block'><i class='fa fa-eye'></i> Lihat Struktur Organisasi</a></li>
                                                            <li><a href='".base_url('staf/y/')."$p->strukturorg' class='btn btn-success btn-sm btn-block'><i class='fa fa-thumbs-up'></i> Sesuai</a></li>
                                                            <li><a href='".base_url('staf/x/')."$p->strukturorg' onclick=\"return confirm('Dokumen tidak sesuai?')\" class='btn btn-danger btn-sm btn-block'><i class='fa fa-thumbs-down'></i> Tidak sesuai</a></li>
                                                            </ul></div>

                                                            <div class='dropdown'><button class='btn btn-outline-success dropdown-toggle' type='button' data-toggle='dropdown'>SK Domisili</button>
                                                            <ul class='dropdown-menu'>
                                                            <li><a href='".base_url('upload/')."$p->skdomisili' target='_blank' class='btn btn-success btn-sm btn-block'><i class='fa fa-eye'></i> Lihat SK Domisili</a></li>
                                                            <li><a href='".base_url('staf/y/')."$p->skdomisili' class='btn btn-success btn-sm btn-block'><i class='fa fa-thumbs-up'></i> Sesuai</a></li>
                                                            <li><a href='".base_url('staf/x/')."$p->skdomisili' onclick=\"return confirm('Dokumen tidak sesuai?')\" class='btn btn-danger btn-sm btn-block'><i class='fa fa-thumbs-down'></i> Tidak sesuai</a></li>
                                                            </ul></div>

                                                            <div class='dropdown'><button class='btn btn-outline-secondary dropdown-toggle' type='button' data-toggle='dropdown'>Daftar Aktiva</button>
                                                            <ul class='dropdown-menu'>
                                                            <li><a href='".base_url('upload/')."$p->aktiva' target='_blank' class='btn btn-success btn-sm btn-block'><i class='fa fa-eye'></i> Lihat Daftar Aktiva</a></li>
                                                            <li><a href='".base_url('staf/y/')."$p->aktiva' class='btn btn-success btn-sm btn-block'><i class='fa fa-thumbs-up'></i> Sesuai</a></li>
                                                            <li><a href='".base_url('staf/x/')."$p->aktiva' onclick=\"return confirm('Dokumen tidak sesuai?')\" class='btn btn-danger btn-sm btn-block'><i class='fa fa-thumbs-down'></i> Tidak sesuai</a></li>
                                                            </ul></div>

                                                            <div class='dropdown'><button class='btn btn-outline-danger dropdown-toggle' type='button' data-toggle='dropdown'>Kesiapan Dokumen</button>
                                                            <ul class='dropdown-menu'>
                                                            <li><a href='".base_url('upload/')."$p->doksiap' target='_blank' class='btn btn-success btn-sm btn-block'><i class='fa fa-eye'></i> Lihat Kesiapan Dokumen</a></li>
                                                            <li><a href='".base_url('staf/y/')."$p->doksiap' class='btn btn-success btn-sm btn-block'><i class='fa fa-thumbs-up'></i> Sesuai</a></li>
                                                            <li><a href='".base_url('staf/x/')."$p->doksiap' onclick=\"return confirm('Dokumen tidak sesuai?')\" class='btn btn-danger btn-sm btn-block'><i class='fa fa-thumbs-down'></i> Tidak sesuai</a></li>
                                                            </ul></div>";

                                                } elseif ($p->tipe == 2) {

                                                    echo "  <div class='dropdown'><button class='btn btn-outline-info dropdown-toggle' type='button' data-toggle='dropdown'>Surat</button>
                                                            <ul class='dropdown-menu'>
                                                            <li><a href='".base_url('upload/')."$p->surat' target='_blank' class='btn btn-success btn-sm btn-block'><i class='fa fa-eye'></i> Lihat Surat Pengajuan</a></li>
                                                            <li><a href='".base_url('staf/y/')."$p->surat' class='btn btn-success btn-sm btn-block'><i class='fa fa-thumbs-up'></i> Sesuai</a></li>
                                                            <li><a href='".base_url('staf/x/')."$p->surat' onclick=\"return confirm('Dokumen tidak sesuai?')\" class='btn btn-danger btn-sm btn-block'><i class='fa fa-thumbs-down'></i> Tidak sesuai</a></li>
                                                            </ul></div>

                                                            <div class='dropdown'><button class='btn btn-outline-primary dropdown-toggle' type='button' data-toggle='dropdown'>Akta Sewa</button>
                                                            <ul class='dropdown-menu'>
                                                            <li><a href='".base_url('upload/')."$p->aktasewa' target='_blank' class='btn btn-success btn-sm btn-block'><i class='fa fa-eye'></i> Lihat Akta Sewa</a></li>
                                                            <li><a href='".base_url('staf/y/')."$p->aktasewa' class='btn btn-success btn-sm btn-block'><i class='fa fa-thumbs-up'></i> Sesuai</a></li>
                                                            <li><a href='".base_url('staf/x/')."$p->aktasewa' onclick=\"return confirm('Dokumen tidak sesuai?')\" class='btn btn-danger btn-sm btn-block'><i class='fa fa-thumbs-down'></i> Tidak sesuai</a></li>
                                                            </ul></div>

                                                            <div class='dropdown'><button class='btn btn-outline-warning dropdown-toggle' type='button' data-toggle='dropdown'>Struktur Organisasi</button>
                                                            <ul class='dropdown-menu'>
                                                            <li><a href='".base_url('upload/')."$p->strukturorg' target='_blank' class='btn btn-success btn-sm btn-block'><i class='fa fa-eye'></i> Lihat Struktur Organisasi</a></li>
                                                            <li><a href='".base_url('staf/y/')."$p->strukturorg' class='btn btn-success btn-sm btn-block'><i class='fa fa-thumbs-up'></i> Sesuai</a></li>
                                                            <li><a href='".base_url('staf/x/')."$p->strukturorg' onclick=\"return confirm('Dokumen tidak sesuai?')\" class='btn btn-danger btn-sm btn-block'><i class='fa fa-thumbs-down'></i> Tidak sesuai</a></li>
                                                            </ul></div>

                                                            <div class='dropdown'><button class='btn btn-outline-success dropdown-toggle' type='button' data-toggle='dropdown'>SK Domisili</button>
                                                            <ul class='dropdown-menu'>
                                                            <li><a href='".base_url('upload/')."$p->skdomisili' target='_blank' class='btn btn-success btn-sm btn-block'><i class='fa fa-eye'></i> Lihat SK Domisili</a></li>
                                                            <li><a href='".base_url('staf/y/')."$p->skdomisili' class='btn btn-success btn-sm btn-block'><i class='fa fa-thumbs-up'></i> Sesuai</a></li>
                                                            <li><a href='".base_url('staf/x/')."$p->skdomisili' onclick=\"return confirm('Dokumen tidak sesuai?')\" class='btn btn-danger btn-sm btn-block'><i class='fa fa-thumbs-down'></i> Tidak sesuai</a></li>
                                                            </ul></div>

                                                            <div class='dropdown'><button class='btn btn-outline-secondary dropdown-toggle' type='button' data-toggle='dropdown'>Daftar Aktiva</button>
                                                            <ul class='dropdown-menu'>
                                                            <li><a href='".base_url('upload/')."$p->aktiva' target='_blank' class='btn btn-success btn-sm btn-block'><i class='fa fa-eye'></i> Lihat Daftar Aktiva</a></li>
                                                            <li><a href='".base_url('staf/y/')."$p->aktiva' class='btn btn-success btn-sm btn-block'><i class='fa fa-thumbs-up'></i> Sesuai</a></li>
                                                            <li><a href='".base_url('staf/x/')."$p->aktiva' onclick=\"return confirm('Dokumen tidak sesuai?')\" class='btn btn-danger btn-sm btn-block'><i class='fa fa-thumbs-down'></i> Tidak sesuai</a></li>
                                                            </ul></div>

                                                            <div class='dropdown'><button class='btn btn-outline-danger dropdown-toggle' type='button' data-toggle='dropdown'>Kesiapan Dokumen</button>
                                                            <ul class='dropdown-menu'>
                                                            <li><a href='".base_url('upload/')."$p->doksiap' target='_blank' class='btn btn-success btn-sm btn-block'><i class='fa fa-eye'></i> Lihat Kesiapan Dokumen</a></li>
                                                            <li><a href='".base_url('staf/y/')."$p->doksiap' class='btn btn-success btn-sm btn-block'><i class='fa fa-thumbs-up'></i> Sesuai</a></li>
                                                            <li><a href='".base_url('staf/x/')."$p->doksiap' onclick=\"return confirm('Dokumen tidak sesuai?')\" class='btn btn-danger btn-sm btn-block'><i class='fa fa-thumbs-down'></i> Tidak sesuai</a></li>
                                                            </ul></div>";

                                                } elseif ($p->tipe == 3) {

                                                    echo "<a href='".base_url('upload/')."$p->surat' target='_blank'  class='btn btn-info'>Surat</a>";
                                                }

                                                echo "</center></td>";

                                            } else {
                                                echo "<td><center><a href='".base_url('download/')."$p->suratpenegasan' class='btn btn-outline-danger'>Surat Penegasan</a></center></td>";
                                            }
                                            
                                            
                                            echo "<td><center>";
                                            if ($this->session->userdata('log_status') == 3)
                                            {
                                                echo "<div class='dropdown'>";
                                                if ($p->statuspengajuan == 0) {
                                                    echo "  <button class='btn btn-outline-secondary' type='button' >Disubmit<br><i class='fa fa-clock-o'></i> $p->tglsubmit</button>
                                                            </ul>";
                                                } elseif ($p->statuspengajuan == 1) {
                                                    echo "  <button class='btn btn-outline-warning dropdown-toggle' type='button' data-toggle='dropdown'>Dokumen Sesuai</button>
                                                            <ul class='dropdown-menu'>
                                                                <center>
                                                                    <li><a href='".base_url('staf/updatep/')."".$p->surat."/2' class='btn btn-success btn-sm btn-block'><i class='fa fa-rocket'></i> Diproses OJK</a></li>
                                                                    <li><a href='".base_url('staf/del/')."".$p->surat."' onclick=\"return confirm('Anda yakin akan menghapus data ini?')\" class='btn btn-danger btn-sm btn-block'><i class='fa fa-trash'></i> Hapus</a></li>
                                                                </center>
                                                            </ul>";
                                                } elseif ($p->statuspengajuan == 2) {
                                                    echo "  <button class='btn btn-outline-primary dropdown-toggle' type='button' data-toggle='dropdown'>Diproses OJK</button>
                                                            <ul class='dropdown-menu'>
                                                                <center>
                                                                    <li><a href='".base_url('staf/detail/')."$p->surat' class='btn btn-success btn-sm btn-block'><i class='fa fa-gavel'></i> Upload Penegasan</a></li>
                                                                    <li><a href='".base_url('staf/del/')."".$p->surat."' onclick=\"return confirm('Anda yakin akan menghapus data ini?')\" class='btn btn-danger btn-sm btn-block'><i class='fa fa-trash'></i> Hapus</a></li>
                                                                </center>
                                                            </ul>";
                                                } elseif ($p->statuspengajuan == 3) {
                                                    echo "  <button class='btn btn-outline-danger dropdown-toggle' type='button' data-toggle='dropdown'>Ditegaskan<br><i class='fa fa-clock-o'></i> $p->tglpenegasan<span class='caret'></span></button>
                                                            <ul class='dropdown-menu'>
                                                                <li><a href='".base_url('staf/del/')."".$p->surat."' onclick=\"return confirm('Anda yakin akan menghapus data ini?')\" class='btn btn-danger btn-sm btn-block'><i class='fa fa-trash'></i> Hapus</a></li>
                                                            </ul>";
                                                }
                                                echo "</div>";
                                            }
                                            else
                                            {
                                                if ($p->statuspengajuan == 0) {
                                                    echo "  <button class='btn btn-outline-secondary type='button' data-toggle='dropdown'>Disubmit<br><i class='fa fa-clock-o'></i> $p->tglsubmit</button>";
                                                } elseif ($p->statuspengajuan == 1) {
                                                    echo "  <button class='btn btn-outline-warning type='button' data-toggle='dropdown'>Dokumen Sesuai<br><i class='fa fa-clock-o'></i> $p->tglditerima</button>";
                                                } elseif ($p->statuspengajuan == 2) {
                                                    echo "  <button class='btn btn-outline-primary type='button' data-toggle='dropdown'>Diproses OJK</button>
                                                            <ul class='dropdown-menu'>";
                                                } elseif ($p->statuspengajuan == 3) {
                                                    echo "  <button class='btn btn-outline-danger type='button' data-toggle='dropdown'>Ditegaskan<br><i class='fa fa-clock-o'></i> $p->tglpenegasan</button>";
                                                }
                                            }
                                            echo "</center></td></tr>";

                                            
                                            
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
