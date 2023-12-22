<?php

require('connection.inc.php');
include('connection.inc.php');

if(isset($_POST['type']) != ''){

  if($_POST['type']=='insert'){

    $full_name = $_POST['new_full_name'];
    $contact_no = $_POST['new_contact_no'];
    $gender = $_POST['new_gender'];
    $age = $_POST['new_age'];
    $reason = $_POST['new_reason'];

    //Back-end Validation.
    if($full_name == "" || $contact_no == "" || $gender == "" || $age == "" || $reason == "" )
    {
      $response = array('title' => 'Warning', 'message' => 'Data is invalid');
      echo json_encode($response);
      return;
    }

    $sql = "INSERT INTO guests (full_name, contact_no, gender, age, reason)
    VALUES ('$full_name', '$contact_no', '$gender', '$age', '$reason')";

    if ($conn->query($sql) === TRUE) {
      $response = array('title' => 'Success', 'message' => 'Record has been successfully recorded.');

    } else {
      $response = array('title' => 'Error', 'message' => $conn->error . '. Please contact system administrator.');
    }

    $conn->close();
  }

  if($_POST['type']=='edit'){
    $guest_id = $_POST['edit_guest_id'];
    $full_name = $_POST['edit_full_name'];
    $contact_no = $_POST['edit_contact_no'];
    $gender = $_POST['edit_gender'];
    $age = $_POST['edit_age'];
    $reason = $_POST['edit_reason'];

    if($guest_id == ""|| $full_name == "" || $contact_no== "" || $gender == "" || $age == "" || $reason == "")
    {
      $response = array('icon' => 'Warning', 'message' => 'Data is invalid');
    
      return;
    }

    $sql = "UPDATE guests SET full_name = '$full_name', contact_no = '$contact_no', gender = '$gender', age = '$age', reason = '$reason' WHERE id = '$guest_id'";

    if ($conn->query($sql) === TRUE) {
      $response = array('icon' => 'success', 'message' => 'Record has been successfully updated.');
    } else {
      $response = array('icon' => 'Error', 'message' => $conn->error . '. Please contact system administrator.');
    }

    $conn->close();
  }

  
  if ($_POST['type'] == 'delete') {
    $guest_id = $_POST['guest_id'];

    // Back-end Validation.
    if ($guest_id == "") {
        $response = array('icon' => 'warning', 'message' => 'Data is invalid');
        echo json_encode($response);
        return;
    }

    $sql = "DELETE FROM guests WHERE id ='$guest_id'";

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
