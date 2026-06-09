<?php
class Database {
    private $conn;

    public function __construct() {
        $config = require __DIR__ . '/config.php';

        // Bật chế độ báo lỗi chi tiết
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        
        try {
            $this->conn = new mysqli(
                $config['host'], 
                $config['username'], 
                $config['password'], 
                $config['database']
            );
            
            // Đặt charset UTF-8 để hỗ trợ tiếng Việt
            $this->conn->set_charset("utf8");
        } catch (Exception $e) {
            die("Lỗi kết nối: " . $e->getMessage());
        }
    }

    public function getConnection() {
        return $this->conn;
    }
    
}
?>
