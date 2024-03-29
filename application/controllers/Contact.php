<?php  

	class Contact extends CI_Controller
	{

		 public function __construct()
    {
        parent::__construct();
        $this->load->model('leads_model');
        $this->load->model('Mail_Model', 'mail_model');

    }

		 public function index()
		{
			$data['blog'] = 'Blog';
			$this->load->view('header', $data);
			$this->load->view('contact', $data);
			$this->load->view('footer', $data);
		}


		   public function add_Inquiry()
    {
        $data = array();
        $this->form_validation->set_rules('name','Name','trim|required|xss_clean');
        $this->form_validation->set_rules('email','Email','trim|required|xss_clean');
        $this->form_validation->set_rules('mobile','Mobile','required|min_length[10]|max_length[13]|xss_clean');

        $this->form_validation->set_message('[min_length]', 'The %s is minimum Length is 10');
        

        if($this->form_validation->run() == false)
        {
             $this->load->view('header', $data);
			$this->load->view('contact', $data);
			$this->load->view('footer', $data);
        }
        else
        {
            $frm_data = array(
                'name'            => $this->input->post('name'),
                'email'           => $this->input->post('email'),
                'mobile'          => $this->input->post('mobile'),
                'visiting'            => $this->input->post('visiting'),
                'message'            => $this->input->post('message'),
                'created_date'    => date('Y-m-d')
            );

            //echo "<pre>";print_r($frm_data);exit();
            $this->db->insert('tbl_leads', $frm_data);
                    $form_data['name'] = $this->input->post('name');                   
                    $form_data['email'] = $this->input->post('email');
                    $form_data['mobile'] = $this->input->post('mobile');
                     $form_data['visiting'] = $this->input->post('visiting');
                      $form_data['message'] = $this->input->post('message');
                    $form_data['created_date'] = date('Y-m-d');
                 //signup email
                  $email = 'mohibul.khan@kairosmarcom.com'; 
                  $body_html =  $this->load->view('email_temp_user_inquiry',$form_data,true);
                  $subject ="Inquiry";
                  $this->mail_model->send_mail($subject,$email,$body_html); 
           $this->session->set_flashdata('success', 'Thanks For Contact! Will contact you shorty');
               redirect('contact','refresh');



        }


    }


	}

?>