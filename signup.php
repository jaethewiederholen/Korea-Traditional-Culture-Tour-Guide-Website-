<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="/bigdb/bootstrap/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <style>
    body {
	margin:0;
	color:#edf3ff;
	background:#c8c8c8;
	background:url("56738.jpg") fixed;
	background-size: cover;
	font:600 16px/18px 'Open Sans',sans-serif;
}
:after,:before{box-sizing:border-box}
.clearfix:after,.clearfix:before{content:'';display:table}
.clearfix:after{clear:both;display:block}
a{color:inherit;text-decoration:none}

.login-wrap{
  width:100%;
	margin:auto;
	max-width:510px;
	min-height:700px;
	position:relative;
	background-size: cover;
  box-shadow:0 12px 15px 0 rgba(0,0,0,.24),0 17px 50px 0 rgba(0,0,0,.19);
}
.login-html{
	width:100%;
	height:100%;
	position:absolute;
  box-sizing: border-box;
	padding:90px 70px 50px 70px;
	background:rgba(0,0,0,0.5);
}
.login-html .sign-in-htm,
.login-html .for-pwd-htm{
	top:0;
	left:0;
	right:0;
	bottom:0;
	position:absolute;
}
.login-html .sign-in,
.login-html .for-pwd,
.login-form .group .check{
	display:none;
}
.login-html .tab,
.login-form .group .label,
.login-form .group .button{
	text-transform:uppercase;
}
.login-html .tab{
	font-size:22px;
	margin-right:15px;
	padding-bottom:5px;
	margin:0 15px 10px 0;
	display:inline-block;
	border-bottom:2px solid transparent;
}

.login-form{
	min-height:345px;
	position:relative;

}
.login-form .group{
	margin-bottom:20px;
}
.login-form .group .label,
.login-form .group .input,
.login-form .group .button{
	width:100%;
	color:#fff;
	display:block;
}
.login-form .group .input,
.login-form .group .button, .login-form .group .radios{
	border:none;
	padding:15px 20px;
	border-radius:25px;
	background:rgba(255,255,255,.1);
}
.login-form .group input[data-type="password"]{
	text-security:circle;
	-webkit-text-security:circle;
}
.login-form .group .label {
	color:#aaa;
	font-size:12px;
}
.form-check label {
  color:#aaa;
	font-size:12px;
  padding-right: 20px;
}
.login-form .group .button{
	background:#eb8715;
}
.login-form .group label .icon .form-check {
	width:15px;
	height:15px;
	border-radius:2px;
	position:relative;
	display:inline-block;
	background:rgba(255,255,255,.1);
}

.hr{
	height:2px;
	margin:60px 0 50px 0;
	background:rgba(255,255,255,.2);
}
.foot-lnk{
	text-align:center;
}
.underline{
  width : 100px;
  height : 2px;
  margin:8px 0 25px 0;
  background: #eb8715;
}
    </style>
</head>

<body>
  <div class="login-wrap">
    <div class="login-html">
      <span id="text" style="font-size : 20px">회원가입</span>
      <div class="underline"></div>
      <form name="join" method="post" action="join_ok.php">
      <div class="login-form">
        <div class="sign-in-htm">
          <div class="group">
            <label for="user" class="label">아이디 또는 이메일</label>
            <input id="user" type="text" class="input " name="userid">
          </div>
          <div class="group">
            <label for="pass" class="label">비밀번호</label>
            <input id="pass" type="password" class="input" data-type="password" name="userpw">
          </div>
          <div class="group">
            <label for="age" class="label">나이</label>
            <input id="age" type="number" class="input" name="age">
          </div>
          <div class="group">
            <label for="radios" class="label">성별</label>
            <div id=radios class="form-check">
            <input class="form-check-input" type="radio" id="male" name="sex" value="male">
            <label class="form-check-label" for="male">남성</label>
            <input class="form-check-input" type="radio" id="female" name="sex" value="female">
            <label class="form-check-label" for="female">여성</label>
            <input class="form-check-input" type="radio" id="other" name="sex" value="other">
            <label class="form-check-label" for="other">기타</label>
          </div>
          </div>
          <div class="group">
            <input type="submit" class="button" value="회원가입">
          </div>
          <div class="hr"></div>
        </div>
      </div>
    </form>
    </div>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script type="text/javascript" src="/bigdb/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
