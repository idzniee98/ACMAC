
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
  <link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' rel='stylesheet' type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.min.js'></script>

  <style media="screen">
  td {
      padding: 8px;
      border-bottom: 0.5px solid grey;
      }
  .tr1:hover {background-color: #F6E280;}
  .th1:hover {background-color: grey;}
  </style>
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
    <div class="sidebar"data-color="black" data-active-color="danger">
      <div class="logo">
        <a href="./Admindashboard.php" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="../assets/img/logoacmac.png">
          </div>
          <!-- <p>CT</p> -->
        </a>
        <a href="Admindashboard.php" class="simple-text logo-normal" style="font-size:16px;">
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
          <li class="active ">
            <a href="./temphum.php">
              <i class="nc-icon nc-bulb-63"></i>
              <p>Temperature | Humidity</p>
            </a>
          </li>
          <li>
            <a href="./report.php">
              <i class="nc-icon nc-chart-bar-32"></i>
              <p>Report Stats</p>
            </a>
          </li>
          <?php if($_SESSION['userrole'] == 'Admin'  || $_SESSION['userrole'] == 'Administrator' || $_SESSION['userrole'] == 'Manager') {?>
          <li>
            <a href="./Managestaff.php">
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
            <a class="navbar-brand" href="javascript:;">Temperature & Humidity</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation" style="margin: 0% 0% .1% 75%;">
            <!--<form>
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <i class="nc-icon nc-zoom-split"></i>
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
          <div class="card">
          <div class="card-body">
          <div class="table-responsive">
            <div class="col-md-12">
            <div class="card card-plain">
              <?php
                  include("dbconth.php");
                  $query='SELECT * FROM `dht11`';
                  $result = mysqli_query($virtual_con2, $query);
                  $counter2 = 1;

                if(isset($_POST['search'])){
                  $searchq = $_POST['search'];
                  $searchq = preg_replace("#[^0-9a-z-./]#i","",$searchq);
                  $sqlsearch = " SELECT * FROM dht11 WHERE date_day LIKE '%$searchq%'";
                  $output ='';
                  $result2 = mysqli_query($virtual_con2, $sqlsearch);
                  $rowCount= mysqli_num_rows($result2);
                  $row2 = $result2->fetch_assoc();
                  ?>

              <p class="card-title " style="font-size:16px;"><strong>Search By Date:
                <?php if($row2 = mysqli_fetch_assoc($result2)){?>
                  <a href="#" style="font-size:20px;">
                  <?php echo $row2['date_day']; ?></a></strong></p><?php
                }else{
                  echo '<a href="#" style="font-size:20px; color:red;">Invalid Value!</a>';
                }?>
              <?php
              } ?>
              <div class="card-header">
                <div style="padding-left:75%; font-size:10px;">
                  <table class="text-left">
                    <tr>
                      <td>Normal Temperature</td>
                      <td> : </td><td></td>
                        <td> 18<sup>o</sup>C to 27<sup>o</sup>C</td>
                    </tr>
                    <tr>
                      <td>Normal Humidity</td>
                      <td> : </td><td></td>
                      <td> 45% to 65%</td>
                    </tr>
                  </table></p>
                </div>
              </div>
            <a href="temphum.php">
              <div class="update" style="padding-left:25px">
                <button type="submit" class="btn btn-secondary btn-round">
                  Back
                </button></a>
            </div><br>
            <!--search bar start-->
              <table class="table">
                <tr>
                  <td>
                    <div class="col-md-auto">
                        <form class="form-group" action="searchTH.php" method="post">
                          <div class="input-group no-border  panel-default">
                            <input type="text" name="search" id="search" class="form-control " placeholder="Search:yyyy-mm-dd"><i class="nc-icon nc-alert-circle-i fa-lg" data-toggle="tooltip" data-placement="top"
                                title="Type By: [yy-mm-dd:2022-04-07] or [mm:04] or [yy:2022] or [yy-mm:2022-04] or [mm-dd:04-07]"></i></input>
                          </div>
                        </form>
                    </div>
                  </td>
                    <td>
                    <div class="col-md-auto">
                      <form class="form-group" action="searchTemp.php" method="post">
                        <div class="input-group no-border  panel-default">
                          <input type="text" name="search" id="search" class="form-control " placeholder="Search:Temperature"></input>
                        </div>
                      </form>
                    </div>
                  </td>
                    <td>
                    <div class="col-md-auto">
                      <form class="form-group" action="searchHum.php" method="post">
                        <div class="input-group no-border  panel-default">
                          <input type="text" name="search" id="search" class="form-control " placeholder="Search:Humidity"></input>
                        </div>
                      </form>
                    </div>
                  </td>
                    <td>
                    <div class="col-md-auto">
                      <form class="form-group" action="searchHIC.php" method="post">
                        <div class="input-group no-border  panel-default">
                          <input type="text" name="search" id="search" class="form-control " placeholder="Search:Heat Index">
                            </input>
                        </div>
                      </form>
                    </div>
                  </td>
                </tr>
              </table>
              <!--search bar end-->
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table w3-table-all" id="mytable">
                    <thead>
                      <th class="text-center  text-primary ">
                        #
                      </th>
                      <th class="text-center  text-primary ">
                        Date
                      </th>
                      <th class="text-center  text-primary">
                        Time
                      </th>
                      <th class="text-center  text-primary">
                        Temperature<sup>(∘C)</sup>
                      </th>
                      <th class="text-center  text-primary">
                        Humidity<sup>(%)</sup>
                      </th>
                      <th class="text-center  text-primary">
                        <a href="https://kestrelinstruments.com/mwdownloads/download/link/id/11" target="_blank">
                          <i class="nc-icon nc-alert-circle-i fa-lg" data-toggle="tooltip" data-placement="top"
                            title="Click the icon to learn more about Heat Index..."></i></a>
                            Heat Index<sup>(∘C)</sup>
                      </th>
                    </thead>
                    <?php
                        include("dbconth.php");
                        $query='SELECT * FROM `dht11`';
                        $result = mysqli_query($virtual_con2, $query);
                        $counter2 = 1;

                      if(isset($_POST['search'])){
                        $searchq = $_POST['search'];
                        $searchq = preg_replace("#[^0-9a-z-./]#i","",$searchq);
                        $sqlsearch = " SELECT * FROM dht11 WHERE date_day LIKE '%$searchq%'or temperature LIKE '%$searchq%' or humidity LIKE '%$searchq%' or heatindex LIKE '%$searchq%' ";
                        $output ='';
                        $result2 = mysqli_query($virtual_con2, $sqlsearch);
                        $rowCount= mysqli_num_rows($result2);

                        if($rowCount == 0){
                          $output = 'There is no result!';
                        }else{
                        while ($row2 = $result2->fetch_assoc()){
                          $date = $row2['date_day'];
                          $time = $row2['time_day'];
                          $temperature = $row2['temperature'];
                          $humidity = $row2['humidity'];
                          $heatindex = $row2['heatindex'];
                     ?>
                    <tbody class="text-center tr1">
                      <tr>
                        <td><?php echo $counter2; $counter2++?></td>
                        <td class="">
                          <?php echo $date?>
                        </td>
                        <td>
                          <?php echo $time?>
                        </td>
                        <td>
                          <?php echo $temperature?>
                        </td>
                        <td>
                          <?php echo $humidity?>
                        </td>
                        <td>
                          <?php echo $heatindex?>
                        </td>
                      </tr><?php
                        }
                      }
                    } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div></div></div></div>
  </div>
<?php }else {
  echo " <script> window.location = 'index.php'; </script>";
} ?>
  <!--   Core JS Files   -->
  <script type="text/javascript">
  	$(document).ready(function(){
  		$("#limit-records").change(function(){
  			$('form').submit();
  		})
  	})
  </script>
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</body>
</html>
