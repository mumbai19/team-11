<?php
include('../layouts/header.php');
include('../layouts/navbar.php');
include('instamojo/conn.php')?>
<div class="container">
  <h2>Taking a step towards good deed</h2>
  <hr>
    <div class="form-group">
    <form action="loginscript.php" method="POST">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <div class="form-group">
      <label for="password">Password:</label>
      <input type="password" class="form-control" id="email" placeholder="Enter password" name="password">
    </div>
    <hr>
    <button type="submit" value="submit" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Login</button>
  </form>
  
</div>
<?php
include('../layouts/footer.php');
?>
</body>
</html>
