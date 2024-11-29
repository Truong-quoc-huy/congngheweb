<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];

    move_uploaded_file($_FILES['image']['tmp_name'], "images/$image");

    $stmt = $conn->prepare("INSERT INTO flowers (name, description, image) VALUES (?, ?, ?)");
    $stmt->execute([$name, $description, $image]);

    header("Location: admin.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Thêm hoa</title>
    <style>
        /* Cài đặt font và màu nền cho toàn bộ trang */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        /* Tiêu đề của trang */
        h1 {
            text-align: center;
            font-size: 2rem;
            margin-top: 30px;
            color: #333;
        }

        /* Tạo kiểu cho form */
        form {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        label {
            font-size: 1rem;
            color: #333;
            margin-bottom: 8px;
            display: block;
        }

        input[type="text"], textarea, input[type="file"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        /* Tạo kiểu cho nút submit */
        button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 1rem;
            cursor: pointer;
            border-radius: 5px;
            width: 100%;
            margin-top: 10px;
            transition: background-color 0.3s ease;
        }

        /* Hiệu ứng khi hover nút */
        button:hover {
            background-color: #0056b3;
        }

        /* Tạo hiệu ứng cho ô nhập liệu khi focus */
        input:focus, textarea:focus {
            border-color: #007bff;
            outline: none;
        }

        /* Tạo khoảng cách giữa các ô */
        textarea {
            height: 150px;
        }

        /* Tạo khoảng cách cho các label */
        label {
            margin-top: 10px;
        }

    </style>
</head>
<body>
    <h1>Thêm hoa mới</h1>
    <form method="POST" enctype="multipart/form-data">
        <label>Tên hoa:</label><br>
        <input type="text" name="name" required><br>
        <label>Mô tả:</label><br>
        <textarea name="description" required></textarea><br>
        <label>Hình ảnh:</label><br>
        <input type="file" name="image" required><br>
        <button type="submit">Thêm</button>
    </form>
</body>
</html>
