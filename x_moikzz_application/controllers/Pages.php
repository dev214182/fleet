<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
/**
 * Description of Pages
 *
 * @author Moikzz
 */
class Pages extends CI_Controller{ 

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



    /**
     * @mel
     * User Pages
     */
    private function dashboard(){ 
        $this->filter = array('');
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



    private function home(){ 
        $this->filter = array('');
    	$this->page = 'home';
        $this->bodyClass = 'home m-index';
        $this->display('home page');
    } 

    private function about(){ 
        $this->filter = array('');
    	$this->page = 'about';
        $this->bodyClass = 'about';
        $this->display('About us');
    } 

    private function contact(){ 
         
        $this->filter = array('');
        $this->page = 'contact';
        $this->bodyClass = 'contact-us';
        $this->display('contact us');
    } 

    private function search(){ 
         
        $this->filter = array('');
        $this->page = 'listings';
        $this->bodyClass = 'm-listingsTwo search-page';
        $this->display('truck listing');
    } 

    private function cart(){ 
         
        $this->filter = array('');

        // filename - views/front/pages
        $this->page = 'cart';

        $this->bodyClass = 'cart inquire-now';
        $this->display('cart');
    } 

    private function display($p){ 
      
        $p = str_replace(' ', '', $p);
     
        $data['filter_css_js'] = $this->filter;
        $data['bodyClass'] =  $this->bodyClass;
        $data['pageclass'] = 'lists-'.$p;
 
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

    }  
 
}