<?php  

	class Algotrading extends CI_Controller
	{
		public function index()
		{
			$data['algotrading'] = 'Algotrading';
			$this->load->view('header', $data);
			$this->load->view('algotrading', $data);
			$this->load->view('footer', $data);
		}

	

	}

?>