<!DOCTYPE html>
<html lang="en"  >

<head>
 
    <!-- Bootstrap Core CSS -->
    
    <?php $this->load->view('templates/inc/back/metas.html'); ?>
    <?php $this->load->view('templates/css/back/css.html'); ?>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<script> 
var base_url =  '<?=base_url()?>';
let curUrl = '<?=get_current_url()?>';
var jsCustom =  '<?=@$jsCustom?>';
</script>
</head>

<body  class="fix-header fix-sidebar card-no-border <?=$bodyClass?>" data-namespace="<?=$bodyClass?>" data-namepage="<?=$pages?>">  
<div class="preloader">
    <svg class="circular" viewBox="25 25 50 50">
        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"></circle></svg>
</div>
<div id="barba-wrapper">
<div class="barba-container <?php echo $pageclass;?>" data-namespace="<?=$bodyClass?>" data-namepage="<?=$pages?>"> 
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
         <?php $this->load->view('templates/inc/back/header.html') ?>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <?php $this->load->view('templates/inc/back/sidebar.html') ?>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor"><?=$pagetitle?></h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <?=$breadcrumbs?>
                    </ol>
                </div>
                <div>
                    <button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <?=$contents?>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <div class="right-sidebar">
                    <?php $this->load->view('templates/inc/back/rightbar.html') ?>
                </div>
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer">
                © 2019 Moikzz
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    
    <!-- All Jquery -->
    <!-- ============================================================== -->
    
    <?php $this->load->view('templates/js/back/default.html'); ?>   
    <section>
        <?php $this->load->view('templates/js/back/graph.html'); ?>
        <?php $this->load->view('templates/js/back/dashboard.html'); ?>
        <?php $this->load->view('templates/js/back/datatables.html'); ?>
        <?php $this->load->view('templates/js/back/print.html'); ?>
    </section>
   
    <script>
    //For validation with custom styles
    (function() {
      'use strict';
      window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
          form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
              event.preventDefault();
              event.stopPropagation();
            }
            form.classList.add('was-validated');
          }, false);
        });
      }, false);
    })();
    </script>
    


    <!-- @Mel Scripts -->
    <!-- ============================================================== -->
    <!-- CKeditor -->
    <!-- ============================================================== -->
    <script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>
    <!-- ============================================================== -->
    <!-- icheck -->
    <!-- ============================================================== -->
    <script src="<?=plugins_dir('icheck/icheck.min.js')?>"></script>
    <script src="<?=plugins_dir('icheck/icheck.init.js')?>"></script>
    <!-- ============================================================== -->
    <!-- Nestable js -->
    <!-- ============================================================== -->
    <script src="<?=plugins_dir('nestable/jquery.nestable.js')?>"></script>
    <script type="text/javascript">    
    /**
     * Custom JS - @mel
     */
    (function($){
        /**
         * CKeditor
         */
        if($('.gal-cmsEditor').length){
            CKEDITOR.replace( 'cmsEditor' );
        }
        /**
         * Add Page - SEO
         */
        $( ".text-counter" ).each(function( i, el ){
            var textInput = $(this).children(".input-text");
            var textLimit = $(this).children(".input-text").data("limit"); 
            var textCount = $(this).find(".count-text"); 
            var textLength = textInput.val().length;
            // Initiali count that will read the input value
            textCount.html(textLength);
            if( textLength > textLimit || textLength == '' ){
                textCount.addClass("text-danger");
            }
            // when Change
            textInput.keyup(function() {
                var newTextLength = textInput.val().length;
                textCount.html(newTextLength);
                if( newTextLength > textLimit || newTextLength == '' ){
                    textCount.removeClass("text-success").addClass("text-danger");
                }else{
                    textCount.removeClass("text-danger");
                }
            });
        });

        // Nestable
        var updateOutput = function(e) {
            var list = e.length ? e : $(e.target),
                output = list.data('output');
            if (window.JSON) {
                output.val(window.JSON.stringify(list.nestable('serialize'))); //, null, 2));
            } else {
                output.val('JSON browser support required for this demo.');
            }
        };

        var nestable = $('#nestable');
        if( nestable.length ){
            $('#nestable').nestable({
                group: 1
            }).on('change', updateOutput);
            // $('#nestable2').nestable({
            //     group: 1
            // }).on('change', updateOutput);
            updateOutput($('#nestable').data('output', $('#nestable-output')));
            // updateOutput($('#nestable2').data('output', $('#nestable2-output')));
            // $('#nestable-menu').on('click', function(e) {
            //     var target = $(e.target),
            //         action = target.data('action');
            //     if (action === 'expand-all') {
            //         $('.dd').nestable('expandAll');
            //     }
            //     if (action === 'collapse-all') {
            //         $('.dd').nestable('collapseAll');
            //     }
            // });

            // $('#nestable-menu').nestable();
            
            // Add to Navigation
            $('body').on("click", '.cms-nav-select', function(e){
                e.preventDefault();
                var navTitle = $(this).data('navtitle');
                var theSelectedNav = '<li class="dd-item" data-id="20"><div class="dd-handle">'+navTitle+'</div><i class="mdi mdi-close float-right cms-nav-remove" style="position:absolute;right:10px;top:10px;cursor:pointer;"></i></li>';
                $('#cmsSelectedNav').append(theSelectedNav);
            });            
            $('body').on('click', '.cms-nav-remove', function(e){
                e.preventDefault();
                $(this).parent().remove(); 
            });
            // Save Navigation to DB
            $('#saveMenu').click(function(){
                var t = $('.dd').nestable('serialize');
                console.log(JSON.stringify(t));
            });
        }

    })(jQuery);
    </script>
    <!-- @Mel Scripts -->



    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="<?=plugins_dir('styleswitcher/jQuery.style.switcher.js?v=1.0.1')?>"></script>


    </div>
    </div>
</body>
</html>