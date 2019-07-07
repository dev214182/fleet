    <!-- <section class="b-pageHeader">
        <div class="container">
            <h1 class=" wow zoomInLeft uppercase" data-wow-delay="0.5s">TRUCKS LISTINGS</h1>
            <div class="b-pageHeader__search wow zoomInRight" data-wow-delay="0.5s">
                <h3>Your search returned 28 results</h3>
            </div>
        </div>
    </section>
    <div class="b-breadCumbs s-shadow">
        <div class="container wow zoomInUp" data-wow-delay="0.5s">
            <a href="<?=base_url()?>" class="b-breadCumbs__page">Home</a><span class="fa fa-angle-right"></span><span class="b-breadCumbs__page m-active">Search Results</span>
        </div>
    </div> -->
      
    <div class="b-infoBar">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-xs-12">
                    <div class="b-infoBar__select wow zoomInUp" data-wow-delay="0.5s">
                        <form method="post" action="/">
                            
                            <div class="b-infoBar__select-one">
                                <span class="b-infoBar__select-one-title">SHOW</span>
                                <select name="select1" class="m-select">
                                    <option value="10" selected="">10 items</option>
                                    <option value="20" >20 items</option>
                                    <option value="50" >50 items</option>
                                    <option value="100" >100 items</option>
                                </select>
                                <span class="fa fa-caret-down"></span>
                            </div>
                            <div class="b-infoBar__select-one">
                                <span class="b-infoBar__select-one-title">SORT BY</span>
                                <select name="select2" class="m-select">
                                    <option value="" selected="latest">Latest</option>
                                    <option value="price-low">Low Price</option>
                                    <option value="price-high" >High Price</option>
                                </select>
                                <span class="fa fa-caret-down"></span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!--b-infoBar-->
    
    <div class="b-items">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-4 col-xs-12">
                    <aside class="b-items__aside">
                        <h2 class="s-title wow zoomInUp" data-wow-delay="0.5s">REFINE YOUR SEARCH</h2>
                        <div class="b-items__aside-main wow zoomInUp" data-wow-delay="0.5s">
                            
                                <div class="b-items__aside-main-body">
                                    <div class="b-items__aside-main-body-item">
                                           <input type="radio" checked value="truck"> Truck
                                    </div>
                                    <div class="b-items__aside-main-body-item">
                                        <label>Departure Date</label>
                                        <div>
                                            <input type="date" class="form-control">
                                        </div>
                                    </div>
                                     
                                    <div class="b-items__aside-main-body-item">
                                        <label>FROM (origin)</label>
                                        <div>
                                            <select name="select1" class="m-select select2  rx-country form-control">
                                                <option value="" selected=""> - From -</option>
                                            </select>
                                            
                                        </div>
                                    </div>
                                    <div class="b-items__aside-main-body-item">
                                        <label>TO (destination)</label>
                                        <div>
                                            <select name="select1" class="m-select select2  rx-country">
                                                <option value="" selected="">- To -</option>
                                            </select>
                                             
                                        </div>
                                    </div>
                                    <div class="b-items__aside-main-body-item">
                                        <label>Truck TYPE</label>
                                        <div> <input type="checkbox" class=""> Truck 1</div>
                                        <div> <input type="checkbox" class=""> Truck 2</div>
                                        <div> <input type="checkbox" class=""> Truck 3</div>
                                    </div>
                                    <div class="b-items__aside-main-body-item">
                                         <label>Load</label>
                                         <div>
                                        <input type="text" class="form-control" placeholder="how car to load?">
                                        </div>
                                    </div>
                                </div>
                                <footer class="b-items__aside-main-footer">
                                    <button type="submit" class="btn m-btn">FILTER SEARCH<span class="fa fa-angle-right"></span></button><br />
                                    <a href="">RESET ALL FILTERS</a>
                                </footer>
                        </div>
                        <div class="b-items__aside-sell wow zoomInUp" data-wow-delay="0.5s">
                            <div class="b-items__aside-sell-img">
                                <h3>SELL YOUR CAR</h3>
                            </div>
                            <div class="b-items__aside-sell-info">
                                <p>
                                    Nam tellus enimds eleifend dignis lsim
                                    biben edum tristique sed metus fusce
                                    Maecenas lobortis.
                                </p>
                                <a href="submit1.html" class="btn m-btn">REGISTER NOW<span class="fa fa-angle-right"></span></a>
                            </div>
                        </div>
                    </aside>
                </div>
                <div class="col-lg-9 col-sm-8 col-xs-12">
                    <div class="b-items__cars">
                        <div class="b-items__cars-one wow zoomInUp" data-wow-delay="0.5s">
                            <div class="b-items__cars-one-img">
                                <img src="<?=file_common_dir('front/media/237x202/toyota.jpg')?>" alt='toyota'/>
                                <span class="b-items__cars-one-img-type m-premium">PREMIUM</span>
                                <form class="b-items__cars-one-info-header   m-t-10 m-r-10">
                                    <span class="item-hidden_val hidden" data-val="1" style="display: none!important;" hidden></span>
                                    <small class="b-items__cars-one-info-title"><a href="#" class="pull-left listing-details">VIEW DETAILS </a></small>
                                <input type="checkbox" class="add-cart" name="add-item[]" id='check3' />
                                    <label for="check3" class="b-items__cars-one-img-check"><span class="fa fa-check"></span></label>
                                </form>
                            </div>
                            <div class="b-items__cars-one-info">
                                <form class="b-items__cars-one-info-header s-lineDownLeft ">
                                    <h2>Toyota RAV4 Limited V6</h2> 
                                </form>
                                <div class="row s-noRightMargin">
                                    <div class="col-md-9 col-xs-12"> 
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
                                    <div class="col-md-3 col-xs-12">
                                        <div class="b-items__cars-one-info-price">
                                            <div class="pull-right">
                                                <h3>Price: AED</h3>
                                                <h4> 29,415</h4>
                                            </div> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row m-l-10 border-top m-t-10 additional-notes">
                                    <div class="col-md-12 col-xs-12"> 
                                            <div class="row m-smallPadding p-t-10">
                                                    <div class="col-md-6 col-xs-12">
                                                            <div class="row">
                                                                <div class="col-xs-12">
                                                                    <h4 class="text-title">Additional Notes</h4>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xs-12">
                                                                    <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sapien libero, efficitur interdum feugiat ut, lacinia sed quam. Ut et sapien vitae urna hendrerit mollis ut eu neque. Ut volutpat lacinia massa, in tempus massa fermentum in.</p>
                                                                </div>
                                                            </div>
                                                    </div>
                                                    <div class="col-md-6 col-xs-12 p-r-40">
                                                            <div class="row">
                                                                <div class="col-xs-12 text-right">
                                                                     <span class="b-items__cars-one-info-title">Email:  Login to view </span>
                                                                     <span class="b-items__cars-one-info-title">Contact: Login to view </span>
                                                                </div> 
                                                            </div> 

                                                            <div class="row"> 
                                                                <div class="col-xs-12 text-right">
                                                                    <input type="button" class="btn btn-primary" value="Send Enquiry">
                                                                </div>
                                                            </div> 
                                                    </div>
                                                </div>
                                    </div>
                                </div>
                        </div>
                        <div class="b-items__cars-one wow zoomInUp" data-wow-delay="0.5s">
                            <div class="b-items__cars-one-img">
                                <img src="<?=file_common_dir('front/media/237x202/toyota.jpg')?>" alt='toyota'/>
                                <span class="b-items__cars-one-img-type m-premium">PREMIUM</span>
                                <form class="b-items__cars-one-info-header   m-t-10 m-r-10">
                                    <span class="item-hidden_val hidden" data-val="3" style="display: none!important;" hidden></span>
                                    <small class="b-items__cars-one-info-title"><a href="#" class="pull-left listing-details">VIEW DETAILS </a></small>
                                <input type="checkbox" class="add-cart" name="add-item[]" id='check1' />
                                    <label for="check1" class="b-items__cars-one-img-check"><span class="fa fa-check"></span></label>
                                </form>
                            </div>
                            <div class="b-items__cars-one-info">
                                <form class="b-items__cars-one-info-header s-lineDownLeft ">
                                    <h2>Toyota RAV4 Limited V6</h2> 
                                </form>
                                <div class="row s-noRightMargin">
                                    <div class="col-md-9 col-xs-12"> 
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
                                    <div class="col-md-3 col-xs-12">
                                        <div class="b-items__cars-one-info-price">
                                            <div class="pull-right">
                                                <h3>Price: AED</h3>
                                                <h4> 29,415</h4>
                                            </div> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row m-l-10 border-top m-t-10 additional-notes">
                                    <div class="col-md-12 col-xs-12"> 
                                            <div class="row m-smallPadding p-t-10">
                                                    <div class="col-md-6 col-xs-12">
                                                            <div class="row">
                                                                <div class="col-xs-12">
                                                                    <h4 class="text-title">Additional Notes</h4>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xs-12">
                                                                    <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sapien libero, efficitur interdum feugiat ut, lacinia sed quam. Ut et sapien vitae urna hendrerit mollis ut eu neque. Ut volutpat lacinia massa, in tempus massa fermentum in.</p>
                                                                </div>
                                                            </div>
                                                    </div>
                                                    <div class="col-md-6 col-xs-12 p-r-40">
                                                            <div class="row">
                                                                <div class="col-xs-12 text-right">
                                                                     <span class="b-items__cars-one-info-title">Email:  Login to view </span>
                                                                     <span class="b-items__cars-one-info-title">Contact: Login to view </span>
                                                                </div> 
                                                            </div> 

                                                            <div class="row"> 
                                                                <div class="col-xs-12 text-right">
                                                                    <input type="button" class="btn btn-primary" value="Send Enquiry">
                                                                </div>
                                                            </div> 
                                                    </div>
                                                </div>
                                    </div>
                                </div>
                        </div>
                         
                        <div class="b-items__cars-one wow zoomInUp" data-wow-delay="0.5s">
                            <div class="b-items__cars-one-img">
                                <img src="<?=file_common_dir('front/media/237x202/toyota.jpg')?>" alt='toyota'/>
                                <span class="b-items__cars-one-img-type m-premium">PREMIUM</span>
                                <form class="b-items__cars-one-info-header m-t-10 m-r-10">
                                    <span class="item-hidden_val hidden" data-val="5" style="display: none!important;" hidden></span>
                                    <small class="b-items__cars-one-info-title"><a href="#" class="pull-left">VIEW DETAILS </a></small>
                                    <input type="checkbox" class="add-cart" name="add-item[]" id='check7'/>
                                    <label for="check7" class="b-items__cars-one-img-check"><span class="fa fa-check"></span> </label>
                                </form>
                            </div>
                            <div class="b-items__cars-one-info">
                                <form class="b-items__cars-one-info-header s-lineDownLeft ">
                                    <h2>Toyota RAV4 Limited V6</h2> 
                                </form>
                                <div class="row s-noRightMargin">
                                    <div class="col-md-9 col-xs-12"> 
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
                                    <div class="col-md-3 col-xs-12">
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
                    </div>
                    
                </div>
            </div>
        </div>
    </div><!--b-items-->
    