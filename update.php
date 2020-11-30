<!DOCTYPE html>
<?php
include 'config.php';
include 'login_check.php';
include 'db_con.php';

$bno = $_GET['num'];

$sql = mq("select * from review where num='$bno'; ");

$board=$sql->fetch_array();
 ?>
<html lang="ko">
<head>
<title>Site Title</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="stylesheet" href="/bigdb/bootstrap/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<script src= "https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"> </script>
<script>
  $(document).ready(function(){
    var inputValue;
    var si_val;
  $('#do_select').change(function(){
    inputValue = $(this).val();
    $.post('findSi.php', { dropdownValue: inputValue }, function(data){
      data=JSON.parse(data);
      alert("ajax completed: " + data);
      document.getElementById('si_select').innerHTML='<option value="">해당 지역의 도시를 선택하세요</option>';
      $.each(data,function(key,val){
        $('#si_select').append('<option value='+val.si+'>'+val.si+'</option');
        });
      });
    });
  $('#si_select').change(function(){
  si_val=$(this).val();
  alert ("si Selected");
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
<div class= "container">
  <div class="board_wirte" id="board_wirte">
    <form action="update_ok.php/<?php echo $board['num'];?>" method="post">
      <input type="hidden" name="idx" value="<?=$bno?>"/>
      <table class="table table-striped" style="text-algin: center; border: 1px solid #ddddda">
        <thead>
          <tr>
            <th colspan="2" style="background-color: #eeeeee; text-align:center;"><h3>게시판 수정하기</h3></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><span class="pull-left">&nbsp;&nbsp;&nbsp;아이디 : <b><?=$userid?></b></span></td>
          </tr>
          <tr>
            <td><select class="browser-default custom-select" name="do" id="do_select"  style="width: 300px; margin-right:50px">
              <option value="<?= $board['addr1'];?>"><?= $board['addr1'];?></option>
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

            <select class="browser-default custom-select" name="si" id="si_select" style="width: 300px; margin-right:50px">
             <option value="<?= $board['addr2'];?>"><?= $board['addr2'];?></option>
           </select>
           <select class="browser-default custom-select" name="star" id="star" style="width: 300px;" value= "<?= $board['star'];?>">
            <option value=""> 별점을 남겨주세요</option>
            <option value=1>1점</option>
            <option value=2>2점</option>
            <option value=3>3점</option>
            <option value=4>4점</option>
            <option value=5>5점</option>
          </select>
         </td>
          </tr>
          <tr>
            <td><input type="text" class="form-control" name="title" id="title" value= "<?= $board['title'];?>" required ></td>
          </tr>
          <tr>
            <td><textarea class="form-control"  name="content" id="content" style="height:350px" required><?= $board['text'];?></textarea></td>
          </tr>
        </tbody>
      </table>
      <button type="submit" class="btn btn-primary">저장</button>
    </form>
  </div>
</div>
</body>
</html>
