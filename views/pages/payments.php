<?php
include('../layouts/header.php');
include('../layouts/navbar.php');
include('instamojo/conn.php')?>
<div class='container'>
<form action="pay.php" method="POST">
<div class="form-group">
      <label for="amount">Amount:</label>
      <input type="number" class="form-control" name="amount" placeholder="Amount">
    </div>
    <label for="purpose">Cause:</label>
    <select name="purpose" class="form-control">
        <option value="pick">--SELECT--</option>
        <?php
        $sql = mysqli_query($conn, "SELECT * from donation_causes");
        $row = mysqli_num_rows($sql);
        while ($row = mysqli_fetch_array($sql)){
        echo "<option value='". $row['Purpose'] ."'>" .$row['Purpose'] ."</option>" ;
        }
        ?>
    </select><br><br><br><br>
    <input type="submit" class="form-control"><br>
</form>
</div>
<?php
include('../layouts/footer.php');
?>
