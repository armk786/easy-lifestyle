<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('leads_model');
        $this->load->model('Mail_Model', 'mail_model');

    }


    public function index()
    {
        $data = array();
        $this->load->view('header', $data);
         $this->load->view('home', $data);
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
             $this->load->view('home', $data);
        }
        else
        {
            $frm_data = array(
                'name'            => $this->input->post('name'),
                'email'           => $this->input->post('email'),
                'mobile'          => $this->input->post('mobile'),
                'page'            => 'Himachal',
                'created_date'    => date('Y-m-d')
            );

            //echo "<pre>";print_r($frm_data);exit();
            $this->db->insert('tbl_leads', $frm_data);
                    $form_data['name'] = $this->input->post('name');                   
                    $form_data['email'] = $this->input->post('email');
                    $form_data['mobile'] = $this->input->post('mobile');
                    $form_data['created_date'] = date('Y-m-d');
                 //signup email
                  $email = 'mohibul.khan@kairosmarcom.com'; 
                  $body_html =  $this->load->view('email_temp_user_inquiry',$form_data,true);
                  $subject ="Inquiry";
                  $this->mail_model->send_mail($subject,$email,$body_html); 
           $this->session->set_flashdata('success', 'Thanks For Contact! Will contact you shorty');
               redirect('home','refresh');



        }


    }


    public function best_rate_ireland()
    {
        $data = array();
        $this->load->view('best-rate-ireland', $data);

    }

    public function privacy_policy()
    {
        $data = array();
        $this->load->view('privacy-policy', $data);

    }

    public function process()
    {
        $data = array();

        $data = array();
        $subject =  $this->input->post('sub');
        $fullname           =  $this->input->post('fullname');
        $com_email          =  $this->input->post('com_email');
        $country            =  $this->input->post('country');
        $com_phone          =  $this->input->post('com_phone');
        $com_investment     =  $this->input->post('com_investment');
        $com_investing      =  $this->input->post('com_investing');
        $com_return         =  $this->input->post('com_return');

        $post_data  = array('source' => 'Landing page', 
            'name' => $fullname,
            'email' => $com_email,
            'mobile' => $com_phone,
            'country_code' => $country,
            'com_investment' => $com_investment,
            'com_investing' => $com_investing,
            'com_return' => $com_return,
            'created_date' => date('Y-m-d H:i:s')
        );

        $this->leads_model->insert_lead($post_data);

        $mail_body = '';
        $mail_body  .='<table cellpadding="1" cellspacing="1" width="600" style="border: 1px solid #666;
        color: #2d2d2d;
        font-family: Georgia,Times New Roman,Times,serif;
        background: #eaeaea;
        padding: 10px;
        text-transform: capitalize;">';

        $mail_body .='<tr>
        <tbody>
        <td colspan="3" style="padding:20px 0px; text-align:center; font-size:20px;"><strong> Best Rate Ireland Landing Page Lead</strong></td>
        </tr>';


        $mail_body .='<tr style="font-size:14px; padding:5px 0px; line-height:30px;">
        <td width="50%"><strong>Name : </strong></td>
        <td><strong>:</strong></td>
        <td>'.$fullname.'</td>
        </tr>';

        $mail_body .='<tr style="font-size:14px; padding:5px 0px; line-height:30px;">
        <td width="50%"><strong>Email</strong></td>
        <td><strong>:</strong></td>
        <td>'.$com_email.'</td>
        </tr>';

        $mail_body .='<tr style="font-size:14px; padding:5px 0px; line-height:30px;">
        <td width="50%"><strong>Contact</strong></td>
        <td><strong>:</strong></td>
        <td>'.$com_phone.'</td>
        </tr>';

        $mail_body .='<tr style="font-size:14px; padding:5px 0px; line-height:30px;">
        <td width="50%"><strong>Country code</strong></td>
        <td><strong>:</strong></td>
        <td>'.$country.'</td>
        </tr>';


        $mail_body .='<tr style="font-size:14px; padding:5px 0px; line-height:30px;">
        <td width="50%"><strong>Capital Available For Investmen</strong></td>
        <td><strong>:</strong></td>
        <td>'.$com_investment.'</td>
        </tr>';

        $mail_body .='<tr style="font-size:14px; padding:5px 0px; line-height:30px;">
        <td width="50%"><strong>Considering Investing</strong></td>
        <td><strong>:</strong></td>
        <td>'.$com_investing.'</td>
        </tr>';

        $mail_body .='<tr style="font-size:14px; padding:5px 0px; line-height:30px;">
        <td width="50%"><strong>Return On Investment</strong></td>
        <td><strong>:</strong></td>
        <td>'.$com_return.'</td>
        </tr>';
        $mail_body .='</tbody></tr></table>';



        $toemail = 'kabir@kairosmarcom.com';
//$toemail = 'khetab.alam@kairosmarcom.com';

        $config = Array(
            'protocol' => 'ssmtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'mail@bestrateireland.com',
            'smtp_pass' => 'nctfpbiyglrvjykx',
            'mailtype'  => 'html', 
            'charset'   => 'iso-8859-1'
        );
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->set_mailtype("html");
        $this->email->from('mail@bestrateireland.com', 'Best Investments Plan');
        $this->email->to($toemail);
        $this->email->cc('kewal.sharma@kairosmarcom.com,aakash.kairosmarcom@gmail.com,digital@kairosmarcom.com');
        $this->email->subject($subject);
        $this->email->message($mail_body); 

        if ($this->email->send()) {
//$this->session->set_flashdata('successmsg', 'Thank you! Your enquery successfully send.');
            redirect('thank-you','refresh');
        } else {
            print_r($this->email->print_debugger());
        }			  


    }

    public function thank_you()
    {
        $data = array();
        $this->load->view('thank-you', $data);

    }


}
?>