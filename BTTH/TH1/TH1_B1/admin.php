<?php
include("header.php");
include 'db.php';

try {
    $stmt = $conn->prepare("SELECT * FROM flowers");
    $stmt->execute();
    $flowers = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Lỗi khi lấy dữ liệu từ cơ sở dữ liệu: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý hoa</title>
    <style>
 body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f4f9;
    margin: 0;
    padding: 0;
}

h1 {
    text-align: center;
    font-size: 45px;
    color: #333;
    font-weight: 700;
    padding: 10px 0px;
    font-size: 45px;
    font-weight: bold; 
    color: #FFFFFF;
    text-align: center;
    background-color: #52963e; 
    width: 100vw;
}

a {
    text-decoration: none;
    color: #007bff;
    font-weight: bold;
}

a:hover {
    color: #0056b3;
}

button {
    background-color: #007bff;
    color: white;
    border: none;
    padding: 10px 20px;
    cursor: pointer;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

button:hover {
    background-color: #0056b3;
}

table {
    width: 90%;
    margin: 30px auto;
    border-collapse: collapse;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

thead {
    background-color: #007bff;
    color: white;
}

th, td {
    padding: 12px 15px;
    text-align: center;
    border: 1px solid #ddd;
}
 
img {
    width: 100px;
    height: auto;
    border-radius: 5px;
    object-fit: cover;
}

.action-buttons button {
    padding: 5px 10px;
    font-size: 0.9rem;
    border-radius: 5px;
    cursor: pointer;
}

.action-buttons button.edit {
    background-color: #28a745;
}

.action-buttons button.delete {
    background-color: #dc3545;
}

.action-buttons button:hover {
    opacity: 0.8;
}

.no-data {
    text-align: center;
    margin: 30px 0;
    font-size: 1.2rem;
    color: #666;
}

    </style>
</head>
<body>
    <h1>Quản lý thông tin hoa</h1>
    <div style="text-align: center;">
        <a href="add.php">
            <button>Thêm hoa mới</button>
        </a>
    </div>
    <?php if (empty($flowers)): ?>
        <div class="no-data">Không có dữ liệu hoa nào trong cơ sở dữ liệu.</div>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên hoa</th>
                    <th>Mô tả</th>
                    <th>Hình ảnh</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($flowers as $flower): ?>
                    <tr>
                        <td><?= htmlspecialchars($flower['id']); ?></td>
                        <td><?= htmlspecialchars($flower['name']); ?></td>
                        <td><?= htmlspecialchars($flower['description']); ?></td>
                        <td>
                            <img src="images/<?= htmlspecialchars($flower['image']); ?>" alt="Hình ảnh hoa">
                        </td>
                        <td class="action-buttons">
                            <a href="edit.php?id=<?= htmlspecialchars($flower['id']); ?>">
                                <button class="edit">Sửa</button>
                            </a>
                            <a href="delete.php?id=<?= htmlspecialchars($flower['id']); ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">
                                <button class="delete">Xóa</button>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</body>
</html>
