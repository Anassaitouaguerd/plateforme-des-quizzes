<?php
require '../connection.php';?>
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
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

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
        $gestion = "ok";
        $index = "ok";
        $user = "ok";
        include "header.php";
        include "aside.php";

        ?>

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Accueil</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Accueil</a></li>
                    <li class="breadcrumb-item active">Gestion des Questions & Réponses </li>
                </ol>
            </nav>
        </div>
        <section class="section dashboard">
            <!--Content  ------------------------------------------------>
            <?php
if(isset($_GET['idcours'])){ 
$idcours = $_GET['idcours'];
$querycours = "SELECT * FROM course where courseID = '$idcours';";
$querycoursconn = mysqli_query($conn,$querycours);
$row = mysqli_fetch_array($querycoursconn); }
?>
            <div class="card ">
                <div class="card-header">cours</div>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $row['courseName']; ?></h5>
                    <?php echo $row['courseDescription'];?>
                </div>
            </div>
            <button type="button" class="btn btn-primary mb-3 margin-left" data-bs-toggle="modal"
                data-bs-target="#addQuestion">Ajouter des Questions </button>
            <div class="modal fade" id="addQuestion" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Vertically Centered</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Vertical Form</h5>

                                    <!-- Vertical Form -->
                                    <form class="row g-3" method="POST" action="scriptQuestion.php">
                                        <div class="col-12">
                                            <label for="inputNanme4" class="form-label">Question</label>
                                            <input type="text" name="question" class="form-control">
                                        </div>
                                        <div class="col-12">
                                            <label for="inputEmail4" class="form-label">Reponse 1</label>
                                            <input type="text" name="reponce[]" class="form-control">
                                        </div>
                                        <div class="col-12">
                                            <label for="inputPassword4" class="form-label">Reponse 2</label>
                                            <input type="text" name="reponce[]" class="form-control">
                                        </div>
                                        <div class="col-12">
                                            <label for="inputAddress" class="form-label">Reponse 3</label>
                                            <input type="text" name="reponce[]" class="form-control">
                                        </div>
                                        <div class="col-12">
                                            <label for="inputAddress" class="form-label">Reponse 4</label>
                                            <input type="text" name="reponce[]" class="form-control">
                                        </div>
                                        <div class="col-12">
                                            <label for="inputAddress" class="form-label">Reponse Vrai</label>
                                            <div class="d-flex gap-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="vrai"
                                                        id="gridRadios1" value="0" checked="">
                                                    <label class="form-check-label" for="gridRadios1">
                                                        1
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="vrai"
                                                        id="gridRadios1" value="1" checked="">
                                                    <label class="form-check-label" for="gridRadios1">
                                                        2
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="vrai"
                                                        id="gridRadios1" value="2" checked="">
                                                    <label class="form-check-label" for="gridRadios1">
                                                        3
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="vrai"
                                                        id="gridRadios1" value="3" checked="">
                                                    <label class="form-check-label" for="gridRadios1">
                                                        4
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <?php
                              $queryquiz = "SELECT * FROM course natural join quiz where courseID = '$idcours'";
                              $queryquizconn = mysqli_query($conn,$queryquiz);
                              $result = mysqli_fetch_array($queryquizconn);
                              $idquiz = $result['quizID'];
                              ?>
                                            <input type="hidden" name="idquiz" value="<?= $idquiz; ?>">
                                            <input type="hidden" name="idcours" value="<?= $idcours; ?>">
                                            <button type="submit" name="submitquestion"
                                                class="btn btn-primary">Submit</button>
                                            <button type="reset" class="btn btn-secondary">Reset</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <?php
    $query = "SELECT * FROM question where quizID = $idquiz";
    $queryconn = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($queryconn)) {
    $questionID = $row['questionID'];
    $questionText = $row['questionText'];
    ?>
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h5 class="card-title"><?php echo $questionText ?></h5>
                        <div class="d-flex align-items-center">
                            <a href="#editQuestion<?php echo $questionID?>" class="edit" data-bs-toggle="modal"><i
                                    class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                            <div class="modal fade" id="editQuestion<?php echo $questionID?>" tabindex="-1">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Vertically Centered</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title">Vertical Form</h5>

                                                    <!-- Vertical Form -->
                                                    <form class="row g-3" method="POST" action="scriptQuestion.php">
                                                        <div class="col-12">
                                                            <label for="inputNanme4" class="form-label">Question</label>
                                                            <input type="text" name="question" class="form-control"
                                                                value="<?= $questionText ?>">
                                                        </div>
                                                        <?php
                                            $answerQuery = "SELECT * FROM answer WHERE questionID = $questionID";
                                            $answerQueryConn = mysqli_query($conn, $answerQuery);
                                            while ($answerRow = mysqli_fetch_array($answerQueryConn)) {
                                                $answerText = $answerRow['answerText'];
                                                $answerid = $answerRow['answerID'];
                                                $isCorrect = $answerRow['IsCorrect'];
                                                ?>
                                                <div class="col-12">
                                                    <label for="inputEmail4" class="form-label">Reponse</label>
                                                    <input type="text" name="reponce[]" class="form-control" value="<?= $answerText ?>">
                                                    <input type="hidden" name="idreponce[]" class="form-control" value="<?= $answerid ?>">
                                                </div>
                                            <?php } ?>
                                            <div class="col-12">
                                                <label for="inputAddress" class="form-label">Reponse Vrai</label>
                                                <div class="d-flex gap-3">
                                                    <?php
                                                    $answerQueryConn = mysqli_query($conn, $answerQuery);
                                                    $index = 0;
                                                    while ($answerRow = mysqli_fetch_array($answerQueryConn)) {
                                                        $isChecked = $answerRow['IsCorrect'] ? 'checked' : '';
                                                        ?>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="vrai" id="gridRadios<?= $index ?>"
                                                                        value="<?= $index ?>" <?= $isChecked ?>>
                                                                    <label class="form-check-label"
                                                                        for="gridRadios<?= $index ?>">
                                                                        <?= $index + 1 ?>
                                                                    </label>
                                                                </div>
                                                                <?php
                                                        $index++;
                                                    } ?>
                                                            </div>
                                                        </div>

                                                        <div class="text-center">
                                                            <input type="hidden" name="questionID"
                                                                value="<?= $questionID ?>">
                                                            <input type="hidden" name="idcours" value="<?= $idcours ?>">
                                                            <button type="submit" name="editquestion"
                                                                class="btn btn-primary">Submit</button>
                                                            <button type="reset"
                                                                class="btn btn-secondary">Reset</button>
                                                        </div>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <a href="scriptQuestion.php?deleteQuestionID=<?php echo $questionID?>&coursid=<?php echo $idcours?>"
                                class="delete"><i class="material-icons" data-toggle="tooltip"
                                    title="Delete">&#xE872;</i></a>
                        </div>
                    </div>
                    <ol class="list-group list-group-numbered">
                        <?php
                $answerQuery = "SELECT * FROM answer WHERE questionID = $questionID";
                $answerQueryConn = mysqli_query($conn, $answerQuery);
                while ($answerRow = mysqli_fetch_array($answerQueryConn)) {
                    $answerText = $answerRow['answerText'];
                    $isCorrect = $answerRow['IsCorrect'];
                ?>
                        <li class="list-group-item <?php echo $isCorrect ? 'text-primary' : ''; ?>">
                            <?php echo $answerText ?>
                        </li>
                        <?php } ?>
                    </ol>
                </div>
            </div>
            <?php } ?>

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