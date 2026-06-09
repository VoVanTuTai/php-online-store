<?php
    include("../class_models/class_control.php");
    $x = new control();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/all.css">
    <link rel="stylesheet" href="../css/home.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <script src="../bootstrap/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/home.css">
    </head>
    <body>
    <div class="container-fluid" style="background-color: white;">  
     <!--Container chứa toàn bộ trang-->
        <!-- Phần logo -->
        <nav class="navbar navbar-expand-sm navbar-dark" style="background-color: #e0dcd0;">
            <div class="col-5" style="display: flex;">
                <img src="../images_sanpham/logo_webb.jpg" alt style="width: 150px;">
                <h1 style="margin-top: 50px;">
                    <span style="color: rgba(20, 138, 2, 0.851);">SONG TÀI</i></span><span>FOOD <i class="fas fa-seedling"></i></span>
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
        <!-- Carousel -->
        <div id="demo" class="carousel slide" data-bs-ride="carousel">
            <!-- Indicators/dots -->
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
                <button type="button" data-bs-target="#demo" data-bs-slide-to="3"></button>
                <button type="button" data-bs-target="#demo" data-bs-slide-to="4"></button>
                </div>
                <!-- The slideshow/carousel -->
                <div class="carousel-inner">
                    <div class="carousel-item active"><img src="../images_sanpham/carou1.jpg" alt class="d-block w-100"></div>
                    <div class="carousel-item"><img src="../images_sanpham/carou2.jpg" alt class="d-block w-100"></div>
                    <div class="carousel-item"><img src="../images_sanpham/carou3.jpg" alt class="d-block w-100"></div>
                </div>
                <!-- Left and right controls/icons -->
                <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
            </div>
            <div class="row ms-1 me-1" style="background-color: rgba(20, 138, 2, 0.851); height: 100px; text-align: center; ">
                <div style="font-size: 40px; margin-top:20px; color: white;"
                    <h1> NƠI CUNG CẤP THỰC PHẨM KHÔ AN TOÀN CHẤT LƯỢNG HỢP VỆ SINH</h1>
                </div>
            </div>
            <!-- Nội dung chính cho trang chủ các sản phẩm bán chạy -->
            <div class="row" style="background-color:  #f9f9f4;;">
            <?php
                include_once '../config/class_database.php'; 
                $db = new Database();
                $conn = $db->getConnection();

                // Lấy 5 sản phẩm bán chạy
                $sql = "SELECT idsp, tensp, hinh, gia, daban FROM sanpham ORDER BY daban DESC LIMIT 5";
                $result = $conn->query($sql);
                ?>

                <div class="container my-5">
                    <h2 class="text-center fw-bold mb-4"><i class="bi bi-fire text-danger"></i> Top 5 Sản Phẩm Bán Chạy</h2>
                    <div class="row g-4 justify-content-center">
                        <?php while ($row = $result->fetch_assoc()): 
                            $imagePath = !empty($row['hinh']) ? "../images_sanpham/" . htmlspecialchars($row['hinh']) : "../images_sanpham/default.png";
                        ?>
                        <div class="col-lg-2 col-md-4 col-sm-6 col-10">
                            <a href="chitietsanpham.php?idsp=<?= $row['idsp'] ?>" class="text-decoration-none text-dark">
                                <div class="card product-card border-0 shadow-sm h-100">
                                    <div class="product-img-wrapper">
                                        <img src="<?= $imagePath ?>" class="card-img-top" alt="<?= htmlspecialchars($row['tensp']) ?>">
                                    </div>
                                    <div class="card-body text-center">
                                        <h6 class="card-title fw-semibold text-truncate"><?= htmlspecialchars($row['tensp']) ?></h6>
                                        <p class="text-danger fw-bold mb-1"><?= number_format($row['gia'], 0, ',', '.') ?> VND</p>
                                        <p class="text-muted small">Đã bán: <?= $row['daban'] ?></p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <?php endwhile; ?>
                    </div>
                </div>

            </div>
            <!-- dich vu congty start -->
            <div class="container-fluid my-4" id="dichvucongty">

                <div class="row">
                    <div
                        class="col-lg-3 col-md-3 col-sm-6 col-6 my-2 px-2 text-center">
                        <div class="card">
                            <div class="card-body">
                                <i class="fa-solid fa-truck-fast"></i>
                                <h5>Miễn phí vận chuyển</h5>
                                <p>Chúng tôi cung cấp dịch vụ vận chuyển miễn
                                    phí trong nội thành để mang đến sự tiện lợi
                                    và
                                    tiết kiệm cho quý khách hàng.</p>
                            </div>
                        </div>
                    </div>
                    <div
                        class="col-lg-3 col-md-3 col-sm-6 col-6 my-2 px-2 text-center">
                        <div class="card">
                            <div class="card-body">
                                <i class="fa-solid fa-headset"></i>
                                <h5>Tư vấn 24/7</h5>
                                <p>Đội ngũ chăm sóc khách hàng của chúng tôi
                                    luôn sẵn sàng tư vấn và hỗ trợ bạn 24/7, bất
                                    kể
                                    thời điểm nào trong ngày.</p>
                            </div>
                        </div>
                    </div>
                    <div
                        class="col-lg-3 col-md-3 col-sm-6 col-6 my-2 px-2 text-center">
                        <div class="card">
                            <div class="card-body">
                                <i class="fa-solid fa-medal"></i>
                                <h5>Sản phẩm chất lượng</h5>
                                <p>Chúng tôi cam kết cung cấp các sản phẩm chất
                                    lượng cao, đảm bảo sự an toàn và đáp ứng
                                    được
                                    các tiêu chuẩn về chất lượng và hiệu
                                    suất.</p>
                            </div>
                        </div>
                    </div>
                    <div
                        class="col-lg-3 col-md-3 col-sm-6 col-6 my-2 px-2 text-center">
                        <div class="card">
                            <div class="card-body">
                                <i class="fa-solid fa-ticket"></i>
                                <h5>Nhiều ưu đãi khuyến mãi</h5>
                                <p>Chúng tôi thường xuyên có nhiều chương trình
                                    ưu đãi và khuyến mãi hấp dẫn, giúp bạn tiết
                                    kiệm
                                    chi phí mua sắm và có được những sản phẩm
                                    tốt nhất.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- dich vu cty end -->
            <div class="container-fluid my-4" id="list-icon-category">
                <h3 class="display-4">DANH MỤC</h3>
                <div class="row p-2">
                    <div class="col col-lg col-md-4 col-sm-4 col-4 my-1 px-1">
                    <a href="store.php?category=granola" class="list-group-item list-group-item-action <?= ($category == 'granola') ? 'active' : '' ?>">
                            <div class="home-category">
                                <div class="home-category-img">
                                    <img class="img-fluid" src="../images_sanpham/granola.jfif" alt>
                                </div>
                                <div class="home-category-title text-center">
                                    <span>Hạt Granola</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col col-lg col-md-4 col-sm-4 col-4 my-1 px-1">
                    <a href="store.php?category=hatcacloai" class="list-group-item list-group-item-action <?= ($category == 'hatcacloai') ? 'active' : '' ?>">
                            <div class="home-category">
                                <div class="home-category-img">
                                    <img class="img-fluid" src="../images_sanpham/danhmuc_hatdieu.jfif">
                                </div>
                                <div class="home-category-title text-center">
                                    <span>Hạt các loại</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col col-lg col-md-4 col-sm-4 col-4 my-1 px-1">
                    <a href="store.php?category=ngucoc" class="list-group-item list-group-item-action <?= ($category == 'ngucoc') ? 'active' : '' ?>">
                            <div class="home-category">
                                <div class="home-category-img">
                                    <img class="img-fluid" src="../images_sanpham/danhmuc_ngucoc.jfif" alt>
                                </div>
                                <div class="home-category-title text-center">
                                    <span>Ngũ cốc</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col col-lg col-md-4 col-sm-4 col-4 my-1 px-1">
                    <a href="store.php?category=dohop" class="list-group-item list-group-item-action <?= ($category == 'dohop') ? 'active' : '' ?>">
                            <div class="home-category">
                                <div class="home-category-img">
                                    <img class="img-fluid" src="../images_sanpham/danhmuc_dohop.jfif" alt>
                                </div>
                                <div class="home-category-title text-center">
                                    <span>Đồ hộp</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col col-lg col-md-4 col-sm-4 col-4 my-1 px-1">
                    <a href="store.php?category=migoi" class="list-group-item list-group-item-action <?= ($category == 'migoi') ? 'active' : '' ?>">
                            <div class="home-category">
                                <div class="home-category-img">
                                    <img class="img-fluid" src="../images_sanpham/danhmuc_migoi.jfif" alt="mbh_treem">
                                </div>
                                <div class="home-category-title text-center">
                                    <span>Mì gói</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col col-lg col-md-4 col-sm-4 col-4 my-1 px-1">
                    <a href="store.php?category=luongkho" class="list-group-item list-group-item-action <?= ($category == 'luongkho') ? 'active' : '' ?>">
                            <div class="home-category">
                                <div class="home-category-img">
                                    <img class="img-fluid"
                                        src="../images_sanpham/danhmuc_luongkho.jfif"
                                        alt="mbh_xedap">
                                </div>
                                <div class="home-category-title text-center">
                                    <span>Các loại lương khô</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col col-lg col-md-4 col-sm-4 col-4 my-1 px-1">
                    <a href="store.php?category=cacloaikho" class="list-group-item list-group-item-action <?= ($category == 'cacloaikho') ? 'active' : '' ?>">
                            <div class="home-category">
                                <div class="home-category-img">
                                    <img src="../images_sanpham/danhmuc_khoga.jfif"
                                        alt="mbh_kinh">
                                </div>
                                <div class="home-category-title text-center">
                                    <span>Các loại khô</span>
                                </div>
                            </div>
                        </a>
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