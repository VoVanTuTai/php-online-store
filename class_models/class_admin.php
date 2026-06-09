<?php
    class Admin
    {
        private $conn;

        public function __construct($db) {
            $this->conn = $db->getConnection();
        }

        private function e($value) {
            return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
        }

        //HÀM POST THÊM SẢN PHẨM
        public function insertSanPham($data, $file) {
            try {
                // Lấy dữ liệu từ form
                $ten_sanpham = trim($data['ten_sanpham']);
                $loai_sanpham = trim($data['loai_sanpham']);
                $gia = floatval($data['gia']);
                $mo_ta = trim($data['mo_ta']);
                $giam_gia = floatval($data['giam_gia']);
                $so_luong_ton = intval($data['so_luong_ton']);
                $da_ban = intval($data['da_ban']);
        
                // Kiểm tra dữ liệu rỗng
                if (empty($ten_sanpham) || empty($loai_sanpham) || empty($gia) || empty($so_luong_ton)) {
                    return "Vui lòng điền đầy đủ thông tin sản phẩm!";
                }
    
                // Kiểm tra sản phẩm đã tồn tại chưa
                $sql_check = "SELECT COUNT(*) AS count FROM sanpham WHERE tensp = ? AND loaisp = ?";
                $stmt_check = $this->conn->prepare($sql_check);
                $stmt_check->bind_param("ss", $ten_sanpham, $loai_sanpham);
                $stmt_check->execute();
                $result = $stmt_check->get_result();
                $row = $result->fetch_assoc();
                $count = $row['count'];
                $stmt_check->close();
    
    
                if ($count > 0) {
                    return "Sản phẩm đã tồn tại!";
                }
    
                // Kiểm tra ảnh
                if (empty($file["hinh_anh"]["name"])) {
                    return "Không có file ảnh nào được tải lên!";
                }
    
                // Thư mục lưu ảnh
                $targetDir = "../images_sanpham/";
                // Xử lý tên file ảnh
                $fileName = basename($file["hinh_anh"]["name"]);
                $fileName = preg_replace("/[^a-zA-Z0-9\._-]/", "_", $fileName);
                $fileType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

                // Kiểm tra định dạng file ảnh hợp lệ
                $allowTypes = ['jpg', 'jpeg', 'png', 'gif'];
                if (!in_array($fileType, $allowTypes)) {
                    return "Chỉ chấp nhận file ảnh có định dạng JPG, JPEG, PNG, GIF.";
                }

                if (getimagesize($file["hinh_anh"]["tmp_name"]) === false) {
                    return "File tải lên không phải là ảnh hợp lệ.";
                }

                $fileName = uniqid("product_", true) . "." . $fileType;
                $targetFilePath = $targetDir . $fileName;

                // Di chuyển file ảnh đến thư mục đích
                if (!move_uploaded_file($file["hinh_anh"]["tmp_name"], $targetFilePath)) {
                    return "Lỗi khi tải ảnh lên!";
                }
    
                // Thêm sản phẩm vào database
                $sql = "INSERT INTO sanpham (tensp, loaisp, gia, mota, hinh,  giamgia, soluongton, daban) 
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
                $stmt = $this->conn->prepare($sql);
                $stmt->bind_param("ssissiii", $ten_sanpham, $loai_sanpham, $gia, $mo_ta, $fileName, $giam_gia, $so_luong_ton, $da_ban);
        
                if ($stmt->execute()) {
                    $stmt->close();
                    return "Thêm sản phẩm thành công!";
                } else {
                    return "Lỗi khi thêm sản phẩm vào cơ sở dữ liệu!";
                }
            } catch (Exception $e) {
                return "Lỗi hệ thống: " . $e->getMessage();
            }
        }
        public function hienThiBangSanPham($conn) {
            $query = "SELECT idsp, tensp, loaisp, gia, giamgia, soluongton, daban FROM sanpham";
            $result = $conn->query($query);
            echo '<table class="table table-bordered table-striped">';
            echo '<thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Tên sản phẩm</th>
                        <th>Loại</th>
                        <th>Giá</th>
                        <th>Giảm giá</th>
                        <th>Số lượng tồn kho</th>
                        <th>Đã bán</th>
                        <th>Cập nhật</th>
                    </tr>
                  </thead>';
            echo '<tbody>';
        
            while ($row = $result->fetch_assoc()) {
                $idsp = (int) $row['idsp'];
                echo '<tr>
                        <td>' . $idsp . '</td>
                        <td>' . $this->e($row['tensp']) . '</td>
                        <td>' . $this->e($row['loaisp']) . '</td>
                        <td>' . number_format($row['gia'], 0, ',', '.') . ' đ</td>
                        <td>' . number_format($row['giamgia'], 0, ',', '.') . ' đ</td>
                        <td>' . (int) $row['soluongton'] . '</td>
                        <td>' . (int) $row['daban'] . '</td>
                        <td>
                            <a href="chinhsua_sanpham.php?id=' . $idsp . '" class="btn btn-sm btn-warning">Chỉnh sửa</a>
                            <form method="POST" action="xoa_sanpham.php" style="display:inline" onsubmit="return confirm(\'Bạn có chắc muốn xóa sản phẩm này?\')">
                                <input type="hidden" name="id" value="' . $idsp . '">
                                <button type="submit" class="btn btn-sm btn-danger">Xóa</button>
                            </form>
                        </td>
                      </tr>';
            }
            echo '</tbody></table>';
        }
        
        public function postBaiViet($data, $file) {
            try {
                // Lấy dữ liệu từ form
                $tieudebaiviet = trim($data['tieudebaiviet']);
                $modaubaiviet = trim($data['modaubaiviet']);
                $noidungbaiviet = trim($data['noidungbaiviet']);
                $ketluan = trim($data['ketluanbaiviet']);
                $lienket = trim($data['lienket']);
        
                // Kiểm tra dữ liệu rỗng
                if (empty($tieudebaiviet) || empty($modaubaiviet) || empty($noidungbaiviet) || empty($ketluan) || empty($lienket)) {
                    return "Vui lòng điền đầy đủ thông tin bài viết!";
                }
                // Kiểm tra bài viết đã tồn tại chưa
                $sql_check = "SELECT COUNT(*) AS count FROM baiviet WHERE tieudebaiviet = ?";
                $stmt_check = $this->conn->prepare($sql_check);
                $stmt_check->bind_param("s", $tieudebaiviet);
                $stmt_check->execute();
                $result = $stmt_check->get_result();
                $row = $result->fetch_assoc();
                $count = $row['count'];
                $stmt_check->close();
        
                if ($count > 0) {
                    return "Bài viết đã tồn tại!";
                }
        
                // Kiểm tra ảnh có được tải lên không
                if (empty($file["hinhmota"]["name"])) {
                    return "Không có file ảnh nào được tải lên!";
                }
        
                // Thư mục lưu ảnh (CẦN CHỈNH SỬA ĐÚNG ĐƯỜNG DẪN)
                $targetDir = "../images_baiviet/";
                // Xử lý tên file ảnh
                $fileName = basename($file["hinhmota"]["name"]);
                $fileName = preg_replace("/[^a-zA-Z0-9\._-]/", "_", $fileName);
                $fileType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

                // Kiểm tra định dạng file ảnh hợp lệ
                $allowTypes = ['jpg', 'jpeg', 'png', 'gif'];
                if (!in_array($fileType, $allowTypes)) {
                    return "Chỉ chấp nhận file ảnh có định dạng JPG, JPEG, PNG, GIF.";
                }

                if (getimagesize($file["hinhmota"]["tmp_name"]) === false) {
                    return "File tải lên không phải là ảnh hợp lệ.";
                }

                $fileName = uniqid("article_", true) . "." . $fileType;
                $targetFilePath = $targetDir . $fileName;

                // Di chuyển file ảnh đến thư mục đích
                if (!move_uploaded_file($file["hinhmota"]["tmp_name"], $targetFilePath)) {
                    return "Lỗi khi tải ảnh lên!";
                }
                // Thêm bài viết vào database
                $sql = "INSERT INTO baiviet (tieudebaiviet, mobai, thanbai, ketbai, lienket, hinhmota) 
                        VALUES (?, ?, ?, ?, ?, ?)";
                $stmt = $this->conn->prepare($sql);
                $stmt->bind_param("ssssss", $tieudebaiviet, $modaubaiviet, $noidungbaiviet, $ketluan, $lienket,$fileName);
        
                if ($stmt->execute()) {
                    $stmt->close();
                    return "Thêm bài viết thành công!";
                } else {
                    return "Lỗi khi thêm bài viết vào cơ sở dữ liệu!";
                }
            } catch (Exception $e) {
                return "Lỗi hệ thống: " . $e->getMessage();
            }
        }
        public function hienThiDonHangChuaXacNhan() {
            $sql = "SELECT d.*, u.hoten FROM donhang0 d 
                    JOIN thongtin_nguoidung u ON d.idnguoidung = u.idnguoidung 
                    ORDER BY d.ngaydat DESC";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->get_result();
        
            echo "<table class='table table-bordered text-center'>";
            echo "<thead class='thead-dark'>
                    <tr>
                        <th>Mã đơn hàng</th>
                        <th>Khách hàng</th>
                        <th>Ngày đặt</th>
                        <th>Tổng tiền</th>
                        <th>Phương thức</th>
                        <th>Trạng thái đơn hàng</th>
                        <th>Cập nhật đơn hàng</th>
                        <th>Trạng thái thanh toán</th>
                        <th>Cập nhật thanh toán</th>
                    </tr>
                </thead><tbody>";
        
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                $iddonhang = (int) $row['iddonhang'];
                echo "<td>{$iddonhang}</td>";
                echo "<td>" . $this->e($row['hoten']) . "</td>";
                echo "<td>" . $this->e($row['ngaydat']) . "</td>";
                echo "<td>" . number_format($row['tongtien'], 0, ',', '.') . " đ</td>";
                echo "<td>" . $this->e($row['pttt']) . "</td>";
        
                // Trạng thái đơn hàng
                echo "<td>";
                switch ($row['trangthai']) {
                    case 'Đã xác nhận':
                        echo "<span class='text-success'>Đã xác nhận</span>";
                        break;
                    case 'Đã từ chối':
                        echo "<span class='text-danger'>Đã từ chối</span><br>";
                        echo "<small><strong>Lý do:</strong> " . $this->e($row['lydo']) . "</small>";
                        break;
                    default:
                        echo "<span class='text-warning'>Chờ xác nhận</span>";
                }
                echo "</td>";
        
                // Cập nhật trạng thái đơn hàng
                echo "<td>";
                if ($row['trangthai'] == 'Chờ xác nhận') {
                    echo "
                        <form method='post' style='display:inline-block; margin-right: 5px;'>
                            <input type='hidden' name='action' value='xacnhan'>
                            <input type='hidden' name='iddonhang' value='{$iddonhang}'>
                            <button type='submit' class='btn btn-success btn-sm'>Xác nhận</button>
                        </form>
        
                        <form method='post' style='display:inline-block;'>
                            <input type='hidden' name='action' value='tuchoi'>
                            <input type='hidden' name='iddonhang' value='{$iddonhang}'>
                            <input type='text' name='lydo' placeholder='Lý do từ chối' required class='form-control form-control-sm mb-1'>
                            <button type='submit' class='btn btn-danger btn-sm'>Từ chối</button>
                        </form>
                    ";
                } else {
                    echo "-";
                }
                echo "</td>";
        
                // Trạng thái thanh toán
                echo "<td>";
                if ($row['trangthai_thanhtoan'] == 'Đã thanh toán') {
                    echo "<span class='text-success'>Đã thanh toán</span>";
                } else {
                    echo "<span class='text-danger'>Chưa thanh toán</span>";
                }
                echo "</td>";
        
                // Cập nhật thanh toán
                echo "<td>";
                echo "
                    <form method='post' style='display:inline-block; margin-right: 5px;'>
                        <input type='hidden' name='action' value='capnhatthanhtoan'>
                        <input type='hidden' name='iddonhang' value='{$iddonhang}'>
                        <select name='trangthai_thanhtoan' class='form-select form-select-sm mb-1'>
                            <option value='Chưa thanh toán'" . ($row['trangthai_thanhtoan'] == 'Chưa thanh toán' ? " selected" : "") . ">Chưa thanh toán</option>
                            <option value='Đã thanh toán'" . ($row['trangthai_thanhtoan'] == 'Đã thanh toán' ? " selected" : "") . ">Đã thanh toán</option>
                        </select>
                        <button type='submit' class='btn btn-primary btn-sm'>Cập nhật</button>
                    </form>
                ";
                echo "</td>";
        
                echo "</tr>";
            }
        
            echo "</tbody></table>";
        }
        
        
    }
?>
