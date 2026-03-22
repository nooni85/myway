<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// URL 파라미터로 테마 변경 요청이 온 경우 세션에 저장
if (isset($_GET['theme'])) {
    $_SESSION['theme'] = $_GET['theme'];
}

// 세션에 저장된 테마가 있으면 사용, 없으면 기본값 'terminal' 사용
$currentTheme = $_SESSION['theme'] ?? 'terminal';
$cssFile = $currentTheme === 'cute' ? 'cute.css' : 'terminal.css';
?>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- 선택된 테마에 따라 CSS 파일을 동적으로 로드합니다. -->
<link rel="stylesheet" href="../../assets/css/<?= $cssFile ?>">
