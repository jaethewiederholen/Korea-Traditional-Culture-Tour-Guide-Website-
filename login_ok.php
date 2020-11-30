<?php
$id = $_POST['id'];
$pass=$_POST['pass'];

$con = mysqli_connect("localhost","team29", "team29", "team29");
$sql = "SELECT * FROM members WHERE id='$id'";

$result = mysqli_query($con, $sql);
$num_match= mysqli_num_rows($result);

if(!num_match){
  echo("
        <script>
          window.alert('등록되지 않은 아이디입니다.')
          history.go(-1)
        </script>
        ");
}
else {
  $row = mysqli_fetch_array($result);
  $db_pass = $row['pw'];

  mysqli_close($con);

  /*비번 비교*/
  if(!password_verify($pass, $db_pass)){
    echo("
      <script>
        window.alert('비밀번호가 틀립니다!')
        history.go(-1)
        </script>");
        exit;
  }else{
    session_start();
    $_SESSION["userid"]=$row["id"];
    echo("
    <script>
    location.href='home.php';
    </script>");
  }
}
 ?>
