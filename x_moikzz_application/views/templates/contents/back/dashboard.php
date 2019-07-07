<?php defined('BASEPATH') OR exit('No direct script access allowed');?>      
<div class="row">
        <!-- Column -->
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <!-- Row -->
                    <div class="row">
                        <div class="col-8"><h2 id="received"><span>0</span> <i class="ti-angle-down font-14 text-danger"></i></h2>
                            <h6 >Inquiries Received</h6></div>
                        <div class="col-4 align-self-center text-right  p-l-0">
                            <div  class="display-5 fa fa-bar-chart-o  text-danger"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <!-- Row -->
                    <div class="row">
                        <div class="col-8"><h2 id="responded" ><span>0</span> <i class="ti-angle-up font-14 text-success"></i></h2>
                            <h6 >Inquiries Responded</h6></div>
                        <div class="col-4 align-self-center text-right p-l-0">
                            <div class="fa fa-bar-chart-o display-5  text-success"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <!-- Row -->
                    <div class="row">
                        <div class="col-8"><h2 id="pending"><span>0</span> <i class="ti-angle-up font-14 text-info"></i></h2>
                            <h6 >Inquiries Pending</h6></div>
                        <div class="col-4 align-self-center text-right p-l-0">
                        <div class="fa fa-bar-chart-o display-5  text-info"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <!-- Row -->
                    <div class="row">
                        <div class="col-8"><h2 id="completed"><span>0</span></h2>
                            <h6>Completed</h6></div>
                        <div class="col-4 align-self-center text-right p-l-0">
                        <div class="fa fa-bar-chart-o display-5 text-warning"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
 

<div class="row">
    <div class="col-md-8">
     
        <div class="card">
            <div class="card-body">
                <div class="row button-group">
                    <div class="col-md-12"><h4 class="card-title">Recent Inquiries</h4></div>  
                </div>
                <hr/>
                <div class="table-responsive">
                    <table  class="display nowrap table table-hover table-striped table-bordered <?=$pages; ?>" cellspacing="0" width="100%">
                        <thead>
                            <tr> 
                                <?php if(@$tableHeaders):
                                        foreach($tableHeaders AS $k => $v): ?>
                                        <th><?=$v?></th> 
                                    <?php endforeach; 
                                    endif; ?>
                            </tr>
                        </thead> 
                        <tfoot> 
                            <tr> 
                                <?php if(@$tableHeaders):
                                        foreach($tableHeaders AS $k => $v): ?>
                                        <th><?=$v?></th> 
                                    <?php endforeach; 
                                    endif; ?>
                            </tr>
                        </tfoot>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>
            </div> 
        </div> 
        
    </div> <!-- End col-8  -->

    <div class="col-md-4">
        
            <div class="card card-outline-danger">
                <div class="card-header">
                    <h4 class="m-b-0 text-white">Notice</h4></div>
                <div class="card-body">
                    <h3 class="card-title">Special title treatment</h3>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> 
                </div>
            </div>
      
            <div class="card card-outline-warning">
                <div class="card-header">
                    <h4 class="m-b-0 text-white">Notice</h4></div>
                <div class="card-body">
                    <h3 class="card-title">Special title treatment</h3>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> 
                </div>
            </div>
       
    </div> <!-- End col-4  -->
</div>