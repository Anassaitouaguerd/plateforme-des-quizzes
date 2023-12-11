<?php
session_start();
require "../connection.php";

// Assuming you have a user ID for the courses you want to display
if (isset($_SESSION['id_user'])) {
    $userId = $_SESSION['id_user'];

    $fetchProgressQuery = "SELECT p.userID, p.courseId, p.progress, c.courseName, c.courseDescription 
                           FROM progressuser p
                           JOIN course c ON p.courseId = c.courseID
                           WHERE p.userID = '$userId'";

    $result = mysqli_query($conn, $fetchProgressQuery);
} else {
    // Redirect or handle the case when the user is not logged in
    header("Location: ../admin/login.php");
    exit();
}

mysqli_close($conn);
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>DigiMedia - Creative SEO HTML5 Template</title>

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

    .course-card {
        margin: 20px;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        background-color: #fff;
        transition: transform 0.3s ease-in-out;
    }

    .course-card:hover {
        transform: scale(1.05);
    }

    .card-header {
        background-color: #17a2b8;
        color: #fff;
        padding: 15px;
        text-align: center;
        font-size: 18px;
        font-weight: bold;
    }

    .card-body {
        padding: 20px;
    }

    .logout-btn {
        background-color: #dc3545;
        color: #fff;
        padding: 8px 15px;
        border-radius: 5px;
        text-decoration: none;
        display: inline-block;
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
    <!-- ***** Header Area Start ***** -->
    <?php include('./header.php')?>
    <!-- ***** Header Area End ***** -->

    <section class="container" style='padding-top:9%'>
        <div class="row ">
            <?php
            if (isset($result) && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="col-md-4">
                <div class="card course-card">
                    <div class="card-header">
                        <?php echo $row["courseName"]; ?>
                    </div>
                    <div class="card-body">
                        <p class="card-text"><?php echo $row["courseDescription"]; ?></p>
                        <p class="card-text">Progress: <?php echo $row["progress"]; ?></p>
                    </div>
                </div>
            </div>
            <?php
                }
            } else {
                echo '<p class="text-center">No courses saved.</p>';
            }
            ?>
        </div>
    </section>

    <!-- ... Your HTML code ... -->

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/animation.js"></script>
    <script src="assets/js/imagesloaded.js"></script>
    <script src="assets/js/custom.js"></script>
</body>

</html>