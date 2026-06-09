<?php
class SanPham {
    private $conn;

    public function __construct($db) {
        $this->conn = $db->getConnection();
    }

    

    public function countProducts($category = null) {
        if ($category) {
            $sql = "SELECT COUNT(*) AS total FROM sanpham WHERE loaisp = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("s", $category);
        } else {
            $sql = "SELECT COUNT(*) AS total FROM sanpham";
            $stmt = $this->conn->prepare($sql);
        }

        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $stmt->close();
        
        return $row['total'];
    }

    public function suatdssanpham($limit, $offset, $category = null) {
        try {
            if ($category) {
                $sql = "SELECT * FROM sanpham WHERE loaisp = ? LIMIT ? OFFSET ?";
                $stmt = $this->conn->prepare($sql);
                $stmt->bind_param("sii", $category, $limit, $offset);
            } else {
                $sql = "SELECT * FROM sanpham LIMIT ? OFFSET ?";
                $stmt = $this->conn->prepare($sql);
                $stmt->bind_param("ii", $limit, $offset);
            }
    
            $stmt->execute();
            $result = $stmt->get_result();
    
            // Kiểm tra nếu có lỗi SQL
            if (!$result) {
                echo "<p>Lỗi truy vấn dữ liệu!</p>";
                return;
            }
    
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    // Kiểm tra nếu đường dẫn ảnh rỗng hoặc không hợp lệ
                    $imagePath = !empty($row['hinh']) ? "../images_sanpham/" . htmlspecialchars($row['hinh']) : "../imges/default.png";
    
                    echo '
                    <a href="chitietsanpham.php?idsp=' . $row['idsp'] . '">
                        <div class="sanpham">
                            <h2 class="tensanpham">' . htmlspecialchars($row['tensp']) . '</h2>
                            <img src="' . $imagePath . '" width="160" height="160" alt="' . htmlspecialchars($row['tensp']) . '">
                            <p class="giasanpham">' . number_format($row['gia'], 0, ',', '.') . ' VND</p>
                        </div>
                    </a>';
                }
            } else {
                echo "<p>Không có sản phẩm nào.</p>";
            }
    
            $stmt->close();
        } catch (Exception $e) {
            echo "<p>Lỗi hệ thống: " . $e->getMessage() . "</p>";
        }
    }
    //HÀM TÌM KIẾM SẢN PHẨM
    public function timkiemsanpham($keyword) {
        $keyword = trim($keyword);
    
        // Kiểm tra nếu từ khóa rỗng thì không thực hiện tìm kiếm
        if (empty($keyword)) {
            return []; // Trả về mảng rỗng, không có sản phẩm nào được hiển thị
        }
        $sql = "SELECT * FROM sanpham WHERE tensp LIKE ? OR mota LIKE ?";
        $stmt = $this->conn->prepare($sql);
        $searchTerm = "%$keyword%";
        $stmt->bind_param("ss", $searchTerm, $searchTerm);
        $stmt->execute();
        $result = $stmt->get_result();
    
        $products = [];
        while ($row = $result->fetch_assoc()) {
            $products[] = $row;
        }
    
        return $products;
    }
    
    
    //HÀM HIỂN THỊ SẢN PHẤM TÌM KIẾM
    public function hienthisanphamtimkiem($products) {
        if (empty($products)) {
            echo "<p class=''>Hãy nhập từ khóa để dễ dàng tìm kiếm sản phẩm.</p>";
            return;
        }
            echo '<h4>Các sản phẩm liên quan:</h4>';
            echo '<div class="sanpham-list">';
            foreach ($products as $product) 
            {
                // Kiểm tra và xử lý đường dẫn ảnh
                $imagePath = !empty($product['hinh']) ? "../images_sanpham/" . htmlspecialchars($product['hinh']) : "../images_sanpham/default.png";
                echo '
                <a href="chitietsanpham.php?idsp=' . $product['idsp'] . '" >
                        <div class="sanpham">
                        <h2 class="tensanpham">' . htmlspecialchars($product['tensp']) . '</h2>
                        <img src="' . $imagePath . '" width="160" height="160" alt="' . htmlspecialchars($product['tensp']) . '">
                        <p class="giasanpham">' . number_format($product['gia'], 0, ',', '.') . ' VND</p>
                    </div>
                </a>';
            }
            echo '</div>';
        } 
}
?>
