<?php
include 'db_con.php';
include 'config.php';

if ($_POST['dropdownValue']){

  $value = $_POST['dropdownValue'];

  $sql = mq("SELECT * 
      from (select *, rank() over (partition by addr1 order by staravg desc) ranking
          from (select addr1, addr2, avg(star) staravg
              from review group by addr1, addr2) reviewavg) reviewranking
      where ranking <=3 and addr1='$value'");

  if($sql){
    $o=array();
    while($result=$sql->fetch_array()){
        $t = new stdClass();
        $t->ranking=$result['ranking'];
        $t->addr1=$result['addr1'];
        $t->addr2=$result['addr2'];
        $t->staravg=$result['staravg'];
        $o[]=($t);
        unset($t);
      }
      echo json_encode($o,JSON_UNESCAPED_UNICODE);
  }
}

?>