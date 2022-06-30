<?php
$servername2 = "localhost";
$username2 = "root";
$password2 = "";
$dbname2 = "temphum";
$virtual_con2=mysqli_connect($servername2,$username2,$password2,$dbname2);
if($virtual_con2 -> connect_error){
  die("Connection failed : ".$virtual_con2->connect_error);
}
 ?>
