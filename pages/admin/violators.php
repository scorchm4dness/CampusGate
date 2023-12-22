<?php
session_start(); // Start the session
if (!isset($_SESSION['username'])) {
  header('Location: login.php'); // Redirect to the login page
  exit();
}

$username = isset($_SESSION['username']) ? $_SESSION['username'] : '';
?>

  <!-- code from course.php -->
  <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>List</title>

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

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>
<body class="sidebar-mini layout-fixed" style="height: auto;">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">

      <li class="nav-item d-none d-sm-inline-block">
        <a href="violations.php" class="nav-link">Back</a>
      </li>
    </ul>
    
  </nav>
  <!-- /.navbar -->

<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="\CampusGate\dist\img\big.png" alt="CampusGate Logo" class="brand-image img-circle elevation-3">
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
            <a href = "dashboard.php" class="nav-link ">
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
            <a href = "violations.php" class="nav-link active">
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
            <h1>List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">List</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <?php
    require 'connection.inc.php';
    include('connection.inc.php');
    $sql_violation = "SELECT * FROM stud_violation ORDER BY id ASC";
    $result_violation = mysqli_query($conn, $sql_violation);

    mysqli_close($conn);
    ?>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <div class="float-right">
              </div>
              </div>
              
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No.</th>
                    <th>Selected Date</th>
                    <th>Student Number</th>
                    <th>Full Name</th>
                    <th>Year Level</th>
                    <th>Course</th>
                    <th>Section</th>
                    <th>Frequency</th>
                    <th>Violation</th>
                    <th>Violation Type</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  if (mysqli_num_rows($result_violation) > 0) {
                    $i = 1;
                    // output data of each row
                    while($row = mysqli_fetch_assoc($result_violation)) { ?>
                      <tr id = <?php echo $row["id"]; ?>>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $row["selectedDate"]; ?></td>
                        <td><?php echo $row["stud_no"]; ?></td>
                        <td><?php echo $row["full_name"]; ?></td>
                        <td><?php echo $row["year_level"]; ?></td>
                        <td><?php echo $row["course"]; ?></td>
                        <td><?php echo $row["section"]; ?></td>
                        <td><?php echo $row["frequency"]; ?></td>
                        <td><?php echo $row["violation"]; ?></td>
                        <td><?php echo $row["violation_type"]; ?></td>
                      </tr>
                    <?php $i++; }
                  }
                  ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        

      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
<!-- Page specific script -->
<?php 
include "template/footer.php"; 
?>
<script>
  $(function () {

    $("#example1").DataTable({
      "responsive": true, "lengthChange": true, "autoWidth": true
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

  });


</script>
</body>
</html>
