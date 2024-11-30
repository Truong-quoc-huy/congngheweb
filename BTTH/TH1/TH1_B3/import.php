<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quanlysv";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

$filename = "KTPM2.csv";

if (!file_exists($filename)) {
    die("Tệp CSV không tồn tại!");
}

if (($handle = fopen($filename, "r")) !== FALSE) {
    $headers = fgetcsv($handle, 1000, ",");

    $checkTableQuery = "SHOW TABLES LIKE 'sinhvien'";
    $result = $conn->query($checkTableQuery);

    if ($result->num_rows == 0) {
        $createTableQuery = "
            CREATE TABLE sinhvien (
                ID INT PRIMARY KEY,
                HoTen VARCHAR(100),
                NgaySinh DATE,
                Lop VARCHAR(50),
                DiemTrungBinh FLOAT
            )
        ";
        if (!$conn->query($createTableQuery)) {
            die("Không thể tạo bảng: " . $conn->error);
        } else {
            echo "Bảng `sinhvien` đã được tạo thành công.<br>";
        }
    }

    $rowCount = 0;
    $errorCount = 0;

    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $id = intval($data[0]);
        $hoten = $conn->real_escape_string($data[1]);
        $ngaysinh = $conn->real_escape_string($data[2]);
        $lop = $conn->real_escape_string($data[3]);
        $diem = floatval($data[4]);

        $sql = "INSERT INTO sinhvien (ID, HoTen, NgaySinh, Lop, DiemTrungBinh)
                VALUES ('$id', '$hoten', '$ngaysinh', '$lop', '$diem')";

        if (!$conn->query($sql)) {
            $errorCount++;
            echo "Lỗi khi chèn dòng ID {$id}: " . $conn->error . "<br>";
        } else {
            $rowCount++;
        }
    }

    fclose($handle);
    echo "Đã lưu thành công {$rowCount} dòng dữ liệu vào MySQL.<br>";
    if ($errorCount > 0) {
        echo "Có {$errorCount} dòng bị lỗi khi chèn.<br>";
    }
} else {
    echo "Không thể mở file CSV!";
}
$conn->close();
?>
