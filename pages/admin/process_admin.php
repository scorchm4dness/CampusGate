<?php
session_start();
include('connection.inc.php');

if (isset($_POST['signup_btn'])) {
    $role_as = 1; // Set role_as to '1' for admin
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);

    // Back-end Validation.
    if ($password == $confirm_password) {
        $checkemail = "SELECT email FROM admin WHERE email='$email'";
        $checkemail_run = mysqli_query($conn, $checkemail);

        if (mysqli_num_rows($checkemail_run) > 0) {
            // Email already exists
            $_SESSION['message'] = "Email Already Exist!";
            header("Location: admin_signup.php");
            exit(0);
        } else {
            // Hash the password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Insert the hashed password into the database
            $user_query = "INSERT INTO admin (username, role_as, email, password) VALUES ('$username','$role_as','$email', '$hashed_password')";
            $user_query_run = mysqli_query($conn, $user_query);

            if ($user_query_run) {
                $_SESSION['message'] = "Signed up Successfully!";
                header("Location: login.php");
                exit(0);
            } else {
                $_SESSION['message'] = "Something went wrong!";
                header("Location: admin_signup.php");
                exit(0);
            }
        }
    } else {
        $_SESSION['message'] = "Password did not match!";
        header("Location: admin_signup.php");
        exit(0);
    }
} elseif (isset($_POST['login_btn'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $checkuser = "SELECT * FROM admin WHERE email='$email'";
    $checkuser_run = mysqli_query($conn, $checkuser);

    if (mysqli_num_rows($checkuser_run) > 0) {
        $user_data = mysqli_fetch_assoc($checkuser_run);
        $hashed_password = $user_data['password'];

        // Verify the entered password against the hashed password
        if (password_verify($password, $hashed_password)) {
            // Password is correct, set session and redirect to the dashboard
            $_SESSION['username'] = $user_data['username'];
            $_SESSION['email'] = $user_data['email'];
            header("Location: dashboard.php");
            exit(0);
        } else {
            // Password is incorrect
            $_SESSION['message'] = "Incorrect Password!";
            header("Location: login.php");
            exit(0);
        }
    } else {
        // User not found
        $_SESSION['message'] = "User not found!";
        header("Location: login.php");
        exit(0);
    }
}
?>
