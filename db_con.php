<?php
$db=mysqli_connect("localhost", "team29", "team29", "team29");

function mq($sql){
  global $db;
  return $db->query($sql);
}
 ?>
