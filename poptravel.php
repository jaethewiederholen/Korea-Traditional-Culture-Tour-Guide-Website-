<!DOCTYPE html>
<?php include 'config.php';
include 'db_con.php'; ?>
<html lang="ko">
<head>
<title>Travel</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<link rel="stylesheet" href="/team29/bootstrap/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
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


<center><h2> 사람들이 많이 찾는 여행지는 어디일까요? </h2></center>

<section class="gallery-block cards-gallery">
    <div class="row">

        <div class="col-md-4" id="travelList" style="background-color: white;">
        <center><h3>전체</h3></center>
            <?php
            $sql=mq("select t.*, count
                from (SELECT place, count(*) count
                    FROM `search` where not place is null group by place order by count desc limit 5) s 
                left join travel t
                on s.place=t.place order by count desc");
            
            $no = 0;
                
            while ($newArray = $sql -> fetch_array()){
                $addr1 = $newArray['addr1'];
                $addr2 = $newArray['addr2'];
                $addr3 = $newArray['addr3'];
                $place = $newArray['place'];
                $photo = $newArray['photo'];
                $count = $newArray['count'];
                $no+=1;
                if(!$photo){
                    $photo="noimg.png";
                }
            ?>
        
            <div class="container">
                <div class="row">
                    <div class="col-md-11" style="float: none; margin-right: auto;margin-left: auto; margin-top: 10px; margin-bottom:10px">
                    <center>
                        <div id='item'><br><br><b><?=$no;?>위</b>
                        </div>
                    </center>
                    </div>

                    <div class="card-columns border-0 transform-on-hover" id= "place'+i+'" style="cursor:pointer">
                        <img src=<?=$photo;?> class="card-img-top" style="height:250px; width:100%; object-fit:cover">
                    
                    <div class="card-body" style="width:250px">
                        <h6><?=$place;?>
                        </h6>
                        <p class="text-muted card-text">
                            <?=$addr1;?> <?=$addr2;?> <?=$addr3;?> <br>
                            총 <?=$count;?>명이 조회했습니다.
                        </p>
                    </div>

                    </div>
                </div>
            </div>

            <?php } ?>
        </div>

        <div class="col-md-4" id="accomList" style="background-color: white;">
        <center><h3>남성</h3></center>
            <?php
                $sql=mq("select t.*, gender, count
                from (select gender, place, count(*) count
                      from search s left join members m on s.id=m.id where place is not null group by gender, place) s
                left join travel t
                on s.place=t.place where gender = 'male' order by count desc limit 5");
                
                $no = 0;
                    
                while ($newArray = $sql -> fetch_array()){
                    $addr1 = $newArray['addr1'];
                    $addr2 = $newArray['addr2'];
                    $addr3 = $newArray['addr3'];
                    $place = $newArray['place'];
                    $photo = $newArray['photo'];
                    $count = $newArray['count'];
                    $no+=1;
                    if(!$photo){
                        $photo="noimg.png";
                    }
                ?>
            
                <div class="container">
                    <div class="row">
                        <div class="col-md-11" style="float: none; margin-right: auto;margin-left: auto; margin-top: 10px; margin-bottom:10px">
                        <center>
                            <div id='item'><br><br><b><?=$no;?>위</b>
                            </div>
                        </center>
                        </div>

                        <div class="card-columns border-0 transform-on-hover" id= "place'+i+'" style="cursor:pointer">
                            <img src=<?=$photo;?> class="card-img-top" style="height:250px; width:100%; object-fit:cover">
                        
                        <div class="card-body" style="width:250px">
                            <h6><?=$place;?>
                            </h6>
                            <p class="text-muted card-text">
                                <?=$addr1;?> <?=$addr2;?> <?=$addr3;?> <br>
                                총 <?=$count;?>명이 조회했습니다.
                            </p>
                        </div>

                        </div>
                    </div>
                </div>

            <?php } ?>
        </div>

        <div class="col-md-4" id= "foodList" style="background-color: white;">
        <center><h3>여성</h3></center>
            <?php
                    $sql=mq("select t.*, gender, count
                    from (select gender, place, count(*) count
                          from search s left join members m on s.id=m.id where place is not null group by gender, place) s
                    left join travel t
                    on s.place=t.place where gender = 'female' order by count desc limit 5");
                    
                    $no = 0;
                        
                    while ($newArray = $sql -> fetch_array()){
                        $addr1 = $newArray['addr1'];
                        $addr2 = $newArray['addr2'];
                        $addr3 = $newArray['addr3'];
                        $place = $newArray['place'];
                        $photo = $newArray['photo'];
                        $count = $newArray['count'];
                        $no+=1;
                        if(!$photo){
                            $photo="noimg.png";
                        }
                    ?>
                
                    <div class="container">
                        <div class="row">
                            <div class="col-md-11" style="float: none; margin-right: auto;margin-left: auto; margin-top: 10px; margin-bottom:10px">
                            <center>
                                <div id='item'><br><br><b><?=$no;?>위</b>
                                </div>
                            </center>
                            </div>

                            <div class="card-columns border-0 transform-on-hover" id= "place'+i+'" style="cursor:pointer">
                                <img src=<?=$photo;?> class="card-img-top" style="height:250px; width:100%; object-fit:cover">
                            
                            <div class="card-body" style="width:250px">
                                <h6><?=$place;?>
                                </h6>
                                <p class="text-muted card-text">
                                    <?=$addr1;?> <?=$addr2;?> <?=$addr3;?> <br>
                                    총 <?=$count;?>명이 조회했습니다.
                                </p>
                            </div>

                            </div>
                        </div>
                    </div>
            <?php } ?>
        </div>
    </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="/team29/bootstrap/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

</body>
</html>