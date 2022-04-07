<?php defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' ); 

/**
 * Class : BaseController
 * Base Class to control over all the classes
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class BaseController extends CI_Controller {
	protected $role = '';
	protected $vendorId = '';
	protected $name = '';
	protected $roleText = '';
	protected $global = array ();
	protected $lastLogin = '';
	
	/**
	 * Takes mixed data and optionally a status code, then creates the response
	 *
	 * @access public
	 * @param array|NULL $data
	 *        	Data to output to the user
	 *        	running the script; otherwise, exit
	 */
	public function response($data = NULL) {
		$this->output->set_status_header ( 200 )->set_content_type ( 'application/json', 'utf-8' )->set_output ( json_encode ( $data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES ) )->_display ();
		exit ();
	}
	
	/**
	 * This function used to check the user is logged in or not
	 */
	function isLoggedIn() {
		$isLoggedIn = $this->session->userdata ( 'isLoggedIn' );
		
		if (! isset ( $isLoggedIn ) || $isLoggedIn != TRUE) {
			redirect ( 'login' );
		} else {
			$this->role = $this->session->userdata ( 'role' );
			$this->vendorId = $this->session->userdata ( 'userId' );
			$this->name = $this->session->userdata ( 'name' );
			$this->roleText = $this->session->userdata ( 'roleText' );
			$this->lastLogin = $this->session->userdata ( 'lastLogin' );
			
			$this->global ['name'] = $this->name;
			$this->global ['role'] = $this->role;
			$this->global ['role_text'] = $this->roleText;
			$this->global ['last_login'] = $this->lastLogin;
		}
	}
	
	/**
	 * This function is used to check the access
	 */
	function isAdmin() {
		if ($this->role != ROLE_ADMIN) {
			if($this->isRole() == TRUE){
                return false;
            }else{
              return true;
            }
			
		} else {
			return false;
		}
	}
	function isRole() {
		if ($this->role == ROLE_MANAGER) {
			$link = $_SERVER['PHP_SELF'];
		    $link_array = explode('/',$link);
		    $page = end($link_array);
		    $refer_split = explode("/", $link);
		     $page2 = $refer_split[ count($refer_split) - 2];
			$URI = $_SERVER['REQUEST_URI'];
			$path = '/staging/pongo/';
			$isLoggedIn = $this->session->userdata('userId');
              $this->db->select('*');
              $this->db->from('tbl_users ');
              $this->db->where('roleId', 2);
              $this->db->where('userId', $isLoggedIn);
              $query = $this->db->get();
              $result = $query->row();
              $nksdata = unserialize($result->assignrole);
              foreach ($nksdata as $key => $value) {
              	if(!empty($value)){
              	if($key=='users'){
              		foreach ($value as $ckey => $cvalue) {
              			if($page == 'userListing' && !empty($cvalue)){
	          				return true;
	          				}
	          				if($page2 == 'userListing' && !empty($cvalue)){
	          				return true;
	          				}
	          				if($cvalue == 'view' && $page2=='editOld'){
	          				return true;
	          				}
	          				if($cvalue == 'status' && $page2=='userListing' || $page=='userListing' && $cvalue == 'status' || $page=='adminstatus' && $cvalue == 'status'){
	          				return true;
	          				}
              		}
              	}
              	if($key=='doctors'){
              		foreach ($value as $ckey => $cvalue) {
              			if($page == 'doctorListing' && !empty($cvalue)){
	          				return true;
	          				}
	          				if($page2 == 'doctorListing' && !empty($cvalue)){
	          				return true;
	          				}
	          				if($cvalue == 'view' && $page2=='editdoctor'){
	          				return true;
	          				}
	          				if($cvalue == 'status' && $page2=='doctorListing' || $page=='doctorListing' && $cvalue == 'status' || $page=='adminstatus' && $cvalue == 'status'){
	          				return true;
	          				}
              		}
              	}
              	if($key=='technician'){
              		foreach ($value as $ckey => $cvalue) {
              			if($page == 'techListing' && !empty($cvalue)){
	          				return true;
	          				}
	          				if($page2 == 'techListing' && !empty($cvalue)){
	          				return true;
	          				}
	          				if($cvalue == 'view' && $page2=='edittech'){
	          				return true;
	          				}
	          				if($cvalue == 'status' && $page2=='techListing' || $page=='techListing' && $cvalue == 'status' || $page=='adminstatus' && $cvalue == 'status'){
	          				return true;
	          				}
              		}
              	}
              	if($key=='state'){
              		foreach ($value as $ckey => $cvalue) {
              			if($page == 'allstatelist' && !empty($cvalue)){
	          				return true;
	          				}
	          				if($page2 == 'allstatelist' && !empty($cvalue)){
	          				return true;
	          				}
	          				if($cvalue == 'view' && $page2=='editstate'){
	          				return true;
	          				}
	          				if($cvalue == 'edit' && $page2=='editstate' || $page=='editState' && $cvalue == 'edit'){
	          				return true;
	          				}
	          				if($cvalue == 'add' && $page=='addstate' || $page=='addNewstate' && $cvalue == 'add'){
	          				return true;
	          				}
	          				if($cvalue == 'delete' && $page=='deletestate'){
	          				return true;
	          				}
              		}
              	}
              	if($key=='pets'){
              		foreach ($value as $ckey => $cvalue) {
              			if($page == 'petlist' && !empty($cvalue)){
	          				return true;
	          				}
	          				if($page2 == 'petlist' && !empty($cvalue)){
	          				return true;
	          				}
	          				if($cvalue == 'view' && $page2=='editpet'){
	          				return true;
	          				}
	          				if($cvalue == 'edit' && $page2=='editpet' || $page=='editPet' && $cvalue == 'edit'){
	          				return true;
	          				}
	          				if($cvalue == 'delete' && $page=='deletepet'){
	          				return true;
	          				}
              		}
              	}
              	if($key=='category'){
              		foreach ($value as $ckey => $cvalue) {
              			if($page == 'categorylist' && !empty($cvalue)){
	          				return true;
	          				}
	          				if($page2 == 'categorylist' && !empty($cvalue)){
	          				return true;
	          				}
	          				if($cvalue == 'view' && $page2=='editcategory'){
	          				return true;
	          				}
	          				if($cvalue == 'edit' && $page2=='editcategory' || $page=='editCategory' && $cvalue == 'edit'){
	          				return true;
	          				}
	          				if($cvalue == 'add' && $page=='addcategory' || $page=='addNewcategory' && $cvalue == 'add'){
	          				return true;
	          				}
	          				if($cvalue == 'delete' && $page=='deletecategory'){
	          				return true;
	          				}
              		}
              	}
              	if($key=='products'){
              		foreach ($value as $ckey => $cvalue) {
              			if($page == 'productlist' || $page == 'products' && !empty($cvalue)){
	          				return true;
	          				}
	          				if($page2 == 'productlist' || $page2 == 'products' && !empty($cvalue)){
	          				return true;
	          				}
	          				if($cvalue == 'view' && $page2=='editproduct'){
	          				return true;
	          				}
	          				if($cvalue == 'edit' && $page2=='editproduct' || $page=='editProduct' && $cvalue == 'edit'){
	          				return true;
	          				}
	          				if($cvalue == 'add' && $page=='addproduct' || $page=='addNewproduct' && $cvalue == 'add'){
	          				return true;
	          				}
	          				if($cvalue == 'import' && $page=='productimport'){
	          				return true;
	          				}
	          				if($cvalue == 'view' && $page2=='editproducts'){
	          				return true;
	          				}
	          				if($cvalue == 'edit' && $page2=='editproducts' || $page=='editProducts' && $cvalue == 'edit'){
	          				return true;
	          				}
	          				if($cvalue == 'add' && $page=='addproducts' || $page=='addNewproducts' && $cvalue == 'add'){
	          				return true;
	          				}
	          				if($cvalue == 'import' && $page=='nonprescribeproductimport'){
	          				return true;
	          				}

	          				if($cvalue == 'delete' && $page=='deleteproduct'){
	          				return true;
	          				}


              			
              		}
              	}
              	if($key=='blog'){
              		foreach ($value as $ckey => $cvalue) {
              			if($page == 'bloglist' && !empty($cvalue)){
	          				return true;
	          				}
	          				if($page2 == 'bloglist' && !empty($cvalue)){
	          				return true;
	          				}
	          				if($cvalue == 'view' && $page2=='editblog'){
	          				return true;
	          				}
	          				if($cvalue == 'edit' && $page2=='editblog' || $page=='editBlog' && $cvalue == 'edit'){
	          				return true;
	          				}
	          				if($cvalue == 'add' && $page=='addblog' || $page=='addNewblog' && $cvalue == 'add'){
	          				return true;
	          				}
	          				if($cvalue == 'delete' && $page=='deleteblog'){
	          				return true;
	          				}
              		}
              	}
              	if($key=='push_notification'){
              		foreach ($value as $ckey => $cvalue) {
              			if($page == 'pushlist' && !empty($cvalue)){
	          				return true;
	          				}
	          				if($page2 == 'pushlist' && !empty($cvalue)){
	          				return true;
	          				}
	          				if($cvalue == 'view' && $page2=='editpush'){
	          				return true;
	          				}
	          				if($cvalue == 'edit' && $page2=='editpush' || $page=='editPush' && $cvalue == 'edit'){
	          				return true;
	          				}
	          				if($cvalue == 'add' && $page=='addpush' || $page=='addNewpush' && $cvalue == 'add'){
	          				return true;
	          				}
	          				if($cvalue == 'delete' && $page=='deletepush'){
	          				return true;
	          				}
              			
              		}
              	}
              	if($key=='orders'){
              		foreach ($value as $ckey => $cvalue) {
              			if($page == 'orderlist' && !empty($cvalue)){
	          				return true;
	          				}
              			
              		}
              	}
              	if($key=='breed'){
              	foreach ($value as $ckey => $cvalue) {
              			   if($page == 'breedlist' && !empty($cvalue)){
	          				return true;
	          				}
	          				if($page2 == 'breedlist' && !empty($cvalue)){
	          				return true;
	          				}
	          				if($cvalue == 'view' && $page2=='editbreed'){
	          				return true;
	          				}
	          				if($cvalue == 'edit' && $page2=='editbreed' || $page=='editBreed' && $cvalue == 'edit'){
	          				return true;
	          				}
	          				if($cvalue == 'add' && $page=='addbreed' || $page=='addNewbreed' && $cvalue == 'add'){
	          				return true;
	          				}
	          				if($cvalue == 'import' && $page=='breedimport'){
	          				return true;
	          				}
	          				if($cvalue == 'delete' && $page=='deletebreed'){
	          				return true;
	          				}
              			
              		}
              	}
              	if($key=='coupon'){
              		foreach ($value as $ckey => $cvalue) {
              			if($page == 'couponlist' && !empty($cvalue)){
	          				return true;
	          				}
	          				if($page2 == 'couponlist' && !empty($cvalue)){
	          				return true;
	          				}
	          				if($cvalue == 'view' && $page2=='editcoupons'){
	          				return true;
	          				}
	          				if($cvalue == 'edit' && $page2=='editcoupons' || $page=='editCoupon' && $cvalue == 'edit'){
	          				return true;
	          				}
	          				if($cvalue == 'add' && $page=='addcoupon' || $page=='addNewcoupon' && $cvalue == 'add'){
	          				return true;
	          				}
	          				if($cvalue == 'delete' && $page=='deletecoupon'){
	          				return true;
	          				}
              			
              		}
              		
              	}

     	   }
		}
	}
}
	/**
	 * This function is used to check the access
	 */
	function isTicketter() {
		if ($this->role != ROLE_ADMIN || $this->role != ROLE_MANAGER) {
			return true;
		} else {
			return false;
		}
	}
	
	/**
	 * This function is used to load the set of views
	 */
	function loadThis() {
		$this->global ['pageTitle'] = 'Pongo : Access Denied';
		
		$this->load->view ( 'includes/header', $this->global );
		$this->load->view ( 'access' );
		$this->load->view ( 'includes/footer' );
	}
	
	/**
	 * This function is used to logged out user from system
	 */
	function logout() {
		$this->session->sess_destroy ();
		
		redirect ( 'login' );
	}

	/**
     * This function used to load views
     * @param {string} $viewName : This is view name
     * @param {mixed} $headerInfo : This is array of header information
     * @param {mixed} $pageInfo : This is array of page information
     * @param {mixed} $footerInfo : This is array of footer information
     * @return {null} $result : null
     */
    function loadViews($viewName = "", $headerInfo = NULL, $pageInfo = NULL, $footerInfo = NULL){

        $this->load->view('includes/header', $headerInfo);
        $this->load->view($viewName, $pageInfo);
        $this->load->view('includes/footer', $footerInfo);
    }
	
	/**
	 * This function used provide the pagination resources
	 * @param {string} $link : This is page link
	 * @param {number} $count : This is page count
	 * @param {number} $perPage : This is records per page limit
	 * @return {mixed} $result : This is array of records and pagination data
	 */
	function paginationCompress($link, $count, $perPage = 10, $segment = SEGMENT) {
		$this->load->library ( 'pagination' );

		$config ['base_url'] = base_url () . $link;
		$config ['total_rows'] = $count;
		$config ['uri_segment'] = $segment;
		$config ['per_page'] = $perPage;
		$config ['num_links'] = 5;
		$config ['full_tag_open'] = '<nav><ul class="pagination">';
		$config ['full_tag_close'] = '</ul></nav>';
		$config ['first_tag_open'] = '<li class="arrow">';
		$config ['first_link'] = 'First';
		$config ['first_tag_close'] = '</li>';
		$config ['prev_link'] = 'Previous';
		$config ['prev_tag_open'] = '<li class="arrow">';
		$config ['prev_tag_close'] = '</li>';
		$config ['next_link'] = 'Next';
		$config ['next_tag_open'] = '<li class="arrow">';
		$config ['next_tag_close'] = '</li>';
		$config ['cur_tag_open'] = '<li class="active"><a href="#">';
		$config ['cur_tag_close'] = '</a></li>';
		$config ['num_tag_open'] = '<li>';
		$config ['num_tag_close'] = '</li>';
		$config ['last_tag_open'] = '<li class="arrow">';
		$config ['last_link'] = 'Last';
		$config ['last_tag_close'] = '</li>';
	
		$this->pagination->initialize ( $config );
		$page = $config ['per_page'];
		$segment = $this->uri->segment ( $segment );
	
		return array (
				"page" => $page,
				"segment" => $segment
		);
	}
}