<?php

// 사용자가 입력한 아이디와 비밀번호를 POST 방식으로 전달받아 각각 $id와 $pass에 저장함
$id = $_POST['id'];
$pass = $_POST['pass'];

// 데이터베이스 연결
$con = mysqli_connect("localhost", "user", "12345", "sample");

// members 테이블에서 입력한 id와 일치하는 데이터 검색
$sql = "select * from members where id='$id'";
$result = mysqli_query($con, $sql);
$num_match = mysqli_num_rows($result);


if (!$num_match) {
    // 아이디 없음
    echo ("
    <script>
    window.alert('등록되지 않은 아이디입니다.')
    history.go(-1)
    ");
} else {
    // 아이디 있음
    $row = mysqli_fetch_array($result);
    $db_pass = $row["pass"];

    mysqli_close($con);

    if ($pass != $db_pass) {
        // 비밀번호 틀림
        echo ("
        <script>
        window.alert('비밀번호가 틀립니다.')
        history.go(-1)
        </script>"
        );
        exit;
    } else {
        // 로그인 성공 -> 세션 저장
        session_start();
        $_SESSION["userid"] = $row["id"];
        $_SESSION["username"] = $row["name"];
        $_SESSION["userlevel"] = $row["level"];
        $_SESSION["userpoint"] = $row["point"];
        
        // 메인으로 이동
        echo ("
              <script>
                location.href = 'index.php';
              </script>
            ");
    }
}
