<?php

include('classes/Database.class.php');
include('classes/Crud.class.php');
$db=new Database();
$conn=$db->getConnection();

$pid= $_POST["product_id"];
$pn= $_POST["product_name"];

$tid= $_POST['team_id'];

$selectOption = $_POST['product_category'];
echo $selectOption;
echo $_POST['instock_no'];
echo $_POST['unit_cost'];
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


        // Check connection
$query= "INSERT INTO products Values($pid,'$pn','$file_temp',0,$tid,10,10,10,10,0,123,123,0,now(),now())";
//echo $query;


$ans=Crud::sqlString($conn,$query);
//echo $ans ."<h2>hello</h2>"
header('Location: admin.php')

 ?>
