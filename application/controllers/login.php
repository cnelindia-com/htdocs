<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct()
    { 
	parent::__construct();
	$this->load->model('user');
	$this->load->database();
    $this->isUserLoggedIn = $this->session->userdata('isUserLoggedIn');
    $this->load->library('form_validation'); 
	
	}
        public function master_template($main_content,$query = null){
        $this->load->view('includes/header');
        $this->load->view($main_content,$query);
        $this->load->view('includes/footer');


}


public function index()
{
    
    if(isset($_REQUEST['login']))
	{	
       
        $email=$_REQUEST['email'];
        $password=$_REQUEST['password'];
		

	 	$this->user->user_check($email,$password);
		$this->load->view('login');

	}
	else
	{
	    $this->load->view('login');
	}
}

}
?>