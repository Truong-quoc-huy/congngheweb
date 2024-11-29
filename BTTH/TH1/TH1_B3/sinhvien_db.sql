-- Tạo cơ sở dữ liệu
CREATE DATABASE sinhvien_db;

CREATE TABLE students (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    HoTen VARCHAR(100),
    NgaySinh DATE,
    Lop VARCHAR(50),
    DiemTrungBinh DECIMAL(5, 2)
);

INSERT INTO students (HoTen, NgaySinh, Lop, DiemTrungBinh) VALUES
('Nguyễn Văn A', '2000-01-01', 'Lớp 10A1', 8.5),
('Trần Thị B', '2001-02-10', 'Lớp 11B2', 7.0),
('Lê Văn C', '2000-12-05', 'Lớp 12C3', 9.0),
('Nguyễn Văn D', '2001-11-15', 'Lớp 12C2', 9.5),
('Trương Hoàng E', '2000-4-1', 'Lớp 12C1', 9.7),
('Lê Thị H', '2000-12-05', 'Lớp 12C3', 7.0),
