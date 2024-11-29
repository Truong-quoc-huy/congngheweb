<?php
include("header.php");
require 'db.php';

$query = $conn->query("SELECT * FROM flowers");
$flowers = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Danh sách hoa</title>
    <style>
        .flower { display: inline-block; margin: 15px; width: 200px; }
        .flower img { width: 100%; height: auto; }
    </style>

    <style>
h1 {
    text-align: center;
    color: #333;
    padding: 10px 0px;
    font-size: 45px;
    font-weight: bold; 
    color: #FFFFFF;
    text-align: center;
    background-color: #52963e; 
    width: 100vw;
}
.flower-list {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    padding: 20px;
}
.flower {
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    width: 300px;
    margin: 15px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    overflow: hidden;
}

.flower:hover {
    transform: scale(1.05);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
}

.flower img {
    width: 100%;
    height: 180px;
    object-fit: cover; 
}

.flower h3 {
    font-size: 1.2rem;
    color: #333;
    text-align: center;
    padding: 10px;
    margin: 0;
    background-color: #f8f8f8;
}

.flower p {
    padding: 10px;
    color: #666;
    font-size: 0.9rem;
    height: 80px;
    overflow: hidden; 
    text-overflow: ellipsis;
    background-color: #fafafa;
}



    </style>
</head>
<body>
    <h1>Danh sách các loài hoa</h1>
    <div class="flower-list">
        <?php foreach ($flowers as $flower): ?>
            <div class="flower">
                <img src="images/<?= $flower['image']; ?>" alt="<?= $flower['name']; ?>">
                <h3><?= $flower['name']; ?></h3>
                <p><?= $flower['description']; ?></p>
            </div>
        <?php endforeach; ?>
    </div>

</body>
</html>
