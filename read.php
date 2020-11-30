<!DOCTYPE html>
<?php
include 'config.php';
include 'login_check.php';
include 'db_con.php';

$bno = $_GET['num'];
$sql = mq("select * from review where num='".$bno."'
");
$board=$sql->fetch_array();
 ?>
<html lang="ko">
<head>
<title>Site Title</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="stylesheet" href="/bigdb/bootstrap/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<script src= "https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"> </script>
<style>
  .topnav {
    overflow : hidden;
  }
  .topnav a {
    float: right;
    display: block;
    color: black;
    text-align: center;
    padding : 14px 16px;
    font-size:14px;
    text-decoration:none;
    margin-bottom : 10px;
  }
  .log a:hover {
    color: red;
  }
  .select_area {
    max-width : 900px;
    margin:0px auto;
    text-align : center;
    margin-bottom : 40px;
  }
  .main-wrap{
    height: 800px;
    display : grid;
    grid-template-columns : repeat(3,1fr);
    grid-gap:50px;
    overflow:auto;
    text-align:center;
  }
  .place-wrap {
    border:solid 1px gray;
    overflow: auto;
  }
  .accom-wrap {
    overflow : auto;
    border:solid 1px gray;
  }
  .food-wrap{
    border:solid 1px gray;
    overflow: auto;
  }
img{width:100%;max-height:560px;}

.card { width : 100%;  height: 150px;}
</style>
</head>

<body>
  <div class="topnav">
    <div class = "log">
      <?php
        if(!$userid) {
      ?>
      <a href="signup.php" id="signup">회원가입</a>
      <a href="login.html" id="login">로그인</a>
    <?php
      }else {$logged=$userid;
     ?>
     <a href="mypage.php" id="mypage">마이페이지</a>
     <a href="logout.php" id="logout">로그아웃</a>
     <?php
      } ?>
    </div>
  </div>
  <nav class="navbar navbar-expand-lg bg-light justify-content-center">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="home.php">전통문화 여행 코스 만들기</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="list.php">전통문화 여행 리뷰</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="poptravel.php">인기 여행지</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="poprestaurant.php">인기 음식점</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="popaccom.php">인기 숙소</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="ranking.php">지역별 랭킹</a>
      </li>
    </ul>
  </nav>
  <br><br>
<div class= "container">
  <div class="board_read" id="board_read">
      <table class="table table-striped" style="text-algin: center; border: 1px solid #ddddda">
        <thead>
          <tr>
            <th colspan="2" style=" text-align:center;"><h3><?=$board['text']?></h3></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>작성자</td> <td colspan="2"><?=$board['id']?></td>
          </tr>
          <tr>
            <td>작성일</td> <td colspan="2"><?=$board['date']?></td>
          </tr>
          <tr>
            <td>여행지</td> <td colspan="2"><?=$board['addr1']." ".$board['addr2']?></td>
          </tr>
          <tr>
          <td colspan="2" style="height : 500px; text-align:left;"><?=$board['text']?></td>
          </tr>
        </tbody>
      </table>
      <a href="list.php" class="btn-primary">목록</a>
      <?php
      if ($userid==$board['id']) {
       ?>

       <a href="update.php?num=<?=$board['num']?>" class"btn btn-primary">수정</a>
       <a href="delete.php?num=<?=$board['num']?>" class"btn btn-primary">삭제</a>
       <br><br><br>
     <?php } ?>
  </div>
</div>
</body>
</html>
