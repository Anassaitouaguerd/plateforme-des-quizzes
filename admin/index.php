<?php
require '../connection.php';
session_start();
if(!isset($_SESSION['id_user'])){
  header('location: ../admin/login.php'); 
}else if($_SESSION['roleUser']=="etudiants"){
   header('location: ../user/index.php'); 
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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">

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
$gestion = "ok";
$question = "ok";
 include "header.php";
 include "aside.php";

 ?>


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">

          <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
          <li class="breadcrumb-item active">Statistiques</li>
        </ol>
      </nav>
    </div>
    <section class="section dashboard">
<!--Content  ------------------------------------------------>
<div class="row">

<!-- Sales Card -->
<div class="col-xxl-4 col-md-6">
  <div class="card info-card sales-card">

    <div class="filter">
      <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
        <li class="dropdown-header text-start">
          <h6>Filter</h6>
        </li>

        <li><a class="dropdown-item" href="#">Today</a></li>
        <li><a class="dropdown-item" href="#">This Month</a></li>
        <li><a class="dropdown-item" href="#">This Year</a></li>
      </ul>
    </div>

    <div class="card-body">
      <h5 class="card-title">Cours <span>| Today</span></h5>
      <?php
      $querycours = "SELECT COUNT(courseID) FROM `course`";
      $querycoursconn = mysqli_query($conn,$querycours);
      $row = mysqli_fetch_array($querycoursconn);
      ?>
      <div class="d-flex align-items-center">
        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
        <i class="bi bi-book"></i>
        </div>
        <div class="ps-3">
          <h6><?= $row['COUNT(courseID)']?></h6>
          <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span>

        </div>
      </div>
    </div>

  </div>
</div><!-- End Sales Card -->

<!-- Revenue Card -->
<div class="col-xxl-4 col-md-6">
  <div class="card info-card revenue-card">

    <div class="filter">
      <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
        <li class="dropdown-header text-start">
          <h6>Filter</h6>
        </li>

        <li><a class="dropdown-item" href="#">Today</a></li>
        <li><a class="dropdown-item" href="#">This Month</a></li>
        <li><a class="dropdown-item" href="#">This Year</a></li>
      </ul>
    </div>

    <div class="card-body">
      <h5 class="card-title">Questions <span>| This Month</span></h5>
      <?php
      $queryquestion = "SELECT COUNT(questionID) FROM `question`";
      $queryquestionconn = mysqli_query($conn,$queryquestion);
      $row = mysqli_fetch_array($queryquestionconn);
      ?>
      <div class="d-flex align-items-center">
        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
          <i class="fa-solid fa-question" style="color: #60b342;"></i>
        </div>
        <div class="ps-3">
          <h6><?= $row['COUNT(questionID)']?></h6>
          <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span>

        </div>
      </div>
    </div>

  </div>
</div><!-- End Revenue Card -->
<!-- Customers Card -->
<div class="col-xxl-4 col-xl-12">

  <div class="card info-card customers-card">

    <div class="filter">
      <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
        <li class="dropdown-header text-start">
          <h6>Filter</h6>
        </li>

        <li><a class="dropdown-item" href="#">Today</a></li>
        <li><a class="dropdown-item" href="#">This Month</a></li>
        <li><a class="dropdown-item" href="#">This Year</a></li>
      </ul>
    </div>

    <div class="card-body">
      <h5 class="card-title">Lerners <span>| This Year</span></h5>
      <?php
      $queryusers = "SELECT COUNT(userID) FROM `users`";
      $queryusersconn = mysqli_query($conn,$queryusers);
      $row = mysqli_fetch_array($queryusersconn);
      ?>
      <div class="d-flex align-items-center">
        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
          <i class="bi bi-people"></i>
        </div>
        <div class="ps-3">
          <h6><?= $row['COUNT(userID)']?></h6>
          <span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span>

        </div>
      </div>

    </div>
  </div>

</div><!-- End Customers Card -->
<!-- Sales Card -->
<div class="col-xxl-4 col-md-6">
  <div class="card info-card sales-card">

    <div class="filter">
      <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
        <li class="dropdown-header text-start">
          <h6>Filter</h6>
        </li>

        <li><a class="dropdown-item" href="#">Today</a></li>
        <li><a class="dropdown-item" href="#">This Month</a></li>
        <li><a class="dropdown-item" href="#">This Year</a></li>
      </ul>
    </div>

    <div class="card-body">
      <h5 class="card-title">Cours <span>| Today</span></h5>
      <?php
      $querycours = "SELECT COUNT(courseID) FROM `course`";
      $querycoursconn = mysqli_query($conn,$querycours);
      $row = mysqli_fetch_array($querycoursconn);
      ?>
      <div class="d-flex align-items-center">
        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
        <i class="bi bi-book"></i>
        </div>
        <div class="ps-3">
          <h6><?= $row['COUNT(courseID)']?></h6>
          <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span>

        </div>
      </div>
    </div>

  </div>
</div><!-- End Sales Card -->
<!-- Revenue Card -->
<div class="col-xxl-4 col-md-6">
  <div class="card info-card revenue-card">

    <div class="filter">
      <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
        <li class="dropdown-header text-start">
          <h6>Filter</h6>
        </li>

        <li><a class="dropdown-item" href="#">Today</a></li>
        <li><a class="dropdown-item" href="#">This Month</a></li>
        <li><a class="dropdown-item" href="#">This Year</a></li>
      </ul>
    </div>

    <div class="card-body">
      <h5 class="card-title">Result Quiz Avrege Score <span>| This Month</span></h5>
      <?php
      $queryquestion = "SELECT AVG(score) FROM `quizresult`";
      $queryquestionconn = mysqli_query($conn,$queryquestion);
      $row = mysqli_fetch_array($queryquestionconn);
      ?>
      <div class="d-flex align-items-center">
        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
        <i class="bi bi-kanban"></i>
        </div>
        <div class="ps-3">
          <h6><?= $row['AVG(score)']?></h6>
          <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span>

        </div>
      </div>
    </div>
  </div>
</div><!-- End Revenue Card -->
<div class="row">
  <div class="card col-md-6">
            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
              </ul>
            </div>

            <div class="card-body pb-0">
              <h5 class="card-title">Budget Report <span>| This Month</span></h5>

              <div id="budgetChart" style="min-height: 400px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);" class="echart" _echarts_instance_="ec_1701771019328"><div style="position: relative; width: 458px; height: 400px; padding: 0px; margin: 0px; border-width: 0px; cursor: default;"><canvas data-zr-dom-id="zr_0" width="458" height="400" style="position: absolute; left: 0px; top: 0px; width: 458px; height: 400px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); padding: 0px; margin: 0px; border-width: 0px;"></canvas></div></div>

              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  var budgetChart = echarts.init(document.querySelector("#budgetChart")).setOption({
                    legend: {
                      data: ['Allocated Budget', 'Actual Spending']
                    },
                    radar: {
                      // shape: 'circle',
                      indicator: [{
                          name: 'Sales',
                          max: 6500
                        },
                        {
                          name: 'Administration',
                          max: 16000
                        },
                        {
                          name: 'Information Technology',
                          max: 30000
                        },
                        {
                          name: 'Customer Support',
                          max: 38000
                        },
                        {
                          name: 'Development',
                          max: 52000
                        },
                        {
                          name: 'Marketing',
                          max: 25000
                        }
                      ]
                    },
                    series: [{
                      name: 'Budget vs spending',
                      type: 'radar',
                      data: [{
                          value: [4200, 3000, 20000, 35000, 50000, 18000],
                          name: 'Allocated Budget'
                        },
                        {
                          value: [5000, 14000, 28000, 26000, 42000, 21000],
                          name: 'Actual Spending'
                        }
                      ]
                    }]
                  });
                });
              </script>

            </div>
          </div>
          <div class="card col-md-6">
            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
              </ul>
            </div>

            <div class="card-body pb-0">
              <h5 class="card-title">Website Traffic <span>| Today</span></h5>

              <div id="trafficChart" style="min-height: 400px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); position: relative;" class="echart" _echarts_instance_="ec_1701771019329"><div style="position: relative; width: 458px; height: 400px; padding: 0px; margin: 0px; border-width: 0px; cursor: default;"><canvas data-zr-dom-id="zr_0" width="458" height="400" style="position: absolute; left: 0px; top: 0px; width: 458px; height: 400px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); padding: 0px; margin: 0px; border-width: 0px;"></canvas></div><div class="" style="position: absolute; display: block; border-style: solid; white-space: nowrap; z-index: 9999999; box-shadow: rgba(0, 0, 0, 0.2) 1px 2px 10px; transition: opacity 0.2s cubic-bezier(0.23, 1, 0.32, 1) 0s, visibility 0.2s cubic-bezier(0.23, 1, 0.32, 1) 0s, transform 0.4s cubic-bezier(0.23, 1, 0.32, 1) 0s; background-color: rgb(255, 255, 255); border-width: 1px; border-radius: 4px; color: rgb(102, 102, 102); font: 14px / 21px &quot;Microsoft YaHei&quot;; padding: 10px; top: 0px; left: 0px; transform: translate3d(255px, 337px, 0px); border-color: rgb(145, 204, 117); pointer-events: none; visibility: hidden; opacity: 0;"><div style="margin: 0px 0 0;line-height:1;"><div style="font-size:14px;color:#666;font-weight:400;line-height:1;">Access From</div><div style="margin: 10px 0 0;line-height:1;"><div style="margin: 0px 0 0;line-height:1;"><span style="display:inline-block;margin-right:4px;border-radius:10px;width:10px;height:10px;background-color:#91cc75;"></span><span style="font-size:14px;color:#666;font-weight:400;margin-left:2px">Direct</span><span style="float:right;margin-left:20px;font-size:14px;color:#666;font-weight:900">735</span><div style="clear:both"></div></div><div style="clear:both"></div></div><div style="clear:both"></div></div></div></div>

              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  echarts.init(document.querySelector("#trafficChart")).setOption({
                    tooltip: {
                      trigger: 'item'
                    },
                    legend: {
                      top: '5%',
                      left: 'center'
                    },
                    series: [{
                      name: 'Access From',
                      type: 'pie',
                      radius: ['40%', '70%'],
                      avoidLabelOverlap: false,
                      label: {
                        show: false,
                        position: 'center'
                      },
                      emphasis: {
                        label: {
                          show: true,
                          fontSize: '18',
                          fontWeight: 'bold'
                        }
                      },
                      labelLine: {
                        show: false
                      },
                      data: [{
                          value: 1048,
                          name: 'Search Engine'
                        },
                        {
                          value: 735,
                          name: 'Direct'
                        },
                        {
                          value: 580,
                          name: 'Email'
                        },
                        {
                          value: 484,
                          name: 'Union Ads'
                        },
                        {
                          value: 300,
                          name: 'Video Ads'
                        }
                      ]
                    }]
                  });
                });
              </script>

            </div>
          </div>
</div>

<!-- Reports -->
<div class="col-12">
  <div class="card">

    <div class="filter">
      <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
        <li class="dropdown-header text-start">
          <h6>Filter</h6>
        </li>

        <li><a class="dropdown-item" href="#">Today</a></li>
        <li><a class="dropdown-item" href="#">This Month</a></li>
        <li><a class="dropdown-item" href="#">This Year</a></li>
      </ul>
    </div>

<!-- Recent Sales -->
<div class="col-12">
  <div class="card recent-sales overflow-auto">

    <div class="filter">
      <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
        <li class="dropdown-header text-start">
          <h6>Filter</h6>
        </li>

        <li><a class="dropdown-item" href="#">Today</a></li>
        <li><a class="dropdown-item" href="#">This Month</a></li>
        <li><a class="dropdown-item" href="#">This Year</a></li>
      </ul>
    </div>

    <div class="card-body">
      <h5 class="card-title">Recent Sales <span>| Today</span></h5>

      <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns"><div class="datatable-top">
<div class="datatable-dropdown">
<label>
    <select class="datatable-selector"><option value="5">5</option><option value="10" selected="">10</option><option value="15">15</option><option value="-1">All</option></select> entries per page
</label>
</div>
<div class="datatable-search">
<input class="datatable-input" placeholder="Search..." type="search" title="Search within table">
</div>
</div>
<div class="datatable-container"><table class="table table-borderless datatable datatable-table"><thead><tr><th data-sortable="true" style="width: 10.703363914373089%;"><button class="datatable-sorter">#</button></th><th data-sortable="true" style="width: 23.44546381243629%;"><button class="datatable-sorter">Customer</button></th><th data-sortable="true" style="width: 39.347604485219165%;"><button class="datatable-sorter">Product</button></th><th data-sortable="true" style="width: 11.722731906218145%;"><button class="datatable-sorter">Price</button></th><th data-sortable="true" class="red" style="width: 14.780835881753312%;"><button class="datatable-sorter">Status</button></th></tr></thead><tbody><tr data-index="0"><td><a href="#">#2457</a></td><td>Brandon Jacob</td><td><a href="#" class="text-primary">At praesentium minu</a></td><td>$64</td><td class="green"><span class="badge bg-success">Approved</span></td></tr><tr data-index="1"><td><a href="#">#2147</a></td><td>Bridie Kessler</td><td><a href="#" class="text-primary">Blanditiis dolor omnis similique</a></td><td>$47</td><td class="green"><span class="badge bg-warning">Pending</span></td></tr><tr data-index="2"><td><a href="#">#2049</a></td><td>Ashleigh Langosh</td><td><a href="#" class="text-primary">At recusandae consectetur</a></td><td>$147</td><td class="green"><span class="badge bg-success">Approved</span></td></tr><tr data-index="3"><td><a href="#">#2644</a></td><td>Angus Grady</td><td><a href="#" class="text-primar">Ut voluptatem id earum et</a></td><td>$67</td><td class="green"><span class="badge bg-danger">Rejected</span></td></tr><tr data-index="4"><td><a href="#">#2644</a></td><td>Raheem Lehner</td><td><a href="#" class="text-primary">Sunt similique distinctio</a></td><td>$165</td><td class="green"><span class="badge bg-success">Approved</span></td></tr></tbody></table></div>
<div class="datatable-bottom">
<div class="datatable-info">Showing 1 to 5 of 5 entries</div>
<nav class="datatable-pagination"><ul class="datatable-pagination-list"></ul></nav>
</div></div>

    </div>

  </div>
</div><!-- End Recent Sales -->

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
