<?php
require_once "../connection.php";

$score = 0;
$results = [];
$displayedQuestions = [];

for ($i = 1; $i <= count($_POST) / 2; $i++) {
    $question_id = $_POST["question_" . $i . "_id"];
    $selected_answer = $_POST["reponse" . $i];

    if (!in_array($question_id, $displayedQuestions)) {
        $select_answer = "SELECT * FROM answer WHERE questionID = $question_id";
        $answers = $conn->query($select_answer);

        while ($answer = $answers->fetch_assoc()) {
            $is_correct = ($answer['answerID'] == $selected_answer && $answer['IsCorrect'] == 1);

            if ($is_correct) {
                $score++;
            }

            $results[] = [
                'question_id' => $question_id,
                'selected_answer' => $selected_answer,
                'is_correct' => $is_correct,
                'correct_answer' => ($answer['IsCorrect'] == 1) ? $answer['answerText'] : null
            ];
        }

        $displayedQuestions[] = $question_id;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-digimedia-v3.css">
    <link rel="stylesheet" href="assets/css/animated.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        }

        .section {
            padding: 80px 0;
        }

        .container {
            max-width: 960px;
            margin: 0 auto;
        }

        h1 {
            font-size: 36px;
            font-weight: 700;
            text-align: center;
            margin-bottom: 30px;
        }

        .text-center {
            text-align: center;
        }

        .mb-4 {
            margin-bottom: 4px;
        }

        .mt-5 {
            margin-top: 5px;
        }

        .results {
            margin-top: 30px;
        }

        .result-item {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .text-success {
            color: #28a745;
            font-weight: 700;
        }

        .text-danger {
            color: #dc3545;
            font-weight: 700;
        }
    </style>
</head>

<body>
<?php include('./header.php')?>

    <section class="section mt-5">
        <div class="container">
            <h1 class="text-center mb-4">Quiz Results</h1>
            <p class="text-center mb-4">Your score: <?php echo $score; ?></p>
            <div class="results">
                <?php
                $j=1;
                foreach ($displayedQuestions as $question_id) {
                    $select_question = "SELECT * FROM question WHERE questionID = $question_id";
                    $question_result = $conn->query($select_question);
                    $question = $question_result->fetch_assoc();
                    $question_text = $question['questionText'];
                ?>

                    <div class="result-item">
                        <p class="mb-2">
                            <strong>Question <?= $j++ ?>:</strong><br>
                            <?php echo $question_text; ?>
                        </p>

                        <?php
                        $selected_answer = null;

                        foreach ($results as $result) {
                            if ($result['question_id'] == $question_id) {
                                $selected_answer = $result['selected_answer'];
                                break;
                            }
                        }

                        $select_answers = "SELECT * FROM answer WHERE questionID = $question_id";
                        $answers = $conn->query($select_answers);

                        while ($answer = $answers->fetch_assoc()) {
                            $answerText = $answer['answerText'];
                            $answerID = $answer['answerID'];
                            $isCorrect = $answer['IsCorrect'];
                        ?>

                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" disabled <?php echo ($answerID == $selected_answer) ? 'checked' : ''; ?>>
                                <label class="form-check-label">
                                    <?php echo $answerText; ?>

                                    <?php if ($isCorrect && $answerID == $selected_answer) { ?>
                                        <span class='text-success font-weight-bold'> (Your Answer - Correct)</span>
                                    <?php } elseif ($isCorrect) { ?>
                                        <span class='text-success font-weight-bold'> (Correct Answer)</span>
                                    <?php } elseif ($answerID == $selected_answer) { ?>
                                        <span class='text-danger font-weight-bold'> (Your Answer - Incorrect)</span>
                                    <?php } ?>
                                </label>
                            </div>

                        <?php } ?>

                       

                    </div>

                <?php } ?>
            </div>

        </div>
    </section>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/animation.js"></script>
    <script src="assets/js/imagesloaded.js"></script>
    <script src="assets/js/custom.js"></script>

</body>

</html>

