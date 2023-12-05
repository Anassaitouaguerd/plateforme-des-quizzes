<?php 
require "../connection.php";
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
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.php" class="logo">
                            <img src="assets/images/logo-v3.png" alt="">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="index.php">Accueil</a></li>
                            <li class="scroll-to-section"><a href="index.php">suivre à l'avance</a></li>
                            <li class="scroll-to-section"><a href="index.php">Services</a></li>
                            <?php 
              if(isset($_SESSION['id_user'])){
              ?>
                            <li class="scroll-to-section"><a href="cours.php" class="active">Cours</a></li>
                            <li class="scroll-to-section"><a href="quizze.php">Quizzes</a></li>
                            <?php } ?>
                            <li class="scroll-to-section"><a href="index.php">Contact</a></li>
                            <?php 
              if(isset($_SESSION['id_user'])){
              ?>
                            <li class="scroll-to-section">
                                <div class="border-first-button"><a
                                        href="../admin/scripte.php?log_out=ok">Deconexion</a></div>
                            </li>
                            <?php } else{
                ?>
                            <li class="scroll-to-section">
                                <div class="border-first-button"><a href="../admin/login.php">Connexion</a></div>
                            </li>
                            <?php
              } ?>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->
    <section>


        <div id="contact" class="contact-us section">
            <div class="image" style="width: 100%; height: 300px; overflow: hidden; ">
                <img src="assets/images/blog-post-01.jpg" alt="">
            </div>
            <div class="container mt-5">
                <?php
      if(isset($_GET['id_course'])){
        $id_course = $_GET['id_course'];
        $SQL_DISCRIPTION_COURSE = "SELECT * FROM course WHERE courseID = $id_course";
        $result_DS = mysqli_query($conn,$SQL_DISCRIPTION_COURSE);
        $rows = mysqli_fetch_assoc($result_DS);
      ?>
                <div class="container mt-4 d-flex justify-content-center rounded-1"
                    style="background: #007bff; color: white;">
                    <h1 class="font-weight-bold"><?php echo $rows['courseName'] ;?></h1>
                </div>
                <div class="courses p-4 bg-light">
                    <?php echo $rows['courseDescription'] ;?>
                </div>

                <div class="d-flex justify-content-between mt-3 mb-4">
                    <button class="btn btn-primary">Preview</button>
                    <button class="btn btn-success">Save Progress</button>
                    <button class="btn btn-primary">Next</button>
                </div>
                <?php 
              } 
              ?>
            </div>


        </div>
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