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

  <link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' rel='stylesheet' type='text/css'>
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
          <li class="active ">
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
          <li>
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
            <a class="navbar-brand" href="javascript:;">Profile</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation" style="margin: 0% 0% .1% 88%;">

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
        <?php
        include("dbconth.php");
        $avg = "SELECT ROUND(AVG(temperature),2) AS avg FROM `dht11` ";
        $avgresult= mysqli_query($virtual_con2, $avg);
        while ($row2 = mysqli_fetch_assoc($avgresult)){
          $output1 = $row2['avg'];
        }
        ?>
        <div class="row">
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-world-2 text-warning"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Avg Temperature</p>
                      <p class="card-title"> <?php echo $output1; ?><p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer " style="text-align:center">
                <hr><a href="user.php">
                <div class="stats">
                  <i class="fa fa-refresh"></i>
                  Update Now
                </div></a>
              </div>
            </div>
          </div>
          <?php
          include("dbconth.php");
          $avg2 = "SELECT ROUND(AVG(humidity),2) AS avg1 FROM `dht11` ";
          $avgresult2= mysqli_query($virtual_con2, $avg2);
          while ($row3 = mysqli_fetch_assoc($avgresult2)){
            $output2 = $row3['avg1'];
          }
          ?>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-umbrella-13 text-success"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Avg Humidity</p>
                      <p class="card-title"><?php echo $output2; ?><p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer " style="text-align:center">
                <hr><a href="user.php">
                <div class="stats">
                  <i class="fa fa-calendar-o"></i>
                  Update Now
                </div></a>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-time-alarm text-danger"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Clock</p>
                      <p class="card-title">
                        <p id="demo"></p>
                        <script>
                        function addZero(i) {
                          if (i < 10) {i = "0" + i}
                          return i;
                        }

                        const d = new Date();
                        let h = addZero(d.getHours());
                        let m = addZero(d.getMinutes());
                        let time = h + ":" + m;
                        document.getElementById("demo").innerHTML = time;
                        </script>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer " style="text-align:center">
                <hr><a href="user.php">
                <div class="stats">
                  <i class="fa fa-clock-o"></i>
                  Refresh
                </div><a>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-calendar-60 text-primary"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Date</p>
                      <p class="card-title">
                        <p id = "date"></p>
                        <script>
                        var today = new Date();
                        var date = today.getDate()+'-'+(today.getMonth()+1)+'-'+today.getUTCFullYear();
                        document.getElementById("date").innerHTML = date;
                        </script>
                      <p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer " style="text-align:center">
                <hr>
                <a href="user.php">
                <div class="stats">
                  <i class="fa fa-refresh"></i>
                  Refresh
                </div></a>
              </div>
            </div>
          </div>
        </div> <br><br>
        <div class="row">
          <div class="col-lg-4 col-md-6 col-6 ml-auto mr-auto" style="height: 50px">
            <div class="card card-user">
              <div class="image">
                <img src="../assets/img/bguser1.jpg" alt="...">
              </div>
              <div class="card-body" >
                <div class="author">
                  <a href="#">
                    <img class="avatar border-gray" src="../assets/img/user2.png" alt="..." style="width:95px; height:95px">
                    <h3 class="title"> <?php echo $user['name']; ?></h3>
                  </a>
                  <strong>

                  <p class="description" style="color:black">
                    <?php echo $user['email']; ?>
                  </p>
                </div>
                <p class="description text-center" style="color:black">
                <b>Description :  </b><?php echo $user['role']; ?> <br><br>
                <b>Staff ID    : </b> <?php echo $user['staffid']; ?> <br><br>
                <b>Phone No    :  </b><?php echo $user['phoneno']; ?> <br><br>
                <b>Home Address     : </b><?php echo $user['address']; ?> <br><br>
                <b>Date Created:  </b><?php $date1 = $user['date'];
                $date = date('d-m-Y', strtotime($date1)); echo $date; ?> <br>
                </p>
              </div>
              <div class="card-footer">
                <hr>
                <div class="text-center">
                  <div class="row">
                    <div class="col-lg-4 col-md-6 col-6 ml-auto mr-auto">
                      <a href="updatestaff.php?staffid=<?php echo $user['staffid'] ?>">
                      <button type="button" class="btn btn-primary btn-round">
                      <i class="nc-icon nc-settings-gear-65"></i>
                      <h7>Update</h7>
                      </button></a>
                    </div>
                  </div>
                </div>
              </div>
            </div><br><br><br>
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
</body>

</html>
