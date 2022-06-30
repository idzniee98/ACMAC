
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
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.min.js'></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">

  <style media="screen">
  td {
      padding: 8px;
      border-bottom: 0.5px solid grey;
      }
  .tr1:hover {background-color: #98FB98;}
  .th1:hover {background-color: grey;}
  input,
  input::-webkit-input-placeholder {
    font-size: 13px;
    line-height: 3;
}
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
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute  navbar-light" style="background-color: #E1D9D1;">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" style="color:black; padding-top:5%;" href="javascript:;">Temperature & Humidity</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation"style="margin: 0% 0% .1% -3%;">

            <!--Start Navbar -->
            <ul class="navbar-nav " >
                <?php
                  include("dbconth.php");
                  $find_notifications = "Select * from testing where active = 1";
                  $result = mysqli_query($virtual_con2,$find_notifications);
                  $count_active = '';
                  $notifications_data = array();
                  $deactive_notifications_dump = array();
                   while($rows = mysqli_fetch_assoc($result)){
                           $count_active = mysqli_num_rows($result);
                           $notifications_data[] = array(
                                       "n_id" => $rows['n_id'],
                                       "notifications_name"=>$rows['notifications_name'],
                                       "message"=>$rows['message']
                           );
                   }
                   //only five specific posts
                   $deactive_notifications = "Delete * from testing where active = 0 ORDER BY n_id DESC LIMIT 0,5";
                   $result = mysqli_query($virtual_con2,$deactive_notifications);
                   /*while($rows = mysqli_fetch_assoc($result)){
                     $deactive_notifications_dump[] = array(
                                 "n_id" => $rows['n_id'],
                                 "notifications_name"=>$rows['notifications_name'],
                                 "message"=>$rows['message']
                     );
                   }*/

                ?>
                      <div class="container-fluid" >
                        <ul class="nav navbar-nav">
                          <li><i class="fa fa-bell"   id="over" data-value ="<?php echo $count_active;?>" style="z-index:-99 !important;font-size:20px;color:black; padding-bottom:5%;"></i></li>
                          <?php if(!empty($count_active)){?>
                          <div class="rounded-circle" id="bell-count" data-value ="<?php echo $count_active;?>"><span><?php echo $count_active; ?></span></div>
                          <?php }?>

                          <?php if(!empty($count_active)){?>
                            <div id="list" style="margin-left:30%;">
                             <?php
                                foreach($notifications_data as $list_rows){?>
                                  <br>
                                  New Alert!
                                  <li id="message_items">
                                  <div class="message alert alert-success" data-id=<?php echo $list_rows['n_id'];?>>
                                    <span style="color:black;"><strong><?php echo $list_rows['notifications_name'];?></strong></span>
                                    <div class="msg">
                                      <p style="color:black;"><?php
                                        echo $list_rows['message'];
                                      ?></p>
                                    </div>
                                  </div>
                                  </li>
                               <?php }
                             ?>
                             </div>
                           <?php }else{?>
                              <!--old Messages-->
                              <div id="list">
                              <?php
                                foreach($deactive_notifications_dump as $list_rows){?>
                                  Previous Alert!
                                  <li id="message_items">
                                  <div class="message alert alert-danger" data-id=<?php echo $list_rows['n_id'];?>>
                                    <span style="color:black; font-size:18px;"><strong><span><?php echo $list_rows['notifications_name'];?></strong></span>
                                    <div class="msg">
                                      <p  style="color:black;"><?php
                                        echo $list_rows['message'];
                                      ?></p>
                                    </div>
                                  </div>
                                  </li>
                               <?php }
                             ?>
                              <!--old Messages-->

                           <?php } ?>

                           </div>
                        </ul>
                      </div>
            </ul>
          </div>
          <div class=" fixed-top justify-content-end" id="navigation" style="margin: 1% 0% .1% 95%;">
            <ul class="navbar-nav" >
              <li class="nav-item">
                <a class="nav-link btn-rotate" href="logout.php">
                  <i class="nc-icon nc-button-power" data-toggle="tooltip" data-placement="bottom" title="Logout"  style="color:black;"></i>
                  <p>
                    <span class="d-lg-none d-md-block" style="color:black;">Logout</span>
                  </p>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      <!-- End Navbar -->
      <?php
        include("dbconth.php");
       ?>
       <div class="content">
        <div class="row">
          <div class="col-md-12">
          <div class="card">
          <div class="card-body">
          <div class="table-responsive">
            <div class="col-md-12">
            <div class="card card-plain">
              <div class="card-header">
                <h3 class="card-title">Table Overview</h3><br>
                <?php if($_SESSION['userrole'] == 'Admin'  || $_SESSION['userrole'] == 'Administrator' || $_SESSION['userrole'] == 'Manager') {?>
                <div class="container">
                  <h5 class="card-title" style="font-size:12px;">Send Alert/Action</h5>
                       <form class="form-horizontal" id="frm_data" style="margin-right:75%">
                           <div class="form-group row">
                              <label class="control-label col-md-auto" for="notification">Name:</label>
                              <div class="col-md-auto">
                              <input type="text" name="notifications_name" id="notifications_name" class="form-control" placeholder="Notification Title" required/>
                              </div>
                           </div>
                           <div class="form-group row">
                              <label class="control-label col-md-auto" for="notification">Message:</label>
                              <div class="col-md-10">
                                <textarea style="resize:none !important;"name="message" id="message"  cols="10" class='form-control'></textarea>
                              </div>
                           </div>
                           <div class="form-group row">
                              <div class="col-md-10 col-offset-2" style="text-align:left;">
                              <input type="submit" id="notify" name="submit" class="btn btn-danger" value="NOTIFY"/>
                              </div>
                           </div>
                       </form>
                </div><?php } ?>
                <div style="padding-left:80%; font-size:10px;">
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
                      <th class="text-center  text-primary">
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
                        $query2="SELECT * FROM dht11 ORDER BY id desc";;
                        $result2 = mysqli_query($virtual_con2, $query2);
                        $counter2 = 1;
                        while ($row2 = mysqli_fetch_assoc($result2)){
                          $date = $row2['date_day'];
                          $time = $row2['time_day'];
                          $temperature = $row2['temperature'];
                          $humidity = $row2['humidity'];
                          $heatindex = $row2['heatindex'];

                     ?>

                    <tbody class="text-center tr1">
                      <?php if($temperature >=30){ ?>
                      <tr style="background-color: #FF6347;">
                        <td><?php echo $counter2; $counter2++?></td>
                        <td>
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
                      </tr>
                    <?php
                  }else if($temperature <=17.99){
                    ?>
                    <tr style="background-color: #7DF9FF;">
                      <td><?php echo $counter2; $counter2++?></td>
                      <td>
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
                    </tr>
                    <?php
                  }else {
                    ?>
                    <tr>
                      <td><?php echo $counter2; $counter2++?></td>
                      <td>
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
                    </tr>
                    <?php
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
  <script src="../assets/js/core/ddtf.js"></script>
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

  <script>
  $(document).ready(function(){
      var ids = new Array();
      $('#over').on('click',function(){
             $('#list').toggle();
         });

     //Message with Ellipsis
     $('div.msg').each(function(){
         var len =$(this).text().trim(" ").split(" ");
        if(len.length > 12){
           var add_elip =  $(this).text().trim().substring(0, 65) + "…";
           $(this).text(add_elip);
        }

  });


     $("#bell-count").on('click',function(e){
          e.preventDefault();

          let belvalue = $('#bell-count').attr('data-value');

          if(belvalue == ''){

            console.log("inactive");
          }else{
            $(".round").css('display','inline');
            $("#list").css('display','block');

            // $('.message').each(function(){
            // var i = $(this).attr("data-id");
            // ids.push(i);

            // });
            //Ajax
            $('.message').click(function(e){
              e.preventDefault();
                $.ajax({
                  url:'deactivenoti.php',
                  type:'POST',
                  data:{"id":$(this).attr('data-id')},
                  success:function(data){

                      console.log(data);
                      location.reload();
                  }
              });
          });
       }
     });

     $('#notify').on('click',function(e){
          e.preventDefault();
          var name = $('#notifications_name').val();
          var ins_msg = $('#message').val();
          if($.trim(name).length > 0 && $.trim(ins_msg).length > 0){
            var form_data = $('#frm_data').serialize();
          $.ajax({
            url:'insertnoti.php',
                  type:'POST',
                  data:form_data,
                  success:function(data){
                      location.reload();
                  }
          });
          }else{
            alert("Please Fill All the fields");
          }


     });
  });
  </script>

  <script>
          $('.navbar-collapse a').click(function(){
              $(".navbar-collapse").collapse('hide');
          });
  </script>
</body>
</html>
