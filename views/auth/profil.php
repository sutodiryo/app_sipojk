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


                    <div class="col-md-12">
                        <aside class="profile-nav alt">
                            <section class="card">
                                <div class="card-header user-header alt bg-dark">
                                    <div class="media">
                                        <a href="#">
                                            <img class="align-self-center rounded-circle mr-3" style="width:85px; height:85px;" alt="" src="<?php echo base_url()?>assets/images/profil.jpg">
                                        </a>
                                        <div class="media-body">
                                            <h2 class="text-light display-6">Jim Doe</h2>
                                            <p>Project Manager</p>
                                        </div>
                                    </div>
                                </div>


                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <a href="#"> <i class="fa fa-envelope-o"></i> Mail Inbox <span class="badge badge-primary pull-right">10</span></a>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="#"> <i class="fa fa-tasks"></i> Recent Activity <span class="badge badge-danger pull-right">15</span></a>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="#"> <i class="fa fa-bell-o"></i> Notification <span class="badge badge-success pull-right">11</span></a>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="#"> <i class="fa fa-comments-o"></i> Message <span class="badge badge-warning pull-right r-activity">03</span></a>
                                    </li>
                                </ul>

                            </section>
                        </aside>
                    </div>


                </div><!-- .row -->
            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->

    <!-- Right Panel -->


    <script src="<?php echo base_url()?>assets/vendors/jquery/dist/jquery.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>assets/assets/js/main.js"></script>


</body>

</html>
