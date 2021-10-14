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
                                Edit <strong>Data BPR</strong>
                            </div>

                            <?php foreach ($bpr as $b) {}?>

                            <form action="<?php echo base_url('master/actedtbpr')?>" method="post" class="form-horizontal">
                                <div class="card-body card-block">
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">ID Bank</label></div>
                                        <div class="col-12 col-md-2">
                                            <input name="idbank" type="text" id="text-input" readonly value="<?php echo $b->idbank;?>" class="form-control">
                                            <input type="hidden" name="tipe" value="1">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nama Bank</label></div>
                                        <div class="col-12 col-md-6">
                                            <input name="namabank" type="text" id="text-input" class="form-control" value="<?php echo $b->namabank;?>">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Email</label></div>
                                        <div class="col-12 col-md-3">
                                            <input name="email" type="text" readonly id="text-input" class="form-control" value="<?php echo $b->email?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary btn-lg"><i class="fa fa-dot-circle-o"></i> Simpan</button>
                                    <a class="btn btn-danger btn-lg" href="<?php echo base_url('master/bpr')?>"><i class="fa fa-reply"></i> Kembali</a>
                                </div>
                            </form>

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
