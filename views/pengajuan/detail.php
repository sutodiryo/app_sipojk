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

                <?php $this->session->set_userdata('referred_detail', current_url());?>
                <?php echo $this->session->flashdata('notif');?>
                
                <div class="col-lg-12">
                    <div class="card">


                        <?php foreach ($pengajuan as $p) {} ?>

                        <div class="card-header">
                            Detail Pengajuan Izin <strong>Penutupan Kantor <?php echo $p->namabank; ?></strong>
                        </div>
                        <div class="card-body card-block">

                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">ID Bank</label></div>
                                    <div class="col-12 col-md-2">
                                        <h2 class="pb-2 display-5">
                                            <span class="badge badge-secondary"><?php echo $p->idbank ?></span>
                                        </h2>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tipe Pengajuan</label></div>
                                    <div class="col-12 col-md-2">

                                        <h2 class="pb-2 display-5">
                                            <span class="badge badge-secondary">
                                                <?php if ($p->tipe == 1) {
                                                    echo "Pembukaan";
                                                } elseif ($p->tipe == 2) {
                                                    echo "Relokasi";
                                                } elseif ($p->tipe == 3) {
                                                    echo "Penutupan";
                                                }
                                                ?>
                                            </span>
                                        </h2>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tanggal Submit</label></div>
                                    <div class="col-12 col-md-2">
                                        <h2 class="pb-2 display-5">
                                            <span class="badge badge-secondary"><?php echo $p->tglsubmit ?></span>
                                        </h2>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Judul Pengajuan</label></div>
                                    <div class="col-12 col-md-6">
                                        <h2 class="pb-2 display-5">
                                            <span class="badge badge-secondary"><?php echo $p->judul ?></span>
                                        </h2>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nomor Surat</label></div>
                                    <div class="col-12 col-md-4">
                                        <h2 class="pb-2 display-5">
                                            <span class="badge badge-secondary"><?php echo $p->nosurat ?></span>
                                            <input name="nosurat" readonly type="hidden" id="text-input" class="form-control" value="">
                                        </h2>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Status Proses</label></div>
                                    <div class="col-12 col-md-9">
                                        <h2 class="pb-2 display-5">
                                            <?php
                                            if ($p->statuspengajuan == 0) {
                                                echo "<span class='badge badge-secondary'>Disubmit</span>";
                                            } elseif ($p->statuspengajuan == 1) {
                                                echo "<span class='badge badge-warning'>Dokumen Telah Sesuai & Lengkap</span>";
                                            } elseif ($p->statuspengajuan == 2) {
                                                echo "<span class='badge badge-danger'>Dokumen diproses OJK</span>";
                                            } elseif ($p->statuspengajuan == 3) {
                                                echo "<span class='badge badge-success'>Surat Penegasan Diterbitkan</span><a href='".base_url('download/')."".$p->suratpenegasan."' target='_blank' class='badge badge-danger'><i class='fa fa-cloud-download'></i> Download</a>";
                                            }
                                             ?>
                                        </h2>
                                    </div>
                                </div>


                                <?php
                                // if ($this->session->userdata('log_status') == 2)
                                // {
                                //     if ($p->statuspengajuan == 0)
                                //     {
                                //         echo form_open_multipart('pengajuan/upstatus/1');
                                //     }
                                // }

                                if ($this->session->userdata('log_status') == 2)
                                { ?>

                                    <form action="<?php echo base_url('pengajuan/dok_cekok');?>" method="POST" >
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="file-input" class=" form-control-label">Surat Pengajuan</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <div class="col col-md-12">
                                                    <div class="form-check">
                                                        <div class="checkbox">

                                                            <label for="surat" class="form-check-label">
                                                                <?php
                                                                $surat = $this->db->query("SELECT dok FROM dokvalid WHERE dok='$p->surat'")->num_rows();
                                                                if ($surat == 0) {
                                                                    echo "<input type='checkbox' class='form-check-input' onchange=\"window.location.href = '".base_url('pengajuan/dok_cek/')."".$p->surat."';\">";
                                                                } else {
                                                                    echo "<input type='checkbox' class='form-check-input' checked onchange=\"window.location.href = '".base_url('pengajuan/dok_uncek/')."".$p->surat."';\">";
                                                                } ?>
                                                                <mark><?php echo $p->surat;?></mark> 
                                                                <a href="<?php echo base_url('upload/'); echo $p->surat;?>" target="_blank" class="btn btn-link"><i class="fa fa-eye"></i> Lihat</a>
                                                            </label>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <?php
                                        if ($p->tipe != 3 )
                                        { ?>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="file-input" class=" form-control-label">Akta Kepemilikan/Bukti Sewa Bangunan</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <div class="col col-md-12">
                                                        <div class="form-check">
                                                            <div class="checkbox">

                                                                <label for="aktasewa" class="form-check-label">
                                                                    <?php
                                                                    $aktasewa = $this->db->query("SELECT dok FROM dokvalid WHERE dok='$p->aktasewa'")->num_rows();
                                                                    if ($aktasewa == 0) {
                                                                        echo "<input type='checkbox' class='form-check-input' onchange=\"window.location.href = '".base_url('pengajuan/dok_cek/')."".$p->aktasewa."';\">";
                                                                    } else {
                                                                        echo "<input type='checkbox' class='form-check-input' checked onchange=\"window.location.href = '".base_url('pengajuan/dok_uncek/')."".$p->aktasewa."';\">";
                                                                    } ?>
                                                                    <mark><?php echo $p->aktasewa;?></mark> 
                                                                    <a href="<?php echo base_url('upload/'); echo $p->aktasewa;?>" target="_blank" class="btn btn-link"><i class="fa fa-eye"></i> Lihat</a>
                                                                </label>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="file-input" class=" form-control-label">Struktur Organisasi</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <div class="col col-md-12">
                                                        <div class="form-check">
                                                            <div class="checkbox">

                                                                <label for="strukturorg" class="form-check-label">
                                                                    <?php
                                                                    $strukturorg = $this->db->query("SELECT dok FROM dokvalid WHERE dok='$p->strukturorg'")->num_rows();
                                                                    if ($strukturorg == 0) {
                                                                        echo "<input type='checkbox' class='form-check-input' onchange=\"window.location.href = '".base_url('pengajuan/dok_cek/')."".$p->strukturorg."';\">";
                                                                    } else {
                                                                        echo "<input type='checkbox' class='form-check-input' checked onchange=\"window.location.href = '".base_url('pengajuan/dok_uncek/')."".$p->strukturorg."';\">";
                                                                    } ?>
                                                                    <mark><?php echo $p->strukturorg;?></mark> 
                                                                    <a href="<?php echo base_url('upload/'); echo $p->strukturorg;?>" target="_blank" class="btn btn-link"><i class="fa fa-eye"></i> Lihat</a>
                                                                </label>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="file-input" class=" form-control-label">Surat Keterangan Domisili</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <div class="col col-md-12">
                                                        <div class="form-check">
                                                            <div class="checkbox">

                                                                <label for="skdomisili" class="form-check-label">
                                                                    <?php
                                                                    $skdomisili = $this->db->query("SELECT dok FROM dokvalid WHERE dok='$p->skdomisili'")->num_rows();
                                                                    if ($skdomisili == 0) {
                                                                        echo "<input type='checkbox' class='form-check-input' onchange=\"window.location.href = '".base_url('pengajuan/dok_cek/')."".$p->skdomisili."';\">";
                                                                    } else {
                                                                        echo "<input type='checkbox' class='form-check-input' checked onchange=\"window.location.href = '".base_url('pengajuan/dok_uncek/')."".$p->skdomisili."';\">";
                                                                    } ?>
                                                                    <mark><?php echo $p->skdomisili;?></mark> 
                                                                    <a href="<?php echo base_url('upload/'); echo $p->skdomisili;?>" target="_blank" class="btn btn-link"><i class="fa fa-eye"></i> Lihat</a>
                                                                </label>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="file-input" class=" form-control-label">Daftar Aktiva Tetap dan Inventaris</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <div class="col col-md-12">
                                                        <div class="form-check">
                                                            <div class="checkbox">

                                                                <label for="aktiva" class="form-check-label">
                                                                    <?php
                                                                    $aktiva = $this->db->query("SELECT dok FROM dokvalid WHERE dok='$p->aktiva'")->num_rows();
                                                                    if ($aktiva == 0) {
                                                                        echo "<input type='checkbox' class='form-check-input' onchange=\"window.location.href = '".base_url('pengajuan/dok_cek/')."".$p->aktiva."';\">";
                                                                    } else {
                                                                        echo "<input type='checkbox' class='form-check-input' checked onchange=\"window.location.href = '".base_url('pengajuan/dok_uncek/')."".$p->aktiva."';\">";
                                                                    } ?>
                                                                    <mark><?php echo $p->aktiva;?></mark> 
                                                                    <a href="<?php echo base_url('upload/'); echo $p->aktiva;?>" target="_blank" class="btn btn-link"><i class="fa fa-eye"></i> Lihat</a>
                                                                </label>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="file-input" class=" form-control-label">Kesiapan Dokumen</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <div class="col col-md-12">
                                                        <div class="form-check">
                                                            <div class="checkbox">

                                                                <label for="doksiap" class="form-check-label">
                                                                    <?php
                                                                    $doksiap = $this->db->query("SELECT dok FROM dokvalid WHERE dok='$p->doksiap'")->num_rows();
                                                                    if ($doksiap == 0) {
                                                                        echo "<input type='checkbox' class='form-check-input' onchange=\"window.location.href = '".base_url('pengajuan/dok_cek/')."".$p->doksiap."';\">";
                                                                    } else {
                                                                        echo "<input type='checkbox' class='form-check-input' checked onchange=\"window.location.href = '".base_url('pengajuan/dok_uncek/')."".$p->doksiap."';\">";
                                                                    } ?>
                                                                    <mark><?php echo $p->doksiap;?></mark> 
                                                                    <a href="<?php echo base_url('upload/'); echo $p->doksiap;?>" target="_blank" class="btn btn-link"><i class="fa fa-eye"></i> Lihat</a>
                                                                </label>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        <?php
                                        } ?>
                                <?php
                                }

                                elseif ($this->session->userdata('log_status') == 3)
                                { ?>

                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="file-input" class=" form-control-label">Surat Pengajuan</label></div>
                                        <div class="col-12 col-md-9">
                                            <div class="checkbox">
                                                <mark><?php echo $p->surat;?></mark><a href="<?php echo base_url('upload/'); echo $p->surat;?>" target="_blank" class="btn btn-link" ><i class="fa fa-eye"></i> Lihat</a>
                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                    if ($p->tipe != 3 )
                                    { ?>

                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="file-input" class=" form-control-label">Akta Kepemilikan/Bukti Sewa Bangunan</label></div>
                                            <div class="col-12 col-md-9">
                                                <div class="checkbox">
                                                    <mark><?php echo $p->aktasewa;?></mark> <a href="<?php echo base_url('upload/'); echo $p->aktasewa;?>" target="_blank" class="btn btn-link"><i class="fa fa-eye"></i> Lihat</a></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="file-input" class=" form-control-label">Struktur Organisasi</label></div>
                                            <div class="col-12 col-md-9">
                                                <div class="checkbox"><mark><?php echo $p->strukturorg;?></mark> <a href="<?php echo base_url('upload/'); echo $p->strukturorg;?>" target="_blank" class="btn btn-link"><i class="fa fa-eye"></i> Lihat</a></label></div>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="file-input" class=" form-control-label">Surat Keterangan Domisili</label></div>
                                            <div class="col-12 col-md-9">
                                                <div class="checkbox"><mark><?php echo $p->skdomisili;?></mark> <a href="<?php echo base_url('upload/'); echo $p->skdomisili;?>" target="_blank" class="btn btn-link"><i class="fa fa-eye"></i> Lihat</a></label></div>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="file-input" class=" form-control-label">Daftar Aktiva Tetap dan Inventaris</label></div>
                                            <div class="col-12 col-md-9">
                                                <div class="checkbox"><mark><?php echo $p->aktiva;?></mark> <a href="<?php echo base_url('upload/'); echo $p->aktiva;?>" target="_blank" class="btn btn-link"><i class="fa fa-eye"></i> Lihat</a></label></div>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="file-input" class=" form-control-label">Kesiapan Dokumen</label></div>
                                            <div class="col-12 col-md-9">
                                                <div class="checkbox"><mark><?php echo $p->doksiap;?></mark> <a href="<?php echo base_url('upload/'); echo $p->doksiap;?>" target="_blank" class="btn btn-link"><i class="fa fa-eye"></i> Lihat</a></label></div>
                                            </div>
                                        </div>

                                    <?php
                                    }
                                    
                                } ?>


                                <?php
                                if ($p->tipe == 3)
                                { ?>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Alasan Penutupan</label></div>
                                        <div class="col-12 col-md-5"><textarea name="alasan" readonly rows="4" class="form-control"><?php echo $p->alasan; ?></textarea></div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Penjelasan Penyelesaian Kewajiban</label></div>
                                        <div class="col-12 col-md-5"><textarea name="ketpenyelesaian" readonly rows="4" placeholder="Penjelasan anda..." class="form-control"><?php echo $p->ketpenyelesaian; ?></textarea></div>
                                    </div>

                                <?php
                                } ?>

                                    <div class="card-footer">
                                        <?php
                                        if ($this->session->userdata('log_status') == 2)
                                        { 
                                            if ($p->statuspengajuan == 0 )
                                            {
                                                if ($p->tipe == 3) {
                                                    if ($surat == 0) {
                                                        echo "<button disabled class='btn btn-primary btn-lg'><i class='fa fa-check'></i> Data Sesuai & Lengkap</button>";
                                                    } else {
                                                        echo "<a submit'  href='".base_url('pengajuan/dok_lengkap/')."".$p->surat."' class='btn btn-primary btn-lg'><i class='fa fa-check'></i> Data Sesuai & Lengkap</a>";
                                                    }
                                                    
                                                } else {
                                                    if ($surat != 0 && $aktasewa != 0 && $strukturorg != 0 && $skdomisili != 0 && $aktiva != 0 && $doksiap != 0) {
                                                        echo "<a submit' href='".base_url('pengajuan/dok_lengkap/')."".$p->surat."' class='btn btn-primary btn-lg'><i class='fa fa-check'></i> Data Sesuai & Lengkap</a>";
                                                    } else {
                                                        echo "<button disabled class='btn btn-primary btn-lg'><i class='fa fa-check'></i> Data Sesuai & Lengkap</button>";
                                                    }
                                                }
                                            } 
                                        }?>

                                        <!-- 
                                        <?php
                                        if ($this->session->userdata('log_status') == 3)
                                        { 
                                            if ($p->statuspengajuan == 1 )
                                            { ?>
                                                <button type="submit" class="btn btn-primary btn-lg"><i class="fa fa-rocket"></i> Proses</button>
                                            <?php
                                            } elseif ($p->statuspengajuan == 2)
                                            { ?>
                                                <button type="submit" class="btn btn-primary btn-lg"><i class="fa fa-star"></i> Penegasan Diterbitkan</button>
                                            <?php
                                            } ?>
                                        <?php
                                        } ?>
                                         -->
                                        
                                        <a href="<?php if($this->session->userdata('log_status') == 3)
                                        {
                                            echo base_url('pengajuan/index/status');
                                        } elseif($this->session->userdata('log_status') == 2){
                                            echo base_url('pengajuan/index/kelola');
                                        }  ?>" class="btn btn-danger btn-lg"><i class="fa fa-reply"></i> Kembali</a>
                                    </div>
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
