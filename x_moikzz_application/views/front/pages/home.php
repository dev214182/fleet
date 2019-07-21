    <section class="b-search">
      <div class="container">
     
        <form method="POST"  class="needs-validation b-search__main" id="form-search" novalidate="" autocomplete="off">
          <div class="b-search__main-title wow zoomInUp" data-wow-delay="0.3s">
            <h2>LOOKING FOR A TRUCK? FIND IT HERE</h2>
          </div>
          <div class="b-search__main-type wow zoomInUp" data-wow-delay="0.3s">
            <div class="col-xs-12 col-md-2 s-noLeftPadding">
              <h4>Select truck type</h4>
            </div>
            <div class="col-xs-12 col-md-10">
              <div class="row">
                <div class="col-xs-2">
                  <input id="radio_1" type="radio" value="1" name="truck_type" />
                  <label for="radio_1" class="b-search__main-type-svg">
                  <?php  $this->load->view('front/carrier.svg')?> 
                  </label>
                  <h5><label for="radio_1">CAR CARRIER</label></h5>
                </div>
                <div class="col-xs-2">
                  <input id="radio_2" type="radio" value="2" name="truck_type" />
                  <label for="radio_2" class="b-search__main-type-svg">
                      <?php  $this->load->view('front/recovery.svg')?>

                  </label>
                  <h5><label for="radio_2">RECOVERY VEHICLE</label></h5>
                </div>
                <div class="col-xs-2">
                  <input id="radio_3" type="radio" value="3" name="truck_type" />
                  <label for="radio_3" class="b-search__main-type-svg">
                  <?php  $this->load->view('front/pickup.svg')?>
                  </label>
                  <h5><label for="radio_3">3-TON PICKUP</label></h5>
                </div>
                <div class="col-xs-2">
                  <input id="radio_4" type="radio" value="4" name="truck_type" />
                  <label for="radio_4" class="b-search__main-type-svg">
                  <?php  $this->load->view('front/container.svg')?>

                  </label>
                  <h5><label for="radio_4">CONTAINER TRAILER</label></h5>
                </div> 
              </div>
            </div>
          </div>
          <div class="b-search__main-form wow zoomInUp" data-wow-delay="0.3s">
            <div class="row">
              <div class="col-xs-12 col-md-12">
                <div class="m-firstSelects">
                  <div class="col-xs-1">
                    <label>Travel</label>
                  </div>
                  <div class="col-xs-4 col-lg-3">
                    <select name="select1" id="input_origin_place" class="rx-country search-from">
                      <option value="" selected="">From</option>
                    </select>
                    
                    <p>Origin?</p>
                  </div>
                  <div class="col-xs-4 col-lg-3">
                     <select name="select2" id="input_destination_place" class="rx-country search-to">
                      <option value="" selected="">To</option>
                    </select>
                    
                    <p>Destination?</p>
                  </div>

                   <div class="col-xs-1"> <label>&nbsp;</label></div>

                  <div class="col-xs-4 col-lg-2">
                    <input type="date" class="form-control search-date" name="search-date" value="">  
                    <p>Date of departure?</p>
                  </div>
                  <div class="col-xs-4 col-lg-2">
                    <input type="date" class="form-control">
                   
                    <p>Date of Arrival?</p>
                  </div>
                </div>
                
              </div>
              <div class="col-md-12 col-xs-12">
                <div class="m-secondSelects">
                  <div class="col-xs-1">
                    <label>LOAD</label>
                  </div>

                  <div class="col-xs-4">
                    <input type="text" placeholder="Loads" name="search-load" class="form-control">
                    <p>Car loads?</p>
                  </div>
                  
                  
                </div>
                <div class="b-search__main-form-submit">
                  
                  <button type="submit" class="btn m-btn">Search trucks<span class="fa fa-angle-right"></span></button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </section>
    <!--b-search-->



  <section class="b-featured" id="how-works">
        <div class="container">
          <div class="row">
            <div class="col-xs-12">
              <h2 class="ui-title-block"><span class="ui-title-emphasis">why choose us</span>the main features</h2>
              <div class="decor-1"><i class="icon fa fa-truck "></i></div>
              <div class="ui-subtitle-block ui-subtitle-block_mod-a">Lorem ipsum dolor sit amet diial consectetur adipisicing elit sed eiusmod tempor incididunt ut labore et dolore magna cadso aliqua</div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-5 col-sm-7">
              <ul class="list-features list-features_mod-b list-unstyled">
                <li class="list-features__item">
                  <i class="list-features__icon fa fa-envelope"></i>
                  <div class="list-features__inner">
                    <h3 class="list-features__title ui-title-inner">100% satisfied customers</h3>
                    <div class="list-features__description">Lorem ipsum dolor sit amet elit eiusmod tempor incididunt ut labore dolore magna aliqua</div>
                  </div>
                </li>
                <li class="list-features__item">
                  <i class="list-features__icon fa fa-comments"></i>
                  <div class="list-features__inner">
                    <h3 class="list-features__title ui-title-inner">quality service affordable price</h3>
                    <div class="list-features__description">Aorem ipsum dolor sit amet elit eiusmod tempor incididunt ut labore dolore magna aliqua</div>
                  </div>
                </li>
                <li class="list-features__item">
                  <i class="list-features__icon fa fa-globe"></i>
                  <div class="list-features__inner">
                    <h3 class="list-features__title ui-title-inner">worldwide locations</h3>
                    <div class="list-features__description">Dorem ipsum dolor sit amet elit eiusmod tempor incididunt ut labore dolore magna aliqua</div>
                  </div>
                </li>
                <li class="list-features__item">
                  <i class="list-features__icon fa fa-paper-plane"></i>
                  <div class="list-features__inner">
                    <h3 class="list-features__title ui-title-inner">modern vehicles fleet</h3>
                    <div class="list-features__description">Morem ipsum dolor sit amet elit eiusmod tempor incididunt ut labore dolore magna aliqua</div>
                  </div>
                </li>
              </ul>
            </div>
            <div class="col-md-7 col-sm-5">
              <img class="img-responsive" src="<?=file_common_dir('images/bg/bg-2.jpg')?>" alt="Foto">
            </div>
          </div>
        </div>
      </section>

    <section class="b-welcome"> 
      <div class="container">
        <div class="row">
          <div class="col-md-5 col-md-offset-2 col-sm-6 col-xs-12">
            <div class="b-welcome__text wow fadeInLeft" data-wow-delay="0.3s" data-wow-offset="100">
              <h2>WORLD'S LEADING CAR DEALER</h2>
              <h3>WELCOME TO GALLEGA GLOBAL LOGISTICS</h3>
              <p>Curabitur libero. Donec facilisis velit eudsl est. Phasellus consequat. Aenean vita quam. Vivamus et nunc. Nunc consequat sem velde metus imperdiet lacinia. Dui estter neque molestie necd dignissim ac hendrerit quis purus. Etiam sit amet vec convallis massa scelerisque mattis. Sed placerat leo nec.</p>
              <p>Ipsum midne ultrices magn eu tempor quam dolor eustrl sem. Donec quis dolel Donec pede quam placerat alterl tristique faucibus posuere lobortis.</p>
              <ul>
                <li><span class="fa fa-check"></span>Donec facilisis velit eu est phasellus consequat </li>
                <li><span class="fa fa-check"></span>Aenean vitae quam. Vivamus et nunc nunc consequat</li>
                <li><span class="fa fa-check"></span>Sem vel metus imperdiet lacinia enean </li>
                <li><span class="fa fa-check"></span>Dapibus aliquam augue fusce eleifend quisque tels</li>
              </ul>
            </div>
          </div>
          <div class="col-md-5 col-sm-6 col-xs-12">
            <div class="b-welcome__services wow fadeInRight" data-wow-delay="0.3s" data-wow-offset="100">
              <div class="row">
                <div class="col-xs-6 m-padding">
                  <div class="b-welcome__services-auto">
                    <div class="b-welcome__services-img m-auto">
                      <span class="fa fa-cab"></span>
                    </div>
                    <h3>AUTO LOANS</h3>
                  </div>
                </div>
                <div class="col-xs-6 m-padding">
                  <div class="b-welcome__services-trade">
                    <div class="b-welcome__services-img m-trade">
                      <span class="fa fa-male"></span>
                    </div>
                    <h3>Trade-Ins</h3>
                  </div>
                </div>
                <div class="col-xs-12 text-center">
                  <span class="b-welcome__services-circle"></span>
                </div>
                <div class="col-xs-6 m-padding">
                  <div class="b-welcome__services-buying">
                    <div class="b-welcome__services-img m-buying">
                      <span class="fa fa-book"></span>
                    </div>
                    <h3>Buying guide</h3>
                  </div>
                </div>
                <div class="col-xs-6 m-padding">
                  <div class="b-welcome__services-support">
                    <div class="b-welcome__services-img m-support">
                      <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                        width="45px" height="45px" viewBox="0 0 612 612" style="enable-background:new 0 0 612 612;" xml:space="preserve">
                        <g>
                          <path d="M257.938,336.072c0,17.355-14.068,31.424-31.423,31.424c-17.354,0-31.422-14.068-31.422-31.424
                            c0-17.354,14.068-31.423,31.422-31.423C243.87,304.65,257.938,318.719,257.938,336.072z M385.485,304.65
                            c-17.354,0-31.423,14.068-31.423,31.424c0,17.354,14.069,31.422,31.423,31.422c17.354,0,31.424-14.068,31.424-31.422
                            C416.908,318.719,402.84,304.65,385.485,304.65z M612,318.557v59.719c0,29.982-24.305,54.287-54.288,54.287h-39.394
                            C479.283,540.947,379.604,606.412,306,606.412s-173.283-65.465-212.318-173.85H54.288C24.305,432.562,0,408.258,0,378.275v-59.719
                            c0-20.631,11.511-38.573,28.46-47.758c0.569-84.785,25.28-151.002,73.553-196.779C149.895,28.613,218.526,5.588,306,5.588
                            c87.474,0,156.105,23.025,203.987,68.43c48.272,45.777,72.982,111.995,73.553,196.779C600.489,279.983,612,297.925,612,318.557z
                            M497.099,336.271c0-13.969-0.715-27.094-1.771-39.812c-24.093-22.043-67.832-38.769-123.033-44.984
                            c7.248,8.15,13.509,18.871,17.306,32.983c-33.812-26.637-100.181-20.297-150.382-79.905c-2.878-3.329-5.367-6.51-7.519-9.417
                            c-0.025-0.035-0.053-0.062-0.078-0.096l0.006,0.002c-8.931-12.078-11.976-19.262-12.146-11.31
                            c-1.473,68.513-50.034,121.925-103.958,129.46c-0.341,7.535-0.62,15.143-0.62,23.08c0,28.959,4.729,55.352,12.769,79.137
                            c30.29,36.537,80.312,46.854,124.586,49.59c8.219-13.076,26.66-22.205,48.136-22.205c29.117,0,52.72,16.754,52.72,37.424
                            c0,20.668-23.604,37.422-52.72,37.422c-22.397,0-41.483-9.93-49.122-23.912c-30.943-1.799-64.959-7.074-95.276-21.391
                            C198.631,535.18,264.725,568.41,306,568.41C370.859,568.41,497.099,486.475,497.099,336.271z M550.855,264.269
                            C547.4,116.318,462.951,38.162,306,38.162S64.601,116.318,61.145,264.269h20.887c7.637-49.867,23.778-90.878,48.285-122.412
                            C169.37,91.609,228.478,66.13,306,66.13c77.522,0,136.63,25.479,175.685,75.727c24.505,31.533,40.647,72.545,48.284,122.412
                            H550.855L550.855,264.269z"/>
                        </g>
                      </svg>

                    </div>
                    <h3>24/7 support</h3>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section><!--b-welcome-->
 

    <section class="b-asks">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-sm-10 col-sm-offset-1 col-md-offset-0 col-xs-12">
            <div class="b-asks__first wow zoomInLeft" data-wow-delay="0.3s" data-wow-offset="100">
              <div class="b-asks__first-circle">
                <span class="fa fa-search"></span>
              </div>
              <div class="b-asks__first-info">
                <h2>ARE YOU LOOKING FOR A CAR?</h2>
                <p>Search Our Inventory With Thousands Of Cars  And More 
                  Cars Are Adding On Daily Basis</p>
              </div>
              <div class="b-asks__first-arrow">
                <a href="listingsTwo.html"><span class="fa fa-angle-right"></span></a>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-sm-10 col-sm-offset-1 col-xs-12 col-md-offset-0">
            <div class="b-asks__first m-second wow zoomInRight" data-wow-delay="0.3s" data-wow-offset="100">
              <div class="b-asks__first-circle">
                <span class="fa fa-usd"></span>
              </div>
              <div class="b-asks__first-info">
                <h2>DO YOU WANT TO SELL A CAR?</h2>
                <p>Search Our Inventory With Thousands Of Cars  And More 
                  Cars Are Adding On Daily Basis</p>
              </div>
              <div class="b-asks__first-arrow">
                <a href="listingsTwo.html"><span class="fa fa-angle-right"></span></a>
              </div>
            </div>
          </div>
          <div class="col-xs-12">
            <p class="b-asks__call wow zoomInUp" data-wow-delay="0.3s" data-wow-offset="100">QUESTIONS? CALL US  : <span><?=@$meta[25]->zsystem_value?></span></p>
          </div>
        </div>
      </div>
    </section> 

    <section class="b-review">
			<div class="container">
				<div class="col-sm-10 col-sm-offset-1 col-xs-12">
					<div id="carousel-small-rev" class="owl-carousel enable-owl-carousel" data-items="1" data-navigation="true" data-auto-play="true" data-stop-on-hover="true" data-items-desktop="1" data-items-desktop-small="1" data-items-tablet="1" data-items-tablet-small="1">
						<div class="b-review__main">
							<div class="b-review__main-person">
								<div class="b-review__main-person-inside">
								</div>
							</div>
							<h5><span>DONALD BROOKS</span>, Customer, Ferrari 488 GTB 2 Owner<em>"</em></h5>
							<p>Donec facilisis velit eust. Phasellus cons quat. Aenean vitae quam. Vivamus et nunc. Nunc consequsem
								velde metus imperdiet lacinia.  Nam rutrum congue diam. Vestibulum acda risus eros auctor egestas. Morbids sem magna, viverra quis sollicitudin quis consectetuer quis nec magna.</p>
						</div>
						<div class="b-review__main">
							<div class="b-review__main-person">
								<div class="b-review__main-person-inside">
								</div>
							</div>
							<h5><span>DONALD BROOKS</span>, Customer, Ferrari 488 GTB 2 Owner<em>"</em></h5>
							<p>Donec facilisis velit eust. Phasellus cons quat. Aenean vitae quam. Vivamus et nunc. Nunc consequsem
								velde metus imperdiet lacinia.  Nam rutrum congue diam. Vestibulum acda risus eros auctor egestas. Morbids sem magna, viverra quis sollicitudin quis consectetuer quis nec magna.</p>
						</div>
						<div class="b-review__main">
							<div class="b-review__main-person">
								<div class="b-review__main-person-inside">
								</div>
							</div>
							<h5><span>DONALD BROOKS</span>, Customer, Ferrari 488 GTB 2 Owner<em>"</em></h5>
							<p>Donec facilisis velit eust. Phasellus cons quat. Aenean vitae quam. Vivamus et nunc. Nunc consequsem
								velde metus imperdiet lacinia.  Nam rutrum congue diam. Vestibulum acda risus eros auctor egestas. Morbids sem magna, viverra quis sollicitudin quis consectetuer quis nec magna.</p>
						</div>
					</div>
				</div>
			</div> 
		</section><!--b-review-->
