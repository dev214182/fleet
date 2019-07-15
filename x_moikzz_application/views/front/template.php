<!DOCTYPE html>
<html lang="en">
  <head>

    <?php $this->load->view('templates/inc/front/meta.html'); ?>
    <!-- SEO meta tags @mel -->

    <?php $this->load->view('templates/css/front/css.html'); ?>
   
    <!--[if lt IE 9]>
    <script src="//oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="//oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script> 
    var base_url = '<?=base_url()?>';
    var images_dir =   '<?=front_images_dir()?>';
    var jsCustom =  '<?=@$jsCustom?>';
    var key =  '<?=private_key()?>';
    </script>
  </head>
  <body class="<?=$bodyClass?>" data-scrolling-animations="true" data-equal-height=".b-auto__main-item"> 
    <!-- Loader -->
    <div id="page-preloader"><span class="spinner"></span></div>
    <!-- Loader end --> 
   
    <div class="mainNav overlay" style="background-image:url('<?php echo file_common_dir('images/backgrounds/fleet-page-banner-v3.jpg');?>');">

    <!-- Top Navigation -->
    <?php $this->load->view('templates/inc/front/top_navigation.html'); ?>
      <div class="nav-overlay">
        
        <!-- Desktop Main Navigation -->
        <?php $this->load->view('templates/inc/front/desktop_navigation.html'); ?>

        <?php
        if( $bodyClass === 'home m-index' ){ ?>
          <section class="homepage-cta">
            <div class="container">
              <div class="col-xs-12">
                <div class="homepage-cta-wrapper">
                  <h1>Welcome to Gallega Global Logistics</h1>
                  <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptas quia modi exercitationem dolorem quibusdam ad quidem excepturi maxime dolores molestiae! Culpa officiis odit earum cum vitae et tenetur delectus sed.</p>
                  <div class="s-form">
                    <button type="submit" class="btn m-btn">BOOK NOW<span class="fa fa-angle-right"></span></button>
                    <button type="submit" class="btn m-btn">SIGNUP<span class="fa fa-angle-right"></span></button>
                  </div>
                </div>
              </div>
            </div>
          </section><!--b-pageHeader-->
        <?php } ?>

      </div><!-- .nav-overlay -->


      <?php

      if( $bodyClass !== 'home m-index' ){ ?>

      <section class="b-pageHeader">
        <div class="container">
          <h1><?=$breadcrumbs?></h1>
          <div class="b-pageHeader__search">
              <h3>Get In Touch With Us Now</h3>
          </div>
        </div>
      </section><!--b-pageHeader-->

      <div class="b-breadCumbs s-shadow">
        <div class="container">
          <a href="<?=base_url()?>" class="b-breadCumbs__page">Home</a><span class="fa fa-angle-right"></span><span class="b-breadCumbs__page m-active"><?=$breadcrumbs?></span>
        </div>
      </div><!--b-breadCumbs-->

      <?php } ?>

    </div>


    <!-- Mobile Navigation -->
    <a href="javascript:void(0)" class="mobileButton">
      <span class="line line1"></span>
      <span class="line line2"></span>
      <span class="line line3"></span>
    </a>
    <!-- MOBILE Menu -->
    <div class="mobileNav">
      <div class="mob-user-action">
        <a href="<?=base_url('login')?>" class="mob-user-login">LOGIN</a>
        <a href="<?=base_url('register')?>" class="mob-user-reg">REGISTER</a>
      </div>
      <ul class="mob-main-nav">
        <li><a href="<?=base_url()?>">Home</a></li>
        <li><a href="<?=base_url('about')?>">About</a></li>
        <li><a href="<?=base_url()?>">How It Works</a></li>
        <li><a href="<?=base_url('contact')?>">Contact Us</a></li>
      </ul>
      <ul class="mob-secondary-nav">
        <li><a href="<?=base_url('dashboard')?>">Dashboard</a></li>
        <li><a href="<?=base_url('bookings')?>">Bookings</a></li>
        <li><a href="<?=base_url('profile')?>">Profile</a></li>
        <li><a href="javascript:void(0)">Logout</a></li>
      </ul>
      <div class="mob-social-nav">
        <div class="gal-social-icons">  
          <a href="#"><span class="gi-facebook font-light"></span></a>
          <a href="#"><span class="gi-twitter font-light"></span></a>
          <a href="#"><span class="gi-instagram font-light"></span></a>
          <a href="#"><span class="gi-linkedin font-light"></span></a>
          <a href="#"><span class="gi-youtube font-light"></span></a>
        </div>
      </div>
    </div>
      
    <!-- Contents -->
    <?=$contents?>
    
    <!-- footer -->
    <?php $this->load->view('templates/inc/front/footer.html'); ?>
    
    <!--JavaScript-->   
    <?php $this->load->view('templates/js/front/default.html'); ?>
    <?php $this->load->view('templates/js/front/js.html'); ?>
    <?php $this->load->view('templates/js/front/default2.html'); ?>  
  </body>
</html>