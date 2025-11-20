<?php

// 1. 세션 시작
session_start();

// 2. 로그인된 사용자는 환영 페이지로 이동
if (isset($_SESSION['user_id'])) {
    header("Location: welcome.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>로그인</title>
</head>

<body>
    <h2>로그인</h2>

    <?php
    // 로그인 실패 시 오류 메시지 출력

    if (isset($_SESSION['error'])) {
        echo htmlspecialchars($_SESSION['error']);
        unset($_SESSION['error']);
    } elseif (isset($_SESSION['success'])) {
        echo htmlspecialchars($_SESSION['success']);
        unset($_SESSION['success']);
    }
    ?>

    <!--로그인 정보를 서버로 보낼 폼-->
    <form action="login_process.php" method="post">
        <fieldset>
            <legend>로그인 정보 입력</legend>

            <!--로그인 입력 필드-->
            <label> 아이디:
                <input type="text" name="username" require>
            </label><br>

            <!--비밀번호 입력 필드-->
            <label> 비밀번호:
                <input type="password" name="password" require>
            </label><br>

            <!--로그인 버튼 (폼 제출 버튼)-->
            <input type="submit" value="로그인">
        </fieldset>
    </form>


</body>

</html>