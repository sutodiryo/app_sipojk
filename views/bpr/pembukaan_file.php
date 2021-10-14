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

                        <?php $this->session->set_userdata('referred_pembukaan_file', current_url());?>
                        <?php echo $this->session->flashdata('notif');?>
                        
                        <div class="card">
                            <div class="card-header">
                                Form Pengajuan <strong>Izin Pembukaan Kantor</strong>
                            </div>

                            <?php foreach ($pengajuan as $p) {} ?>

                            <div class="card-body card-block">
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">ID Bank</label></div>
                                    <div class="col-12 col-md-2">
                                        <input name="idbank" type="text" id="text-input" readonly value="<?php echo $this->session->userdata('log_id'); ?>" class="form-control">
                                        <input type="hidden" name="tipe" value="1">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Judul Pengajuan</label></div>
                                    <div class="col-12 col-md-6">
                                        <input name="judul" type="text" id="text-input" disabled value="<?php echo $p->judul?>" class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nomor Surat</label></div>
                                    <div class="col-12 col-md-3">
                                        <input name="nosurat" type="text" id="text-input" disabled value="<?php echo $p->nosurat?>" class="form-control">
                                    </div>
                                </div>
                                <hr>

                                <div class="row form-group">
                                    <div class="col col-md-5"><label for="file-input" class=" form-control-label">File scan Surat</label></div>
                                    <div class="col-12 col-md-7"><label><?php echo $p->surat; ?></label></div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-5"><label for="file-input" class=" form-control-label">File scan Akta Kepemilikan/Bukti Sewa Bangunan</label></div>
                                    <div class="col-12 col-md-7">
                                        <?php if (empty($p->aktasewa)) {
                                            echo "<button type='button' class='btn btn-secondary mb-1' data-toggle='modal' data-target='#modalAktasewa'>Upload</button>";
                                        } else {
                                            echo "<label>$p->aktasewa</label>";
                                        } ?>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-5"><label for="file-input" class=" form-control-label">File scan Struktur Organisasi</label></div>
                                    <div class="col-12 col-md-7">
                                        <?php if (empty($p->strukturorg)) {
                                            echo "<button type='button' class='btn btn-secondary mb-1' data-toggle='modal' data-target='#modalStruktuorg'>Upload</button>";
                                        } else {
                                            echo "<label>$p->strukturorg</label>";
                                        } ?>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-5"><label for="file-input" class=" form-control-label">File scan Surat Keterangan Domisili</label></div>
                                    <div class="col-12 col-md-7">
                                        <?php if (empty($p->skdomisili)) {
                                            echo "<button type='button' class='btn btn-secondary mb-1' data-toggle='modal' data-target='#modalSkdomisili'>Upload</button>";
                                        } else {
                                            echo "<label>$p->skdomisili</label>";
                                        } ?>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-5"><label for="file-input" class=" form-control-label">File scan Daftar Aktiva Tetap dan Inventaris</label></div>
                                    <div class="col-12 col-md-7">
                                        <?php if (empty($p->aktiva)) {
                                            echo "<button type='button' class='btn btn-secondary mb-1' data-toggle='modal' data-target='#modalAktiva'>Upload</button>";
                                        } else {
                                            echo "<label>$p->aktiva</label>";
                                        } ?>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-5"><label for="file-input" class=" form-control-label">File scan Kesiapan Dokumen</label></div>
                                    <div class="col-12 col-md-7">
                                        <?php if (empty($p->doksiap)) {
                                            echo "<button type='button' class='btn btn-secondary mb-1' data-toggle='modal' data-target='#modalDoksiap'>Upload</button>";
                                        } else {
                                            echo "<label>$p->doksiap</label>";
                                        } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <?php if (!empty($p->aktasewa ) && !empty($p->strukturorg && !empty($p->skdomisili) && !empty($p->aktiva) && !empty($p->doksiap))) { ?>
                                    <a href="<?php echo base_url('bpr/kirim_pembukaan/'); echo $p->surat?>" class="btn btn-primary btn-lg" ><i class="fa fa-rocket"></i> Kirim</a>
                                <?php } else { ?>
                                    <code>*Untuk dapat mengirim data, semua dokumen harus dilengkapi terlebih dahulu</code><br>
                                    <button disabled type="submit" class="btn btn-primary btn-lg" ><i class="fa fa-rocket"></i> Submit</button>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                </div><!-- row -->
            </div><!-- .content -->


            <!-- MODAL -->
            <div class="modal fade" id="modalAktasewa" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="mediumModalLabel">Upload File Scan Akta Kepemilikan/Bukti Sewa Bangunan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <?php echo form_open_multipart('bpr/pembukaan_upload_file'); ?>
                        <div class="modal-body" style="font-size: 80%;">
                            <div class="col-12 col-md-12">
                                <input type="hidden" name="nosurat" value="<?php echo $p->nosurat;?>">
                                <input type="hidden" name="aktasewa_cek" value="1">
                                <input type="file" id="file-input" name="aktasewa" class="form-control-file">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Upload</button>
                        </div>
                        <?php echo form_close(); ?>

                    </div>
                </div>
            </div>

            <div class="modal fade" id="modalStruktuorg" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="mediumModalLabel">Upload File scan Struktur Organisasi</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <?php echo form_open_multipart('bpr/pembukaan_upload_file'); ?>
                        <div class="modal-body" style="font-size: 80%;">
                            <div class="col-12 col-md-12">
                                <input type="hidden" name="nosurat" value="<?php echo $p->nosurat;?>">
                                <input type="hidden" name="strukturorg_cek" value="1">
                                <input type="file" id="file-input" name="strukturorg" class="form-control-file">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Upload</button>
                        </div>
                        <?php echo form_close(); ?>

                    </div>
                </div>
            </div>
            
            <div class="modal fade" id="modalSkdomisili" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="mediumModalLabel">Upload File scan Surat Keterangan Domisili</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <?php echo form_open_multipart('bpr/pembukaan_upload_file'); ?>
                        <div class="modal-body" style="font-size: 80%;">
                            <div class="col-12 col-md-12">
                                <input type="hidden" name="nosurat" value="<?php echo $p->nosurat;?>">
                                <input type="hidden" name="skdomisili_cek" value="1">
                                <input type="file" id="file-input" name="skdomisili" class="form-control-file">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Upload</button>
                        </div>
                        <?php echo form_close(); ?>

                    </div>
                </div>
            </div>
            
            <div class="modal fade" id="modalAktiva" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="mediumModalLabel">Upload File scan Daftar Aktiva Tetap dan Inventaris</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <?php echo form_open_multipart('bpr/pembukaan_upload_file'); ?>
                        <div class="modal-body" style="font-size: 80%;">
                            <div class="col-12 col-md-12">
                                <input type="hidden" name="nosurat" value="<?php echo $p->nosurat;?>">
                                <input type="hidden" name="aktiva_cek" value="1">
                                <input type="file" id="file-input" name="aktiva" class="form-control-file">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Upload</button>
                        </div>
                        <?php echo form_close(); ?>

                    </div>
                </div>
            </div>
            
            <div class="modal fade" id="modalDoksiap" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="mediumModalLabel">Upload File scan Kesiapan Dokumen</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <?php echo form_open_multipart('bpr/pembukaan_upload_file'); ?>
                        <div class="modal-body" style="font-size: 80%;">
                            <div class="col-12 col-md-12">
                                <input type="hidden" name="nosurat" value="<?php echo $p->nosurat;?>">
                                <input type="hidden" name="doksiap_cek" value="1">
                                <input type="file" id="file-input" name="doksiap" class="form-control-file">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Upload</button>
                        </div>
                        <?php echo form_close(); ?>

                    </div>
                </div>
            </div>
            <!-- END OF MODAL -->


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
