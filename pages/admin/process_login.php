<?php
session_start();
include('connection.inc.php');

if(isset($_POST['login_btn'])){
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $login_query = "SELECT * FROM admin WHERE email='$email' AND password='$password' LIMIT 1";
    $login_query_run = mysqli_query($conn, $login_query);

    if(mysqli_num_rows($login_query_run)> 0){
        foreach($login_query_run as $data){
            $admin_id = $data['id'];
            $admin_email = $data['email'];
            $admin_username = $data['username'];
            $admin_password = $data['password'];
            $role_as = $data['role_as'];
        }
        $_SESSION['auth'] = true;
        $_SESSION['auth_role'] = "$role_as";
        $_SESSION['auth_admin'] = [
            'admin_id' => $admin_id,
            'admin_email' => $admin_email,
            'admin_username' => $admin_username,
            'admin_password' => $admin_password,
        ];
        if($_SESSION['auth_role']== '1'){
            $_SESSION['message'] = "";
            header("Location: dashboard.php");
            exit(0);
        }elseif($_SESSION['auth_role']== '0'){
            $_SESSION['message'] = "Welcome User!";
            header("Location: dashboard.php");
            exit(0);
        }
    }
    else{
        $_SESSION['message'] = "Invalid Email or Password!";
        header("Location: login.php");
        exit(0);
    }
}
else{
    $_SESSION['message'] = "You are not allowed to access this site!";
    header("Location: login.php");
    exit(0);
}
?>