<?php
  include('includes/header.php');
  include('dbcon.php');

  if(isset($_POST['save_push_data'])){
    $staffid = $_POST['staffid'];
    $name= $_POST['name'];
    $email = $_POST['email'];
    $phoneno = $_POST['phoneno'];
    $address = $_POST['address'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    $url1 = "managestaff.php";
    $sql = "INSERT INTO `staffinfo`(`staffid`, `name`, `phoneno`, `email`, `address`, `password`, `role`)
                            VALUES ('$staffid','$name','$phoneno','$email','$address','$password', '$role')";
    $result = $conn->query($sql);
    if($result == TRUE){
      function function_alert($message) {
      echo "<script>alert('$message');</script>";
    } function_alert("Data Successfully Recorded.");
    echo " <script> window.location = '$url1';</script>'";
  }else{
      echo '<script>alert("Error: ")</script>'. $sql . "<br>" . $conn->error;
  }}
?>
<style>
    #grad1 {
      background-color: LightSkyBlue; /* For browsers that do not support gradients */
      background-image: linear-gradient(to right, LightSkyBlue , PowderBlue);
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
<div id="grad1">
  <div style="text-align: center; padding:10px" class="img-hover-zoom img-hover-zoom--xyz">
    <a href="managestaff.php"><img src="../assets/img/logoacmac.png" alt="logo" width="70" height="70"></a>
  </div>
 <div class="container">
   <div class="row justify-content-center">
      <h2 style="text-align: center">Insert New Staff Information</h2>
     <div class="col-md-6 mt-4" style="background-color:white; border:20">
       <form class="form-group" action="" method="POST">
       <div class="form-group">
         <p>Staff ID:</p>
         <input type="text" name="staffid" class="form-control" placeholder="A0* or S0*" required>
       </div>
       <div class="form-group">
         <p style="padding: 5px">Name:</p>
         <input type="text" name="name" class="form-control" placeholder="Full Name" required>
       </div>
       <div class="form-group">
         <p style="padding: 5px">Email Address:</p>
         <input type="email" name="email" class="form-control" placeholder="example@gmail.com" required>
       </div>
       <div class="form-group">
         <p style="padding: 5px">Phone Number:</p>
         <input type="text" name="phoneno" class="form-control" placeholder="01xxxxxxxx" required>
       </div>
       <div class="form-group">
         <p style="padding: 5px">Current Home Address:</p>
         <input type="text" name="address" class="form-control" placeholder="Current Home Address" required>
       </div>
       <div class="form-group">
         <p style="padding: 5px">Role:</p>
         <input type="text" name="role" class="form-control" placeholder="Eg: Manager or Staff only" required>
       </div>
       <div class="form-group">
         <p style="padding: 5px">Create Temporary Password:</p>
         <input type="text" name="password" class="form-control" placeholder="Temporary Password [Eg:S01ahmad]" required>
         <div style="font-size:12px; color: red">
           <p><i>*** Manager need to provide temporary password for new staff.
           <br>*** New staff are advise to change temporary password once login into the system.</i></p>
         </div>
       </div>
     </div>
       <div class="form-group" style="text-align:center; padding:20px; padding-bottom:50px">
         <a href="managestaff.php"><button type="button" name="button" class="btn btn-secondary btn-block">Back</button></a>
         <button type="submit" name="save_push_data" class="btn btn-primary btn-block">Save</button>
       </div>
       </form>
   </div>
 </div>
</div>
<?php
  include('includes/footer.php');
?>
