<?php
include 'include/config.php';
session_start();
if (!isset($_SESSION['login'])) {
  header("location:login.php");
}
if(isset($_SESSION['email']))
{
  $teacher=$pdo->prepare("select * from teacher where id='{$_SESSION['teach_id']}'");
  $teacher->execute();
  $row6=$teacher->fetch(PDO::FETCH_ASSOC);
}
$short_name = "select * from admin";
$sql5 = $pdo->prepare($short_name);
$sql5->execute();
$row5 = $sql5->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $row5['short_name'] ?> | Dashboard</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div>

    <?php
    include 'include/header.php';
    include 'include/sidebar.php';
    ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

      <section class="content">
        <div class="container-fluid ">
          <div class="row py-3">
            <!-- ./col -->
            <?php
            if(isset($_SESSION['username']))
            {
              ?>
                  <a href="exam.php?All_Teacher">
                    <div class="col-lg-3 col-6">
                      <!-- small card -->
                      <div class="small-box bg-warning">
                        <div class="inner">
                          <h3 class="mx-2"> Teacher</h3>
                          <p class="py-3"></p>
                        </div>
                        <div class="icon">
                          <i class="fas fa-file"></i>
                        </div>
                        <a href="index.php?All_Teacher" class="small-box-footer">
                          More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                      </div>
                    </div>
                  </a>
                  <a href="index.php?My_Student">
                    <div class="col-lg-3 col-6">
                      <!-- small card -->
                      <div class="small-box bg-warning">
                        <div class="inner">
                          <h3 class="mx-2"> Student</h3>
                          <p class="py-3"></p>
                        </div>
                        <div class="icon">
                          <i class="fas fa-user-plus"></i>
                        </div>
                        <a href="index.php?All_Students" class="small-box-footer">
                          More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                      </div>
                    </div>
                  </a>
                  <?php
            }elseif(isset($_SESSION['email']))
            {
              ?>
              <a href="index.php?My_Profile">
                <div class="col-lg-3 col-6">
                  <!-- small card -->
                  <div class="small-box bg-warning">
                    <div class="inner">
                      <h3 class="mx-2"> Profile</h3>
                      <p class="py-3"></p>
                    </div>
                    <div class="icon">
                      <i class="fas fa-user-plus"></i>
                    </div>
                    <a href="index.php?All_Students" class="small-box-footer">
                      More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                  </div>
                </div>
              </a>
            <?php
            }
            ?>
      </section>

    </div>
    <?php include 'include/footer.php'; ?>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="plugins/moment/moment.min.js"></script>
  <script src="plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.js"></script>
  <script src="dist/js/pages/dashboard.js"></script>
</body>

</html>