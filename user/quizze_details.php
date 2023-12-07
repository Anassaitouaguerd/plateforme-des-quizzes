
<?php
require_once "../connection.php";
session_start();
$quizz="ok";
if(isset( $_SESSION['roleUser']) && $_SESSION['roleUser']=="admin"){
  header('location: ../admin/index.php'); 
}
if(isset($_GET['id_cours'])){
$id_cours=$_GET['id_cours'];
$select_cours = "SELECT * FROM course NATURAL JOIN quiz WHERE courseID = $id_cours";
$cours=$conn->query($select_cours);
$cour=$cours->fetch_assoc();
$id_quize= $cour['quizID'];  
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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <title>DigiMedia - Creative SEO HTML5 Template</title>

    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-digimedia-v3.css">
    <link rel="stylesheet" href="assets/css/animated.css">
    <link rel="stylesheet" href="assets/css/owl.css">
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

  </div>
  <!-- ***** Header Area Start ***** -->
  <?php include('header.php')?>
  <!-- ***** Header Area End ***** -->
  <section>
    <form  method="post" action='scripte_pass_quiz.php'>     
      <div id="contact" class="contact-us section" >
          <div class="image" style="width: 100%; height: 200px; overflow: hidden; ">
            <img src="assets/images/blog-post-01.jpg"  alt=""> 
          </div>
          <?php 
          $select_question = "SELECT * FROM question WHERE quizID = $id_quize";
          $questions=$conn->query($select_question);
          $i=1;
          $reponse_id=1;
          while($question=$questions->fetch_assoc()){
            $quistion_id=$question['questionID'];
          ?>
          <div class="container mt-5">
              <div class="container mt-4 d-flex justify-content-center rounded-1" style="background: #007bff; color: white;">
                  <h1 class="font-weight-bold" >Question<?=$i++?></h1>
              </div>
              <div class="courses pt-4 bg-light font-weight-bold" style="font-size: 20px;">
                <?=$question["questionText"]?>
              </div>
              <div class="container mt-4">
                  <div class="chois row">
                      <?php 
                      $select_answer="SELECT * FROM quiz NATURAL JOIN question NATURAL JOIN answer WHERE answer.questionID = $quistion_id";
                      echo "<input type='hidden' name='question_".$reponse_id."_id' value='".$quistion_id."'>";
                      $answers=$conn->query($select_answer);
                      $j=1;
                      $reponse_id_value=0;
                      if($answers)
                      while($answer=$answers->fetch_assoc()){
                      ?>
                      <div class="reponse mt-4 col-lg-6 p-3 shadow">
                          <label for="reponse1" class="p-2" style="font-weight: bold; font-size: x-large;">Réponse <?=$j++?> :</label> <br>
                          <input type="radio" name="reponse<?=$reponse_id?>" required id="reponse1" value='<?=$answer["answerID"]?>' class="form-check-input">
                          <span class="ml-2"><?=$answer["answerText"]?></span>
                      </div>
                    <?php }
                    $reponse_id++; ?>
                  </div>
              </div>
          </div>
          <?php } ?>
      </div>
      <div class="p-5 mt-2" style='width:100%; text-align:center; '>
        <button type="submit" class="btn btn-success">Success</button>
      </div>
      
    </form>    
  </section>



    <!-- Scripts -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/animation.js"></script>
    <script src="assets/js/imagesloaded.js"></script>
    <script src="assets/js/custom.js"></script>

</body>

</html>
<?php   
}
?>

