<?php
    include('dbconth.php');
    $ids = array();
    // $ids = implode(",",$_POST["id"]);
    $ids = $_POST["id"];


    // $deactive = "UPDATE inf SET active=0 where n_id IN(".$ids.")";
    $deactive = "UPDATE testing SET active=0 where n_id= ".$ids." ";

    $result = mysqli_query($virtual_con2,$deactive);
    echo mysqli_error($virtual_con2);

?>
