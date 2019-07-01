<section class="b-pageHeader">
    <div class="container">
        <h1 class=" wow zoomInLeft uppercase" data-wow-delay="0.5s">CART</h1>
        <div class="b-pageHeader__search wow zoomInRight" data-wow-delay="0.5s">
            <h3>Your have 3 items on cart</h3>
        </div>
    </div>
</section><!--b-pageHeader-->
    
<div class="b-breadCumbs s-shadow">
    <div class="container " data-wow-delay="0.5s">
        <a href="<?=base_url()?>" class="b-breadCumbs__page">Home</a><span class="fa fa-angle-right"></span><span class="b-breadCumbs__page m-active">Cart</span>
    </div>
</div><!--b-breadCumbs-->
      
<div class="b-items">
    <div class="cart-wrapper container">
        <div class="row"> 
            <div class="col-lg-12 col-sm-12 col-xs-12">
                <div class="b-items__cars">
                    
                    <?php for($x=0; $x < 4; $x++){ ?>
                    <div class="b-items__cars-one " data-wow-delay="0.5s">
                        <div class="b-items__cars-one-img">
                            <img src="<?=file_common_dir('front/media/237x202/toyota.jpg')?>" alt='toyota' height="150"/>
                            <span class="b-items__cars-one-img-type m-premium">PREMIUM</span> 
                        </div>
                        <div class="b-items__cars-one-info">
                            <span class="pull-right">
                                 <i class="fa fa-close remove-item" data-val="<?=$x?>"></i>
                            </span>
                            <form class="b-items__cars-one-info-header  ">
                                <h2><?=$x?> Toyota RAV4 Limited V6</h2> 
                            </form>
                            <div class="row s-noRightMargin">
                                <div class="col-md-8 col-xs-12"> 
                                    <div class="m-width row m-smallPadding">
                                        <div class="col-xs-12">
                                            <div class="row m-smallPadding">
                                                <div class="col-xs-4">
                                                    <span class="b-items__cars-one-info-title">Travel:</span>
                                                    <span class="b-items__cars-one-info-title">Dates:</span>
                                                    <span class="b-items__cars-one-info-title">Loads:</span>
                                                </div>
                                                <div class="col-xs-8">
                                                    <span class="b-items__cars-one-info-value">Dubai <i class="fa fa-arrow-right"></i> Abu Dhabi</span>
                                                    <span class="b-items__cars-one-info-value">1/24/2019 <i class="fa fa-arrow-right"></i> 2/2/2019</span>
                                                    <span class="b-items__cars-one-info-value">3 cars</span>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="col-md-4 col-xs-12">
                                    <div class="b-items__cars-one-info-price">
                                        <div class="pull-right">
                                            <h3>Price: AED</h3>
                                            <h4> 29,415</h4>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                    <?php } ?>
                    
                </div>
                
            </div>
        </div>

        <div class="row">
             <div class="col-lg-12 col-sm-12 col-xs-12">
                     <div class="b-items__cars-one " data-wow-delay="0.5s">
                        
                        <div class="p-a-20">
                            
                            <div class="b-items__cars-one-info-header border-bottom flex">
                                <h2> ACCOUNT DETAILS</h2> 
                            </div>
                            <div class="row">
                                <div class="col-md-8 col-xs-12"> 
                                <form id="contactForm" novalidate="" class="s-form wow zoomInUp" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomInUp;">
                                    <div class="form-group">
                                      
                                        <input type="text" placeholder="NAME" value="" name="user-name" id="name">
                                    </div>
                                    <div class="form-group">
                                       
                                        <input type="text" placeholder="EMAIL ADDRESS" value="" name="user-email" id="user-email">
                                    </div>
                                     <div class="form-group"> 
                                        <input type="text" placeholder="PHONE NO." value="" name="user-phone" id="user-phone">  
                                    </div>
                                    
                                </form>

                                <small>Already have account? Click <a href="#"> here</a></small>
                                </div>
                                
                            </div>
                        </div> 
                    </div>
             </div> 
        </div>
        <div class="row">
            <div class="col-lg-12 col-sm-12 col-xs-12">
                <label>
                <input type="checkbox"> Urgent?
                </label>
                <input type="button" class="btn btn-primary" value="Send Enquiry">
            </div> 
        </div>
    </div>
</div><!--b-items-->