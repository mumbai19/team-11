<?php

require("instamojo/conn.php");

  // Getting the values from the signup page using $_POST[] and cleaning the data submitted by the user.
  $name = $_POST['name'];
  $name = mysqli_real_escape_string($conn, $name);

  $email = $_POST['email'];
  $email = mysqli_real_escape_string($conn, $email);

  $password = $_POST['password'];
  $password = mysqli_real_escape_string($conn, $password);
  $password = MD5($password);


  $query = "SELECT * FROM donors WHERE email='$email'";
  $result = mysqli_query($conn, $query)or die($mysqli_error($conn));
  $num = mysqli_num_rows($result);
  
  if ($num != 0) {
    $m = "<span class='red'>Email Already Exists</span>";
    header('location: registration.php?m1=' . $m);
  } else {
    $query = "INSERT INTO donors(name, email, password)VALUES('" . $name . "','" . $email . "','" . $password . "')";
    mysqli_query($conn, $query) or die(mysqli_error($conn));
    $user_id = mysqli_insert_id($conn);
    $_SESSION['email'] = $email;
    $_SESSION['donor_id'] = $user_id;
    header('location: payments.php');
  }
?>