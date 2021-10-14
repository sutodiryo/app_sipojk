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

    <link rel="stylesheet" href="<?php echo base_url()?>assets/vendors/selectFX/css/cs-skin-elastic.css">


    <link rel="stylesheet" href="<?php echo base_url()?>assets/vendors/chosen/chosen.min.css">
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
                                <strong><?php echo $page;?></strong><button data-toggle="modal" data-target="#modal_tambah_pengguna" type="button" class="btn-lg btn-outline-secondary"style="float: right;"><i class="fa fa-user-plus"></i> Pengguna Baru</button>
                            </div>

                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nomor Urut</th>
                                            <th>Email</th>
                                            <th><center>Status</center></th>
                                            <th><center>Aksi</center></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $no=0;
                                        foreach ($pengguna as $p) {
                                            $no++;
                                            echo "<tr>
                                            <td>$no</td>
                                            <td>$p->email</td>";

                                            if ($p->status == 1) {
                                                echo "<td><center><button type='button' class='btn btn-info'><i class='fa fa-user'></i> User BPR</button></center></td>";
                                            } elseif ($p->status == 2) {
                                                echo "<td><center><button type='button' class='btn btn-success'><i class='fa fa-rocket'></i> Staf OJK</button></center></td>";
                                            } elseif ($p->status == 3) {
                                                echo "<td><center><button type='button' class='btn btn-success'><i class='fa fa-rocket'></i> Kasubag</button></center></td>";
                                            }
                                            
                                            echo "<td><center>  <a href='".base_url('auth/resetpass/')."$p->email'  onclick=\"return confirm('Anda yakin akan mereset password user ini?')\" class='btn btn-warning'><i class='fa fa-refresh'></i> Reset Sandi</a>";
                                            if ($p->status == 1) {
                                                echo "<a href='".base_url('master/delp/')."".$p->email."' onclick=\"return confirm('Anda yakin akan menghapus data ini?')\" class='btn btn-danger'><i class='fa fa-trash'></i> Hapus</a>";
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


    <div class="modal fade" id="modal_tambah_pengguna" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mediumModalLabel">Pengguna Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="<?php echo base_url('master/actaddpengguna')?>" method="post" class="form-horizontal">
                        <div class="card-body card-block">
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="hf-email" class=" form-control-label">Email</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="hidden" name="status" value="1">
                                    <select data-placeholder="Pilih Email..." class="standardSelect" required tabindex="1" name="email">
                                        <?php foreach ($email as $e) {
                                            echo "<option name='email' value='$e->email'>$e->email</option>";
                                        } ?>
                                    </select>
                                    <!-- <span class="help-block">Please enter your email</span> -->
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="hf-password" class=" form-control-label">Sandi</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="password" id="hf-password" name="sandi" required class="form-control">
                                    <!-- <span class="help-block">Please enter your password</span> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>

                </form>
            </div>
        </div>
    </div>


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

    <script src="<?php echo base_url()?>assets/vendors/chosen/chosen.jquery.min.js"></script>

    <script>
        jQuery(document).ready(function() {
            jQuery(".standardSelect").chosen({
                disable_search_threshold: 10,
                no_results_text: "Oops, nothing found!",
                width: "100%"
            });
        });
    </script>


</body>

</html>
