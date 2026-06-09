<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../html/dangnhap.php");
    exit();
}

require_once '../config/class_database.php';

$db = new Database();
$conn = $db->getConnection();

if (isset($_GET['id'])) {
    $idsp = intval($_GET['id']);
    $stmt = $conn->prepare("DELETE FROM sanpham WHERE idsp = ?");
    $stmt->bind_param("i", $idsp);

    if ($stmt->execute()) {
       header('location:admin_quanlisanpham.php');
    } else {
        echo "<div class='alert alert-danger text-center'>Xóa thất bại.</div>";
    }
} else {
    echo "<div class='alert alert-warning text-center'>Không có ID sản phẩm.</div>";
}
?>

