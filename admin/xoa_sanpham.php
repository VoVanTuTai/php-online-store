<?php
require_once __DIR__ . "/../config/auth.php";
require_admin();
require_once '../config/class_database.php';

$db = new Database();
$conn = $db->getConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $idsp = intval($_POST['id']);

    if ($idsp <= 0) {
        echo "<div class='alert alert-warning text-center'>ID sản phẩm không hợp lệ.</div>";
        exit();
    }

    $stmt = $conn->prepare("DELETE FROM sanpham WHERE idsp = ?");
    $stmt->bind_param("i", $idsp);

    if ($stmt->execute()) {
       header('Location: admin_quanlisanpham.php');
       exit();
    } else {
        echo "<div class='alert alert-danger text-center'>Xóa thất bại.</div>";
    }
} else {
    echo "<div class='alert alert-warning text-center'>Không có ID sản phẩm.</div>";
}
?>

