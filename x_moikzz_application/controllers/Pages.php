<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
/**
 * Description of Pages
 *
 * @author Moikzz
 */
include APPPATH.'core/SS_Fcontroller.php';
class Pages extends SS_Fcontroller{ 

     protected $filter = array();
     protected $jsCustom = false;
     protected $page = 'pages';
     protected $bodyClass = 'front';
     
	function __construct(){ 
           parent::__construct(); 
           
   	 	// Get User/Client Device browser Info
       	$this->load->library('user_agent');
        $this->load->helper('url');
    }

    function view($url='home', $sub_url="") {  
        $static_menu = array('profile','bookings','dashboard');
        $query = $this->global_func_query('mz_postmain', array('where' =>array('zslug' => $url)));
        
        if(!$query && !in_array($url,$static_menu))
            return $this->page_not_found();

        $result = @$query[0];
      
        if(@$result->zslug == $url && $url == 'home'){ 
            $this->jsCustom = 1; 
            $this->filter = array('carousel','slider','select2');
            $this->page = 'home';
            $this->bodyClass = 'home m-index'; 

        }elseif(@$result->zslug == $url && $url == 'search'){ 
            $this->jsCustom = 2; 
            $this->filter = array('select2');
            $this->page = 'listings';
            $this->bodyClass = 'm-listingsTwo search-page';
          
        }elseif(@$result->zslug == $url && $url == 'about-us'){  
            $this->jsCustom = 3; 
            $this->page = 'about';
            $this->bodyClass = 'about';
         
        }elseif( (@$result->zslug == $url  ) || $url == 'dashboard' && in_array($url,$static_menu) ){
            $this->jsCustom = 4; 
            $this->page = 'dashboard';
            $this->bodyClass = 'dashboard';
         
        }elseif( (@$result->zslug == $url ) || $url == 'bookings' && in_array($url,$static_menu) ){
            $this->jsCustom = 5; 
            $this->page = 'bookings';
            $this->bodyClass = 'bookings'; 

        }elseif((@$result->zslug == $url ) || $url == 'profile' && in_array($url,$static_menu)){
            $this->jsCustom = 6; 
            $this->page = 'profile';
            $this->bodyClass = 'profile'; 

        }else{ 
            
            $this->page = $url;
            $this->bodyClass = $url; 

        }

        $this->display();
    }
 
    private function display(){  
        $data['jsCustom'] = $this->jsCustom; 
        $data['filter_css_js'] = $this->filter;
        $data['bodyClass'] =  $this->bodyClass;
        $data['pageclass'] = 'lists-'.$this->page;
 
        $this->template->load( 'front/template', 'front/pages/'.$this->page.'.php', $data);
    }  
 
}