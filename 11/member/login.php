<?php
$id = $_POST["id"];            // 로그인 폼에서 보낸 아이디 값을 받음 (POST 방식으로 전송된 데이터)
$pass = $_POST["pass"];        // 로그인 폼에서 보낸 비밀번호 값을 받음
 
// MySQL 서버에 연결
$con = mysqli_connect("localhost", "user", "12345", "sample"); 

// members 테이블에서 아이디가 $id인 행을 찾는 쿼리 문자열을 만듦
$sql = "select * from members where id='$id'";    

// 쿼리를 DB에 보내 실행 -> 결과(레코드 집합)를 받음
$result = mysqli_query($con, $sql);  

// 결과에 몇 행이 왔는지 개수를 셈 0이면 없는 아이디, 1이면 존재
$num_match = mysqli_num_rows($result);  


if (!$num_match) {                      // 결과가 0개면 (일치하는 아이디가 없으면)
    echo "<script>
        window.alert('등록되지 않는 아이디입니다!')
        history.go(-1)
    </script>";                         // 경고 띄우고 이전 페이지로
    
} else {                                 // 아이디가 존재하면
    $row = mysqli_fetch_assoc($result);  
    $db_pass = $row["pass"];             

    mysqli_close($con);                  // DB 연결 닫기

    if ($pass != $db_pass) {             // 사용자가 입력한 비번과 DB 비번 비교
        echo "<script>
            window.alert('비밀번호가 틀립니다!')
            history.go(-1)
        </script>";                      // 틀리면 경고 후 뒤로가기
        exit;                            // 여기서 스크립트 종료
    } else {                             // 비번이 맞으면
        session_start();                 // 세션 사용 시작. 세션 저장소를 활성화
        $_SESSION["userid"] = $row["id"];    // 세션에 로그인 사용자 아이디 저장
        $_SESSION["username"] = $row["name"]; // 세션에 로그인 사용자 이름 저장

        echo "<script>
            location.href = 'index.php';
        </script>";                      // 메인 페이지로 이동
    }
}