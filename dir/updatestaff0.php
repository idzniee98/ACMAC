<?php session_start();
  include_once('dbcon.php');
  include('includes/header.php');
?>
<style>
#grad1 {
  background-color: Tomato; /* For browsers that do not support gradients */
  background-image: linear-gradient(to right,Tomato , Moccasin);
}
</style>
<div id="grad1">
  <div style="text-align: center; padding:10px">
    <a href="Admindashboard.php"><img src="../assets/img/logoacmac.png" alt="logo" width="70" height="70"></a>
  </div>
 <div class="container">
   <div class="row justify-content-center">
      <h2 style="text-align: center">Update Staff Information</h2>
     <div class="col-md-6 mt-4" style="background-color:white; border:20">
       <form class="" action="savedata.php" method="POST">
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
       </div><br>
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
