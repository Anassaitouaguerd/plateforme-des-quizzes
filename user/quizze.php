<?php
require_once "../connection.php";
if(isset( $_SESSION['roleUser']) && $_SESSION['roleUser']=="admin"){
  header('location: ../admin/index.php'); 
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
    <?php include('./header.php')?>
    <section>

        <div id="contact" class="contact-us section row">
            <?php
      $select_cours = "SELECT * FROM course";
      $cours=$conn->query($select_cours);
      while($cour=$cours->fetch_assoc()){
      $id_cours=$cour["courseID"];
      ?>
            <div class="container col-lg-5 mt-5">
                <div class="cours">
                    <div class="cours_header"><?=$cour["courseName"]?></div>
                    <div class="cours_body coursse" style='height:160px; overflow: scroll;'>
                        <?=$cour["courseDescription"]?></div>
                    <div class="cours_footer"><a href="quizze_details.php?id_cours=<?=$id_cours?>">Commencer Quizze</a>
                    </div>
                </div>
            </div>
            <?php
      }
      ?>
        </div>
    </section>
    <style>
    .coursse::-webkit-scrollbar {
        display: none;
    }
    </style>


    <!-- Scripts -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/animation.js"></script>
    <script src="assets/js/imagesloaded.js"></script>
    <script src="assets/js/custom.js"></script>
    <style>
    .cours {
        border: 1px solid #ccc;
        margin-bottom: 20px;
        border-radius: 8px;
        overflow: hidden;
    }

    .cours_header {
        background-color: #007bff;
        color: #fff;
        padding: 10px;
        text-align: center;
    }

    .cours_body {
        padding: 15px;
    }

    .cours_footer {
        background-color: #f8f9fa;
        padding: 10px;
        text-align: center;
    }

    .cours_footer a {
        color: #007bff;
        text-decoration: none;
        font-weight: bold;
    }

    .height {
        height: 37vh;
    }

    .bt_searche {
        height: 54px;
        border-radius: 10px;
        width: 55px;
        background: none;
        border: 1px solid #C8C8C8;
        border-left: none;
    }

    .form {


        position: relative;
    }

    .form .fa-search {

        position: absolute;
        top: 20px;
        left: 20px;
        color: #9ca3af;

    }

    .form span {

        position: absolute;
        right: 17px;
        top: 13px;
        padding: 2px;
        border-left: 1px solid #d1d5db;

    }

    .left-pan {
        padding-left: 7px;
    }

    .left-pan i {

        padding-left: 10px;
    }

    .form-input {

        height: 55px;
        text-indent: 33px;
        border-radius: 10px;
    }


    .search_course:focus {

        box-shadow: none;

    }
    </style>
</body>

</html>