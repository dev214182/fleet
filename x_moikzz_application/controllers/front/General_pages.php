<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
class General_pages extends SS_Controller {

    function __construct(){

        parent::__construct(); 
        $this->load->model('Global_Model');
        $this->load->helper('form','url','file'); 
        $this->load->library('form_validation'); 
    } 
    
    public function index(){ 
        $this->page_not_found(); 
    }
    
    function cart_listing_callback(){ 
      
        $data =  $this->input->post('items');
        
                 
        echo json_encode(array('success'=>$success, 'respond' => $data));
          
    }
} 