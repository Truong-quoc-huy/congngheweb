<?php
require 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = $conn->prepare("SELECT * FROM flowers WHERE id = ?");
    $query->execute([$id]);
    $flower = $query->fetch(PDO::FETCH_ASSOC);

    if (!$flower) {
        header("Location: admin.php");
        exit;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $image = $flower['image']; 

        if ($_FILES['image']['name']) {
            $image = $_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'], "images/$image");
        }

        $stmt = $conn->prepare("UPDATE flowers SET name = ?, description = ?, image = ? WHERE id = ?");
        $stmt->execute([$name, $description, $image, $id]);
        header("Location: admin.php");
        exit;
    }
} else {
    header("Location: admin.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sửa thông tin hoa</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }
        h1 {
            text-align: center;
            font-size: 2rem;
            margin-top: 30px;
            color: #333;
        }
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

        button:hover {
            background-color: #0056b3;
        }

        input:focus, textarea:focus {
            border-color: #007bff;
            outline: none;
        }

        textarea {
            height: 150px;
        }

        img {
            margin-top: 10px;
            border-radius: 5px;
            object-fit: cover;
        }

    </style>
</head>
<body>
    <h1>Sửa hoa</h1>
    <form method="POST" enctype="multipart/form-data">
        <label>Tên hoa:</label><br>
        <input type="text" name="name" value="<?= htmlspecialchars($flower['name']); ?>" required><br>
        <label>Mô tả:</label><br>
        <textarea name="description" required><?= htmlspecialchars($flower['description']); ?></textarea><br>
        <label>Hình ảnh:</label><br>
        <input type="file" name="image"><br>
        <img src="images/<?= htmlspecialchars($flower['image']); ?>" width="100"><br>
        <button type="submit">Lưu</button>
    </form>
</body>
</html>
