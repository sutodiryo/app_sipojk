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

<body class="bg-dark">

    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="<?php echo base_url()?>">
                        <img class="align-content" src="<?php echo base_url()?>assets/images/ojk.png" alt="">
                    </a>
                </div>
                <div class="login-form">

                    <?php echo $this->session->flashdata('report');?>

                    <form method="post" action="<?php echo base_url('Auth/login'); ?>">
                        <div class="form-group">
                            <label>Email address</label>
                            <input type="email" name="email" class="form-control" placeholder="Email">
                        </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="sandi" class="form-control" placeholder="Password">
                        </div>
                                <div class="checkbox">
                                    <label>
                                <input type="checkbox"> Remember Me
                            </label>
                                    <label class="pull-right">
                                <!-- <a href="<?php echo base_url()?>assets/#">Forgotten Password?</a> -->
                            </label>

                                </div>
                                <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>
                                <!-- <div class="social-login-content">
                                    <div class="social-button">
                                        <button type="button" class="btn social facebook btn-flat btn-addon mb-3"><i class="ti-facebook"></i>Sign in with facebook</button>
                                        <button type="button" class="btn social twitter btn-flat btn-addon mt-2"><i class="ti-twitter"></i>Sign in with twitter</button>
                                    </div>
                                </div>
                                <div class="register-link m-t-15 text-center">
                                    <p>Don't have account ? <a href="<?php echo base_url()?>assets/#"> Sign Up Here</a></p>
                                </div> -->
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="<?php echo base_url()?>assets/vendors/jquery/dist/jquery.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>assets/assets/js/main.js"></script>


</body>

</html>
