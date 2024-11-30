

<?php include("header.php"); ?>
    <div class="container mt-5">
        <h1 class="text-center text-primary">Danh sách sinh viên</h1>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-dark text-center">
                    <tr>
                        <th>ID</th>
                        <th>Họ tên</th>
                        <th>Ngày sinh</th>
                        <th>Lớp</th>
                        <th>Điểm trung bình</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Cấu hình kết nối cơ sở dữ liệu
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "quanlysv";

                    // Kết nối MySQL
                    $conn = new mysqli($servername, $username, $password, $dbname);

                    // Kiểm tra kết nối
                    if ($conn->connect_error) {
                        die("<tr><td colspan='5' class='text-danger text-center'>Kết nối cơ sở dữ liệu thất bại: " . $conn->connect_error . "</td></tr>");
                    }

                    // Lấy dữ liệu từ bảng sinhvien
                    $sql = "SELECT * FROM sinhvien";
                    $result = $conn->query($sql);

                    if ($result && $result->num_rows > 0) {
                        // Hiển thị từng dòng dữ liệu
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr class='text-center'>";
                            echo "<td>" . htmlspecialchars($row['ID']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['HoTen']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['NgaySinh']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['Lop']) . "</td>";
                            echo "<td>" . htmlspecialchars(number_format($row['DiemTrungBinh'], 2)) . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5' class='text-center'>Không có dữ liệu để hiển thị.</td></tr>";
                    }
                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>
<?php include("footer.php"); ?>