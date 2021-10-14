    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" style="max-height: 5px;" href="./"><img src="<?php echo base_url()?>assets/images/<?php echo MAIN_LOGO ?>" alt="Logo"></a>
                <a class="navbar-brand hidden" href="./"><img src="<?php echo base_url()?>assets/images/<?php echo SECOND_LOGO ?>" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    
                    <li <?php if ($page == 'Beranda') {echo "class='active'";} else {}?>>
                        <a href="<?php echo base_url()?>"> <i class="menu-icon fa fa-home"></i>Beranda </a>
                    </li>
                    
                    <?php if ($this->session->userdata('log_status') == '1') { ?>

                        <li <?php if ($page == 'Pembukaan') {echo "class='active'";} else {}?>>
                            <a href="<?php echo base_url('bpr/pembukaan')?>"> <i class="menu-icon fa fa-plus-square"></i>Pembukaan Kantor </a>
                        </li>
                        <li <?php if ($page == 'Relokasi') {echo "class='active'";} else {}?>>
                            <a href="<?php echo base_url('bpr/relokasi')?>"> <i class="menu-icon fa fa-location-arrow"></i>Relokasi Kantor </a>
                        </li >
                        <li <?php if ($page == 'Penutupan') {echo "class='active'";} else {}?>>
                            <a href="<?php echo base_url('bpr/penutupan')?>"> <i class="menu-icon fa fa-lock"></i>Penutupan Kantor </a>
                        </li>
                        <li <?php if ($page == 'Pemantauan') {echo "class='active'";} else {}?>>
                            <a href="<?php echo base_url('bpr/pemantauan')?>"> <i class="menu-icon fa fa-eye"></i>Pemantauan </a>
                        </li>
                        <li <?php if ($page == 'Daftar Surat Penegasan') {echo "class='active'";} else {}?>>
                            <a href="<?php echo base_url('bpr/penegasan')?>"> <i class="menu-icon fa fa-envelope"></i>Surat Penegasan </a>
                        </li>

                    <?php } elseif ($this->session->userdata('log_status') == '2') { ?>

                        <h3 class="menu-title">Data Pengajuan</h3>

                        <li <?php if ($page == 'Pengelolaan Perizinan' or $page == 'Detail Pengajuan') {echo "class='active'";} else {}?>>
                            <a href="<?php echo base_url('pengajuan/index/kelola')?>"> <i class="menu-icon fa fa-eye"></i>Pengelolaan Perizinan</a>
                        </li>


                        <li <?php if ($page == 'Pengajuan Perizinan Ditegaskan') {echo "class='active'";} else {}?>>
                            <a href="<?php echo base_url('pengajuan/index/ditegaskan')?>"> <i class="menu-icon fa fa-gavel"></i>Ditegaskan</a>
                        </li>

                        <h3 class="menu-title">Upload</h3>
                        <li <?php if ($page == 'Upload Surat Penegasan') {echo "class='active'";} else {}?>>
                            <a href="<?php echo base_url('staf/penegasan')?>"> <i class="menu-icon fa fa-upload"></i>Surat Penegasan </a>
                        </li>

                        <h3 class="menu-title">Master Data</h3>
                        <li <?php if ($page == 'Master Data BPR') {echo "class='active'";} else {}?>>
                            <a href="<?php echo base_url('master/bpr')?>"> <i class="menu-icon fa fa-hdd-o"></i>Master BPR </a>
                        </li>
                        <li <?php if ($page == 'Master Data Pengguna') {echo "class='active'";} else {}?>>
                            <a href="<?php echo base_url('master/pengguna')?>"> <i class="menu-icon fa fa-users"></i>Master Pengguna </a>
                        </li>

                    <?php } elseif ($this->session->userdata('log_status') == '3') { ?>

                        <h3 class="menu-title">Data Pengajuan</h3>

                        <li <?php if ($page == 'Pengajuan Perizinan' or $page == 'Detail Pengajuan') {echo "class='active'";} else {}?>>
                            <a href="<?php echo base_url('pengajuan/index/kasub')?>"> <i class="menu-icon fa fa-eye"></i>Pengajuan Perizinan</a>
                        </li>

                        <li <?php if ($page == 'Pengelolaan Status') {echo "class='active'";} else {}?>>
                            <a href="<?php echo base_url('pengajuan/index/status')?>"> <i class="menu-icon fa fa-check-square-o"></i>Pengelolaan Status</a>
                        </li>


                    <?php } ?>

                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->