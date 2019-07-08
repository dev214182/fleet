<?php defined('BASEPATH') OR exit('No direct script access allowed');?>      
    <div class="b-infoBar">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-xs-12">
                    <div class="b-infoBar__select wow zoomInUp" data-wow-delay="0.5s">
                        <form method="post"  class="needs-validation" novalidate="" autocomplete="off">
                            
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
                        <form method="post"  class="needs-validation" novalidate="" autocomplete="off">
                        <div class="b-items__aside-main wow zoomInUp" data-wow-delay="0.5s">
                            
                                <div class="b-items__aside-main-body">
                                    <div class="b-items__aside-main-body-item">
                                    <label>SEARCH</label>
                                             <label for="radio_13">
                                            <input name="truck_type" value="1" type="radio" id="radio_13" class="radio-col-light-blue ">
                                            Car Carrier</label>
                                           
                                            <label for="radio_14">
                                            <input name="truck_type" value="2" type="radio" id="radio_14" class="radio-col-light-blue"> 
                                            Recovery Vehicle</label>
                                            
                                            <label for="radio_15">
                                            <input name="truck_type"  value="3" type="radio" id="radio_15" class="radio-col-light-blue"> 
                                            3-Ton Pickup</label>
                                            
                                            <label for="radio_16">
                                            <input name="truck_type"  value="4" type="radio" id="radio_16" class="radio-col-light-blue"> 
                                            Container Trailer</label>
                                        
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
                                            <select name="select1" id="input_origin_place" class="m-select select2  rx-country form-control">
                                                <option value="" selected=""> - From -</option>
                                            </select>
                                            
                                        </div>
                                    </div>
                                    <div class="b-items__aside-main-body-item">
                                        <label>TO (destination)</label>
                                        <div>
                                            <select name="select1" id="input_destination_place" class="m-select select2  rx-country">
                                                <option value="" selected="">- To -</option>
                                            </select>
                                             
                                        </div>
                                    </div> 
                                  
                                    <div class="b-items__aside-main-body-item">
                                         <label>Load</label>
                                         <div>
                                        <input type="text" class="form-control" placeholder="car to load?">
                                        </div>
                                    </div>
                                </div>
                                <footer class="b-items__aside-main-footer">
                                    <button type="submit" class="btn m-btn">FILTER SEARCH<span class="fa fa-angle-right"></span></button><br />
                                    <a id="clear-search" href="#">RESET ALL FILTERS</a>
                                     
                                </footer>
                        </div>
                        </form>
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
                       
                    </div>
                    
                </div>
            </div>
        </div>
    </div><!--b-items-->
    