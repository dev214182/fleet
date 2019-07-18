<!DOCTYPE html>
<html lang="en">
  <head>

    <?php $this->load->view('templates/inc/front/meta.html'); ?>
    <!-- SEO meta tags @mel -->

    <link href="<?=plugins_dir('bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">  
    
    <!-- toast CSS --> 
    <link href="<?=plugins_dir('toast-master/css/jquery.toast.css')?>" rel="stylesheet">  
    <!-- Custom CSS -->
     <link href="<?=file_common_dir('back/css/style.css')?>" rel="stylesheet">  
    <!-- You can change the theme colors from here -->
    <link href="<?=file_common_dir('back/css/colors/blue.css')?>" id="theme" rel="stylesheet">  
    
    <link href="<?=plugins_dir('sweetalert/sweetalert.css')?>" rel="stylesheet" type="text/css">
    <!--[if lt IE 9]>
    <script src="//oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="//oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script> 
    var base_url = '<?=base_url()?>';
    var images_dir =   '<?=front_images_dir()?>';
    var key =  '<?=private_key()?>';
    </script>
  </head>

<body class="home-login login">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <section id="wrapper">
        <div class="login-register" style="background-image:url('<?=imgs_dir('backgrounds/fleet-page-banner-v3.jpg')?>');">
            <div class="login-box card">
                <div class="card-body">
                    <form class="form-horizontal form-material form-login" id="loginform" method="post">
                        <h3 class="box-title m-b-20">Sign In</h3>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control logged-user" type="text" required="" name="profile_login" placeholder="Username"> </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control logged-pass" type="password" name="profile_password" required="" placeholder="Password"> </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12 font-14">
                                <div class="checkbox checkbox-primary pull-left p-t-0">
                                    <input id="checkbox-signup" type="checkbox">
                                    <label for="checkbox-signup"> Remember me </label>
                                </div> <a href="javascript:void(0)" id="to-recover" class="text-dark pull-right"><!-- <i class="fa fa-lock m-r-5"></i> --> Forgot pwd?</a> </div>
                        </div>
                        <div class="form-group text-center m-t-20">
                            <div class="col-xs-12">
                                <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Log In</button>
                            </div>
                        </div>
                        <div class="form-group m-b-0">
                            <div class="col-sm-12 text-center">
                                <div>Don't have an account? <a href="pages-register.html" class="text-info m-l-5"><b>Sign Up</b></a></div>
                            </div>
                        </div>
                        <div class="form-group m-b-0">
                            <div class="col-sm-12 text-center">
                                 <a href="<?=base_url()?>" class="text-info m-l-5"><b>Back to home page</b></a> 
                            </div>
                        </div>
                    </form>
                    <form class="form-horizontal" method="post" id="recoverform" action="">
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <h3>Recover Password</h3>
                                <p class="text-muted">Enter your Email and instructions will be sent to you! </p>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" required="" placeholder="Email"> </div>
                        </div>
                        <div class="form-group text-center m-t-20">
                            <div class="col-xs-12">
                                <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="<?=plugins_dir('jquery/jquery.min.js')?>"></script> 
    <script src="<?=file_common_dir('front/js/login.js?v=1.0.1')?>"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?=plugins_dir('bootstrap/js/popper.min.js')?>"></script>
    <script src="<?=plugins_dir('bootstrap/js/bootstrap.min.js')?>"></script> 
     
    <!-- slimscrollbar scrollbar JavaScript -->
   
    <script src="<?=file_common_dir('back/js/jquery.slimscroll.js')?>"></script>
    <!--Wave Effects -->
   
    <script src="<?=file_common_dir('back/js/waves.js')?>"></script>
    <!--Menu sidebar --> 
     <script src="<?=file_common_dir('back/js/sidebarmenu.js')?>"></script>
    <!--stickey kit -->
     
    <script src="<?=plugins_dir('sticky-kit-master/dist/sticky-kit.min.js')?>"></script> 
    <script src="<?=plugins_dir('sparkline/jquery.sparkline.min.js')?>"></script> 
    <!--Custom JavaScript -->
   
    <script src="<?=file_common_dir('back/js/custom.min.js')?>"></script>

    <script src="<?=plugins_dir('toast-master/js/jquery.toast.js')?>"></script>  
    <script src="<?=file_common_dir('back/js/toastr.js')?>"></script> 

      <!-- Sweet-Alert  -->
<script src="<?=plugins_dir('sweetalert/sweetalert.min.js')?>"></script>
<script src="<?=plugins_dir('sweetalert/jquery.sweet-alert.custom.js')?> "></script> 
 
</body>

</html>