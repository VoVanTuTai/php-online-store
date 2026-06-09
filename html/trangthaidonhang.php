<?php
require_once("../class_models/class_control.php");
require_once("../config/class_database.php");
require_once("../class_models/class_user.php");

$x = new control();
if (!isset($_SESSION['user_id'])) {
    header("Location: dangnhap.php");
    exit();
}

$condata = new Database();
$conn = $condata->getConnection();
$user = new UserRegistration($condata);
$idNguoiDung = $_SESSION['user_id'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TRạng Thái Đơn Hàng</title>
    <!-- Boostrap CSS -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="../css/all.css">
    <link rel="stylesheet" href="../css/home.css">
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/> -->
    <!-- js -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container-fluid" style="background-color: white;">  
     <!--Container chứa toàn bộ trang-->
        <!-- Phần logo -->
        <nav class="navbar navbar-expand-sm navbar-dark" style="background-color: #e0dcd0;">
            <div class="col-5" style="display: flex;">
                <img src="../images_sanpham/logo_webb.jpg" alt style="width: 150px;">
                <h1 style="margin-top: 50px;">
                    <span style="color: rgba(20, 138, 2, 0.851);">SONG TÀI
                    </i></span><span style="color: black;" >FOOD <i class="fas fa-seedling"></i></span>
                </h1>
                </div>
            <div class="col-2">
                <form method="GET" action="../html/store.php" class="d-flex">
                    <input class="form-control" type="text" name="search" placeholder="Nhập tên sản phẩm..." required>
                    <button class="btn" type="submit" style="background-color: rgba(20, 138, 2, 0.851);">Tìm</button>
                </form>
            </div>
            <div class="col-3 text-end m-5">
                <?php
                    $x->control_button();
                ?>
            </div>
            <div class="col-2">
                <ul id="top-social-media">
                    <li class="list-inline-item "><a href="#"><i class="fab fa-facebook"></i></a></li>
                    <li class="list-inline-item "><a href="#"><i class="fab fa-instagram"></i></a></li>
                    <li class="list-inline-item "><a href="#"><i class="fab fa-tiktok"></i></a></li>
                    <li class="list-inline-item "><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                </ul>
            </div>
        </nav>
        <!-- Phần thanh menu -->
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                    <ul class="navbar-nav ps-5"> 
                        <li class="nav-item border-end ms-5 pe-5 ps-5"> <a class="nav-link active" href="../html/home.php">Trang Chủ <i class="fas fa-home"></i></a></li>
                        <li class="nav-item border-end ms-5 pe-5"><a class="nav-link active" href="../html/store.php">Cửa Hàng <i class="fas fa-store"></i></a></li>
                        <li class="nav-item border-end ms-5 pe-5"><a class="nav-link active" href="../html/giohang.php">Giỏ hàng <i class="fa-solid fa-cart-shopping"></i></a></li>
                        <li class="nav-item border-end ms-5 pe-5"><a class="nav-link active" href="../html/thanhToan.php">Thanh Toán <i class="fa-solid fa-money-check-dollar"></i></a></li>
                        <li class="nav-item border-end ms-5 pe-5"><a class="nav-link active" href="../html/lienHe.php">Giới thiệu <i class="fa-solid fa-info-circle"></i></a></li>
                        <li class="nav-item  ms-5 pe-5"><a class="nav-link active" href="../html/baiViet.php">Bài viết</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Phần thanh menu -->
        <!-- Phần nội dung -->
            <!-- GIAO DIỆN TRẠNG THÁI ĐƠN HÀNG -->
            <div class="container mt-5">
            <h2 class="text-center mb-4">Trạng thái đơn hàng</h2>
            <?php
        // Truy vấn danh sách đơn hàng
        $stmt = $conn->prepare("
            SELECT iddonhang, ngaydat, tongtien, trangthai, trangthai_thanhtoan, diachi, lydo
            FROM donhang0
            WHERE idnguoidung = ?
            ORDER BY ngaydat DESC
        ");
        $stmt->bind_param("i", $idNguoiDung);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo '<div class="table-responsive">';
            echo '<table class="table table-bordered table-hover">';
            echo '<thead class="table-dark">';
            echo '<tr>';
            echo '<th>Mã Đơn Hàng</th>';
            echo '<th>Ngày Đặt</th>';
            echo '<th>Sản Phẩm</th>';
            echo '<th>Tổng Tiền</th>';
            echo '<th>Trạng Thái</th>';
            echo '<th>Lý do</th>';
            echo '<th>Thanh Toán</th>';
            echo '<th>Địa chỉ</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';

            while ($order = $result->fetch_assoc()) {
                // Truy vấn chi tiết đơn hàng
                $stmt_detail = $conn->prepare("
                    SELECT sp.tensp, ctdh.soluong
                    FROM chitietdonhang0 ctdh
                    JOIN sanpham sp ON ctdh.idsp = sp.idsp
                    WHERE ctdh.iddonhang = ?
                ");
                $stmt_detail->bind_param("i", $order['iddonhang']);
                $stmt_detail->execute();
                $result_detail = $stmt_detail->get_result();

                // Tạo danh sách sản phẩm
                $products = [];
                while ($detail = $result_detail->fetch_assoc()) {
                    $products[] = $detail['tensp'] . " (x" . $detail['soluong'] . ")";
                }
                $stmt_detail->close();

                echo '<tr>';
                echo '<td>#' . htmlspecialchars($order['iddonhang']) . '</td>';
                echo '<td>' . htmlspecialchars($order['ngaydat']) . '</td>';
                echo '<td>' . implode("<br>", array_map('htmlspecialchars', $products)) . '</td>';
                echo '<td>' . number_format($order['tongtien'], 0, ',', '.') . ' VND</td>';
                echo '<td>' . htmlspecialchars($order['trangthai']) . '</td>';
                echo '<td>' . htmlspecialchars($order['lydo']) . '</td>';
                echo '<td>' . htmlspecialchars($order['trangthai_thanhtoan']) . '</td>';
                echo '<td>' . htmlspecialchars($order['diachi']) . '</td>';
                echo '</tr>';
            }

            echo '</tbody>';
            echo '</table>';
            echo '</div>';
        } else {
            echo '<div class="alert alert-info text-center">';
            echo '<p>Bạn chưa có đơn hàng nào.</p>';
            echo '<a href="../html/store.php" class="btn btn-success">Mua sắm ngay</a>';
            echo '</div>';
        }
        $stmt->close();
        ?>

            </div>
    <!-- foooter start -->
        <div id="footer" class="mt-5 w-100">
            <div class="container">
                <div id="footer-main">
                    <div class="row">
                        <!-- giới thiệu -->
                        <div class="col-md-5 mt-3 ">
                            <div class="cty-name">
                                <a href="../html/home.php"><img src="../images_sanpham/logo_webb.jpg" style="width: 70px;" alt="logo"></a>
                                <span class="ten-cty"> CÔNG TY TTHH SONG TÀI FOOD  </span>
                            </div>
                            <div class="cty-about mt-2">
                                <span class="contact-icon">
                                <span><i class="fa-solid fa-bookmark"></i></span>
                                </span>
                                <div class="contact-detail">
                                    Chuyên cung cấp các sản phẩm về thực phẩm khô chất lượng cao. Đồng hành cùng bếp ăn của bạn
                                </div>
                            </div>
                            <div class="cty-muc-dich mt-2">
                                <span class="contact-icon"><i class="fa-solid fa-school"></i></span>
                                <div class="contact-detail">Đây là dự án bài tập lớn của môn Phát Triển Ứng Dụng Web. Thực hiện viết và xây dựng lên website bán hàng. Mọi hình ảnh và sản phẩm trong website chỉ mang tính thử nghiệm, không mang tính chất thương mại.</div>
                            </div>
                        </div>
                        <!-- liên hệ -->
                        <div class="col-md-3 mt-3">
                            <div class="cty-title-contact"><span class="ten-cty">Liên hệ</span></div>
                            <div class="cty-address mt-2">
                                <span class="contact-icon"><i class="fa-solid fa-location-dot"></i></span>
                                <div class="contact-detail"> Địa chỉ: 12 Nguyễn Văn Bảo, Phường 4, Quận Gò Vấp, TP.HCM</div>
                            </div>
                            <div class="cty-tel mt-2">
                                <span class="contact-icon"><i class="fa-solid fa-phone"></i></span>
                                <div class="contact-detail"><a href="tel:+028 123 4567">Điện thoại: +028 999 9999</a></div>
                            </div>
                            <div class="cty-mail mt-2">
                                <span class="contact-icon"><i class="fa-solid fa-envelope"></i></span>
                                <div class="contact-detail"><a href="mailto:songtaifood.com">Email: cskh@songtai.com</a></div>
                            </div>
                            <div class="cty-web mt-2">
                                <span class="contact-icon"><i class="fa-solid fa-globe"></i></span>
                                <div class="contact-detail"><a href="">Website: www.songtaifood.com</a></div>
                            </div>
                        </div>
                        <!-- Theo dõi chúng tôi -->
                        <div class="col-md-4 mt-3">
                            <div class="cty-follow-us mb-3">
                                <span class="ten-cty mb-2">Tương tác với chúng tôi</span>
                                <ul id="bottom-social-media" class="font-size-lagre">
                                    <li class="list-inline-item mx-2"><a href="#"><i class="fab fa-facebook"></i></a></li>
                                    <li class="list-inline-item mx-2"><a href="#"><i class="fab fa-instagram"></i></a></li>
                                    <li class="list-inline-item mx-2"><a href="#"><i class="fab fa-tiktok"></i></a></li>
                                    <li class="list-inline-item mx-2"><a href="#"><i class="fab fa-youtube"></i></a></li>
                                </ul>
                            </div>
                            <div class="mb-3">
                                <span class="ten-cty my-2">Phương thức thanh toán</span>
                                <ul class="nav">
                                    <li class="mx-1"><img src="../images_sanpham/payment_1_img.webp" alt=""></li>
                                    <li class="mx-1"><img src="../images_sanpham/payment_2_img.webp" alt=""></li>
                                    <li class="mx-1"><img src="../images_sanpham/payment_3_img.webp" alt=""></li>
                                </ul>
                            </div>
                            <div class="mb-3">
                                <span class="ten-cty my-2">Phương thức vận chuyển</span>
                                <ul class="nav">
                                    <li class="mx-1"><img src="../images_sanpham/shipment_1_img.webp" alt=""></li>
                                    <li class="mx-1"><img src="../images_sanpham/shipment_2_img.webp" alt=""></li>
                                    <li class="mx-1"><img src="../images_sanpham/shipment_3_img.webp" alt=""></li>
                                    <li class="mx-1"><img src="../images_sanpham/shipment_4_img.webp" alt=""></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>            
            </div>
        </div>
</div> <!-- Container full -->  
</body>
</html>