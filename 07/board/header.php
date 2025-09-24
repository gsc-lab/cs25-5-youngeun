<?php
// 세션 시작
session_start();

// 세션에 저장된 값 확인 (로그인 했는지 체크)
if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
else $userid = "";
if (isset($_SESSION["username"])) $username = $_SESSION["username"];
else $username = "";
?>

<!--상단 로그, 메뉴-->
<div id="top">
    <h3>
        <a href="index.php">PHP</a>
    </h3>
    <ul id="top_menu">
        <?php
        // 로그인 안 했을 때
        if (!$userid) {
        ?>
            <li><a href="member_form.php">회원 가입</a> </li>
            <li><a href="login_form.php">로그인</a></li>
        <?php
        } else {
            // 로그인 했을 때 -> 사용자 아이디, 이름 표시
            $logged = $username . "(" . $userid . ")님";
        ?>
            <li><?= $logged ?> </li>
            <li> | </li>
            <li><a href="logout.php">로그아웃</a> </li>
            <li> | </li>
            <li><a href="member_modify_form.php">정보 수정</a></li>
        <?php
        }
        ?>


        <?php

        ?>
    </ul>
</div>
<!-- 메뉴바 -->
<div id="menu_bar">
    <ul>
        <li><a href="index.php">HOME</a></li>
        <li><a href="message_form.php">쪽지 만들기</a></li>
        <li><a href="board_form.php">게시판 만들기</a></li>
        <li><a href="index.php">사이트 완성하기</a></li>
    </ul>
</div>