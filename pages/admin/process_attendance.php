<?php

require('connection.inc.php');

if(isset($_POST['type']) != ''){

  if($_POST['type']=='insert'){

    $student_number = $_POST['new_student_number'];
    $full_name = $_POST['new_full_name'];
    $course = $_POST['new_course'];
    $year = $_POST['new_year'];
    $section = $_POST['new_section'];
    $calDate = $_POST['calDate'];

    //Back-end Validation.
    if($student_number == "" || $full_name == "" || $course == "" || $year == "" || $section == ""|| $calDate == "" )
    {
      $response = array('title' => 'Warning', 'message' => 'Data is invalid');
      echo json_encode($response);
      return;
    }

    $sql = "INSERT INTO student (studnum, full_name, course, year, section, calDate)
    VALUES ('$student_number', '$full_name', '$course', '$year', '$section', '$calDate')";

    if ($conn->query($sql) === TRUE) {
      $response = array('title' => 'Success', 'message' => 'Student has been successfully recorded.');

    } else {
      $response = array('title' => 'Error', 'message' => $conn->error . '. Please contact system administrator.');
    }

    $conn->close();
  }

  if($_POST['type']=='edit'){
    $student_id = $_POST['edit_student_id'];
    $student_number = $_POST['edit_student_number'];
    $full_name = $_POST['edit_full_name'];
    $course = $_POST['edit_course'];
    $year = $_POST['edit_year'];
    $section = $_POST['edit_section'];
    $calDate = $_POST['calDate'];
    if($student_id == "" || $student_number == "" || $full_name == "" || $course == "" || $year == "" || $section == ""|| $calDate == "" )
    {
      $response = array('icon' => 'Warning', 'message' => 'Data is invalid');
    
      return;
    }

    $sql = "UPDATE student SET studnum = '$student_number', full_name = '$full_name', course = '$course', year = '$year', section = '$section', calDate = '$calDate' WHERE id = '$student_id'";

    if ($conn->query($sql) === TRUE) {
      $response = array('icon' => 'success', 'message' => 'Record has been successfully updated.');
    } else {
      $response = array('icon' => 'Error', 'message' => $conn->error . '. Please contact system administrator.');
    }

    $conn->close();
  }

   if($_POST['type']=='present' || $_POST['type']=='absent'){

    $student_id = $_POST['student_id'];
    $attendance = ($_POST['type']=='present') ? 1 : 0;


    //Back-end Validation.
    if($student_id == "")
    {
      $response = array('title' => 'Warning', 'message' => 'Data is invalid');
      echo json_encode($response);
      return;
    }

    $sql = "UPDATE student SET attendance=$attendance WHERE id ='$student_id'";

    if ($conn->query($sql) === TRUE) {
      if($_POST['type']=='present')
      {
        $response = array('title' => 'Success', 'message' => 'Record is now activated.');
      }
      else
      {
        $response = array('title' => 'Success', 'message' => 'Record is now deactivated.');
      }
    } else {
      $response = array('title' => 'Error', 'message' => $conn->error . '. Please contact system administrator.');
    }
    $conn->close();
  }

  if($_POST['type']=='regular' || $_POST['type']=='irregular'){

    $student_id = $_POST['student_id'];
    $status = ($_POST['type']=='regular') ? 1 : 0;


    //Back-end Validation.
    if($student_id == "")
    {
      $response = array('title' => 'Warning', 'message' => 'Data is invalid');
      echo json_encode($response);
      return;
    }

    $sql = "UPDATE student SET status=$status WHERE id ='$student_id'";

    if ($conn->query($sql) === TRUE) {
      if($_POST['type']=='regular')
      {
        $response = array('title' => 'Success', 'message' => 'Record is now activated.');
      }
      else
      {
        $response = array('title' => 'Success', 'message' => 'Record is now deactivated.');
      }
    } else {
      $response = array('title' => 'Error', 'message' => $conn->error . '. Please contact system administrator.');
    }
    $conn->close();
  }
  
  if ($_POST['type'] == 'delete') {
    $student_id = $_POST['student_id'];

    // Back-end Validation.
    if ($student_id == "") {
        $response = array('icon' => 'warning', 'message' => 'Data is invalid');
        echo json_encode($response);
        return;
    }

    $sql = "DELETE FROM student WHERE id ='$student_id'";

    if ($conn->query($sql) === TRUE) {
        $response = array('icon' => 'success', 'message' => 'Record has been deleted.');


    } else {
        $response = array('icon' => 'error', 'message' => $conn->error . '. Please contact system administrator.');
    
    }

    $conn->close();
}
  echo json_encode($response);

}
?>
