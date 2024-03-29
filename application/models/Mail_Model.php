<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception; 
	class Mail_model extends CI_Model
	{
		public function __construct()
		{
			$this->load->database();
			include_once("mail_files/Exception.php");
			include_once("mail_files/PHPMailer.php");
			include_once("mail_files/SMTP.php");
		}

		public function send_mail($subject,$email,$body_html,$attachment=''){

            $mail = new PHPMailer();
			$mail->IsSMTP();                                      
			$mail->Host = 'smtp.gmail.com';  
			$mail->Port = 587;                                   
			$mail->SMTPAuth = true;                               
			$mail->Username = 'mahendghazipur786@gmail.com';               
			$mail->Password = 'ergwwxljcnjqpgit';                  
			$mail->SMTPSecure = "tls";                            
			$mail->From = 'mahendghazipur786@gmail.com';
			$mail->FromName = "Mahend Ghazipur Up";
            if($attachment!='')
            {
			  $mail->addAttachment($attachment[0]);
              $mail->addAttachment($attachment[1]);      
			  
            }
			$mail->AddAddress($email);
			$mail->IsHTML(true);                                 
			$mail->Subject = $subject;
			$mail->Body = $body_html;
           if($mail->Send()) {  
			
			 return 1;
			
		   }
       }

	}