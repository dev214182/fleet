<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
        // fields - array()
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
            $query = array( 'fields' => array('',''),
                            'group_by' => '' ,
                            'where' => array('',''),
                            'likes' => array('',''),
                            'orlike' => array('',''),
                            'order_by' => '',
                            'order' => '',
                            'limit' => 5,
                            'offset' => 0);
        ***/
class SS_Controller extends CI_Controller { 

    protected $query;

	function __construct() { 

        parent::__construct();

		$this->initialize();
	 

		//$this->load->library('session');

		$this->load->library('pagination');
        $this->load->model('Global_Model', 'gms');
	} 

	function initialize() { 
		date_default_timezone_set($this->config->item('default_timezone_string')); 
	}


    function page_not_found(){ 
        return $this->load->view('errors/html/default_error_404');
        die();
    }

    function system_default_open($logged_user_type){
        $query_table = 'mz_users_type';
        $query =    array( 'where' =>  array('zid' => $logged_user_type));
        $rs = $this->global_func_query($query_table, $query);  
        if($rs){
            return $rs;
        }
        return false;
    }

    function template_page_not_found(){
        
        return $this->template->load( 'back/template', 'errors/html/default_error_404');
    }
    

	function session_activated() {

		if ( !$this->session->userdata('logged_in') ) {

			return redirect(base_url().'login');

		}

	} 

    function logged_user_info(){

            return user_info();

    } 

    public function file_image_upload($filename, $filesize, $uploads_dir, $tmp_file,$no_copy=null){ 
        $userfile_size  = $filesize;

        $allowed =  array('jpeg','png' ,'jpg'); 
        $filename = str_replace(' ', '_', $filename);
        $ext = pathinfo($filename, PATHINFO_EXTENSION); 
        $success = false;
        if(!in_array($ext,$allowed) ) { 

            $msg     = "File not allowed";  

        }else{   
                if($userfile_size < 2000000){  

                        $newfile = $filename;

                        if($no_copy){ 
                            
                        }else{
                            if (file_exists($uploads_dir ."\\". $filename)) {

                                $time_min = date('ymdis');  

                                $newfile =  'copy_'.$time_min.'_'.$filename; 

                            } 
                        }

                    if(move_uploaded_file($tmp_file,$uploads_dir.'/'.$newfile)){  
                          $success = true;  
                    } 
                } 
          
        } 
        return $success; 
    }
    
    function status_info_controller($key) { 

         

        switch($key){

            case 1:

                return "Preview";

                break;

            case 2:

                return "Approved";

                break;

            case 3:

                return "Rejected";

                break;

            case 4:

                return "Private";

                break;

            case 5:

                return "Resigned";

                break;

            case 6:

                return "Terminated";

                break;

            case 7:

                return "Lost";

                break;

            case 8:

                return "Broken";

                break;

            case 9:

                return "Published";

                break; 
            case 10:

                return "Sold";

                break;
            case 11:

                return "Sale";

                break;

            case 12:

                return "Deleted";

                break;

            default:

                return "Preview";

                break;

        }  
    }

    function global_get_title($t,$w,$f){
      $result =  $this->gms->get_title($t, $w, $f);
        if($result){
            if(is_array($f))
            return $result;    
            else
            return $result[0]->$f;
        }else{
            return null;
        }
    } 

    // batch = null single insert to database else insert batch
    // type = where select query or insert query
    function global_func_query($t,$query,$s=null, $type=null){
        
        if($type == 'insert_single'){  // insert single query
                $result = $this->gms->insert_data($t,$query);           
        }elseif($type == 'insert_batch'){ // insert batch query
            $result = $this->gms->new_batch_data($t,$query);       
        }elseif($type == 'update_single'){
            $result = $this->gms->update_data($t,$query,$s); // table , data , where
        }elseif($type == 'update_batch'){
            $result = $this->gms->data_update_batch($t,$query,$s); //table, data, id
        }elseif($type == 'check_duplicate'){
            $result = $this->gms->is_record_exist($t, $query,$s);
        }else{  // select query
            $result = $this->gms->getAllDatabyField($t, $query, $s); 
        }
        return $result;

    }

    function global_remove_data($table,$where){
        $result = $this->gms->remove_data($table,$where); 
    }

    function global_query_display_lists($t,$query){

        $result = $this->gms->get_cd_list($t, $query); 

        return $result;

    }

	function paginate_entries($base_url,$total_rows,$limit,$offset,$num_links=null) {

  	$config['base_url'] = $base_url;

		$config['total_rows'] = $total_rows;

		$config['per_page'] = $limit;

		$choice = $config['total_rows']/$config['per_page'];

		$data['row_start'] = $offset;

		$config['use_page_numbers'] = true;

		$config['page_query_string'] = true;

		$config['query_string_segment'] = 'pg';

		$config['full_tag_open'] = '<ul class="pagination">';

		$config['full_tag_close'] = '</ul>';

		$config['first_link'] = '&lt';

		$config['last_link'] = '&gt';

		$config['first_tag_open'] = '<li>';

		$config['first_tag_close'] = '</li>';

		$config['prev_link'] = '&laquo';

		$config['prev_tag_open'] = '<li class="prev">';

		$config['prev_tag_close'] = '</li>';

		$config['next_link'] = '&raquo';

		$config['next_tag_open'] = '<li class="next">';

		$config['next_tag_close'] = '</li>';

		$config['last_tag_open'] = '<li>';

		$config['last_tag_close'] = '</li>';

		$config['cur_tag_open'] = '<li class="page-link first-page active"><a href="'.$config['base_url'].'">';

		$config['cur_tag_close'] = '</a></li>';

		$config['num_tag_open'] = '<li class="page-link">';

		$config['num_tag_close'] = '</li>';

		//$config['num_links'] = round($choice);	

		if($num_links) {

			$number_of_links = $num_links;

		} else {

			$number_of_links = round($choice);

		}

		$config['num_links'] = $number_of_links;

		$this->pagination->initialize($config);

		$pagination = $this->pagination->create_links();

		return $pagination;

  } 

}