<?php
include 'config.php';

$conn = new mysqli("localhost","team29","team29","team29");
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$id=$userid;
$date=date('Y-m-d');
$title=$_POST['title'];
$text=$_POST['content'];
$star = $_POST['star'];
$addr1=$_POST['do'];
$addr2=$_POST['si'];
$sql = "INSERT INTO  review (id, date, addr1, addr2, star, title, text)
VALUES ('$id', '$date', '$addr1', '$addr2','$star','$title','$text' )";

if ($conn->query($sql) === TRUE) {
  echo " <script>
  alert ('글 작성이 완료되었습니다.');
  location.href = 'home.php';
</script>";}
else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
 ?>
