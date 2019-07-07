<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Description of Page Lists
 *
 * @author Moikzz
 */
class Page_lists extends SS_Controller {  
    protected $systemTitle = 'Moikzz Application';
    protected $page;
    protected $postType;
    protected $breadcrumbs;
    protected $userInfo;
    protected $title;
    protected $viewPage;
    protected $pageTitle;
    protected $pageHeader;
    protected $bodyClass;
    protected $pageClass;
    protected $crud;
    protected $data_pages;
    protected $controller;
    protected $lang_z;
    protected $jsCustom = false;
    protected $filter = array();
    
    protected $userID; // need to change to login user - temporary only
    protected $userType; //This will be change to session logged type - temporary only
    function __construct(){  
        parent::__construct();
        $this->load->helper('url');
        $this->lang_z = 'en'; 
    } 

    public function index(){
        
       $this->page_not_found();

    }

    public function view( $func=null, $page=''){ 

        $this->userID = logged_info()['id'];
        $this->userType = logged_info()['type'];
        
<<<<<<< HEAD
      
            if (!method_exists($this, $page)){
            $this->page_not_found();
=======
        $this->menus = $this->system_default_open($this->userType);
        if($this->userType != 1){
            $menu_active= @unserialize($this->menus[0]->zvalue);
            $active_pages = $menu_active['pages'];    
            if (!in_array($func, $active_pages)){
                $this->page_not_found();
                return false;
            }
        }

        if (!method_exists($this, $page)){
           $this->page_not_found();
>>>>>>> Moikzz
            return false;
        }else{ 
            $this->links($page,$func); 
        }
    }

    private function links($p, $func){
        $this->data_pages = $p;
        $this->controller = $func; 
        return $this->{$this->data_pages}();
    }

    private function invoice(){
<<<<<<< HEAD
        $v = $this->controller;
        $data['breadcrumbs'] = '<li class="breadcrumb-item"><a href="'.base_url().'client/page/'.$v.'/">'.ucfirst($v).'</a></li><li class="breadcrumb-item active"> Invoice </li>';
        $data['pages'] = 'invoice';
        $data['pagetitle'] = 'View Invoice';
        $data['pageHeader'] = '';
        $this->filter = array('print');
        // graph , table, form, modal - CSS and JS
        $data['filter_css_js'] = $this->filter;

        $data['bodyClass'] = 'view-invoice';
        $data['pageclass'] = 'view-invoice';        
        $this->template->load( 'back/template', 'back/forms/invoice.html', $data); 
    }

    private function payments(){
        $v = $this->controller;
        $data['breadcrumbs'] = '<li class="breadcrumb-item"><a href="'.base_url().'client/page/'.$v.'/">'.ucfirst($v).'</a></li><li class="breadcrumb-item active"> Payment </li>';
        $data['pages'] = 'payment';
        $data['pagetitle'] = 'Topup Account';
        $data['pageHeader'] = 'Account Payment';
        $this->filter = array('print');
        // graph , table, form, modal - CSS and JS
        $data['filter_css_js'] = $this->filter;
        $this->jsCustom = 3;
        $data['jsCustom'] = $this->jsCustom;
        $data['bodyClass'] = 'payment-account';
        $data['pageclass'] = 'payment-account';

        $stud_id = @$_GET['id'] ?  $_GET['id'] : null;
=======
        $this->breadcrumbs = 'Invoice'; 
        $this->page = 'invoice';
        $this->pageTitle = 'View Invoice';
        $this->pageHeader = '';
        
        $this->filter = array('print');
       
        $this->title = 'Invoices';
        $this->bodyClass = 'view-invoice';
        $this->pageClass = 'view-invoice'; 

        $this->viewPage = 'back/forms/invoice.html'; 
        $this->template_display();
    }

    private function payments(){ 
        $this->breadcrumbs = 'Payment';
        $this->page = 'payment';
        $this->pageTitle  = 'Topup Account';
        $this->pageHeader = 'Account Payment';
        $this->filter = array('print'); 
       
        $this->jsCustom = 3;
        
        $this->bodyClass = 'payment-account';
        $this->pageClass = 'payment-account';
        $this->title = 'Payments';
        $stud_id = @$_GET['id'] ?  $_GET['id'] : null;  
>>>>>>> Moikzz

        if(!$stud_id) return $this->page_not_found();

        $where = array('zid' => $stud_id);
        $field = array('zfirstname', 'zlastname');

        $stud_name = $this->global_get_title('mz_subprofile', $where,$field);
        if($stud_name) 
        $this->userInfo = $stud_name[0]->zfirstname . ' ' . $stud_name[0]->zlastname;
        
        $this->viewPage = 'back/forms/payments.html';
        $this->template_display();
    }

<<<<<<< HEAD
    private function menus(){
        $v = $this->controller;
        $data['breadcrumbs'] = '<li class="breadcrumb-item"><a href="'.base_url().'client/page/'.$v.'/">'.ucfirst($v).'</a></li><li class="breadcrumb-item active"> Orders </li>';
        $data['pages'] = 'orders';
        $data['pagetitle'] = 'Menu Order';
        $data['pageHeader'] = 'Food Selection';

=======
    private function menus(){ 
        
        $this->breadcrumbs = 'Orders';
        $this->page = 'orders';
        $this->pageTitle = 'Menu Order';
        $this->pageHeader = 'Food Selection';
        $this->title= 'Menus';
>>>>>>> Moikzz
        $this->jsCustom = 4;
        
        $this->filter = array('');
 

        $this->bodyClass = 'food-selection';
        $this->pageClass = 'food-selection';        
       
        $this->viewPage = 'back/forms/food_menus.html';
        $this->template_display();
    }

    private function create(){
        if($this->controller == 'students'){
            $this->jsCustom = 5;
            $this->student_add();
<<<<<<< HEAD
        }elseif($this->controller == 'pages'){
            $this->jsCustom = 5;
            $this->add_page();
        }elseif($this->controller == 'posts'){
            $this->jsCustom = 5;
            $this->add_post();
=======
        }elseif($this->controller == 'users'){
            $this->jsCustom = 6;
            $this->users_add();
        }elseif($this->controller == 'customers'){
            $this->jsCustom = 6;
            $this->users_add();
<<<<<<< HEAD
>>>>>>> moikzz
=======
        }elseif($this->controller == 'trucks'){
            $this->jsCustom = 8;
            $this->breadcrumbs = 'Add New';
            $this->page = 'addnew';
            $this->pageTitle = 'Add New';
            $this->trucks_info();
        }elseif($this->controller == 'pages'){
            $this->jsCustom = 11;
            $this->breadcrumbs = 'Add New';
            $this->page = 'addnew';
            $this->postType = 'page';
            $this->pageTitle = 'Add New';
            $this->pages_info();
        }elseif($this->controller == 'posts'){
            $this->jsCustom = 11;
            $this->breadcrumbs = 'Add New';
            $this->page = 'addnew';
            $this->postType = 'posts';
            $this->pageTitle = 'Add New';
            $this->pages_info();
>>>>>>> Moikzz
        }
    }

    private function update(){
        $option_active= @unserialize($this->menus[0]->zvalue);
        $option_active =  $option_active['options'];
       
        if( $this->userType != 1 && !in_array('edit',$option_active)){
            $this->page_not_found();
            return false;
        }
        
        if($this->controller == 'students'){
            $this->jsCustom = 5;
            $this->student_edit();
<<<<<<< HEAD
        }elseif($this->controller == 'pages'){
            $this->jsCustom = 5;
            $this->edit_page();
        }elseif($this->controller == 'posts'){
            $this->jsCustom = 5;
            $this->edit_post();
=======
        }elseif($this->controller == 'users'){
            $this->jsCustom = 6;
            $this->users_edit();
        }elseif($this->controller == 'customers'){
            $this->jsCustom = 6;
            $this->customer_edit();
<<<<<<< HEAD
>>>>>>> moikzz
=======
        }elseif($this->controller == 'trucks'){
            $this->jsCustom = 8;
            $this->breadcrumbs = 'Update';
            $this->page = 'updating';
            $this->pageTitle = 'Update Fleet Info';
            $this->trucks_info();
        }elseif($this->controller == 'inquiries'){
            $this->jsCustom = 10;
            $this->breadcrumbs = 'Update';
            $this->page = 'inquiries';
            $this->pageTitle = 'Update Inquiry';
            $this->inquiry_info();
        }elseif($this->controller == 'pages'){
            $this->jsCustom = 11;
            $this->breadcrumbs = 'Update';
            $this->page = 'updating';
            $this->postType = 'page';
            $this->pageTitle = 'Update Page';
            $this->pages_info();
        }elseif($this->controller == 'posts'){
            $this->jsCustom = 11;
            $this->breadcrumbs = 'Update';
            $this->page = 'updating';
            $this->postType = 'posts';
            $this->pageTitle = 'Update Post';
            $this->pages_info();
>>>>>>> Moikzz
        }
    }

    private function views(){
        $option_active= @unserialize($this->menus[0]->zvalue);
        $option_active =  $option_active['options'];
       
        if($this->userType != 1 && !in_array('view',$option_active)){
            $this->page_not_found();
            return false;
        }

        if($this->controller == 'students'){
            $this->jsCustom = 5;
            $this->student_view();
        }elseif($this->controller == 'inquiries'){
            $this->jsCustom = 10;
            $this->breadcrumbs = 'View';
            $this->page = 'view';
            $this->pageTitle = 'View Inquiry';
            $this->inquiry_info();
        }elseif($this->controller == 'pages'){
            $this->jsCustom = 11;
            $this->breadcrumbs = 'View';
            $this->page = 'view';
            $this->pageTitle = 'View Page';
            $this->pages_info();
        }
    }

<<<<<<< HEAD
<<<<<<< HEAD
    /**
     * @Mel Controllers
     */

    // Pages
    public function add_page(){
        
=======
    private function customer_edit(){
        $data['system'] = 'Moikzz Application';
=======
     /**
     * @Mel Controllers
     */
    // Pages
    public function pages_info(){
        
>>>>>>> Moikzz
        $v = $this->controller;
       
        $this->filter = array('ckeditor'); 
        
        $this->title = 'Page'; 
        $this->bodyClass = $v;
        $this->pageClass = 'add-new'.$v;        

        $this->viewPage = 'back/forms/pages_form.html';
        $this->template_display();
      
    }

<<<<<<< HEAD
    private function users_add(){
        $data['system'] = 'Moikzz Application';
>>>>>>> moikzz
        $v = $this->controller;
        $data['breadcrumbs'] = '<li class="breadcrumb-item"><a href="'.base_url().'client/page/'.$v.'/">'.ucfirst($v).'</a></li><li class="breadcrumb-item active"> Add New </li>';
        $data['pages'] = 'addnew';
        $data['pagetitle'] = 'Add New';
        $this->filter = array('');
        // graph , table, form, modal - CSS and JS
        $data['filter_css_js'] = $this->filter;
=======
    private function inquiry_info(){
        $v = $this->controller;
        
        $this->filter = array(''); 
      
        $this->title = 'Inquiry'; 
        $this->bodyClass = $v;
        $this->pageClass = 'update-info'.$v;        
        
        $this->viewPage = 'back/forms/inquiry_form.html';
        $this->template_display();
>>>>>>> Moikzz

    }

    private function trucks_info(){
        $v = $this->controller;
        
        $this->filter = array('formpicker'); 
      
        $this->title = 'Truck'; 
        $this->bodyClass = $v;
        $this->pageClass = 'add-new'.$v;        
        
        $this->viewPage = 'back/forms/trucks_form.html';
        $this->template_display();

<<<<<<< HEAD
        $data['bodyClass'] = $v;
        $data['pageclass'] = 'add-new-'.$v;        
        $this->template->load( 'back/template', 'back/forms/page/add_page', $data); 
=======
>>>>>>> Moikzz
    }
    public function edit_page(){
        
        $v = $this->controller;
        $data['breadcrumbs'] = '<li class="breadcrumb-item"><a href="'.base_url().'client/page/'.$v.'/">'.ucfirst($v).'</a></li><li class="breadcrumb-item active"> Edit Page </li>';
        $data['pages'] = 'editpage';
        $data['pagetitle'] = 'Edit Page';
        $this->filter = array('');
        // graph , table, form, modal - CSS and JS
        $data['filter_css_js'] = $this->filter;

<<<<<<< HEAD
        $data['jsCustom'] = $this->jsCustom;

        $data['bodyClass'] = $v;
        $data['pageclass'] = 'edit-'.$v;        
        $this->template->load( 'back/template', 'back/forms/page/edit_page', $data); 
    }

    // Posts
    public function add_post(){
        
        $v = $this->controller;
        $data['breadcrumbs'] = '<li class="breadcrumb-item"><a href="'.base_url().'client/page/'.$v.'/">'.ucfirst($v).'</a></li><li class="breadcrumb-item active"> Add New </li>';
        $data['pages'] = 'addnew';
        $data['pagetitle'] = 'Add New';
        $this->filter = array('');
        // graph , table, form, modal - CSS and JS
        $data['filter_css_js'] = $this->filter;

        $data['jsCustom'] = $this->jsCustom;

        $data['bodyClass'] = $v;
        $data['pageclass'] = 'add-new-'.$v;        
        $this->template->load( 'back/template', 'back/forms/post/add_post', $data); 
    }
    public function edit_post(){
        
        $v = $this->controller;
        $data['breadcrumbs'] = '<li class="breadcrumb-item"><a href="'.base_url().'client/page/'.$v.'/">'.ucfirst($v).'</a></li><li class="breadcrumb-item active"> Edit Post </li>';
        $data['pages'] = 'editpost';
        $data['pagetitle'] = 'Edit Post';
        $this->filter = array('');
        // graph , table, form, modal - CSS and JS
        $data['filter_css_js'] = $this->filter;

        $data['jsCustom'] = $this->jsCustom;

        $data['bodyClass'] = $v;
        $data['pageclass'] = 'edit-'.$v;        
        $this->template->load( 'back/template', 'back/forms/post/edit_post', $data); 
=======
    private function customer_edit(){ 
        $v = $this->controller;
        $this->breadcrumbs = 'Edit';
        $this->page = 'updating';
        $this->pageTitle = 'Update User Info';
        $this->filter = array('');
       
      
        $this->title = 'User'; 
        $this->bodyClass = $v;
        $this->pageClass = 'update-info'.$v;        
        
        $this->viewPage = 'back/forms/customer_form.html';
        $this->template_display();
    }

    private function users_add(){ 
        $v = $this->controller;
        $this->breadcrumbs = 'Add New';
        $this->page = 'addnew';
        $this->title = 'User';
        $this->pageTitle = 'Add New';
        $this->filter = array('');
 
        $this->bodyClass = $v;
        $this->pageClass = 'add-new-'.$v;        
        
        $this->viewPage = 'back/forms/users_form.html';
        $this->template_display();
>>>>>>> Moikzz
    }
    // @Mel Controllers





<<<<<<< HEAD
    private function student_add(){
        $v = $this->controller;
        $data['breadcrumbs'] = '<li class="breadcrumb-item"><a href="'.base_url().'client/page/'.$v.'/">'.ucfirst($v).'</a></li><li class="breadcrumb-item active"> Add New </li>';
        $data['pages'] = 'addnew';
        $data['pagetitle'] = 'Add New';
=======
    private function users_edit(){
        $v = $this->controller;
        $this->breadcrumbs = 'Edit';
        $this->page = 'updating';
        $this->pageTitle = 'Update User Info';
>>>>>>> Moikzz
        $this->filter = array('');
       
        $this->title = 'User'; 
        $this->bodyClass = $v;
        $this->pageClass = 'update-info'.$v;        
         
        $this->viewPage = 'back/forms/users_form.html';
        $this->template_display();
    }

    private function student_add(){
        $v = $this->controller;
        $this->breadcrumbs = 'Add New';
        $this->page= 'addnew';
        $this->title = 'Students';
        $this->pageTitle = 'Add New';
        $this->filter = array('');
  

        $this->bodyClass = $v;
        $this->pageClass = 'add-new-'.$v;        
        
        $this->viewPage = 'back/forms/students_form.html';
        $this->template_display();
    }

    private function student_edit(){
        $v = $this->controller;
        $this->breadcrumbs = 'Edit';
        $this->page = 'updating';
        $this->pageTitle = 'Update Student Info';
        $this->filter = array('');
<<<<<<< HEAD
        // graph , table, form, modal - CSS and JS
        $data['filter_css_js'] = $this->filter;
        
        $data['change_status'] = true;
        //$data['schools'] = 

        $data['jsCustom'] = $this->jsCustom;
        $data['bodyClass'] = $v;
        $data['pageclass'] = 'update-info'.$v;        
        $this->template->load( 'back/template', 'back/forms/students_form.html', $data); 
    }

    private function student_view(){
=======
        
        $this->title = 'Students';
       
        $this->bodyClass = $v;
        $this->pageClass = 'update-info'.$v;        
        $this->viewPage = 'back/forms/students_form.html';
        $this->template_display();
    }

    private function student_view(){
        
        $this->breadcrumbs = 'View';
        $this->page = 'view';
        $this->pageTitle = 'View Student Info';
        $this->filter = array(''); 
        
        $this->title = 'Students';  
        
        $this->bodyClass = 'view-info';
        $this->pageClass = 'view-info'.$v;        
        $this->viewPage = 'back/forms/students_form.html';
        $this->template_display();
    }

    private function template_display(){ 
        $data['system'] = $this->systemTitle;
>>>>>>> Moikzz
        $v = $this->controller;
        $data['breadcrumbs'] = '<li class="breadcrumb-item"><a href="'.base_url().'client/page/'.$v.'/">'.ucfirst($v).'</a></li><li class="breadcrumb-item active"> '. $this->breadcrumbs.' </li>';
        $data['pages'] = $this->page;
        $data['pagetitle'] = $this->pageTitle;
        $data['bodyClass'] = $this->bodyClass;
        $data['pageHeader'] =$this->pageHeader;
       
        // graph , table, form, modal - CSS and JS
        $data['filter_css_js'] = $this->filter;
<<<<<<< HEAD

=======
        $data['title'] = $this->title;
>>>>>>> Moikzz
        $data['jsCustom'] = $this->jsCustom;

        $data['active_menus'] = $this->menus;
        $data['userID'] = $this->userID;
        $data['userType'] = $this->userType; 

        $data['student_info'] = $this->userInfo;
        
        $data['pageclass'] = $this->pageClass;
        $data['post_type'] = $this->postType;
      
        $option_active= @unserialize($this->menus[0]->zvalue);
        $option_active =  json_encode($option_active['options']);
        if($this->userType == 1){
            $option_active = 'all';
        }
        
        $data['options'] = $option_active;
        
        $this->template->load( 'back/template', $this->viewPage, $data); 
    }
}