<?php
session_start();
include('connection.inc.php');


if(isset($_POST['btnAddNewRecord'])){
         $selectedDate = mysqli_real_escape_string($conn, $_POST['selectedDate']);
         $new_student_no = mysqli_real_escape_string($conn, $_POST['new_student_no']);
         $new_full_name = mysqli_real_escape_string($conn, $_POST['new_full_name']);
         $new_course = mysqli_real_escape_string($conn, $_POST['new_course']);
         $new_section = mysqli_real_escape_string($conn, $_POST['new_section']);
         $new_year = mysqli_real_escape_string($conn, $_POST['new_year']);




          
$sql = "INSERT INTO library (selectedDate, student_no, full_name, course, section, year_level)
VALUES ('$selectedDate','$new_student_no','$new_full_name', '$new_course', '$new_section', '$new_year')";


$result = mysqli_query($conn, $sql);


if ($result) {
   // Query successful
   $_SESSION['message'] = "Record added successfully!";
   header("Location: library_add.php");
   exit(0);
} else {
   // Query failed
   $_SESSION['message'] = "Failed to add record!";
   header("Location: library_add.php");
   exit(0);
}


}
?>
