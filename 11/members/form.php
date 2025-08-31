<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원 가입</title>
    <link rel="stylesheet" href="style.css">
    <script>
         // 아이디 입력 확인
        function check_out() {
            if(!document.member.id.value) {
                alert("아이디를 입력하세요.");
                document.member.id.focus();
                return;
            }
            // 비밀번호 입력 확인
            if(!document.member.pass.value) {
                alert("비밀번호를 입력하세요.");
                document.member.pass.focus();
                return;
            }
            // 비밀번호 확인 입력 확인
            if(!document.member.pass_confirm.value) {
                alert("비밀번호를 다시 입력하세요.");
                document.member.pass_confirm.focus();
                return;
            }
            // 이름 입력 확인
            if(!document.member.name.value) {
                alert("이름을 입력하세요.");
                document.member.name.focus();
                return;
            }
            // 이메일 입력 확인
            if(!document.member.email.value) {
                alert("이메일을 입력하세요");
                document.member.email.focus();
                return;
            }
            // 비밀번호 불일치 시 경고
            if(document.member.pass.value != document.member.pass_confirm.value) {
                alert("비밀번호가 일치하지 않습니다.")
                document.member.pass.focus();
                document.member.pass.selct();
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
            document.member.pass.focus();
            return;
        }
        
    </script>
</head>
<body>
<!-- 회원가입 폼 시작 -->
 <form name="member" action="insert.php" method="post" >
    <h2>회원 가입</h2>
    <ul class="join_form">
        <!-- 아이디 입력칸 -->
         <li>
            <span class="col1">아이디</span>
            <span class="col2"><input type="text" name="id"></span>
         </li>
        <!-- 비밀번호 입력칸 -->
         <li>
            <span class="col1">비밀번호</span>
            <span class="col2"><input type="password" name="pass"></span>
         </li>
        <!-- 비밀번호 확인 입력칸 -->
         <li>
            <span class="col1">비밀번호 확인</span>
            <span class="col2"><input type="password" name="pass_confirm"></span>
         </li>
        <!-- 이름 입력칸 -->
         <li>
            <span class="col1">이름</span>
            <span class="col2"><input type="text" name="name"></span>
         </li>
        <!-- 이메일 입력칸 -->
         <li>
            <span class="col1">이메일</span>
            <span class="col2"><input type="text" name="email"></span>
         </li>
    </ul>
    <ul>
        <!-- 저장 버튼 (유효성 검사 후 제출) -->
        <li><button type="button" onclick="check_input()">저장하기</button></li>
        <li><button type="button" onclick="reset_form()">취소하기</button></li>
    </ul>
</form>
</body>
</html>

