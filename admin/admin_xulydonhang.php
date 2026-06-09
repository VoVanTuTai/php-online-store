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
                <a href="../admin/admin_postbaiviet.php"><button>Thêm bài viết</button></a>
                <a href="../admin/admin_thongke.php"><button>Thống kê doanh thu</button></a>
            </div>
            <div class="col-md-10 mt-1">
                <div class="form-container">
                <?php
                    require_once '../config/class_database.php';
                    require_once '../class_models/class_admin.php';

                    $db = new Database();
                    $conn = $db->getConnection();
                    $admin = new Admin($db);

                    // Xử lý xác nhận
                    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && isset($_POST['iddonhang'])) {
                        $iddonhang = intval($_POST['iddonhang']); // Ép kiểu an toàn
                    
                        if ($_POST['action'] === 'xacnhan') {
                            $stmt = $conn->prepare("UPDATE donhang0 SET trangthai = 'Đã xác nhận' WHERE iddonhang = ?");
                            $stmt->bind_param("i", $iddonhang);
                            $stmt->execute();
                            if ($_POST['action'] === 'xacnhan') {
                                $stmt = $conn->prepare("UPDATE donhang0 SET trangthai = 'Đã xác nhận' WHERE iddonhang = ?");
                                $stmt->bind_param("i", $iddonhang);
                                $stmt->execute();
                            
                                // Lấy danh sách sản phẩm trong đơn hàng
                                $stmt = $conn->prepare("SELECT idsp, soluong FROM chitietdonhang0 WHERE iddonhang = ?");
                                $stmt->bind_param("i", $iddonhang);
                                $stmt->execute();
                                $result = $stmt->get_result();
                            
                                while ($row = $result->fetch_assoc()) {
                                    $idsanpham = $row['idsp'];
                                    $soluong = $row['soluong'];
                            
                                    // Giảm số lượng tồn kho và tăng số lượng đã bán
                                    $stmt_update = $conn->prepare("UPDATE sanpham SET soluongton = soluongton - ?, daban = daban + ? WHERE idsp = ?");
                                    $stmt_update->bind_param("iii", $soluong, $soluong, $idsanpham);
                                    $stmt_update->execute();
                                }
                            }
                            
                    
                        } elseif ($_POST['action'] === 'tuchoi' && isset($_POST['lydo'])) {
                            $lydo = trim($_POST['lydo']);
                            $stmt = $conn->prepare("UPDATE donhang0 SET trangthai = 'Đã từ chối', lydo = ? WHERE iddonhang = ?");
                            $stmt->bind_param("si", $lydo, $iddonhang);
                            $stmt->execute();
                    
                        } elseif ($_POST['action'] === 'capnhatthanhtoan' && isset($_POST['trangthai_thanhtoan'])) {
                            $trangthai = $_POST['trangthai_thanhtoan'];
                            $stmt = $conn->prepare("UPDATE donhang0 SET trangthai_thanhtoan = ? WHERE iddonhang = ?");
                            $stmt->bind_param("si", $trangthai, $iddonhang);
                            $stmt->execute();
                        }
                    }
                    // Gọi hàm hiển thị danh sách
                    $admin->hienThiDonHangChuaXacNhan();
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
