<?php  

	class About extends CI_Controller
	{
		public function index()
		{
			$data['about'] = 'About';
			$this->load->view('header', $data);
			$this->load->view('about', $data);
			$this->load->view('footer', $data);
		}

	}

?>