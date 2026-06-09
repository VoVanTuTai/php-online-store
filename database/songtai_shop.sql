SET NAMES utf8mb4;
SET time_zone = '+00:00';

CREATE TABLE IF NOT EXISTS `thongtin_nguoidung` (
  `idnguoidung` INT NOT NULL AUTO_INCREMENT,
  `tendangnhap` VARCHAR(50) NOT NULL,
  `matkhau` VARCHAR(255) NOT NULL,
  `hoten` VARCHAR(100) NOT NULL,
  `ngaysinh` DATE DEFAULT NULL,
  `gioitinh` VARCHAR(20) DEFAULT NULL,
  `diachi` VARCHAR(255) DEFAULT NULL,
  `email` VARCHAR(120) NOT NULL,
  `sodienthoai` VARCHAR(20) DEFAULT NULL,
  `phanquyen` INT NOT NULL DEFAULT 2,
  PRIMARY KEY (`idnguoidung`),
  UNIQUE KEY `uk_user_username` (`tendangnhap`),
  UNIQUE KEY `uk_user_email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `sanpham` (
  `idsp` INT NOT NULL AUTO_INCREMENT,
  `tensp` VARCHAR(120) NOT NULL,
  `loaisp` VARCHAR(50) NOT NULL,
  `gia` INT NOT NULL DEFAULT 0,
  `mota` TEXT,
  `hinh` VARCHAR(255) DEFAULT NULL,
  `giamgia` INT NOT NULL DEFAULT 0,
  `soluongton` INT NOT NULL DEFAULT 0,
  `daban` INT NOT NULL DEFAULT 0,
  PRIMARY KEY (`idsp`),
  KEY `idx_sanpham_loaisp` (`loaisp`),
  KEY `idx_sanpham_daban` (`daban`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `giohangnguoidung` (
  `idnguoidung` INT NOT NULL,
  `idsp` INT NOT NULL,
  `soluong` INT NOT NULL DEFAULT 1,
  PRIMARY KEY (`idnguoidung`, `idsp`),
  CONSTRAINT `fk_cart_user` FOREIGN KEY (`idnguoidung`) REFERENCES `thongtin_nguoidung` (`idnguoidung`) ON DELETE CASCADE,
  CONSTRAINT `fk_cart_product` FOREIGN KEY (`idsp`) REFERENCES `sanpham` (`idsp`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `donhang0` (
  `iddonhang` INT NOT NULL AUTO_INCREMENT,
  `idnguoidung` INT NOT NULL,
  `ngaydat` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tongtien` INT NOT NULL DEFAULT 0,
  `trangthai` VARCHAR(50) NOT NULL DEFAULT 'Chờ xác nhận',
  `trangthai_thanhtoan` VARCHAR(50) NOT NULL DEFAULT 'Chưa thanh toán',
  `pttt` VARCHAR(80) DEFAULT NULL,
  `diachi` VARCHAR(255) DEFAULT NULL,
  `lydo` VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (`iddonhang`),
  KEY `idx_donhang_user` (`idnguoidung`),
  CONSTRAINT `fk_order_user` FOREIGN KEY (`idnguoidung`) REFERENCES `thongtin_nguoidung` (`idnguoidung`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `chitietdonhang0` (
  `idchitiet` INT NOT NULL AUTO_INCREMENT,
  `iddonhang` INT NOT NULL,
  `idsp` INT NOT NULL,
  `soluong` INT NOT NULL DEFAULT 1,
  `dongia` INT NOT NULL DEFAULT 0,
  PRIMARY KEY (`idchitiet`),
  KEY `idx_ctdh_order` (`iddonhang`),
  KEY `idx_ctdh_product` (`idsp`),
  CONSTRAINT `fk_order_detail_order` FOREIGN KEY (`iddonhang`) REFERENCES `donhang0` (`iddonhang`) ON DELETE CASCADE,
  CONSTRAINT `fk_order_detail_product` FOREIGN KEY (`idsp`) REFERENCES `sanpham` (`idsp`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `baiviet` (
  `idbaiviet` INT NOT NULL AUTO_INCREMENT,
  `tieudebaiviet` VARCHAR(255) NOT NULL,
  `mobai` TEXT,
  `thanbai` TEXT,
  `ketbai` TEXT,
  `lienket` VARCHAR(255) DEFAULT NULL,
  `hinhmota` VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (`idbaiviet`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `thongtin_nguoidung`
  (`tendangnhap`, `matkhau`, `hoten`, `ngaysinh`, `gioitinh`, `diachi`, `email`, `sodienthoai`, `phanquyen`)
VALUES
  ('admin', '$2y$10$Gn6j0dZQ6rB9BTsEw5mOPem..SRw3MVSrnmdJQpOCNkP6FWofxY9W', 'Admin Song Tai', '2000-01-01', 'Nam', 'Ho Chi Minh City', 'admin@songtai.local', '0900000000', 1),
  ('user', '$2y$10$52dpLseJztvcqKOYOLgDMuHabDW5Og/vTkkRVLI1SQ4uqyheY2Sgy', 'Khach Hang Mau', '2001-01-01', 'Nam', 'Ho Chi Minh City', 'user@songtai.local', '0911111111', 2);

INSERT INTO `sanpham`
  (`tensp`, `loaisp`, `gia`, `mota`, `hinh`, `giamgia`, `soluongton`, `daban`)
VALUES
  ('Granola trái cây', 'granola', 79000, 'Granola giòn thơm kết hợp trái cây sấy, phù hợp cho bữa sáng nhanh gọn.', 'granoTraiCay.jpg', 0, 40, 28),
  ('Ngũ cốc dinh dưỡng', 'ngucoc', 69000, 'Ngũ cốc dinh dưỡng tiện lợi, dùng kèm sữa hoặc sữa chua.', 'NguCocDinhDuong.jpg', 0, 35, 24),
  ('Hạt điều rang muối', 'hatcacloai', 99000, 'Hạt điều rang muối vị nhẹ, đóng gói tiện dùng.', 'HatdieuRangmuoi.jpg', 0, 32, 19),
  ('Lương khô mini', 'luongkho', 45000, 'Lương khô mini cho bữa phụ và các chuyến đi ngắn.', 'LuongKhoMini.jpg', 0, 60, 31),
  ('Mì Hảo Hảo', 'migoi', 5000, 'Mì gói tiện lợi, hương vị quen thuộc.', 'miHaoHao.jpg', 0, 120, 80),
  ('Đồ hộp cá sốt cà', 'dohop', 32000, 'Cá hộp sốt cà dùng nhanh trong bữa ăn gia đình.', 'DoHopCaSotCa.jpg', 0, 50, 17),
  ('Cơm cháy chà bông', 'comchay', 55000, 'Cơm cháy giòn, vị đậm đà, phù hợp ăn vặt.', 'comchay.jpg', 0, 45, 22),
  ('Khô cá chỉ vàng', 'cacloaikho', 89000, 'Khô cá chỉ vàng đóng gói, tiện chế biến.', 'KhoCaChiVang.jpg', 0, 24, 13);

INSERT INTO `baiviet`
  (`tieudebaiviet`, `mobai`, `thanbai`, `ketbai`, `lienket`, `hinhmota`)
VALUES
  ('Gợi ý bữa sáng nhanh với granola', 'Granola là lựa chọn tiện lợi cho bữa sáng.', 'Bạn có thể dùng granola cùng sữa tươi, sữa chua hoặc trái cây.', 'Một bữa sáng đơn giản vẫn có thể đủ năng lượng.', 'store.php?category=granola', 'lkhoviet.jpg'),
  ('Cách chọn thực phẩm khô cho gia đình', 'Thực phẩm khô dễ bảo quản và tiện chế biến.', 'Nên chọn sản phẩm có nguồn gốc rõ ràng, bao bì sạch và hạn dùng đầy đủ.', 'Song Tài Food hướng tới các sản phẩm khô dễ dùng hằng ngày.', 'store.php', 'logo_webb.jpg');

INSERT INTO `donhang0`
  (`idnguoidung`, `ngaydat`, `tongtien`, `trangthai`, `trangthai_thanhtoan`, `pttt`, `diachi`)
VALUES
  (2, NOW(), 124000, 'Chờ xác nhận', 'Chưa thanh toán', 'COD', 'Ho Chi Minh City');

INSERT INTO `chitietdonhang0`
  (`iddonhang`, `idsp`, `soluong`, `dongia`)
VALUES
  (1, 1, 1, 79000),
  (1, 4, 1, 45000);

