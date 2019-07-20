<?php
class Mailer{
    public function  __construct()
    {
        require_once("phpmailer/src/PHPMailer.php");
        require_once("phpmailer/src/PHPMailer.php");

        $this->mail =new PHPMailer\PHPMailer\PHPMailer();
        $this->mail->IsSMTP();                    // enable SMTP

        $this->mail->SMTPDebug = 0;            // debugging: 1 = errors and messages, 2 = messages only
        $this->mail->SMTPAuth = true;             // authentication enabled
        $this->mail->SMTPSecure = 'ssl';          // secure transfer enabled REQUIRED for Gmail
        $this->mail->Host = "smtp.gmail.com";
        $this->mail->Port = 465;               // or 587
        $this->mail->IsHTML(true);
    }


    public function send_mail($user_mail,$body,$subject){

		 $this->mail->Username = ""'
		$this->mail->Password = "";
        $this->mail->SetFrom"","");
        $this->mail->Subject = $subject;
        $this->mail->Body = $body;
		$this->mail->addEmbeddedImage('img/best-logos-2017-42.jpg', 'logo_2u');
        $this->mail->AddAddress("$user_mail");

        if (!$this->mail->Send()) {
            return false;
        } else {
            return true;
        }

    }//end of func
	
	
 
}//end of class
?>