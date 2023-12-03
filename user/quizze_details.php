<?php require "../connection.php" ; ?>
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
                            <li class="scroll-to-section"><a href="index.php" class="active">Accueil</a></li>
                            <li class="scroll-to-section"><a href="index.php">suivre à l'avance</a></li>
                            <li class="scroll-to-section"><a href="index.php">Services</a></li>
                            <?php 
              if(isset($_SESSION['id_user'])){
              ?>
                            <li class="scroll-to-section"><a href="cours.php">Cours</a></li>
                            <li class="scroll-to-section"><a href="quizze.php" class="active">Quizzes</a></li>
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
            <div class="image" style="width: 100%; height: 200px; overflow: hidden; ">
                <img src="assets/images/blog-post-01.jpg" alt="">
            </div>
            <div class="container mt-5">
                <div class="container mt-4 d-flex justify-content-center rounded-1"
                    style="background: #007bff; color: white;">
                    <h1 class="font-weight-bold">Cours 1</h1>
                </div>
                <div class="courses pt-4 bg-light font-weight-bold" style="font-size: 20px;">
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Lorem ipsum dolor sit, amet consectetur
                    adipisicing elit.
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                </div>
                <div class="container mt-4">
                    <div class="chois row">
                        <div class="reponse mt-4 col-lg-6 p-3 shadow">
                            <label for="reponse1" class="p-2" style="font-weight: bold; font-size: x-large;">Réponse 1
                                :</label> <br>
                            <input type="radio" name="choix" id="reponse1" class="form-check-input">
                            <span class="ml-2" style="font-weight: bold;">Lorem ipsum dolor sit, amet consectetur
                                adipisicing elit</span>
                        </div>

                        <div class="reponse mt-4 col-lg-6 p-3 shadow">
                            <label for="reponse1" class="p-2" style="font-weight: bold; font-size: x-large;">Réponse 1
                                :</label> <br>
                            <input type="radio" name="choix" id="reponse1" class="form-check-input">
                            <span class="ml-2" style="font-weight: bold;">Lorem ipsum dolor sit, amet consectetur
                                adipisicing elit</span>
                        </div>
                        <div class="reponse mt-4 col-lg-6 p-3 shadow">
                            <label for="reponse1" class="p-2" style="font-weight: bold; font-size: x-large;">Réponse 1
                                :</label> <br>
                            <input type="radio" name="choix" id="reponse1" class="form-check-input">
                            <span class="ml-2" style="font-weight: bold;">Lorem ipsum dolor sit, amet consectetur
                                adipisicing elit</span>
                        </div>
                        <div class="reponse mt-4 col-lg-6 p-3 shadow">
                            <label for="reponse1" class="p-2" style="font-weight: bold; font-size: x-large;">Réponse 1
                                :</label> <br>
                            <input type="radio" name="choix" id="reponse1" class="form-check-input">
                            <span class="ml-2" style="font-weight: bold;">Lorem ipsum dolor sit, amet consectetur
                                adipisicing elit</span>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end mt-3 mb-4">
                    <button class="btn btn-primary">Next</button>
                </div>
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