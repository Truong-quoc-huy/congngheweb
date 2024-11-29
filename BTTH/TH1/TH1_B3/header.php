<?php
include('db.php');
$sql = "SELECT ID, HoTen, NgaySinh, Lop, DiemTrungBinh FROM students";
$result = $conn->query($sql);

$sinhvien = [];
if ($result->num_rows > 0) {
    // Lưu từng dòng vào mảng
    while($row = $result->fetch_assoc()) {
        $sinhvien[] = $row;
    }
} else {
    echo "Không có dữ liệu";
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sinh viên</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body></body>