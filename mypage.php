<!DOCTYPE html>
<?php
include 'config.php'; ?>
<html lang="ko">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="stylesheet" href="/bigdb/bootstrap/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
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
  <div class="container col-md-10 offset-md-1" style="background-color:lightgray;
  padding:10px ;width: 100%; display: flex;
  flex-direction: row;
  justify-content: center;
  justify-content: center;">
    <?php
    if($userid) {
      $conn = new mysqli("localhost","team29","team29","team29");
      // Check connection
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }

      $sql = "SELECT * from members WHERE id='$userid'";
      $res= $conn->query($sql);

      if ($res) {
        $res_arr= mysqli_fetch_array($res);
        $gender=$res_arr['gender'];
        $age=$res_arr['age'];
      }

      ?>
    <div class="card " style="width: 250px; height:400px ;display:inline-block">
      <img class="card-img-top" src="noprofile.png">
      <div class="card-body">
        <h5 class="card-title text-center"><?=$userid?></h5>
        <p >성별 : <?=$gender?> </p>
        <p>나이 : <?=$age?> </p>
      </div>
    </div>

    <div class="user_review" style="display:inline-block ;margin-left:100px">
      <p class="text-center" style="font-size: 20px">[ 내가 쓴 글 ]</p>
      <table clas="table table-striped" style="text-align: center; border: 1px solid gray;">
        <tr>
          <th style="background-color : #eeeeee; text-align:center;">제목</th>
          <th style="background-color : #eeeeee; text-align:center;">날짜</th>
          <th style="background-color : #eeeeee; text-align:center;">수정</th>
          <th style="background-color : #eeeeee; text-align:center;">삭제</th>
        </tr>
        <?php

        $sql = "SELECT * FROM review where id='$userid'";
        $res=mysqli_query($conn,$sql);
        if($res){
          while($board=mysqli_fetch_array($res,MYSQLI_ASSOC)){
            $title=$board['title'];
            if(strlen($title)>30){
              $title=str_replace($board['title'],mb_substr($board['title'],0,30,"utf-8")."...",$board['title']);
            }

      ?>
      <tbody style="background-color : white">
        <tr>

          <td width="500"><span class="read_check" style="cursor:pointer" data-action="./read.php?num=<?=$board['num']?>"><?=$title?></span></td>
          <td width="100"><?=$board['date'];?></td>
          <td width="100"><a href="update.php?num=<?=$board['num']?>" class="btn btn-primary">수정</a></td>
          <td width="100"><a href="delete.php?num=<?=$board['num']?>" class="btn btn-primary">삭제</a></td>
        </tr>
      <?php
      }
      }
    } mysqli_close($conn)?>
      </tbody>
  </table>
    </div>

  </div>
  <br><br>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script type="text/javascript" src="/bigdb/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
