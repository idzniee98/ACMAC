<?php
  include('includes/header.php');
   ?>
<style>
    #grad1 {
      background-color: #00ff80; /* For browsers that do not support gradients */
      background-image: linear-gradient(to right, #00ff80 , #00ffff);
    }
    .img-hover-zoom {
      padding-top: 10px;
      height: 100px; /* [1.1] Set it as per your need */
      overflow: hidden; /* [1.2] Hide the overflowing of child elements */
    }

    /* [2] Transition property for smooth transformation of images */
    .img-hover-zoom img {
      transition: transform .3s ease;
    }

    /* [3] Finally, transforming the image when container gets hovered */
    .img-hover-zoom:hover img {
      transform: scale(1.5);
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
<div id="grad1">
  <div style="text-align: center; padding:10px" class="img-hover-zoom img-hover-zoom--xyz">
    <a href="user.php"><img src="../assets/img/logoacmac.png" alt="logo" width="70" height="70"></a>
  </div>
 <div class="container">
   <div class="row justify-content-center">
      <h2 style="text-align: center">Update Profile</h2>
     <div class="col-md-6 mt-4" style="background-color:white; border:20">

       <?php
       if (isset($_GET['staffid'])) {
                 $id=$_GET['staffid'];
                 $sql="SELECT * FROM `staffinfo` WHERE (`staffid`='".$id."')";
                 $result=mysqli_query($virtual_con,$sql);
                 $row=mysqli_fetch_assoc($result);
               }
       else if (isset($_POST['staffid'])) {
         $staffid = $_POST['staffid'];
         $name = $_POST['name'];
         $email = $_POST['email'];
         $phoneno = $_POST['phoneno'];
         $address = $_POST['address'];
         $password = $_POST['password'];

                 $sqlupdate="UPDATE staffinfo SET name ='$name', email ='$email', phoneno ='$phoneno', address ='$address', password = '$password' WHERE staffid='".$username."'";
                 $result=mysqli_query($virtual_con,$sqlupdate);
                 $url="user.php";
                 if ($result>0){
                   //delete  Success
                   function function_alert($message) {
                   echo "<script>alert('$message');</script>";
                 } function_alert("Data Successfully Updated.");
                 echo " <script> window.location = '$url';</script>'";
                 }else{
                   //delete failure
                   echo '<script>alert("Error: '.$sqlupdate.')</script>'. $sqlupdate . "<br>" . $virtual_con->error;
                 }
               }
       ?>

       <form class="form-group" action="updatestaff.php" method="POST">
       <div class="form-group">
         <p>Staff ID:</p>
         <input type="text" name="staffid" class="form-control" value="<?php echo $row['staffid'];?>" readonly />
       </div>
       <div class="form-group">
         <p style="padding: 5px">Name:</p>
         <input type="text" name="name" class="form-control" value="<?php echo $row['name'];?>" required />
       </div>
       <div class="form-group">
         <p style="padding: 5px">Email Address:</p>
         <input type="email" name="email" class="form-control" value="<?php echo $row['email'];?>" required />
       </div>
       <div class="form-group">
         <p style="padding: 5px">Phone Number:</p>
         <input type="text" name="phoneno" class="form-control" value="<?php echo $row['phoneno'];?>" required />
       </div>
       <div class="form-group">
         <p style="padding: 5px">Current Home Address:</p>
         <input type="text" name="address" class="form-control" value="<?php echo $row['address'];?>" required />
       </div>
       <div class="form-group">
         <p style="padding: 5px">New Password:</p>
         <input type="password" id="myInput" name="password" class="form-control" value="<?php echo $row['password'];?>" required /> <input type="checkbox" onclick="myFunction()"> Show Password
         <div style="font-size:12px; color: red">
           <p><i>***Attention: For the first time user, please change the password to permenant.
           <br>***Please refer to the Administrator for details.</i></p>
         </div>
       </div>
     </div>
       <div class="form-group" style="text-align:center; padding:20px; padding-bottom:50px">
         <a href="user.php"><button type="button" name="button" class="btn btn-secondary btn-block">Back</button></a>
         <button type="submit" name="save_update_data" class="btn btn-primary btn-block">Update</button>
       </div>
       </form>

   </div>
 </div>
</div>
<?php }else {
  echo " <script> window.location = 'index.php'; </script>";
} ?>
<?php
  include('includes/footer.php');
?>
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
