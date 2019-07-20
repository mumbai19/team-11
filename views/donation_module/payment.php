<?php
$conn = mysqli_connect("localhost","root","","trishul")
?>
<form action='pay.php' method="POST">
<input name="name" type = "text" placeholder="Name">
<input name="phno" type = "text" placeholder="Mobile Number">
<input type = "email" name="email" placeholder="Enter email here">
<input name = "amount" type = "number" placeholder="Amount Rs. ">
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
<button type = 'submit'>DONATE</button>
</form>
</body>
</html>
