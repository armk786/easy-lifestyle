<?php  

	class Hosting extends CI_Controller
	{
		public function index()
		{
			$data['hosting'] = 'Hosting';
			$this->load->view('header', $data);
			$this->load->view('hosting', $data);
			$this->load->view('footer', $data);
		}

	}

?>