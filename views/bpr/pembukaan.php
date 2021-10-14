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
                                Form Pengajuan <strong>Izin Pembukaan Kantor</strong>
                            </div>

                            <?php echo form_open_multipart('bpr/pembukaan_baru', 'id="form_pembukaan"'); ?>
                                <div class="card-body card-block">
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">ID Bank</label></div>
                                        <div class="col-12 col-md-2">
                                            <input name="idbank" type="text" id="text-input" readonly value="<?php echo $this->session->userdata('log_id'); ?>" class="form-control">
                                            <input type="hidden" name="tipe" value="1">
                                            <input type="hidden" name="notif" value="1">
                                            <input type="hidden" name="tglsubmit" value="<?php echo date("Y-m-d")?>">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Judul Pengajuan</label></div>
                                        <div class="col-12 col-md-6">
                                            <input name="judul" required type="text" id="text-input" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nomor Surat</label></div>
                                        <div class="col-12 col-md-3">
                                            <input name="nosurat" required type="text" id="text-input" class="form-control">
                                        </div>
                                    </div>
                                    <hr>


                                    <div class="row form-group">
                                        <div class="col col-md-5"><label for="file-input" class=" form-control-label">File scan Surat</label></div>
                                        <div class="col-12 col-md-7"><input required type="file" id="surat" name="surat" class="form-control-file"></div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-5"><label for="file-input" class=" form-control-label">File scan Akta Kepemilikan/Bukti Sewa Bangunan</label></div>
                                        <div class="col-12 col-md-7"><button disabled type="button" class="btn btn-secondary mb-1">Upload</button></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-5"><label for="file-input" class=" form-control-label">File scan Struktur Organisasi</label></div>
                                        <div class="col-12 col-md-7"><button disabled type="button" class="btn btn-secondary mb-1">Upload</button></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-5"><label for="file-input" class=" form-control-label">File scan Surat Keterangan Domisili</label></div>
                                        <div class="col-12 col-md-7"><button disabled type="button" class="btn btn-secondary mb-1">Upload</button></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-5"><label for="file-input" class=" form-control-label">File scan Daftar Aktiva Tetap dan Inventaris</label></div>
                                        <div class="col-12 col-md-7"><button disabled type="button" class="btn btn-secondary mb-1">Upload</button></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-5"><label for="file-input" class=" form-control-label">File scan Kesiapan Dokumen</label></div>
                                        <div class="col-12 col-md-7"><button disabled type="button" class="btn btn-secondary mb-1">Upload</button></div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <!-- <button type="submit" class="btn btn-primary btn-lg"><i class="fa fa-arrow-circle-right"></i> Lanjut</button> -->
                                    <button disabled class="btn btn-primary btn-lg"><i class="fa fa-rocket"></i> Submit</button>
                                    <button type="reset" class="btn btn-danger btn-lg"><i class="fa fa-ban"></i> Reset</button>
                                </div>
                            <?php echo form_close(); ?>

                        </div>
                    </div>
                </div><!-- row -->
            </div><!-- .content -->


            <!-- MODAL -->
                <div class="modal fade" id="modalSurat" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="mediumModalLabel">Medium Modal</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <?php echo form_open_multipart('bpr/add_file_buka'); ?>
                                <div class="modal-body" style="font-size: 80%;">
                                    <div class="col-12 col-md-3"><label for="file-input" class=" form-control-label">File scan Surat</label></div>
                                    <div class="col-12 col-md-9"><input type="file" id="file-input" name="surat" class="form-control-file"></div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                    <button type="button" class="btn btn-primary">Upload</button>
                                </div>
                            <?php echo form_close(); ?>

                        </div>
                    </div>
                </div>
            <!-- END OF MODAL -->


        </div><!-- /#right-panel -->
            <!-- Right Panel -->

<script type="text/javascript">
    document.getElementById("surat").onchange = function() {
    document.getElementById("form_pembukaan").submit();
};
</script>

<script src="<?php echo base_url()?>assets/vendors/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url()?>assets/vendors/popper.js/dist/umd/popper.min.js"></script><!-- 
<script src="<?php echo base_url()?>assets/vendors/jquery-validation/dist/jquery.validate.min.js"></script>
<script src="<?php echo base_url()?>assets/vendors/jquery-validation-unobtrusive/dist/jquery.validate.unobtrusive.min.js"></script> -->
<script src="<?php echo base_url()?>assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo base_url()?>assets/assets/js/main.js"></script>

</body>
</html>
