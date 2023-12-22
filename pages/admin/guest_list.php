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
  <title>Guest List</title>

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
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>
<body class="sidebar-mini layout-fixed" style="height: auto;">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">

      <li class="nav-item d-none d-sm-inline-block">
        <a href="guest.php" class="nav-link">Back</a>
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
            <a href = "guest.php" class="nav-link active">
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
            <h1>Guest List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Guest List</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <?php
    require 'connection.inc.php';
  include('connection.inc.php');
    $sql_guests = "SELECT * FROM guests ORDER BY id ASC";
    $result_guests = mysqli_query($conn, $sql_guests);

    mysqli_close($conn);
    ?>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">List of Guests</h3>
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
                    <th>Full Name</th>
                    <th>Contact Number</th>
                    <th>Gender</th>
                    <th>Age</th>
                    <th>Reason</th>
                    <th>DateTime Visited</th>
                    <th width = "30%">Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  if (mysqli_num_rows($result_guests) > 0) {
                    $i = 1;
                    // output data of each row
                    while($row = mysqli_fetch_assoc($result_guests)) { ?>
                      <tr id = <?php echo $row["id"]; ?>>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $row["full_name"]; ?></td>
                        <td><?php echo $row["contact_no"]; ?></td>
                        <td><?php echo $row["gender"]; ?></td>
                        <td><?php echo $row["age"]; ?></td>
                        <td><?php echo $row["reason"]; ?></td>
                        <td><?php echo $row["date_time_visited"]; ?></td>
                    
                        <td>
                          
                          <button class="btn btn-info btn-sm btn-edit">
                              <i class="fas fa-pencil-alt"></i>
                              Edit
                          </button>
                          <button class="btn btn-danger btn-sm btn-delete">
                              <i class="fas fa-trash"></i>
                              Delete
                          </button>
                        
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
                    <h4 class="modal-title">New Guest</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <input type="hidden" name="type" id="type" value = "insert">
                    <div class="form-group">
                      <label>Full Name</label>
                      <input type="text" class="form-control" name="new_full_name" id="new_full_name" placeholder="Full Name">
                    </div>
                    <div class="form-group">
                      <label>Contact Number</label>
                      <input type="text" class="form-control" name="new_contact_no" id="new_contact_no" placeholder="Contact Number">
                    </div>
                    <div class="form-group">
                    <label>Gender</label>
                     <select class="form-control" id="new_gender" name="new_gender" required>
                     <option value="default">Choose</option>
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                      </select>
                      </div>
                    <div class="form-group">
                      <label>Age</label>
                      <input type="text" class="form-control" name="new_age" id="new_age" placeholder="Age">
                    </div>
                    <div class="form-group">
                    <label>Reason</label>
                     <select class="form-control" id="new_reason" name="new_reason" required>
                      <option value="default">Choose</option>
                      <option value="Educational Tour">Educational Tour</option>
                      <option value="Events">Events</option>
                      <option value="Research and Academic Collaboration">Research and Academic Collaboration</option>
                      <option value="Government Officials and Inspections">Government Officials and Inspections</option>
                      <option value="Donors and Supporters">Donors and Supporters</option>
                      <option value="Alumni Reunion">Alumni Reunion</option>
                      <option value="Admission">Admission</option>
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
                  <h4 class="modal-title">Edit Guest</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <input type="hidden" name="type" id="type" value = "edit">
                  <input type="hidden" name="edit_guest_id" id="edit_guest_id">

                    <div class="form-group">
                      <label>Full Name</label>
                      <input type="text" class="form-control" name="edit_full_name" id="edit_full_name" placeholder="Full Name">
                    </div>
                    <div class="form-group">
                      <label>Contact Number</label>
                      <input type="text" class="form-control" name="edit_contact_no" id="edit_contact_no" placeholder="Course">
                    </div>
                    <div class="form-group">
                    <label>Gender</label>
                     <select class="form-control" id="edit_gender" name="edit_gender" required>
                     <option value="default">Choose</option>
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                      </select>
                      </div>
                    <div class="form-group">
                      <label>Age</label>
                      <input type="text" class="form-control" name="edit_age" id="edit_age" placeholder="Section">
                    </div>
                    <div class="form-group">
                    <label>Reason</label>
                     <select class="form-control" id="edit_reason" name="edit_reason" required>
                     <option value="Educational Tour">Educational Tour</option>
                      <option value="Events">Events</option>
                      <option value="Research and Academic Collaboration">Research and Academic Collaboration</option>
                      <option value="Government Officials and Inspections">Government Officials and Inspections</option>
                      <option value="Donors and Supporters">Donors and Supporters</option>
                      <option value="Alumni Reunion">Alumni Reunion</option>
                      <option value="Admission">Admission</option>
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
<script>
$(function () {
  $('#form_new').validate({
    rules:{
      new_full_name: {
        required: true
      },
      new_contact_no: {
        required: true
      },
      new_gender: {
        required: true,
        notDefault: true
      },
      new_age: {
        required: true
      },
      new_reason: {
        required: true,
        notDefault: true
      },

    },
    messages: {
      new_full_name: {
        required: "Please provide a full name",
      },
      new_contact_no: {
        required: "Please provide a contact number",
      },
      new_gender: {
        required: "Please provide gender",
        notDefault: "Please choose a valid option"
      },
      new_age: {
        required: "Please provide age",
      },
      new_reason: {
        required: "Please provide a Reason",
        notDefault: "Please choose a valid option"
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
    
      edit_full_name: {
        required: true
      },
      edit_contact_no: {
        required: true
      },
      edit_gender: {
        required: true
      },
      edit_age: {
        required: true
      },
      edit_reason: {
        required: true
      }

    },
    messages: {
      edit_full_name: {
        required: "Please provide a full name",
      },    
      edit_contact_no: {
        required: "Please provide a contact",
      },
      edit_gender: {
        required: "Please provide a gender",
      },
      edit_age: {
        required: "Please provide age",
      },
      edit_reason: {
        required: "Please provide a reason",
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
  $.validator.addMethod("notDefault", function (value, element, param) {
  return value !== "default";
}, "This field is required");
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
        url: 'process_guestlist.php',
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
        url: 'process_guestlist.php',
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
  var guest_id = $(this).closest("tr").attr('id');
  var full_name = $(this).closest("tr").attr('full_name');
  var contact_no = $(this).closest("tr").attr('contact_no');
  var gender = $(this).closest("tr").attr('gender');
  var age = $(this).closest("tr").attr('age');
  var reason = $(this).closest("tr").attr('reason');

    $.ajax({
        type: "POST",
        cache: false,
        url: 'process_guestlist.php',
        data: { type: 'update', guest_id: guest_id },
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


$('#example1 tbody').on('click', '.btn-edit', function () {

  document.getElementById("edit_guest_id").value = $(this).closest("tr").attr('id');
  document.getElementById("edit_full_name").value = $(this).closest("tr").children(":eq(1)").text();
  document.getElementById("edit_contact_no").value = $(this).closest("tr").children(":eq(2)").text();
  document.getElementById("edit_gender").value = $(this).closest("tr").children(":eq(3)").text();
  document.getElementById("edit_age").value = $(this).closest("tr").children(":eq(4)").text();
  document.getElementById("edit_reason").value = $(this).closest("tr").children(":eq(5)").text();

  $('#modal-edit').modal('show');

});

$('#example1 tbody').on('click', '.btn-delete', function () {
    var guest_id = $(this).closest("tr").attr('id');
    var $guest_row = $(this).closest("tr");

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
                url: 'process_try.php',
                data: { type: 'delete', guest_id: guest_id },
                success: function (data) {
                    var response_data = JSON.parse(data);
                    if (response_data.icon == 'success') {
                      
                        $guest_row.remove();

                        Swal.fire(
                            'Deleted!',
                            'Record has been deleted.',
                            'success'
                        )
                        setTimeout(function(){location.reload();},1000);
                    }
                }
            });
        }
    });
});


</script>

</body>
</html>