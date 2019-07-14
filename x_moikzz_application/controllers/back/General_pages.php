<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Description of General_pages
 *
 * @author Moikzz
 */
class General_pages extends SS_Controller { 

    protected $pg; 
    protected $pages;
    protected $menus;
    protected $tableHeaders;
    protected $namespace;
    protected $breadcrumbs;
    protected $pageTitle;
    protected $pageHeaderz;
    protected $addButton = true;
    protected $bodyClass;
    protected $pageClass;
    protected $data_pages;
    protected $lang_z = 'en';
    protected $filter = array();
    protected $jsCustom = false;

    protected $userID;  
    protected $userType;  
    
	function __construct(){ 

	    parent::__construct();  

	    $this->load->helper('form','url');
        $this->lang_z = 'en';
        //$this->session_activated();   
      
      
	} 

	public function index(){
        
		$this->page_not_found();

	}
 
    public function view($page='dashboard'){
        $this->userID = logged_info()['id'];
        $this->userType = logged_info()['type'];

        if( $this->userID != 1 )
        $this->menus = $this->system_default_open($this->userType);

        if( $this->userType != 1){
            $menu_active= @unserialize($this->menus[0]->zvalue);
            $active_pages = $menu_active['pages'];
            
            if (!in_array($page, $active_pages) && $page != 'profile' ){
                $this->page_not_found();
                return false;
            }
        }

        if (!method_exists($this, $page)){
            $this->page_not_found();
            return false;
        }else{
            $this->pg = $page;
            $this->links();
        }
    }

    private function links(){
        $this->data_pages = $this->pg;
        return $this->{$this->data_pages}(); 
    }

    

    private function dashboard(){ 
          // graph , table, form, modal - CSS and JS
          $this->filter = array('table');
          $this->namespace = 'dashboard';
          $this->pageTitle = 'Dashboard';
          $this->bodyClass = 'lists-inquiries';
          $this->pageClass = 'lists-inquiries';  
          $this->page = 'templates/contents/back/'.$this->namespace;
          $this->tableHeaders = array('ID','Customer','Trucks','Loads','From' , 'Urgent?','Date');
          $this->addButton = false;
          $this->jsCustom = 1; 
          $this->template_display(); 
        
    } 

    private function students(){
        
        // graph , table, form, modal - CSS and JS
        $this->filter = array('table');
        $this->namespace = 'students';
        $this->pageTitle = 'Student Information';
        $this->bodyClass = 'lists-students';
        $this->pageClass = 'lists-students';  
        $this->page = 'templates/contents/back/'.$this->namespace;
        $this->jsCustom = 1; 
        $this->template_display(); 
    } 

    private function orders(){ 
        $this->filter = array('table');
        $this->namespace = 'orders';
        $this->pageTitle = 'Order Meals';
        $this->bodyClass = 'lists-orders';
        $this->pageClass = 'lists-orders';  
        $this->jsCustom = 1;
        $this->page = 'templates/contents/back/'.$this->namespace;
       // $this->template_display();  
    } 

    private function payments(){
        $this->filter = array('table'); 
        $this->namespace = 'payments';
        $this->pageTitle = 'Payment History';
        $this->bodyClass = 'lists-payments';
        $this->pageClass = 'lists-payments';  
        $this->jsCustom = 1;
        $this->page = 'templates/contents/back/'.$this->namespace;
        $this->template_display();
    } 

    private function profile(){ 
        
        $this->namespace = 'profile';
        $this->pageTitle = 'My Account Information';
        $this->bodyClass = 'lists-profile';
        $this->pageClass = 'lists-profile';  
        $this->jsCustom = 2; 
        $this->pageHeaderz = "Account's Details";
        $this->page = 'templates/contents/back/'.$this->namespace;
        $this->template_display(); 
    }

    private function inquiries(){
        
        // graph , table, form, modal - CSS and JS
        $this->filter = array('table');
        $this->namespace = 'inquiries';
        $this->pageTitle = 'Recent Inquiries';
        $this->bodyClass = 'lists-inquiries';
        $this->pageClass = 'lists-inquiries';  
        $this->page = 'templates/contents/back/'.$this->namespace;
        $this->tableHeaders = array('ID','Status','Customer','Trucks','Loads','From' , 'Type', 'Urgent?','','Action');
        $this->jsCustom = 1; 
        $this->template_display(); 
    } 

    private function trucks(){
        
        // graph , table, form, modal - CSS and JS
        $this->filter = array('table');
        $this->namespace = 'trucks';
        $this->pageTitle = 'Trucks Information';
        $this->bodyClass = 'lists-trucks';
        $this->pageClass = 'lists-trucks';  
        $this->page = 'templates/contents/back/'.$this->namespace;
        $this->tableHeaders = array('ID','Status','Trucks','<p>Loads</p><small>Max cars</small>','<p>From</p> <small>Origin</small>','<p>To</p> <small>Destination</small>', '<p>N.Price</p> <small>(AED)</small>','</p>A.Price</p> <small>(AED)</small>','<p>P.Price</p> <small>(AED)</small>','Date From','Date To','Action');
        $this->jsCustom = 1;
        $this->template_display();
    }

    private function customers(){ 
        // graph , table, form, modal - CSS and JS
        $this->filter = array('table');
        $this->namespace = 'customers';
        $this->pageTitle = 'All Customers';
        $this->bodyClass = 'lists-customers';
        $this->pageClass = 'lists-customers';  
        $this->page = 'templates/contents/back/'.$this->namespace;
 
        $this->tableHeaders = array('Status','Username','Name','Email','Type','Type','Action');
        $this->jsCustom = 1;
        $this->template_display();
    }

    private function users(){ 
        // graph , table, form, modal - CSS and JS
        $this->filter = array('table');
        $this->namespace = 'users';
        $this->pageTitle = 'All Users';
        $this->bodyClass = 'lists-users';
        $this->pageClass = 'lists-users';  
        $this->page = 'templates/contents/back/'.$this->namespace;

        $this->tableHeaders = array('Status','Username','Name','Email','Type','Type','Action');
        $this->jsCustom = 1;
        $this->template_display();
    }

    private function settings(){
        $this->filter = array('form');
        $this->namespace = 'settings';
        $this->pageTitle = 'System Settings';
        $this->bodyClass = 'lists-settings';
        $this->pageClass = 'lists-settings';  
        $this->jsCustom = 7; 
        $this->pageHeaderz = "Web Information";
        $this->page = 'templates/contents/back/'.$this->namespace;
        $this->template_display(); 
    } 

    private function system(){

        if( $this->userID != 1 )  {$this->page_not_found(); return false;}

        $this->namespace = 'system';
        $this->pageTitle = 'Admin System Settings';
        $this->bodyClass = 'sys-settings';
        $this->pageClass = 'sys-settings';  
        $this->jsCustom = 9; 
        $this->pageHeaderz = "Web Information";
        $this->page = 'templates/contents/back/'.$this->namespace;
        $this->template_display(); 
    }

    /**
     * Pages - @mel
     */
    public function pages(){
        $this->filter = array('table');
        $this->namespace = 'pages';
        $this->pageTitle = 'Pages';
        $this->bodyClass = 'page';
        $this->pageClass = 'page';  
        $this->jsCustom = 1; 
        $this->pageHeaderz = "Pages";
        $this->tableHeaders = array('Title','Author','Date','Status','','Action');
        $this->page = 'templates/contents/back/'.$this->namespace;
        $this->template_display(); 
    }
    public function posts(){
        $this->filter = array('table');
        $this->namespace = 'posts';
        $this->pageTitle = 'Posts';
        $this->bodyClass = 'post';
        $this->pageClass = 'post';  
        $this->jsCustom = 1; 
        $this->pageHeaderz = "Posts";
        $this->tableHeaders = array('Title','Author','Date','Status','','Action');
        $this->page = 'templates/contents/back/'.$this->namespace;
        $this->template_display(); 
    }
    public function menus(){
        $this->filter = array('nested');
        $this->namespace = 'menus';
        $this->pageTitle = 'Menus';
        $this->bodyClass = 'menu';
        $this->pageClass = 'menu';  
        $this->jsCustom = 12; 
        $this->pageHeaderz = "Menus";
        $this->page = 'templates/contents/back/'.$this->namespace;
        $this->template_display(); 
    }
    public function media(){
        $this->filter = array('fileupload','lazyload');
        $this->namespace = 'media';
        $this->pageTitle = 'Media';
        $this->bodyClass = 'lists-media';
        $this->pageClass = 'lists-media';  
        $this->jsCustom = 1; 
        $this->pageHeaderz = "Media";
        $this->page = 'templates/contents/back/'.$this->namespace;
        $this->template_display(); 
    }

    private function template_display(){ 
        $data['breadcrumbs'] = '<li class="breadcrumb-item active">'.ucfirst($this->namespace).'</li>';
        $data['filter_css_js'] = $this->filter;
        $data['pages'] =  $this->namespace;
        $data['title'] = $this->pageTitle;
        $data['pagetitle'] = $this->pageTitle;
        $data['bodyClass'] = $this->bodyClass;
        $data['pageclass'] = $this->pageClass;
        $data['pageHeader'] = $this->pageHeaderz;
        $data['userID'] = $this->userID;
        $data['userType'] = $this->userType;
        $data['active_menus'] = $this->menus;
        $data['tableHeaders'] = $this->tableHeaders;

        $option_active= @unserialize($this->menus[0]->zvalue);
        $option_active =  json_encode($option_active['options']);
        if($this->userType == 1){
            $option_active = 'all';
        }
        
        $data['options'] = $option_active;
        $data['addButton'] = $this->addButton;
                
        $data['jsCustom'] = $this->jsCustom;
        $data['system'] = 'Moikzz Application';
      
        $this->template->load( 'back/template', $this->page, $data); 
    }
    
}