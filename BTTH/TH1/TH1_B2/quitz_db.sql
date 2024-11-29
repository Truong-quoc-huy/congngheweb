CREATE DATABASE quiz_db;

CREATE TABLE questions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    question TEXT NOT NULL,
    answer_a TEXT,
    answer_b TEXT,
    answer_c TEXT,
    answer_d TEXT,
    correct_answers VARCHAR(20) NOT NULL
);

INSERT INTO questions (question, answer_a, answer_b, answer_c, answer_d, correct_answers)
VALUES
('Câu 1:Thành phần nào sau đây KHÔNG phải là một thành phần giao diện người dùng (UI) trong Android?', 'A. TextView', 'B. Button', 'C. Service', 'D. ImageView', 'C'),
('Câu 2: Layout nào thường được sử dụng để sắp xếp các thành phần UI theo chiều dọc hoặc chiều ngang?', 'A. RelativeLayout', 'B. LinearLayout', 'C. FrameLayout', 'D. ConstraintLayout', 'B'),
('Câu 3:Intent trong Android được sử dụng để làm gì?', 'A. Hiển thị thông báo cho người dùng.', 'B. Lưu trữ dữ liệu.', 'C. Khởi chạy Activity.', 'D. Xử lý sự kiện chạm.', 'C'),
('Câu 4:Vòng đời của một Activity bắt đầu bằng phương thức nào?', 'A. onStart()', 'B. onResume()', 'C. onCreate()', 'D. onPause()', 'C'),
('Câu 5:Để xử lý sự kiện click chuột cho một Button, bạn cần sử dụng phương thức nào?', 'A. onClick()', 'B. onTouch()', 'C. onLongClick()', 'D. onFocusChange()', 'A'),
('Câu 6:Kiểu dữ liệu nào sau đây được sử dụng để lưu trữ giá trị đúng hoặc sai?', 'A. int', 'B. float', 'C. String', 'D. boolean', 'D'),
('Câu 7:SharedPreferences trong Android được sử dụng để làm gì?', 'A. Lưu trữ dữ liệu có cấu trúc.', 'B. Truy cập cơ sở dữ liệu SQLite.', 'C. Lưu trữ dữ liệu dạng key-value.', 'D. Gửi dữ liệu qua mạng.', 'C'),
('Câu 8:Toast trong Android được sử dụng để làm gì?', 'A. Hiển thị một hộp thoại.', 'B. Hiển thị một thông báo ngắn gọn cho người dùng.', 'C. Phát nhạc.', 'D. Chụp ảnh màn hình.', 'B'),
('Câu 9:Để tạo một ứng dụng Android, bạn cần sử dụng ngôn ngữ lập trình nào?', 'A. C++', 'B. Python', 'C. Java', 'D. Kotlin', 'C, D'),
('Câu 10:Adapter trong Android được sử dụng để làm gì?', 'A. Kết nối dữ liệu với ListView hoặc RecyclerView.', 'B. Tạo hiệu ứng động.', 'C. Xử lý sự kiện cảm ứng.', 'D. Lưu trữ dữ liệu.', 'A'),
('Câu 11:Fragment trong Android là gì?', 'A. Một Activity con.', 'B. Một thành phần UI có thể tái sử dụng.', 'C. Một dịch vụ chạy nền.', 'D. Một kiểu dữ liệu.', 'B'),
('Câu 12:RecyclerView là gì?', 'A. Một thành phần UI để hiển thị danh sách.', 'B. Một layout để sắp xếp các thành phần UI.', 'C. Một lớp để xử lý sự kiện.', 'D. Một kiểu dữ liệu.', 'A'),
('Câu 13:Manifest file trong Android được sử dụng để làm gì?', 'A. Khai báo các thành phần của ứng dụng.', 'B. Lưu trữ dữ liệu.', 'C. Xử lý sự kiện.', 'D. Tạo giao diện người dùng.', 'A'),
('Câu 14:Gradle là gì?', 'A. Một công cụ để quản lý dependencies.', 'B. Một ngôn ngữ lập trình.', 'C. Một IDE để phát triển ứng dụng Android.', 'D. Một framework.', 'A'),
('Câu 15:AsyncTask được sử dụng để làm gì?', 'A. Xử lý các tác vụ chạy nền.', 'B. Tạo hiệu ứng động.', 'C. Vẽ đồ họa.', 'D. Lưu trữ dữ liệu.', 'A'),
