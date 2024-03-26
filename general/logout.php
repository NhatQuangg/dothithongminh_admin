<?php

// Khởi động session
session_start();

// Hủy bỏ tất cả các biến session
session_unset();

// Hủy bỏ phiên làm việc
session_destroy();

// Chuyển hướng về trang đăng nhập hoặc trang chính
header("Location: index.php");
exit();
?>
