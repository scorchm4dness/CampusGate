<?php
session_start();
include('connection.inc.php');

if (isset($_POST['btnAddNewRecord'])) {
    $selectedDate = mysqli_real_escape_string($conn, $_POST['selectedDate']);
    $new_stud_no = mysqli_real_escape_string($conn, $_POST['new_stud_no']);
    $new_full_name = mysqli_real_escape_string($conn, $_POST['new_full_name']);
    $new_year = mysqli_real_escape_string($conn, $_POST['new_year']);
    $new_course = mysqli_real_escape_string($conn, $_POST['new_course']);
    $new_section = mysqli_real_escape_string($conn, $_POST['new_section']);
    $new_violation = mysqli_real_escape_string($conn, $_POST['new_violation']);
    $new_type = mysqli_real_escape_string($conn, $_POST['new_type']);

    // Check if the student already exists in the database
    $check_existing_query = "SELECT * FROM stud_violation WHERE stud_no = '$new_stud_no'";
    $check_existing_result = mysqli_query($conn, $check_existing_query);

    if (mysqli_num_rows($check_existing_result) > 0) {
        // Student exists, get the existing records
        $existing_records = mysqli_fetch_all($check_existing_result, MYSQLI_ASSOC);
        $num_records = count($existing_records);

        // Determine the next frequency based on the number of existing records
        $next_frequency = "";

        if ($num_records == 0) {
            $next_frequency = "First Offense";
        } elseif ($num_records == 1) {
            $next_frequency = "Second Offense";
        } elseif ($num_records == 2) {
            $next_frequency = "Third Offense";
            // You can implement additional logic here for subsequent offenses
        } else {
            // You can implement additional logic for handling more offenses if needed
            $next_frequency = "Fourth Offense and Beyond";
        }

        // Use an UPDATE query for existing students
        $update_query = "UPDATE stud_violation 
                         SET selectedDate = '$selectedDate',
                             full_name = '$new_full_name',
                             year_level = '$new_year',
                             course = '$new_course',
                             section = '$new_section',
                             frequency = '$next_frequency',
                             violation = '$new_violation',
                             violation_type = '$new_type'
                         WHERE stud_no = '$new_stud_no'";
        
        $update_result = mysqli_query($conn, $update_query);

        if ($update_result) {
            // Query successful
            $_SESSION['message'] = "Record updated successfully!";
            header("Location: violation_frm.php");
            exit(0);
        } else {
            // Query failed
            $_SESSION['message'] = "Failed to update record!";
            header("Location: violation_frm.php");
            exit(0);
        }
    } else {
        // Student is non-existing, set frequency as "First Offense" and use an INSERT query
        $insert_query = "INSERT INTO stud_violation (selectedDate, stud_no, full_name, year_level, course, section, frequency, violation, violation_type) 
                         VALUES ('$selectedDate','$new_stud_no','$new_full_name','$new_year', '$new_course', '$new_section', 'First Offense','$new_violation', '$new_type')";

        $insert_result = mysqli_query($conn, $insert_query);

        if ($insert_result) {
            // Query successful
            $_SESSION['message'] = "Record added successfully!";
            header("Location: violation_frm.php");
            exit(0);
        } else {
            // Query failed
            $_SESSION['message'] = "Failed to add record!";
            header("Location: violation_frm.php");
            exit(0);
        }
    }
}
?>
