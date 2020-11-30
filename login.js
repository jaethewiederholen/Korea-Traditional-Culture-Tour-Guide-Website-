function check_input()
{
  if (!documnet.loginSubmit.id.value){
    alert("아이디를 입력하세요");
    document.loginSubmit.id.focus();
    return;
  }

  else if (!document.loginSubmit.pass.value){
    alert("비밀번호를 입력하세요");
    document.loginSubmit.pass.focus();
    return;
  }
  document.loginSubmit.submit();
}
