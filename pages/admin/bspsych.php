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
  <title>Student Attendance</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>
<body class="sidebar-mini layout-fixed" style="height: auto;">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">

      <li class="nav-item d-none d-sm-inline-block">
        <a href="program_attendance.php" class="nav-link">Back</a>
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
            <h1>BSPSYCH</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Student Attendance</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <?php
    require 'connection.inc.php';
  
    $sql_student = "SELECT * FROM student WHERE course = 'BsPsych' ORDER BY id ASC";
    $result_student = mysqli_query($conn, $sql_student);

    mysqli_close($conn);
    ?>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">List of Students</h3>
                <div class="float-right">
                  <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#modal-add-new"><i class="fas fa-user-plus"></i> Add New Record</button>
              </div>
              </div>
              
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th width = "5%">No.</th>
                    <th>Student Number</th>
                    <th>Full Name</th>
                    <th>Course</th>
                    <th>Year Level</th>
                    <th>Section</th>
                    <th>Date</th>
                    <th>Attendance</th>
                    <th width = "10%">Status</th>
                    <th width = "30%">Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  if (mysqli_num_rows($result_student) > 0) {
                    $i = 1;
                    // output data of each row
                    while($row = mysqli_fetch_assoc($result_student)) { ?>
                      <tr id = <?php echo $row["id"]; ?>>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $row["studnum"]; ?></td>
                        <td><?php echo $row["full_name"]; ?></td>
                        <td><?php echo $row["course"]; ?></td>
                        <td><?php echo $row["year"]; ?></td>
                        <td><?php echo $row["section"]; ?></td>
                        <td><?php echo $row["calDate"]; ?></td>
                    
                        <td>
                          <?php
                            if($row["attendance"])
                            {
                              echo '<span class="badge badge-info">Present</span>';
                            }
                            else
                            {
                              echo '<span class="badge badge-warning">Absent</span>';
                            }
                          ?>
                        </td>
                        <td>
                          <?php
                            if($row["status"])
                            {
                              echo '<span class="badge badge-success">Regular</span>';
                            }
                            else
                            {
                              echo '<span class="badge badge-danger">Irregular</span>';
                            }
                          ?>
                        </td>
                        <td>
                          <?php
                            if($row["status"])
                            { ?>
<button class="btn btn-primary btn-sm btn-irregular" style = "width: 100px;"><i class="fas fa-user-check"></i>Irregular</button>
                            <?php
                            }
                            else
                            { ?>
                              <button class="btn btn-primary btn-sm btn-regular" style = "width: 100px;">
                              <i class="fas fa-user-check"></i>
                              Regular
                              </button>
                        <?php
                           }
                          ?>
                          <button class="btn btn-info btn-sm btn-edit">
                              <i class="fas fa-pencil-alt"></i>
                              Edit
                          </button>
                          <button class="btn btn-danger btn-sm btn-delete">
                              <i class="fas fa-trash"></i>
                              Delete
                          </button>
                         
                          <?php
                            if($row["attendance"])
                            { ?>
<button class="btn btn-sm btn-warning btn-absent" style = "width: 100px;"><i class="fas fa-user-slash"></i>Absent</button>
                            <?php
                            }
                            else
                            { ?>
                              <button class="btn btn-info btn-sm btn-present" style = "width: 100px;">
                              <i class="fas fa-user-check"></i>
                              Present
                              </button>
                        <?php
                           }
                          ?>
                        </td>
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
        <form id = "form_new">
            <div class="modal fade" id="modal-add-new">
              <div class="modal-dialog modal-md">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">New Student</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <input type="hidden" name="type" id="type" value = "insert">

                    <div class="form-group">
                    <label>Select Date: <br></label>
                    <input type="date" id="calDate" name="calDate" required>
                    </div>
                    <div class="form-group">
                      <label>Student number</label>
                      <input type="text" class="form-control" name="new_student_number" id="new_student_number" placeholder="Student number" required>
                    </div>
                    <div class="form-group">
                      <label>Full Name</label>
                      <input type="text" class="form-control" name="new_full_name" id="new_full_name" placeholder="Full Name">
                    </div>

                    <div class="form-group">
                    <label>Course</label>
                    <select class="form-control" id="new_course" name="new_course" required>
                    <option value="BsPsych">BS in Psychology</option>
                    </select>
                    </div>   

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
                    <label>Section:</label>
                    <select class="form-control" id="new_section" name="new_section" required>
                    <option selected="0">Choose</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    </select>
                    </div>

                  </div>
                  <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" id = "btnAddNewRecord" value = "Add New Record">
                  </div>
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
        </form>
        <form id = "form_edit">
          <div class="modal fade edit" id="modal-edit">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Edit Student</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <input type="hidden" name="type" id="type" value = "edit">
                  <input type="hidden" name="edit_student_id" id="edit_student_id">

                  <div class="form-group">
                    <label>Select Date: <br></label>
                    <input type="date" id="calDate" name="calDate" required>
                    </div>

                  <div class="form-group">
                      <label>Student number</label>
                      <input type="text" class="form-control" name="edit_student_number" id="edit_student_number" placeholder="Student number">
                    </div>
                    <div class="form-group">
                      <label>Full Name</label>
                      <input type="text" class="form-control" name="edit_full_name" id="edit_full_name" placeholder="Full Name">
                    </div>

                <div class="form-group">
                    <label>Course</label>
                    <select class="form-control" id="edit_course" name="edit_course" required>
                    <option value="BsPsych">BS in Psychology</option>
                    </select>
                    </div>

                    <div class="form-group">
                    <label>Year Level</label>
                    <select class="form-control" id="edit_year" name="edit_year" required>
                    <option selected="0">Choose</option>
                    <option value="1st Year">1st Year</option>
                    <option value="2nd Year">2nd Year</option>
                    <option value="3rd Year">3rd Year</option>
                    <option value="4th Year">4th Year</option>
                    </select>
                    </div>

                    <div class="form-group">
                    <label>Section:</label>
                    <select class="form-control" id="edit_section" name="edit_section" required>
                    <option selected="0">Choose</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    </select>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <input type="submit" class="btn btn-primary" id = "btnEditRecord" value = "Update Record">
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <!-- /.modal -->
      </form>

      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<!-- Page specific script -->

<script>
  $(function () {

    $("#example1").DataTable({
      "responsive": true, "lengthChange": true, "autoWidth": false
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

  });

</script>
<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $calDate = $_POST["calDate"];
    echo "<p>Selected Date: </br>$calDate</p>";
}
?>
<script>
$(function () {
  $('#form_new').validate({
    rules: {
      new_student_number: {
        required: true
      },
      new_full_name: {
        required: true
      },
      new_course: {
        required: true
      },
      new_year: {
        required: true
      },
      new_section: {
        required: true,

      },   
     calDate: {
        required: true
      }

    },
    messages: {
   
      new_student_number: {
        required: "Please provide a student number",
      },
      new_full_name: {
        required: "Please provide a full name",
      },
      new_course: {
        required: "Please provide a course"
      },
      new_year: {
        required: "Please provide a year"
      },
      new_section: {
        required: "Please provide a section"
      },
      calDate: {
        required: "Please provide a date",
      }
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

$('#form_edit').validate({
    rules: {
  
      edit_student_number: {
        required: true
      },
      edit_full_name: {
        required: true
      },
      edit_course: {
        required: true
      },
      edit_year: {
        required: true
      },
      edit_section: {
        required: true
      },
      calDate: {
        required: true
      }

    },
    messages: {
  
      edit_student_number: {
        required: "Please provide a student number",
      },
      edit_full_name: {
        required: "Please provide a full name",
      },    
      edit_course: {
        required: "Please provide a course",
      },
      edit_year: {
        required: "Please provide a year",
      },
      edit_section: {
        required: "Please provide a section",
      },
      calDate: {
        required: "Please provide a date",
      }
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
</script>
<script>
$(document).ready(function() {
$("#form_new").submit(function(event) {
  event.preventDefault(); //prevent submit
  var form = $(this);

  if(form.valid() == true){
    $.ajax({
        type: "POST",
        cache: false,
        url: 'process_attendance.php',
        data: form.serialize(),
        success:function(data){
          var response_data = JSON.parse(data);
          Swal.fire({title:"Added", text:"succesfully!", icon:"success"})
          setTimeout(function(){location.reload();},1000);
        
        }
    });
  } else {
    Swal.fire({title:"Warning", text:"Please enter required fields!", icon:"warning"})
          
  }

});

$("#form_edit").submit(function(event) {
  event.preventDefault(); //prevent submit
  var form = $(this);

  if(form.valid() == true){
    $.ajax({
        type: "POST",
        cache: false,
        url: 'process_attendance.php',
        data: form.serialize(),
        success:function(data){
          var response_data = JSON.parse(data);
             Swal.fire({title:"Updated", text:"succesfully!", icon:"success"})
             setTimeout(function(){location.reload();},1000);
        }
    });
  } else {
    Swal.fire({title:"Warning", text:"Please enter required fields!", icon:"warning"})
  }

});
});

// for updated button
$('#example1 tbody').on('click','.btn-edit', function () {
  var student_id = $(this).closest("tr").attr('id');
  var student_number = $(this).closest("tr").attr('student_number');
  var full_name = $(this).closest("tr").attr('full_name');
  var course = $(this).closest("tr").attr('course');
  var year = $(this).closest("tr").attr('year');
  var section = $(this).closest("tr").attr('section');
  var calDate = $(this).closest("tr").attr('calDate');

    $.ajax({
        type: "POST",
        cache: false,
        url: 'process_attendance.php',
        data: { type: 'update', student_id: student_id },
        success: function (data) {
            var response_data = JSON.parse(data);
            if (response_data.icon == 'success') {
                Swal.fire(
                    'Updated!',
                    'Course has been successfully updated.',
                    'success'
                );

            } else {
                Swal.fire(
                    'Error!',
                    response_data.message,
                    'error'
                );
            }
        }
    });
});

$(document).ready(function() {

$('#example1 tbody').on('click', '.btn-present', function () {

  var student_id = $(this).closest("tr").attr('id');
  var $attendance = $(this).closest("tr").children(":eq(7)");
  var $status = $(this).closest("tr").children(":eq(8)");
  var $actions = $(this).closest("tr").children(":eq(9)");


  $.ajax({
        type: "POST",
        cache: false,
        url: 'process_attendance.php',
        data: {type:'present',student_id:student_id},
        success:function(data){
          var response_data = JSON.parse(data);

          if(response_data.title == 'Success')
          {
            $attendance.html('<span class="badge badge-info">Present</span>');
            $actions.html($actions.html().toString().replace('btn-present','btn-absent').replace('fas fa-user-check', 'fas fa-user-slash').replace('Present', 'Absent'));

          }

          Swal.fire({title:"Attendance", text:"Student is Present!", icon:"success"})
          setTimeout(function(){location.reload();},1000);
        }
    });
});

$('#example1 tbody').on('click', '.btn-absent', function () {

  var student_id = $(this).closest("tr").attr('id');
  var $attendance = $(this).closest("tr").children(":eq(7)");
  var $actions = $(this).closest("tr").children(":eq(9)");

$.ajax({
      type: "POST",
      cache: false,
      url: 'process_attendance.php',
      data: {type:'absent',student_id:student_id},
      success:function(data){
        var response_data = JSON.parse(data);
        

      if(response_data.title == 'Success')
      {
        $attendance.html('<span class="badge badge-warning">Absent</span>');
        $actions.html($actions.html().toString().replace('btn-absent','btn-present').replace('fas fa-user-slash', 'fas fa-user-check').replace('Absent', 'Present'));
      }

      Swal.fire({title:"Attendance", text:"Student is absent!", icon:"warning"})
      setTimeout(function(){location.reload();},1000);
      }
  });

});

$('#example1 tbody').on('click', '.btn-regular', function () {

var student_id = $(this).closest("tr").attr('id');
var $status = $(this).closest("tr").children(":eq(8)");
var $actions = $(this).closest("tr").children(":eq(9)");


$.ajax({
      type: "POST",
      cache: false,
      url: 'process_attendance.php',
      data: {type:'regular',student_id:student_id},
      success:function(data){
        var response_data = JSON.parse(data);

        if(response_data.title == 'Success')
        {
          $status.html('<span class="badge badge-success">Regular</span>');
          $actions.html($actions.html().toString().replace('btn-regular','btn-irregular').replace('fas fa-user-check', 'fas fa-user-slash').replace('Regular', 'Irregular'));

        }

        Swal.fire({title:"Status", text:"Student is Regular!", icon:"success"})
        setTimeout(function(){location.reload();},1000);
      }
  });
});

$('#example1 tbody').on('click', '.btn-irregular', function () {

var student_id = $(this).closest("tr").attr('id');
var $status = $(this).closest("tr").children(":eq(8)");
var $actions = $(this).closest("tr").children(":eq(9)");


$.ajax({
      type: "POST",
      cache: false,
      url: 'process_attendance.php',
      data: {type:'irregular',student_id:student_id},
      success:function(data){
        var response_data = JSON.parse(data);

        if(response_data.title == 'Success')
        {
          $status.html('<span class="badge badge-success">Irregular</span>');
          $actions.html($actions.html().toString().replace('btn-irregular','btn-regular').replace('fas fa-user-check', 'fas fa-user-check').replace('Irregular', 'Regular'));

        }

        Swal.fire({title:"Status", text:"Student is Irregular!", icon:"success"})
        setTimeout(function(){location.reload();},1000);
      }
  });
});


$('#example1 tbody').on('click', '.btn-edit', function () {

  document.getElementById("edit_student_id").value = $(this).closest("tr").attr('id');
  document.getElementById("edit_student_number").value = $(this).closest("tr").children(":eq(1)").text();
  document.getElementById("edit_full_name").value = $(this).closest("tr").children(":eq(2)").text();
  document.getElementById("edit_course").value = $(this).closest("tr").children(":eq(3)").text();
  document.getElementById("edit_year").value = $(this).closest("tr").children(":eq(4)").text();
  document.getElementById("edit_section").value = $(this).closest("tr").children(":eq(5)").text();
  document.getElementById("calDate").value = $(this).closest("tr").children(":eq(6)").text();

  $('#modal-edit').modal('show');

});

$('#example1 tbody').on('click', '.btn-delete', function () {
    var student_id = $(this).closest("tr").attr('id');
    var $student_row = $(this).closest("tr");

    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "POST",
                cache: false,
                url: 'process_attendance.php',
                data: { type: 'delete', student_id: student_id },
                success: function (data) {
                    var response_data = JSON.parse(data);
                    if (response_data.icon == 'success') {
                      
                        $student_row.remove();

                        Swal.fire(
                            'Deleted!',
                            'Student has been deleted.',
                            'success'
                        )
                        setTimeout(function(){location.reload();},1000);
                    }
                }
            });
        }
    });
});


});


</script>

</body>
</html>
