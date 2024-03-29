<?php  

	class Dashboard extends CI_Controller
	{
		public function __construct()

       {

			parent::__construct();
			$this->load->model('leads_model');
			$this->load->model('user_model');

       }
		public function index()
		{
    		$data = array();
    		$login_user_id = $this->session->userdata('staffid');
    		$user_role = $this->session->userdata('role');
    		if($user_role=='Admin')
    		{
    		  $leads = $this->leads_model->leads();	
    		}else{
    		  $leads = $this->leads_model->leads($login_user_id);
    		}
    		
    		$user_list = $this->user_model->userlist();
    		$data['user_list'] = $user_list;
    		$data['notidata'] = 'Dashboard';
			$data['leads'] = $leads;
			//echo "<pre>";print_r($data);exit();
			$this->load->view('include/header', $data);
			$this->load->view('dashboard', $data);
			$this->load->view('include/footer', $data);
		}
			public function get_leads()
		{
		    
            // POST data
            $postData = $this->input->post();
             // Get data
            $data = $this->leads_model->get_leads($postData);
            
            echo json_encode($data);
		    
		    
		}
	}
?>