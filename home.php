<!DOCTYPE html>
<?php include 'config.php';
include 'db_con.php'; ?>
<html lang="ko">
<head>
<title>Site Title</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="stylesheet" href="/bigdb/bootstrap/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css" />
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
.col-md-4{ height: 800px; overflow-y:scroll; }
</style>
<script src= "https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"> </script>
<script>
  $(document).ready(function(){
    var do_val;
    var si_val;
    var addr1;
    var addr2;
    var addr3;
    var place;
    var food;
    var room;
  $('#do_select').change(function(){
    do_val = $(this).val();
    $.post('findSi.php', { dropdownValue: do_val }, function(data){
      data=JSON.parse(data);
      document.getElementById('si_select').innerHTML='<option value="">해당 지역의 도시를 선택하세요</option>';
      $.each(data,function(key,val){
        $('#si_select').append('<option value='+val.si+'>'+val.si+'</option');
        });
      });
    });
  $('#si_select').change(function(){
    si_val=$(this).val();
    document.getElementById('text_result').innerHTML= do_val+' '+si_val+'의 전통문화 여행지 입니다.';

    $.post('findTravel.php', { si_val: si_val , do_val : do_val}, function(data){
      data=JSON.parse(data);
      //alert(data);
      var i=0;
      document.getElementById('travelList').innerHTML= '검색후';
      $.each(data,function(key,val){
        addr1=val.addr1;
        addr2=val.addr2;
        addr3=val.addr3;

        //place=val.place;
        if(!val.photo){
          val.photo="noimg.png";
        }
        $('#travelList').append('<div class="container"><div class="row"><div class="col-md-11" style="float: none; margin-right: auto;margin-left: auto; margin-top: 10px; margin-bottom:10px"><div class="card-columns border-0 transform-on-hover" id= "place'+i+'" value="'+val.place+'" style="cursor:pointer"><img src="'+
        val.photo + '" class="card-img-top" style="height:250px; width:100%; object-fit:cover"></a><div class="card-body" style="width:250px"><h6>'+
        val.place + '</h6><p class="text-muted card-text">'+ addr1 + addr2 + addr3 + '</p></div></div></div></div>');
        $("#place"+i).on("click", function () {
          place=$(this).attr("value");
          $.post('findAccom.php', {addr1 : addr1, addr2: addr2, addr3: addr3}, function(data){
            data=JSON.parse(data);
            //alert(data);
            var k=0;
            document.getElementById('accomList').innerHTML='검색후';
            $.each(data,function(key,val){
              //alert(val.room);
              addr1=val.addr1;
              addr2=val.addr2;
              addr3=val.addr3;
              if(!val.photo){
                val.photo="noimg.png";
              }
              $('#accomList').append('<div class="container"><div class="row"><div class="col-md-11" style="float: none; margin-right: auto;margin-left: auto; margin-top: 10px; margin-bottom:10px"><div class="card-columns border-0 transform-on-hover" id= "room'+k+'" value = "'+val.room+'"style="cursor:pointer"><img src="'+
              val.photo + '" class="card-img-top" style="height:250px; width:100%; object-fit:cover"></a><div class="card-body" style="width:250px"><h6>'+
              val.room + '</h6><p class="text-muted card-text">'+ addr1 + addr2 + addr3 + '</p></div></div></div></div>');
              $("#room"+k).on("click", function() {
                room=$(this).attr("value");
                $.post('findFood.php', {addr1: addr1, addr2: addr2, addr3: addr3}, function(data){
                  data=JSON.parse(data);
                //alert(data);
                  var j=0;
                  document.getElementById('foodList').innerHTML='검색후';
                  $.each(data,function(key,val){
                    addr1=val.addr1;
                    addr2=val.addr2;
                    addr3=val.addr3;
                    if(!val.photo){
                      val.photo="noimg.png";
                    }
                    $('#foodList').append('<div class="container"><div class="row"><div class="col-md-11" style="float: none; margin-right: auto;margin-left: auto; margin-top: 10px; margin-bottom:10px"><div class="card-columns border-0 transform-on-hover" id= "last'+j+'" value= "'+val.food+'" style="cursor:pointer"><img src="'+
                    val.photo + '" class="card-img-top" style="height:250px; width:100%; object-fit:cover"></a><div class="card-body" style="width:250px"><h6>'+
                    val.food + '</h6><p class="text-muted card-text">'+ addr1 + addr2 + addr3 + '</p></div></div></div></div>');
                    $("#last"+j).on("click", function() {
                      food=$(this).attr("value");
                      $.post('insertSearch.php',{addr1: addr1, addr2: addr2, addr3: addr3, place:place, room:room, food:food},function(data){
                        alert(data);
                      });

                    });
                    j++;
                  });
                });
              });
              k++;
            });
          });
        });
        i++;
      });
    });
  });
});
</script>
<style>
.gallery-block{padding-bottom: 60px; padding-top: 60px;}
.gallery-block .heading{margin-bottom: 50px; text-align: center;}

.gallery-block .heading h2{font-weight: bold;font-size: 1.4rem; text-transform: uppercase;}

.gallery-block.cards-gallery h6{font-size: 17px; font-weight: bold;}

.gallery-block.cards-gallery .card{transition: 0.4s easy;}
.gallery-block.cards-gallery .card img{box-shadow: 0px 2px 10px rgba(0,0,0,0.15);}
.gallery-block.cards-gallery .card-body{text-align: center;}
.gallery-block.cards-gallery .card-body p{font-size: 15px;}
.gallery-block.cards-gallery a{color:#212529; }
.gallery-block.cards-gallery a:hover{text-decoration: none;}
.gallery-block.cards-gallery  .card{
margin-bottom: 30px;
box-shadow: 0px 2px 10px rgba(0,0,0,0.15);
}

@media (min-width: 576px) {

.gallery-block .transform-on-hover:hover {
  transform: translateY(-10px) scale(1.02);
  box-shadow: 0px 10px 10px rgba(0, 0, 0, 0.15) !important;
}
}
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
<div class="select_area">
  <span> 지역을 선택하세요 </span>
  <br>
  <br>

  <div class="dropdown" style="display:block;">
    <select class="browser-default custom-select" id="do_select"  style="width: 300px; margin-right:50px">
      <option value="">원하시는 지역을 선택하세요</option>
      <option value="특별시">특별시</option>
      <option value="강원도">강원도</option>
      <option value="충청북도">충청북도</option>
      <option value="충청남도">충청남도</option>
      <option value="경상북도">경상북도</option>
      <option value="경상남도">경상남도</option>
      <option value="전라북도">전라북도</option>
      <option value="전라남도">전라남도</option>
      <option value="경기도">경기도</option>
      <option vlaue="제주특별자치도">제주특별자치도</option>
      </select>


    <select class="browser-default custom-select" name="si" id="si_select" style="width: 300px;">
     <option value=""> 원하시는 지역을 먼저 선택하세요</option>
     </select>
    </div>
    <br>
  <span id="text_result"> </span>
  </div>

  <section class="gallery-block cards-gallery">
    <div class="row">


      <div class="col-md-4" id="travelList" style="background-color: white;">
        검색전
      </div>

     <div class="col-md-4" id="accomList" style="background-color: white;">
       검색전
    </div>

   <div class="col-md-4" id= "foodList" style="background-color: white;">
     검색전
   </div>
 </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script type="text/javascript" src="/bigdb/bootstrap/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

</body>
</html>
