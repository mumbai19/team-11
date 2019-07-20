
<?php
$conn = mysqli_connect("localhost","root","","trishul")
?>
<html lang="en">
<head>
  <title>Trishul</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <a class="navbar-brand" href="#">TRISHUL NGO.</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="#">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Contact</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Donate</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">My Donation!</a>
      </li>    
    </ul>
  </div>  
</nav>
<br>
<div class="container">
  <h2>Step towards good deed</h2>
  <hr>
  <form action="/action_page.php">
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" id="name" name="name" placeholder="Name">
    </div>
    <div class="form-group">
      <label for="phno">Phone number:</label>
      <input type="text" class="form-control" name="phno" placeholder="Mobile Number">
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <div class="form-group">
      <label for="amount">Amount:</label>
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
    <hr>
    <button type="submit" value="submit" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Donate!</button>
  </form>
  <br>
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">One Time Verification Password sent</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body" style="text-align:center;">
          Enter the Otp sent to your registered mobile number / email
          <hr>
          <input type="text" style="border: none; border-bottom: 0.7px solid grey;">
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Validate</button>
            <button type="button" class="btn" data-dismiss="modal">Resend</button>      
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
</div>


</body>
</html>

