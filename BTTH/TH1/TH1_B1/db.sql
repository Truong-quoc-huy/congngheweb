CREATE DATABASE flowerdb;

USE flowerdb;

CREATE TABLE flowers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    image VARCHAR(255) NOT NULL
);

INSERT INTO flowers (name, description, image)
VALUES
    ('Hoa Hồng', 'Loài hoa biểu tượng cho tình yêu.', '/images/haiduong.jpg'),
    ('Hoa Cúc', 'Loài hoa tượng trưng cho sự thanh cao.', '/images/mai.jpg');