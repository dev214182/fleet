<?php defined('BASEPATH') OR exit('No direct script access allowed');?>      
     <div class="b-items">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-4 col-xs-12">
                    <aside class="b-items__aside">
                        <h2 class="s-title wow zoomInUp" data-wow-delay="0.5s">REFINE YOUR SEARCH</h2>
                        <form method="post"  class="needs-validation" id="form-search" novalidate="" autocomplete="off">
                        <div class="b-items__aside-main wow zoomInUp" data-wow-delay="0.5s">
                            
                                <div class="b-items__aside-main-body">
                                    <div class="b-items__aside-main-body-item">
                                    <label>SEARCH</label>
                                             <label for="radio_1">
                                            <input name="truck_type" value="1" type="radio" id="radio_1" class="radio-col-light-blue" checked>
                                            Car Carrier</label>
                                           
                                            <label for="radio_2">
                                            <input name="truck_type" value="2" type="radio" id="radio_2" class="radio-col-light-blue" > 
                                            Recovery Vehicle</label>
                                            
                                            <label for="radio_3">
                                            <input name="truck_type"  value="3" type="radio" id="radio_3" class="radio-col-light-blue" > 
                                            3-Ton Pickup</label>
                                            
                                            <label for="radio_4">
                                            <input name="truck_type"  value="4" type="radio" id="radio_4" class="radio-col-light-blue"> 
                                            Container Trailer</label>
                                        
                                    </div>
                                    <div class="b-items__aside-main-body-item">
                                        <label>Departure Date</label>
                                        <div>
                                            <input type="date" class="form-control search-date" name="search-date">
                                        </div>
                                    </div>
                                     
                                    <div class="b-items__aside-main-body-item">
                                        <label>FROM (origin)</label>
                                        <div>
                                            <select name="search-from" id="input_origin_place" class="m-select search-from select2  rx-country">
                                                <option value="" selected=""> - From -</option>
                                            </select>
                                            
                                        </div>
                                    </div>
                                    <div class="b-items__aside-main-body-item">
                                        <label>TO (destination)</label>
                                        <div>
                                            <select name="search-to" id="input_destination_place" class="m-select search-to select2  rx-country">
                                                <option value="" selected="">- To -</option>
                                            </select>
                                             
                                        </div>
                                    </div> 
                                  
                                    <div class="b-items__aside-main-body-item">
                                         <label>Load</label>
                                         <div>
                                        <input type="text" class="form-control" name="search-load" placeholder="car to load?">
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
                    <div class="b-items__cars" id="b-items__cars"> 
                       
                    </div>
                    <div class="b-items__pagination wow zoomInUp" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomInUp;">
                        
                    </div>
                </div>
            </div>
        </div>
    </div><!--b-items-->
    