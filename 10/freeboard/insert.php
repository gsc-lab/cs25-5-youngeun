<?php
$name = $_POST["name"];   // 이름
$pass = $_POST["pass"];   // 비밀번호
$title = $_POST["title"]; // 제목
$content = $_POST["content"];  // 내용

$title = htmlspecialchars($title, ENT_QUOTES);
$content = htmlspecialchars($content, ENT_QUOTES);
$regist_day = date("Y-m-d (H:i)"); // UTC 기준 '년-월-일 (시:분)'

$con = mysqli_connect("localhost", "user", "12345", "sample");

$sql = "insert into freeboard (name, pass, title, content, regist_day)"; // 레코드 삽입 명령

$sql .= "values('$name', '$pass', '$title', '$content', '$regist_day')";

mysqli_query($con, $sql); // $sql에 저장된 명령 실행

mysqli_close($con); // DB 연결 끊기

// 목록 페이지로 이동
echo "<script>location.href = 'list.php'; </script>";
