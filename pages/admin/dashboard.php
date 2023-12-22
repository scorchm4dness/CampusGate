<?php
session_start(); // Start the session
if (!isset($_SESSION['username'])) {
  header('Location: login.php'); // Redirect to the login page
  exit();
}
include('connection.inc.php');
$username = isset($_SESSION['username']) ? $_SESSION['username'] : '';

//student_attendance
$sql = "SELECT COUNT(*) as total_students FROM student";
$result = $conn->query($sql);

$totalStudents = 0;

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $totalStudents = $row['total_students'];
}
//library_attendance
$sqlLibrary = "SELECT COUNT(*) as total_library_students FROM library";
$resultLibrary = $conn->query($sqlLibrary);

$totalLibraryStudents = 0;

if ($resultLibrary->num_rows > 0) {
    $rowLibrary = $resultLibrary->fetch_assoc();
    $totalLibraryStudents = $rowLibrary['total_library_students'];
}
//guests
$sqlGuests = "SELECT COUNT(*) as total_guests FROM guests";
$resultGuests = $conn->query($sqlGuests);

$totalGuests = 0;

if ($resultGuests->num_rows > 0) {
    $rowGuests = $resultGuests->fetch_assoc();
    $totalGuests = $rowGuests['total_guests'];
}
//violation
$sqlViolation = "SELECT COUNT(*) as total_violation FROM stud_violation";
$resultViolation = $conn->query($sqlViolation);

$totalViolation = 0;

if ($resultViolation->num_rows > 0) {
    $rowViolation = $resultViolation->fetch_assoc();
    $totalViolation = $rowViolation['total_violation'];
}
//barchart
$sqlCourses = "SELECT course, COUNT(*) as total_students FROM student GROUP BY course";
$resultCourses = $conn->query($sqlCourses);

$courseLabels = [];
$studentCountPerCourse = [];

if ($resultCourses->num_rows > 0) {
    while ($rowCourse = $resultCourses->fetch_assoc()) {
        $courseLabels[] = $rowCourse['course'];
        $studentCountPerCourse[] = $rowCourse['total_students'];
    }
}
// Fetch student data per year level
$sqlYearLevel = "SELECT year, COUNT(*) as total_students FROM student GROUP BY year";
$resultYearLevel = $conn->query($sqlYearLevel);

$yearLabels = [];
$studentCountPerYear = [];

if ($resultYearLevel->num_rows > 0) {
  while ($rowYear = $resultYearLevel->fetch_assoc()) {
      $yearLabels[] = $rowYear['year']. " Year" ;
      $studentCountPerYear[] = $rowYear['total_students'];
  }
}
$conn->close();
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="js/scripts.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
  <script src="assets/demo/chart-area-demo.js"></script>
  <script src="assets/demo/chart-bar-demo.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
 <!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../../plugins/chart.js/Chart.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- Page specific script -->
<!-- Add the following script after the existing script -->
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
    <a class="brand-link">
      <img src="\CampusGate\dist\img\big.png" alt="CampusGate Logo" class="brand-image img-circle elevation-3">
      <span class="brand-text font-weight-heavy">Campus</span><span class="brand-text font-weight-light">Gate</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a  class="d-block">Welcome <?php echo $username; ?>!</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-header">WELCOME</li>
               <li class="nav-item">
            <a href = "#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-header">MANAGE</li>
          <li class="nav-item">
            <a href = "program_attendance.php" class="nav-link">
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
            <h1>Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <div id="layoutSidenav_content">
                <main>
                <div class="container-fluid px-4">
            <div class="row">

                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body">
                            <p class="md text-white"><strong><?php echo $totalStudents .' students'; ?></strong></p>
                            <p class="small text-white mb-0">Student Attendance</p>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="program_attendance.php">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">
                                    <p class="md text-white"><strong><?php echo $totalLibraryStudents .' students'; ?></strong></p>
                                   <p class="small text-white mb-0">Library</p>
                              </div>
                              <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="library.php">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>                                    </div>
                                </div>
                            </div>
                    
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                <div class="card-body">
                                    <p class="md text-white"><strong><?php echo $totalGuests .' guests'; ?></strong></p>
                                   <p class="small text-white mb-0">Guests</p>
                              </div>
                              <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="guest.php">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">
                                    <p class="md text-white"><strong><?php echo $totalViolation .' students'; ?></strong></p>
                                   <p class="small text-white mb-0">Violations</p>
                              </div>
                              <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="violations.php">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
           <!-- PIE CHART -->
           <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Students per Year level</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            

          </div>
          <!-- /.col (LEFT) -->
          <div class="col-md-6">
    <!-- BAR CHART -->
    <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Students per Course</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col (RIGHT) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php 
include "template/footer.php"; 
?>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Add Content Here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->



<script>
  $(function () {
    // Define different data for each chart
    var pieData = {
        labels: <?php echo json_encode($yearLabels); ?>,
        datasets: [{
            data: <?php echo json_encode($studentCountPerYear); ?>,
            backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
        }]
    };

var barChartData = {
        labels: <?php echo json_encode($courseLabels); ?>,
        datasets: [{
          label: 'Students',
          backgroundColor: 'rgba(60,141,188,0.9)',
          borderColor: 'rgba(60,141,188,0.8)',
          pointRadius: false,
          pointColor: '#3b8bba',
          pointStrokeColor: 'rgba(60,141,188,1)',
          pointHighlightFill: '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data: <?php echo json_encode($studentCountPerCourse); ?>
        }]
      };

   
    // Update chart data with the new data
    new Chart(document.getElementById('pieChart'), {
    type: 'pie',
    data: {
        labels: <?php echo json_encode($yearLabels); ?>,
        datasets: [{
            data: <?php echo json_encode($studentCountPerYear); ?>,
            backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef'],
        }],
    },
    options: {
        maintainAspectRatio: false,
        responsive: true,
    },
});

    new Chart(document.getElementById('barChart'), {
        type: 'bar',
        data: barChartData,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            datasetFill: false,
            scales: {
                yAxes: [{
                    ticks: {
                      beginAtZero: true, // Start the axis at zero
                        stepSize: 1,
                        callback: function (value, index, values) {
                            return value; // Display the actual value as the label
                        }
                    }
                }]
            }
        }
    });
});
  $(document).ready(function () {
  // Collapse all chart widgets
  $('.card .btn-tool[data-card-widget="collapse"]').each(function () {
    var $collapseButton = $(this);
    var $card = $collapseButton.closest('.card');
    $collapseButton.click(); // Simulate a click on the collapse button
    $card.on('collapsed.lte.cardwidget', function () {
      $card.off('collapsed.lte.cardwidget'); // Remove the event listener after collapse
    });
  });
});
</script>

</body>
</html>
