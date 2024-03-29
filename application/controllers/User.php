<?php  

	class User extends CI_Controller
	{
       public function __construct()
       {

			parent::__construct();
			$this->load->model('user_model');

       }
		public function index()
		{
			
			
			$data = array();
			$user_list = $this->user_model->userlist();
			$data['notidata'] = 'Users';
			$data['user_list'] = $user_list;
			$this->load->view('include/header', $data);
			$this->load->view('users', $data);
			$this->load->view('include/footer', $data);
		}
		
		
		
		public function add()
		{
			$data = array();
			if(!$_POST)
			{	
				
				$data['notidata'] = 'Users';
				$this->load->view('include/header', $data);
				$this->load->view('add_new_user', $data);
				$this->load->view('include/footer', $data);
			}else{
				   $imgpath = ''; 
			       if($_FILES['profile']['name']!=''){
                
					/* Getting file name */
					$filename = $_FILES['profile']['name'];
					$newimagename = 'user'.time().$filename;
					/* Location */
					$location = "assets/backend/img/profile/".$newimagename;
					$imageFileType = pathinfo($location,PATHINFO_EXTENSION);
					$imageFileType = strtolower($imageFileType);

				/* Valid extensions */
				  $valid_extensions = array("jpg","jpeg","png");

				  
				/* Check file extension */
					if(in_array(strtolower($imageFileType), $valid_extensions)) {
						/* Upload file */
						if(move_uploaded_file($_FILES['profile']['tmp_name'],$location)){
							$imgpath = $location;
						}
					}
				  }
				   
				   $post_data  = array('staffname' => $this->input->post('staffname'), 
				     		'email' => $this->input->post('email'),
							'phone' => $this->input->post('phone'),
							'role' => $this->input->post('role'),
							'address' => $this->input->post('address'),
							'profilepicture' => $imgpath
							

						  );
						  
				  $this->user_model->create_user($post_data);
                  $this->session->set_flashdata('successmsg', 'Create successfully.');
			      redirect('user','refresh');		  
				
				
				
			}
		}

		
		
		
		public function edit($id)
		{
			$data = array();
			if(!$_POST)
			{	
				$data['id'] = $id;
				$data['notidata'] = 'Users';
				$data['editstaff'] = $this->user_model->get_user($id);
				$this->load->view('include/header', $data);
				$this->load->view('user_update', $data);
				$this->load->view('include/footer', $data);
			}else{
				   $imgpath = $this->input->post('oldprofile');
			       if($_FILES['profile']['name']!=''){
                 //unlink old image
				 
					 if($imgpath!='')
					 {
						 
						 $oldimgfullpath = FCPATH.$imgpath;
						 unlink($oldimgfullpath);
					 }		 
				
					/* Getting file name */
					$filename = $_FILES['profile']['name'];
					$newimagename = 'user'.time().$filename;
					/* Location */
					$location = "assets/backend/img/profile/".$newimagename;
					$imageFileType = pathinfo($location,PATHINFO_EXTENSION);
					$imageFileType = strtolower($imageFileType);

				/* Valid extensions */
				  $valid_extensions = array("jpg","jpeg","png");

				   $imgpath = '';
				/* Check file extension */
					if(in_array(strtolower($imageFileType), $valid_extensions)) {
						/* Upload file */
						if(move_uploaded_file($_FILES['profile']['tmp_name'],$location)){
							$imgpath = $location;
						}
					}
				  }
				   
				   $post_data  = array('staffname' => $this->input->post('staffname'), 
				     		'email' => $this->input->post('email'),
							'phone' => $this->input->post('phone'),
							'role' => $this->input->post('role'),
							'address' => $this->input->post('address'),
							'profilepicture' => $imgpath
							

						  );
						  
				  $this->user_model->update_user($post_data,$id);
                  $this->session->set_flashdata('successmsg', 'User update successfully.');
				  $profile = $this->input->post('profile');
				  if($profile==1)
				  {	  
			       redirect('user/profile/'.$id,'refresh');
                  }else{
					redirect('user','refresh');  
				  }				   
				
				
				
			}
		}
		
		
		public function delete_user($id)
		{
			$user_detail =  get_user_details($id); 
			if($user_detail->profilepicture!='')
			{
                         $oldimgfullpath = FCPATH.$user_detail->profilepicture;
						 unlink($oldimgfullpath);
			}

             
              $this->user_model->delete_user($id);
			  $this->session->set_flashdata('successmsg', 'User delete successfully.');
			  redirect('user','refresh');			  
			
		}
		
		public function changepassword()
		{
			$this->load->view('changepassword');
		}
		
		public function updatepassword()
		{
			$confirm = $this->Staff_mdl->checkcurrentpassword();
			if ($confirm) {
				$this->Staff_mdl->updatepassword();
				
				$this->session->set_flashdata('successmsg', 'Password is Successfully Changed.');
			    redirect('dashboard','refresh');
				
			}
			else {
				$this->session->set_flashdata('errormsg', 'Sorry, your current password does not match.');
			    redirect('user/changepassword','refresh');
				
			}
		}
		
		public function profile()
		{
			$id = $this->uri->segment(3);
			$data['detailstaff'] = $this->Staff_mdl->detail($id);
			$data['todaytourlist'] = $this->Tour_mdl->todaytourlist();
			$data['notidata'] = 'adminnoti_tour';
			$this->load->view('include/header', $data);
			$this->load->view('staff_profile', $data);
			$this->load->view('include/footer', $data);
		}

       public function profile_edit()
		{
			$id = $this->uri->segment(3);
			$data['editstaff'] = $this->Staff_mdl->edit($id);
			$data['todaytourlist'] = $this->Tour_mdl->todaytourlist();
			$data['notidata'] = 'adminnoti_tour';
			$this->load->view('include/header', $data);
			$this->load->view('staff_edit', $data);
			$this->load->view('include/footer', $data);
		}
		
		

	}
?>