<?php

include('classes/Database.class.php');
include('classes/Crud.class.php');
$db=new Database();
$conn=$db->getConnection();


$quantity= $_POST['quantity'];
$customization =$_POST['customization'];
//echo $_POST['instock_no'];
//echo $_POST['unit_cost'];
// //echo $_POST['Image_Upload'];
if(isset($_POST["submit"]) && isset($_FILES['file']['tmp_name'])) {
    $file_temp = $_FILES['file']['tmp_name'];
    $info = getimagesize($file_temp);
    echo 'done';
} else {
    print "File not sent to server succesfully!";
    exit;
}

//DB details


        //Create connection and select DB


//        // Check connection
$query= "INSERT INTO customized_order(user_id,customization_details,customization_image,quantity) Values(1,'$customization','$file_temp',$quantity)";
echo $query;


$ans=Crud::sqlString($conn,$query);
echo $ans ."<h2>hello</h2>"

 ?>
