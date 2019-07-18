<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
class General_pages extends SS_Controller {

 
    protected $query_table; 
    
    protected $_table_media = 'mz_media';
    protected $_table_orders = 'mz_orders';
    protected $_table_order_details = 'mz_orderdetails'; 
    protected $_table_users = 'mz_users'; 
    protected $_table_profile = 'mz_profile';

    function __construct(){

        parent::__construct();  
        $this->load->helper('form','url','file'); 
        $this->load->library('form_validation'); 
    } 
    
    public function index(){ 
        $this->page_not_found(); 
    } 

    public function inquiries_submission(){
        header('Content-type: application/json; charset=utf-8');
        $array = json_decode(file_get_contents('php://input'));
        $success = false;
        /* if(!$array && !$this->input->is_ajax_request() || $array->key !== private_key() ){
            echo json_encode(false);   
            return false;
        }elseif(!$array->client_name && !$array->client_mail && !$array->client_num && !$array->logid){
            echo json_encode(false);
            return false;
        } */
        $rs = $array->logid;
        $cur_date = date('Y-m-d H:i:s');
        if(!$array->logid){
                $new = 'new1001';

                $password = password_hash($new, PASSWORD_DEFAULT); 
                /* Users table */
                $query = array('zusername' => $array->client_mail, 'zpassword' => $password, 'ztype' => 6, 'zcustomer_type' => 19, 'zstatus' => 15);
                $rs = $this->global_func_query($this->_table_users,$query,'', 'insert_single');
                if(!$rs){
                    echo json_encode(false);
                    return false;
                }

                $name = explode(" ",$array->client_name);
                if(count($name) > 2){
                    $lnn = strtolower(end($name));
                    $mnn = strtolower($name[1]);
                    $fnn = strtolower($name[0]);
                }else{
                    $lnn = '';
                    $mnn = '';
                    $fnn = strtolower($name[0]);
                }

                /* Profile table */
                $query = array('zparent' => $rs, 'zstatus' => 15,'zphone_num'=> $array->client_num, 'zfirstname' => $fnn, 'zmiddlename'=> $mnn, 'zlastname' => $lnn, 'zdate_published' => $cur_date,
                                'zemail' => $array->client_mail);
                $result = $this->global_func_query($this->_table_profile,$query,'', 'insert_single');
                if(!$result){
                    echo json_encode(false);
                    return false;
                }
        } // end array->logid

        if($array->urgent){
            $urgent = 1;
        }else{
            $urgent = 0;
        }

        /* Orders table */
        $query = array('zauthor' => $rs, 'zcustomer_type' => 15, 'znotes' => $array->client_msg, 'zstatus'=> 22, 'zdate_published' => $cur_date, 'zurgent' => $urgent);
        $ord_query = $this->global_func_query($this->_table_orders,$query,'', 'insert_single'); 
        
        if(!$ord_query){
            echo json_encode(false);
           return false;
        }

        $trucks = $array->trucks;
        $loads = $array->loads;
        $travel_from = $array->travel_from;
        $travel_to = $array->travel_to;
        $date_from = @$array->date_from;
        $date_to = @$array->date_to;
        $price = $array->price;
        $catID = $array->category;

        $cur_date = date('Y-m-d');
        foreach($trucks AS $k => $v){
            $data[] = array('zorder_id' => $ord_query, 
                            'zcategory' =>    $catID[$k],
                            'zproduct' =>   (int)$v,
                            'zdate_published'  => $cur_date,
                            'zloads'  => $loads[$k],
                            'ztravel_from'  => $travel_from[$k],
                            'ztravel_to'  => $travel_to[$k],
                            'zdate_from'  => date('Y-m-d', strtotime($date_from[$k])),
                            'zdate_to'  => date('Y-m-d', strtotime($date_to[$k])),
                            'zprice'  => $price[$k],
                            'zstatus'    => 22);
        } 
       
        $query_detail = $data; 
      
        $ord_query = $this->global_func_query($this->_table_order_details,$query_detail,'', 'insert_batch'); 
        if(!$ord_query){
            echo json_encode(false);
            die();
        }

        $msg = "Inquiry has been sent...";
        $msg .= "\n\r";
        $msg .= "One of our staff will contact you shortly";
        $success = true;

        echo json_encode(array('success' => $success, 'message' => $msg));   
    }
    
    function cart_listing_callback(){ 
      
        $data =  $this->input->post('items');
        
                 
        echo json_encode(array('success'=>$success, 'respond' => $data));
          
    }
} 