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

    $sql = "INSERT INTO `staffinfo`(`staffid`, `name`, `phoneno`, `email`, `address`, `password`)
                            VALUES ('$staffid','$name','$phoneno','$email','$address','password')";

    $result = $conn->query($sql);
    if($result == True){
        echo "New Record Successfully created.";
    }else{
      echo "Error: " $sql . "<br>" . $conn->error;
    }
  }
?>
<style>
#grad1 {
  background-color: LightSkyBlue; /* For browsers that do not support gradients */
  background-image: linear-gradient(to right, LightSkyBlue , PowderBlue);
}
</style>
<div id="grad1">
  <div style="text-align: center; padding:10px">
    <a href="Admindashboard.php"><img src="../assets/img/logoacmac.png" alt="logo" width="70" height="70"></a>
  </div>
 <div class="container">
   <div class="row justify-content-center">
      <h2 style="text-align: center">Insert New Staff Information idzni</h2>
     <div class="col-md-6 mt-4" style="background-color:white; border:20">
       <form class="form-group" action="managestaff.php" method="POST">
       <div class="form-group" style="padding: 5px">
         <p>Staff ID:</p>
         <input type="text" name="staffid" class="form-control" placeholder="S01">
       </div><br>
       <div class="form-group">
         <p>Name:</p>
         <input type="text" name="name" class="form-control" placeholder="Full Name">
       </div><br>
       <div class="form-group">
         <p>Email Address:</p>
         <input type="email" name="email" class="form-control" placeholder="example@gmail.com">
       </div><br>
       <div class="form-group">
         <p>Phone Number:</p>
         <input type="text" name="phoneno" class="form-control" placeholder="0123456789">
       </div><br>
       <div class="form-group">
         <p>Current Home Address:</p>
         <input type="text" name="address" class="form-control" placeholder="Ayer Keroh Melaka">
       </div><br>
       <div class="form-group">
         <p>Create Temporary Password:</p>
         <input type="text" name="password" class="form-control" placeholder="Temporary Password [Eg:S01ahmad]">
         <div style="font-size:12px; color: red">
           <p><i>***Admin need to provide temporary password for new staff.
           <br>***New staff are advise to change temporary password once login into the system.</i></p>
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
