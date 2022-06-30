<?php
class dht11{
 public $link='';
 function __construct($temperature, $humidity, $heatindex){
  $this->connect();
  $this->storeInDB($temperature, $humidity, $heatindex);
 }

 function connect(){
  $this->link = mysqli_connect('localhost','root','') or die('Cannot connect to the DB');
  mysqli_select_db($this->link,'temphum') or die('Cannot select the DB');
 }

 function storeInDB($temperature, $humidity, $heatindex){
  $query = "insert into dht11 set temperature='".$temperature."', humidity='".$humidity."', heatindex='".$heatindex."'";
  $result = mysqli_query($this->link,$query) or die('Errant query:  '.$query);
 }

}
if($_GET['temperature'] != '' and  $_GET['humidity'] != '' and  $_GET['heatindex'] != ''){
 $dht11=new dht11($_GET['temperature'],$_GET['humidity'], $_GET['heatindex']);
}
?>
