<?php
    include("../class_models/class_control.php");
    $x = new control();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store</title>

    <!-- Boostrap CSS -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="../css/all.css">
    <link rel="stylesheet" href="../css/store.css">
    <link rel="stylesheet" href="../css/home.css">
    <!-- js -->
    <script src="../js/jquery-3.5.1.slim.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/jquery-3.7.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/sanpham.js"></script>

    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <style>
    </style>
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
                    </i></span><span>FOOD <i class="fas fa-seedling"></i></span>
                </h1>
                </div>
            <div class="col-2">
                
                <form method="GET" action="" class="d-flex">
                    <input class="form-control" type="text" name="search" placeholder="Nhập tên sản phẩm...">
                    <button class="btn type=button" style="background-color: rgba(20, 138, 2, 0.851);">Tìm</button>
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
        <!--Phần hiển thị sản phẩm và danh mục sản phẩm -->
            <div class="container-fluid mt-4">
                <div class="row">
                    <div class="col-md-9 col-sm-12" id="section">
                    <?php
                        require_once '../config/class_database.php';
                        require_once '../class_models/class_sanpham.php';
                        $condata = new Database();
                        $conn = $condata->getConnection(); // Lấy kết nối cơ sở dữ liệu

                        $sanpham = new SanPham($condata);

                        if (isset($_GET['search'])) {
                            $keyword = $_GET['search'];
                            $products = $sanpham->timkiemsanpham( $keyword);
                            $sanpham->hienthisanphamtimkiem($products);
                        } 

                        // Xác định danh mục từ URL
                        $category = isset($_GET['category']) ? $_GET['category'] : null;

                        // Xác định trang hiện tại
                        $limit = 10;
                        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                        $offset = ($page - 1) * $limit;

                        // Lấy tổng số sản phẩm theo danh mục (nếu có)
                        $total_products = $sanpham->countProducts($category);
                        $total_pages = ($total_products > 0) ? ceil($total_products / $limit) : 1;

                        // Hiển thị danh sách sản phẩm có lọc theo danh mục
                        $sanpham->suatdssanpham($limit, $offset, $category);
                    ?>

                    
                     <!-- Thanh phân trang -->
                     <nav aria-label="Page navigation" style="margin-top: 700px">
                        <ul class="pagination justify-content-center mt-4">
                            <?php if ($page > 1): ?>
                                <li class="page-item">
                                    <a class="page-link" href="?page=<?= $page - 1 ?>&category=<?= urlencode($category) ?>">Trước</a>
                                </li>
                            <?php endif; ?>

                            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                                <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
                                    <a class="page-link" href="?page=<?= $i ?>&category=<?= urlencode($category) ?>"><?= $i ?></a>
                                </li>
                            <?php endfor; ?>

                            <?php if ($page < $total_pages): ?>
                                <li class="page-item">
                                    <a class="page-link" href="?page=<?= $page + 1 ?>&category=<?= urlencode($category) ?>">Tiếp</a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </nav>
                    <!-- Thanh phân trang -->
                    </div>     
                    <!-- Danh mục sản phẩm -->              
                    <div class="col-md-3 d-none d-sm-block" id="aside">
                            <div class="list-group" id="category-list-nav">
                                <h4>Danh mục sản phẩm</h4>
                                <a href="store.php" class="list-group-item list-group-item-action <?= empty($category) ? 'active' : '' ?>">Tất cả sản phẩm</a>
                                <a href="store.php?category=granola" class="list-group-item list-group-item-action <?= ($category == 'granola') ? 'active' : '' ?>">Hạt Granola</a>
                                <a href="store.php?category=hatcacloai" class="list-group-item list-group-item-action <?= ($category == 'hatcacloai') ? 'active' : '' ?>">Hạt các loại</a>
                                <a href="store.php?category=ngucoc" class="list-group-item list-group-item-action <?= ($category == 'ngucoc') ? 'active' : '' ?>">Ngũ cốc</a>
                                <a href="store.php?category=dohop" class="list-group-item list-group-item-action <?= ($category == 'dohop') ? 'active' : '' ?>">Đồ hộp</a>
                                <a href="store.php?category=luongkho" class="list-group-item list-group-item-action <?= ($category == 'luongkho') ? 'active' : '' ?>">Các loại lương khô</a>
                                <a href="store.php?category=cacloaikho" class="list-group-item list-group-item-action <?= ($category == 'cacloaikho') ? 'active' : '' ?>">Các loại khô</a>
                                <a href="store.php?category=migoi" class="list-group-item list-group-item-action <?= ($category == 'migoi') ? 'active' : '' ?>">Mì gói</a>
                            </div>
                    </div><!--Phần hiển thị sản phẩm và danh mục sản phẩm-->    
                </div>
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