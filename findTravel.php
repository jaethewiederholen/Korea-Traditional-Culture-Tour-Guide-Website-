<?php
include 'db_con.php';
include 'config.php';

$si_val = $_POST['si_val'];
$do_val = $_POST['do_val'];

if($do_val=="광역시"||$do_val=="특별시"){
  $sql=mq("SELECT * FROM travel WHERE addr1='$si_val'");
}
else{
  $sql=mq("SELECT * FROM travel WHERE addr1='$do_val' and addr2='$si_val'");
}

if($sql){
  $o=array();
  while($result=$sql->fetch_array()){
      $t = new stdClass();
      $t->addr1=$result['addr1'];
      $t->addr2=$result['addr2'];
      $t->addr3=$result['addr3'];
      $t->place=$result['place'];
      $t->photo=$result['photo'];

      $o[]=($t);
      unset($t);
    }
    echo json_encode($o,JSON_UNESCAPED_UNICODE);
  }

?>
