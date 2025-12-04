<?php

session_start();
require_once '../../conf/config.php';

define('MEMBER_TABLE', 'members');


try {
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    if ($conn->connect_error) {
        throw new Exception("데이터베이스 연결 실패: " . $conn->connect_error);
    }

    $conn->set_charset('utf8mb4');

    // 입력값 확인 
    $id_raw       = trim($_POST['id'] ?? '');
    $password_raw = trim($_POST['pass'] ?? '');
    $name_raw     = trim($_POST['name'] ?? '');

    if ($id_raw === '' || $password_raw === '' || $name_raw === '') {
        throw new Exception('모든 항목을 입력해주세요.');
    }

    // --- 1. 아이디 중복 확인 ---
    $check_sql = "SELECT num FROM " . MEMBER_TABLE . " WHERE id = ?";
    $stmt = $conn->prepare($check_sql);

    if (!$stmt) {
        throw new Exception("쿼리 준비 실패: " . $conn->error);
    }


    $stmt->bind_param("s", $id_raw);
    $stmt->execute();
    $check_result = $stmt->get_result();



    if ($check_result->num_rows > 0) {
        $stmt->close();
        throw new Exception('이미 존재하는 아이디입니다.');
    }
    $stmt->close();

    // --- 2. 비밀번호 해시 및 사용자 저장 ---
    $hashed_pw = password_hash($password_raw, PASSWORD_DEFAULT);

    $insert_sql = "
        INSERT INTO " . MEMBER_TABLE . " (id, pass, name)
        VALUES (?, ?, ?)
    ";

    $stmt = $conn->prepare($insert_sql);

    if (!$stmt) {
        throw new Exception("쿼리 준비 실패: " . $conn->error);
    }

    // "sss": id, pass, name 모두 문자열(string) 타입
    $stmt->bind_param("sss", $id_raw, $hashed_pw, $name_raw);
    $stmt->execute();
    $stmt->close();

    $conn->close();

    $_SESSION['success'] = '회원가입이 완료되었습니다. 로그인해주세요.';
    header("Location: login.php");
    exit;
} catch (Exception $e) {
    if (isset($conn) && $conn) {
        $conn->close();
    }
    $_SESSION['error'] = $e->getMessage();
    header("Location: register.php");
    exit;
}
