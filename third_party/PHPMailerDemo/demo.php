<?php
include_once("Mailer.php");
 $mailer = new Mailer();
 
$subject = "A quiz has beeen scheduled for You!";
$email="chotwanidhirendc@gmail.com";
        $body = "<div style='font-family:Roboto; font-size:16px; max-width: 600px; line-height: 21px;'>   
            <h3>Hey, XXX a Test has been scheduled</h3>
            <br>  
            <p style='text-decoration:none; color:#fff; background-color:#08476e;border:solid #08476e; border-width:2px 10px; line-height:2;font-weight:bold; text-align:center; display:inline-block;border-radius:4px'>
			XYZ has been scheduled for you by Professor 123 on 5th nov,2018
			</p>
            <br>  
            <h3>Thank you for Choosing XXX.</h3>
            <br>
            <br>
            <h4>Sincerely,</h4>
            <h5>The XXX Team.</h5>
			 <img src='cid:logo_2u'>
			 <h3>hi</h3>
            </div>";

	//$mailer->AddEmbeddedImage('img/2u_cs_mini.jpg', 'logo_2u');
       return( $mailer->send_mail($email, $body, $subject));
?>
