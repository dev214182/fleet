<<<<<<< HEAD
<<<<<<< HEAD
<?php defined('BASEPATH') OR exit('No direct script access allowed');?>      
<div class="row">
    <!-- column -->
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="float-left">
                    <h4 class="card-title">Pages</h4>
                    <h6 class="card-subtitle">List of all the pages</h6>
                </div>
                <a href="<?=get_current_url()?>create" class="btn btn-info btn-sm waves-effect waves-light float-right">Add Page</a>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Updated</th>
                                <th>Status</th>
                                <th class="text-nowrap">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Home</td>
                                <td>Admin</td>
                                <td>May 15, 2015</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-success btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Published
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">Publish</a>
                                            <a class="dropdown-item" href="#">Draft</a>
                                            <a class="dropdown-item" href="#">Trash</a>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-nowrap">
                                    
                                    <a href="<?=get_current_url()?>update" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                    <a href="#" data-toggle="tooltip" data-original-title="delete"> <i class="fa fa-trash text-danger m-r-10"></i> </a>
                                    <a href="#" data-toggle="tooltip" data-original-title="view post" target="_blank"> <i class="fa fa-external-link text-success"></i> </a>
                                </td>
                            </tr>
                            <tr>
                                <td>About</td>
                                <td>Mel</td>
                                <td>May 15, 2015</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-success btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Published
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#"><small>Publish</small></a>
                                            <a class="dropdown-item" href="#">Draft</a>
                                            <a class="dropdown-item" href="#">Trash</a>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-nowrap">
                                    <a href="<?=get_current_url()?>update" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                    <a href="#" data-toggle="tooltip" data-original-title="delete"> <i class="fa fa-trash text-danger m-r-10"></i> </a>
                                    <a href="#" data-toggle="tooltip" data-original-title="view post" target="_blank"> <i class="fa fa-external-link text-success"></i> </a>
                                </td>
                            </tr>
                            <tr>
                                <td>Pricing</td>
                                <td>Admin</td>
                                <td>May 15, 2015</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-success btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Published
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">Publish</a>
                                            <a class="dropdown-item" href="#">Draft</a>
                                            <a class="dropdown-item" href="#">Trash</a>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-nowrap">
                                    <a href="<?=get_current_url()?>update" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                    <a href="#" data-toggle="tooltip" data-original-title="delete"> <i class="fa fa-trash text-danger m-r-10"></i> </a>
                                    <a href="#" data-toggle="tooltip" data-original-title="view post" target="_blank"> <i class="fa fa-external-link text-success"></i> </a>
                                </td>
                            </tr>
                            <tr>
                                <td>How it works</td>
                                <td>Mel</td>
                                <td>May 15, 2015</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-warning btn-xs btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Draft
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">Publish</a>
                                            <a class="dropdown-item" href="#">Draft</a>
                                            <a class="dropdown-item" href="#">Trash</a>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-nowrap">
                                    <a href="<?=get_current_url()?>update" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                    <a href="#" data-toggle="tooltip" data-original-title="delete"> <i class="fa fa-trash text-danger m-r-10"></i> </a>
                                    <a href="#" data-toggle="tooltip" data-original-title="view post" target="_blank"> <i class="fa fa-external-link text-success"></i> </a>
                                </td>
                            </tr>
                            <tr>
                                <td>Contact us</td>
                                <td>Admin</td>
                                <td>May 15, 2015</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-danger btn-xs btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Trashed
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">Publish</a>
                                            <a class="dropdown-item" href="#">Draft</a>
                                            <a class="dropdown-item" href="#">Trash</a>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-nowrap">
                                    <a href="<?=get_current_url()?>update" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                    <a href="#" data-toggle="tooltip" data-original-title="delete"> <i class="fa fa-trash text-danger m-r-10"></i> </a>
                                    <a href="#" data-toggle="tooltip" data-original-title="view post" target="_blank"> <i class="fa fa-external-link text-success"></i> </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
=======
<?php $this->load->view('templates/contents/back/tables'); ?>
>>>>>>> Moikzz
=======
<?php $this->load->view('templates/contents/back/tables'); ?>
>>>>>>> b534c0a98cfcba2eb79875f4c8acdfc6b8b1bd52
