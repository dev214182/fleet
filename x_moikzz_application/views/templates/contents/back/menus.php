<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<form id="form-menu"  novalidate="">
<div class="row">
    <div class="col-lg-10 col-md-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title b-b p-b-10 m-b-20">Select Menu</h5>
                <select class="shadow-sm bg-white custom-select col-md-4 m-r-20" name="menu_selection" id="inlineFormCustomSelect">
                    <option value="15">Main Navigation</option>
                    <option value="14">Secondary Navigation</option>
                    <option value="16">Footer Navigation</option>
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
                                
                            </ul>
                        </div>
                    </div>
                    
                    <div class="list-group-item">
                        <h6 class="m-b-0" data-toggle="collapse" data-target="#pageCollapse" aria-expanded="true" aria-controls="pageCollapse" style="cursor:move!important;">Pages</h6>
                        <div id="pageCollapse" class="collapse m-t-10 p-t-10 b-t">
                            <ul class="list-unstyled m-b-0">
                                 
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
                <button id="saveMenu" type="submit" class="btn waves-effect waves-light btn-success m-b-10">Save Menu</button>
                <div class="myadmin-dd dd" id="nestable">
                        <ol id="cmsSelectedNav" class="dd-list"> </ol>
                </div>
              <div id="#currentMenu">

                </div>
            </div>
        </div>
    </div>

</div><!-- row -->
</form>