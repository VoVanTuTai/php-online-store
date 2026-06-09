<?php
    include("../class_models/class_control.php");
    $x = new control();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liên Hệ</title>
    <!-- Boostrap CSS -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="../css/all.css">
    <link rel="stylesheet" href="../css/home.css">
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

        <!--Nội dung trang-->
        <style>
            .custom-table {
                font-size: 1.1rem;
                border-radius: 12px;
                overflow: hidden;
            }

            .custom-table thead th {
                background-color: #198754 !important;
                color: white;
                font-size: 1.2rem;
            }

            .custom-table tbody td {
                vertical-align: middle;
                font-weight: 500;
            }

            .custom-table tbody tr:hover {
                background-color: #f1fdf3;
                transition: 0.3s;
            }

            .custom-table td,
            .custom-table th {
                padding: 16px 12px !important;
            }
        </style>

        <div class="container mt-5">
            <h3 class="text-center mb-4 fw-bold text-success">📋 Danh sách thành viên nhóm</h3>
            <div class="table-responsive">
                <table class="table table-bordered table-hover shadow custom-table text-center">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>👤 Họ tên</th>
                            <th>🎓 Mã sinh viên</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>🧑‍💻 Võ Văn Tú Tài</td>
                            <td>22655911</td>
                            
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>🧑‍💻 Trần Tấn Tài</td>
                            <td>22727771</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>🧑‍💻 Hứa Minh Khương</td>
                            <td>22700971</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>👩‍💻 Trần Thị Bích Phượng</td>
                            <td>21060651</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="bg-light p-4 rounded shadow mt-5">
                <h5 class="text-success fw-bold mb-3">📝 Giới thiệu đề tài về SongTaiFood</h5>
                <p class="fs-5 text-justify">
                    Trong thời đại công nghệ số phát triển mạnh mẽ, việc ứng dụng thương mại điện tử vào hoạt động kinh doanh ngày càng trở nên phổ biến và cần thiết. Đề tài 
                    <strong>"Xây dựng website bán thực phẩm khô"</strong> được thực hiện nhằm đáp ứng nhu cầu mua sắm trực tuyến của người tiêu dùng, đặc biệt trong lĩnh vực thực phẩm – một ngành thiết yếu trong đời sống hằng ngày.
                </p>
                <p class="fs-5 text-justify">
                    Trang web được thiết kế với giao diện thân thiện, dễ sử dụng, cho phép người dùng dễ dàng tìm kiếm, đặt hàng và thanh toán các sản phẩm thực phẩm khô như: hạt điều, cá khô, mực khô, trái cây sấy, ngũ cốc... Ngoài ra, hệ thống quản trị cho phép quản lý sản phẩm, đơn hàng, và theo dõi doanh thu một cách thuận tiện, giúp chủ cửa hàng tiết kiệm thời gian và nâng cao hiệu quả kinh doanh.
                </p>
                <p class="fs-5 text-justify mb-0">
                    Việc xây dựng website không chỉ mang tính chất học thuật mà còn hướng đến khả năng ứng dụng thực tế cao, góp phần thúc đẩy hoạt động kinh doanh trực tuyến trong lĩnh vực nông sản và thực phẩm sạch.
                </p>
            </div>
        </div>


        <!--Nội dung trang-->

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