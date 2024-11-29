<?php
include("header.php");
?>
    <div class="container mt-5">
        <h1 class="text-center">Danh sách sinh viên</h1>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
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
                foreach ($sinhvien as $sv) {
                    echo "<tr>";
                    echo "<td>{$sv['ID']}</td>";
                    echo "<td>{$sv['HoTen']}</td>";
                    echo "<td>{$sv['NgaySinh']}</td>";
                    echo "<td>{$sv['Lop']}</td>";
                    echo "<td>{$sv['DiemTrungBinh']}</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

<?php include("footer.php") ?>
