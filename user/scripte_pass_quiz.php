<?php
require_once "../connection.php";

$score = 0;
$results = [];

for ($i = 1; $i <= count($_POST) / 2; $i++) {
    $question_id = $_POST["question_" . $i . "_id"];
    $selected_answer = $_POST["reponse" . $i];

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
    <div id="js-preloader" class="js-preloader">
        <div class="preloader-inner">
            <span class="dot"></span>
            <div class="dots">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>

    <section class="section mt-5">
        <div class="container">
            <h1 class="text-center mb-4">Quiz Results</h1>
            <p class="text-center mb-4">Your score: <?php echo $score; ?></p>
            <div class="results">
                <?php
                foreach ($results as $result) {
                    $question_id = $result['question_id'];
                    $selected_answer = $result['selected_answer'];
                    $is_correct = $result['is_correct'];
                    $correct_answer = $result['correct_answer'];
                ?>
                    <div class="result-item">
                        <p class="mb-0">
                            <strong>Question <?php echo $question_id; ?>:</strong><br>
                            Your answer: <?php echo $selected_answer; ?>
                            <?php if ($is_correct) { ?>
                                <span class='text-success'> (Correct)</span>
                            <?php } else { ?>
                                <span class='text-danger'> (Wrong)</span><br>
                                Correct answer: <?php echo $correct_answer; ?>
                            <?php } ?>
                        </p>
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
