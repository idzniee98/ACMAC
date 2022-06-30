<?php
include "dbcon.php";

if(isset($_POST['id'])){
   $id=  $_POST['id'];

   $sql = "DELETE FROM `reminder` WHERE `id` = '".$id. "' ";
   mysqli_query($virtual_con,$sql);
   echo 1;
   exit;
}
echo 0;
exit;
