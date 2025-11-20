<?php

session_start();
?>

<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <title>회원가입</title>
</head>

<body>

    <h2>회원가입</h2>

    <?php
    // 오류 메시지 출력
    if (isset($_SESSION['error'])) {
        echo "<p style='color:red'>" . htmlspecialchars($_SESSION['error']) . "</p>";
        unset($_SESSION['error']);
    }
    // 성공 메시지 출력
    elseif (isset($_SESSION['success'])) {
        echo "<p style='color:green'>" . htmlspecialchars($_SESSION['success']) . "</p>";
        unset($_SESSION['success']);
    }
    ?>

    <!--회원가입 입력 폼-->
    <!--register_process.php로 전송-->
    <form action="register_process.php" method="post">
        <fieldset>
            <legend>회원 정보 입력</legend>

            <!-- 아이디 입력 -->
            <label>아이디:
                <input type="text" name="id" required>
            </label><br>

            <!-- 비밀번호 입력 -->
            <label>비밀번호:
                <input type="password" name="pass" required>
            </label><br>

            <!-- 이름 입력 -->
            <label>이름:
                <input type="text" name="name" required>
            </label><br>

            <!-- 회원가입 제출 버튼 -->
            <input type="submit" value="회원가입">
        </fieldset>
    </form>

    <!-- 로그인 페이지 안내 링크 -->
    <p><a href="login.php">이미 회원이신가요? (로그인페이지)</a></p>

</body>

</html>