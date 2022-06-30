<?php
  session_start();
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "acmac";
  $virtual_con=mysqli_connect($servername,$username,$password,$dbname);
  if($virtual_con -> connect_error){
    die("Connection failed : ".$virtual_con->connect_error);
  }
  $conn=mysqli_connect($servername,$username,$password,$dbname);
  if($conn -> connect_error){
    die("Connection failed : ".$conn->connect_error);
  }

 ?>
