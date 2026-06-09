<?php
session_start(); // Bắt đầu session nếu chưa có
session_destroy(); // Hủy tất cả session
header("Location:home.php"); // Chuyển hướng về trang chủ sau khi đăng xuất
exit();
?>