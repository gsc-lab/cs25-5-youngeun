<?php

// edit_process.php

session_start();
require_once '../../conf/config.php';

// 로그인 여부 확인
if (!isset($_SESSION['user_id'])) {
    $_SESSION['error'] = '로그인 후 이용 가능합니다.';
    header("Location: " . LOGIN_PATH . "/login.php");
    exit;
}

// POST 값 수신 및 유효성 검사
$post_id = isset($_POST['id']) ? intval($_POST['id']) : 0;
$title_raw = trim($_POST['title'] ?? '');
$content_raw = trim($_POST['content'] ?? '');

if ($post_id <= 0 || $title_raw === '' || $content_raw === '') {
    $_SESSION['error'] = '제목과 내용을 모두 입력해 주세요.';
    header("Location: edit.php?id=" . $post_id);
    exit;
}

try {
    // DB 연결
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $conn->set_charset('utf8mb4');

    // 게시글 존재 및 소유자 확인
    $check_sql = "SELECT user_id FROM posts WHERE id = $post_id";
    // SELECT 쿼리를 DB에 실행하고 결과를 $check_result로 받음
    $check_result = $conn->query($check_sql);


    // 쿼리 실패 or 해당 id 글이 없다면
    if (!$check_result || $check_result->num_rows === 0) {
        $_SESSION['error'] = '해당 게시글이 존재하지 않습니다.';
        header("Location: list.php");
        exit;
    }

    // 조회한 글 정보 배열로 꺼내오기
    $row = $check_result->fetch_assoc();

    // 본인 글인지 확인
    if ($_SESSION['user_id'] !== $row['user_id']) {
        $_SESSION['error'] = '본인 게시글만 수정할 수 있습니다.';
        header("Location: list.php");
        exit;
    }

    // 입력값 이스케이프 처리
    $title = $conn->real_escape_string($title_raw);
    $content = $conn->real_escape_string($content_raw);

    // 수정 쿼리 실행 (updated_at 자동 갱신됨)
    $update_sql = "
        UPDATE posts
        SET title = '$title', content = '$content'
        WHERE id = $post_id
    ";
    $conn->query($update_sql);

    $_SESSION['success'] = '게시글이 수정되었습니다.';
    header("Location: view.php?id=" . $post_id);
    exit;
} catch (Exception $e) {
    error_log('[' . date('Y-m-d H:i:s') . '] ' . $e->getMessage() . PHP_EOL, 3, LOG_FILE_PATH);
    $_SESSION['error'] = '게시글 수정 중 오류가 발생했습니다.';
    header("Location: edit.php?id=" . $post_id);
    exit;
}
