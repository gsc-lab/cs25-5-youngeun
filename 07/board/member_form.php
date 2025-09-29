<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원가입</title>
    <!-- 스타일 불러오기 -->
    <link rel="stylesheet" type="text/css" href="./css/common.css">
    <!-- 회원가입 전용 스타일 -->
    <link rel="stylesheet" type="text/css" href="./css/member.css">
</head>

<body>
    <script>
        // 입력 데이터 검사 함수
        function check_input() {
            // 아이디 입력 여부 확인
            if (!document.member_form.id.value) {
                alert("아이디를 입력하세요.");
                document.member_form.id.focus();
                return;
            }
            // 비밀번호 입력 여부 확인
            if (!document.member_form.pass.value) {
                alert("비밀번호를 입력하세요.");
                document.member_form.pass.focus();
                return;
            }
            // 비밀번호 확인란 입력 여부 확인
            if (!document.member_form.pass_confirm.value) {
                alert("비밀번호를 확인하세요.");
                document.member_form.pass_confirm.focus();
                return;
            }
            // 이름 입력 여부 확인
            if (!document.member_form.name.value) {
                alert("이름을 입력하세요.");
                document.member_form.name.focus();
                return;
            }
            // 이메일 앞부분 입력 여부 확인 (ex) yjp1234 )
            if (!document.member_form.email1.value) {
                alert("이메일 주소를 입력하세요.");
                document.member_form.email1.focus();
                return;
            }
            // 이메일 뒷부분 입력 여부 확인 (ex) gmail.com)
            if (!document.member_form.email2.value) {
                alert("이메일 주소를 입력하세요.");
                document.member_form.email2.focus();
                return;
            }
            // 비밀번호가 일치하는지 검사
            if (document.member_form.pass.value != document.member_form.pass_confirm.value) {
                alert("비밀번호가 일치하지 않습니다.\n다시 입력해 주세요.");
                document.member_form.pass.focus();
                document.member_form.pass.select();
                return;
            }

            // 모든 검사 통과하면 폼 제출
            document.member_form.submit();
        }

        // 입력값 초기화 함수
        function reset_form() {
            document.member_form.id.value = "";
            document.member_form.pass.value = "";
            document.member_form.pass_confirm.value = "";
            document.member_form.name.value = "";
            document.member_form.email1.value = "";
            document.member_form.email2.value = "";
            document.member_form.id.focus();
        }
    </script>

    <div id="join_box">
        <form name="member_form" method="post" action="member_insert.php">
            <h2>회원 가입</h2>

            <!-- 아이디 -->
            <div class="form id">
                <div class="col1">아이디</div>
                <div class="col2">
                    <input type="text" name="id">
                </div>
            </div>

            <div class="clear"></div>

            <!-- 비밀번호 -->
            <div class="form">
                <div class="col1">비밀번호</div>
                <div class="col2">
                    <input type="password" name="pass">
                </div>
            </div>

            <div class="clear"></div>

            <!-- 비밀번호 확인 -->
            <div class="form">
                <div class="col1">비밀번호 확인</div>
                <div class="col2">
                    <input type="password" name="pass_confirm">
                </div>
            </div>

            <div class="clear"></div>

            <!-- 이름 -->
            <div class="form">
                <div class="col1">이름</div>
                <div class="col2">
                    <input type="text" name="name">
                </div>
            </div>

            <div class="clear"></div>

            <!-- 이메일 -->
            <div class="form email1">
                <div class="col1">이메일</div>
                <div class="col2">
                    <input type="text" name="email1">@<input type="text" name="email2">
                </div>
            </div>

            <div class="clear"></div>

            <div class="bottom_line"></div>

            <!-- 버튼 -->
            <div class="buttons">
                <button type="button" onclick="check_input()">저장하기</button>
                <button type="button" onclick="reset_form()">취소하기</button>
            </div>
        </form>
    </div>

</body>

</html>