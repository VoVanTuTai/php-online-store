<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../html/dangnhap.php");
    exit();
}
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
                <a href="../admin/admin_postbaiviet.php"><button>Thêm bài viết</button></a>
                <a href="../admin/admin_thongke.php"><button>Thống kê doanh thu</button></a>
            </div>
            <div class="col-md-9 mt-1">
                <div class="form-container">
                    <h3 class="text-center mb-2">THÔNG TIN BÀI VIẾT</h3>
                    <form method="POST" enctype="multipart/form-data">
                        <div class="mb-2">
                            <label class="form-label">Tiêu đề bài viết:</label>
                            <textarea name="tieudebaiviet" class="form-control"></textarea>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Mở đầu bài viết:</label>
                            <textarea name="modaubaiviet" class="form-control"></textarea>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Nội dung bài viết:</label>
                            <textarea name="noidungbaiviet" class="form-control"></textarea>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Kết luận bài viết:</label>
                            <textarea name="ketluanbaiviet" class="form-control"></textarea>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Hình ảnh mô tả:</label>
                            <input type="file" name="hinhmota" class="form-control">
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Liên kết với sản phẩm:</label>
                            <textarea name="lienket" class="form-control"></textarea>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-success"name="submit_baiviet">Thêm</button>
                            <button type="reset" class="btn btn-secondary">Làm lại</button>
                        </div>
                            <?php
                            require_once '../config/class_database.php';
                            require_once '../class_models/class_admin.php';

                            // Kiểm tra khi submit form
                            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_baiviet'])) {
                                $db = new Database();
                                $conn = $db->getConnection();
                                $baiviet = new Admin($db); // class BaiViet chứa phương thức postBaiViet()

                                $message = $baiviet->postBaiViet($_POST, $_FILES); // Gọi hàm thêm bài viết

                                echo "<script>alert('$message');</script>"; // Hiển thị thông báo
                            }
                            ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
