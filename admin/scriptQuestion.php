<?php
require '../connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submitquestion'])) {
    
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
    header('location:QuesRepo_detail.php?idcours='.$idcours);
    
    
}elseif(isset($_GET['deleteQuestionID'])) {
    
		$questionID = $_GET['deleteQuestionID'];
		$idcours = $_GET['coursid'];
		$deletAnswers = "DELETE FROM `answer` WHERE questionID = $questionID";
		$deletQuestion = "DELETE FROM `question` WHERE questionID = $questionID";
		mysqli_query($conn, $deletAnswers);
		mysqli_query($conn, $deletQuestion);
        header('location:QuesRepo_detail.php?idcours='.$idcours);
}elseif($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['editquestion'])){
    extract($_POST);
    $queryUpdateQuestion = "UPDATE `question` SET `questionText`='$question' WHERE questionID = $questionID";
    mysqli_query($conn,$queryUpdateQuestion);
    $isCorrect = 0;
    for ($i=0; $i <4 ; $i++) { 
        if($i == $vrai) $isCorrect = 1;
        $answer = $reponce[$i];
        $answerID = $idreponce[$i];
       
        $queryUpdateAnswer = "UPDATE `answer` SET answerText='$answer', IsCorrect = $isCorrect WHERE answerID = $answerID";
        $res=mysqli_query($conn,$queryUpdateAnswer);
        $isCorrect = 0;
    }
    header('location:QuesRepo_detail.php?idcours='.$idcours);

}