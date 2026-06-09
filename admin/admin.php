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
                <a href="../admin/admin_quanlisanpham.php"><button>Quản lí sản phẩm</button></a>
                <a href="../admin/admin_postbaiviet.php"><button>Thêm bài viết</button></a>
                <a href="../admin/admin_thongke.php"><button>Thống kê doanh thu</button></a>
            </div>
            <div class="col-md-9 mt-1">
                <div class="form-container">
                    <h3 class="text-center mb-2">THÔNG TIN SẢN PHẨM</h3>
                    <form method="POST" enctype="multipart/form-data">
                        <div class="mb-2">
                            <label class="form-label">Tên sản phẩm</label>
                            <input type="text" name="ten_sanpham" class="form-control">
                        </div>
                        <div class="mb-2">
                            <label for="loaisp" class="form-label">Loại sản phẩm</label>
                            <select class="form-select" id="loaisp" name="loai_sanpham" required>
                                <option value="">-- Chọn loại sản phẩm --</option>
                                <option value="granola">Granola</option>
                                <option value="hatcacloai">Các loại hạt</option>
                                <option value="cacloaikho">Các loại khô</option>
                                <option value="luongkho">Lương khô</option>
                                <option value="ngucoc">Ngũ cốc</option>
                                <option value="luongkho">Lương khô</option>
                                <option value="migoi">Mì gói</option>
                            </select>
                        </div>

                        <div class="mb-2">
                            <label class="form-label">Giá</label>
                            <input type="text" name="gia" class="form-control">
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Mô tả</label>
                            <textarea name="mo_ta" class="form-control"></textarea>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Hình ảnh</label>
                            <input type="file" name="hinh_anh" class="form-control">
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Giảm giá</label>
                            <input type="text" name="giam_gia" class="form-control">
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Số lượng tồn</label>
                            <input type="text" name="so_luong_ton" class="form-control">
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Đã bán</label>
                            <input type="text" name="da_ban" class="form-control">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-success">Thêm</button>
                            <button type="reset" class="btn btn-secondary">Làm lại</button>
                        </div>
                        <?php
                            require_once '../config/class_database.php';
                            require_once '../class_models/class_admin.php';

                            $db = new Database();
                            $conn = $db->getConnection();
                            $sanPham = new Admin($db);

                            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                $message = $sanPham->insertSanPham($_POST, $_FILES);
                                echo "<script>alert('$message');</script>";
                            }
                            ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
