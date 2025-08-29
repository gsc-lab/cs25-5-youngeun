<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>회원 가입</title>
  <link rel="stylesheet" href="style.css">
  <script>
    function check_input() {
      // 아이디 입력 안 했을 경우
      if (!document.member.id.value) {
        alert("아이디를 입력하세요.");
        document.member.id.focus();
        return;
      }
      // 비번 입력 안 했을 경우
      if (!document.member.pass.value) {
        alert("비밀번호를 입력하세요.");
        document.member.pass.focus();
        return;
      }
      // 비번 확인 입력 안 했을 경우
      if (!document.member.pass_confirm.value) {
        alert("비밀번호를 입력하세요.");
        document.member.pass_confirm.focus();
        return;
      }
      // 이름 입력 안 했을 경우   
      if (!document.member.name.value) {
        alert("이름을 입력하세요.");
        document.member.name.focus();
        return;
      }
      // 이메일 입력 안 했을 경우 
      if (!document.member.email.value) {
        alert("이메일 주소를 입력하세요.");
        document.member.email.focus();
        return;
      }
      // 비번이 일치하지 않을 경우
      if (document.member.pass.value != document.member.pass_confirm.value) {
        alert("비밀번호가 일치하지 않습니다. \n다시 입력해 주세요.");
        document.member.pass.focus();
        document.member.pass.select();
        return;
      }
      document.member.submit();
    }
    /* 폼 내용 초기화 */
    function reset_form() {
      document.member.id.value = "";
      document.member.pass.value = "";
      document.member.pass_confirm.value = "";
      document.member.name.value = "";
      document.member.email.value = "";
      document.member.id.focus();
      return;
    }
  </script>
</head>

<body>
  <!-- 회원가입 폼 -->
  <form name="member" action="insert.php" method="post">
    <h2>회원 가입</h2>
    <ul class="join_form">
      <li>
        <span class="col1">아이디</span>
        <span class="col2"><input type="text" name="id"></span>
      </li>

      <li>
        <span class="col1">비밀번호</span>
        <span class="col2"><input type="password" name="pass"></span>
      </li>

      <li>
        <span class="col1">비밀번호 확인</span>
        <span class="col2"><input type="password" name="pass_confirm"></span>
      </li>

      <li>
        <span class="col1">이름</span>
        <span class="col2"><input type="text" name="name"></span>
      </li>

      <li>
        <span class="col1">이메일</span>
        <span class="col2"><input type="text" name="email"></span>
      </li>
    </ul>
    <ul>
      <li><button type="button" onclick="check_input()">저장하기</button></li>
      <li><button type="button" onclick="reset_form()">취소하기</button></li>
    </ul>
  </form>
</body>

</html>