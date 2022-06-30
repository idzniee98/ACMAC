<?php
include_once("includes/header.php");
include_once("dbcon.php");
?>
<html>
<head>
  <title>Login</title>
  <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
  <link rel="stylesheet" href="includes/acmac.css">
  <link rel="icon" type="image/x-icon" href="../assets/img/logoacmac.ico">
  <meta name="viewport" content="width=device-width, initial-scale=1">

<style media="screen">
html, body {
  width: 100%;
  height:100%;
}

body {
    background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
    background-size: 400% 400%;
    animation: gradient 7s ease infinite;
}

@keyframes gradient {
    0% {
        background-position: 0% 50%;
    }
    50% {
        background-position: 100% 50%;
    }
    100% {
        background-position: 0% 50%;
    }
}
</style>
</head>
<?php if(!isset($_SESSION['usersession'])){ ?>
<body>
  <?php if(!isset($_POST['uname'])){?>
  <div class="form-group container" style="text-align:center; padding:300px">
    <img src="../assets/img/logoacmac.png" alt="logo" style="width:100px; height:100px">
    <h4>Automatic Control & Monitoring AC Temperature</h4>
    <h4>AC-MAC</h4>
    <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;" class="btn btn-primary btn-rounded" style="font-size:30px"
    >Login</button>
  </div>

<div id="id01" class="modal">

  <form class="modal-content animate" action="index.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="../assets/img/user.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username..." name="uname" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password..." name="psw" id="myInput" required> <input type="checkbox" onclick="myFunction()"> Show Password
      <div style="font-size:12px; color: red">
        <p><i>***Attention: Forgot Password?
        <br>***Please Contact System Administrator For Further Action.</i></p>
      </div>
      <button type="submit" class="btn btn-outline-primary" name="button">Login</button>
    </div>
  </form>
</div>
<?php } else {

$username = $_POST['uname'];
$password = ($_POST['psw']);
$url1 = "Admindashboard.php";
$url2 = "index.php";

$sql2 = "SELECT * FROM staffinfo WHERE email='".$username."' and password='".$password."'";
$result2 = mysqli_query($virtual_con,$sql2);
$result2row = mysqli_num_rows($result2);

  if ($result2row > 0){
  $user2 = mysqli_fetch_assoc($result2);
    $_SESSION['usersession'] = $user2['staffid'];
    $_SESSION['userrole'] = $user2['role'];
    echo " <script>window.location = '$url1';</script>'";

  }else{
  echo '<script type="text/javascript">';
  echo ' window.alert("Login Failed! False Credential, Please Re-enter New Login Information.")';  //not showing an alert box.
  echo '</script>';

  echo " <script> window.location = '$url2';</script>'";
    }?>
  <?php }
  }else{
    echo " <script> window.location = 'Admindashboard.php'; </script>'";
  } ?>



<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
<script>
function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
</body>
</html>
