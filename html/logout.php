<?php
session_start();

// 세션 파기
session_unset();
session_destroy();

// 로그인 페이지로 리디렉션
header('Location: auth-login-basic.php');
exit();
?>