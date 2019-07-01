<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class User_Model extends SS_Model { 

  	function __construct() {

    	   $this->table_name = 'x_users';
  	} 

  	function make($username){
  		$this->db->select('*'); 

		$this->db->from($this->table_name); 

		$this->db->where('us_user_name', $username); 

		$this->db->limit(1);
  	}

    function logins($user, $password){ 

		$this->make($user);

		$query = $this->db->get();

		if($query->num_rows() == 1) { 
		   	$qq = $query->result_array();  

		   	$hash = $qq[0]['us_user_password']; 

		   	$status = $qq[0]['us_status']; 

		   	if($status == 9){

			   	if(password_verify($password,$hash)){   

		   			return $qq;  

			   	} else{

			   		return false;

			   	}

		    }else{

		    	return 'inactive';

		    } 

		} else { 

			return false; 

		}

    } 

   	function update_data($data, $where) {

	    $this->db->where($where);

	    $this->db->update($this->table_name, $data);

	    return $this->db->affected_rows();

  	}  

}?>