<?php
class Database {
    private $conn;

    public function __construct() {
        $configPath = __DIR__ . '/config.php';

        if (!file_exists($configPath)) {
            die("Missing config/config.php. Copy config/config.example.php to config/config.php and update your local database credentials.");
        }

        $config = require $configPath;

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
