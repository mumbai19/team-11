<?php
require __DIR__ . '/vendor/autoload.php';

use sendotp\sendotp;

$otp = new sendotp( '264565AfyMHL3iHV5c724fbe','My otp is {{otp}}. Please do not share Me.');

if(isset($_POST['sendopt'])){
	extract($_POST);
	$number="91".$user_phone_num;
	print_r($otp->send($number,'MSGIND'));
}

if(isset($_POST['checkotp'])){
	extract($_POST);
	$number="91".$user_phone_num;

	print_r($otp->verify($number, $user_otp));
}
?>
<html>
<head>
	<title>MSG91 Sample Testing</title>
</head>
<body>
	<form action="" method="post"><label for="">Enter number<input type="text" class="form-control" name="user_phone_num"></label><input type="submit" name="sendopt"></form><br>
	
	<form action="" method="post"><label for="">Enter number<input type="text"  class="fomr-control" name="user_phone_num"></label><br><label for="">Enter otp<input type="text"  class="form-control" name="user_otp"></label><input type="submit" name="checkotp"></form>
</body>
</html>
