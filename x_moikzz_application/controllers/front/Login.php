<?php defined('BASEPATH') OR exit('No direct script access allowed');
<<<<<<< HEAD

class Login extends SS_Controller { 

    function __construct(){ 

       parent::__construct(); 
<<<<<<< HEAD

        $this->load->model('User_Model','um');
        //$this->load->model('Global_Model', 'gm');

=======
   
>>>>>>> July 7
        $this->load->helper('form','url'); 
        $this->load->library('form_validation'); 

    }

    public function index(){
        if ( !$this->session->userdata('logged_in') ) {  

            $data['ci_title'] = 'Login';
            $data['pageclass'] = 'login';
<<<<<<< HEAD

           $this->load->view('front/templates/login', $data);

=======
class Login extends SS_Controller { 
    function __construct(){ 
       parent::__construct(); 
        $this->load->model('User_Model','um');
        //$this->load->model('Global_Model', 'gm');
        $this->load->helper('form','url'); 
        $this->load->library('form_validation'); 
    }
    public function index(){
        if ( !$this->session->userdata('logged_in') ) {  
            $data['ci_title'] = 'Login';
            $data['pageclass'] = 'login';
           $this->load->view('front/templates/login', $data);
>>>>>>> Moikzz
=======
           $this->load->view('templates/inc/front/login', $data);
>>>>>>> July 7
        }else{
            redirect('admin/dashboard');
        } 
    } 
<<<<<<< HEAD

    public function newUser(){  

=======
    public function newUser(){  
>>>>>>> Moikzz
            $id          = $this->input->post('id'); 
            $user     = $this->input->post('user');   
            $pass     = $this->input->post('pass');   
            $firstname     = $this->input->post('firstname');   
            $lastname     = $this->input->post('lastname');   
            $gender     = $this->input->post('gender');   
            $email     = $this->input->post('email');   
            $mob     = $this->input->post('mob');   
            $registered     = $this->input->post('registered');           
<<<<<<< HEAD

=======
>>>>>>> Moikzz
            $data = array( 
                'id'  => $id,
                'user'  => $user,
                'pass'  => $pass,
                'firstname'  => $firstname,
                'lastname'  => $lastname,
                'gender'  => $gender,
                'email'  => $email,
                'mob'  => $mob, 
                'registered' => $registered
<<<<<<< HEAD

            ); 

            $this->gm->insert_data('x_user',$data);
            
            echo json_encode(array('success'=>true,'message'=>$data) ); 

    }


    public function verification(){ 



        if($this->input->is_ajax_request()) {

            $username = $this->input->post('profile-login');

            $password = $this->input->post('profile-password');

            $login = '';

               $this->form_validation->set_rules('profile-login', 'Username', 'trim|required');

               $this->form_validation->set_rules('profile-password', 'Password', 'trim|required');

                

                if ($this->form_validation->run() == FALSE) {

                        $message    =  validation_errors();  

                        $success = false;

                } else {



                    /*If fields not empty, verify inputs */

                    $result = $this->um->logins($username,$password);

                   

                    if($result && $result !='inactive') {
                        

                        $sess_array = array();

                        foreach($result as $row) {

=======
            ); 
            $this->gm->insert_data('x_user',$data);
            
            echo json_encode(array('success'=>true,'message'=>$data) ); 
    }
    public function verification(){ 
        if($this->input->is_ajax_request()) {
            $username = $this->input->post('profile-login');
            $password = $this->input->post('profile-password');
            $login = '';
               $this->form_validation->set_rules('profile-login', 'Username', 'trim|required');
               $this->form_validation->set_rules('profile-password', 'Password', 'trim|required');
                
                if ($this->form_validation->run() == FALSE) {
                        $message    =  validation_errors();  
                        $success = false;
                } else {
                    /*If fields not empty, verify inputs */
                    $result = $this->um->logins($username,$password);
                   
                    if($result && $result !='inactive') {
                        
                        $sess_array = array();
                        foreach($result as $row) {
>>>>>>> Moikzz
                            $sess_array = array( 
                                'ID'            => $row['ID'], 
                                'us_user_name'   => $row['us_user_name'],
                                'zlog_count'     => $row['zlog_count']
                            ); 
<<<<<<< HEAD

                        } 

                        

                            $this->session->set_userdata('logged_in', $sess_array); 

                            $message = 'Successfully Logged In.'; 

                            $success = true;
                       

                    } elseif($result =='inactive') {

                        $message = 'Account has been suspended.';

                        $success = false;

                    }else { 

                        $message = 'Sorry, Incorrect username/password.';

                        $success = false;

                    }    

                } 
                echo json_encode(array('success'=>$success,'message'=>$message, 'logged' => $result[0]['zlog_count'], 'zid' => $result[0]['ID']));

        }

    }



    public function logout(){

        //if($this->input->is_ajax_request()) { 

            $user_info = user_info(); 

            $user_id = $user_info['zid']; 

            $data = array('zlogin_status' => 0);

            $where = array('zid' => $user_id);

            $this->um->update_data($data,$where); 

            $this->session->unset_userdata('logged_in');

=======
                        } 
                        
                            $this->session->set_userdata('logged_in', $sess_array); 
                            $message = 'Successfully Logged In.'; 
                            $success = true;
                       
                    } elseif($result =='inactive') {
                        $message = 'Account has been suspended.';
                        $success = false;
                    }else { 
                        $message = 'Sorry, Incorrect username/password.';
                        $success = false;
                    }    
                } 
                echo json_encode(array('success'=>$success,'message'=>$message, 'logged' => $result[0]['zlog_count'], 'zid' => $result[0]['ID']));
        }
    }
    public function logout(){
        //if($this->input->is_ajax_request()) { 
            $user_info = user_info(); 
            $user_id = $user_info['zid']; 
            $data = array('zlogin_status' => 0);
            $where = array('zid' => $user_id);
            $this->um->update_data($data,$where); 
            $this->session->unset_userdata('logged_in');
>>>>>>> Moikzz
            session_destroy();
            
            redirect('login');
            
<<<<<<< HEAD

        //}

    }

=======
        //}
    }
>>>>>>> Moikzz
}