<?php

// delete.php

session_start();
require_once '../../conf/config.php';

// 로그인 여부 확인
if (!isset($_SESSION['user_id'])) {
    $_SESSION['error'] = '로그인 후 이용 가능합니다.';
    header("Location: " . LOGIN_PATH . "/login.php");
    exit;
}

// GET 파라미터 유효성 확인
$post_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
if ($post_id <= 0) {
    $_SESSION['error'] = '잘못된 요청입니다.';
    header("Location: list.php");
    exit;
}

try {
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $conn->set_charset('utf8mb4');

    // 게시글 존재 및 작성자 확인
    $sql = "SELECT user_id FROM posts WHERE id = $post_id";

    // “SELECT 쿼리를 DB에 실행하고 결과를 $result로 받음
    $result = $conn->query($sql);

    // 조회한 게시글이 하나도 없을 경우
    if (!$result || $result->num_rows === 0) {
        $_SESSION['error'] = '해당 게시글이 존재하지 않습니다.';
        header("Location: list.php");
        exit;
    }

    // 조회한 글 정보 배열로 꺼내오기
    $post = $result->fetch_assoc();

    // 작성자 확인
    if ($_SESSION['user_id'] !== $post['user_id']) {
        $_SESSION['error'] = '본인 게시글만 삭제할 수 있습니다.';
        header("Location: list.php");
        exit;
    }

    // 게시글 삭제
    $delete_sql = "DELETE FROM posts WHERE id = $post_id";
    $conn->query($delete_sql);

    $_SESSION['success'] = '게시글이 삭제되었습니다.';
    header("Location: list.php");
    exit;
} catch (Exception $e) {
    error_log('[' . date('Y-m-d H:i:s') . '] ' . $e->getMessage() . PHP_EOL, 3, LOG_FILE_PATH);
    $_SESSION['error'] = '게시글 삭제 중 오류가 발생했습니다.';
    header("Location: list.php");
    exit;
}
