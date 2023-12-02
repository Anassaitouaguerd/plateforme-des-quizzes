<?php
require '../connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['submitquestion'])) {
        extract($_POST);
        $questionquery = "INSERT INTO question (quizID, questionText) VALUES ($idquiz,'$question')";
        $questionqueryconn = mysqli_query($conn,$questionquery);
        $idquestion = $conn -> insert_id;
        $iscorrect = 0;
        for ($i=0; $i < 4; $i++) { 
            if ($i==$vrai) $iscorrect =1;
            $re=$reponce[$i];
            $reponcequery = "INSERT INTO `answer`(`questionID`, `answerText`, `IsCorrect`) VALUES ($idquestion,'$re',$iscorrect)";
             mysqli_query($conn,$reponcequery);
            $iscorrect = 0; 
        }
        header('location:QuesRepo.php');
    }
}