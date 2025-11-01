<?php

// 세션 시작 (사용자 로그인 상태나 데이터 저장용)
session_start();

// 로그인된 사용자는 환영 페이지로 이동
if (isset($_SESSION['user_id'])) {   // isset: 변수나 세션 값이 존재하는지 확인
    header("Location: welcome.php"); // header: 다른 페이지로 이동시키는 함수
    exit;  // 실행 종료
}
?>

<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <title>로그인</title>
</head>

<body>

    <h2>로그인</h2>

    <?php
    // 로그인 실패 시 오류 메시지 출력
    if (isset($_SESSION['error'])) { // $_SESSION: 로그인 등 사용자 정보를 저장
        echo "<p style='color:red'>" . htmlspecialchars($_SESSION['error']) . "</p>"; // echo: 화면에 출력
        unset($_SESSION['error']); // unset: 세션이나 변수 값을 제거
    } else if (isset($_SESSION['success'])) {
        // 성공하면 메시지 출력 처리 
        echo "<p style='color: green;'>" . htmlspecialchars($_SESSION['success']) . "</p>";
        unset($_SESSION['success']);
    }
    ?>

    <!-- 로그인 정보를 서버로 보낼 폼 -->
    <!-- action: 폼을 제출 -> login_process.php로 이동해서 처리함 -->
    <form action="login_process.php" method="post">

        <!-- fieldset: 폼 안의 입력 영역을 그룹으로 묶는 태그 -->
        <fieldset>
            <legend>로그인 정보 입력</legend>

            <!-- 아이디 입력 필드 -->
            <label>아이디:
                <input type="text" name="username" required>
            </label><br>

            <!-- 비밀번호 입력 필드 -->
            <label>비밀번호:
                <input type="password" name="password" required>
            </label><br>

            <!-- 로그인 버튼 -->
            <input type="submit" value="로그인">
        </fieldset>
    </form>

    <!-- 회원가입 링크 안내 -->
    <!-- <a>: 링크를 클릭하면 register.php(회원가입 페이지)로 이동 -->
    <p><a href="register.php">아직 회원이 아니라면? 회원가입</a></p>

</body>