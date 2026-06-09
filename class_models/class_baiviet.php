<?php
    class Baiviet
    {
        private $conn;
        public function __construct($db) 
        {
            $this->conn = $db->getConnection();
        }
        //HÀM THÊM BÀI VIẾT  
        
        public function suatBaiViet($limit = 3) {
            try {
                $sql = "SELECT idbaiviet, tieudebaiviet, mobai, hinhmota FROM baiviet ORDER BY idbaiviet DESC LIMIT ?";
                $stmt = $this->conn->prepare($sql);
                $stmt->bind_param("i", $limit);
                $stmt->execute();
                $result = $stmt->get_result();
                $stmt->close();
        
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        // Kiểm tra nếu đường dẫn ảnh rỗng
                        $imagePath = !empty($row['hinhmota']) ? "../images_baiviet/" . htmlspecialchars($row['hinhmota']) : "../images_baiviet/default.png";
                        echo '
                        <a href="chitietbaiviet.php?id=' . $row['idbaiviet'] . '">
                            <div class="baiviet">
                                <img src="' . $imagePath . '" width="150" height="150" alt="' . htmlspecialchars($row['tieudebaiviet']) . '">
                                <div class="noidung">
                                    <h2 class="tieudebaiviet">' . htmlspecialchars($row['tieudebaiviet']) . '</h2>
                                    <p class="mota">' . nl2br(htmlspecialchars($row['mobai'])) . '</p>
                                </div>
                            </div>
                        </a>';
                    }
                } else {
                    echo "<p>Không có bài viết nào.</p>";
                }
            } catch (Exception $e) {
                echo "<p>Lỗi hệ thống: " . $e->getMessage() . "</p>";
            }
        }
        public function hienThiChiTietBaiViet($idbaiviet) {
            // Kiểm tra ID có hợp lệ không
            if (!is_numeric($idbaiviet)) {
                return "<p>ID bài viết không hợp lệ!</p>";
            }
        
            // Truy vấn lấy bài viết theo ID
            $sql = "SELECT tieudebaiviet, mobai, thanbai, ketbai, hinhmota, lienket FROM baiviet WHERE idbaiviet = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("i", $idbaiviet);
            $stmt->execute();
            $result = $stmt->get_result();
            $stmt->close();
        
            // Kiểm tra bài viết có tồn tại không
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $imagePath = !empty($row['hinhmota']) ? "../images_baiviet/" . htmlspecialchars($row['hinhmota']) : "images_baiviet/default.png";
        
                // Hiển thị bài viết
                return '
                <div class="chitiet-baiviet">
                    <h1>' . htmlspecialchars($row['tieudebaiviet']) . '</h1>
                    <img src="' . $imagePath . '" width="300" alt="' . htmlspecialchars($row['hinhmota']) . '">
                    <p>' . nl2br(htmlspecialchars($row['mobai'])) . '</p>
                    <p>' . nl2br(htmlspecialchars($row['thanbai'])) . '</p>
                    <p>' . nl2br(htmlspecialchars($row['ketbai'])) . '
                    <a href="'.$row['lienket'].'">Tìm hiểu thêm</a></p>
                    <a href="baiviet.php">⬅ Quay lại danh sách bài viết
                </div>';
            } else {
                return "<p> Bài viết không tồn tại!</p>";
            }
        }

    }
?>