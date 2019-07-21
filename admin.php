<link href="admin.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

        
        

        <div id="wrapper" class="toggled">
            <!-- Sidebar -->
            <div id="sidebar-wrapper">
                <ul class="sidebar-nav">
                   
                    <a href="inventory.php"><button type="button"  class="btn btn-default btn-lg btn-primary" style="padding: 60px 38px;font-size: 20px;border-radius: 10px;margin: 60px 10px 0px 0px;">Inspect Inventory</button></a> <hr style="background:white">
                    <a href="manage_order.php" ><button type="button" class="btn btn-default btn-lg btn-primary" style="padding: 60px 50px;font-size: 20px;border-radius: 10px;margin: 0px 10px 0px 0px;">Manage Order</button></a> <hr style="background:white">
                    <a href="view_donation.php"><button type="button" class="btn btn-default btn-lg btn-primary" style="padding: 60px 45px;font-size: 20px;border-radius: 10px;margin: 0px 10px 0px 0px;">View Donations</button></a> <br><br>
                    <!-- <button type="button" class="btn btn-default btn-lg" style="padding: 60px 45px;font-size: 20px;border-radius: 10px;margin: 0px 10px 0px 0px;">Analytics</button> <br><br> -->
                    
                </ul>
            </div><!-- /#sidebar-wrapper -->
            <!-- Page Content -->
            <div id="page-content-wrapper">
                <div class="container-fluid">
                    <h1>Administration</h1>
                    <!-- <p>This template has a responsive menu toggling system. The menu will appear collapsed on smaller screens, and will appear non-collapsed on larger screens. When toggled using the button below, the menu will appear/disappear. On small screens, the page content will be pushed off canvas.</p>
                    <p>Make sure to keep all page content within the <code>#page-content-wrapper</code>.</p> -->
                </div>
            </div> <!-- /#page-content-wrapper -->
            <canvas id="bar-chart" width="800" height="250"></canvas>
            <br><hr><br>
            <canvas id="line-chart" width="800" height="250"></canvas>
            <br><hr><br>
            <canvas id="pie-chart" width="800" height="250"></canvas>
        </div> <!-- /#wrapper -->
        <!-- Bootstrap core JavaScript -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script> <!-- Menu Toggle Script -->
        <script>
          $(function(){
            $("#menu-toggle").click(function(e) {
                e.preventDefault();
                $("#wrapper").toggleClass("toggled");
            });

            $(window).resize(function(e) {
              if($(window).width()<=768){
                $("#wrapper").removeClass("toggled");
              }else{
                $("#wrapper").addClass("toggled");
              }
            });
          });
           
        </script>
        <script>
          // bar Chart here
          new Chart(document.getElementById("bar-chart"), {
            type: 'bar',
            data: {
              labels: ["Nagpur", "Mumbai", "Pune", "Latur", "Nashik"],
              datasets: [
                {
                  label: "Product Delievered",
                  backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
                  data: [2478,5267,734,784,433]
                }
              ]
            },
            options: {
              legend: { display: false },
              title: {
                display: true,
                text: 'Estimated number of products sold to specific location'
              }
            }
          });


          // Line Chart Here
          new Chart(document.getElementById("line-chart"), {
            type: 'line',
            data: {
              labels: [1500,1600,1700,1750,1800,1850,1900,1950,1999,2050],
              datasets: [{ 
                  data: [86,114,106,106,107,111,133,221,783,2478],
                  label: "Jalgaon",
                  borderColor: "#3e95cd",
                  fill: false
                }, { 
                  data: [282,350,411,502,635,809,947,1402,3700,5267],
                  label: "Pune",
                  borderColor: "#8e5ea2",
                  fill: false
                }, { 
                  data: [168,170,178,190,203,276,408,547,675,734],
                  label: "Latur",
                  borderColor: "#3cba9f",
                  fill: false
                }, { 
                  data: [40,20,10,16,24,38,74,167,508,784],
                  label: "Ahmednagar",
                  borderColor: "#e8c3b9",
                  fill: false
                }, { 
                  data: [6,3,2,2,7,26,82,172,312,433],
                  label: "Solapur",
                  borderColor: "#c45850",
                  fill: false
                }
              ]
            },
            options: {
              title: {
                display: true,
                text: 'Average employment in a year.'
              }
            }
          });

          //pie-chart
          new Chart(document.getElementById("pie-chart"), {
              type: 'pie',
              data: {
                labels: ["Hand Bags", "Jewellery", "Paper Weight", "Keychains", "Greeting Cards"],
                datasets: [{
                  label: "Population (millions)",
                  backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
                  data: [2478,5267,734,784,433]
                }]
              },
              options: {
                title: {
                  display: true,
                  text: 'Predicted world population (millions) in 2050'
                }
              }
          });
        </script>
   
  </html>