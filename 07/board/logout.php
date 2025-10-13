<?php

// 세션 시작
session_start();

// 로그인 시 저장했던 세션 변수 삭제
unset($_SESSION['userid']);
unset($_SESSION['username']);

// index.php로 페이지 이동 
// (로그아웃 후 메인으로 돌아감)
echo ("
    <script>
    location.href='index.php';
    </script>
    ");
