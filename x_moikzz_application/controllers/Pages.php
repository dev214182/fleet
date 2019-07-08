<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
/**
 * Description of Pages
 *
 * @author Moikzz
 */
<<<<<<< HEAD
class Pages extends CI_Controller{ 
<<<<<<< HEAD

     protected $filter = array();
     protected $page = 'pages';
	 protected $bodyClass = 'front';

	function __construct(){ 

       	parent::__construct(); 

   	 	// Get User/Client Device browser Info
       	$this->load->library('user_agent');

        $this->load->helper('url');
    }

	public function view( $page='home'){
        
=======
=======
include APPPATH.'core/SS_Fcontroller.php';
class Pages extends SS_Fcontroller{ 

>>>>>>> July 8
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
<<<<<<< HEAD
	public function view( $page='home'){
       
>>>>>>> Moikzz
        if (!method_exists($this, $page)){
            $data['bodyClass'] =  $this->bodyClass;
            page_not_found($data);
            return false;
        }else{  
            $this->links($page);
        } 
    }
    
    private function links($p){
        $this->data_pages = $p;
        return $this->{$this->data_pages}();
    }
<<<<<<< HEAD



=======
>>>>>>> Moikzz
    /**
     * @mel
     * User Pages
     */
    private function dashboard(){ 
<<<<<<< HEAD
        $this->filter = array('');
=======
        $this->filter = array('carousel','slider','select2');
>>>>>>> Moikzz
    	$this->page = 'dashboard';
        $this->bodyClass = 'dashboard';
        $this->display('dashboard page');
    }
    private function bookings(){ 
        $this->filter = array('');
    	$this->page = 'bookings';
        $this->bodyClass = 'bookings';
        $this->display('bookings page');
    }
    private function profile(){ 
        $this->filter = array('');
    	$this->page = 'profile';
        $this->bodyClass = 'profile';
        $this->display('profile page');
    }
    /* User Pages */
<<<<<<< HEAD



=======
>>>>>>> Moikzz
    private function home(){ 
        $this->filter = array('');
    	$this->page = 'home';
        $this->bodyClass = 'home m-index';
        $this->display('home page');
    } 
<<<<<<< HEAD

=======
>>>>>>> Moikzz
    private function about(){ 
        $this->filter = array('');
    	$this->page = 'about';
        $this->bodyClass = 'about';
        $this->display('About us');
    } 
<<<<<<< HEAD

=======
>>>>>>> Moikzz
    private function contact(){ 
         
        $this->filter = array('');
        $this->page = 'contact';
        $this->bodyClass = 'contact-us';
        $this->display('contact us');
    } 
<<<<<<< HEAD

=======
>>>>>>> Moikzz
    private function search(){ 
         
        $this->filter = array('select2');
        $this->page = 'listings';
        $this->bodyClass = 'm-listingsTwo search-page';
        $this->display('truck listing');
    } 
<<<<<<< HEAD

    private function cart(){ 
         
        $this->filter = array('');

        // filename - views/front/pages
        $this->page = 'cart';

        $this->bodyClass = 'cart inquire-now';
        $this->display('cart');
    } 

    private function display($p){ 
      
        $p = str_replace(' ', '', $p);
     
=======
    private function cart(){ 
         
        $this->filter = array('');
        // filename - views/front/pages
        $this->page = 'cart';
        $this->bodyClass = 'cart inquire-now';
        $this->display('cart');
    } 
    private function display($p){ 
=======

    function view($url='home', $sub_url="") {  
        $static_menu = array('profile','bookings','dashboard');
        $query = $this->global_func_query('mz_postmain', array('where' =>array('zslug' => $url)));
        
        if(!$query && !in_array($url,$static_menu))
            return $this->page_not_found();

        $result = @$query[0];
>>>>>>> July 8
      
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
         
<<<<<<< HEAD
>>>>>>> Moikzz
=======
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
>>>>>>> July 8
        $data['filter_css_js'] = $this->filter;
        $data['bodyClass'] =  $this->bodyClass;
        $data['pageclass'] = 'lists-'.$this->page;
 
<<<<<<< HEAD
        // fields - text
        // group_by - text
        // where - array() - Normal where clause
        // likes - array() - where like clause
        // orlike - array() - where OR like clause
        
        /**** Note: if likes has value, the normal where clause is omitted. ****/
        
        //orlike is omitted if likes is empty
        // order_by - array()
        // order - array()
        // limit - int
        // offset - int 

        /***
            $query = array( 'fields' => 'id, name, email',
                            'group_by' => '' ,
                            'where' => array('',''),
                            'likes' => array('',''),
                            'orlike' => array('',''),
                            'order_by' => array('',''),
                            'order' => array('',''),
                            'limit' => 5,
                            'offset' => 0);
        ***/
        //$query = array('fields'=> 'zid,zecode,zname','where'=> array('zcompany'=>'GAC'),'limit' => 2);
        //$data['records'] = $this->global_func_query('x_cashless', $query);
       
        $this->template->load( 'front/template', 'front/pages/'.$this->page.'.php', $data);

=======
        $this->template->load( 'front/template', 'front/pages/'.$this->page.'.php', $data);
>>>>>>> Moikzz
    }  
 
}