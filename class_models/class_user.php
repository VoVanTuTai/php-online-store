<?php
require_once __DIR__ . '/../config/class_database.php'; // Nhúng file kết nối database

class UserRegistration {
    private $conn;
    public function __construct($db) {
        $this->conn = $db->getConnection();
    }
  
    
    public function registerUser($data) {
        try {
            // Kiểm tra dữ liệu đầu vào
            $name = trim($data['name']);
            $password = trim($data['password']);
            $confirmPassword = trim($data['confirmPassword']);
            $hoten = trim($data['hoten']);
            $ngsinh = trim($data['ngsinh']);
            $gioitinh = isset($data['gioitinh']) ? trim($data['gioitinh']) : '';
            $diachi = trim($data['diachi']);
            $email = trim($data['email']);
            $phone = trim($data['phone']);
    
            if (empty($name) || empty($password) || empty($confirmPassword) || empty($hoten) || empty($ngsinh) || empty($gioitinh) || empty($email) || empty($phone)) {
                return "Vui lòng điền đầy đủ thông tin!";
            }
    
            if ($password !== $confirmPassword) {
                return "Mật khẩu xác nhận không khớp!";
            }
            // Mã hóa mật khẩu
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);
    
            // Thêm tài khoản vào database
            $sql = "INSERT INTO thongtin_nguoidung (tendangnhap, matkhau, hoten, ngaysinh, gioitinh, diachi, email, sodienthoai) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("ssssssss", $name, $hashed_password, $hoten, $ngsinh, $gioitinh, $diachi, $email, $phone);
    
            if ($stmt->execute()) {
                $stmt->close();
                return "Đăng ký thành công!";
            } else {
                return "Lỗi khi đăng ký!";
            }
        } catch (Exception $e) {
            return "Lỗi hệ thống: " . $e->getMessage();
        }
    }
    
    public function loginUser($name, $password) {
        $sql = "SELECT idnguoidung, matkhau, phanquyen FROM thongtin_nguoidung WHERE tendangnhap = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $name);
        $stmt->execute();
        $stmt->store_result();
    
        $user_id = "";
        $hashed_password = "";
        $phanquyen = "";
    
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($user_id, $hashed_password, $phanquyen);
            $stmt->fetch();
            if (password_verify($password, $hashed_password))
            {
                if (session_status() === PHP_SESSION_NONE) {
                    session_start();
                }
                session_regenerate_id(true);
                // Lưu thông tin vào session
                $_SESSION['user_id'] = $user_id;
                $_SESSION['username'] = $name;
                $_SESSION['phanquyen'] = (int)$phanquyen;
                if ((int)$phanquyen === 1) {
                    header("Location: ../admin/admin.php");
                    exit();
                } 
                else if ((int)$phanquyen === 2) 
                { 
                    header("Location: home.php"); // Chuyển hướng sau khi đăng nhập thành công
                    exit();
                }
            } 
            else 
            {
                return "Sai mật khẩu!";
            }
        } 
        else 
        {
            return "Tên đăng nhập không tồn tại!";
        }
    }
    public function themvaogiohang($idnguoidung, $idsp, $soluong ) {
        if(empty($soluong))
        {
            echo'Vui lòng nhập số lượng';
            return;
        }
        else{
            $sql = "INSERT INTO giohangnguoidung (idnguoidung, idsp, soluong) 
                VALUES (?, ?, ?) 
                ON DUPLICATE KEY UPDATE soluong = soluong + VALUES(soluong)";
        
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("iii", $idnguoidung, $idsp, $soluong);
            
            if ($stmt->execute()) {
                return "Đã thêm vào giỏ hàng!";
            } else {
                return "Lỗi khi thêm vào giỏ hàng!";
            }
        }
        
    }
    //Hàm hiển thị danh sách sản phẩm trong giỏ hàng của người dùng
    function hienThiGioHang($conn, $idNguoiDung) {
        $tongTien = 0;
    
        $sql = "SELECT sp.idsp, sp.tensp, sp.gia, gh.soluong
                FROM giohangnguoidung gh
                JOIN sanpham sp ON gh.idsp = sp.idsp
                WHERE gh.idnguoidung = ?";
    
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $idNguoiDung);
        $stmt->execute();
        $result = $stmt->get_result();
    
        echo '<div class="container mt-4">';
        echo '<h3 class="mb-3">🛒 Giỏ hàng của bạn</h3>';

        echo '<table class="table table-bordered table-striped text-center align-middle">';
        echo '<thead class="table-success">';
        echo '<tr>';
        echo '<th scope="col">Tên sản phẩm</th>';
        echo '<th scope="col">Giá</th>';
        echo '<th scope="col">Số lượng</th>';
        echo '<th scope="col">Thành tiền</th>';
        echo '<th scope="col"></th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';

        $tongTien = 0;

        while ($row = $result->fetch_assoc()) {
            $thanhTien = $row['gia'] * $row['soluong'];
            $tongTien += $thanhTien;

            echo '<tr>';
            echo "<td>{$row['tensp']}</td>";
            echo '<td>' . number_format($row['gia'], 0, ',', '.') . ' đ</td>';
            echo "<td>{$row['soluong']}</td>";
            echo '<td>' . number_format($thanhTien, 0, ',', '.') . ' đ</td>';

            // Nút xóa
            echo '<td>';
            echo '<form method="POST" onsubmit="return confirm(\'Bạn có chắc muốn xoá sản phẩm này?\');">';
            echo "<input type='hidden' name='idsp' value='{$row['idsp']}'>";
            echo '<button type="submit" name="xoa" class="btn btn-sm btn-danger">Xoá</button>';
            echo '</form>';
            echo '</td>';

            echo '</tr>';
        }
        echo '<tr class="table-warning fw-bold">';
        echo '<td colspan="3" class="text-end">Tổng tiền</td>';
        echo '<td>' . number_format($tongTien, 0, ',', '.') . ' đ</td>';
        echo '<td></td>';
        echo '</tr>';
        echo '</tbody>';
        echo '</table>';
        echo '</div>';
    }
    
    public function datHang($conn, $idNguoiDung, $phuongthuc, $diachi) {
    $ngaydat = date("Y-m-d H:i:s");
    $tongtien = 0;
    $trangthai = "Chưa thanh toán";

    // Lấy giỏ hàng
    $stmt = $conn->prepare("SELECT idsp, soluong FROM giohangnguoidung WHERE idnguoidung = ?");
    $stmt->bind_param("i", $idNguoiDung);
    $stmt->execute();
    $result = $stmt->get_result();

    $chitiet = [];

    while ($row = $result->fetch_assoc()) {
        $idsp = $row['idsp'];
        $soluong = $row['soluong'];

        // Lấy giá từ bảng sanpham
        $stmtGia = $conn->prepare("SELECT gia FROM sanpham WHERE idsp = ?");
        $stmtGia->bind_param("i", $idsp);
        $stmtGia->execute();
        $resultGia = $stmtGia->get_result();
        $giaRow = $resultGia->fetch_assoc();
        $gia = $giaRow['gia'];
        $stmtGia->close();

        $tongtien += $gia * $soluong;

        $chitiet[] = [
            'idsp' => $idsp,
            'soluong' => $soluong,
            'gia' => $gia
        ];
    }

    if (empty($chitiet)) {
        return [
            'status' => false,
            'message' => 'Giỏ hàng của bạn đang trống.'
        ];
    }

    // Insert vào đơn hàng
    $stmt = $conn->prepare("INSERT INTO donhang0 (idnguoidung, ngaydat, tongtien, trangthai_thanhtoan, pttt, diachi) 
                            VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isisss", $idNguoiDung, $ngaydat, $tongtien, $trangthai, $phuongthuc, $diachi);
    $stmt->execute();
    $madonhang = $stmt->insert_id;

    // Insert chi tiết đơn hàng
    $stmtCT = $conn->prepare("INSERT INTO chitietdonhang0 (iddonhang, idsp, soluong, dongia) VALUES (?, ?, ?, ?)");
    foreach ($chitiet as $sp) {
        $stmtCT->bind_param("iiii", $madonhang, $sp['idsp'], $sp['soluong'], $sp['gia']);
        $stmtCT->execute();
    }
    // Xóa giỏ hàng
    $stmt = $conn->prepare("DELETE FROM giohangnguoidung WHERE idnguoidung = ?");
    $stmt->bind_param("i", $idNguoiDung);
    $stmt->execute();
    return [
        'status' => true,
        'madonhang' => $madonhang
    ];
}

    public function __destruct() {
        $this->conn->close();
    }
    
}

?>
