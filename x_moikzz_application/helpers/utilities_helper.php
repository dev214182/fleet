<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	// @mel
	if (!function_exists('file_front_dir')) {
		function file_common_dir( $file ){ 
			return  base_url().'x_moikzz_assets/'.$file; 
		} 
<<<<<<< HEAD
<<<<<<< HEAD
	}
	// @mel


=======
=======
>>>>>>> b534c0a98cfcba2eb79875f4c8acdfc6b8b1bd52
	} 
	
>>>>>>> Moikzz
	if (!function_exists('file_common_dir_back')) { 

		function file_common_dir_back( $file ){ 

			return  base_url().'x_moikzz_assets/back/'.$file; 

		} 
	} 

	if (!function_exists('file_common_dir_front')) { 

		function file_common_dir_front( $file ){
			return  base_url().'x_moikzz_assets/front/'.$file;
		} 
	}

	if (!function_exists('imgs_dir')) {
		function imgs_dir( $file ){
			return base_url().'x_moikzz_assets/images/'.$file;
		}
	}

	if (!function_exists('front_images_dir')) {
		function front_images_dir(){
			return base_url().'x_moikzz_assets/images/';
		}
	}

	if (!function_exists('plugins_dir')) {
		function plugins_dir( $file ){

			return base_url().'x_moikzz_assets/plugins/'.$file; 

		}  
	} 

	if (!function_exists('logged_info')) {
		function logged_info(){
			$info = array('id'=> 1, 'type' =>1);
			return  $info;
		}
	}

	if (!function_exists('public_key')) {
		function public_key(){ 
			$year = date('Y');
			$month = date('m');
			$day = date('d'); 
			$key = '2zSM*(sOGkVs193201971Jq)Sk0*^%skdjDs3051Fz4AKz821Pq7053atK'; 
			return  $key;
		} 
	}

	if (!function_exists('private_key')) {
		function private_key(){  
			$key = 'zMI*3n42TU1Ias62fkn%L(1r:LK6^VL(@PO67Edfhb*8@L93dG4'; 
			return  $key;
		} 
	}

	if(!function_exists('page_not_found')) {
		function page_not_found($data=null) {
			$CI =&get_instance();
			 return $CI->template->load( 'front/template', 'errors/html/error_404',$data);
		}
	} 
	 
	if(!function_exists('current_uri_segments')) {
		function current_uri_segments($segments) {
			$CI =&get_instance();
			$uri = $CI->uri->segment(3);
			if( $uri == $segments ) {
				return 'active';
			} else {
				return $uri ."==". $segments;
			}
		}
	}

	if (!function_exists('get_global_custom_query')) {

		function get_global_custom_query($table,$whr, $fld=null,$field_name=null){

				$CI =&get_instance();  

			    $where = $whr;//array('zid' => $id); 

			    $fld==null ? $select="*" : $select = $fld;

				$CI->db->select($select);

				$CI->db->from($table);

				$CI->db->where($where);

				$query = $CI->db->get();

				if($query->num_rows() > 0) {
					if($field_name){
						$result = $query->result()[0]->$field_name;
					}else{
						$result = $query->result();
					}

					return $result;

				} else {
					return false;
				}
	    }
    }  


	if (!function_exists('user_info')) { 
		function user_info($key=null) { 

			$CI =&get_instance(); 

			$current_user = '';

			$session_data = $CI->session->userdata('logged_in');

			if( $session_data ) { 

				return $session_data;

			}

		} 

	} 

	if (!function_exists('get_current_url')) { 
		function get_current_url() { 

			$page = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; 

			return $page; 

		} 

	} 


	if (!function_exists('get_page_referer')) { 
		function get_page_referer() { 

			$page = $_SERVER['HTTP_REFERER']; 

			$basename = basename($page); 

			return $basename; 

		} 

	} 



	if (!function_exists('status_info')) {



		function status_info($key) { 

			 

			switch($key){

			    case 1:

				return "Preview";

			        break;

			    case 2:

				return "<p class='text-danger msg-inline'>Deleted</p>";

			        break;

			    case 3:

				return "<p class='text-warning msg-inline'>Rejected</p>";

			        break;

			    case 4:  

				return "<p class='text-primary msg-inline'>Private</p>";

			        break;

			    case 5:

	                return "<p class='text-danger msg-inline'>Resigned</p>";

	                break;

	            case 6:

	                return "<p class='text-danger msg-inline'>Terminated</p>";

					break;

				case 7:

	                return "<p class='text-danger msg-inline'>Cancelled</p>";

	                break;
				case 8:

	                return "<p class='text-info msg-inline'>onHand</p>";

	                break;
		     	case 9:

                	return "<p class='text-success msg-inline'>Published</p>";

                	break; 
				case 10:

	                return "<p class='text-success msg-inline'>Completed</p>";

					break;
				case 11:

	                return "<p class='text-success msg-inline'>Sold</p>";

					break;
				case 12:

	                return "<p class='text-success msg-inline'>On Going</p>";

					break;
				case 13:

	                return "<p class='text-warning msg-inline'>In Progress</p>";

					break;
				case 14:

	                return "<p class='text-primary msg-inline'>New</p>";

					break;
				case 15:

	                return "<p class='text-primary msg-inline'>Pending</p>";

					break;
				case 16:

	                return "<p class='text-danger msg-inline'>Delayed</p>";

					break;
				case 17:

	                return "<p class='text-success msg-inline'>Active</p>";

					break;
				case 18:

	                return "<p class='text-success msg-inline'>Authenticated</p>";

					break;
				case 19:

	                return "<p class='text-default msg-inline'>Normal</p>";

					break;	
				case 20:

	                return "<p class='text-info msg-inline'>Advance</p>";

					break;
				case 21:

	                return "<p class='text-success msg-inline'>Premium</p>";

					break;
				case 22:

	                return "<p class='text-default msg-inline'>Order Received</p>";

					break;
				case 23: 
	                return "<p class='text-info msg-inline'>Order Confirmed</p>"; 
					break;
				case 24: 
	                return "<p class='text-primary msg-inline'>Quote Sent</p>"; 
					break;	
				case 25: 
	                return "<p class='text-primary msg-inline'>Customer Contacted</p>"; 
					break;
				case 26: 
	                return "<p class='text-success msg-inline'>Payment Completed</p>"; 
					break;
				case 27: 
	                return "<p class='text-default msg-inline'>Draft</p>"; 
					break;		
			    default:

			        return "Preview";

			        break;

			}  
		} 

	} 

	if (!function_exists('status_info_clean')) {  
		function status_info_clean($key) {   
			switch($key){ 
			    case 1:

			        return "Preview";

			        break;

			    case 2:

			        return "Deleted";

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

	                return "Cancelled";

	                break;
				case 8:

	                return "onHand";

	                break;
		     	case 9:

                	return "Published";

                	break; 
				case 10:

	                return "Completed";

					break;
				case 11:

	                return "Sold";

					break;
				case 12:

	                return "On Going";

					break;
				case 13:

	                return "In Progress";

					break;
				case 14:

	                return "New";

					break;
				case 15:

	                return "Pending";

					break;
				case 16:

	                return "Delayed";

					break;	
				case 17: 
	                return "Active";

					break;
				case 18: 
	                return "Authenticated";

					break;
				case 19:

	                return "Normal";

					break;	
				case 20:

	                return "Advance";

					break;
				case 21:

					return "Premium";
				case 22:

	                return "Order Received";

					break;
				case 23: 

	                return "Order Confirmed"; 
					break;
				case 24: 

	                return "Quote Sent"; 
					break;	
				case 25: 

	                return "Customer Contacted"; 
					break;
				case 26: 

					return "Payment Completed"; 
					break;
				case 27: 

					return "Draft"; 
					break; 
			    default:

			        return "Preview";

			        break;

			}  
		}  
	}

	if (!function_exists('yes_no')) {  
		function yes_no($key) {   
			switch($key){ 
			    case 1: 
			        return "Yes"; 
					break;
			 
				default: 
			        return "No"; 
			        break; 
			}  
		}
	}

	if (!function_exists('user_types_clean')) {  
		function user_types_clean($key) {   
			switch($key){ 
			    case 2: 
			        return "Administrator"; 
					break;
				case 3: 
			        return "Editor"; 
					break;
				case 4: 
			        return "SEO Editor"; 
					break;
				case 5: 
			        return "Admin Staff"; 
					break; 
				default: 
			        return "Customers"; 
			        break;

			}  
		}
	}

if (!function_exists('secondsToTime')) {

	function secondsToTime($inputSeconds) {



	    $secondsInAMinute = 60;

	    $secondsInAnHour  = 60 * $secondsInAMinute;

	    $secondsInADay    = 24 * $secondsInAnHour;



	    // extract days

	    $days = floor($inputSeconds / $secondsInADay);



	    // extract hours

	    $hourSeconds = $inputSeconds % $secondsInADay;

	    $hours = floor($hourSeconds / $secondsInAnHour);



	    // extract minutes

	    $minuteSeconds = $hourSeconds % $secondsInAnHour;

	    $minutes = floor($minuteSeconds / $secondsInAMinute);



	    // extract the remaining seconds

	    $remainingSeconds = $minuteSeconds % $secondsInAMinute;

	    $seconds = ceil($remainingSeconds);



	    // return the final array

	    $obj = array(

	        'd' => (int) $days,

	        'h' => (int) $hours,

	        'm' => (int) $minutes,

	        's' => (int) $seconds,

	    );

	    return $obj;

	}

}    

	if (!function_exists('clean_date')) {



		function clean_date($date) {  

			 echo date('m/d/Y', strtotime($date));

		} 

	}


	if (!function_exists('is_loggged_in')) { 

		function is_loggged_in() { 

			$CI =&get_instance(); 

			return ($CI->session->userdata('logged_in')) ? true : false; 

		} 
	} 



	if(!function_exists('activate_menu')) {



	  function activate_menu($basename) {



	  	$current_url = current_url();



			$current_basename = basename($current_url);



	    return ($current_basename == $basename) ? 'current-menu' : '';



	  }
	}
	if(!function_exists('delete_all_between')) {
		function delete_all_between($beginning, $end, $string) {
			$beginningPos = strpos($string, $beginning);
			$endPos = strpos($string, $end);
			if ($beginningPos === false || $endPos === false) {
			return $string;
			}

			$textToDelete = substr($string, $beginningPos, ($endPos + strlen($end)) - $beginningPos);

			return delete_all_between($beginning, $end, str_replace($textToDelete, '', $string)); // recursion to ensure all occurrences are replaced
		}
	}
?>