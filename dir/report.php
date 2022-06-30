<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Automatic Control and Monitoring AC Temperature
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
  <link rel="icon" type="image/x-icon" href="../assets/img/logoacmac.ico">
  <link href="../assets/css/outside-layout.css" rel="stylesheet">
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' rel='stylesheet' type='text/css'>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.min.js'></script>
</head>
<?php
  include("dbcon.php");
  if(isset($_SESSION['usersession'])){
  $user;
  $username = $_SESSION['usersession'];
  if($_SESSION['userrole'] == 'Admin' || $_SESSION['userrole'] == 'Administrator'){
    $sql = "SELECT * FROM staffinfo WHERE staffid='".$username."'";
    $result = mysqli_query($virtual_con,$sql);
    $user = mysqli_fetch_assoc($result);
  }else{
    $sql = "SELECT * FROM staffinfo WHERE staffid='".$username."'";
    $result = mysqli_query($virtual_con,$sql);
    $user = mysqli_fetch_assoc($result);
  }
 ?>
<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="black" data-active-color="danger">
      <div class="logo">
        <a href="./Admindashboard.php" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="../assets/img/logoacmac.png">
          </div>
          <!-- <p>CT</p> -->
        </a>
        <a href="" class="simple-text logo-normal"style="font-size:16px;">
          AC-MAC
          <!-- <div class="logo-image-big">
            <img src="../assets/img/logo-big.png">
          </div> -->
        </a>
      </div>
      <div class="sidebar-wrapper">
          <ul class="nav">
            <li>
              <a href="./Admindashboard.php">
                <i class="nc-icon nc-bank"></i>
                <p>Dashboard</p>
              </a>
            </li>
            <li>
              <a href="./user.php">
                <i class="nc-icon nc-single-02"></i>
                <p>Profile</p>
              </a>
            </li>
            <li>
              <a href="./temphum.php">
                <i class="nc-icon nc-bulb-63"></i>
                <p>Temperature | Humidity</p>
              </a>
            </li>
            <li class="active ">
              <a href="./report.php">
                <i class="nc-icon nc-chart-bar-32"></i>
                <p>Report Stats</p>
              </a>
            </li>
            <?php if($_SESSION['userrole'] == 'Admin'  || $_SESSION['userrole'] == 'Administrator' || $_SESSION['userrole'] == 'Manager') {?>
            <li>
              <a href="./managestaff.php">
                <i class="nc-icon nc-settings"></i>
                <p>Manage Staff</p>
              </a>
            </li>
          <?php } ?>
            <!--<li class="active-pro">
              <a href="./upgrade.html">
                <i class="nc-icon nc-spaceship"></i>
                <p>Upgrade to PRO</p>
              </a>
            </li>-->
          </ul>
        </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="javascript:;">Report</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation" style="margin: 0% 0% .1% 87%;">
            <!--<form>
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <i class="nc-icon nc-alert-circle-i"></i>
                  </div>
                </div>
              </div>
            </form>-->
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link btn-magnify" href="javascript:;">
                  <!--<i class="nc-icon nc-layout-11"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Stats</span>
                  </p>
                </a>
              </li>
              <li class="nav-item btn-rotate dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="nc-icon nc-bell-55"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Some Actions</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </li>-->
              <li class="nav-item">
                <a class="nav-link btn-rotate" href="logout.php">
                  <i class="nc-icon nc-button-power" data-toggle="tooltip" data-placement="bottom" title="Logout"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Account</span>
                  </p>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->

      <div class="content">
        <div class="row">
          <div class="col-md-12">
              <div class="row">
                <div class="col-md-12">
                  <div class="card ">
                    <div class="card-header">
                      <h3 class="card-title">Statistical Overview</h3>
                      <p class="category"></p>
                    </div>
                    <div class="card-header ">
                      <h5 class="card-title" style="font-size:16px;">Graph</h5>
                      <p class="card-category"></p>
                    </div>
                    <div class="card-body ">
                      <!--<canvas id=curve_chart1 width="400" height="100"></canvas> demo.js
                      <div id="curve_chart1" style="width: 900px; height: 500px"></div>-->
                      <?php
                      include("dbconth.php");
                       ?>
                      <html>
                      <head>
                        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                        <script type="text/javascript">
                          google.charts.load('current', {'packages':['corechart']});
                          google.charts.setOnLoadCallback(drawChart);

                          function drawChart() {
                            var data = google.visualization.arrayToDataTable([
                              ['Month','Humidity','Temperature','HeatIndex'],
                              <?php
                                  $query = "SELECT * FROM dht11";
                                  $result = mysqli_query($virtual_con2, "SELECT * FROM dht11");
                                  while($row = mysqli_fetch_array($result)){
                                    $date = $row['id'];
                                    $humidity = $row['humidity'];
                                    $temperature = $row['temperature'];
                                    $heatindex = $row['heatindex'];
                                    ?>
                                    [<?php echo $date;?>,<?php echo $humidity; ?>,<?php echo $temperature; ?>,<?php echo $heatindex; ?>],
                                  <?php }
                              ?>
                            ]);

                            var options = {
                              title: '',
                              curveType: 'function',
                              legend: { position: 'bottom' }
                            };

                            var chart = new google.visualization.LineChart(document.getElementById('curve_chart1'));

                            chart.draw(data, options);
                          }
                        </script>
                      </head>
                      <body>
                        <div class="border-bottom border-success rounded" id="curve_chart1" style="width: auto; height: 700px;"></div>
                      </body>
                      </html>
                    </div>
                    <div class="legend text-center">
                      <i class="fa fa-circle text-primary"></i>
                      <i class="fa fa-circle text-danger"></i>
                      <i class="fa fa-circle text-warning"></i>
                      <i class="fa fa-circle text-success"></i>
                    </div>
                    <div class="card-footer ">
                      <hr>
                      <a href="report.php">
                      <div class="stats" style="font-size:16px;">
                        <i class="fa fa-history"></i>Refresh
                      </div></a>
                    </div>
                  </div>
                </div>
              </div>
            <div class="row">
              <div class="col-md-4">
                <div class="card ">
                  <div class="card-header ">
                    <h5 class="card-title"  style="font-size:16px;">Humidity Data</h5>
                    <p class="card-category"></p>
                  </div>
                  <div class="card-body ">
                    <?php
                    include("dbconth.php");
                     ?>
                    <html>
                    <head>
                      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                      <script type="text/javascript">
                        google.charts.load('current', {'packages':['corechart']});
                        google.charts.setOnLoadCallback(drawChart);

                        function drawChart() {
                          var data = google.visualization.arrayToDataTable([
                            ['Month','Humidity'],
                            <?php
                                $query = "SELECT * FROM dht11";
                                $result = mysqli_query($virtual_con2, "SELECT * FROM dht11");
                                while($row = mysqli_fetch_array($result)){
                                  $date = $row['id'];
                                  $humidity = $row['humidity'];
                                  ?>
                                  [<?php echo $date;?>,<?php echo $humidity; ?>],
                                <?php }
                            ?>
                          ]);

                          var options = {
                            title: '',
                            curveType: 'function',
                            legend: { position: 'bottom' }
                          };

                          var chart = new google.visualization.LineChart(document.getElementById('curve_chart2'));

                          chart.draw(data, options);
                        }
                      </script>
                    </head>
                    <body>
                      <div class="border-bottom border-primary rounded"id="curve_chart2" style="width: auto; height: auto;"></div>
                    </body>
                    </html>

                    <!--<canvas id="chartEmail"></canvas>--> <!--demo.js-->
                  </div>
                  <div class="card-footer ">
                    <div class="legend text-center">
                      <i class="fa fa-circle text-primary"></i>
                    </div>
                    <hr>
                    <a href="report.php">
                    <div class="stats" style="font-size:16px;">
                      <i class="fa fa-history"></i>Refresh
                    </div></a>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="card ">
                  <div class="card-header ">
                    <h5 class="card-title" style="font-size:16px;">Temperature Data</h5>
                    <p class="card-category"></p>
                  </div>
                  <div class="card-body ">
                    <?php
                    include("dbconth.php");
                     ?>
                    <html>
                    <head>
                      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                      <script type="text/javascript">
                        google.charts.load('current', {'packages':['corechart']});
                        google.charts.setOnLoadCallback(drawChart);

                        function drawChart() {
                          var data = google.visualization.arrayToDataTable([
                            ['Month','Temperature'],
                            <?php
                                $query = "SELECT * FROM dht11";
                                $result = mysqli_query($virtual_con2, "SELECT * FROM dht11");
                                while($row = mysqli_fetch_array($result)){
                                  $date = $row['id'];
                                  $temmperature = $row['temperature'];
                                  ?>
                                  [ <?php echo $date;?>,<?php echo $temmperature; ?>],
                                <?php }
                            ?>
                          ]);

                          var options = {
                            title: '',
                            curveType: 'function',
                            legend: { position: 'bottom' }
                          };

                          var chart = new google.visualization.LineChart(document.getElementById('curve_chart3'));

                          chart.draw(data, options);
                        }
                      </script>
                    </head>
                    <body>

                    </body>
                    </html>
                    <div class="border-bottom border-danger rounded" id="curve_chart3" style="width:auto; height: auto;"></div>
                  </div>
                  <div class="card-footer ">
                    <div class="legend text-center">
                      <i class="fa fa-circle text-danger"></i>
                    </div>
                    <hr>
                    <a href="report.php">
                    <div class="stats" style="font-size:16px;">
                      <i class="fa fa-history"></i>Refresh
                    </div></a>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="card ">
                  <div class="card-header ">
                    <h5 class="card-title" style="font-size:16px;">Heat Index Data</h5>
                    <p class="card-category"></p>
                  </div>
                  <div class="card-body ">
                    <?php
                    include("dbconth.php");
                     ?>
                    <html>
                    <head>
                      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                      <script type="text/javascript">
                        google.charts.load('current', {'packages':['corechart']});
                        google.charts.setOnLoadCallback(drawChart);

                        function drawChart() {
                          var data = google.visualization.arrayToDataTable([
                            ['Month','HeatIndex'],
                            <?php
                                $query = "SELECT * FROM dht11";
                                $result = mysqli_query($virtual_con2, "SELECT * FROM dht11");
                                while($row = mysqli_fetch_array($result)){
                                  $date = $row['id'];
                                  $heatindex = $row['heatindex'];
                                  ?>
                                  [<?php echo $date;?>,<?php echo $heatindex; ?>],
                                <?php }
                            ?>
                          ]);

                          var options = {
                            title: '',
                            curveType: 'function',
                            legend: { position: 'bottom' }
                          };

                          var chart = new google.visualization.LineChart(document.getElementById('curve_chart4'));

                          chart.draw(data, options);
                        }
                      </script>
                    </head>
                    <body>

                    </body>
                    </html>
                    <div class="border-bottom border-warning rounded" id="curve_chart4" style="width:auto; height: auto;"></div>
                  </div>
                  <div class="card-footer ">
                    <div class="legend text-center">
                      <i class="fa fa-circle text-warning"></i>
                    </div>
                    <hr>
                    <a href="report.php">
                    <div class="stats" style="font-size:16px;">
                      <i class="fa fa-history"></i>Refresh
                    </div></a>
                  </div>
                </div>
              </div>
              <!--<div class="col-md-8">
                <div class="card card-chart">
                  <div class="card-header">
                    <h5 class="card-title"> Under Construction Dummies Graph</h5>
                    <p class="card-category">Line Chart with Points</p>
                  </div>
                  <div class="card-body">
                    <canvas id="speedChart" width="400" height="100"></canvas>demo.js
                  </div>
                  <div class="card-footer">
                    <div class="chart-legend">
                      <i class="fa fa-circle text-info"></i> Tesla Model S
                      <i class="fa fa-circle text-warning"></i> BMW 5 Series
                    </div>
                    <hr />
                    <div class="card-stats">
                      <i class="fa fa-check"></i> Data information certified
                    </div>
                  </div>
                </div>
              </div>-->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php }else {
  echo " <script> window.location = 'index.php'; </script>";
} ?>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script><!-- Paper Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
      demo.initChartsPages();
    });
  </script>
</body>

</html>
