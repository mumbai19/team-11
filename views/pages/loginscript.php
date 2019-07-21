<?php

require("instamojo/conn.php");

$email = $_POST['email'];
$email = mysqli_real_escape_string($conn, $email);
$password = $_POST['password'];
$password = mysqli_real_escape_string($conn, $password);
$password = MD5($password);
// Query checks if the email and password are present in the database.
$query = "SELECT donor_id, email FROM donors WHERE email='" . $email . "' AND password='" . $password . "'";
$result = mysqli_query($conn, $query)or die($mysqli_error($conn));
$num = mysqli_num_rows($result);
// If the email and password are not present in the database, the mysqli_num_rows returns 0, it is assigned to $num.
if ($num == 0) {
  $error = "<span class='red'>Please enter correct E-mail id and Password</span>";
  header('location: login.php?error=' . $error);
} else {  
  $row = mysqli_fetch_array($result);
  $_SESSION['email'] = $row['email'];
  $_SESSION['donor_id'] = $row['donor_id'];
  header('location: payments.php');
}

