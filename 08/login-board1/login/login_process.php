<?php

// login_process.php

session_start();
require_once '../../conf/config.php';

// member 테이블 상수로 정의
define('MEMBER_TABLE', 'members');

try {
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    if ($conn->connect_error) {
        throw new Exception("데이터베이스 연결 실패: " . $conn->connect_error);
    }

    $conn->set_charset('utf8mb4');

    // 입력값 확인 
    $id_input_raw = trim($_POST['username'] ?? '');
    $password_raw = trim($_POST['password'] ?? '');

    if ($id_input_raw === '' || $password_raw === '') {
        throw new Exception('아이디와 비밀번호를 모두 입력하세요.');
    }

    // --- 사용자 조회 쿼리 실행  ---
    $sql = "SELECT id, pass, name FROM " . MEMBER_TABLE . " WHERE id = ?";

    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        throw new Exception("쿼리 준비 실패: " . $conn->error);
    }

    // SQL의 ?에 변수를 바인딩
    $stmt->bind_param("s", $id_input_raw);

    // 쿼리를 DB 서버에 실행하도록 명령하는 것
    $stmt->execute();

    // 실행된 쿼리의 결과(조회된 데이터들)을 가져온다
    $result = $stmt->get_result();

    // 조회 결과를 행 단위로 가져옴 
    $row = $result->fetch_assoc();

    // DB 리소스 해제
    $stmt->close();



    // 사용자 존재 여부 확인
    if ($row) {
        // 비밀번호 일치 여부 확인
        if (password_verify($password_raw, $row['pass'])) {
            // 인증 성공: 세션에 사용자 정보 저장
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user_name'] = $row['name'];

            $conn->close();
            header("Location: welcome.php");
            exit;
        } else {
            // 비밀번호 불일치
            throw new Exception('비밀번호가 틀렸습니다.');
        }
    } else {
        // 사용자 아이디 없음
        throw new Exception('아이디가 존재하지 않습니다.');
    }
} catch (Exception $e) {
    if (isset($conn) && $conn) {
        $conn->close();
    }
    // 예외 발생 시 에러 메시지 저장 후 로그인 페이지로 이동
    $_SESSION['error'] = $e->getMessage();
    header("Location: login.php");
    exit;
}
