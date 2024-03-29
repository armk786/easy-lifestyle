<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Leads extends CI_Controller {
	   public function __construct()
       {

			parent::__construct();
			$this->load->model('leads_model');

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
		
		$data['notidata'] = 'Leads';
		$data['leads'] = $leads;
		$this->load->view('include/header', $data);
		$this->load->view('leads', $data);
		$this->load->view('include/footer', $data);
		
		
		
		
	}
	
	public function source()
	{
		$data = array();
		$data['notidata'] = 'Source';
		$sources = $this->leads_model->source();
		$data['sources'] = $sources;
		$this->load->view('include/header', $data);
		$this->load->view('sources', $data);
		$this->load->view('include/footer', $data);
	}
	
	public function status()
	{
		$data = array();
		$data['notidata'] = 'Source';
		$status = $this->leads_model->status();
		$data['status'] = $status;
		$this->load->view('include/header', $data);
		$this->load->view('status', $data);
		$this->load->view('include/footer', $data);
	}
	
	public function add_status()
	{
		$data = array();
		if(!$_POST)
		{	
			$data['notidata'] = 'add Source';
			$this->load->view('include/header', $data);
			$this->load->view('add_status', $data);
			$this->load->view('include/footer', $data);
		}else{
			
		  $post_data  = array('name' => $this->input->post('name'));
		  $this->leads_model->add_status($post_data);
		  $this->session->set_flashdata('successmsg', 'Add successfully.');
		  redirect('leads/status','refresh');
			
		}	
	}
	
	public function edit_status($id)
	{
		$data = array();
		if(!$_POST)
		{	
			$data['notidata'] = 'Edit Status';
			$status = $this->leads_model->status_by_id($id);
			$data['status'] = $status;
			$this->load->view('include/header', $data);
			$this->load->view('edit_status', $data);
			$this->load->view('include/footer', $data);
		}else{
			
		  $post_data  = array('name' => $this->input->post('name'));
		  $this->leads_model->update_status($post_data,$id);
		  $this->session->set_flashdata('successmsg', 'Update successfully.');
		  redirect('leads/status','refresh');
			
		}	
	}
	
	public function delete_status($id)
	{
	  $this->leads_model->delete_status($id);
	  $this->session->set_flashdata('successmsg', 'Delete successfully.');
	  redirect('leads/status','refresh');	
		
	}
	
	
	
	
	
	public function add_source()
	{
		$data = array();
		if(!$_POST)
		{	
			$data['notidata'] = 'add Source';
			$this->load->view('include/header', $data);
			$this->load->view('add_source', $data);
			$this->load->view('include/footer', $data);
		}else{
			
		  $post_data  = array('name' => $this->input->post('name'));
		  $this->leads_model->add_source($post_data);
		  $this->session->set_flashdata('successmsg', 'Add successfully.');
		  redirect('leads/source','refresh');
			
		}	
	}
	
	public function source_edit($id)
	{
		$data = array();
		if(!$_POST)
		{	
			$data['notidata'] = 'add Source';
			$source = $this->leads_model->source_by_id($id);
			$data['source'] = $source;
			$this->load->view('include/header', $data);
			$this->load->view('edit_source', $data);
			$this->load->view('include/footer', $data);
		}else{
			
		  $post_data  = array('name' => $this->input->post('name'));
		  $this->leads_model->update_source($post_data,$id);
		  $this->session->set_flashdata('successmsg', 'Update successfully.');
		  redirect('leads/source','refresh');
			
		}	
	}
	
	public function source_delete($id)
	{
	  $this->leads_model->delete_source($id);
	  $this->session->set_flashdata('successmsg', 'Delete successfully.');
	  redirect('leads/source','refresh');	
		
	}
	
	public function add()
	{
		$data = array();
		if(!$_POST)
		{	
			
			
			$manegers = get_user_list_by_role();
			$data['notidata'] = 'Add Leads';
			$status = $this->leads_model->status();
			$data['status'] = $status;
			$sources = $this->leads_model->source();
			$data['sources'] = $sources;
			$data['manager'] = $manegers;
			$this->load->view('include/header', $data);
			$this->load->view('add_leads', $data);
			$this->load->view('include/footer', $data);
		}else{
			
			 $post_data  = array('source' => $this->input->post('source'), 
				     		'status' => $this->input->post('status'),
							'user_id' => $this->input->post('user'),
							'campaign_name' => $this->input->post('campaign_name'),
							'educational_qualification' => $this->input->post('educational_qualification'),
							'name' => $this->input->post('name'),
							'email' => $this->input->post('email'),
							'mobile' => $this->input->post('mobile'),
							'job_title' => $this->input->post('job_title'),
							'city' => $this->input->post('city'),
							'remark' => $this->input->post('remark'),
							'created_by' => $this->session->userdata('staffid'),
							'created_date' => date('Y-m-d H:i:s')
						  );
						  
				  $this->leads_model->insert_lead($post_data);
                  $this->session->set_flashdata('successmsg', 'Insert lead successfully.');
			      redirect('leads','refresh');
		}
	}

 }

/* End  */
