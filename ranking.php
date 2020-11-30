<!doctype html>
<?php include 'config.php';
include 'db_con.php'; ?>
<html lang="ko">
    <head>
        <title>Ranking</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
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
        body{padding-top:20px}

        .pricing-table .plan {
        margin-left:0px;
        border-radius: 5px;
        text-align: center;
        background-color: #f3f3f3;
        -moz-box-shadow: 0 0 6px 2px #b0b2ab;
        -webkit-box-shadow: 0 0 6px 2px #b0b2ab;
        box-shadow: 0 0 6px 2px #b0b2ab;
        }

        .plan:hover {
        background-color: #fff;
        -moz-box-shadow: 0 0 12px 3px #b0b2ab;
        -webkit-box-shadow: 0 0 12px 3px #b0b2ab;
        box-shadow: 0 0 12px 3px #b0b2ab;
        }

        .plan {
        padding: 20px;
        margin-left:0px;
        color: #ff;
        background-color: #5e5f59;
        -moz-border-radius: 5px 5px 0 0;
        -webkit-border-radius: 5px 5px 0 0;
        border-radius: 5px 5px 0 0;
        }

        .plan-name-bronze {
        padding: 20px;
        color: #fff;
        background-color: #FFD700;
        -moz-border-radius: 5px 5px 0 0;
        -webkit-border-radius: 5px 5px 0 0;
        border-radius: 5px 5px 0 0;
        }

        .plan-name-silver {
        padding: 20px;
        color: #fff;
        background-color: #C0C0C0;
        -moz-border-radius: 5px 5px 0 0;
        -webkit-border-radius: 5px 5px 0 0;
        border-radius: 5px 5px 0 0;
        }

        .plan-name-gold {
        padding: 20px;
        color: #fff;
        background-color: #665D1E;
        -moz-border-radius: 5px 5px 0 0;
        -webkit-border-radius: 5px 5px 0 0;
        border-radius: 5px 5px 0 0;
        }

        .pricing-table-bronze  {
        padding: 20px;
        color: #fff;
        background-color: #f89406;
        -moz-border-radius: 5px 5px 0 0;
        -webkit-border-radius: 5px 5px 0 0;
        border-radius: 5px 5px 0 0;
        }

        .pricing-table .plan .plan-name span {
        font-size: 20px;
        }

        .pricing-table .plan ul {
        list-style: none;
        margin: 0;
        -moz-border-radius: 0 0 5px 5px;
        -webkit-border-radius: 0 0 5px 5px;
        border-radius: 0 0 5px 5px;
        }

        .pricing-table .plan ul li.plan-feature {
        padding: 15px 10px;
        border-top: 1px solid #c5c8c0;
        margin-right: 35px;
        }

        .pricing-three-column {
        margin: 0 auto;
        width: 80%;
        }

        .pricing-variable-height .plan {
        float: none;
        margin-left: 2%;
        vertical-align: bottom;
        display: inline-block;
        zoom:1;
        *display:inline;
        }

        .plan-mouseover .plan-name {
        background-color: #4e9a06 !important;
        }
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




<script>
  $(document).ready(function(){
    var do_val;
    var addr1;
    var addr2;
    var ranking;
    var staravg;

  $('#do_select').change(function(){
    do_val = $(this).val();
    document.getElementById('rnkng').innerHTML='<thead><tr><th>순위</th><th>시/도</th><th>시/군/구</th><th>별점 평균</th><th style="width: 36px;"></th></tr></thead>';
    $.post('ranking_con.php', {dropdownValue: do_val}, function(data){
      //alert("check");
      //alert(data);
      data=JSON.parse(data);
        $.each(data, function(key,val){
        ranking=val.ranking;
        addr1=val.addr1;
        addr2=val.addr2;
        staravg=val.staravg;

        $('#rnkng').append('<tbody><tr><td>'+ranking+'</td><td>'+addr1+'</td><td>'+addr2+'</td><td>'+staravg+'</td></tr></tbody>');
      });
   });
  });
  });

</script>





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


    <center><h2><별점이 가장 높은 시/도는 어디일까요?></h2></center>

<div class="container">
    <div class="pricing-table pricing-three-column row">

      <div class="plan col-sm-4 col-lg-4">
            <?php
                $sql=mq("select *
                from (select *, rank() over (order by staravg desc) ranking
                    from (select addr1, avg(star) staravg from review group by addr1) reviewavg) reviewranking
                where ranking = 1");

                while ($newArray = $sql -> fetch_array()){
                    $addr1 = $newArray['addr1'];
                    $staravg = $newArray['staravg'];
                    $ranking = $newArray['ranking'];
            ?>
          <div class="plan-name-bronze">
            <h2><?=$addr1;?></h2>
          </div>
          <ul>
            <li class="plan-feature"><?=$ranking;?>위</li>
            <li class="plan-feature">별점<br><?=$staravg;?></li>
          </ul>
            <?php } ?>
      </div>

      <div style="z-index:55;" class="plan col-sm-4 col-lg-4">
            <?php
                $sql=mq("select *
                from (select *, rank() over (order by staravg desc) ranking
                    from (select addr1, avg(star) staravg from review group by addr1) reviewavg) reviewranking
                where ranking = 2");

                while ($newArray = $sql -> fetch_array()){
                    $addr1 = $newArray['addr1'];
                    $staravg = $newArray['staravg'];
                    $ranking = $newArray['ranking'];
            ?>
          <div class="plan-name-silver">
            <h2><?=$addr1;?></h2>
          </div>
          <ul>
            <li class="plan-feature"><?=$ranking;?>위</li>
            <li class="plan-feature">별점<br><?=$staravg;?></li>
          </ul>
            <?php } ?>
      </div>

      <div class="plan col-sm-4 col-lg-4">
            <?php
                $sql=mq("select *
                from (select *, rank() over (order by staravg desc) ranking
                    from (select addr1, avg(star) staravg from review group by addr1) reviewavg) reviewranking
                where ranking = 3");

                while ($newArray = $sql -> fetch_array()){
                    $addr1 = $newArray['addr1'];
                    $staravg = $newArray['staravg'];
                    $ranking = $newArray['ranking'];
            ?>
          <div class="plan-name-gold">
            <h2><?=$addr1;?></h2>
          </div>
          <ul>
            <li class="plan-feature"><?=$ranking;?>위</li>
            <li class="plan-feature">별점<br><?=$staravg;?></li>
          </ul>
            <?php } ?>
      </div>
    </div>
</div>


<div class="select_area">

  <span> <br><br> <h3>각 시/도별 인기가 많은 시/군/구를 확인하세요.</h3> </span>
  <br>
  <br>

  <div class="dropdown" style="display:block;">
    <select class="browser-default custom-select" id="do_select"  style="width: 300px; margin-right:50px">
      <option value="">원하시는 지역을 선택하세요</option>
      <option value="특별시">특별시</option>
      <option value="광역시">광역시</option>
      <option value="경기도">경기도</option>
      <option value="강원도">강원도</option>
      <option value="충청북도">충청북도</option>
      <option value="충청남도">충청남도</option>
      <option value="경상북도">경상북도</option>
      <option value="경상남도">경상남도</option>
      <option value="전라북도">전라북도</option>
      <option value="전라남도">전라남도</option>
      <option value="제주특별자치도">제주특별자치도</option>
      </select>
  </div>
</div>


<div class="rankingtable">
    <table class="table" id="rnkng">
        <thead>
            <tr>
                <th>순위</th>
                <th>시/도</th>
                <th>시/군/구</th>
                <th>별점 평균</th>
                <th style="width: 36px;"></th>
            </tr>
        </thead>
    </table>
</div>

</body></html>
