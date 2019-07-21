<?php
include('../layouts/header.php');
include('../layouts/navbar.php');
include('instamojo/conn.php')?>
<br>
<div class="container">
  <h2>Taking a step towards good deed</h2>
  <hr>
  <form action="signupscript.php" method="POST">
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" id="name" name="name" placeholder="Name">
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <div class="form-group">
      <label for="password">Password:</label>
      <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
    </div>
    <hr>
    <button type="submit" value="submit" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Register</button>
  </form><br><br>
  
</div>

<?php include('../layouts/footer.php');?>
</body>
</html>

