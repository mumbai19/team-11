<?php
    include 'instamojo/Instamojo.php';
    $conn = mysqli_connect("localhost","root","","trishul1");
    $api = new Instamojo\Instamojo('test_5d8df9b6000ceaf1162fcd03087', 'test_cf0ed12659833eb2901b558535d','https://test.instamojo.com/api/1.1/');
    try {
        $response = $api->paymentRequestCreate(array(
            "purpose" => $_POST['purpose'],
            "amount" => $_POST['amount'],
            "send_email" => true,
            "email" => $_POST['email'],
            "redirect_url" => "http://localhost/paymentportal/thankyou.php",
            "buyer_name" => $_POST['name'],
            "phone" => $_POST['phno']
            ));
        //print_r($response);
        $pay_url = $response['longurl'];
        $email = $_POST['email'];
        $name = $_POST['name'];
        $phno = $_POST['ph_no'];
        $query = "SELECT Donor_id from donors WHERE email='$email'";
        $exists = $conn->query($query);
        if(!mysqli_num_rows($exists)){
            $ins = "INSERT into donors(Name,Email) VALUES ('".$name."','".$email."','".$phno."')";
            $conn->query($ins);
        }
        $getid = "SELECT donor_id from donors where email ='$email'";
        $getid = $conn->query($getid);
        $id = mysqli_fetch_assoc($getid);
        $id = $id['donor_id'];
        $donation = "INSERT into donations(donor_id,Amount,Purpose) VALUES ('".$id."','".$_POST['amount']."','".$_POST['purpose']."')";
        $conn->query($donation);
        header("location:$pay_url");
    }
    catch (Exception $e) {
        print('Error: ' . $e->getMessage());
    }
?>