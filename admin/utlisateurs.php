<?php require "../connection.php" ; ?>
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
$question = "ok";
 include "header.php";
 include "aside.php";

 ?>

        <div class="pagetitle">
            <h1>Accueil</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Accueil</a></li>
                    <li class="breadcrumb-item active">Gestion des Utilisateurs </li>
                </ol>
            </nav>
        </div>

        <section class="section dashboard">
            <!--Content  ------------------------------------------------>
            <button type="submit" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#adduser">Ajoute
                une Utilisateur </button>
            <div class="modal fade" id="adduser" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Vertically Centered</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Utlisateur Information</h5>

                                    <!-- Floating Labels Form -->
                                    <form class="row g-3" method="POST" action="crud_users.php">
                                        <div class="col-md-12">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="floatingName"
                                                    placeholder="Your Name" name="name_user">
                                                <label for="floatingName">Nom Utlisateur</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-floating">
                                                <input type="email" class="form-control" id="floatingName"
                                                    placeholder="Your Name" name="email_user">
                                                <label for="floatingName">Email</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="floatingName">Role Utlisateur</label>
                                            <select name="role_user" class="form-control" id="">
                                                <option value="etudiants">etudiants</option>
                                                <option value="admin">Admin</option>
                                            </select>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="floatingName"
                                                    placeholder="Your Name" name="pass_user">
                                                <label for="floatingName">Mote de pass</label>
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary" data-bs-dismiss="modal"
                                                name="save_user">save</button>
                                            <button type="reset" class="btn btn-secondary"
                                                data-bs-dismiss="modal">close</button>
                                        </div>
                                    </form><!-- End floating Labels Form -->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table align-middle mb-0 bg-white shadow">
                <thead class="bg-light">

                    <tr>
                        <th>Nom et Prenom</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $SQL_AFF_USER = "SELECT * FROM users ";
                    $result_aff_user = mysqli_query($conn,$SQL_AFF_USER);
                    if($result_aff_user){
                      foreach($result_aff_user as $rows){                 
                    ?>
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <img src="https://mdbootstrap.com/img/new/avatars/8.jpg" alt=""
                                    style="width: 45px; height: 45px" class="rounded-circle" />
                                <div class="ms-3">
                                    <p class="fw-bold mb-1"><?php echo $rows['username'] ; ?></p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <p class="fw-bold mb-1"><?php echo $rows['email'] ; ?></p>
                        </td>
                        <td>
                            <span class="badge btn btn-success"><?php echo $rows['role'] ; ?></span>
                        </td>
                        <td>
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                data-bs-target="#updateUser<?php echo $rows['userID']?>">Modifie</button>

                            <!-- ================================================ modal editing ========================================= -->
                            <div class="modal fade" id="updateUser<?php echo $rows['userID']?>" tabindex="-1">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Vertically Centered</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title">Utlisateur Information</h5>
                                                    <!-- Floating Labels Form -->
                                                    <form class="row g-3" method="POST" action="crud_users.php">
                                                        <div class="col-md-12">
                                                            <div class="form-floating">
                                                                <input type="hidden"
                                                                    value="<?php echo $rows['userID'] ; ?>"
                                                                    name="id_user">
                                                                <input type="text"
                                                                    value="<?php echo $rows['username']?>"
                                                                    class="form-control" id="floatingName"
                                                                    placeholder="Your Name" name="name_user">
                                                                <label for="floatingName">Nom Utlisateur</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-floating">
                                                                <input type="email" value="<?php echo $rows['email']?>"
                                                                    class="form-control" id="floatingName"
                                                                    name="email_user" placeholder="Your Name">
                                                                <label for="floatingName">Email</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label for="floatingName">Role Utlisateur</label>
                                                            <select name="role_user" class="form-control" id="">
                                                                <option value="etudiants">etudiants</option>
                                                                <option value="admin">Admin</option>
                                                            </select>
                                                        </div>

                                                        <div class="text-center">
                                                            <button type="submit" class="btn btn-primary"
                                                                data-bs-dismiss="modal" name="update_user">save
                                                                changes</button>
                                                            <button type="reset" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">close</button>
                                                        </div>
                                                    </form><!-- End floating Labels Form -->

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- =========================================================================================================== -->
                            <a href="crud_users.php?id_user=<?php echo $rows['userID']?>" name="delet_user"
                                type="button" class="btn btn-danger">Supreme</a>
                        </td>
                    </tr>
                    <?php 
                      }
                    }
                    ?>
                </tbody>
            </table>

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
