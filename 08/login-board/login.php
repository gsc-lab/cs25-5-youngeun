<?php

session_start();

// 로그인된 사용자는 환영 페이지로 이동
if (isset($_SESSION['user_id'])) {
    header("Location: welcome.php");
    exit;
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
if (isset($_SESSION['error'])) {
    echo "<p style='color:red'>" . htmlspecialchars($_SESSION['error']) . "</p>";
    unset($_SESSION['error']);
} else if (isset($_SESSION['success'])) {
// 성공하면 메시지 출력 처리 
    echo "<p style='color: green;'>" . htmlspecialchars($_SESSION['success']) . "</p>";
    unset($_SESSION['success']);
}
?>


<form action="login_process.php" method="post">
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

<!-- 회원가입 안내 -->
<p><a href="register.php">아직 회원이 아니라면? 회원가입</a></p>

</body>
</html>