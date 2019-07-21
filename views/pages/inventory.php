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
<link href="admin.css" rel="stylesheet" id="bootstrap-css">

</style>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">




<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>

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

include("../../classes/Database.class.php");
include("../../classes/Products.class.php");
//include_once("views/layouts/footer.php");
//include_once("views/layouts/header.php");
//include_once("views/layouts/navbar.php");

// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "Jpmc";

// Create connection
$db=new Database();

$conn =$db->getConnection();

// Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

$product=new Products();
$result = $product->getAllProducts();
//print_r($result);
echo "<div class=\"container\"><table id=\"myTable\">";
echo "<tr>";
    echo "<th>". 'Product Name'. "</th>";
    echo "<th>". 'Quantity'. "</th>";
 echo "</tr>";
if (count($result) > 0) {
    // output data of each row
    for($i=0;$i<count($result);$i++) {

			echo "<tr>";
			echo "<td><h2>" . $result[$i]['product_name'] . "</h2></td>";
			echo "<td><h2>" . $result[$i]['quantity'] . "</h2></td>";
			//echo "<td><button class=\"btn btn-primary btn-lg\">Add</button></td>";
			//echo "<td><button class=\"btn btn-primary btn-lg\">Remove</button></td>";
			echo "</tr>";
        #echo "<h2>" . $row["product_id"]. " - Name: " . $row["product_name"];
    }
} else {
    echo "0 results";
}
echo "</table></div>";
//$conn->close();
?>
<!-- Sidebar -->

</html>
