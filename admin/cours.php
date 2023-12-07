<?php
global $conn;
require_once "../connection.php";
// addition de courses
if(isset($_POST['addcours'])){
    $cours_name = $_POST['cours_name'];
    $descp_cours = $_POST['description'];

    $req = "INSERT INTO course (courseName,courseDescription) values ('$cours_name', '$descp_cours')";
    $result = mysqli_query($conn, $req);
    $id_cours = $conn->insert_id;
    $sql = "INSERT INTO quiz SET quizName='Quiz cours ', courseID = $id_cours, isComplete=0";
    $result = mysqli_query($conn, $sql);
    if($result){
        echo "data is inserted successfully";
    }else{
        die("Connection failed: " . mysqli_connect_error());
    }
}
// Get  & display courses
function get_courses(){
    global $conn;
    $query = "select * from course";
    $result = mysqli_query($conn, $query);
    $courses = [];
    while ($row = mysqli_fetch_assoc($result)){
        $courses[] = $row;
    }
    return $courses;
}
// delete courses
if(isset($_GET['courseID'])){
    $ID = ($_GET['courseID']);
    $query = "DELETE from course where courseID = $ID";
    $result = mysqli_query($conn, $query);
    if($result){
        echo "data Deleted successfully";
    }else{
        die("Connection failed: " . mysqli_connect_error());
    }
}
// update courses
if(isset($_POST['Update_cours'])){
    $ID = $_POST['couresID'];
    $cours_name = $_POST['cours_name'];
    $descp_cours = $_POST['description'];
    $query = "UPDATE course SET courseName =' $cours_name', courseDescription = '$descp_cours' where courseID = $ID";
    $result = mysqli_query($conn, $query);
    if($result){
        echo "course is Updated successfully";
    }else{
        die("Connection failed: " . mysqli_connect_error());
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Nov 17 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
<?php
$user = "ok";
$index = "ok";
$question = "ok";
 include "header.php";
 include "aside.php";

 ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Accueil</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Accueil</a></li>
          <li class="breadcrumb-item active">Gestion Cours</li>
        </ol>
      </nav>
    </div>
    <section class="section dashboard">
<!--Content  ------------------------------------------------>
    <button type="submit"  class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addCours" >Ajoute une cours </button>
    <div class="allCours d-flex gap-5" style="flex-wrap: wrap;">
        <?php
        $courses = get_courses();
           for($i = 0; $i < count($courses); $i++){
        ?>
            <div class="card " style="max-width: 45%; min-width: 45%;">
                <div class="card-header">Header</div>
                <div class="card-body">
                    <h5 class="card-title"><?= $courses[$i]['courseName'] ?></h5>
                    <p><?= $courses[$i]['courseDescription'] ?></p>
                </div>
                <div class="card-footer">
                    <button type="button" class="btn btn-warning"  data-bs-toggle="modal" data-bs-target="#updateCourss<?= $courses[$i]['courseID'] ?>" >Update</button>
                    <a class="btn btn-danger" href="cours.php?courseID=<?= $courses[$i]['courseID'] ?>">Delete</a>
                </div>
            </div>
               <div class="modal fade" id="updateCourss<?= $courses[$i]['courseID'] ?>" tabindex="-1">
                   <div class="modal-dialog modal-dialog-centered modal-lg">
                       <div class="modal-content">
                           <div class="modal-header">
                               <h5 class="modal-title">Vertically Centered</h5>
                               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                           </div>
                           <div class="modal-body">
                               <div class="card">
                                   <div class="card-body">
                                       <h5 class="card-title">Cours Information</h5>

                                       <!-- Floating Labels Form -->
                                       <form class="row g-3" method="POST" action="cours.php">
                                           <div class="col-md-12">
                                               <div class="form-floating">
                                                   <input type="text" name="cours_name" class="form-control" value="<?= $courses[$i]['courseName'] ?>" id="namecours" placeholder="Your Name">
                                                   <label for="floatingName">Cours Name</label>
                                               </div>
                                           </div>
                                           <div class="col-12">
                                               <div class="form-floating">
                                          <textarea class="form-control" name="description" placeholder="Address" id="descrip" style="height: 100px;"><?= $courses[$i]['courseDescription'] ?>
                                          </textarea>
                                                   <label for="floatingTextarea">Cours Description</label>
                                               </div>
                                           </div>
                                           <input type="hidden" name="couresID" value="<?= $courses[$i]['courseID'] ?>">

                                           <div class="text-center">
                                               <button type="submit" name="Update_cours" class="btn btn-primary">Update course</button>
                                               <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Reset</button>
                                           </div>
                                       </form><!-- End floating Labels Form -->

                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
        <?php
           }
        ?>
    </div>
    <div class="modal fade" id="addCours" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Vertically Centered</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Cours Information</h5>

                                <!-- Floating Labels Form -->
                                <!-- Floating Labels Form -->
                                <form class="row g-3" method="POST" action="cours.php">
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="text" name="cours_name" class="form-control" id="floatingName" placeholder="Your Name">
                                            <label for="floatingName">Cours Name</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                              <textarea class="form-control" name="description" placeholder="Address" id="floatingTextarea" style="height: 100px;">
                                              </textarea>
                                            <label for="floatingTextarea">Cours Description</label>
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" name="addcours" class="btn btn-primary">Add course</button>
                                        <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Reset</button>
                                    </div>
                                </form><!-- End floating Labels Form -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
  </main>
  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
     Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer>
  <!-- Vendor JS Files -->
  <div class="script">
    <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chart.js/chart.umd.js"></script>
    <script src="assets/vendor/echarts/echarts.min.js"></script>
    <script src="assets/vendor/quill/quill.min.js"></script>
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>  
  </div>
  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>


</body>

</html>
