<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends SS_Controller { 
    function __construct(){ 
       parent::__construct(); 
   
        $this->load->helper('form','url'); 
        $this->load->library('form_validation'); 
    }
    public function index(){
        $query3 = $this->global_func_query('mz_system', array('where' =>array('zid !=' =>0))); 
       // session_destroy();  

        checked_conf($query3); 
        if ( !$this->session->userdata('logged_in') ) {  
            
            $data['ci_title'] = 'Login';
            $data['pageclass'] = 'login';
            $data['jsCustom'] = ''; 
            $data['filter_css_js'] = '';
            $data['bodyClass'] =  'login'; 
            $data['meta'] = $query3;
            $data['pageType'] = 'login';
         
            $this->load->view('front/pages/login', $data);
         
        }else{
            redirect('client/page/dashboard/');
        } 
    } 
    
    public function verification(){ 
        $array = json_decode(file_get_contents('php://input'));
        if($array && $this->input->is_ajax_request() && $array->key == private_key() ){
            $this->load->model('User_Model', 'um');
            $username = trim($array->profile_login);
            $password = $array->profile_password;
            $success = false;
            $message = 'No response!';   
                if (!$username || !$password) {
                        $message    =  'Username and Password are required!'; 
                } else {
                    /*If fields not empty, verify inputs */
                    $result = $this->um->logins($username,$password);
                   
                    if($result && $result !='inactive') {
                        
                        $sess_array = array();
                        foreach($result as $row) {
                            $sess_array = array( 
                                'zid'            => $row['zid'], 
                                'zusername'   => $row['zusername'],
                                'ztype'   => $row['ztype'] 
                            ); 
                        } 
                        
                        $sess = $this->session->set_userdata('logged_in', $sess_array); 
                       
                        $message = 'Successfully Logged In.'; 
                        $success = true; 
                       
                    } elseif($result =='inactive') {
                        $message = 'Account is not active/suspended.'; 
                    }else { 
                        $message = 'Sorry, Incorrect username/password.'; 
                    }    
                } 
                echo json_encode(array('success'=>$success,'message'=>$message));
        }
    }
    public function logout(){ 
            
            $this->session->unset_userdata('logged_in');
            session_destroy();
            
            redirect('login');
            
        
    }
}