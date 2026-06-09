<?php
require_once __DIR__ . "/../config/auth.php";
require_admin();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="../css/all.css">
    <link rel="stylesheet" href="../css/admin.css">
    <script src="../js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-dark">
        <div class="container-fluid d-flex justify-content-between">
            <h1>SONG TÀI FOOD <i class="fas fa-seedling"></i></h1>
            <h1>WELCOME TO ADMIN</h1>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row sidebar">
            <div class="col-md-2 sidebar">
                <a href="../admin/admin_xulydonhang.php"><button>Xử lý đơn hàng</button></a>
                <a href="../admin/admin.php"><button>Thêm sản phẩm</button></a>
                <a href="../admin/admin_quanlisanpham.php"><button>Quản lí sản phẩm</button></a>
                <a href="../admin/admin_postbaiviet.php"><button>Thêm bài viết</button></a>
                <a href="../admin/admin_thongke.php"><button>Thống kê doanh thu</button></a>
            </div>
            <div class="col-md-10 mt-1">
            <?php
                require_once '../config/class_database.php';
                require_once '../class_models/class_admin.php';

                $db = new Database();
                $conn = $db->getConnection();
                $admin = new Admin($db);

                if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['idsp'])) {
                    $idsp = $_POST['idsp'];
                    $tensp = $_POST['tensp'];
                    $gia = $_POST['gia'];
                    $giamgia = $_POST['giamgia'];
                    $soluongton = $_POST['soluongton'];
                    $mota = $_POST['mota'];

                    $stmt = $conn->prepare("UPDATE sanpham SET tensp = ?, gia = ?, giamgia = ?,soluongton = ?, mota = ? WHERE idsp = ?");
                    $stmt->bind_param("siiisi", $tensp, $gia, $giamgia, $soluongton, $mota, $idsp);
                    if ($stmt->execute()) {
                        echo "<div class='alert alert-success text-center'>Cập nhật sản phẩm thành công.</div>";
                    } else {
                        echo "<div class='alert alert-danger text-center'>Lỗi khi cập nhật sản phẩm.</div>";
                    }
                }

                // Lấy thông tin sản phẩm hiện tại
                if (isset($_GET['id'])) {
                    $idsp =$_GET['id'];
                    $stmt = $conn->prepare("SELECT * FROM sanpham WHERE idsp = ?");
                    $stmt->bind_param("i", $idsp);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $sanpham = $result->fetch_assoc();
                }
                ?>

                <!-- Giao diện chỉnh sửa -->
                <?php if (isset($sanpham)): ?>
                <form method="POST">
                    <input type="hidden" name="idsp" value="<?= $sanpham['idsp'] ?>">
                    <div class="form-group">
                        <label>Tên sản phẩm</label>
                        <input type="text" class="form-control" name="tensp" value="<?= $sanpham['tensp'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Giá</label>
                        <input type="number" class="form-control" name="gia" value="<?= $sanpham['gia'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Giá giảm</label>
                        <input type="number" class="form-control" name="giamgia" value="<?= $sanpham['giamgia'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Số lượng tồn kho</label>
                        <input type="number" class="form-control" name="soluongton" value="<?= $sanpham['soluongton'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Mô tả</label>
                        <textarea class="form-control" name="mota"><?= $sanpham['mota'] ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Lưu thay đổi</button>
                </form>
                <?php else: ?>
                    <div class="alert alert-warning">Không tìm thấy sản phẩm.</div>
                <?php endif; ?>

            </div>
        </div>
    </div>
</body>
</html>
