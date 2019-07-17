<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	/**
	 * @mel 
	 */	
	if (!function_exists('file_common_dir')) {
		function file_common_dir( $file ){ 
			return  base_url().'x_moikzz_assets/'.$file; 
		} 
	}

	/**
	 * Media Uploader
	 * Call the media_uploader() to the footer and use the following to the formgroup.
	 */

	/* Paste the following to a form to open the modal uploader.
	<div class="from-group gal-media-uploader">
		<small class="font-weight-bold">Custom Image</small>
		<div class="img-wrapper mb-3">
			<img class="selected-img img-fluid" src="<?php echo file_common_dir('images/default.png');?>" alt="Gallega Image Preview">
		</div>
		<input class="modal-media-url form-control mb-3 form-control-line" type="text" name="aaaa">
		<button type="button" id="openMediaModal" class="open-media-modal btn waves-effect waves-light btn-secondary" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#galMediaUploader">Media Uploader</button>
	</div>
	*/
	
	if (!function_exists('media_uploader')) {

		function media_uploader(){ ?>
			<!-- sample modal content -->
			<div id="galMediaUploader" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="vcenter" aria-hidden="true" data-keyboard="false">
				<div class="modal-dialog modal-dialog-centered modal-xl">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title" id="vcenter">Media Uploader</h4>
							<button id="closeModal" type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						</div>
						<div class="modal-body">
							<!-- Media Uploader -->
							<div class="col-12 p-0">
								<!-- Nav tabs -->
								<ul class="nav nav-tabs customtab2 border-light" role="tablist">
									<li class="nav-item"> <a class="nav-link show bg-light text-secondary active" data-toggle="tab" href="#gallerymedia" role="tab" aria-selected="true"><span class="sm-up"><i class="mdi mdi-camera"></i></span> <span class="hidden-xs-down">Media Gallery</span></a></li>
									<li class="nav-item"> <a class="nav-link show bg-light text-secondary" data-toggle="tab" href="#uploadmedia" role="tab" aria-selected="false"><span class="sm-up"><i class="mdi mdi-cloud-upload"></i></span> <span class="hidden-xs-down">Upload</span></a></li>
								</ul>

								<!-- Tab panes -->
								<div class="tab-content media-uploader">
									<div class="tab-pane show active" id="gallerymedia" role="tabpanel">
										<div class="card mb-0">
											<div class="card-body">

												<div class="col-md-12">
													<div class="card-block">
														<div class="row">                                       
															<div class="col-8">
																<div class="row">
																	<h4 class="card-title" style="width:100%;">Media Gallery</h4>
																	<h6 class="card-subtitle">Select the file and click choose to use the file.</b></h6>
																</div>
															</div>
															<div class="col-4">
																<div class="row pull-right">
																	<div id="selectBtn"></div>
																</div>
															</div>
															<div class="col-md-9 border border-right-0">
																<div class="row">
																	<div class="media-files-container p-2 gl-flex gl-wrap">
																		<div class="spinner-border" role="status"></div>
																	</div>
																	<div class="gal-load-more-container">
																		<button type="button" id="loadMoreItems" class="shadow-none btn-sm waves-effect waves-light btn-secondary">Load More <i class="mdi mdi-arrow-down-bold-circle"></i></button>
																	</div>
																</div>
															</div>
															<div class="col-md-3 border p-3 media-file-details">
																<form action="">
																	<input id="mID" type="hidden" value="">
																	<div class="form-group gal-selected-img-container text-center border">
																		<img id="mImage" class="img-fluid" src="<?php echo file_common_dir('images/default.png');?>" alt="Gallega Image Preview">
																	</div>
																	<div class="form-group mb-2 row">
																		<label for="example-text-input" class="col-3 col-form-label"><small>Title</small></label>
																		<div class="col-9">
																			<input id="mTitle" class="form-control form-control-sm" type="text" value="" id="mediaID">
																		</div>
																	</div>
																	<div class="form-group mb-2 row">
																		<label for="example-text-input" class="col-3 col-form-label"><small>Alt</small></label>
																		<div class="col-9">
																			<input id="mAlt" class="form-control form-control-sm" type="text" value="" id="mediaALT">
																		</div>
																	</div>
																	<div class="form-group mb-2 row">
																		<div class="col-12 text-right">
																			<a href="#" class="pull-left text-secondary"><small>View in new tab</small></a>
																			<button type="button" class="btn waves-effect waves-light btn-sm btn-secondary">Update</button>
																		</div>
																	</div>
																</form>
															</div>
														</div>
													</div>
												</div>

											</div>
										</div><!-- Card -->
									</div>
								
									<div class="tab-pane" id="uploadmedia" role="tabpanel">
										<div class="card mb-0">
											<div class="card-body">
												<h4 class="card-title">Media Uploader</h4>
												<h6 class="card-subtitle">Select files or drag and drop the files to upload.</h6>
												<form action="#" class="dropzone">
													<div class="fallback">
														<input name="file" type="file" multiple />
													</div>
												</form>
											</div>
										</div><!-- card -->
									</div>

								</div><!-- tab-content -->
							</div><!-- Media Uploader -->

						</div>
						<!-- <div id="selectBtn" class="modal-footer"></div> -->
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>
			<!-- /.modal -->

		<?php
		} 
	}
	/* Media Uploader */

	
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