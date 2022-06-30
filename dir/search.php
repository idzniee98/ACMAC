
<!--database end-->
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
</head>

<style type="text/css">
    .main-section{
        margin-top:150px;
    }
</style>

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
        <a href="Admindashboard.php" class="simple-text logo-normal">
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
          <li>
            <a href="./report.php">
              <i class="nc-icon nc-chart-bar-32"></i>
              <p>Report Stats</p>
            </a>
          </li>
          <?php if($_SESSION['userrole'] == 'Admin'  || $_SESSION['userrole'] == 'Administrator' || $_SESSION['userrole'] == 'Manager') {?>
          <li class="active">
            <a href="./Managestaff.php">
              <i class="nc-icon nc-settings active"></i>
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
            <a class="navbar-brand" href="javascript:;" >Manage Staff</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation" style="margin: 0% 0% .1% 78%;">

            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link btn-magnify" href="javascript:;">
                  <!--<i class="nc-icon nc-layout-11"></i>-->
                  <p>
                    <span class="d-lg-none d-md-block">Stats</span>
                  </p>
                </a>
              </li>
              <li class="nav-item btn-rotate dropdown">
                <a class="nav-link dropdown-toggle" href="managestaff.php" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="nc-icon nc-bell-55"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Notifications</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link btn-rotate" href="logout.php">
                  <i class="nc-icon nc-button-power" data-toggle="tooltip" data-placement="bottom" title="Logout"></i>
                  <p>
                    <span class="d-lg-none d-md-block">logout</span>
                  </p>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <head>
        <script>
              $(document).ready(function () {

                  // Delete
                  $('.delete').click(function () {
                      var el = this;

                      // Delete id
                      var deleteid = $(this).data('id');

                      // Confirm box
                      bootbox.confirm("Do you really want to Revoke this record?", function (result) {

                          if (result) {
                              // AJAX Request
                              $.ajax({
                                  url: 'deletestaff.php',
                                  type: 'POST',
                                  data: {staffid: deleteid},
                                  success: function (response) {

                                      // Removing row from HTML Table
                                      if (response == 1) {
                                          $(el).closest('tr').css('background', 'tomato');
                                          $(el).closest('tr').fadeOut(1000, function () {
                                              $(this).remove();
                                          });
                                      } else {
                                          bootbox.alert('Record not deleted.');
                                      }

                                  }
                              });
                          }

                      });

                  });
              });
          </script>
      </head>
      <!-- End Navbar -->
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
        <div class="card-body">
        <div class="table-responsive">
          <div class="col-md-12">
            <div class="card card-plain">
              <div class="card-header">
                <a href="insertstaff.php">
                  <div class="update ml-auto mr-auto">
                    <button type="submit" class="btn btn-primary btn-round">
                      Add
                    </button></a>
                </div>
                <div style="font-weight:bold; font-size: 16px; padding: 15px 0px 15px 10px">
                  <p></p>
                </div>
                <!--search bar start-->
                <form class="form-group" action="search.php" method="post">
                  <div class="input-group no-border panel panel-default">
                    <input type="text" name="search" id="search" class="form-control " placeholder="Search by: StaffID or Name or Role or Region...">
                  </div>
                </form>
                <!--search bar end-->
              <div class="card-body">
                <div> <!--<div class="table-responsive">-->
                  <table class="table" id="myTable" >
                    <thead style="text-align:left">
                      <th>
                        No
                      </th>
                      <th>
                        S.Id
                      </th>
                      <th>
                        Name
                      </th>
                      <th>
                      Role
                      </th>
                      <th>
                        Phone
                      </th>
                      <th>
                        Email
                      </th>
                      <th>
                        Address
                      </th>
                      <th>
                        Date Created
                      </th>
                      <th colspan="2" style="text-align: center">
                        Action
                      </th>
                    </thead>
                    <tbody>
                      <!--database start-->
                      <?php
                          $query='SELECT * FROM `staffinfo`';
                          $result = mysqli_query($virtual_con, $query);
                          $counter2 = 1;

                          if(isset($_POST['search'])){
                            $searchq = $_POST['search'];
                            $searchq = preg_replace("#[^0-9a-z]#i","",$searchq);
                            $sqlsearch = " SELECT * FROM staffinfo WHERE staffid LIKE '%$searchq%' or name LIKE '%$searchq%' or role LIKE '%$searchq%' or address LIKE '%$searchq%'";
                            $output ='';
                            $result2 = mysqli_query($virtual_con, $sqlsearch);
                            $rowCount= mysqli_num_rows($result2);

                            if($rowCount == 0){
                              $output = 'There is no result!';
                            }else{

                            while ($row = $result2->fetch_assoc()){
                            $id = $row['staffid'];
                            $name = $row['name'];
                            $role = $row['role'];
                            $phoneno = $row['phoneno'];
                            $email = $row['email'];
                            $address = $row['address'];
                            $date = $row['date'];
                       ?>
                          <tr>
                            <td><?php echo $counter2; $counter2++;?></td>
                            <td style="text-align:center"><?php echo $id; ?></td>
                            <td><?php echo $name;?></td>
                            <td><?php echo $role;?></td>
                            <td><?php echo $phoneno;?></td>
                            <td><?php echo $email;?></td>
                            <td><?php echo $address;?></td>
                            <td><?php echo $date;?></td>
                            <td>
                                <td align='center'>
                                <button class='delete btn btn-danger' id='del_<?php echo $id ?>' data-id='<?php echo $id ?>' >Revoke</button>
                            </td>
                            </td>
                          </tr>

                    <?php
                          }
                        }
                      }?><br>
                      <tr>
                        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                        <td colspan="4"><div style="font-weight:bold; font-size: 16px; padding: 20px 0px 0px 0px">
                          <?php echo "Total Staff Registered : ".$rowCount;  ?>
                        </div></td>
                      </tr>
                    </tbody>
                  </table><a href="managestaff.php">
                    <div class="update ml-auto mr-auto" style="padding-left: 5px">
                      <button type="submit" class="btn btn-secondary btn-round">
                        Back
                      </button></a>
                  </div>

                </div>
              </div>
            </div>
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</body>
</html>
