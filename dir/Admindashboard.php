<?php
  $virtual_con = new mysqli('localhost', 'root','','acmac');
  if ($virtual_con -> connect_error){
    die('Connection Failed : '.$virtual_con -> connect_error);
  }else{
    $sql='SELECT * FROM `staffinfo`';
    $result = mysqli_query($virtual_con, $sql);
  }
 ?>
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
  <link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' rel='stylesheet' type='text/css'>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.min.js'></script>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<?php
  include("dbcon.php");
  if(isset($_SESSION['usersession'])){
  $user;
  $notereminder;
  $username = $_SESSION['usersession'];
  if($_SESSION['userrole'] == 'Admin' || $_SESSION['userrole'] == 'Administrator' || $_SESSION['userrole'] == 'Manager'){
    $sql = "SELECT * FROM staffinfo WHERE staffid='".$username."'";
    $result = mysqli_query($virtual_con,$sql);
    $user = mysqli_fetch_assoc($result);
  }else{
    $sql = "SELECT * FROM staffinfo WHERE staffid='".$username."'";
    $result = mysqli_query($virtual_con,$sql);
    $user = mysqli_fetch_assoc($result);
  }
 ?>

<body>
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
          <li class="active ">
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
          <li>
            <a href="./icons.php">
              <p>.</p>
            </a>
          </li>
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
            <a class="navbar-brand" href="javascript:;">Dashboard</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation" style="margin: 0% 0% .1% 83%;">
            <ul class="navbar-nav" >
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
                    <span class="d-lg-none d-md-block">Logout</span>
                  </p>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <p class="text-right" style="font-size:12px; margin-right:1%;">Welcome: <u><strong style="font-size:14px"><?php echo $user['name']; ?></u><sup>~<?php echo $user['role']; ?></sup></strong></p>
        <br>
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
                <hr><a href="Admindashboard.php">
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
                <hr><a href="Admindashboard.php">
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
                <hr><a href="Admindashboard.php">
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
                <a href="Admindashboard.php">
                <div class="stats">
                  <i class="fa fa-refresh"></i>
                  Refresh
                </div></a>
              </div>
            </div>
          </div>
        </div>
        <head>
          <script>
                $(document).ready(function () {

                    // Delete
                    $('.delete').click(function () {
                        var el = this;

                        // Delete id
                        var deleteid = $(this).data('id');

                        // Confirm box
                        bootbox.confirm("Do you really want to Delete this reminder?", function (result) {

                            if (result) {
                                // AJAX Request
                                $.ajax({
                                    url: 'deletereminder.php',
                                    type: 'POST',
                                    data: {id: deleteid},
                                    success: function (response) {

                                        // Removing row from HTML Table
                                        if (response == 1) {
                                            $(el).closest('tr').css('background', 'tomato');
                                            $(el).closest('tr').fadeOut(500, function () {
                                                $(this).remove();
                                            });

                                        } else {
                                            bootbox.alert('Record not deleted.');
                                        }
                                        url1:'Admindashboard.php';
                                    }
                                });
                            }

                        });

                    });
                });
            </script>
        </head>
        <form class="form-group" action="Admindashboard.php" method="post">
          <div class="row">
            <div class="col-md-12">
              <div class="card ">
                <div class="card-header ">
                  <h3 class="card-title">Important Reminder</h3>
                  <?php if($_SESSION['userrole'] == 'Admin'  || $_SESSION['userrole'] == 'Administrator' || $_SESSION['userrole'] == 'Manager') {?>
                  <div class="text-right">
                      <div class="col-lg-auto col-md-auto col-auto ml-auto mr-auto">
                        <a href="addreminder.php">
                        <button type="button" class="btn btn-primary btn-round">
                        <i class="nc-icon nc-simple-add" s></i>
                        <h7>Add Reminder</h7>
                        </button></a>
                      </div>
                  </div> <?php } ?>
                  <p class="card-category"></p>
                </div>
                <div class="card-body ">
                  <?php

                      $queryreminder ='SELECT * FROM `reminder`';
                      $resultreminder = mysqli_query($virtual_con, $queryreminder);
                      $counterreminder = 1;
                      $rowcountreminder =mysqli_num_rows($resultreminder);
                      while ($rowreminder = mysqli_fetch_assoc($resultreminder)){
                      $id = $rowreminder['id'];
                      $note1 = $rowreminder['note1'];
                      $note2 = $rowreminder['note2'];
                      $note3 = $rowreminder['note3'];
                      $note4 = $rowreminder['note4'];
                      $date= $rowreminder['date_day'];
                   ?>
                   <div class="">
                     <p class="text-left" style="font-size:16px;"><?php echo $counterreminder; $counterreminder++; ?></p>
                     <p class="text-center" style="font-size:20px;">
                       <?php echo $note1; ?><br>
                       <?php echo $note2; ?><br>
                       <?php echo $note3; ?><br>
                       <?php echo $note4; ?><br>
                     </p>

                     <p class="text-right" style="margin-right:4%; font-size:16px;"><?php echo $date; ?></p>
                     <div style="margin-left:85%;">
                     <?php if($_SESSION['userrole'] == 'Admin'  || $_SESSION['userrole'] == 'Administrator' || $_SESSION['userrole'] == 'Manager') {?>
                       <div class="row">
                         <div class="col-lg-auto col-md-auto col-auto ml-auto mr-auto">
                           <button type="button" class="delete btn btn-danger btn-round" id='del_<?php echo $id ?>' data-id='<?php echo $id ?>'>
                           <i class="nc-icon nc-simple-remove"></i>
                           <h7>Delete</h7>
                           </button>
                         </div>
                       </div>
                     </div><?php } ?>
                   </div>
                   <hr>
                 <?php } ?>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="row" style="margin-left:1%;">
        <!--<div class="col-md-4">
          <div class="card ">
            <div class="card-header ">
              <h4 class="card-title">Minutes Meeting</h4>
              <p class="card-category">Last Campaign Performance</p>
            </div>
            <div class="card-body ">
              <p>test</p>
            </div>
            <div class="card-footer ">
              <div class="legend">
                <i class="fa fa-circle text-primary"></i> Opened
                <i class="fa fa-circle text-warning"></i> Read
                <i class="fa fa-circle text-danger"></i> Deleted
                <i class="fa fa-circle text-gray"></i> Unopened
              </div>
              <hr>
              <div class="stats">
                <i class="fa fa-calendar"></i> Auto updated eash month Dummies
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-5">
          <div class="card card-chart">
            <div class="card-header">
              <h4 class="card-title">Colleague's Activities</h4>
              <p class="card-category"></p>
            </div>
            <div class="card-body">
              <p>Show live online staff</p>
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
    <footer class="site-footer" style=" margin: 0% 0% 0% 10%;">
      <div class="container">
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <img src="../assets/img/logoacmac.png" alt="Image" style="border-radius:50%; font-size:12px; padding-bottom:4px;" width="50" height="50">
            <p style="font-size:12px;">
              Copyright &copy;
              <script>document.write(new Date().getFullYear());</script> All rights reserved | ACMAC| UTM FYP Learning purposes
            </p>
          </div>

        </div>
      </div>
    </footer>
  </div>
<?php }else{
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</body>
</html>
