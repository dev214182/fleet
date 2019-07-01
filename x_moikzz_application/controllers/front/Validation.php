<?php defined('BASEPATH') OR exit('No direct script access allowed'); 





class Validation extends SS_Controller {





	function __construct(){





	    parent::__construct(); 


	  


	    $this->load->helper('url');  


	} 





    // If n = 1, System/Data is new


	public function index(){  


        $url = base_url();


        


        $table_validate = $this->table_validation($url); 





        if($table_validate){


    		 $first_valid = $this->check_validation(1);  


             // check if System already been setup


             if($first_valid){ 


                 $second_validate = $this->check_validation(2);  // Check second validation, Validation Key, System Status


                 if($second_validate){ 


              


                        $this->template->load('template', 'html/home.html');


                       


                 }else{


                    echo "false";


                 }


             }else{


                /*Go Page Setup*/


                $this->template->load('template', 'html/setup.html'); 


               


             }


        }else{


            echo "<h2 style='text-align:center;'> Kindly Upload the Database file from the root folder </h2>";


        }


	} 





    public function setup(){


        if($this->input->is_ajax_request()) {





            $sys_title = trim($this->input->post('system_title'));


            $sys_db    = trim($this->input->post('database'));


            $sys_user  = trim($this->input->post('db_user'));


            $sys_pass  = $this->input->post('db_pass');


            $sys_host  = $this->input->post('db_host'); 





            $user_id   = trim($this->input->post('login_id'));


            $user_pass = trim($this->input->post('login_pass'));


            


            $sys_site_url = base_url();


            $sys_api_key =  'TESTONLY';


            $key_active = 30;


            $password = password_hash($user_pass, PASSWORD_DEFAULT);


            $today = date('Y-m-d H:i:s');


            $data1 = array( 


                            array('fmc_system_type' => 'site_url'           , 'fmc_system_value' => $sys_site_url),


                            array('fmc_system_type' => 'activation_key'     , 'fmc_system_value' => $key_active),


                            array('fmc_system_type' => 'mailserver_url'     , 'fmc_system_value' => 'moikzz.com'),


                            array('fmc_system_type' => 'mailserver_login'   , 'fmc_system_value' => 'admin@moikzz.com'),


                            array('fmc_system_type' => 'mailserver_pass'    , 'fmc_system_value' => 'administrator'),


                            array('fmc_system_type' => 'mailserver_port'    , 'fmc_system_value' => 25),


                            array('fmc_system_type' => 'default_lang'       , 'fmc_system_value' => 'en'),


                            array('fmc_system_type' => 'system_status'      , 'fmc_system_value' => 1),


                            array('fmc_system_type' => 'system_api'         , 'fmc_system_value' => $sys_api_key),


                            array('fmc_system_type' => 'system_name'        , 'fmc_system_value' => $sys_title),


                            array('fmc_system_type' => 'system_db_name'     , 'fmc_system_value' => $sys_db),


                            array('fmc_system_type' => 'system_db_user'     , 'fmc_system_value' => $sys_user),


                            array('fmc_system_type' => 'system_db_pass'     , 'fmc_system_value' => $sys_pass),


                            array('fmc_system_type' => 'system_db_host'     , 'fmc_system_value' => $sys_host),


                            array('fmc_system_type' => 'system_published'   , 'fmc_system_value' => $today),


                            array('fmc_system_type' => 'system_logo'        , 'fmc_system_value' => '')


                    );





            $this->form_validation->set_rules('system_title', 'System Title', 'trim|required|is_unique[x_users.fmc_username]');


            $this->form_validation->set_rules('login_id', 'Login ID', 'trim|required');


            $this->form_validation->set_rules('login_pass', 'Password', 'trim|required');





                $data2 = array('fmc_username' => $user_id, 'fmc_password' => $password, 'fmc_fullname' => 'Administrator', 'fmc_user_types' => 1, 'fmc_date_publish' => $today);


            if ($this->form_validation->run() == FALSE) {


                $message = '<div class="ci-validation">' . validation_errors() . '</div>';


                $success = false;


            }else{


                $result = $this->submit_form_setup($data1, $data2);


                if($result){


                    $success = true;


                    $message = 'Success';


                }else{


                    $success = false;


                    $message = 'Error';


                }


            }


            echo json_encode(array('success'=>$success,'message'=>$message));


        }else{


            return false;


        }


    } 


}