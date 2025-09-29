<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- 스타일 불러오기 -->
    <link rel="stylesheet" type="text/css" href="./css/common.css">
    <!-- 로그인 전용 스타일 -->
    <link rel="stylesheet" type="text/css" href="./css/login.css">
    <!--로그인 검증 스크립트-->
    <script type="text/javascript" src="login.js"></script>
</head>

<body>
    <header>
        <!-- 상단 메뉴 불러오기 -->
        <?php include "header.php"; ?>
    </header>
    <section>
        <div id="main_img_bar">
        </div>
        <div id="main_content">
            <div id="login_box">
                <div id="login_title">
                    <span>로그인</span>
                </div>
                <div id="login_form">
                    <!-- 로그인 폼 -->
                    <form name="login_form" method="post" action="login.php">
                        <ul>
                            <!-- 아이디 입력 -->
                            <li><input type="text" name="id" placeholder="아이디"></li>
                            <!-- 비밀번호 입력 -->
                            <li><input type="password" id="pass" name="pass" placeholder="비밀번호"></li> <!-- pass -->
                        </ul>
                        <div id="login_btn">
                            <!-- 로그인 버튼 (이미지 클릭 시 check_input 실행) -->
                            <a href="#"><img src="./img/login.png" onclick="check_input()"></a>
                        </div>
                    </form>
                </div> <!-- login_form -->
            </div> <!-- login_box -->
        </div> <!-- main_content -->
    </section>
</body>

</html>