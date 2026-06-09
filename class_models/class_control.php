<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . '/../config/class_database.php';

class control
{

    public function control_button()
    {
        if (isset($_SESSION['user_id'])) {
            // Nếu đã đăng nhập, hiển thị nút Đăng xuất
            echo '<a href="logout.php" class="btn btn-danger">Đăng xuất</a>';
        } else {
            // Nếu chưa đăng nhập, hiển thị nút Đăng ký và Đăng nhập
            echo '<a href="../html/dangnhap.php"><button type="button" style="margin-right:5px;" class="btn btn-success">Đăng nhập thành viên</button></a>';
            echo '<a href="../html/dangkyTV.php"><button type="button" class="btn btn-success">Đăng kí thành viên</button></a>';
        }
    }

    function control_admin($action) {
        switch ($action) {
            case 'donhang':
                echo "<h2>Quản lý đơn hàng</h2>";
                echo "<p>Chức năng xử lý đơn hàng sẽ được hiển thị tại đây.</p>";
                break;
            case 'sanpham':
                echo "<h2>Thêm sản phẩm</h2>";
                echo '
                    <div class="form-container">
                    <h3 class="text-center mb-2">THÔNG TIN SẢN PHẨM</h3>
                    <form method="POST" enctype="multipart/form-data">
                        <div class="mb-2">
                            <label class="form-label">Tên sản phẩm</label>
                            <input type="text" name="ten_sanpham" class="form-control">
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Loại sản phẩm</label>
                            <input type="text" name="loai_sanpham" class="form-control">
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
                    </form>
                </div>';
                break;
            case 'baiviet':
                echo "<h2>Thêm bài viết</h2>";
                echo "<p>Chức năng thêm bài viết.</p>";
                break;
            case 'thongke':
                echo "<h2>Thống kê doanh thu</h2>";
                echo "<p>Biểu đồ doanh thu sẽ hiển thị ở đây.</p>";
                break;
            default:
                echo "<h2>Chào mừng Admin</h2>";
                echo "<p>Chọn một chức năng từ menu bên trái.</p>";
                break;
        }
    }

}
?>
