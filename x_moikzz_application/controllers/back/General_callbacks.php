<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Description of General_callbacks
 * notes: check the API key from view function
 * 
 * @author Moikzz
 */
class General_callbacks extends SS_Controller { 

    protected $data_pages;
    protected $lists = false;
    protected $studz = false;
    protected $query;
    protected $query_table;
    protected $_table_extras    = 'mz_extras_free AS extr';
    protected $_table_balances    = 'mz_balances AS bal';
    protected $_table_system    = 'mz_system AS sys';
    protected $_table_chat_conversation = 'mz_chat_conversation AS ctc';
    protected $_table_chat_session = 'mz_chat_session AS cts';
    protected $_table_persons = 'mz_persons AS pers';
    protected $_table_subprofile = 'mz_subprofile AS subp';
    protected $_table_profile = 'mz_profile AS prof';
    protected $_table_users_type = 'mz_users_type AS ust';
    protected $_table_users = 'mz_users AS uss'; 
    protected $_table_testimonials = 'mz_testimonials AS tes';
    protected $_table_orders = 'mz_orders AS ords';
    protected $_table_order_details = 'mz_orderdetails AS ordd'; 
    protected $_table_products = 'mz_products AS prod';
    protected $_table_categories = 'mz_categories AS cats'; 
    protected $_table_social_media = 'mz_social_media AS socm';
    protected $_table_postmain = 'mz_postmain AS post';
    protected $_table_orgsmeta = 'mz_orgsmeta AS orgm';
    protected $_table_organization = 'mz_organization AS orgs';
    protected $_table_media = 'mz_media AS med';
    protected $_table_history = 'mz_history AS hist';
    protected $_table_contactform = 'mz_contactform AS cont';
    protected $_table_comments = 'mz_comments AS comm';
   
    /* 
    * $_GET['p'] for Status
    * $_GET['s'] for parent ID
    * $_GET['x'] for  organization type ( school = sc / company = comp / department = dept / division = div / section = sec / grade etc...)
    */
     
    function __construct(){  
        parent::__construct(); 
        $this->load->helper('url'); 
       // $this->session_activated();
    } 

    public function index(){

        $this->page_not_found();

    }

    public function view($page='404'){ 

        $key = public_key();
        
        if(@$_GET['k'] == $key/*  && $this->input->is_ajax_request() */){
            if (!method_exists($this, $page)){
                $this->page_not_found();
                return false;
            }else{
                $this->links($page);
            }
        }else{
           
            echo 'Direct access is not allowed!';
            die();
            return false;  
        }
        
    } 

    private function links($p){
        $this->data_pages = $p;
        return $this->{$this->data_pages}();
    }

<<<<<<< HEAD
    /* Saving cart to DB */
    private function cart_order_purchase(){
		header('Content-type: application/json; charset=utf-8');
        $meal_details = array();
        $order_details_ID = null;
=======
     /* New/Update Truck Fleet */
     private function admin_settings(){
        header('Content-type: application/json; charset=utf-8');
        $success = false;
        
        $msg = 'Error: Something wrong on submittion...';
      
        $sys_site_email         = @$this->input->post('sys_site_email');
        $sys_site_title         = @$this->input->post('sys_site_title');

        if(!$sys_site_email || !$sys_site_title){
            echo json_encode(array('success'=>$success,'message' => 'Site Title and Admin Email is required!')); 
            return;
        }
       
        $sys_site_description       = @$this->input->post('sys_site_description'); 
        $sys_site_register          = @$this->input->post('sys_site_register');
        $sys_site_language          = @$this->input->post('sys_site_language');

        $sys_logo                   = @$this->input->post('sys_logo');
        $sys_icon                   = @$this->input->post('sys_icon');
        
        $sys_site_meta_title       = @$this->input->post('sys_site_meta_title');
        $sys_site_meta_description = @$this->input->post('sys_site_meta_description');
        $sys_site_meta_keyword     = @$this->input->post('sys_site_meta_keyword');
        $sys_site_script           = @$this->input->post('sys_site_script');

        $sys_normal_pricing        = @$this->input->post('sys_normal_pricing');
        $sys_advance_pricing       = @$this->input->post('sys_advance_pricing');
        $sys_premium_pricing       = @$this->input->post('sys_premium_pricing');

        $sys_social_fb              = @$this->input->post('sys_social_fb');
        $sys_social_instagram       = @$this->input->post('sys_social_instagram');
        $sys_social_twitter         = @$this->input->post('sys_social_twitter');
        $sys_social_linkedin        = @$this->input->post('sys_social_linkedin');
        
        if($sys_logo && $sys_icon){
            $fields_total = array('site_title','site_content','users_can_register','admin_email','site_logo','site_icon','site_meta_title','site_meta_desc','site_meta_keywords','site_analytics','site_language_default',
            'n_pricing','a_pricing','p_pricing', 'social_fb', 'social_insta', 'social_linkedin', 'social_twitter');
            
            $fields = array($sys_site_title, $sys_site_description, $sys_site_register, $sys_site_email, $sys_logo, $sys_icon, $sys_site_meta_title, $sys_site_meta_description, $sys_site_meta_keyword,
                            $sys_site_script, $sys_site_language, $sys_normal_pricing, $sys_advance_pricing, $sys_premium_pricing, $sys_social_fb, $sys_social_instagram, $sys_social_linkedin, $sys_social_twitter);
            $txt = '1';
        }elseif($sys_logo && !$sys_icon){
            $fields_total = array('site_title','site_content','users_can_register','admin_email','site_logo','site_meta_title','site_meta_desc','site_meta_keywords','site_analytics','site_language_default',
            'n_pricing','a_pricing','p_pricing', 'social_fb', 'social_insta', 'social_linkedin', 'social_twitter');
            
            $fields = array($sys_site_title, $sys_site_description, $sys_site_register, $sys_site_email, $sys_logo, $sys_site_meta_title, $sys_site_meta_description, $sys_site_meta_keyword,
                            $sys_site_script, $sys_site_language, $sys_normal_pricing, $sys_advance_pricing, $sys_premium_pricing, $sys_social_fb, $sys_social_instagram, $sys_social_linkedin, $sys_social_twitter);
            $txt = '2';
        }elseif(!$sys_logo && $sys_icon){
            $fields_total = array('site_title','site_content','users_can_register','admin_email','site_icon','site_meta_title','site_meta_desc','site_meta_keywords','site_analytics','site_language_default',
            'n_pricing','a_pricing','p_pricing', 'social_fb', 'social_insta', 'social_linkedin', 'social_twitter');
            
            $fields = array($sys_site_title, $sys_site_description, $sys_site_register, $sys_site_email, $sys_icon, $sys_site_meta_title, $sys_site_meta_description, $sys_site_meta_keyword,
                            $sys_site_script, $sys_site_language, $sys_normal_pricing, $sys_advance_pricing, $sys_premium_pricing, $sys_social_fb, $sys_social_instagram, $sys_social_linkedin, $sys_social_twitter);
                            $txt = '3';
        }else{
            $fields_total = array('site_title','site_content','users_can_register','admin_email','site_meta_title','site_meta_desc','site_meta_keywords','site_analytics','site_language_default',
            'n_pricing','a_pricing','p_pricing', 'social_fb', 'social_insta', 'social_linkedin', 'social_twitter');
            
            $fields = array($sys_site_title, $sys_site_description, $sys_site_register, $sys_site_email, $sys_site_meta_title, $sys_site_meta_description, $sys_site_meta_keyword,
                            $sys_site_script, $sys_site_language, $sys_normal_pricing, $sys_advance_pricing, $sys_premium_pricing, $sys_social_fb, $sys_social_instagram, $sys_social_linkedin, $sys_social_twitter);
                            $txt = '4';
        }

        foreach($fields_total AS $k => $v){
            $data2[] =  array(  'zsystem_option' => $v, 
                                'zsystem_value' =>  $fields[$k]
                             );
        }

        $choices = $data2;

        $result =  $this->global_func_query('mz_system', $choices, 'zsystem_option','update_batch');
        if($result) {
            $msg = 'Settings has been updated!';
            $success = true;
        }
        
        echo json_encode(array('success'=>$success,'message'=> $txt));
        return;
    }

    private function menu_pages(){
        header('Content-type: application/json; charset=utf-8');
        $success = false;
        $msg = 'Error 503';
        $menu_id = $this->input->post('menuid');
        $menu_sel = $this->input->post('menu_sel');
        $where = array('zid' => $menu_id);
        $data  = array('zsystem_value' => $menu_sel);

        $result = $this->global_func_query('mz_system', $data, $where,'update_single');

        if($result) {
            $msg = 'Menu has been updated!';
            $success = true;
        }
        
        echo json_encode(array('success'=>$success,'message'=> $msg));
        return;
    }

    /* Update Profile Information to DB */
    private function userInfos(){
		header('Content-type: application/json; charset=utf-8');
        
        $success = false;
        
        $msg = '';
        $email = $this->input->post('profile_email');

        $options = [
            'moikzz' => 12,
        ];

        if(!$email) {
            echo json_encode(array('success'=>$success,'message' => 'Error 505....')); 
            return;
        }

                $type = $this->input->post('formtype');
                if(!$type) {
                    echo json_encode(array('success'=>$success,'message' => 'Error 505....')); 
                    return;
                }
               
                $fname = @$this->input->post('profile_name');  
                $web = @$this->input->post('profile_website'); 
                $company = @$this->input->post('profile_company'); 
                $phone = @$this->input->post('profile_phone'); 
                $cnty = @$this->input->post('profile_country'); 
                $state = @$this->input->post('profile_state');
                $address = @$this->input->post('profile_address'); 
                
                
                $user = @$this->input->post('profile_username');
                $pass = @$this->input->post('profile_password');
                $status = @$this->input->post('profile_status');
                $ptypes = @$this->input->post('profile_types');
                $ctypes = @$this->input->post('customer_types');
                $license = @$this->input->post('profile_license');
                $vat = @$this->input->post('profile_vat');

                $cur_date = date('Y-m-d H:i:s');
                $arr_name = explode(" ", $fname);
                $arr_name1 = current($arr_name);
                $lname = end($arr_name);
                
                if($type == 'addnew'){

                    $password = password_hash($pass, PASSWORD_DEFAULT, $options); 
                    $data = array('zusername' => $user, 'zpassword' => $password, 'ztype' => $ptypes,'zcustomer_type'=> $ctypes, 'zstatus' => $status); 
                    $field1 = array('zusername' =>$user);
                   
                    $chking =  $this->global_func_query('mz_users', $field1,null,'check_duplicate');
                    if($chking) {
                        echo json_encode(array('success'=>$success,'message' => 'Username is already been registered.'));
                        return;
                    }

                    $field1 = array('zemail' =>$email);
                    $chking =  $this->global_func_query('mz_profile', $field1,null,'check_duplicate');
                    if($chking) {
                        echo json_encode(array('success'=>$success,'message' => 'Email is already been registered.')); 
                        return;
                    }

                    $userID =  $this->global_func_query('mz_users', $data,false, 'insert_single');

                    if(!$userID) {
                        echo json_encode(array('success'=>$success,'message' => 'You did not change anything....')); 
                        return;
                    }

                    $data1 = array('zparent' => $userID, 'zemail'=> $email, 'zstatus' => $status, 'zfirstname' => $arr_name1, 'zlastname' => $lname, 'zdate_published' => $cur_date,
                                    'zwebsite' => $web,   'zphone_num' => $phone, 'zcountry' => $cnty, 'zstate' => $state , 'zaddress' => $address);

                    $rs =   $this->global_func_query('mz_profile', $data1,false, 'insert_single');
                    
                    $success = true;
                    
                    if(!$rs) {
                        $this->global_remove_data('mz_users', array('zid' => $userID));
                        $success = false;
                        $msg = 'Error on Submission! kindly refresh the page!';
                    }
                   
                }else{
                    $profile_only = false;
                    $user_only = false;
                    $msg = '';

                    $old_fname = @$this->input->post('old_profile_name');  
                    $old_email = @$this->input->post('old_profile_email'); 
                    $old_web = @$this->input->post('old_profile_website');  
                    $old_company = @$this->input->post('old_profile_company'); 
                    $old_phone = @$this->input->post('old_profile_phone'); 
                    $old_cnty = @$this->input->post('old_profile_country'); 
                    $old_state = @$this->input->post('old_profile_state');
                    $old_address = @$this->input->post('old_profile_address'); 

                    $old_license = @$this->input->post('old_profile_license'); 
                    $old_vat = @$this->input->post('old_profile_vat'); 
                   
                
                    $old_status = @$this->input->post('old_profile_status');
                    $old_ptypes = @$this->input->post('old_profile_types');
                    $old_ctypes = @$this->input->post('old_customer_types');
                   
                    if(@$old_fname == @$fname && @$old_email == @$email && @$old_company == @$company && @$old_web == @$web && @$old_phone == @$phone && @$old_cnty == @$cnty && @$old_state == @$state && @$old_address == @$address &&
                    @$old_status == @$status && @$old_ptypes == @$ptypes && @$old_license == @$license && @$old_vat == @$vat && (!$pass)){
                        echo json_encode(array('success'=>$success,'message' => 'You did not change anything....')); 
                        return;
                    }

                    if(@$old_fname == @$fname && @$old_email == @$email && @$old_web == @$web && @$old_phone == @$phone && @$old_cnty == @$cnty && @$old_state == @$state && @$old_address == @$address && @$old_company == @$company && @$old_license == @$license && @$old_vat == @$vat){
                        $profile_only = true;
                       
                    }
                    if(@$old_status == @$status && @$old_ptypes == @$ptypes && @$ctypes == @$old_ctypes && (!$pass)){
                        $user_only = true; 
                    }
                  
                    $userID = $this->input->post('userID');

                    if(!$userID) {
                        echo json_encode(array('success'=>$success,'message' => 'You did not change anything....')); 
                        return;
                    }

                    if(!$profile_only && @$fname && @$email){

                            $field1 = 'zemail ="'.$email. '" AND zparent !='.$userID;
                            
                            $chking =  $this->global_func_query('mz_profile', $field1,null,'check_duplicate');
                            if($chking) {
                                echo json_encode(array('success'=>$success,'message' => 'Email is already been registered.')); 
                                return;
                            }

                            $data1 = array('zparent' => $userID, 'zemail'=> $email, 'zstatus' => $status, 'zfirstname' => $arr_name1, 'zlastname' => $lname, 'zdate_published' => $cur_date,
                                            'zwebsite' => $web,   'zphone_num' => $phone, 'zcountry' => $cnty, 'zstate' => $state, 'zcompany' => $company, 'zaddress' => $address, 'zlicense_num' =>$license, 'zvat_num' => $vat);
                            
                            $where = array('zparent' => $userID);
                            $this->global_func_query('mz_profile', $data1, $where, 'update_single');
                            $success = true; 
                    }
                    
                    if(!$user_only){
                        if($pass){
                            $password = password_hash($pass, PASSWORD_DEFAULT, $options);
                            
                            if($ptypes && $ctypes && $status)
                            $data = array('zpassword' => $password, 'ztype' => $ptypes,'zcustomer_type'=> $ctypes, 'zstatus' => $status);
                            elseif($ctypes && $status)
                            $data = array('zpassword' => $password, 'zcustomer_type'=> $ctypes, 'zstatus' => $status);
                            elseif($ptypes && $status)
                            $data = array('zpassword' => $password, 'ztype'=> $ptypes, 'zstatus' => $status);
                            else
                            $data = array('zpassword' => $password);
                        }else{
                            if($ptypes && $ctypes && $status)
                            $data = array('ztype' => $ptypes,'zcustomer_type'=> $ctypes, 'zstatus' => $status);
                            elseif($ctypes && $status)
                            $data = array('zcustomer_type'=> $ctypes, 'zstatus' => $status);
                            elseif($ptypes && $status)
                            $data = array('ztype'=> $ptypes, 'zstatus' => $status);
                            elseif($status)
                            $data = array('zstatus' => $status);
                        }

                        $where1 = array('zid' => $userID);
                        $this->global_func_query('mz_users', $data, $where1, 'update_single');
                        $success = true; 
                    
                    }    
                   
                }

           
        echo json_encode(array('success'=>$success,'id'=>$userID, 'message' => $msg));
        return;
    }

     /* Saving to system table */
     private function sys_modules(){
        header('Content-type: application/json; charset=utf-8');
        $ID = $this->input->post('sys-id');
        if(!$ID){ return; }
        $success = false;
        
        $addelete    = @$this->input->post('addelete') ? $addelete = 'addelete' : $addelete = '';
        $view        = @$this->input->post('view') ? $view = 'view' : $view = '';
        $edit        = @$this->input->post('edit') ? $edit = 'edit' : $edit = '';
        $dashboard      = @$this->input->post('dashboard') ? $dashboard = 'dashboard' : $dashboard = '';
        $inquiries      = @$this->input->post('inquiries') ? $inquiries = 'inquiries' : $inquiries = '';
        $trucks         = @$this->input->post('trucks')  ? $trucks = 'trucks' : $trucks = '';
        $posts          = @$this->input->post('posts') ? $posts = 'posts' : $posts = '';
        $pages          = @$this->input->post('pages') ? $pages = 'pages' : $pages = '';
        $cf             = @$this->input->post('contact_form') ? $contact_form = 'contact_form' : $contact_form = '';
        $menus          = @$this->input->post('menus') ? $menus = 'menus' : $menus = '';
        $media          = @$this->input->post('media') ? $media = 'media' : $media = '';
        $settings       = @$this->input->post('settings') ? $settings = 'settings' : $settings = '';
        $testimonials   = @$this->input->post('testimonials') ? $testimonials = 'testimonials' : $testimonials = '';
        $products       = @$this->input->post('products') ? $products = 'products' : $products = '';
        $categories     = @$this->input->post('categories') ? $categories = 'categories' : $categories = '';
        $payments       = @$this->input->post('payments') ? $payments = 'payments' : $payments = '';
        $orders         = @$this->input->post('orders') ? $orders = 'orders' : $orders = '';
        $history        = @$this->input->post('history') ? $history = 'history' : $history = '';
        $users        = @$this->input->post('users') ? $users = 'users' : $users = '';
        $customers        = @$this->input->post('customers') ? $customers = 'customers' : $customers = '';
        
        $item1 = array($dashboard, $inquiries, $trucks, $posts, $pages, $cf, $menus, $media, $settings, $testimonials, $products, $categories, $payments, $orders, $history,$customers, $users);
        $item1 = array_values(array_filter($item1));
        
        $item2 = array($addelete, $edit, $view);
        $item2 = array_values(array_filter($item2));
        $data2  = array('pages' => $item1, 'options' => $item2);
        $data2 = serialize($data2);
        $data = array('zvalue' => $data2);
        $where = array('zid' => $ID);
        $query = $this->global_func_query('mz_users_type',$data, $where, 'update_single');
        if($query){
            $success = true;
            $msg = 'System Modules has been updated!';
        }else{
            $msg = 'No Changes!...';
        }
        echo json_encode(array('success'=>$query,'message'=> $msg));
        return;
    }

     /* New/Update Truck Fleet */
     private function sys_fleet_info(){
        header('Content-type: application/json; charset=utf-8');
>>>>>>> Moikzz
        $success = false;
        $truckID = false;
        $msg = 'Error: Something wrong on submittion...';
        
        $type = $this->input->post('formtype');
        
        $input_truck = @$this->input->post('input_truck');

        if(!$type || !$input_truck){
            echo json_encode(array('success'=>$success,'message' => 'Error 505....')); 
            return;
        }
        $cur_date = date('Y-m-d H:i:s');

        $userID                     = @$this->input->post('userID');
        $input_origin_place         = @$this->input->post('input_origin_place');
        $input_origin_date          = @$this->input->post('input_origin_date');
        $input_destination_place    = @$this->input->post('input_destination_place');
        $input_destination_date     = @$this->input->post('input_destination_date');
        $input_loads                = @$this->input->post('input_loads');
        $input_public               = @$this->input->post('input_public');
        $price_normal               = @$this->input->post('price_normal');
        $price_advance              = @$this->input->post('price_advance');
        $price_prem                 = @$this->input->post('price_prem');
        $fleet_notes                 = @$this->input->post('fleet_notes');

        if(strtolower($input_public) == 'on' || $input_public == 1){
            $input_public = 1;
        }else{
            $input_public = 0;
        }

        if($type == 'addnew'){  

                    $data = array('zcategory' => $input_truck, 'ztravel_from' => $input_origin_place, 'ztravel_to' => $input_destination_place,'zdate_from'=> $input_origin_date,'zdate_to' => $input_destination_date,
                    'zloads' => $input_loads, 'zpublic' => $input_public, 'zprice' => $price_normal, 'zsaleprice' =>$price_advance, 'zpremprice' => $price_prem,  'zstatus' => 9,'zauthor'=> $userID,
                    'zdate_published' => $cur_date, 'ztype'=> 'truck', 'znotes' => $fleet_notes);
                    
                    $truckID =  $this->global_func_query('mz_products', $data,null,'insert_single');
                    if($truckID) {
                        $msg = 'New Fleet has been added.';
                        $success = true;
                    }
            
        }else{
           
                    $truckID                    = @$this->input->post('truckID');

                    if(!$truckID){
                        echo json_encode(array('success'=>$success,'message' => 'Error 505....')); 
                        return;
                    } 
        
                    $status                 = @$this->input->post('truck_status');

                    $data = array('zcategory' => $input_truck, 'ztravel_from' => $input_origin_place, 'ztravel_to' => $input_destination_place,'zdate_from'=> $input_origin_date,'zdate_to' => $input_destination_date,
                    'zloads' => $input_loads, 'zpublic' => $input_public, 'zprice' => $price_normal, 'zsaleprice' =>$price_advance, 'zpremprice' => $price_prem,  'zstatus' => $status, 'znotes' => $fleet_notes);
                    
                    $where = array('zid' => $truckID);
                    $result =  $this->global_func_query('mz_products', $data, $where,'update_single');
                    if($result) {
                        $msg = 'Fleet has been updated!';
                        $success = true;
                    }
        }
        echo json_encode(array('success'=>$success,'message'=> $msg,'id'=>$truckID));
        return;
    }


     /* Order / Inquiry Status Change */
     private function order_status_change(){
        header('Content-type: application/json; charset=utf-8');
        $success = false;
       
        $msg = 'Error: Something wrong on submittion...';
        
        $status = $this->input->post('status_id');
        
        $orderID = @$this->input->post('order_id');

        if(!$status || !$orderID){
            echo json_encode(array('success'=>$success,'message' => 'Error 505....')); 
            return;
        }
        
        $data = array('zstatus' => $status); 
        $where = array('zid' => $orderID);

        $result =  $this->global_func_query('mz_orders', $data, $where,'update_single');
        if($result) {
            $msg = 'Status has been changed!';
            $success = true;
        }
     
        echo json_encode(array('success'=>$success,'message'=> $msg,'id'=>$orderID));
        return;
    }

    /* Saving to system table */
    private function post_pages(){
        header('Content-type: application/json; charset=utf-8'); 
        $success = false;
        $type = $this->input->post('formtype');
        $logged_id      = @$this->input->post('logged_id');
        if(!$type && !$logged_id) {
            echo json_encode(array('success'=>$success,'message' => 'Error 503....')); 
            return;
        }

        $status         = @$this->input->post('input_status');
        $post_type      = @$this->input->post('post_type');         /* post_type : either its Page or Posts */
        $title          = @$this->input->post('input_title');
        $slug           = @$this->input->post('input_slug');
        $image          = @$this->input->post('input_feature_image');
        $contents       = @base64_encode($this->input->post('cmsEditor'));

        $gen_title      = @$this->input->post('input_meta_title');
        $gen_desc       = @$this->input->post('input_meta_description'); 
        $gen_keys       = @$this->input->post('input_meta_keywords');

        $fb_title       = @$this->input->post('social_fb_title'); 
        $fb_desc        = @$this->input->post('social_fb_description'); 
        $fb_image       = @$this->input->post('social_fb_image'); 
        
        $twit_title     = @$this->input->post('social_twitter_title'); 
        $twit_desc      = @$this->input->post('social_twitter_description'); 
        $twit_image     = @$this->input->post('social_twitter_image'); 
        
        $item2 = array('general' => array('title' => $gen_title, 'description' => $gen_desc, 'keywords' => $gen_keys),
                        'facebook'=> array('title' => $fb_title, 'description' => $fb_desc, 'image' => $fb_image),
                        'twitter'=> array('title' => $twit_title, 'description' => $twit_desc, 'image' => $twit_image)); 
      
        $data2 = serialize($item2);
        $cur_date = date('Y-m-d H:i:s');

        if($type == 'addnew'){
            $data = array('ztitle' => $title, 'zslug' => $slug, 'zcontent' => $contents, 'ztype' => $post_type, 'zstatus' => $status, 'zdate_published' => $cur_date, 'zauthor' => $logged_id, 'zimage1' => $image);
            $trigger_operation = 'insert_single';
            $social_where = null;
            $where = null;
           
        }else{
            $ID = $this->input->post('post_id');
            $data = array('ztitle' => $title, 'zslug' => $slug, 'zcontent' => $contents, 'ztype' => $post_type, 'zstatus' => $status, 'zlast_author' => $logged_id, 'zimage1' => $image);
            $where = array('zid' => $ID);
            $trigger_operation = 'update_single';

            $social_data = array('zvalue' => $data2);
            $social_where = array('zparent' => $ID);
        }

        $ID = $this->global_func_query('mz_postmain',$data, $where, $trigger_operation);
        
        if($ID){
            if($type == 'addnew'){
                $social_data = array('zparent' => $ID,'zvalue' => $data2);
            }

            $this->global_func_query('mz_postsocialmedia',$social_data, $social_where, $trigger_operation);
            $success = true;
            $msg = ucwords($post_type).' has been updated!';
        } 
        echo json_encode(array('success'=>$success,'message'=> $data,'id'=>$ID));
        return;
    }

    

    private function image_viewer(){ 
        function mtimecmp($a, $b) {
            $mt_a = filemtime($a);
            $mt_b = filemtime($b);
    
            if ($mt_a == $mt_b)
                return 0;
            else if ($mt_a < $mt_b)
                return 1;
            else
                return -1;
        }

        $files = glob("x_moikzz_assets/images/gallery/*.{jpg,png,jpeg}", GLOB_BRACE);
        $data = array();
        usort($files, "mtimecmp");

        foreach($files AS $k => $v){
            $image_files = explode('/', $v);
            $data[$k]['url'] = base_url().$v;
            $data[$k]['title'] = end($image_files);
        }
        echo json_encode($data);
    }

    private function ifile_upload(){
        $image1 = @strtolower(trim($_FILES['fileupload']['name']));  
        $inner_msg = false;
        $uploads_dir    = getcwd()."/x_moikzz_assets/images/gallery/";
        $msg = 'Failed to Upload!';

        if (!is_dir($uploads_dir)) {
                mkdir($uploads_dir, 0777, true); 
        } 

        if(@$image1){
            $inner_msg = $this->file_image_upload( $image1, $_FILES['fileupload']['size'],$uploads_dir,$_FILES['fileupload']['tmp_name'] );
        }
        
        if($inner_msg){
            $msg = 'Successfully Uploaded';
        }

<<<<<<< HEAD
        }        
        echo json_encode(array('success'=>$success,'id'=>$studID)); 
    }

    /* This is for ordered Menu */
    private function _mealOrders(){
        global $_GET;
        
        $datas = '';

        $id = $this->userID;  

        $this->query_table =  $this->_table_orders .' , '. $this->_table_order_details; 
        // Display specific student order
        if(@$_GET['s']){
            $datas = "ords.zauthor = ".$id." AND ords.zid = ordd.zorder_id AND ords.zorder_to =".$_GET['s'];
        }else{
            $datas = "ords.zauthor = ".$id;
        }

        $this->query = array( 'where' =>  $datas);

        $this->jsons();
    }
    
    private function get_meal_schedule($t,$w,$f){
        $getDate = $this->global_get_title($t,$w,$f); 
        return $getDate;
    }

    /***
            $query = array( 'fields_listing' => array('', '') - this is for datatable field to show
                            'fields' => array('',''),
                            'group_by' => '' ,
                            'where' => array('',''),
                            'likes' => array('',''),
                            'orlike' => array('',''),
                            'order_by' => '',
                            'order' => '',
                            'limit' => 5,
                            'offset' => 0);
    ***/  

    private function _site_settings(){
        $this->query_table =  $this->_table_system;
        $this->jsons();
    }

    private function _testimonials(){
        $this->query_table =  $this->_table_testimonials;
        $this->jsons();
    }

    private function _comments(){
        $this->query_table =  $this->_table_comments;
        $this->jsons();
    }

    private function _history(){
        $this->query_table =  $this->_table_history;
        $this->jsons();
    }

    private function _products(){
        global $_GET;

        $datas = '';
        $currentDate = date('Y-m-d');
        
        // Display published products
        if(@$_GET['p'] && @$_GET['p'] == 9 && @$_GET['o']){

            $this->query = array( 'where' =>  'cats.zid = prod.zcategory AND prod.zstatus = 9 AND cats.zstatus = 9 AND prod.zorganization = "'.$_GET['o'].'" AND cats.ztype = "product" AND prod.zdate_display >= "'.$currentDate.'"',
                                    'fields' => 'prod.*');
        
        // Display ALL draft, review, pending, published - all status except deleted (2)
        }elseif(@$_GET['p'] && @$_GET['p'] == 99 && @$_GET['o']){

            $this->query = array( 'where' =>  'cats.zid = prod.zcategory AND prod.zstatus != 2 AND prod.zorganization = "'.$_GET['o'].'" AND cats.zstatus = 9 AND cats.ztype = "product"',
                                    'fields' => 'prod.*');
        
        // Display EITHER draft, review, pending - specific
        }elseif(@$_GET['p'] && @$_GET['p'] <> 2 && @$_GET['o']){

            $this->query = array( 'where' =>  'cats.zid = prod.zcategory AND prod.zstatus = "'.$_GET['p'].'" AND prod.zorganization = "'.$_GET['o'].'" AND cats.zstatus = 9 AND cats.ztype = "product" AND prod.zdate_display >= "'.$currentDate.'"',
                                    'fields' => 'prod.*');
        
        }elseif(@$_GET['p'] && @$_GET['p'] == 'administrator'){
            
            // for admin
            // Display all products except deleted
            $this->query = array( 'where' => 'cats.zid = prod.zcategory AND prod.zstatus != 2 AND cats.ztype = "product"',
                                    'fields' => 'prod.*');
        }else{
            return false;
        }

        // prod, cats
        $this->query_table =  $this->_table_products .','. $this->_table_categories;
        $this->jsons();
    }

    private function _orders(){
            global $_GET;
            $this->query_table =  $this->_table_orders .' , '. $this->_table_order_details;
            $datas = ' AND ords.zstatus != 2';

            // Display specific student order
            if(@$_GET['s']){
                $datas .= " AND ords.zorder_to =".$_GET['s'];
            }

            // Display all orders from children
            if(@$_GET['x']){
                $datas = " AND ords.zauthor =".$_GET['x'];
            }

            $this->lists =  array(  'zorder_to',
                                    'zorganization',  
                                    'zproduct',
                                    'zprice',
                                    'zdate_published',
                                    'zstatus'
                            );

            $this->query = array( 'fields_listing' => array( 
                                                'zorder_to',
                                                'zorganization',  
                                                'zproduct',
                                                'zprice',
                                                'zdate_published',
                                                'zstatus'
                                                ),
                    'fields' => '*',
                    'where' =>  'ords.zid = ordd.zorder_id '.$datas,
                    'order_by' => 'LENGTH(zdate_published),zdate_published',
                                'order' => 'DESC'); 
            
            $this->jsons();
    }

    // Display All organization data
    private function _orgs($item=null,$fld=null){
            global $_GET;
            $this->query_table =  $this->_table_organization .' , '. $this->_table_orgsmeta;
            $datas = ' AND orgs.zstatus != 2';

            // Display specific organization data
            if(@$_GET['s']){
                $datas .= " AND orgs.zid =".$_GET['s'];
            }

            //For Admin - All by types - sc / comp / dept / pos / gr / sec / div
            if(@$_GET['x']){
                $datas .= ' AND orgs.ztype = "'.$_GET['x'].'"';
            }

            // For User/Client - Display published status
            if(@$_GET['p'] == 9){
                $datas .= ' AND orgs.zstatus = '.$_GET['p'];
            }

            $ntz = '';
            $gtz = '';

            if($item){
                $ntz = ' AND orgs.zid = '.$item;
                $fields = $fld;
                $order_by = $fld;
            }else{
                $fields = 'orgs.zid AS ID, orgs.ztitle AS title, orgs.zcontent AS content, orgs.zdate_published AS published_date, orgs.zauthor AS author, orgs.zparent AS parents, orgs.zstatus AS zstatus,
                orgm.zcountry AS country, orgm.zaddress AS address, orgm.zlink AS link, orgm.zcomp_license AS license, orgm.zcomp_vat AS vat';
                $order_by = 'LENGTH(title),title';
            }

            if(@$_GET['g']){
                $gtz = ' AND orgs.zparent = '.$_GET['g'];
            }

            $this->query = array( 'where' =>  'orgs.zid = orgm.zorganization '.$datas.$ntz.$gtz,
                                'fields' => $fields,
                                'order_by' => $order_by,
                                'order' => 'ASC');

            if($item){
                $data =  $this->global_func_query($this->query_table, $this->query);
                return $data[0]->$fields;
            }else{
                $this->jsons();
            }
    }

    // get login profile
    private function _profile(){
        global $_GET;
        $callback = '';  

        $id = $this->userID;
        $stats = 0;
        if(@$_GET['p'] == 9){
            $stats = $_GET['p'];
        }
        /* Get single profile */
        $this->query = array( 'where' => array('zparent' => $id, 'zstatus' => $stats));
        $this->query_table =  $this->_table_profile;
        $this->jsons();
    }

    // display all users - profile
    private function _users(){
        global $_GET;

        if(@$_GET['tz'] <> 214){
            return false;
        }
        //uss - prof
        $this->query_table =  $this->_table_profile .' , '. $this->_table_users;
        $datas = '';

        // Display specific user data
        if(@$_GET['s']){
            $datas = " AND uss.zid =".$_GET['s'];
        }else{
            $datas = " AND uss.zid =".$this->userID;
        }

        $this->query = array( 'where' =>  'uss.zid = prof.zparent AND uss.zstatus != 2'.$datas);
        $this->jsons();
    } 

     // display all active complimentaries
     private function _xtras(){
        global $_GET;

        if(@$_GET['tz'] <> 214 && !$_GET['tp']){
            return false;
        }
        //uss - prof
        $this->query_table =  $this->_table_extras;
        $datas = array('zstatus' => 9,'ztype'=>$_GET['tp']); 

        $this->query = array( 'where' =>  $datas);
        $this->jsons();
    } 

    // display all students
    private function _students(){
        global $_GET;
        $callback = '';
        $datas = '';

        $this->studz = @$_GET['z']; // for datatables

        $id = $this->userID;

         // Display specific user data
        if(@$_GET['s']){ 
            $datas = 'zid = '.$_GET['s'].' AND zparent ='.$id.' AND zstatus != 2';
        }else{
            $datas = 'zparent ='.$id.' AND zstatus != 2';
        }

        $this->lists =  array(  'zid',
                                'zstatus',
                                'zfullname',
                                'zorganization',
                                'zgrade',
                                'zstate',
                                'zvalid_id',
                                'zbalance',
                                'zorgID',
                                'zdivision',
                                'zsection',
                                'zgradeID',
                                'zsectionID',
                                'zdivisionID'                               
                                
        );

        $this->query = array( 'fields_listing' => array( 
                                                        'zstatus',
                                                        'zfirstname',  
                                                        'zorganization',
                                                        'zgrade',
                                                        'zstate',
                                                        'zvalid_id',
                                                        'zbalance', 
                                                        'zorganization'
                                                        ),
                              'fields' => '*',
                              'where' => $datas);
        $this->query_table =  $this->_table_subprofile;
        $this->jsons();
    }

    private function jsons(){
        $data =  $this->global_func_query($this->query_table, $this->query, $this->lists);  
        $this->output( $data ); 
    }   

    private function output( $o ){
        $this->output->set_content_type('application/json'); 
        
        $output = [];
        $data1 = [];
        $data2 = [];
        $parZ =  $o;
        $tz = [];
         /* Run on DataTables */
        if($o && $this->lists){
            foreach($o['data'] as $k => $aRow){ 
  
                $data1[] =  (object)$aRow;
            }

            $o =$data1;
        }
        
         /* Run on All */
         if($o){
          
                foreach($o AS $k => $v){ 
                    foreach($v AS $t => $z){
                        $output[$k][$t] = $v->$t; 
                    }
                    if(@$v->zstatus){
                        $output[$k]['zstatus'] = status_info_clean($v->zstatus);
                    }else{
                        $output[$k]['zstatus'] = '';
                    }
                    if(@$v->zorganization){
                        $output[$k]['zorgID'] =  $v->zorganization;
                        $output[$k]['zorganization'] = $this->global_get_title('mz_organization',array('zid' => $v->zorganization),'ztitle');

                        /* For databales lists */
                        if($this->studz){
                            $output[$k]['zstate'] = $this->_orgs($v->zorganization, 'zstate');
                        } 
                    }else{
                        $output[$k]['zorganization'] = '';
                    }
                    
                    if(@$v->zorder_to){ 
                        $getName = $this->global_get_title('mz_subprofile',array('zid' => $v->zorder_to),array('zfirstname','zlastname'));
                        $output[$k]['zorder_to'] = $getName[0]->zfirstname. ' '. $getName[0]->zlastname;
                    }

                    if(@$v->zproduct){ 
                        $output[$k]['zproductID'] = $v->zproduct;
                        $output[$k]['zproduct'] =  $this->global_get_title('mz_products',array('zid' => $v->zproduct),'ztitle');
                    }

                    if(@$v->zgrade){
                        $output[$k]['zgradeID'] =  $v->zgrade;
                        $output[$k]['zgrade'] =  $this->global_get_title('mz_organization',array('zid' => $v->zgrade),'ztitle');
                    }else{
                        $output[$k]['zgrade'] = '';
                        $output[$k]['zgradeID'] = '';
                    }
                    if(@$v->zdivision){
                        $output[$k]['zdivisionID'] =  $v->zdivision;
                        $output[$k]['zdivision'] = $this->global_get_title('mz_organization',array('zid' => $v->zdivision),'ztitle');
                    }else{
                        $output[$k]['zdivision'] = '';
                        $output[$k]['zdivisionID'] = '';
                    }
                    if(@$v->zsection){
                        $output[$k]['zsectionID'] =  $v->zsection;
                        $output[$k]['zsection'] = $this->global_get_title('mz_organization',array('zid' => $v->zsection),'ztitle');
                    }else{
                        $output[$k]['zsection'] = '';
                        $output[$k]['zsectionID'] = '';
                    }
                    if(@$v->zcompany){
                        $output[$k]['zcompany'] = $this->global_get_title('mz_organization',array('zid' => $v->zcompany),'ztitle');
                    }else{
                        $output[$k]['zcompany'] = '';
                    }
                    if(@$v->zdepartment){
                        $output[$k]['zdepartment'] = $this->global_get_title('mz_organization',array('zid' => $v->zdepartment),'ztitle');
                    }else{
                        $output[$k]['zdepartment'] = '';
                    }
                    if(@$v->zposition){
                        $output[$k]['zposition'] = $this->global_get_title('mz_organization',array('zid' => $v->zposition),'ztitle');
                    }else{
                        $output[$k]['zposition'] = '';
                    }
                    if(@$v->zcategory){
                        $output[$k]['zcategory'] = $this->global_get_title('mz_categories',array('zid' => $v->zcategory),'ztitle');
                    }else{
                        $output[$k]['zcategory'] = '';
                    }
                    
                    if(@$v->zfirstname){ 
                        $output[$k]['zfullname'] =  ucwords($v->zfirstname . " ". $v->zlastname);
                    }                
                }
        }
           
        /* Run on DataTables */
        if($o && $this->lists){  
            
            foreach($output as $k => $aRow){
                
                 $row = array();
                
                foreach ($this->lists as $col) {
                    $row[] = $aRow[$col];
                }
    
                $data2[] = $row;
            }
           
            $output = array( "draw"             =>  $parZ['draw'],  
                            "recordsTotal"      =>  $parZ['recordsTotal'],  
                            "recordsFiltered"   =>  $parZ['recordsFiltered'],  
                            "data"              =>  $data2  );
        }
        
        $json = json_encode($output); 
        echo $json;
    }
     
=======
        echo json_encode(array('success' => $inner_msg,'message' => $msg));
    }
 
>>>>>>> Moikzz
}