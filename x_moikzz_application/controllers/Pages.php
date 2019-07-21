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
     protected $slug = false;
     protected $pageType;
     protected $rs = false;
     protected $page = 'pages';
     protected $bodyClass = 'front';
     
	function __construct(){ 
           parent::__construct(); 
           
   	 	// Get User/Client Device browser Info
       	$this->load->library('user_agent');
        $this->load->helper('url');
    }

    function view($url='home', $sub_url="") {  
        $query3 = $this->global_func_query('mz_system', array('where' =>array('zid !=' =>0))); 
        checked_conf($query3); 

        $static_menu = array();
        $query = $this->global_func_query('mz_postmain', array('where' =>array('zslug' => $url)));
        
        if(!$query && !in_array($url,$static_menu))
            return $this->page_not_found();

        $result = @$query[0];
       
        if(@$result->zslug == $url && $url == 'home'){ 
            $this->jsCustom = 1; 
            $this->filter = array('carousel','slider','select2');
            $this->page = 'home';
            $this->bodyClass = 'home m-index'; 
            $this->pageType = 'website';
        }elseif(@$result->zslug == $url && $url == 'search'){ 
            $this->jsCustom = 2; 
            $this->filter = array('select2');
            $this->page = 'listings';
            $this->bodyClass = 'm-listingsTwo search-page';
            $this->pageType = 'booking';
        }elseif(@$result->zslug == $url && $url == 'about-us'){  
            $this->jsCustom = 3; 
            $this->page = 'about';
            $this->bodyClass = 'about';
            $this->pageType = 'portfolio';
        }elseif( @$result->zslug == $url  && $url == 'dashboard' ){
            $this->jsCustom = 4; 
            $this->page = 'dashboard';
            $this->bodyClass = 'dashboard'; 
        }elseif(@$result->zslug == $url  && $url == 'bookings' ){
            $this->jsCustom = 5; 
            $this->page = 'bookings';
            $this->bodyClass = 'bookings'; 
            $this->pageType = 'bookings';
        }elseif(@$result->zslug == $url && $url == 'profile'){
            $this->jsCustom = 6; 
            $this->page = 'profile';
            $this->bodyClass = 'profile'; 
            $this->pageType = 'profile';
        }elseif(@$result->zslug == $url && $url == 'cart'){
            $this->jsCustom = 7; 
            $this->page = $url;
            $this->bodyClass = $url;  
            $this->pageType = 'cart';
        }else{  
            $this->page = $url;
            $this->bodyClass = $url;
            $this->pageType = 'website';
        }
       
        $this->slug = @$result->zslug ?  @$result->zslug : $url;

        $query2 = $this->global_func_query('mz_postsocialmedia', array('where' =>array('zparent' =>$result->zid)));
        if($query2){
           
            $data = @unserialize($query2[0]->zvalue);
            if ($data !== false) { 
                $this->rs = array_merge($data,$query3);
            } else {
                $this->rs = $query2[0]->zvalue;
            }
           
        }

        $this->display();
    }
 
    private function display(){  
        $data['jsCustom'] = $this->jsCustom; 
        $data['filter_css_js'] = $this->filter;
        $data['bodyClass'] =  $this->bodyClass;
        $data['pageclass'] = 'lists-'.$this->page;
        $data['page'] = $this->page;
        $data['meta'] = $this->rs;
        $data['slug'] = $this->slug;
        $data['breadcrumbs'] = ucwords(str_replace('-',' ',strtolower($this->slug)));
        $data['pageType'] = $this->pageType;
        $this->template->load( 'front/template', 'front/pages/'.$this->page, $data);
    }  
 
}