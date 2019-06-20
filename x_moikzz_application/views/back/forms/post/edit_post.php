<?php defined('BASEPATH') OR exit('No direct script access allowed');?>    
<div class="row">
    <div class="col-xlg-10 col-lg-9 col-md-8 m-b-20">
        <a href="<?=site_url('/client/page/posts/create')?>" class="btn btn-outline-info btn-sm waves-effect waves-light float-left">Add New Post</a>    
    </div>
    <div class="col-xlg-10 col-lg-9 col-md-8">
        <div class="card">
            <div class="card-body form-material">
                <!-- <h5 class="card-title b-b p-b-10">Edit Post</h5> -->
                <div class="form-group">
                    <small class="font-weight-bold">Post Title</small>
                    <input type="text" class="input-text form-control form-control-sm form-control-line" placeholder="" value="Contact us">
                </div>
                <div class="form-group">
                    <small class="font-weight-bold">Slug</small>
                    <div class="list-inline">
                        <div class="p-0 m-0 list-inline-item"><h6 class="text-muted"><?=site_url()?></h6></div>
                        <div class="list-inline-item">
                            <input type="text" class="input-text form-control form-control-sm form-control-line" placeholder="" value="contact-us">
                        </div>
                        <div class="list-inline-item"><a href="#" title="view post" target="_blank"><i class="mdi mdi-open-in-new"></i></a></div>
                    </div>
                        
                </div>
                <div class="form-group gal-cmsEditor">
                    <small class="font-weight-bold">Content</small>
                    <textarea name="cmsEditor"></textarea>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title b-b p-b-10 m-b-0" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1" style="cursor:move!important;">SEO</h5>
                <div id="collapse1" class="collapse show m-t-30">
                    <div class="col-xlg-12">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs customtab2 border-light" role="tablist">
                            <li class="nav-item"> <a class="nav-link show active bg-light text-secondary" data-toggle="tab" href="#settings" role="tab" aria-selected="true"><span class="sm-up"><i class="mdi mdi-chart-bar"></i></span> <span class="hidden-xs-down">Settings</span></a></li>
                            <li class="nav-item"> <a class="nav-link show bg-light text-secondary" data-toggle="tab" href="#social" role="tab" aria-selected="false"><span class="sm-up"><i class="mdi mdi-share-variant"></i></span> <span class="hidden-xs-down">Social</span></a></li>
                        </ul>
                    </div>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane show active" id="settings" role="tabpanel">
                            <div class="col-xlg-12 m-t-20">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-material">
                                            <h6 class="card-title b-b p-b-10 font-weight-bold">General SEO Settings</h6>
                                            <div class="form-group">
                                                <small class="font-weight-bold">Meta Title</small>
                                                <div class="text-counter">
                                                    <input type="text" class="input-text form-control form-control-sm form-control-line" placeholder="" value="Contact us | Gallega Global Logistics" data-limit="60">
                                                    <small class="help-block text-muted"><span class="count-text">0</span>/60 Maximum recommended limit</small>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <small class="font-weight-bold">Meta Description</small>
                                                <div class="text-counter">
                                                    <textarea class="input-text form-control form-control-sm" data-limit="160" rows="3"></textarea>
                                                    <small class="help-block text-muted"><span class="count-text">0</span>/160 Maximum recommended limit</small>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <small class="font-weight-bold">Focus Keywords</small>
                                                <input type="text" class="form-control form-control-sm form-control-line" placeholder="" value="">
                                                <span class="help-block text-muted"><small>Separate keywords by commas (eg: "my super keyword,another keyword,keyword")</small></span>
                                            </div>
                                        </div><!-- form-material -->
                                    </div>
                                </div><!-- Card -->
                            </div>
                        </div>
                        <div class="tab-pane" id="social" role="tabpanel">
                            <div class="col-xlg-12 m-t-20">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-material">
                                            <h6 class="card-title b-b p-b-10 font-weight-bold"><i class="mdi mdi-facebook-box"></i> Facebook</h6>
                                            <div class="form-group">
                                                <small class="font-weight-bold">Meta Title</small>
                                                <div class="text-counter">
                                                    <input type="text" class="input-text form-control form-control-sm form-control-line" placeholder="" value="Contact us | Gallega Global Logistics" data-limit="60">
                                                    <small class="help-block text-muted"><span class="count-text">0</span>/60 Maximum recommended limit</small>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <small class="font-weight-bold">Meta Description</small>
                                                <div class="text-counter">
                                                    <textarea class="input-text form-control form-control-sm" data-limit="160" rows="3"></textarea>
                                                    <small class="help-block text-muted"><span class="count-text">0</span>/160 Maximum recommended limit</small>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <small class="font-weight-bold">Custom Image</small>
                                                <div class="custom-file m-t-10">
                                                    <input type="file" class="custom-file-input" id="facebookcustomFile">
                                                    <label class="custom-file-label form-control-sm" for="customFile">Choose file</label>
                                                </div>
                                                <small class="help-block text-muted">Minimum size: 200x200px, ideal ratio 1.91:1, 8Mb max</small>
                                            </div>
                                        </div><!-- form-material -->
                                    </div>
                                </div><!-- card -->
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-material">
                                            <h6 class="card-title b-b p-b-10 font-weight-bold"><i class="mdi mdi-twitter-box"></i> Twitter</h6>
                                            <div class="form-group">
                                                <small class="font-weight-bold">Meta Title</small>
                                                <div class="text-counter">
                                                    <input type="text" class="input-text form-control form-control-sm form-control-line" placeholder="" value="Contact us | Gallega Global Logistics" data-limit="60">
                                                    <small class="help-block text-muted"><span class="count-text">0</span>/60 Maximum recommended limit</small>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <small class="font-weight-bold">Meta Description</small>
                                                <div class="text-counter">
                                                    <textarea class="input-text form-control form-control-sm" data-limit="160" rows="3"></textarea>
                                                    <small class="help-block text-muted"><span class="count-text">0</span>/160 Maximum recommended limit</small>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <small class="font-weight-bold">Custom Image</small>
                                                <div class="custom-file m-t-10">
                                                    <input type="file" class="custom-file-input" id="twittercustomFile">
                                                    <label class="custom-file-label form-control-sm" for="customFile">Choose file</label>
                                                </div>
                                                <small class="help-block text-muted">Minimum size: 144x144px (300x157px with large card enabled), ideal ratio 1:1 (2:1 with large card), 5Mb max.</small>
                                            </div>
                                        </div><!-- form-material -->
                                    </div>
                                </div><!-- card -->
                            </div>
                        </div>
                    </div><!-- tab-content -->
                </div>
            </div>  
        </div>
    </div>
    <div class="col-xlg-2 col-lg-3 col-md-4 ">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title b-b p-b-10">Publish</h5>
                <a href="javascript:void(0)" class="btn btn-info m-b-10 p-10 btn-block waves-effect waves-light">Update</a>
                <a href="javascript:void(0)" class="btn btn-secondary p-10 btn-block waves-effect waves-light">Save as Draft</a>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title b-b p-b-10">Featured Image</h5>
                <label for="input-file-now-custom-1">You can add a default value</label>
                <input type="file" id="input-file-now-custom-1" class="dropify" data-default-file="../assets/plugins/dropify/src/images/test-image-1.jpg" />
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title b-b p-b-10">Category</h5>
                <div class="input-group">
                    <ul class="icheck-list">
                        <li>
                            <input type="checkbox" class="check" id="flat-checkbox-1" data-checkbox="icheckbox_flat-green">
                            <label for="flat-checkbox-1">Checkbox 1</label>
                        </li>
                        <li>
                            <input type="checkbox" class="check" id="flat-checkbox-2" checked data-checkbox="icheckbox_flat-green">
                            <label for="flat-checkbox-2">Checkbox 2</label>
                        </li>
                        <li>
                            <input type="checkbox" class="check" id="flat-checkbox-disabled" disabled data-checkbox="icheckbox_flat-green">
                            <label for="flat-checkbox-disabled">Disabled</label>
                        </li>
                        <li>
                            <input type="checkbox" class="check" id="flat-checkbox-disabled-checked" checked disabled data-checkbox="icheckbox_flat-green">
                            <label for="flat-checkbox-disabled-checked">Disabled &amp; checked</label>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>