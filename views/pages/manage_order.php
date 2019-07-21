<html>
<head>
	<style>
* {
  box-sizing: border-box;
}

#myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}

#myTable {
  border-collapse: collapse;
  width: 100%;
  border: 1px solid #ddd;
  font-size: 18px;
}

#myTable th, #myTable td {
  text-align: left;
  padding: 12px;
}

#myTable tr {
  border-bottom: 1px solid #ddd;
}

#myTable tr.header, #myTable tr:hover {
  background-color: #f1f1f1;
}
</style>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>

<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>


</head>
<div class="container" style="margin-top:20px">
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
</div>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "trishul";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT * FROM orders";
$result = $conn->query($sql);
echo "<div class=\"container\"><table id=\"myTable\" >";
echo "<tr>";
    echo "<th>".'Order_ID'."</th>";
	echo "<th>".'Cart_ID'."</th>";
    echo "<th>". 'Ordered_Placed_Date'. "</th>";
	echo "<th>".'Is_Bulk'. "</th>";
	echo "<th>".'Created_At'."</th>";
	echo "<th>".'Updated_At'."</th>";
	echo "<th>". 'Order_Status'. "</th>";

 echo "</tr>";
if ($result->num_rows > 0) {
    // output data of each row
		$i=1;
    while($row = $result->fetch_assoc()) {
			$x="Approve".$i;
			$order_id=$row['order_id'];
			echo "<form name=\"order_form\" method=\"post\" action=\"approve_order.php?id=$order_id\">";
			echo "<tr>";
			echo "<td name=\"$order_id\">" . $order_id . "</td>";
			//echo "<h2>" .$i . "</h2>";
			echo "<td>" . $row['cart_id'] . "</td>";
			echo "<td>" . $row['order_placed_date'] . "</td>";
			echo "<td>" . $row['is_bulk'] . "</td>";
			$cdt = new DateTime($row['created_at']);
            $cdate = $cdt->format('m/d/Y');
			echo "<td>" . $cdate . "</td>";
			$udt = new DateTime($row['updated_at']);
            $udate = $udt->format('m/d/Y');
			echo "<td>" . $udate ."</td>";
			if($row['order_status']=="Pending")
			{
				echo "<td>"."<button type='submit' name='approve' class='btn btn-primary' >". Approve ."</button>"."</td>";
				$i=$i+1;
			}
			//echo "<td>" . $row['order_status'] ."</td>";
			else {
				echo "<td>" . "Approved" . "</td>";
			}
		    echo "</tr>";
				echo "</form>";



        #echo "<h2>" . $row["product_id"]. " - Name: " . $row["product_name"];
    }
} else {
    echo "0 results";
}
echo "</table></div>";


$conn->close();
?>
</html>
