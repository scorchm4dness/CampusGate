<?php
session_start(); // Start the session
if (!isset($_SESSION['username'])) {
  header('Location: login.php'); // Redirect to the login page
  exit();
}
include('connection.inc.php');
$username = isset($_SESSION['username']) ? $_SESSION['username'] : '';

$sql = "SELECT COUNT(*) AS total_bscs FROM student WHERE course = 'BSCS'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$totalBscs = $row['total_bscs'];

$sql = "SELECT COUNT(*) AS total_bsis FROM student WHERE course = 'BSIS'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$totalBsis = $row['total_bsis'];

$sql = "SELECT COUNT(*) AS total_bsit FROM student WHERE course = 'BSIT'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$totalBsit = $row['total_bsit'];

$sql = "SELECT COUNT(*) AS total_bsemc FROM student WHERE course = 'BSEMC'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$totalBsemc = $row['total_bsemc'];

$sql = "SELECT COUNT(*) AS total_bspsych FROM student WHERE course = 'BsPsych'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$totalBspsych = $row['total_bspsych'];

$sql = "SELECT COUNT(*) AS total_bsmath FROM student WHERE course = 'BsMath'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$totalBsmath = $row['total_bsmath'];

$sql = "SELECT COUNT(*) AS total_bpa FROM student WHERE course = 'BPA'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$totalBpa = $row['total_bpa'];

$sql = "SELECT COUNT(*) AS total_bacomm FROM student WHERE course = 'BAComm'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$totalBacomm = $row['total_bacomm'];

$sql = "SELECT COUNT(*) AS total_polsci FROM student WHERE course = 'Polsci'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$totalPolsci = $row['total_polsci'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Students</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>
<body class="sidebar-mini layout-fixed" style="height: auto;">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">

      <li class="nav-item d-none d-sm-inline-block">
        <a href="dashboard.php" class="nav-link">Home</a>
      </li>
    </ul>


  </nav>
  <!-- /.navbar -->

<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="\CampusGate\dist\img\big.png" alt="CampusGateLogo" class="brand-image img-circle elevation-3">
      <span class="brand-text font-weight-heavy">Campus</span><span class="brand-text font-weight-light">Gate</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">

        <div class="info">
          <a href="#" class="d-block">Welcome <?php echo $username; ?>!</a>
        </div>
      </div>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-header">WELCOME</li>
               <li class="nav-item">
            <a href = "dashboard.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-header">MANAGE</li>
          <li class="nav-item">
            <a href = "program_attendance.php" class="nav-link active">
              <i class="nav-icon fas fa-user"></i>
              <p>Student Attendance</p>
            </a>
            </li>
          <li class="nav-item">
            <a href = "library.php" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>Library</p>
            </a>
            </li>
            <li class="nav-item">
            <a href = "guest.php" class="nav-link">
              <i class="nav-icon fas fa-id-card"></i>
              <p>Guest</p>
            </a>
          </li>
          <li class="nav-item">
            <a href = "violations.php" class="nav-link">
              <i class="nav-icon fas fa-exclamation-triangle"></i>
              <p>Violations</p>
            </a>
          </li>


          <li class="nav-header">ACCOUNT</li>
            <li class="nav-item">
            <a href="logout.php" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>Logout</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Courses</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                        <li class="breadcrumb-item active">Student Attendance</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-danger text-white mb-4">
                        <div class="card-body">
                            <p class="md text-white"><strong><?php echo $totalBscs .' students'; ?></strong></p>
                            <p class="small text-white mb-0">BSCS</p>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="bscs.php">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                    <div class="card bg-info text-white mb-4">
                        <div class="card-body">
                            <p class="md text-white"><strong><?php echo $totalBsis .' students'; ?></strong></p>
                            <p class="small text-white mb-0">BSIS</p>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="bsis.php">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                    <div class="card bg-success text-white mb-4">
                        <div class="card-body">
                            <p class="md text-white"><strong><?php echo $totalBsit .' students'; ?></strong></p>
                            <p class="small text-white mb-0">BSIT</p>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="bsit.php">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body">
                            <p class="md text-white"><strong><?php echo $totalBsemc .' students'; ?></strong></p>
                            <p class="small text-white mb-0">BSEMC</p>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="bsemc.php">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                    <div class="card bg-warning text-white mb-4">
                        <div class="card-body">
                            <p class="md text-white"><strong><?php echo $totalBspsych .' students'; ?></strong></p>
                            <p class="small text-white mb-0">BSPsych</p>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="bspsych.php">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                    <div class="card bg-success text-white mb-4">
                        <div class="card-body">
                            <p class="md text-white"><strong><?php echo $totalBsmath .' students'; ?></strong></p>
                            <p class="small text-white mb-0">BSMath</p>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="bsmath.php">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                    <div class="card bg-danger text-white mb-4">
                        <div class="card-body">
                            <p class="md text-white"><strong><?php echo $totalBpa .' students'; ?></strong></p>
                            <p class="small text-white mb-0">BPA</p>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="bpa.php">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                    <div class="card bg-info text-white mb-4">
                        <div class="card-body">
                            <p class="md text-white"><strong><?php echo $totalBacomm .' students'; ?></strong></p>
                            <p class="small text-white mb-0">BAComm</p>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="bacomm.php">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body">
                            <p class="md text-white"><strong><?php echo $totalPolsci .' students'; ?></strong></p>
                            <p class="small text-white mb-0">ABPolsci</p>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="polsci.php">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                </div>
            </div>
        </main>
    </div>
</div>

<?php 
include "template/footer.php"; 
?>

</body>
</html>
