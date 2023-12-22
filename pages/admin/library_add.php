<?php
session_start(); // Start the session
if (!isset($_SESSION['username'])) {
  header('Location: login.php'); // Redirect to the login page
  exit();
}
$username = isset($_SESSION['username']) ? $_SESSION['username'] : '';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fill out form</title>

   
    <!-- Stylesheets -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">

    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="js/datatables-simple-demo.js"></script>
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
   
    <style>
    .card-header {
       
       width: 100.2%;
        background-color: #ffffff; /* Set background color */
        border-radius: 5px; /* Optional: Add border-radius for rounded corners */
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Optional: Add box shadow for a subtle effect */
        
    }
    .card-danger{
      width: 200%;
    }
    .card-footer button {
        width: 100%; /* Set the desired width, for example, 100% */

    }
    #selectedDate {
        width: 100%;
    }
</style>
</head>

<body class="sidebar-mini layout-fixed" style="height: auto;">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">

      <li class="nav-item d-none d-sm-inline-block">
        <a href="library.php" class="nav-link">Back</a>
      </li>
    </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="#" class="brand-link">
            <img src="\CampusGate\dist\img\big.png" alt="CampusGate Logo"
                class="brand-image img-circle elevation-3">
            <span class="brand-text font-weight-heavy">Campus</span><span
                class="brand-text font-weight-light">Gate</span>
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
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
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
            <a href = "program_attendance.php" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>Student Attendance</p>
            </a>
            </li>
          <li class="nav-item">
            <a href = "library.php" class="nav-link active">
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
            <a href = "violations.php" class="nav-link ">
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
       <div class="content">
           <div class="container-fluid">
               <div class="row">
                   <div class="col-md-6">
                       <div class="card card-danger">
                           <div class="card-header">
                               <h3 class="card-title">Please input your details</h3>
                           </div>
                          
                               <div class="card-body">
                                   <div class="row">
                                       <div class="col-md-6">
                                       <form id ="form_new" action="process_library.php" method="POST" >


                                         <div class="form-group">
                                         <label>Select Date: <br></label>
                                         <input type="date" id="selectedDate" name="selectedDate" required>
                                         </div>


                                           <div class="form-group">
                                               <label>Student Number:</label>
                                               <input type="text" class="form-control" id="new_student_no" name="new_student_no" required>
                                           </div>


                                           <div class="form-group">
                                               <label>Full Name:</label>
                                               <input type="text" class="form-control" id="new_full_name" name="new_full_name" required>
                                           </div>
                                          
                                        
                                          
                                       </div>
                                       <div class="col-md-6">
                                       <div class="form-group">
                                                <label>Year Level</label>
                                                <select class="form-control" id="new_year" name="new_year" required>
                                                  <option selected="0">Choose</option>
                                                    <option value="1st Year">1st Year</option>
                                                    <option value="2nd Year">2nd Year</option>
                                                    <option value="3rd Year">3rd Year</option>
                                                    <option value="4th Year">4th Year</option>
                                                </select>
                                            </div>

                                       <div class="form-group">
                                                <label>Course:</label>
                                                <select class="form-control" id="new_course" name="new_course" required>
                                                  <option selected="default">Choose</option>
                                                  <option value="BSPsych">BS Psychology</option>
                                                    <option value="BSMath">BS Mathematics</option>
                                                    <option value="BSCS">BS Computer Science</option>
                                                    <option value="BSIT">BS Information Technology</option>
                                                    <option value="BSEMC">BS Entertainment and Multimedia Computing</option>
                                                    <option value="BPA">B Public Administration</option>
                                                    <option value="BAComm">BA Communication</option>
                                                    <option value="ABPolSci">AB Political Science</option>
                                                </select>
                                            </div>

                                           <div class="form-group">
                                                <label>Section:</label>
                                                <select class="form-control" id="new_section" name="new_section" required>
                                                  <option selected="0">Choose</option>
                                                    <option value="A">A</option>
                                                    <option value="B">B</option>
                                                    <option value="C">C</option>
                                                </select>
                                            </div>
                                   </div>
                               </div>
                               <div class="card-footer">
                                   <button type="submit" class="btn btn-danger" id = "btnAddNewRecord" name="btnAddNewRecord" value = "Add New Record">Submit</button>
                               </div>
                           </form>
                       </div>
                   </div>
               </div>
           </div>
       </div>
       <!-- End White Card Container for Form -->


   </div>  

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $selectedDate = $_POST["selectedDate"];
   echo "<p>Selected Date: </br>$selectedDate</p>";
}
?>
<script>
 $(function () {
 $('#form_new').validate({
   rules: {
     selectedDate: {
       required: true
     },
     new_student_no: {
       required: true
     },
     new_full_name: {
       required: true
     },
     new_year: {
       required: true
     },
     new_course: {
       required: true
     },
     new_section: {
       required: true
     },
    
   },
   messages: {
    
     selectedDate: {
       required: "Please provide date",
     },
     new_student_no: {
       required: "Please provide student number",
     },
     new_full_name: {
       required: "Please provide full name",
     },
     new_year: {
       required:"Please provide year level",
     },
     new_course: {
       required:"Please provide course",
     },
     new_section: {
       required:"Please provide section",
     },
     


   },
   errorElement: 'span',
   errorPlacement: function (error, element) {
     error.addClass('invalid-feedback');
     element.closest('.form-group').append(error);
   },
   highlight: function (element, errorClass, validClass) {
     $(element).addClass('is-invalid');
   },
   unhighlight: function (element, errorClass, validClass) {
     $(element).removeClass('is-invalid');
   }
 });
});
$(document).ready(function() {
            $("#form_new").submit(function (event) {
                event.preventDefault();
    if ($(this).valid()) { //changed
                    $.ajax({
                        type: "POST",
                        cache: false,
                        url: 'process_library.php',
                        data: $(this).serialize(),

                        success: function (data) {
                            var response_data = JSON.parse(data);
                            Swal.fire({
                                title: "Added",
                                text: "successfully!",
                                icon: "success"
                            })
                            setTimeout(function () {
                                location.reload();
                            }, 1000);

                        }
                    });
  } else {
    Swal.fire({title:"Warning", text:"Please enter required fields!", icon:"warning"})
          
  }

});
});


<?php
include "template/footer.php"; 
?>
</script>
</body>
</html>
