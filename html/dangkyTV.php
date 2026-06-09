<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Ký Thành Viên - Song Tài Food</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/all.css">
    <link rel="stylesheet" href="../css/home.css">
    <style>
        span
        {
            color: red;
        }
    </style>
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <!-- Bootstrap JavaScript -->
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script> 
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
                <a href="../html/dangnhap.php"><button type="button" class="btn btn-success">Đăng nhập thành viên</button></a>
                <a href="../html/dangkyTV.php"><button type="button" class="btn btn-success">Đăng kí thành viên</button></a>
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
        <!-- RForm Đăng ký -->
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <h2 class="text-center mb-4">Đăng ký thành viên</h2>
                    <form method="POST">
                        <div class="mb-3">
                            <label for="name" class="form-label">Tên đăng nhập:<span id="loi_name">(*)</span></label>
                            <input type="text" class="form-control" name="name" id="name" onblur="ktname()" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Mật khẩu:<span id="loi_mk">(*)</span></label>
                            <input type="password" class="form-control" name="password" id="password" onblur="kt_mk()" required>
                        </div>
                        <div class="mb-3">
                            <label for="confirmPassword" class="form-label">Xác nhận mật khẩu:<span id="loi_nlmk">(*)</span></label>
                            <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" onblur="kt_nlmk()" required>
                        </div>
                        <div class="mb-3">
                            <label for="hoten" class="form-label">Họ tên người dùng:<span>(*)</span></label>
                            <input type="text" class="form-control" name="hoten" id="hoten" required>
                        </div>
                        <div class="mb-3">
                            <label for="ngsinh" class="form-label">Ngày sinh:<span>(*)</span></label>
                            <input type="date" class="form-control" name="ngsinh" id="ngsinh" required>
                        </div>
                        <div class="mb-3">
                            <p>Giới tính:<span >(*)</span></p>
                            <label for="nam">Nam</label> 
                            <input type="radio" name="gioitinh" id="nam" value="Nam">
                            <label for="nu">Nữ</label> 
                            <input type="radio" name="gioitinh" id="nu" value="Nữ">                          
                        </div>
                        <div class="mb-3">
                            <label for="diachi" class="form-label">Địa chỉ:</label>
                            <input type="text" class="form-control" name="diachi" id="diachi">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email:<span id="loi_email">(*)</span></label>
                            <input type="email" class="form-control" name="email" id="email" onblur="kt_email()" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Số điện thoại:<span id="loi_sdt">(*)</span></label>
                            <input type="tel" class="form-control" name="phone" id="phone" onblur="kt_sdt()" required>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-success" name="register">Đăng ký</button>
                        </div>
                        <?php
                            require_once '../class_models/class_user.php'; // Nhúng file chứa class UserRegistration
                            require_once '../config/class_database.php';
                            // Xử lý khi form được submit
                            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
                                $condata = new Database();
                                $registration = new UserRegistration($condata);
                                $message = $registration->registerUser($_POST);

                                // Hiển thị thông báo và điều hướng
                                echo "<script>alert(" . json_encode($message, JSON_UNESCAPED_UNICODE) . ");</script>";
                            }
                        ?>
                    </form>
                </div>
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
    <script>
        function kt_name() {
                var name = document.getElementById('name').value;
                // Biểu thức chính quy chỉ cho phép chữ và số, không có dấu cách hoặc ký tự đặc biệt
                var regex = /^[A-Za-z0-9]+$/;

                if (!regex.test(name)) {
                    document.getElementById('loi_name').innerHTML = "Tên đăng nhập không được chứa kí tự đặc biệt!"
                } else {
                   document.getElementById('loi_name').innerHTML = "(*)"
                }
            }
        function kt_email(){
                var email = document.getElementById('email').value;
                var regex =  /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
                if(!regex.test(email)){
                    document.getElementById('loi_email').innerHTML = "Email không đúng định dạng!"
                } else {
                    document.getElementById('loi_email').innerHTML = "(*)"
                }
            }
        function kt_sdt(){
                var sdt = document.getElementById('phone').value;
                var regex = /^(0|\+84)[3-9][0-9]{8}$/;
                if(!regex.test(sdt)){
                    document.getElementById('loi_sdt').innerHTML = "Số điện thoại không hợp lệ!"
                } else {
                    document.getElementById('loi_sdt').innerHTML = "(*)"
                }
            }
        function kt_mk(){
                var mk = document.getElementById('password').value;
                var regex = /^[A-Za-z0-9]{6,}$/;
                if(!regex.test(mk)){
                    document.getElementById('loi_mk').innerHTML = "Mật khẩu phải có ít nhất 6 ký tự!"
                } else {
                    document.getElementById('loi_mk').innerHTML = "(*)"
                }
            }
        function kt_nlmk(){
                var mk = document.getElementById('password').value;
                var nlmk = document.getElementById('confirmPassword').value;
                if(mk == nlmk){
                    document.getElementById('loi_nlmk').innerHTML = "(*)"
                } else {
                    document.getElementById('loi_nlmk').innerHTML = "Mật khẩu không khớp!"
                }
            }
    </script>
</body>
</html>
