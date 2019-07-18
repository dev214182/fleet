<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class User_Model extends SS_Model { 

  	function __construct() {
    	   $this->table_name = 'mz_users';
  	}



    function logins($username, $password){

		$this->db->select('*');
 
		$this->db->from($this->table_name); 

		$this->db->where('zusername', $username); 

		$this->db->limit(1); 

		$query = $this->db->get(); 

		if($query->num_rows() == 1) {

		   	$qq = $query->result_array(); 

		   	$hash = $qq[0]['zpassword']; 

		   	$status = $qq[0]['zstatus']; 

		   	if($status == 2 || $status == 3 || $status == 4){

                return 'inactive';

		    }else{

                if(password_verify($password,$hash)){   

                        return $qq;
                    
                } else{

                    return false;

                } 

		    } 

		} else { 

			return false; 

		}

    } 

}?>