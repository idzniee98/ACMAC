<?php
include "dbcon.php";

if(isset($_POST['staffid'])){
   $id=  $_POST['staffid'];

   $sql = "DELETE FROM `staffinfo` WHERE `staffid` = '".$id. "' ";
   mysqli_query($virtual_con,$sql);
   echo 1;
   exit;
}
echo 0;
exit;
