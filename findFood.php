<?php
include 'db_con.php';
include 'config.php';

$addr1 = $_POST['addr1'];
$addr2 = $_POST['addr2'];
$addr3 = $_POST['addr3'];

$sql = mq("SELECT * FROM restaurant WHERE addr1='$addr1' and addr2='$addr2'");

if($sql){
  $o=array();
  while($result=$sql->fetch_array()){
      $t = new stdClass();
      $t->addr1=$result['addr1'];
      $t->addr2=$result['addr2'];
      $t->addr3=$result['addr3'];
      $t->food=$result['food'];
      $t->photo=$result['photo'];

      $o[]=($t);
      unset($t);
    }
  }
  echo json_encode($o,JSON_UNESCAPED_UNICODE);

?>
