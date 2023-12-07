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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>DigiMedia - Creative SEO HTML5 Template</title>

    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-digimedia-v3.css">
    <link rel="stylesheet" href="assets/css/animated.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <style>
        .custom-alert {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 9999;
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
    <section>
        <div id="contact" class="contact-us section">
            <div class="image" style="width: 100%; height: 300px; overflow: hidden; ">
                <img src="assets/images/blog-post-01.jpg" alt="">
            </div>
            <div class="container mt-5">
                <?php
                if (isset($_GET['id_course'])) {
                    $id_course = $_GET['id_course'];
                    $SQL_DISCRIPTION_COURSE = "SELECT * FROM course WHERE courseID = $id_course";
                    $result_DS = mysqli_query($conn, $SQL_DISCRIPTION_COURSE);
                    $rows = mysqli_fetch_assoc($result_DS);
                ?>
                    <div class="container mt-4 d-flex justify-content-center rounded-1" style="background: #007bff; color: white;">
                        <h1 class="font-weight-bold"><?php echo $rows['courseName']; ?></h1>
                    </div>
                    <div class="courses p-4 bg-light">
                        <?php echo $rows['courseDescription']; ?>
                    </div>

                    <div class="d-flex justify-content-between mt-3 mb-4">
                        <button class="btn btn-primary">Preview</button>            
                        <button class=" btn btn-warning text-white save-progress" data-courseid="<?php echo isset($id_course) ? $id_course : '0'; ?>" data-userid="<?php echo isset($_SESSION['id_user']) ? $_SESSION['id_user'] : '0'; ?>">Save Progress</button>
                        <button class="btn btn-primary">Next</button>
                   
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </section>

<!-- ... Your HTML code ... -->

<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/owl-carousel.js"></script>
<script src="assets/js/animation.js"></script>
<script src="assets/js/imagesloaded.js"></script>
<script src="assets/js/custom.js"></script>



<script>
    $(document).ready(function () {
    $(".save-progress").on("click", function () {
        // Retrieve data attributes
        var courseId = $(this).data("courseid");
        var userId = $(this).data("userid");
        var progress = 0;

        var saveButton = $(this); // Save a reference to the button

        $.ajax({
            type: "POST",
            url: "save_progress.php",
            data: {
                courseId: courseId,
                userId: userId,
                progress: progress
            },
            success: function (response) {
                if (response === "success") {
                    showAlert("success", "Progress saved successfully!");
                } else if (response === "already_saved") {
                    showAlert("danger", "Course is already saved!");
                } else {
                    showAlert("danger", "An error occurred while saving progress.");
                }

                saveButton.prop("disabled", true);
            },
            error: function (error) {
                console.log(error.responseText);
                showAlert("danger", "An error occurred while saving progress.");
            }
        });
    });

    // Function to display Bootstrap alert
    function showAlert(type, message) {
        // Remove existing alerts
        $(".custom-alert").remove();

        // Create new alert element
        var alertElement = $("<div>", {
            class: "alert alert-" + type + " custom-alert",
            role: "alert",
            text: message
        });

        // Append alert to the body
        $("body").append(alertElement);

        // Auto-dismiss alert after 3 seconds
        setTimeout(function () {
            alertElement.fadeOut("slow", function () {
                $(this).remove();
            });
        }, 3000);
    }
});

</script>
</body>

</html>

