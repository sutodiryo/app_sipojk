        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <div class="header-left">
                        <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>

                        <?php if ($this->session->userdata('log_status') == 2)
                    { 
                        $ns = $this->db->query("SELECT nosurat, surat, judul FROM pengajuan WHERE nosurat IN (SELECT nosurat FROM notifikasi WHERE notifstaf='1')");
                        ?>
                        <div class="dropdown for-notification">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bell"></i>
                                <span class="count bg-danger"><?php echo $ns->num_rows(); ?></span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="notification">
                                
                                <?php
                                    if (empty($ns->result())) {
                                        echo "<a class='dropdown-item' href='#''>Belum ada Pengajuan yang masuk</a>";
                                    } else {
                                        echo "<p class='red'>Ada ".$ns->num_rows()." Pengajuan baru</p>";
                                        $msg = $ns->result();
                                        foreach ($msg as $n)
                                        { ?>

                                            <a class="dropdown-item media bg-flat-color-2" href="<?php echo base_url('pengajuan/ceknotif/'); echo $n->surat?>">
                                                <span class="photo media-left"><i class="fa fa-envelope"></i></span>
                                                <span class="message media-body">
                                                    <span class="name float-left"><?php echo $n->nosurat?></span>
                                                    <p><?php echo $n->judul?>;</p>
                                                </span>
                                            </a>

                                <?php } } ?>
                            </div>
                        </div>

                        <?php
                    } elseif ($this->session->userdata('log_status') == 3) {
                        $nk = $this->db->query("SELECT nosurat, surat, judul FROM pengajuan WHERE nosurat IN (SELECT nosurat FROM notifikasi WHERE notifkasubag='1')");
                        ?>

                        <div class="dropdown for-notification">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bell"></i>
                                <span class="count bg-danger"><?php echo $nk->num_rows(); ?></span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="notification">
                                
                                <?php
                                    if (empty($nk->result())) {
                                        echo "<a class='dropdown-item' href='#''>Belum ada Pengajuan yang masuk</a>";
                                    } else {
                                        echo "<p class='red'>Ada ".$nk->num_rows()." Pengajuan baru</p>";
                                        $msg = $nk->result();
                                        foreach ($msg as $n)
                                        { ?>

                                            <a class="dropdown-item media bg-flat-color-2" href="<?php echo base_url('pengajuan/ceknotif/'); echo $n->surat?>">
                                                <span class="photo media-left"><i class="fa fa-envelope"></i></span>
                                                <span class="message media-body">
                                                    <span class="name float-left"><?php echo $n->nosurat?></span>
                                                    <p><?php echo $n->judul?></p>
                                                </span>
                                            </a>

                                <?php } } ?>
                            </div>
                        </div>

                        <?php
                    }
                    else
                    {
                        $id = $this->session->userdata('log_id');
                        $np = $this->db->query("SELECT nosurat, surat, judul FROM pengajuan WHERE nosurat IN (SELECT nosurat FROM notifikasi WHERE notifbpr='1') AND idbank='$id'");
                        $ns = $this->db->query("SELECT nosurat, surat, judul FROM pengajuan WHERE nosurat IN (SELECT nosurat FROM notifikasi WHERE notifbpr='2') AND idbank='$id'");
                        ?>

                        <div class="dropdown for-notification">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bell"></i>
                                <span class="count bg-danger"><?php echo $np->num_rows() ?></span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="notification">

                                <?php
                                    if (empty($np->result())) {
                                        echo "<a class='dropdown-item'>Belum ada Update Status baru</a>";
                                    } else {
                                        echo "<a class='dropdown-item'>Ada ".$np->num_rows()." Update Status Pengajuan baru</a>";
                                        $msg = $np->result();
                                        foreach ($msg as $n)
                                        { ?>
                                            <a class="dropdown-item media bg-flat-color-2" href="<?php echo base_url('bpr/ceknotif/'); echo $n->surat;?>">
                                                <span class="photo media-left"><i class="fa fa-refresh"></i></span>
                                                <span class="message media-body">
                                                    <span class="name float-left"><?php echo $n->nosurat ?> </span>
                                                    <p><?php echo $n->judul ?></p>
                                                </span>
                                            </a>
                                <?php } } ?>
                            </div>
                        </div>


                        <div class="dropdown for-message">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="message" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-envelope"></i>
                                <span class="count bg-danger"><?php echo $ns->num_rows() ?></span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="message">

                                <?php
                                    if (empty($ns->result())) {
                                        echo "<a class='dropdown-item'>Belum ada Update Status baru</a>";
                                    } else {
                                        echo "<a class='dropdown-item'>Ada ".$ns->num_rows()." Surat Penegasan baru</a>";
                                        $msg = $ns->result();
                                        foreach ($msg as $n)
                                        { ?>
                                            <a class="dropdown-item media bg-flat-color-4" href="<?php echo base_url('bpr/ceknotif/'); echo $n->surat;?>">
                                                <span class="photo media-left"><i class="fa fa-envelope"></i></span>
                                                <span class="message media-body">
                                                    <span class="name float-left"><?php echo $n->nosurat;?> </span>
                                                    <p><?php echo $n->judul ?></p>
                                                </span>
                                            </a>
                                <?php } } ?>
                            </div>
                        </div>




                        <?php
                    }   ?>
                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="<?php echo base_url()?>assets/images/profil.jpg" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="<?php echo base_url('auth/profil')?>"><i class="fa fa-user"></i> My Profile</a>

                            <a class="nav-link" href="<?php echo base_url('auth/logout')?>" title="Keluar" onclick="return confirm('Anda yakin akan keluar?')"><i class="fa fa-power-off"></i> Logout</a>
                        </div>
                    </div>

                </div>
            </div>

        </header><!-- /header -->