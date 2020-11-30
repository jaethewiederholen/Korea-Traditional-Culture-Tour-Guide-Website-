<?php
include "config.php";
//include "db_con.php";

$bno= $_POST['idx'];
$date= date('Y-m-d');

$conn=mysqli_connect("localhost", "team29", "team29","team29");

function begin(){
  mysqli_query(mysqli_connect("localhost", "team29", "team29","team29"),"BEGIN");
}
function commit(){
  mysqli_query(mysqli_connect("localhost", "team29", "team29","team29"),"COMMIT");
}
function rollback() {
  mysqli_query(mysqli_connect("localhost", "team29", "team29","team29"),"ROLLBACK");
}


$query = "update review set date='".$date."',addr1='".$_POST['do']."', addr2='".$_POST['si']."',star='".$_POST['star']."', title='".$_POST['title']."',text='".$_POST['content']."' where num='".$bno."'";

begin();
$result=mysqli_query($conn,$query);

if(!$result){
    rollback(); // transaction rolls back
    echo "<script>
    alert('수정에 실패했습니다');

    </script>";
    exit;
}else{
    commit(); // transaction is committed
    echo "<script>
    alert('수정되었습니다.');
    
    </script>";
}

$conn->close();
?>
<meta http-equiv="refresh" content="0 url=/bigdb/read.php?num=<?=$bno?>">
