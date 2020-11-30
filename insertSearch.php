<?php
include 'config.php';

$addr1 = $_POST['addr1'];
$addr2 = $_POST['addr2'];
$addr3 = $_POST['addr3'];
$place=$_POST['place'];
$room=$_POST['room'];
$food=$_POST['food'];

$conn = new mysqli("localhost","team29","team29","team29");
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO  search (id, addr1, addr2, addr3, place, room, food)
VALUES ('$userid', '$addr1', '$addr2', '$addr3', '$place', '$room', '$food' )";

if ($conn->query($sql) === TRUE) {
  echo " 서치저장";}
else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
