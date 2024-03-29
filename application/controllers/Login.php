<?php  

	class Login extends CI_Controller
	{

		public function __construct() 
		{
			parent::__construct();
			$this->load->library('session');
			$this->load->model('Staff_mdl');
		}

		public function index()
		{
			if(!$_POST)
			{
			  $this->load->view('login');
			}else{

			$staffdata = $this->Staff_mdl->checklogin();
			
			if ($staffdata) 
			{
				$userdata = array(
					'staffid' => $staffdata['staffid'],
					'staffname' => $staffdata['staffname'],
					'email' => $staffdata['email'],
					'profilepicture' => $staffdata['profilepicture'], 
					'role' => $staffdata['role']
				);
				$this->session->set_userdata($userdata);
				if ($staffdata['password']==sha1('staff@localsone')) {
					redirect(base_url() . 'user/changepassword/'. $staffdata['staffid']);
				}
				else {
					redirect(base_url() . 'dashboard');
				}
			}
		
			else 
			{
				echo "<script>alert('Invalid User! Please check your email and password.');</script>";
				$this->load->view('login');
			}

			}
		}

		public function login() 
		{
			
			$staffdata = $this->Staff_mdl->checklogin();
			

			if ($staffdata) 
			{
				$userdata = array(
					'staffid' => $staffdata['staffid'],
					'staffname' => $staffdata['staffname'],
					'email' => $staffdata['email'],
					'profilepicture' => $staffdata['profilepicture'], 
					'role' => $staffdata['role']
				);
				$this->session->set_userdata($userdata);
				if ($staffdata['password']==sha1('staff@localsone')) {
					redirect(base_url() . 'user/changepassword/'. $staffdata['staffid']);
				}
				else {
					redirect(base_url() . 'dashboard');
				}
			}
			
			else 
			{
				echo "<script>alert('Invalid User! Please check your email and password.');</script>";
				$this->load->view('login');
			}
		}

		public function logout() 
		{
			$this->load->library('session');
			$this->session->sess_destroy();
			redirect(base_url().'Login');
		}
	}
?>