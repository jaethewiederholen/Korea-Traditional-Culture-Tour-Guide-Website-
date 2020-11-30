<!DOCTYPE html>
<html lang="ko">
<?php include 'config.php';
include 'db_con.php';
?>
<head>
<title>Site Title</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="/bigdb/bootstrap/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-2.2.1.min.js"></script>
<script>
$(document).ready(function(){
  var inisort="default";
  $.post('list_sort.php', { sortby : inisort }, function(data){
    data=JSON.parse(data);
    document.getElementById('list_table').innerHTML='<tr><th style="background-color : #eeeeee; text-align:center;">여행</th><th style="background-color : #eeeeee; text-align:center;">제목</th><th style="background-color : #eeeeee; text-align:center;">작성자</th><th style="background-color : #eeeeee; text-align:center;">작성일</th></tr>';
    //alert("ajax completed: " + data);
    $.each(data,function(key,val){
      //alert(val.num);
      $('#list_table').append('<tbody><tr><td width="100">'+ val.addr + '</td><td width="470" ><span class="read_check" style="cursor:pointer" data-action="./read.php?num='+val.num+'">'+val.title+'</span></td><td width="120">' + val.id + '</td><td width="100">' + val.date + '</td></tr></tbody>');
      $(".read_check").on("click", function () {
        var action_url = $(this).attr("data-action");
        $(location).attr("href",action_url);
        });
      });

  });
  $('#sortby').change(function(){
    var sort = $(this).val();
    $.post('list_sort.php', { sortby : sort }, function(data){
      data=JSON.parse(data);
      document.getElementById('list_table').innerHTML='<tr><th style="background-color : #eeeeee; text-align:center;">여행지</th><th style="background-color : #eeeeee; text-align:center;">제목</th><th style="background-color : #eeeeee; text-align:center;">작성자</th><th style="background-color : #eeeeee; text-align:center;">작성일</th></tr>';
      //alert("ajax completed: " + data);
      $.each(data,function(key,val){
        //alert(val.num);
        $('#list_table').append('<tbody><tr><td width="100">'+ val.addr +'</td><td width="470"><span class="read_check" style="cursor:pointer" data-action="./read.php?num='+val.num+'">'+val.title+'</span></td><td width="120">' + val.id + '</td><td width="100">' + val.date + '</td></tr></tbody>');
        $(".read_check").on("click", function () {
          var action_url = $(this).attr("data-action");
          $(location).attr("href",action_url);
          });
        });

    });

  });
});
</script>
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

  <div class="contatiner">
    <div class="board">
      <br>
      <br>
      <div class="container-fluid ">
      <div class="row" >
        <div class="col-md-1 offset-md-9">
        <a class="btn btn-warning  " href="write.php" role="button">글쓰기</a>
        </div>
        <div class="col-md-2">
        <select class="browser-default custom-select"  name="sortby" id="sortby" >
          <option value="default" selected>최신순</option>;
          <option value="starVal">별점순</option>;
        </select>
      </div>
      </div>
    </div>
      <br>
      <br>
      <table class="table table-striped" id="list_table" style="text-align: center; border: 1px solid gray;">

      </table>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="/bigdb/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
