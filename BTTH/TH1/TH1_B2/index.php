<?php
include 'header.php'; 
?>
<div class="container mt-5">
    <h2>Trắc nghiệm</h2>

    <form action="submit.php" method="post">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $question_id = $row['id'];
                $question_text = $row['question'];
                $answers = [
                    'A' => $row['answer_a'],
                    'B' => $row['answer_b'],
                    'C' => $row['answer_c'],
                    'D' => $row['answer_d']
                ];
                ?>
                <div class="card mb-4">
                    <div class="card-header"><strong><?php echo $question_text; ?></strong></div>
                    <div class="card-body">
                        <?php
                        foreach ($answers as $key => $answer) {
                            echo "<div class='form-check'>
                                    <input class='form-check-input' type='checkbox' name='question{$question_id}[]' value='{$key}' id='question{$question_id}{$key}'>
                                    <label class='form-check-label' for='question{$question_id}{$key}'>$answer</label>
                                  </div>";
                        }
                        ?>
                    </div>
                </div>
                <?php
            }
        } else {
            echo "Không có câu hỏi nào.";
        }

        $conn->close();
        ?>
        <button type="submit" class="btn btn-primary">Nộp bài</button>
    </form>
</div>

<?php
include 'footer.php'; 
?>

