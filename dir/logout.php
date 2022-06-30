<?php
  include('dbcon.php');
  $url='index.php';

  session_destroy();
  echo " <script> window.location = '$url';</script>'";
 ?>
