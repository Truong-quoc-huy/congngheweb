<?php
include 'db.php'; 

$sql = "SELECT * FROM questions";
$result = $conn->query($sql);

$score = 0;
$total_questions = $result->num_rows;

if ($total_questions > 0) {
    while ($row = $result->fetch_assoc()) {
        $question_id = $row['id'];
        $correct_answers = explode(',', $row['correct_answers']); 

        if (isset($_POST["question$question_id"])) {
            $user_answers = $_POST["question$question_id"]; 

            $user_answers = array_map('trim', $user_answers); 
            $correct_answers = array_map('trim', $correct_answers);

            sort($user_answers);
            sort($correct_answers);


            if ($user_answers == $correct_answers) {
                $score++; 
            }
        }
    }
} else {
    echo "<div class='alert alert-warning text-center'>Không có câu hỏi nào.</div>";
    exit;
}
$conn->close();

echo "<div class='alert alert-success text-center'>";
echo "Bạn trả lời đúng <strong>$score</strong>/$total_questions câu.";
echo "</div>";


echo "<div class='text-center mt-3'>";
echo "<a href='index.php' class='btn btn-primary'>Quay lại</a>";
echo "</div>";
?>
