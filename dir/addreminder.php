<?php
  include('includes/header.php');
  include('dbcon.php');

  if(isset($_POST['save_push_data_reminder'])){
    $note1 = $_POST['note1'];
    $note2 = $_POST['note2'];
    $note3 = $_POST['note3'];
    $note4 = $_POST['note4'];
    $url1 = "Admindashboard.php";
    $sql = "INSERT INTO `reminder`(`note1`, `note2`, `note3`, `note4`) VALUES ('$note1','$note2','$note3','$note4')";
    $result = $conn->query($sql);
    if($result == TRUE){
      function function_alert($message) {
      echo "<script>alert('$message');</script>";
    } function_alert("Reminder Successfully Recorded.");
    echo " <script> window.location = '$url1';</script>'";
  }else{
      echo '<script>alert("Error: ")</script>'. $sql . "<br>" . $conn->error;
  }}
?>
<style>
    #grad1 {
      background-color: #F7E7CE; /* For browsers that do not support gradients */
      background-image: linear-gradient(to right, #F7E7CE ,#F7E7CE);
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
    <a href="Admindashboard.php"><img src="../assets/img/logoacmac.png" alt="logo" width="70" height="70"></a>
  </div>
 <div class="container">
   <div class="row justify-content-center">
      <h2 style="text-align: center">Insert New Reminder</h2>
     <div class="col-md-6 mt-4" style="background-color:white; border:20">
       <div style="font-size:12px; color: red">
         <p><i>***Attention: Each row can only be written lss than 80 characters.
         <br>***You can use excess row to continue writing.</i></p>
       </div>
       <form class="form-group" action="" method="POST">
       <div class="form-group">
         <p>Reminder:</p>
         <textarea name="note1" rows="1" cols="83" placeholder="Row 1..." maxlength="83" required></textarea>
         <textarea name="note2" rows="1" cols="83" placeholder="Continue Row 2..." maxlength="83" ></textarea>
          <textarea name="note3" rows="1" cols="83" placeholder="Continue Row 3..." maxlength="83" ></textarea>
           <textarea name="note4" rows="1" cols="83" placeholder="Continue Row 4..." maxlength="83"></textarea>
         <!--<input type="textarea" name="staffid" class="form-control" placeholder="Insert reminder" required>-->
       </div>
     </div>
       <div class="form-group" style="text-align:center; padding:20px; padding-bottom:50px">
         <a href="Admindashboard.php"><button type="button" name="button" class="btn btn-secondary btn-block">Back</button></a>
         <button type="submit" name="save_push_data_reminder" class="btn btn-primary btn-block">Save</button>
       </div>
       </form>
   </div>
 </div>
</div>
<?php
  include('includes/footer.php');
?>
