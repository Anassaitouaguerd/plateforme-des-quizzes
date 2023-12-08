<?php
session_start();
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

    <?php include('./header.php')?>
    <!-- ***** Header Area End ***** -->
    <section>
        <form action="Search_course.php" method="POST">
            <div class="container">
                <div class="row height d-flex justify-content-center align-items-center">
                    <div class="col-md-6">
                        <div class="form d-flex  ">
                            <i class="fa fa-search"></i>
                            <input type="text" name="searching" class="form-control form-input search_course"
                                placeholder="Search anything...">
                            <button class="left-pan bt_searche" type="submit" name="searche_course">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-search" viewBox="0 0 16 16">
                                    <path
                                        d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div id="contact" class="section row">
            <div class="container mt-5 row">
                <?php  
          
                    $SQL_AFFICHER_COURSE = "SELECT * FROM course";
                    $result_afficher_course = mysqli_query($conn,$SQL_AFFICHER_COURSE);

                    foreach($result_afficher_course as $rows){
              
                ?>
                <div class="cours<?php echo $rows['courseID'] ;?> col-lg-6 mb-4 ps-4 w-50">
                    <div class="card course-card">
                        <div class="card-title cours_header"><?php echo $rows['courseName'] ?> </div>
                        <div class="cours_body"></div>
                        <div class="cours_footer"><a
                                href="cours_detail.php?id_course=<?php echo $rows['courseID'];?>">Commencer Cours</a>
                        </div>
                    </div>
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
    <style>
    .course-card {
        border: 1px solid #ccc;
        margin-bottom: 20px;
        border-radius: 8px;
        overflow: hidden;
    }

    .cours_header {
        background-color: rgb(0, 123, 255, 0.9);
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