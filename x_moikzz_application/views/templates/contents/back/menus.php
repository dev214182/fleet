<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<<<<<<< HEAD
=======
<form id="form-menu"  novalidate="">
>>>>>>> Moikzz
<div class="row">
    <div class="col-lg-10 col-md-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title b-b p-b-10 m-b-20">Select Menu</h5>
<<<<<<< HEAD
                <select class="shadow-sm bg-white custom-select col-md-4 m-r-20" id="inlineFormCustomSelect">
                    <option selected="">Choose...</option>
                    <option value="1">Main Navigation</option>
                    <option value="2">Secondary Navigation</option>
                    <option value="3">Footer Navigation</option>
=======
                <select class="shadow-sm bg-white custom-select col-md-4 m-r-20" name="menu_selection" id="inlineFormCustomSelect">
                    <option value="15">Main Navigation</option>
                    <option value="14">Secondary Navigation</option>
                    <option value="16">Footer Navigation</option>
>>>>>>> Moikzz
                </select>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title b-b p-b-10 m-b-0">Add Item</h5>
                <div class="list-group m-t-20">
                    <div class="list-group-item">
                        <h6 class="m-b-0"  data-toggle="collapse" data-target="#postCollapse" aria-expanded="true" aria-controls="postCollapse" style="cursor:move!important;">Posts</h6>
                        <div id="postCollapse" class="collapse show m-t-10 p-t-10 b-t">
                            <ul class="list-unstyled m-b-0">
<<<<<<< HEAD
                                <li class="cms-nav-select" data-navtitle="Gallega Global Logistics Award" style="cursor:pointer;"><i class="mdi mdi-plus text-info m-r-5"></i><small>Gallega Global Logistics Award</small></li>
                                <li class="cms-nav-select" data-navtitle="The number 1 logistics company in Dubai!" style="cursor:pointer;"><i class="mdi mdi-plus text-info m-r-5"></i><small>The number 1 logistics company in Dubai!</small></li>
                                <li class="cms-nav-select" data-navtitle="Why Gallega Global Logistics?" style="cursor:pointer;"><i class="mdi mdi-plus text-info m-r-5"></i><small>Why Gallega Global Logistics?</small></li>
                            </ul>
                        </div>
                    </div>
                    <div class="list-group-item">
                        <h6 class="m-b-0" data-toggle="collapse" data-target="#categoryCollapse" aria-expanded="true" aria-controls="categoryCollapse" style="cursor:move!important;">Categories</h6>
                        <div id="categoryCollapse" class="collapse m-t-10 p-t-10 b-t">
                            <ul class="list-unstyled m-b-0">
                                <li class="cms-nav-select" data-navtitle="Category 1" style="cursor:pointer;"><i class="mdi mdi-plus text-info m-r-5"></i><small>Category 1</small></li>
                                <li class="cms-nav-select" data-navtitle="Category 2" style="cursor:pointer;"><i class="mdi mdi-plus text-info m-r-5"></i><small>Category 2</small></li>
                                <li class="cms-nav-select" data-navtitle="Category 3" style="cursor:pointer;"><i class="mdi mdi-plus text-info m-r-5"></i><small>Category 3</small></li>
                            </ul>
                        </div>
                    </div>
=======
                                
                            </ul>
                        </div>
                    </div>
                    
>>>>>>> Moikzz
                    <div class="list-group-item">
                        <h6 class="m-b-0" data-toggle="collapse" data-target="#pageCollapse" aria-expanded="true" aria-controls="pageCollapse" style="cursor:move!important;">Pages</h6>
                        <div id="pageCollapse" class="collapse m-t-10 p-t-10 b-t">
                            <ul class="list-unstyled m-b-0">
<<<<<<< HEAD
                                <li class="cms-nav-select" data-navtitle="Contact us" style="cursor:pointer;"><i class="mdi mdi-plus text-info m-r-5"></i><small>Contact us</small></li>
                                <li class="cms-nav-select" data-navtitle="About us" style="cursor:pointer;"><i class="mdi mdi-plus text-info m-r-5"></i><small>About us</small></li>
                                <li class="cms-nav-select" data-navtitle="Trucks" style="cursor:pointer;"><i class="mdi mdi-plus text-info m-r-5"></i><small>Trucks</small></li>
=======
                                 
>>>>>>> Moikzz
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- <button type="button" class="btn btn-sm waves-effect waves-light btn-info m-t-20 float-right">Add to Menu <i class="mdi mdi-arrow-right"></i></button> -->
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title b-b p-b-10">Main Navigation <small class="text-muted">(currently selected)</small></h5>
<<<<<<< HEAD
                <button id="saveMenu" type="button" class="btn waves-effect waves-light btn-success m-b-10">Save Menu</button>
                <div class="myadmin-dd dd" id="nestable">
                    <ol id="cmsSelectedNav" class="dd-list">
                        <li class="dd-item" data-id="1">
                            <div class="dd-handle"> Item 1 </div>
                            <i class="mdi mdi-close float-right cms-nav-remove" style="position:absolute;right:10px;top:10px;cursor:pointer;"></i>
                        </li>
                        <li class="dd-item" data-id="2">
                            <div class="dd-handle"> Item 2 </div>
                            <i class="mdi mdi-close float-right cms-nav-remove" style="position:absolute;right:10px;top:10px;cursor:pointer;"></i>
                            <ol class="dd-list">
                                <li class="dd-item" data-id="3">
                                    <div class="dd-handle"> Item 3 </div>
                                    <i class="mdi mdi-close float-right cms-nav-remove" style="position:absolute;right:10px;top:10px;cursor:pointer;"></i>
                                </li>
                                <li class="dd-item" data-id="4">
                                    <div class="dd-handle"> Item 4 </div>
                                    <i class="mdi mdi-close float-right cms-nav-remove" style="position:absolute;right:10px;top:10px;cursor:pointer;"></i>
                                </li>
                                <li class="dd-item" data-id="5">
                                    <div class="dd-handle"> Item 5 </div>
                                    <i class="mdi mdi-close float-right cms-nav-remove" style="position:absolute;right:10px;top:10px;cursor:pointer;"></i>
                                    <ol class="dd-list">
                                        <li class="dd-item" data-id="6">
                                            <div class="dd-handle"> Item 6 </div>
                                            <i class="mdi mdi-close float-right cms-nav-remove" style="position:absolute;right:10px;top:10px;cursor:pointer;"></i>
                                        </li>
                                        <li class="dd-item" data-id="7">
                                            <div class="dd-handle"> Item 7 </div>
                                            <i class="mdi mdi-close float-right cms-nav-remove" style="position:absolute;right:10px;top:10px;cursor:pointer;"></i>
                                        </li>
                                        <li class="dd-item" data-id="8">
                                            <div class="dd-handle"> Item 8 </div>
                                            <i class="mdi mdi-close float-right cms-nav-remove" style="position:absolute;right:10px;top:10px;cursor:pointer;"></i>
                                        </li>
                                    </ol>
                                </li>
                                <li class="dd-item" data-id="9">
                                    <div class="dd-handle"> Item 9 </div>
                                    <i class="mdi mdi-close float-right cms-nav-remove" style="position:absolute;right:10px;top:10px;cursor:pointer;"></i>
                                </li>
                                <li class="dd-item" data-id="10">
                                    <div class="dd-handle"> Item 10 </div>
                                    <i class="mdi mdi-close float-right cms-nav-remove" style="position:absolute;right:10px;top:10px;cursor:pointer;"></i>
                                </li>
                            </ol>
                        </li>
                    </ol>
                </div>

                <div id="#currentMenu">
=======
                <button id="saveMenu" type="submit" class="btn waves-effect waves-light btn-success m-b-10">Save Menu</button>
                <div class="myadmin-dd dd" id="nestable">
                        <ol id="cmsSelectedNav" class="dd-list"> </ol>
                </div>
              <div id="#currentMenu">
>>>>>>> Moikzz

                </div>
            </div>
        </div>
    </div>

<<<<<<< HEAD
</div><!-- row -->
=======
</div><!-- row -->
</form>
>>>>>>> Moikzz
