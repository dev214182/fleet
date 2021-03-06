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
    protected $_table_social_media = 'mz_postsocialmedia AS socm';
    protected $_table_postmain = 'mz_postmain AS post';
    protected $_table_orgsmeta = 'mz_orgsmeta AS orgm';
    protected $_table_organization = 'mz_organization AS orgs';
    protected $_table_media = 'mz_media AS med';
    protected $_table_history = 'mz_history AS hist';
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
        $this->session_activated();
    } 

    public function index(){

        $this->page_not_found();

    }

    public function view($page='404'){ 
        $this->userID = logged_info()['id'];
        $this->userType = logged_info()['type']; 
        $key = public_key();
      
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

    private function _users_types(){
        global $_GET;
        $this->query_table = $this->_table_users_type;

        if(@$_GET['s']){
            $this->query =    array( 'where' =>  array('zid' => $_GET['s']));
        }else{ 
            $this->query = array( 'where' =>  'zid  != 1');
        }

        $this->jsons();
    }

    private function _media(){
        global $_GET;
        $this->query_table = $this->_table_media; 
        $this->query =    array( 'order_by' => 'zid','order' => 'DESC');

        $this->jsons();
    } 
     
    private function _site_settings(){
        global $_GET;
        $this->query_table =  $this->_table_system;

        if(@$_GET['m']){
            $this->query = array( 'where' =>  array('zid' => $_GET['m']));
        }
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
        
        /* For Trucks/Fleet */
        }elseif(@$_GET['p'] && @$_GET['p'] == 9 && @$_GET['f']){ 
            // Display all products except deleted
            $this->query = array( 'where' => 'cats.zid = prod.zcategory AND prod.zstatus != 2 AND cats.ztype = "product" AND prod.zid = '.$_GET['f'],
                                    'fields' => 'prod.*, cats.ztitle');
        /** For Trucks/Fleet **/     
        }elseif(@$_GET['t']){ 
                $status = '';
            // Display all products except deleted
            if(@$_GET['p']){
                $status = 'AND zstatus ='. $_GET['p'];
            }

            $this->lists =  array(  'zid',
                                    'zid',
                                    'zstatus',  
                                    'zcategory',  
                                    'zloads',
                                    'ztravel_list_from',
                                    'ztravel_list_to',
                                    'zprice',
                                    'zsaleprice',
                                    'zpremprice' ,
                                    'zdate_from' ,
                                    'zdate_to'                                                                      
                            ); 
           
            $this->query = array( 'fields_listing' => array( 
                                                                'zid',
                                                                'zcategory',  
                                                                'zloads',
                                                                'ztravel_from',
                                                                'ztravel_to',
                                                                'zprice',
                                                                'zsaleprice',
                                                                'zpremprice',
                                                                'zstatus',
                                                                'zdate_from' ,
                                                                'zdate_to'       
                                                            ),
                                'fields' => 'prod.*, cats.ztitle',
                                'where' => 'cats.zid = prod.zcategory AND prod.zstatus != 2 '.$status.' AND cats.ztype = "product" AND prod.ztype ="'.$_GET['t'].'"',
                                'order_by' => 'LENGTH(prod.zdate_published), prod.zdate_published',
                                            'order' => 'DESC');                  


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
    

    private function _pageslist(){
        global $_GET;
        $this->query_table =  $this->_table_postmain;   

       
        
        if(@$_GET['z']){
           
            $this->lists = false;
            $this->query_table =  $this->_table_postmain. ', '. $this->_table_social_media;
            $this->query = array(   'fields' => '*',
                                    'where' =>  'post.zid = socm.zparent AND post.zid ='.$_GET['z']
                                    ); 
        }else{

            if(@!$_GET['t']) return false;

            $this->lists =  array(  
                                    'zid',
                                    'ztitle',
                                    'zauthor',  
                                    'zdate_published',
                                    'zstatus',
                                    'zstatus'
                            );

            $this->query = array(   'fields_listing' => array(
                                                'zid',
                                                        'ztitle',
                                                        'zauthor',  
                                                        'zdate_published',
                                                        'zstatus'     
                                                        ),
                                    'fields' => '*',
                                    'where' =>  'zstatus != 2 AND ztype="'.$_GET['t'].'"',
                                    'order_by' => 'LENGTH(zdate_published), zdate_published',
                                                'order' => 'DESC'); 
        }
    
        $this->jsons();
    }

    private function _orders(){
            global $_GET;
            $this->query_table =  $this->_table_orders .' , '. $this->_table_order_details; 
            $datas = '';
            $suc = false;
            // Display all orders from author
            if(@$_GET['x']){
                $datas = " AND ords.zauthor =".$_GET['x'];
                $suc = true;
            }elseif(@$_GET['p'] == 99){
                $suc = true;
            }

            $this->order_company = true;
            
            $this->lists =  array(  
                                    'zid',
                                    'zid',
                                    'zstatus',
                                    'zauthor',  
                                    'zcategory',
                                    'zloads',
                                    'ztravel_list_from',
                                    'zcustomer_type', 
                                    'zurgent', 
                                    'zdate_published',
                                    'ztravel_to',
                                    'zstatusID'
                            );

            if(@$_GET['dashboard']){
                
                $this->lists =  array(  
                                        'zid', 
                                        'zauthor',  
                                        'zcategory',
                                        'zloads',
                                        'ztravel_list_from',
                                        'zurgent',
                                        'zdate_published',
                                        'zstatusID'
                                    );

             
            }

            $this->query = array(   'fields_listing' => array(
                                                                'zid',
                                                                'zauthor',  
                                                                'zcategory',
                                                                'zloads',
                                                                'ztravel_from', 
                                                                'ztravel_to',
                                                                'zcustomer_type',
                                                                'zurgent',
                                                                'zdate_from',
                                                                'zstatus',
                                                                'zdate_published'
                                                                ),
                                    'fields' => '*,ords.zid AS zid, ords.zstatus AS zstatus',
                                    'where' =>  'ords.zid = ordd.zorder_id AND ords.zstatus != 2'.$datas,
                                    'order_by' => 'LENGTH(ords.zdate_published), ords.zdate_published',
                                    'order' => 'DESC'); 
            
                if(@$_GET['z'] && @$_GET['x']){
                    $suc = true;
                    $this->lists = false;
                    $item = '';

                    if($this->userType == 6){
                        $item = $datas;
                    }
                    $this->query = array(   'fields' => '*,ords.zid AS zid, ords.zstatus AS zstatus',
                                            'where' =>  'ords.zid = ordd.zorder_id AND ords.zid ='.$_GET['z']. $item
                                         ); 
                }
                
            if(!$suc) return false;
        
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
        $cur_date = date('Y-m-d');
        $fut_date = date('Y-m-d',strtotime('+30 days')) . PHP_EOL;
        $menu_chk = false;
        $arr_pop = false;
        $output = []; 
        $data1 = [];
        $data2 = [];
        $parZ =  $o;
        
        
         /* Run on DataTables */
        if(@$o['recordsTotal'] > 0 && $this->lists){
           
            foreach($o['data'] as $k => $aRow){ 
  
                $data1[] =  (object)$aRow;
            }

            $o =$data1;
        }
        
       
         /* Run on All */
         if($o){ 
           
            if(@$o['recordsTotal'] === 0 ){ 
                $output = array( "draw"             =>  0,  
                                "recordsTotal"      =>  0,  
                                "recordsFiltered"   =>  0,  
                                "data"              =>  0  );
                $json = json_encode($output);  
                echo $json;
                return false;
                
            } 
          
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
                        $output[$k]['ztravel_list_from'] =  '<p>'.$v->ztravel_from . "</p><p>".date('m/d/Y', strtotime($v->zdate_from))."</p>";
                    }

                    if(@$v->ztravel_to){
                        $output[$k]['ztravel_list_to'] =  '<p>'.$v->ztravel_to . "</p><p>".date('m/d/Y', strtotime($v->zdate_to))."</p>";
                    }

                    if(@$v->zdate_published){
                        $output[$k]['zdate_published'] =  date('m-d-Y', strtotime($v->zdate_published));
                    }

                    if(@$v->zpassword){ 
                        $output[$k]['zpassword'] =  'Find it yourself';
                    }

                    if(@$v->zcustomer_type){
                        $output[$k]['zcustomer_typeID'] = $v->zcustomer_type; 
                        $output[$k]['zcustomer_type'] = status_info($v->zcustomer_type); 
                    }

                    if(@$v->ztype){
                        $output[$k]['ztypeID'] = $v->ztype;
                        $output[$k]['ztype'] = user_types_clean( $v->ztype);
                    }

                    if(@$v->zurgent){
                        $output[$k]['zurgentID'] = $v->zurgent;
                        $output[$k]['zurgent'] = yes_no( $v->zurgent);
                    }

                    if(@$v->zimage1){
                        $mediaInfo = $this->global_func_query('mz_media',array("where" => array('zid' => $v->zimage1)));
                        $output[$k]['imgID'] = $v->zimage1;
                        $output[$k]['zimage'] = @$mediaInfo[0]->zimage;
                        $output[$k]['zimageTitle'] = @$mediaInfo[0]->ztitle;
                        $output[$k]['zalt'] = @$mediaInfo[0]->zalt; 
                    }

                    if(@$v->zstatus){
                        $output[$k]['zstatusID'] = $v->zstatus;  
                        $output[$k]['zstatus'] = status_info($v->zstatus);
                        
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

                    if(@$v->zauthor){ 
                        $fields =  array('zfirstname','zlastname','zcompany','zemail','zphone_num');
                        $getName = $this->global_get_title('mz_profile',array('zparent' =>$v->zauthor), $fields);
                        $output[$k]['zauthorID'] = $v->zauthor;
                       
                        $output[$k]['zauthor'] = @$getName[0]->zfirstname. ' '. @$getName[0]->zlastname;

                        if($this->order_company){
                            $output[$k]['zcompany'] = @$getName[0]->zcompany;
                            $output[$k]['zemail'] = @$getName[0]->zemail;
                            $output[$k]['zphone_num'] = @$getName[0]->zphone_num;
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

             
            }
        
        if($arr_pop){
            $output = array_values($output);
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
        return false;
    }
     
}