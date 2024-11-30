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

    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $id = intval($data[0]);
        $hoten = $conn->real_escape_string($data[1]);
        $ngaysinh = $conn->real_escape_string($data[2]);
        $lop = $conn->real_escape_string($data[3]);
        $diem = floatval($data[4]);

        $check_sql = "SELECT ID FROM sinhvien WHERE ID = $id";
        $check_result = $conn->query($check_sql);

        if ($check_result->num_rows > 0) {
            echo "ID $id đã tồn tại, bỏ qua dòng này.<br>";
        } else {
            $sql = "INSERT INTO sinhvien (ID, HoTen, NgaySinh, Lop, DiemTrungBinh)
                    VALUES ('$id', '$hoten', '$ngaysinh', '$lop', '$diem')";

            if ($conn->query($sql)) {
                echo "Chèn thành công ID $id.<br>";
            } else {
                echo "Lỗi khi chèn ID $id: " . $conn->error . "<br>";
            }
        }
    }

    fclose($handle);
    echo "Dữ liệu đã được xử lý.";
} else {
    echo "Không thể mở file CSV!";
}

$conn->close();
?>
