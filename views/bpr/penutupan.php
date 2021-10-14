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
                
                <div class="col-lg-12">
                    <div class="card">

                        <div class="card-header">
                            Form Pengajuan <strong>Izin Penutupan Kantor</strong>
                        </div>
                        <div class="card-body card-block">

                            <?php echo form_open_multipart('bpr/add_tutup'); ?>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">ID Bank</label></div>
                                    <div class="col-12 col-md-2">
                                        <input name="idbank" type="text" id="text-input" readonly value="<?php echo $this->session->userdata('log_id'); ?>" class="form-control">
                                        <input type="hidden" name="tipe" value="3">
                                        <input type="hidden" name="notif" value="1">
                                        <input type="hidden" name="tglsubmit" value="<?php echo date("Y-m-d")?>">
                                        <!-- <small class="form-text text-muted">This is a help text</small> -->
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Judul Pengajuan</label></div>
                                    <div class="col-12 col-md-6">
                                        <input name="judul" type="text" required id="text-input" class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nomor Surat</label></div>
                                    <div class="col-12 col-md-3">
                                        <input name="nosurat" type="text" required id="text-input" class="form-control">
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="file-input" class=" form-control-label">File scan Surat Rencana Penutupan</label></div>
                                    <div class="col-12 col-md-9"><input type="file" required id="file-input" name="surat" class="form-control-file"></div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Alasan Penutupan</label></div>
                                    <div class="col-12 col-md-9"><textarea name="alasan" required id="alasan" rows="9" placeholder="Alasan anda..." class="form-control"></textarea></div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="textarea-input" required class=" form-control-label">Penjelasan Penyelesaian Kewajiban</label></div>
                                    <div class="col-12 col-md-9"><textarea name="ketpenyelesaian" id="" rows="9" placeholder="Penjelasan anda..." class="form-control"></textarea></div>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary btn-lg"><i class="fa fa-dot-circle-o"></i> Kirim</button>
                                    <button type="reset" class="btn btn-danger btn-lg"><i class="fa fa-ban"></i> Reset</button>
                                </div>

                            <?php echo form_close(); ?>
                        </div>

                    </div>
                </div>
            </div><!-- row -->
        </div><!-- .content -->
    </div><!-- /#right-panel -->
        <!-- Right Panel -->

<script src="<?php echo base_url()?>assets/vendors/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url()?>assets/vendors/popper.js/dist/umd/popper.min.js"></script><!-- 
<script src="<?php echo base_url()?>assets/vendors/jquery-validation/dist/jquery.validate.min.js"></script>
<script src="<?php echo base_url()?>assets/vendors/jquery-validation-unobtrusive/dist/jquery.validate.unobtrusive.min.js"></script> -->
<script src="<?php echo base_url()?>assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo base_url()?>assets/assets/js/main.js"></script>

</body>
</html>
