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
<<<<<<< HEAD
        /*$comp = $this->input->post('company');
        $dept = $this->input->post('department');
        $pos = $this->input->post('position');
        $profiles = $this->get_profiles_filters($comp,$dept,$pos);*/
        $data =  $this->input->post('items');
            //if(@$profiles){
                
            // ob_start();?> 
                 
                
               
                <?php // $contents = ob_get_contents();
               // ob_end_clean();
                $success = true;
                 
                echo json_encode(array('success'=>$success, 'respond' => $data));
           // }
=======
      
        $data =  $this->input->post('items');
        
                 
        echo json_encode(array('success'=>$success, 'respond' => $data));
          
>>>>>>> Moikzz
    }
} 