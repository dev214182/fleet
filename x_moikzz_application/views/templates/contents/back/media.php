<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="row">
    
    <!-- <div class="form-group gal-selected-img-container text-center border">
       
    </div> -->
    <!-- <div class="from-group gal-media-uploader">
        <img id="mImage" class="img-fluid" src="<?php echo file_common_dir('images/default.png');?>" alt="Gallega Image Preview">
        <input class="modal-media-url form-control" type="text">
        <button type="button" id="openMediaModal" class="btn waves-effect waves-light btn-secondary" data-toggle="modal" data-target="#galMediaUploader">Media Uploader</button>
    </div> -->

    <?php //$this->load->view('templates/inc/back/media_modal.html'); ?>
    
    <?php //$this->load->view('templates/inc/back/media_uploader.html'); ?>

    <!-- Media Uploader -->
<div class="col-12 p-0">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs customtab2 border-light" role="tablist">
        <li class="nav-item"> <a class="nav-link show bg-light text-secondary active" data-toggle="tab" href="#gallerymedia" role="tab" aria-selected="true"><span class="sm-up"><i class="mdi mdi-camera"></i></span> <span class="hidden-xs-down">Media Gallery</span></a></li>
        <li class="nav-item"> <a class="nav-link show bg-light text-secondary" data-toggle="tab" href="#uploadmedia" role="tab" aria-selected="false"><span class="sm-up"><i class="mdi mdi-cloud-upload"></i></span> <span class="hidden-xs-down">Upload</span></a></li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content media-uploader">
        <div class="tab-pane show active" id="gallerymedia" role="tabpanel">
            <div class="card mb-0">
                <div class="card-body">

                    <div class="col-md-12">
                        <div class="card-block">
                            <div class="row">                                       
                                <div class="col-8">
                                    <div class="row">
                                        <h4 class="card-title" style="width:100%;">Media Gallery</h4>
                                        <h6 class="card-subtitle">Select the file and click choose to use the file.</b></h6>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="row pull-right">
                                        <div id="selectBtn"></div>
                                    </div>
                                </div>
                                <div class="col-md-9 border border-right-0">
                                    <div class="row">
                                        <div class="media-files-container p-2 gl-flex gl-wrap">
                                            <div class="spinner-border" role="status"></div>
                                        </div>
                                        <div class="gal-load-more-container">
                                            <button id="loadMoreItems" class="shadow-none btn-sm waves-effect waves-light btn-secondary">Load More <i class="mdi mdi-arrow-down-bold-circle"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 border p-3 media-file-details">
                                    <form action="">
                                        <input id="mID" type="hidden" value="">
                                        <div class="form-group gal-selected-img-container text-center border">
                                            <img id="mImage" class="img-fluid" src="<?php echo file_common_dir('images/default.png');?>" alt="Gallega Image Preview">
                                        </div>
                                        <div class="form-group mb-2 row">
                                            <label for="example-text-input" class="col-3 col-form-label"><small>Title</small></label>
                                            <div class="col-9">
                                                <input id="mTitle" class="form-control form-control-sm" type="text" value="" id="mediaID">
                                            </div>
                                        </div>
                                        <div class="form-group mb-2 row">
                                            <label for="example-text-input" class="col-3 col-form-label"><small>Alt</small></label>
                                            <div class="col-9">
                                                <input id="mAlt" class="form-control form-control-sm" type="text" value="" id="mediaALT">
                                            </div>
                                        </div>
                                        <div class="form-group mb-2 row">
                                            <div class="col-12 text-right">
                                                <button type="button" class="btn waves-effect waves-light btn-sm btn-secondary">Update</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div><!-- Card -->
        </div>
    
        <div class="tab-pane" id="uploadmedia" role="tabpanel">
            <div class="card mb-0">
                <div class="card-body">
                    <h4 class="card-title">Media Uploader</h4>
                    <h6 class="card-subtitle">Select files or drag and drop the files to upload.</h6>
                    <form action="#" class="dropzone">
                        <div class="fallback">
                            <input name="file" type="file" multiple />
                        </div>
                    </form>
                </div>
            </div><!-- card -->
        </div>

    </div><!-- tab-content -->
</div><!-- Media Uploader -->

</div><!-- row -->