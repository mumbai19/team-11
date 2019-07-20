<?php
/*
country - > Country code of the mobile phone you wish to send the message
sender -> sender id (from where the message is received) example AX-MSGIND here MSGIND is the sender id/sender and should be of 6 char only
mobiles-> mobile number for which the message is being sent
authkey -> the auth key for api
message-> the message contents you wish to send

*/
class Message{
public function sendMessage($mobile_no, $message){
        $url = "http://api.msg91.com/api/sendhttp.php?country=91&sender=DSTRNG&route=4&mobiles=".$mobile_no."&authkey=285617A6lxfjuu5d2f3878&message=".$message;
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);

        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_POSTFIELDS => "{}",
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
    }
}

$msg = new Message();

$msg->sendMessage("XXXXXXXXXX","MSG HERE");
?>