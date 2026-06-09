<?php
    include("../class_models/class_control.php");
    $x = new control();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
    <!-- Boostrap CSS -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="../css/all.css">
    <link rel="stylesheet" href="../css/home.css">
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
          
          <div class="container mt-4">
          <div class="row">
          <?php
            if (isset($_GET['idsp'])) {
                $idsp = intval($_GET['idsp']);
                require_once '../config/class_database.php';
                $condata = new Database();
                $conn = $condata->getConnection();
                $sql = "SELECT * FROM sanpham WHERE idsp = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $idsp);
                $stmt->execute();
                $result = $stmt->get_result();
                if ($row = $result->fetch_assoc()) {
            ?>
        <div class="col-md-6">
            <img src="../images_sanpham/<?php echo htmlspecialchars($row['hinh']); ?>" style ="margin-left:300px; width:200px" class="img-fluid rounded shadow" alt="<?php echo htmlspecialchars($row['tensp']); ?>">
            
        </div>
        <div class="col-md-6">
            <form method="post" action="">
                <h2><?php echo htmlspecialchars($row['tensp']); ?></h2>

                <!-- Đánh giá + tồn kho -->
                <div class="mb-2">
                    ★★★★★ <span class="text-muted">(4.8/5 - 120 đánh giá)</span>
                    <p class="text-success">Đã bán: <strong><?php echo $row['daban']; ?></strong> sản phẩm</p>
                    <p class="text-warning">Còn lại: <strong><?php echo $row['soluongton']; ?></strong> sản phẩm</p>
                </div>

                <!-- Giá -->
                <p class="fs-4 text-danger fw-bold">Giá: <?php echo number_format($row['gia'], 0, ',', '.'); ?> VND</p>

                <!-- Số lượng -->
                <div class="input-group mb-3" style="max-width: 200px;">
                    <input name="soluong" type="number" class="form-control text-center" id="quantity">
                </div>

                <!-- Hidden inputs -->
                <input type="hidden" name="idsp" value="<?php echo $row['idsp']; ?>">
                <!-- Nút Thêm vào giỏ -->
                <input type="submit" name="them" value="Thêm vào giỏ hàng" class="btn btn-primary w-50">
            </form>
            <form method="post" action="">
                <!-- Input ẩn để gửi ID sản phẩm -->
                <input type="hidden" name="idsp" value="<?php echo $row['idsp']; ?>">
            </form>
            <?php
                include('../class_models/class_user.php');
                require_once '../config/class_database.php';
                $condata = new Database(); // tạo object từ class database
                $conn = $condata->getConnection(); // lấy kết nối
                $user = new UserRegistration($condata); // truyền object database vào constructor
                if (isset($_POST['them'])) {
                    if (!isset($_SESSION['user_id'])) {
                        echo'Hãy đăng nhập để thềm vào giỏ hàng';
                        exit();
                    }
                    // Lấy ID sản phẩm từ POST request
                    $idsp = isset($_POST['idsp']) ? (int)$_POST['idsp'] : 0; 

                    // Kiểm tra nếu idsp hợp lệ
                    if ($idsp > 0) {
                        // Lấy số lượng sản phẩm từ POST request, mặc định là 1 nếu không có
                        $soluong = isset($_POST['soluong']) ? (int)$_POST['soluong'] : 1;
                        $idnguoidung = $_SESSION['user_id'];
                        // Gọi phương thức thêm vào giỏ hàng
                        echo $user->themvaogiohang($idnguoidung, $idsp, $soluong);
                    } else {
                        $message = "Invalid product ID.";
                    }
                }
                ?>
        </div>
        <div class="row">
            <div class="col-md-6">
            <h3 class="text-success">Description</h3>
            <p class="text-secondary"><?php echo nl2br(htmlspecialchars($row['mota'])); ?></p>
            </div>
        </div>
        <?php
            } else {
                echo "<p>Không tìm thấy sản phẩm</p>";
            }
        } else {
            echo "<p>Không có sản phẩm được chọn</p>";
        }
        ?>
        </div>
          </div>
<script>
function decreaseQuantity() {
    let qty = document.getElementById('quantity');
    let value = parseInt(qty.value);
    if (value > 1) qty.value = value - 1;
}
function increaseQuantity() {
    let qty = document.getElementById('quantity');
    let value = parseInt(qty.value);
    qty.value = value + 1;
}
</script>

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