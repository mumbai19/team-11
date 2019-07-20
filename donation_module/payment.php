<<<<<<< HEAD
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Aroma Shop - Login</title>
	<link rel="icon" href="img/Fevicon.png" type="image/png">
  <link rel="stylesheet" href="vendors/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="vendors/fontawesome/css/all.min.css">
	<link rel="stylesheet" href="vendors/themify-icons/themify-icons.css">
	<link rel="stylesheet" href="vendors/linericon/style.css">
  <link rel="stylesheet" href="vendors/owl-carousel/owl.theme.default.min.css">
  <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
  <link rel="stylesheet" href="vendors/nice-select/nice-select.css">
  <link rel="stylesheet" href="vendors/nouislider/nouislider.min.css">

  <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php 
=======
<?php
>>>>>>> 700da648e8643d2e04c0cf3bfdb2129a347994e8
$conn = mysqli_connect("localhost","root","","trishul")
?>
<div class="col-lg-6">
    <div class="login_form_inner register_form_inner">
        <h3>Donate</h3>
        <form class="row login_form" action="pay.php" method="POST" >
            <div class="col-md-12 form-group">
                <input type="text" class="form-control" id="name" name="name" placeholder="Name">
            </div>
            <div class="col-md-12 form-group">
                <input type="text" class="form-control" name="phno" placeholder="Mobile Number">
            </div>
            <div class="col-md-12 form-group">
                <input type="email" class="form-control" name="email" placeholder="Email">
            </div>
            <div class="col-md-12 form-group">
                <input type="number" class="form-control" name="amount" placeholder="Amount">
            </div>
            <select name="purpose" class="form-control">
                <option value="pick">SELECT</option>
                <?php
                $sql = mysqli_query($conn, "SELECT * from donation_causes");
                $row = mysqli_num_rows($sql);
                while ($row = mysqli_fetch_array($sql)){
                echo "<option value='". $row['Purpose'] ."'>" .$row['Purpose'] ."</option>" ;
                }
                ?>
            </select>
            <div class="col-md-12 form-group">
				<button type="submit" value="submit" class="button button-register w-100">Donate!</button>
			</div>
    </div>
</div>

</form>
</body>
</html>
