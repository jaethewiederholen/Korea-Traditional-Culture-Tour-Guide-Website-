<?php
include "db_con.php";

$bno = $_GET['num'];
mq("delete from review where num='$bno'");
?>
<script>
  alert("삭제되었습니다.");
  </script>
  <meta http-equiv="refresh" content = "0 url=/bigdb/list.php">
