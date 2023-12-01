<?php
require_once "../connection.php";
$scor=0;
for($i=1;$i<=count($_POST)/2;$i++){
    $quistion_id=$_POST["question_".$i."_id"];
    $reponse=$_POST["reponse".$i];
    $select_answer="SELECT * FROM answer WHERE questionID  = $quistion_id ";
    $answers=$conn->query($select_answer);
    while($answer=$answers->fetch_assoc()){
        if($answer['answerID']==$reponse && $answer['IsCorrect']==1) $scor++;
    }
    // echo "$quistion_id <br>".$reponse."<br><br>";
    // $vrai_reponse=0;
    // $k=0;
}
echo $scor;