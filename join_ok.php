<?php


  $userid = $_POST['userid'];
  $userpw = password_hash($_POST['userpw'], PASSWORD_DEFAULT);
  $username = $_POST['name'];
  $age = $_POST['age'];
  $sex = $_POST['sex'];

  $conn = new mysqli("localhost","team29","team29","team29");
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sql = "INSERT INTO  members (id, pw, gender, age)
  VALUES ('$userid', '$userpw', '$sex', '$age' )";

  if ($conn->query($sql) === TRUE) {
    echo " <script>
    alert ('회원가입이 완료되었습니다.');
    location.href = 'home.php';
  </script>";}
  else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();
  ?>
