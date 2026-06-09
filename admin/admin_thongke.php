<?php
require_once __DIR__ . "/../config/auth.php";
require_admin();
require_once '../config/class_database.php';

$database = new Database();
$conn = $database->getConnection();

// 1. Tổng đơn hàng
$tongDon = $conn->query("SELECT COUNT(*) AS tong FROM donhang0")->fetch_assoc()['tong'];
$daXacNhan = $conn->query("SELECT COUNT(*) AS tong FROM donhang0 WHERE trangthai = 'Đã xác nhận'")->fetch_assoc()['tong'];
$choXacNhan = $conn->query("SELECT COUNT(*) AS tong FROM donhang0 WHERE trangthai = 'Chờ xác nhận'")->fetch_assoc()['tong'];
$daTuChoi = $conn->query("SELECT COUNT(*) AS tong FROM donhang0 WHERE trangthai = 'Đã từ chối'")->fetch_assoc()['tong'];

// 2. Tổng doanh thu
$doanhThu = $conn->query("SELECT SUM(tongtien) AS doanhthu FROM donhang0 WHERE trangthai = 'Đã xác nhận' AND trangthai_thanhtoan = 'Đã thanh toán'")->fetch_assoc()['doanhthu'];

// 3. Top 5 sản phẩm bán chạy
$sqlTopSP = "
    SELECT sp.tensp, SUM(ct.soluong) AS tongban 
    FROM chitietdonhang0 ct 
    JOIN sanpham sp ON ct.idsp = sp.idsp 
    GROUP BY ct.idsp 
    ORDER BY tongban DESC 
    LIMIT 5";
$topSP = $conn->query($sqlTopSP);
// 4. So sánh các danh mục sản phẩm bán tốt
$sqlChart = "
    SELECT sp.loaisp, SUM(ct.soluong) AS tongban
    FROM chitietdonhang0 ct
    JOIN sanpham sp ON ct.idsp = sp.idsp
    GROUP BY sp.loaisp
    ORDER BY tongban DESC
";
$resultChart = $conn->query($sqlChart);

$labels = [];
$values = [];
while ($row = $resultChart->fetch_assoc()) {
    $labels[] = $row['loaisp'];
    $values[] = $row['tongban'];
}



// 5. Top 5 khách hàng chi tiêu cao nhất
$sqlTopKH = "
    SELECT u.hoten, COUNT(d.iddonhang) AS sodon, SUM(d.tongtien) AS tongchi
    FROM donhang0 d
    JOIN thongtin_nguoidung u ON d.idnguoidung = u.idnguoidung
    WHERE d.trangthai = 'Đã xác nhận' AND d.trangthai_thanhtoan = 'Đã thanh toán'
    GROUP BY u.idnguoidung
    ORDER BY tongchi DESC
    LIMIT 5";
$topKH = $conn->query($sqlTopKH);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="../css/all.css">
    <link rel="stylesheet" href="../css/admin.css">
    <script src="../js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-dark">
        <div class="container-fluid d-flex justify-content-between">
            <h1>SONG TÀI FOOD <i class="fas fa-seedling"></i></h1>
            <h1>WELCOME TO ADMIN</h1>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row sidebar">
        <div class="col-md-2 sidebar">
                <a href="../admin/admin_xulydonhang.php"><button>Xử lý đơn hàng</button></a>
                <a href="../admin/admin.php"><button>Thêm sản phẩm</button></a>
                <a href="../admin/admin_postbaiviet.php"><button>Thêm bài viết</button></a>
                <a href="../admin/admin_thongke.php"><button>Thống kê doanh thu</button></a>
            </div>
            <div class="col-md-10 mt-1">
                <div class="form-container">
                <h2 class="mb-4">📊 Thống kê tổng quan</h2>

                <div class="row mb-4">
                    <div class="col-md-3">
                        <div class="card text-center">
                            <div class="card-body">
                                <h5 class="card-title">Tổng đơn hàng</h5>
                                <p class="card-text"><?= $tongDon ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card text-center text-success">
                            <div class="card-body">
                                <h5 class="card-title">Đã xác nhận</h5>
                                <p class="card-text"><?= $daXacNhan ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card text-center text-warning">
                            <div class="card-body">
                                <h5 class="card-title">Chờ xác nhận</h5>
                                <p class="card-text"><?= $choXacNhan ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card text-center text-danger">
                            <div class="card-body">
                                <h5 class="card-title">Đã từ chối</h5>
                                <p class="card-text"><?= $daTuChoi ?></p>
                            </div>
                        </div>
                    </div>
                </div>

                <h4>💰 Doanh thu: <span class="text-success"><?= number_format($doanhThu ?? 0, 0, ',', '.') ?> đ</span></h4>

                <hr class="my-4">

                <h5>🔥 Top 5 sản phẩm bán chạy</h5>
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th>Sản phẩm</th>
                            <th>Số lượng bán</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($sp = $topSP->fetch_assoc()): ?>
                            <tr>
                                <td><?= htmlspecialchars($sp['tensp']) ?></td>
                                <td><?= $sp['tongban'] ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
                <!-- Biểu đồ danh mục bán chạy -->
                <h5 class="mt-5">📈 Biểu đồ: Sản phẩm bán theo danh mục</h5>
                <canvas id="chartDanhMuc" style="height:300px; width:100%"></canvas>

                <!-- Thêm thư viện Chart.js -->
                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                <script>
                    const ctx = document.getElementById('chartDanhMuc').getContext('2d');

                    const chart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: <?= json_encode($labels) ?>,
                            datasets: [{
                                label: 'Số lượng bán',
                                data: <?= json_encode($values) ?>,
                                backgroundColor: [
                                    '#4CAF50', '#FF9800', '#2196F3', '#E91E63', '#9C27B0', '#00BCD4'
                                ],
                                borderRadius: 5
                            }]
                        },
                        options: {
                            responsive: true,
                            plugins: {
                                legend: { display: false },
                                title: {
                                    display: true,
                                    text: 'Top danh mục bán chạy',
                                    font: { size: 18 }
                                }
                            },
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    ticks: {
                                        precision:0,
                                        stepSize: 1
                                    }
                                }
                            }
                        }
                    });
                </script>

                <h5>👑 Top 5 khách hàng chi tiêu cao nhất</h5>
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th>Họ tên</th>
                            <th>Số đơn</th>
                            <th>Tổng chi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($kh = $topKH->fetch_assoc()): ?>
                            <tr>
                                <td><?= htmlspecialchars($kh['hoten']) ?></td>
                                <td><?= $kh['sodon'] ?></td>
                                <td><?= number_format($kh['tongchi'], 0, ',', '.') ?> đ</td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
