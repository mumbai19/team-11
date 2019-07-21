<html>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
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
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Add Category</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
        <div class="md-form mb-5">
          <i class="fas fa-envelope prefix grey-text"></i>
          <input type="id" id="defaultForm-id" class="form-control validate">
          <label data-error="wrong" data-success="right" for="defaultForm-id">Category_ID</label>
        </div>

        <div class="md-form mb-4">
          <i class="fas fa-lock prefix grey-text"></i>
          <input type="name" id="defaultForm-name" class="form-control validate">
          <label data-error="wrong" data-success="right" for="defaultForm-name">Category_Name</label>
        </div>
		
		 <div class="md-form mb-4">
          <i class="fas fa-lock prefix grey-text"></i>
          <input type="time" id="defaultForm-time" class="form-control validate">
          <label data-error="wrong" data-success="right" for="defaultForm-time">Created At</label>
        </div>
		
		<div class="md-form mb-4">
          <i class="fas fa-lock prefix grey-text"></i>
          <input type="no_prod" id="defaultForm-no_prod" class="form-control validate">
          <label data-error="wrong" data-success="right" for="defaultForm-no_prod">Number Of Products</label>
        </div>

      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-default">ADD CATEGORY</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Delete Category</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
        <div class="md-form mb-5">
          <i class="fas fa-envelope prefix grey-text"></i>
          <input type="id" id="defaultForm-id" class="form-control validate">
          <label data-error="wrong" data-success="right" for="defaultForm-id">Category_ID</label>
        </div>

        <div class="md-form mb-4">
          <i class="fas fa-lock prefix grey-text"></i>
          <input type="name" id="defaultForm-name" class="form-control validate">
          <label data-error="wrong" data-success="right" for="defaultForm-name">Category_Name</label>
        </div>
	
		
		<div class="md-form mb-4">
          <i class="fas fa-lock prefix grey-text"></i>
          <input type="no_prod" id="defaultForm-no_prod" class="form-control validate">
          <label data-error="wrong" data-success="right" for="defaultForm-no_prod">Number Of Products</label>
        </div>

      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-default">DELETE CATEGORY</button>
      </div>
    </div>
  </div>
</div>

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

$sql = "SELECT * FROM manage_cate";
$result = $conn->query($sql);
echo "<div class=\"container\"><table id=\"myTable\">";
echo "<tr>";
    echo "<th>".'Category_ID'."</th>";
	echo "<th>".'Category_Name'."</th>";
    echo "<th>". 'Number of Productions'. "</th>";
	echo "<th>".'Add Category'."</th>";
	echo "<th>".'Delete '."</th>";
 echo "</tr>";
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

			echo "<tr>";
			echo "<td><h2>" . $row['category_id'] . "</h2></td>";
			echo "<td><h2>" . $row['category_name'] . "</h2></td>";
			echo "<td><h2>" . $row['no_prod'] . "</h2></td>";
		    echo "<td>"."<button type='button' class='btn btn-info btn-lg' data-toggle='modal' data-target='#editModal'>"."Edit"."</button>"."</td>";
			echo "<td>"."<button type='button' class='btn btn-info btn-lg' data-toggle='modal' data-target='#deleteModal'>"."Delete"."</button>"."</td>";

			echo "</tr>";
        #echo "<h2>" . $row["product_id"]. " - Name: " . $row["product_name"];
    }
} else {
    echo "0 results";
}
echo "</table></div>";
$conn->close();
?>
</html>
