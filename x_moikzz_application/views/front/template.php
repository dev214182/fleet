<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Gallega Global Logistics</title>

    <link rel="shortcut icon" type="image/x-icon" href="<?=file_common_dir('images/icon-gallega.png')?>" /> 
    <link href="<?=file_common_dir('front/css/master.css')?>" rel="stylesheet"> 
    <link href="<?=file_common_dir('front/css/compare.css')?>" rel="stylesheet" type="text/css" media="all" />
    <link href="<?=file_common_dir('back/plugins/select2/dist/css/select2.min.css');?>" rel="stylesheet"  type="text/css" data="overide"/>
    <!--[if lt IE 9]>
    <script src="//oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="//oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script> var base_url = '<?=base_url()?>';</script>
  </head>
  <body class="<?=$bodyClass?>" data-scrolling-animations="true" data-equal-height=".b-auto__main-item"> 
    <!-- Loader -->
    <div id="page-preloader"><span class="spinner"></span></div>
    <!-- Loader end -->

    <!-- Main Navigation -->
    <div class="mainNav">
      <!-- <div class="header" style="position:absolute;top:0;z-index:99999;"> -->
      <header class="b-topBar wow" data-wow-delay="0.7s"> <!-- slideInDown -->
        <div class="container">
          <div class="row">
            <div class="col-md-2 col-xs-6">
              <div class="b-topBar__addr"> 
                  <a href="#"><span class="fa fa-facebook-square"></span></a>
                  <a href="#"><span class="fa fa-twitter-square"></span></a> 
                  <a href="#"><span class="fa fa-youtube-square"></span></a> 
              </div>
            </div>
            <div class="col-md-4 col-xs-6">  
              <div class="b-topBar__tel">
                <span class="fa fa-envelope"></span>
                  <em>Email:  info@gallega.com</em> 
                <span class="pull-right p-r-20">+971 48 215 099</span>
              </div>
            </div>

            <div class="col-md-4 col-xs-6"> 
              <nav class="b-topBar__nav">
                <ul style="color:#FFFFFF;"> 
                  <li><a href="#">Register</a></li>
                  <li><a href="<?=site_url('login')?>">Login</a></li>
                  <li><a href="<?=site_url('search')?>">Search</a></li>
                </ul>
              </nav>
            </div>
            <div class="col-md-2 col-xs-6">
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
      <!-- style="padding: 15px 0;" -->
      <nav class="b-nav" >
        <div class="container">
          <div class="row">
            <div class="col-sm-3 col-xs-4">
              <div class="b-nav__logo wow" data-wow-delay="0.3s"> <!-- slideInLeft --> 
                <a href="<?=base_url()?>">
                  <img src="<?=file_common_dir('images/gallega-logo2.png')?>" width="61%">
                </a>
              </div>
            </div>
            <div class="col-sm-9 col-xs-8">
              <div class="b-nav__list wow" data-wow-delay="0.3s"> <!-- slideInRight -->
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#nav">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                </div>
                <div class="collapse navbar-collapse navbar-main-slide" id="nav">
                  <ul class="navbar-nav-menu">
                    <li><a href="<?=base_url()?>">Home</a></li> 
                    <li><a href="<?=base_url()?>#how-works">How it works</a></li> 
                    <li><a href="<?=base_url('about')?>">About</a></li>
                    <li><a href="<?=base_url('contact')?>">Contact Us</a></li> 
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </nav><!--b-nav-->
      <!-- </div> -->
      <!-- .header -->
    </div>
    <!-- .main-navigation -->

    <!-- Mobile Navigation -->
    <a href="#" class="mobileButton">
      <span class="line line1"></span>
      <span class="line line2"></span>
      <span class="line line3"></span>
    </a>
    <!-- MOBILE Menu -->
    <div class="mobileNav">
      <ul>
        <li><a href="#">Home</a></li>
        <li><a href="#">How It Works</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Contact Us</a></li>
      </ul>
    </div>

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
                <em>Email:  info@gallega.com</em>
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
          <div class="col-xs-4">
            <!-- wow fadeInLeft" data-wow-delay="0.3s -->
            <div class="b-footer__company">
              <div class="b-nav__logo">
                <a href="<?=base_url()?>">
                  <img alt="Gallega Global Logistics" src="<?=file_common_dir('images/a-member-of-gag.svg')?>" width="61%">
                </a>
              </div>
            </div>
          </div>
          <div class="col-xs-8">
            <!-- wow fadeInRight" data-wow-delay="0.3s -->
            <div class="b-footer__content">
              <div class="b-footer__content-social">
                <a href="#"><span class="fa fa-facebook-square"></span></a>
                <a href="#"><span class="fa fa-twitter-squZare"></span></a>
                <a href="#"><span class="fa fa-google-plus-square"></span></a>
                <a href="#"><span class="fa fa-instagram"></span></a>
                <a href="#"><span class="fa fa-youtube-square"></span></a>
                <a href="#"><span class="fa fa-skype"></span></a>
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

    });
    </script>
  </body>
</html>