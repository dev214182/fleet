<form class="form-horizontal" id="form-setttings" method="post"  autocomplete="off">
<div class="row">
    <div class="col-md-12">
        <div class="card card-body p-t-10 p-b-10 p-r-10 p-l-10">
            <div class="form-group m-b-0 m-t-0">
                <div class="col-sm-4">
                    <button type="submit" class="btn text-right btn-sm btn-info waves-effect waves-light">Save</button>
                    <span class="m-l-20 formMsg"> </span>
                </div> 
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="card card-body">
            <h3 class="box-title m-b-0"><?=$pageHeader?></h3>
            <p class="text-muted m-b-30 font-13"> This is for Web Administrator </p>
                <div class="form-group row">
                    <label for="" class="col-sm-4  control-label col-form-label">Site url</label>
                    <div class="col-sm-8">
                        <label  class="control-label col-form-label" ><?=base_url()?></label>
                        <input type="hidden" hidden class="form-control hidden" name="sys_site_url" value="<?=base_url()?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4  control-label col-form-label">Site Title</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="sys_site_title" placeholder="Moikzz System">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4  control-label col-form-label">Site Description</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control"  name="sys_site_description" placeholder="Web application">
                    </div>
                </div> 

                <div class="form-group row">
                    <label for="" class="col-sm-4  control-label col-form-label">Admin Email</label>
                    <div class="col-sm-8">
                        <input type="email" class="form-control" name="sys_site_email" value="">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-4  control-label col-form-label">Anyone can register?</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="sys_site_register">
                            <option>No</option>
                            <option>Yes</option> 
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4  control-label col-form-label">Default Language</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="sys_site_language">
                            <option>English</option>    
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4  control-label col-form-label">Staff Admin Email</label>
                    <div class="col-sm-8">
                        <input type="email" class="form-control" name="sys_staff_email" placeholder="staff@admin.com" value="">
                        <small>multiple email separate it with comma</small>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4  control-label col-form-label">Contact Number</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="sys_comp_number" value="">
                        <small>multiple contact number separate it with comma</small>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4  control-label col-form-label">Company Address</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="sys_com_address" value="">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4  control-label col-form-label">Map Location</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="sys_map_location" placeholder="https://www.google.com/maps?q=ghassan+aboud+group&uact=5&um=1&ie=UTF-8&sa=X&ved=0ahUKEwj8hvj5ir7jAhUrSxUIHY8GCu0Q_AUIESgB" value="">
                    </div>
                </div>
               
        </div>

        <div class="card card-body">
            <h3 class="box-title m-b-0">Customer Pricing - Discount</h3>
            <p class="text-muted m-b-30 font-13"> Set discount percentage based on customer types </p>
                <div class="form-group row">
                    <label for="price_n" class="col-sm-4  control-label col-form-label">Normal Price</label>
                    <div class="col-sm-2"> 
                        <input type="text" id="price_n" class="form-control" name="sys_normal_pricing" value="0" placeholder="0%">
                    </div>
                    <label class="p-t-10 p-b-10">%</label>
                </div>
                <div class="form-group row">
                    <label for="price_a" class="col-sm-4  control-label col-form-label">Advance Price</label>
                    <div class="col-sm-2"> 
                        <input type="text" id="price_a" class="form-control" name="sys_advance_pricing" value="0" placeholder="0%"> 
                    </div>
                    <label class="p-t-10 p-b-10">%</label>
                </div>
                <div class="form-group row">
                    <label for="price_p" class="col-sm-4  control-label col-form-label">Premium Price</label>
                    <div class="col-sm-2"> 
                        <input type="text" id="price_p" class="form-control" name="sys_premium_pricing" value="0" placeholder="0%"> 
                    </div>
                    <label class="p-t-10 p-b-10">%</label>
                </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card card-body">
        <h3 class="box-title m-b-0"><?=$pageHeader?></h3>
        <p></p>
            
                <div class="form-group row">
                    <label for="" class="col-sm-4  control-label col-form-label">Site Logo</label>
                    <div class="col-sm-8 gal-media-uploader">  
                        <div class="img-wrapper mb-1 logo" style="max-height:100px;">
                            <img class="selected-img img-fluid" style="max-height:100px;" src="<?php echo file_common_dir('images/default.png');?>" alt="Gallega Image Preview">
                        </div>
                        <input class="modal-media-url form-control mb-1 form-control-line" type="text" name="sys_logo">
                        <button type="button" id="openMediaModal" class="open-media-modal btn btn-sm waves-effect waves-light btn-secondary" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#galMediaUploader">Media Uploader</button>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4  control-label col-form-label">Site Icon</label>
                    <div class="col-sm-8 gal-media-uploader">
                    
                        <div class="img-wrapper mb-1 icon" style="max-height:100px;">
                            <img class="selected-img img-fluid" style="max-height:100px;" src="<?php echo file_common_dir('images/default.png');?>" alt="Gallega Image Preview">
                        </div>
                        <input class="modal-media-url form-control mb-1 form-control-line" type="text" name="sys_icon">
                        <button type="button" id="openMediaModal" class="open-media-modal btn btn-sm waves-effect waves-light btn-secondary" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#galMediaUploader">Media Uploader</button>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4  control-label col-form-label">Global Meta Title</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="sys_site_meta_title"  placeholder="">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4  control-label col-form-label">Global Meta Description</label>
                    <div class="col-sm-8">
                    <textarea rows="5"  class="form-control" name="sys_site_meta_description"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4  control-label col-form-label">Global Meta Keywords</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control"  name="sys_site_meta_keyword" maxlength="64" placeholder="">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4  control-label col-form-label">Analytics</label>
                    <div class="col-sm-8">
                        <textarea rows="10" class="form-control" name="sys_site_script" placeholder="[s]Put your script here[/s]"></textarea>
                    </div>
                </div>            
        </div>

        <div class="card card-body">
        <h3 class="box-title m-b-0">Social Media</h3>
        <p></p>
            
                <div class="form-group row">
                    <label for="" class="col-sm-2  control-label col-form-label">Facebook </label>
                    <div class="col-sm-2 social-icon text-right p-10"><i class="mdi mdi-facebook-box"></i></div>
                    <div class="col-sm-8"> 
                        <input type="text" class="form-control" name="sys_social_fb"  placeholder="https://www.facebook.com/sample/"> 
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2  control-label col-form-label">Twitter </label>
                    <div class="col-sm-2   social-icon text-right p-10"><i class="mdi mdi-twitter-box"></i></div>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="sys_social_twitter"  placeholder="https://twitter.com/sample/">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2  control-label col-form-label">Instagram </label>
                    <div class="col-sm-2 social-icon text-right p-10"><i class="mdi mdi-instagram"></i></div>
                    <div class="col-sm-8"> 
                        <input type="text" class="form-control" name="sys_social_instagram"  placeholder="https://www.instagram.com/sample/"> 
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2  control-label col-form-label">LinkedIn </label>
                    <div class="col-sm-2 social-icon text-right p-10"><i class="mdi mdi-linkedin-box"></i></div>
                    <div class="col-sm-8"> 
                        <input type="text" class="form-control" name="sys_social_linkedin"  placeholder="https://www.linkedin.com/sample/"> 
                    </div>
                </div>
                
        </div>
    </div> 
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card card-body p-t-10 p-b-10 p-r-10 p-l-10">
            <div class="form-group m-b-0 m-t-0">
                <div class="col-sm-4">
                    <button type="submit" class="btn text-right btn-sm btn-info waves-effect waves-light">Save</button>
                    <span class="m-l-20 formMsg"> </span>
                </div>
            </div>
        </div>
    </div>
</div>
</form>