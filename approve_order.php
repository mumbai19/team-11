<?php


include('classes/Database.class.php');
include('classes/Crud.class.php');
$db=new Database();
$conn=$db->getConnection();
$order_id=$_GET['id'];
//echo $order_id;
$query= "UPDATE orders SET order_status=\"Approved\" WHERE order_id=$order_id";
echo $query;
$ans=Crud::sqlString($conn,$query);
echo $ans . "<h2>hello</h2>";


echo "<h2>" . $_GET['id'] ."</h2>";
header('Location: manage_order.php');


 ?>
