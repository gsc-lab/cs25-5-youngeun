<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="./css/common.css">
    <link rel="stylesheet" type="text/css" href="./css/login.css">
    <script type="text/javascript" src="./js/login.js"></script>
</head>

<body>
    <div id="login_box">
        <div id="login_title">
            <span>로그인</span>
        </div>
        <div id="login_form">
            <form name="login_form" method="post" action="login.php">
                <ul>
                    <li><input type="text" name="id" placeholder="아이디"></li>
                    <li><input type="password" id="pass" name="pass" placeholder="비밀번호"></li>
                </ul>
                <div id="login_btn">
                    <button type="button" onclick="check_input()">로그인</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>