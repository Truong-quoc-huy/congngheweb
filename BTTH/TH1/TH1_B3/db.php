<?php
// db_connection.php

$servername = "localhost";
$username = "root"; // Username mặc định của MySQL
$password = ""; // Mật khẩu của bạn (nếu có)
$dbname = "sinhvien_db"; // Tên cơ sở dữ liệu bạn đã tạo

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
?>
