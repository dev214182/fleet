<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Description of General_callbacks
 * notes: check the API key from view function
 * 
 * @author Moikzz
 */
class Viewing_callbacks extends SS_Controller { 

    protected $data_pages;
    protected $lists = false;
    protected $order_company = false;
    protected $studz = false;
    protected $query;
    protected $query_table;
    protected $_table_company    = 'mz_company AS ccomp';
    protected $_table_persons = 'mz_persons AS pers';
    protected $_table_subprofile = 'mz_subprofile AS subp';
    protected $_table_profile = 'mz_profile AS prof';
    protected $_table_testimonials = 'mz_testimonials AS tes';
    protected $_table_orders = 'mz_orders AS ords';
    protected $_table_order_details = 'mz_orderdetails AS ordd'; 
    protected $_table_products = 'mz_products AS prod';
    protected $_table_categories = 'mz_categories AS cats'; 
    protected $_table_social_media = 'mz_postsocialmedia AS socm';
    protected $_table_postmain = 'mz_postmain AS post';
    protected $_table_media = 'mz_media AS med';
    protected $_table_contactform = 'mz_contactform AS cont';
    protected $_table_comments = 'mz_comments AS comm';
    
    /*** QUERY string
      * 
      *    $query = array( 'fields_listing' => array('', '') - this is for datatable field to show
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

    /* 
    * $_GET['p'] for Status
    * $_GET['s'] for parent ID
    * $_GET['x'] for  organization type ( school = sc / company = comp / department = dept / division = div / section = sec / grade etc...)
    */
    protected $userID; // need to change to login user - temporary only
    protected $userType; //This will be change to session logged type - temporary only
    function __construct(){  
        parent::__construct(); 
        $this->load->helper('url');  
    } 

    public function index(){ 
        $this->page_not_found(); 
    }

    public function view($page='404'){ 
     
        $key = private_key();
     
        if(@$_GET['k'] == $key /* && $this->input->is_ajax_request() */){
            if (!method_exists($this, $page)){
                $this->page_not_found();
                return false;
            }else{
                $this->links($page);
            }
        }else{
            echo 'Direct access is not allowed!';
            return false;
        }
    }

    private function links($p){
        $this->data_pages = $p;
        return $this->{$this->data_pages}();
    }

    private function _testimonials(){
        $this->query_table =  $this->_table_testimonials;
        $this->jsons();
    }

    private function _media(){
        global $_GET;
        if(!$_GET['s'])return false;

        $this->query_table =  $this->_table_media.", ".$this->_table_postmain;
        $this->query = array( 'where' => 'post.zimage1 = med.zid AND post.zslug ="'.$_GET['s'].'"');
        $this->jsons();
    }
    
    private function _products(){
        global $_GET;

        $t = @$_GET['z'] ? $zd = ' AND prod.zid ='. $_GET['z'] : $zd = '';
        $t = @$_GET['t'] ? $type = ' AND prod.zcategory ='. $_GET['t'] : $type = '';
        $t = @$_GET['d'] ? $ddate = ' AND prod.zdate_from >= "'. $_GET['d'].'"' : $ddate = '';
        $t = @$_GET['o'] ? $dfrom = ' AND prod.ztravel_from ="'. $_GET['o'].'"' : $dfrom = '';
        $t = @$_GET['x'] ? $dto = ' AND prod.ztravel_to ="'. $_GET['x'].'"' : $dto = '';
        $t = @$_GET['l'] ? $dloads = ' AND prod.zloads >='. $_GET['l'] : $dloads = '';
        $this->query = array( 'where' => 'cats.zid = prod.zcategory AND prod.zstatus != 2 AND cats.ztype = "product " '.$type.' '.$ddate.' '.$dfrom.' '.$dto.' '.$dloads.' '.$zd,
                              'fields' => 'prod.*',
                              'order_by' => 'prod.zdate_published',
                              'order' => 'DESC',);
        // prod, cats
        $this->query_table =  $this->_table_products .','. $this->_table_categories;
        $this->jsons();
    }

    private function _pageslist(){
        global $_GET;
        $this->query_table =  $this->_table_postmain;
        
        if(@$_GET['z']){
           
            $this->lists = false;
            $this->query_table =  $this->_table_postmain. ', '. $this->_table_social_media;
            $this->query =  array(   'fields' => '*',
                                    'where' =>  'post.zid = socm.zparent AND post.zid ='.$_GET['z']
                                    ); 
        }else{ 
            return false;   
        }
    
        $this->jsons();
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
            $datas = 'AND uss.zid ='. $_GET['s'];
            $this->query = array(   'where' =>  'uss.zid = prof.zparent AND uss.zstatus != 2 AND uss.ztype != 1 '.$datas);
        //get current logged profile
        }elseif(@$_GET['p']){
            $datas = " AND uss.zid =".$this->userID;
            $this->query = array(   'where' =>  'uss.zid = prof.zparent AND uss.zstatus != 2 '.$datas);
        }else{
            $this->lists =  array(  'zid',
                                    'zstatus',
                                    'zusername',
                                    'zfullname',
                                    'zemail', 
                                    'ztype', 
                                    'zcustomer_type', 
                                    'zemail'
            );

            $sv = @$_GET['c'] ? $clients_only = 'AND uss.ztype = 6': $clients_only = 'AND uss.ztype != 6';
               

                $this->query = array(   'where' =>  'uss.zid = prof.zparent AND uss.zstatus != 2 '.$clients_only.'  AND uss.ztype != 1'.$datas,
                                        'fields_listing' => array(
                                                            'zstatus',
                                                            'zusername',
                                                            'zfirstname',
                                                            'zemail',
                                                            'ztype',
                                                            'zcustomer_type' 
                                        ),
                                        'fields' => array( 'uss.zid',
                                                            'uss.zstatus',  
                                                            'uss.zusername',
                                                            'prof.zfirstname',
                                                            'prof.zlastname',
                                                            'prof.zemail',
                                                            'uss.ztype',
                                                            'uss.zcustomer_type')
                                        );
            
        }

      
        $this->jsons();
    }
      
    private function jsons(){
        $data =  $this->global_func_query($this->query_table, $this->query, $this->lists);  
        if($data)
        $this->output( $data );
    }   

    private function output( $o ){
        $this->output->set_content_type('application/json'); 
        $output = [];
        $arr_pop = false;
        foreach($o AS $k => $v){ 
            foreach($v AS $t => $z){
                $output[$k][$t] = $v->$t; 
            }
            if(@$v->zvalue){
                $data = @unserialize($v->zvalue);
                if ($data !== false) { 
                    $output[$k]['zvalue'] = $data;
                } else {
                    $output[$k]['zvalue'] = $v->zvalue;
                }
            }

            if(@$v->zcontent){
                $output[$k]['zcontent'] = base64_decode($v->zcontent);
            }
            
            if(@$v->ztravel_from){
                $output[$k]['ztravel_list_from'] =  $v->ztravel_from . " - ".date('m-d-Y', strtotime($v->zdate_from));
            }

            if(@$v->ztravel_to){
                $output[$k]['ztravel_list_to'] =   $v->ztravel_to . " - ".date('m-d-Y', strtotime($v->zdate_to));
            }

            if(@$v->zdate_published){
                $output[$k]['zdate_published'] =  date('m-d-Y', strtotime($v->zdate_published));
            }

            if(@$v->zpassword){ 
                $output[$k]['zpassword'] =  'Find it yourself';
            }

            if(@$v->zcustomer_type){
                $output[$k]['zcustomer_typeID'] = $v->zcustomer_type; 
                $output[$k]['zcustomer_type'] = status_info_clean($v->zcustomer_type); 
            }

            if(@$v->ztype){
                $output[$k]['ztypeID'] = $v->ztype;
                $output[$k]['ztype'] = user_types_clean( $v->ztype);
            }

            if(@$v->zurgent){
                $output[$k]['zurgentID'] = $v->zurgent;
                $output[$k]['zurgent'] = yes_no( $v->zurgent);
            }

            if(@$v->zstatus){
                $output[$k]['zstatusID'] = $v->zstatus;  
                $output[$k]['zstatus'] = status_info_clean($v->zstatus);
                
            } 

            if(@$v->zorganization){
                $output[$k]['zorgID'] =  $v->zorganization;
                $output[$k]['zorganization'] = $this->global_get_title('mz_organization',array('zid' => $v->zorganization),'ztitle'); 
            } 
            
            if(@$v->zorder_to){ 
                $getName = $this->global_get_title('mz_subprofile',array('zid' => $v->zorder_to),array('zfirstname','zlastname'));
                $output[$k]['zorder_to'] = $getName[0]->zfirstname. ' '. $getName[0]->zlastname;
            }

            if(@$v->zauthor){ 
                $getName = $this->global_get_title('mz_profile',array('zid' => $v->zauthor),array('zfirstname','zlastname','zcompany','zemail','zphone_num'));
                $output[$k]['zauthorID'] = $v->zauthor;
                $output[$k]['zauthor'] = $getName[0]->zfirstname. ' '. $getName[0]->zlastname;

                if($this->order_company){
                    $output[$k]['zcompany'] = $getName[0]->zcompany;
                    $output[$k]['zemail'] = $getName[0]->zemail;
                    $output[$k]['zphone_num'] = $getName[0]->zphone_num;
                }
            }

            if(@$v->zproduct){ 
                $output[$k]['zproductID'] = $v->zproduct;
                $output[$k]['zproduct'] =  $this->global_get_title('mz_products',array('zid' => $v->zproduct),'ztitle');
            }

            if(@$v->zgrade){
                $output[$k]['zgradeID'] =  $v->zgrade;
                $output[$k]['zgrade'] =  $this->global_get_title('mz_organization',array('zid' => $v->zgrade),'ztitle');
            } 
            if(@$v->zdivision){
                $output[$k]['zdivisionID'] =  $v->zdivision;
                $output[$k]['zdivision'] = $this->global_get_title('mz_organization',array('zid' => $v->zdivision),'ztitle');
            } 
            if(@$v->zsection){
                $output[$k]['zsectionID'] =  $v->zsection;
                $output[$k]['zsection'] = $this->global_get_title('mz_organization',array('zid' => $v->zsection),'ztitle');
            } 
            if(@$v->zcompany){
                $output[$k]['zcompany'] = $v->zcompany;
                if(is_numeric($v->zcompany)){
                    $output[$k]['zcompanyID'] = $v->zcompany;
                    $output[$k]['zcompany'] = $this->global_get_title('mz_organization',array('zid' => $v->zcompany),'ztitle');
                }
            } 

            if(@$v->zdepartment){
                $output[$k]['zdepartment'] = $this->global_get_title('mz_organization',array('zid' => $v->zdepartment),'ztitle');
            } 
            if(@$v->zposition){
                $output[$k]['zposition'] = $this->global_get_title('mz_organization',array('zid' => $v->zposition),'ztitle');
            } 
            if(@$v->zcategory){
                $output[$k]['zcategoryID'] =  $v->zcategory;
                $output[$k]['zcategory'] = $this->global_get_title('mz_categories',array('zid' => $v->zcategory),'ztitle');
            } 
            
            if(@$v->zfirstname){ 
                $output[$k]['zfullname'] =  ucwords($v->zfirstname . " ". $v->zlastname);
            }
           
            if(@$v->zdate_display){
                $newDate = json_decode($v->zdate_display);
                foreach( $newDate AS $st => $v){
                    if($v >= $cur_date && $v < $fut_date){  
                         $menu_chk = true;  
                    }
                }

                if(!$menu_chk){
                    array_pop($output); 
                    $arr_pop = true; 
                }

            } 
        }

        if($arr_pop){
            $output = array_values($output);
        }
        $json = json_encode($output);  
        echo $json;
        
    }
     
}