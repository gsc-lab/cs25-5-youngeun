<?php

session_start();
require_once '../../conf/config.php';

// 로그인 여부 확인
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <title>환영합니다</title>
</head>

<body>

    <h2>환영합니다, <?= htmlspecialchars($_SESSION['user_name']) ?>님!</h2>

    <!-- 로그인 사용자 정보 요약 -->
    <ul>
        <li>사용자 ID: <?= htmlspecialchars($_SESSION['user_id']) ?></li>
        <li>아이디: <?= htmlspecialchars($_SESSION['user_name']) ?></li>
    </ul>

    <!-- 이동 링크 -->
    <p><a href="<?= BOARD_PATH ?>/list.php">게시판으로 이동</a></p>
    <p><a href="logout.php">로그아웃</a></p>

</body>

</html>