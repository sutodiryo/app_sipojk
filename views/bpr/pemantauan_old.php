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
                    <div class="col-lg-12">
                        
                        <div class="card">
                            <div class="card-header">
                                Pemantauan <strong>Status Pengajuan</strong>
                            </div>
                            <div class="card-body card-block">
                                <form class="form-horizontal">
                                    <div class="row form-group">
                                        <div class="col col-md-12">
                                            <div class="input-group">
                                                <div class="input-group-btn">
                                                    <select class="btn btn-primary">
                                                        <option>Pembukaan Kantor</option>
                                                        <option>Relokasi Kantor</option>
                                                        <option>Penutupan Kantor</option>
                                                    </select><!-- 
                                                    <div class="btn-group">
                                                        <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle btn btn-primary">Jenis Pengajuan</button>
                                                        <div tabindex="-1" aria-hidden="true" role="menu" class="dropdown-menu">
                                                            <button type="button" tabindex="0" class="dropdown-item">Pembukaan Kantor</button>
                                                            <div tabindex="-1" class="dropdown-divider"></div>
                                                            <button type="button" tabindex="0" class="dropdown-item">Relokasi Kantor</button>
                                                            <div tabindex="-1" class="dropdown-divider"></div>
                                                            <button type="button" tabindex="0" class="dropdown-item">Penutupan Kantor</button>
                                                        </div>
                                                    </div> -->
                                                </div>
                                                <input type="text" id="input1-group3" name="input1-group3" placeholder="Nomor Surat" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-dot-circle-o"></i> Cari</button>
                                <button type="reset" class="btn btn-danger btn-lg"><i class="fa fa-ban"></i> Batal</button>
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

<script src="<?php echo base_url()?>assets/vendors/jquery-validation/dist/jquery.validate.min.js"></script>
<script src="<?php echo base_url()?>assets/vendors/jquery-validation-unobtrusive/dist/jquery.validate.unobtrusive.min.js"></script>

<script src="<?php echo base_url()?>assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo base_url()?>assets/assets/js/main.js"></script>
</body>
</html>
