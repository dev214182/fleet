<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Description of Page Lists
 *
 * @author Moikzz
 */
class Page_lists extends SS_Controller {  
    protected $data_pages;
    protected $controller;
    protected $lang_z;
    protected $jsCustom = false;
    protected $filter = array();
    protected $userID = 2;

    function __construct(){  
        parent::__construct();
        $this->load->helper('url');
        $this->lang_z = 'en'; 
    } 

    public function index(){
        
       $this->page_not_found();

    }

    public function view( $func=null, $page=''){ 
        
      
            if (!method_exists($this, $page)){
            $this->page_not_found();
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

        if(!$stud_id) return $this->page_not_found();

        $where = array('zid' => $stud_id);
        $field = array('zfirstname', 'zlastname');

        $stud_name = $this->global_get_title('mz_subprofile', $where,$field);
        if($stud_name)
        $data['student_info'] = $stud_name[0]->zfirstname . ' ' . $stud_name[0]->zlastname;

        $this->template->load( 'back/template', 'back/forms/payments.html', $data); 
    }

    private function menus(){
        $v = $this->controller;
        $data['breadcrumbs'] = '<li class="breadcrumb-item"><a href="'.base_url().'client/page/'.$v.'/">'.ucfirst($v).'</a></li><li class="breadcrumb-item active"> Orders </li>';
        $data['pages'] = 'orders';
        $data['pagetitle'] = 'Menu Order';
        $data['pageHeader'] = 'Food Selection';

        $this->jsCustom = 4;
        $data['jsCustom'] = $this->jsCustom;

        $this->filter = array('');
        // graph , table, form, modal - CSS and JS
        $data['filter_css_js'] = $this->filter;

        $data['bodyClass'] = 'food-selection';
        $data['pageclass'] = 'food-selection';        
        $this->template->load( 'back/template', 'back/forms/food_menus.html', $data); 
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
>>>>>>> moikzz
        }
    }

    private function update(){
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
>>>>>>> moikzz
        }
    }

    private function views(){
        if($this->controller == 'students'){
            $this->jsCustom = 5;
            $this->student_view();
        }
    }

<<<<<<< HEAD
    /**
     * @Mel Controllers
     */

    // Pages
    public function add_page(){
        
=======
    private function customer_edit(){
        $data['system'] = 'Moikzz Application';
        $v = $this->controller;
        $data['breadcrumbs'] = '<li class="breadcrumb-item"><a href="'.base_url().'client/page/'.$v.'/">'.ucfirst($v).'</a></li><li class="breadcrumb-item active"> Edit </li>';
        $data['pages'] = 'updating';
        $data['pagetitle'] = 'Update User Info';
        $this->filter = array('');
        // graph , table, form, modal - CSS and JS
        $data['filter_css_js'] = $this->filter;
        $data['title'] = 'User';
        

        $data['jsCustom'] = $this->jsCustom;
        $data['bodyClass'] = $v;
        $data['pageclass'] = 'update-info'.$v;        
        $this->template->load( 'back/template', 'back/forms/customer_form.html', $data); 
    }

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

        $data['jsCustom'] = $this->jsCustom;

        $data['bodyClass'] = $v;
        $data['pageclass'] = 'add-new-'.$v;        
        $this->template->load( 'back/template', 'back/forms/page/add_page', $data); 
    }
    public function edit_page(){
        
        $v = $this->controller;
        $data['breadcrumbs'] = '<li class="breadcrumb-item"><a href="'.base_url().'client/page/'.$v.'/">'.ucfirst($v).'</a></li><li class="breadcrumb-item active"> Edit Page </li>';
        $data['pages'] = 'editpage';
        $data['pagetitle'] = 'Edit Page';
        $this->filter = array('');
        // graph , table, form, modal - CSS and JS
        $data['filter_css_js'] = $this->filter;

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
    }
    // @Mel Controllers





    private function student_add(){
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
        $this->template->load( 'back/template', 'back/forms/students_form.html', $data); 
    }

    private function student_edit(){
        $v = $this->controller;
        $data['breadcrumbs'] = '<li class="breadcrumb-item"><a href="'.base_url().'client/page/'.$v.'/">'.ucfirst($v).'</a></li><li class="breadcrumb-item active"> Edit </li>';
        $data['pages'] = 'updating';
        $data['pagetitle'] = 'Update Student Info';
        $this->filter = array('');
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
        $v = $this->controller;
        $data['breadcrumbs'] = '<li class="breadcrumb-item"><a href="'.base_url().'client/page/'.$v.'/">'.ucfirst($v).'</a></li><li class="breadcrumb-item active"> View </li>';
        $data['pages'] = 'view';
        $data['pagetitle'] = 'View Student Info';
        $this->filter = array('');
        // graph , table, form, modal - CSS and JS
        $data['filter_css_js'] = $this->filter;

        $data['jsCustom'] = $this->jsCustom;
        
        $data['bodyClass'] = 'view-info';
        $data['pageclass'] = 'view-info'.$v;        
        $this->template->load( 'back/template', 'back/forms/students_form.html', $data); 
    }
}