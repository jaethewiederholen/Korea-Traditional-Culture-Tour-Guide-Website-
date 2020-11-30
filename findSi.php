<?php
include 'db_con.php';
include 'config.php';

if ($_POST['dropdownValue']){

  $value = $_POST['dropdownValue'];
  $sql = mq("SELECT * FROM area WHERE addr1='$value'");
  if($sql){
    $o=array();
    while($result=$sql->fetch_array()){
        $t = new stdClass();
        $t->si=$result['addr2'];
        $o[]=($t);
        unset($t);
      }
      echo json_encode($o,JSON_UNESCAPED_UNICODE);
    }
  }

?>
