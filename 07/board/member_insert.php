<?php
// 회원가입 폼에서 전달된 값들을 POST 방식으로 가져오기
$id = $_POST['id'];
$pass = $_POST['pass'];
$name = $_POST['name'];
$email1 = $_POST['email'];
$email2 = $_POST['email2'];


// 이메일 앞부분 + @ + 뒷부분 → 하나의 이메일 주소로 합치기
$email = $email1 . "@" . $email2;

// 현재의 '연-월-일-시-분' 저장
$regist_day = date("Y-m-d (H:i)");

// MySQL 서버에 연결
$con = mysqli_connect("localhost", "user1", "12345", "sample");

// 회원 정보를 members 테이블에 삽입하는 sql문
$sql = "insert into members(id, pass, name, email, regist_day, level, point)";

// 실제 값들을 SQL문에 추가 
$sql .= "values('$id', '$pass', '$name', '$email', '$regist_day', 9, 0)";


// $sql에 저장된 명령 실행
mysqli_query($con, $sql);
mysqli_close($con);



// 회원가입이 끝나면 index.php로 이동
echo "
<script>
location.href = 'index.php';
</script>";
