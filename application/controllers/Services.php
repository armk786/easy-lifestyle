<?php  

	class Services extends CI_Controller
	{
		public function index()
		{
			$data['services'] = 'Services';
			$this->load->view('header', $data);
			$this->load->view('services', $data);
			$this->load->view('footer', $data);
		}

	}

?>