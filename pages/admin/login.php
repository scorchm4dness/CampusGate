
<?php
session_start(); // Start the session

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="login.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!-- Add these lines to include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <!-- Add these lines to include Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJvRaSaF8KEaLdCUo5T5XIoJKCpbH/9ipF9LtF4DuxU2wAjTqjXKH" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <!-- Add this line to include Bootstrap Icons CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.18.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+Wy/Q/D5p0aNFo02u8E5YI/2Pb1Kck5" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+Wy/Q/D5p0aNFo02u8E5YI/2Pb1Kck5" crossorigin="anonymous"></script>


    <title>Login Page</title>
    <style>
         body {
            background-image: url('/CampusGate/dist/img/campusgate_bg.png'); /* Path to your header image */
        }
        .envelope{
            position: absolute;
            top: 70%;
            transform: translateY(-50%);
            right: 10px;
        }
        .eye-icon {
            position: absolute;
            top: 69%;
            right: 10px;
            transform: translateY(-50%);
            cursor: pointer;
        }
        .p{
            margin-left: 30%;
            margin-top: 2%;
        }
       

    </style>
</head>
<body>
<?php include('message.php');?>
    <div class="container">
    
        <div class="box">
            <div class="header">
            
                <header><img src="\CampusGate\dist\img\cg.png"> </header>
                <p>Log In</p>
            </div>
            <form action= "process_admin.php" method="POST">
                <div class="input-box">
                    <label>Email:</label>
                    <input type="email" class="input-field" name="email" id="email" placeholder="Enter Email" required> 
                    <i class="bx bx-envelope" id="envelope"></i>
                </div>
                <div class="input-box">
                    <label>Password:</label>
                    <input type="password" class="input-field" name="password" id="password"  placeholder="Enter Password" required>
                    <i class="bx bx-hide eye-icon" id="eye-icon"></i>
                </div>
                <div class="input-box">
                    <input type="submit" name="login_btn" class="input-submit" value="login">
                </div>
                <div class="p">
                <a href = "admin_signup.php">New Here? Sign up</a>
            </div>
            
            </form>
        </div>
    </div>
    <script>
        const passwordInput = document.getElementById('password');
        const eyeIcon = document.getElementById('eye-icon');

        eyeIcon.addEventListener('click', () => {
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.classList.remove('bx-show');
                eyeIcon.classList.add('bx-hide');
            } else {
                passwordInput.type = 'password';
                eyeIcon.classList.remove('bx-hide');
                eyeIcon.classList.add('bx-show');
            }
        });
    </script>

</body>
</html>
