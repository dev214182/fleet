<!DOCTYPE html>
<html lang="en">
  <head>
<<<<<<< HEAD
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Gallega Global Logistics</title>

    <!-- SEO meta tags @mel -->
    <!-- Search Engine -->
    <meta name="description" content="Gallega Global Logistics page description">
    <meta name="image" content="https://gallega.com/wp-content/uploads/2019/02/gallega-logistics.png">
    <!-- Schema.org for Google -->
    <meta itemprop="name" content="Home">
    <meta itemprop="description" content="Gallega Global Logistics page description">
    <meta itemprop="image" content="https://gallega.com/wp-content/uploads/2019/02/gallega-logistics.png">
    <!-- Twitter -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="Home">
    <meta name="twitter:description" content="Gallega Global Logistics page description">
    <meta name="twitter:site" content="@GallegaGlobal">
    <meta name="twitter:creator" content="@GallegaGlobal">
    <meta name="twitter:image:src" content="https://gallega.com/wp-content/uploads/2019/02/gallega-logistics.png">
    <meta name="twitter:player" content="https://www.youtube.com/watch?v=eYiDB4SidKk">
    <!-- Open Graph general (Facebook, Pinterest & Google+) -->
    <meta name="og:title" content="Home">
    <meta name="og:description" content="Gallega Global Logistics page description">
    <meta name="og:image" content="https://gallega.com/wp-content/uploads/2019/02/gallega-logistics.png">
    <meta name="og:url" content="https://gallega.com/">
    <meta name="og:site_name" content="Gallega Global Logistics">
    <meta name="og:locale" content="en_US">
    <meta name="og:video" content="https://www.youtube.com/watch?v=eYiDB4SidKk">
    <meta name="fb:admins" content="156466188386798">
    <meta name="fb:app_id" content="156466188386798">
    <meta name="og:type" content="website">
    <!-- SEO meta tags @mel -->

    
    <link rel="shortcut icon" type="image/x-icon" href="<?=file_common_dir('images/icon-gallega.png')?>" /> 
    <link href="<?=file_common_dir('front/css/master.css')?>" rel="stylesheet"> 
    <link href="<?=file_common_dir('front/css/compare.css')?>" rel="stylesheet" type="text/css" media="all" />
    <link href="<?=file_common_dir('back/plugins/select2/dist/css/select2.min.css');?>" rel="stylesheet"  type="text/css" data="overide"/>
=======

    <?php $this->load->view('templates/inc/front/meta.html'); ?>
    <!-- SEO meta tags @mel -->

    <?php $this->load->view('templates/css/front/css.html'); ?>
   
>>>>>>> Moikzz
    <!--[if lt IE 9]>
    <script src="//oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="//oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script> var base_url = '<?=base_url()?>';</script>
  </head>
  <body class="<?=$bodyClass?>" data-scrolling-animations="true" data-equal-height=".b-auto__main-item"> 
    <!-- Loader -->
    <div id="page-preloader"><span class="spinner"></span></div>
<<<<<<< HEAD
    <!-- Loader end -->

    <!-- Main Navigation -->
    <div class="mainNav overlay" style="background-image:url('<?php echo file_common_dir('images/backgrounds/fleet-page-banner-v3.jpg');?>');">
      <header class="gal-mob-topbar">
        <div class="container">
          <div class="row">
            <div class="col-xs-7">  
              <div class="b-topBar__tel">
              <div class="dropdown">
                  <a class="m-langLink dropdown-toggle" data-toggle='dropdown' href="#"><span class="b-topBar__lang-flag m-en"></span>EN<span class="fa fa-caret-down"></span></a>
                  <ul class="dropdown-menu h-lang">
                    <li><a class="m-langLink dropdown-toggle" data-toggle='dropdown' href="#"><span class="b-topBar__lang-flag m-en"></span>EN</a></li>
                    <li><a class="m-langLink dropdown-toggle" data-toggle='dropdown' href="#"><span class="b-topBar__lang-flag m-es"></span>ES</a></li>
                    <li><a class="m-langLink dropdown-toggle" data-toggle='dropdown' href="#"><span class="b-topBar__lang-flag m-de"></span>DE</a></li>
                    <li><a class="m-langLink dropdown-toggle" data-toggle='dropdown' href="#"><span class="b-topBar__lang-flag m-fr"></span>FR</a></li>
                  </ul>
                </div>
                <span class="fa fa-envelope"></span>
                  <a href="mailto:info@gallega.com">Email:  info@gallega.com</a> 
              </div>
            </div>
            <div class="col-xs-5">  
              <div class="b-topBar__tel">
                <span class=" p-r-20 pull-right">
                <a href="tel:+97148215099"> +971 48 215 099 </a></span>
              </div>
            </div>
          </div>
        </div>
      </header>
      <div class="nav-overlay">
        <div class="nav-fixed">
          <header class="b-topBar">
            <div class="container">
              <div class="row">
                <div class="col-md-2 col-xs-6">
                  <div class="b-topBar__addr">
                    <div class="gal-header-social-icons">  
                      <a href="#"><span class="gi-facebook font-light"></span></a>
                      <a href="#"><span class="gi-twitter font-light"></span></a>
                      <a href="#"><span class="gi-instagram font-light"></span></a>
                      <a href="#"><span class="gi-linkedin font-light"></span></a>
                      <a href="#"><span class="gi-youtube font-light"></span></a>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 col-xs-6 gal-contact-container">  
                  <div class="b-topBar__tel">
                    <span class="fa fa-envelope"></span>
                      <a href="mailto:info@gallega.com">Email:  info@gallega.com</a> 
                    <span class="pull-right p-r-20"><a href="tel:+97148215099"> +971 48 215 099</a></span>
                  </div>
                </div>

                <div class="col-md-4 col-xs-6 gal-acount-container"> 
                  <nav class="b-topBar__nav">
                    <ul style="color:#FFFFFF;"> 
                      <li><a href="#">Register</a></li>
                      <li><a href="<?=site_url('login')?>">Login</a></li>
                      <li><a href="<?=site_url('search')?>">Search</a></li>
                    </ul>
                  </nav>
                </div>
                <div class="col-md-2 col-xs-6 gal-lang-container">
                  <div class="b-topBar__lang">
                    <div class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle='dropdown'>Language</a>
                      <a class="m-langLink dropdown-toggle" data-toggle='dropdown' href="#"><span class="b-topBar__lang-flag m-en"></span>EN<span class="fa fa-caret-down"></span></a>
                      <ul class="dropdown-menu h-lang">
                        <li><a class="m-langLink dropdown-toggle" data-toggle='dropdown' href="#"><span class="b-topBar__lang-flag m-en"></span>EN</a></li>
                        <li><a class="m-langLink dropdown-toggle" data-toggle='dropdown' href="#"><span class="b-topBar__lang-flag m-es"></span>ES</a></li>
                        <li><a class="m-langLink dropdown-toggle" data-toggle='dropdown' href="#"><span class="b-topBar__lang-flag m-de"></span>DE</a></li>
                        <li><a class="m-langLink dropdown-toggle" data-toggle='dropdown' href="#"><span class="b-topBar__lang-flag m-fr"></span>FR</a></li>
                      </ul>
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </header><!--b-topBar-->
          <nav class="b-nav" >
            <div class="container">
              <div class="row">
                <div class="col-sm-3 col-xs-4">
                  <div class="b-nav__logo"> <!-- slideInLeft --> 
                    <a href="<?=base_url()?>">
                      <img class="main-logo" src="<?=file_common_dir('images/gallega-logo2.png')?>" width="61%">
                      <img class="light-logo" src="<?=file_common_dir('images/gallega-logo-light.png')?>" width="61%">
                    </a>
                  </div>
                </div>
                <div class="gal-main-nav-container col-sm-9 col-xs-8">
                  <div class="b-nav__list"> <!-- slideInRight -->
                    <div class="navbar-main-slide">
                      <ul class="navbar-nav-menu">
                        <li><a href="<?=base_url()?>">Home</a></li> 
                        <li><a href="<?=base_url('about')?>">About</a></li>
                        <li><a href="<?=base_url()?>#how-works">How it works</a></li> 
                        <li><a href="<?=base_url('contact')?>">Contact Us</a></li> 
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </nav><!--b-nav-->
        </div><!-- .nav-fixed -->
=======
    <!-- Loader end --> 
   
    <div class="mainNav overlay" style="background-image:url('<?php echo file_common_dir('images/backgrounds/fleet-page-banner-v3.jpg');?>');">

    <!-- Top Navigation -->
    <?php $this->load->view('templates/inc/front/top_navigation.html'); ?>
      <div class="nav-overlay">
        
        <!-- Desktop Main Navigation -->
        <?php $this->load->view('templates/inc/front/desktop_navigation.html'); ?>
>>>>>>> Moikzz

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
          <h1>CONTACT US</h1>
          <div class="b-pageHeader__search">
              <h3>Get In Touch With Us Now</h3>
          </div>
        </div>
      </section><!--b-pageHeader-->

      <div class="b-breadCumbs s-shadow">
        <div class="container">
          <a href="home.html" class="b-breadCumbs__page">Home</a><span class="fa fa-angle-right"></span><a href="<?=base_url('contact')?>" class="b-breadCumbs__page m-active">Contact Us</a>
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
<<<<<<< HEAD

    <?=$contents?>

    <div class="b-features">
      <div class="container">
        <div class="row">
          <div class="col-md-9 col-md-offset-3 col-xs-6 col-xs-offset-6">
            <ul class="b-features__items">
              <li class="wow fadeIn" data-wow-delay="0.5s" data-wow-offset="100">Low Prices, No Haggling</li>
              <li class="wow fadeIn" data-wow-delay="0.5s" data-wow-offset="100">Largest Car Dealership</li>
              <li class="wow fadeIn" data-wow-delay="0.5s" data-wow-offset="100">Multipoint Safety Check</li>
            </ul>
          </div>
        </div>
      </div>
    </div><!--b-features-->

    <div class="b-info">
      <div class="container">
        <div class="row">
          <div class="col-md-3 col-xs-6">
            <aside class="b-info__aside">
              <article class="b-info__aside-article">
                <h3>OPENING HOURS</h3>
                <div class="b-info__aside-article-item">
                  <h6>Sales Department</h6>
                  <p>Mon-Sat : 8:00am - 5:00pm<br />
                    Sunday is closed</p>
                </div>
                <div class="b-info__aside-article-item">
                  <h6>Service Department</h6>
                  <p>Mon-Sat : 8:00am - 5:00pm<br />
                    Sunday is closed</p>
                </div>
              </article>
              <article class="b-info__aside-article">
                <h3>About us</h3>
                <p>Vestibulum varius od lio eget conseq
                  uat blandit, lorem auglue comm lodo 
                  nisl non ultricies lectus nibh mas lsa 
                  Duis scelerisque aliquet. Ante donec
                  libero pede porttitor dacu msan esct
                  venenatis quis.</p>
              </article>
              <a href="<?=site_url('about')?>" class="btn m-btn">Read More<span class="fa fa-angle-right"></span></a>
            </aside>
          </div>
          <div class="col-md-3 col-xs-6">
						<div class="b-info__latest">
							<h3>Available Trucks</h3>
							<div class="b-info__latest-article">
								<div class="b-info__latest-article-photo m-audi"></div>
								<div class="b-info__latest-article-info">
									<h6><a href="detail.html">Truck 1</a></h6>
									<p><span class="fa fa-tachometer"></span> 35,000 KM</p>
								</div>
							</div>
							<div class="b-info__latest-article">
								<div class="b-info__latest-article-photo m-audiSpyder"></div>
								<div class="b-info__latest-article-info">
									<h6><a href="#">Truck 2</a></h6>
									<p><span class="fa fa-tachometer"></span> 35,000 KM</p>
								</div>
							</div>
							<div class="b-info__latest-article">
								<div class="b-info__latest-article-photo m-aston"></div>
								<div class="b-info__latest-article-info">
									<h6><a href="#">Truck 3</a></h6>
									<p><span class="fa fa-tachometer"></span> 35,000 KM</p>
								</div>
							</div>
						</div>
          </div>
          <div class="col-md-3 col-xs-6">
            <div class="b-info__latest">
              <h3>PAGES</h3>  
                <ul class="list-unstyled">
                  <li class="footer-list__item"><a href="<?=site_url()?>">Home</a></li>
                  <li class="footer-list__item"><a href="404.html">How it works</a></li>
                  <li class="footer-list__item"><a href="<?=site_url('about')?>">About</a></li>
                  <li class="footer-list__item"><a href="<?=base_url('contact')?>">Contact us</a></li>
                </ul> 
            </div>
          </div>
         
          <div class="col-md-3 col-xs-6">
            <address class="b-info__contacts">
              <p>contact us</p>
              <div class="b-info__contacts-item">
                <span class="fa fa-map-marker"></span>
                <em>Street N405, Gate 4 JAFZA jebel ali, Dubai
                  P.O Box 17146</em>
              </div>
              <div class="b-info__contacts-item">
                <span class="fa fa-phone"></span>
                <em>Phone:  +971 4 821 5099</em>
              </div>
               
              <div class="b-info__contacts-item">
                <span class="fa fa-envelope"></span>
                <em><a href="#">Email:  info@gallega.com</a></em>
              </div>
            </address>
            <address class="b-info__map">
              <a href="contacts.html">Open Location Map</a>
            </address>
          </div>
        </div>
      </div>
    </div><!--b-info-->

    <footer class="b-footer">
      <a id="to-top" href="#this-is-top"><i class="fa fa-chevron-up"></i></a>
      <div class="container">
        <div class="row">
          <div class="col-xs-12 col-md-4">
            <!-- wow fadeInLeft" data-wow-delay="0.3s -->
            <div class="b-footer__company">
              <div class="b-nav__logo">
                <a href="<?=base_url()?>">
                  <img alt="Gallega Global Logistics" src="<?=file_common_dir('images/a-member-of-gag.svg')?>" width="61%">
                </a>
              </div>
            </div>
          </div>
          <div class="col-xs-12 col-md-8">
            <div class="b-footer__content">
              <div class="gal-social-icons text-right">  
                <a href="#"><span class="gi-facebook font-grey"></span></a>
                <a href="#"><span class="gi-twitter font-grey"></span></a>
                <a href="#"><span class="gi-instagram font-grey"></span></a>
                <a href="#"><span class="gi-linkedin font-grey"></span></a>
                <a href="#"><span class="gi-youtube font-grey"></span></a>
              </div>
              <nav class="b-footer__content-nav">
                <ul>
                  <li><a href="home.html">Terms &amp; Condition</a></li>
                  <li><a href="404.html">Privacy Policy</a></li>
                  <li><a href="listings.html">FAQ</a></li> 
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </footer><!--b-footer-->
    <!--Main-->   
    <script src="<?=file_common_dir('front/js/jquery-1.11.3.min.js')?>"></script>

    <script src="<?=file_common_dir('front/js/gag-custom.js?v=1.0.1')?>"></script>

    <script src="<?=file_common_dir('front/js/jquery-ui.min.js')?>"></script>
    <script src="<?=file_common_dir('front/js/bootstrap.min.js')?>"></script>
    <script src="<?=file_common_dir('front/js/modernizr.custom.js')?>"></script>
 
    <script src="<?=file_common_dir('front/js/waypoints.min.js')?>"></script>
    <script src="<?=file_common_dir('front/js/jquery.easypiechart.min.js')?>"></script>
    <script src="<?=file_common_dir('front/js/classie.js')?>"></script>

    <!--Owl Carousel-->
    <script src="<?=file_common_dir('front/plugins/owl-carousel/owl.carousel.min.js')?>"></script>
    <!--bxSlider-->
    <script src="<?=file_common_dir('front/plugins/bxslider/jquery.bxslider.js')?>"></script>
    <!-- jQuery UI Slider -->
    <script src="<?=file_common_dir('front/plugins/slider/jquery.ui-slider.js')?>"></script>

     <script src="<?=file_common_dir('back/plugins/select2/dist/js/select2.full.min.js')?>" type="text/javascript"></script>
    <!--Theme-->
    <script src="<?=file_common_dir('front/js/jquery.smooth-scroll.js')?>"></script>
    <script src="<?=file_common_dir('front/js/wow.min.js')?>"></script>
    <script src="<?=file_common_dir('front/js/jquery.placeholder.min.js')?>"></script>
    <script src="<?=file_common_dir('front/js/theme.js')?>"></script>

    <script src="//cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>
    <script type="text/javascript">
    jQuery(document).ready(function($) { 
      $(".rx-country").select2();

      // && window.pageYOffset >= 500
      $(window).scroll(function() {    
        var scroll = $(window).scrollTop();
        if (scroll >= 400) {
          $("body").addClass("fixedheader");
        }else{
          $("body").removeClass("fixedheader");  
        }
     
      }); //missing );

      /* GSAP */
      var navSpeed = 0.2;
      var colorDelayIn = navSpeed/2;
      var colorDelayOut = 0;
      var lineColor = "linear-gradient(to right, rgb(116, 116, 191), rgb(52, 138, 199))";
      var lineColorOpen = "linear-gradient(to right, rgb(255, 255, 255), rgb(255, 255, 255))";


      var line1 = $('.line1');
      var line2 = $('.line2');
      var line3= $('.line3');
      var line123 = $('.line1, .line2, .line3');
      var mobileNav = $('.mobileNav');


      $('.mobileButton').click(function(){
      if($(this).hasClass('X')){
        $(this).removeClass('X');
        closeTheMobileNav();
      }
      else{
        $(this).addClass('X');
        openTheMobileNav();
      }
      });


      function openTheMobileNav(){
        TweenMax.killTweensOf(line123);
        TweenMax.to(line1, navSpeed, {css:{transform:"translateY(0)"}, ease:Back.easeIn});
        TweenMax.to(line3, navSpeed, {css:{transform:"translateY(0px)"},ease:Back.easeIn});
        TweenMax.to(line2, navSpeed, {opacity:0, ease:Back.easeIn});
        TweenMax.to(line1, navSpeed, {rotation:"+45deg", delay: navSpeed, ease: Back.easeOut});
        TweenMax.to(line3, navSpeed, {rotation:"-45deg", delay: navSpeed, ease: Back.easeOut});
        TweenMax.to(line123, navSpeed, {className:"+=open", ease:Back.easeIn, delay: colorDelayIn});

        // YOUR MOBILE NAVIGATION
        TweenLite.to(mobileNav, navSpeed, {className:"+=open", ease:Quad.easeOut});
      }

      function closeTheMobileNav(){
        TweenMax.killTweensOf(line123);
        TweenMax.to(line1, navSpeed, {rotation:"0deg", ease: Power1.easeOut});
        TweenMax.to(line3, navSpeed, {rotation:"0deg", ease: Power1.easeOut});
        TweenMax.to(line2, navSpeed, {opacity:1, ease:Back.easeIn});
        TweenMax.to(line1, navSpeed, {css:{transform:"translateY(-8px)"}, delay: navSpeed, ease:Back.easeOut});
        TweenMax.to(line3, navSpeed, {css:{transform:"translateY(8px)"}, delay: navSpeed,ease:Back.easeOut});
        TweenMax.to(line123, navSpeed, {className:"-=open", ease:Back.easeIn, delay: colorDelayIn});

        // YOUR MOBILE NAVIGATION
        TweenLite.to(mobileNav, navSpeed, {className:"-=open", ease:Quad.easeIn});
      }
      /* GSAP */

    });
    </script>
=======
      
    <!-- Contents -->
    <?=$contents?>
    
    <!-- footer -->
    <?php $this->load->view('templates/inc/front/footer.html'); ?>
    
    <!--JavaScript-->   
    <?php $this->load->view('templates/js/front/default.html'); ?>
    <?php $this->load->view('templates/js/front/js.html'); ?>
    <?php $this->load->view('templates/js/front/default2.html'); ?> 
   
>>>>>>> Moikzz
  </body>
</html>