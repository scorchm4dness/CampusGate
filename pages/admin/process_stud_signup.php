<?php
session_start();
    include('connection.inc.php');

    if(isset($_POST['signup_btn1'])){

          $role_as = 0;
          $first_name = mysqli_real_escape_string($conn, $_POST['fname']);
          $middle_name = mysqli_real_escape_string($conn, $_POST['midname']);
          $last_name = mysqli_real_escape_string($conn, $_POST['lname']);
          $email = mysqli_real_escape_string($conn, $_POST['email']);
          $password = mysqli_real_escape_string($conn, $_POST['password']);
          $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);
          
      
          //Back-end Validation.
          if($password == $confirm_password)
          {
           $checkemail = "SELECT email FROM stud_signup WHERE email='$email'";
           $checkemail_run = mysqli_query($conn, $checkemail);

            if(mysqli_num_rows($checkemail_run) > 0 ){
              //Email already exists
              $_SESSION['message'] = "Email Already Exists";
              header("Location: stud_signup.php");
              exit(0);
            }
            else{
              $user_query = "INSERT INTO stud_signup (fname, midname, lname, role_as, email, password) VALUES ('$first_name','$middle_name','$last_name','$role_as','$email', '$password')";
              $user_query_run = mysqli_query($conn, $user_query);
  
              if ($user_query_run) {
                  $_SESSION['message'] = "Signed up Successfully!";
                  header("Location: login.php");
                  exit(0);
              } else {
                  $_SESSION['message'] = "Something went wrong!";
                  header("Location: stud_signup.php");
                  exit(0);
              }
          }
      } else {
          $_SESSION['message'] = "Password did not match!";
          header("Location: stud_signup.php");
          exit(0);
      }
  }
  ?>
  