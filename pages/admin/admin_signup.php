<?php
session_start();
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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJvRaSaF8KEaLdCUo5T5XIoJKCpbH/9ipF9LtF4DuxU2wAjTqjXKH"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <!-- Add this line to include Bootstrap Icons CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.18.0/font/bootstrap-icons.css">
    <link rel="stylesheet"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+Wy/Q/D5p0aNFo02u8E5YI/2Pb1Kck5"
        crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+Wy/Q/D5p0aNFo02u8E5YI/2Pb1Kck5"
        crossorigin="anonymous"></script>

    <title>Sign-up</title>
    <style>
        body {
            background-image: url('/CampusGate/dist/img/campusgate_bg.png'); /* Path to your header image */
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
        }

        .header {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            padding: 0px;
        }

        .header img {
            width: 70px;
            height: 70px;
        }

        .eye-icon {
            position: absolute;
            top: 45%;
            right: 10px;
            transform: translateY(-50%);
            cursor: pointer;
        }

        .eye-icon-confirm {
            position: absolute;
            top: 55%;
            right: 170px;
            transform: translateY(-50%);
            cursor: pointer;
        }

        #image-container {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .h2 {
            padding-top: 0;
        }

        .icon {
            position: absolute;
            right: 10px;
            top: 45%;
            transform: translateY(-50%);
            cursor: pointer;
        }

        #signup-container {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #ffffff;
            min-height: 100vh;
        }

        #signup-form {
            max-width: 400px;
            width: 90%;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            position: relative; /* Added this to enable relative positioning for the warning message */
        }

        .p {
            margin-left: 18%;
            margin-top: 2%;
        }

        #signup-form label {
            display: block;
            margin-bottom: 0px;
            margin-top: 7%;
        }

        #signup-form input {
            width: 100%;
            padding: 8px;
            padding-top: 2%;
            margin-bottom: 8px;
            box-sizing: border-box;
        }

        #signup-form button {
            background-color: #4caf50;
            color: white;
            padding: 10px 15px;
            margin-top: 12px;
            margin-left: 138px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        #signup-form button:hover {
            background-color: #45a049;
        }

        .warning-message {
            position: absolute;
            bottom: -20px; /* Adjust as needed */
            left: 0;
            color: red;
            font-size: 11px;
        }
    </style>
</head>

<body>
    <div id="image-container">
        <!-- Placeholder for image display -->
        <div>
            <img src="\CampusGate\dist\img\big.png" alt="Monitoring Logo" width="400px" height="400px">
        </div>
    </div>

    <div id="signup-container">
        <div id="signup-form">
            <?php include('message.php');?>
            <h2>Sign Up</h2>
            <form action="process_admin.php" method="POST" onsubmit="return validateForm()">
                <label>Role as</label>
                <div style="position: relative;">
                    <select class="form-control select2bs4" name="role_as" id="role_as" disabled="disabled"
                        style="width: 100%; height:20%;">
                        <option selected="selected">Admin</option>
                    </select>
                    <i class="bx bxs-user icon"></i>
                </div>

                <label>Username</label>
                <div style="position: relative;">
                    <input type="text" class="input-field" name="username" id="username"
                        placeholder="Enter Username" required>
                    <i class="bx bxs-user icon"></i>
                </div>

                <label>Email:</label>
                <div style="position: relative;">
                    <input type="email" class="input-field" name="email" id="email" placeholder="Enter Email"
                        required>
                    <i class="bx bxs-envelope icon"></i>
                </div>

                <label>Password:</label>
                <div style="position: relative;">
                    <input type="password" class="input-field" name="password" id="password"
                        placeholder="Enter Password" required>
                    <i class="bx bxs-hide eye-icon" id="eye-icon-password"></i>
                    <div class="warning-message" id="password-warning"></div>
                </div>

                <label>Confirm Password:</label>
                <div style="position: relative;">
                    <input type="password" class="input-field" name="confirm_password" id="confirm_password"
                        placeholder="Confirm Password" required>
                    <i class="bx bxs-hide eye-icon" id="eye-icon-confirm"></i>
                </div>

                <button type="submit" name="signup_btn">Sign Up</button>
                <div class="p">
                    <a href="login.php">Already have an account? Login</a>
                </div>
            </form>
        </div>
    </div>
    <script>
        const passwordInput = document.getElementById('password');
        const confirm_passwordInput = document.getElementById('confirm_password');
        const eyeIconPassword = document.getElementById('eye-icon-password');
        const eyeIconConfirm = document.getElementById('eye-icon-confirm');
        const passwordWarning = document.getElementById('password-warning');

        eyeIconPassword.addEventListener('click', togglePasswordVisibility.bind(null, passwordInput, eyeIconPassword));
        eyeIconConfirm.addEventListener('click', togglePasswordVisibility.bind(null, confirm_passwordInput, eyeIconConfirm));

        function togglePasswordVisibility(input, eyeIcon) {
            if (input.type === 'password') {
                input.type = 'text';
                eyeIcon.classList.remove('bxs-show');
                eyeIcon.classList.add('bxs-hide');
            } else {
                input.type = 'password';
                eyeIcon.classList.remove('bxs-hide');
                eyeIcon.classList.add('bxs-show');
            }
        }

        function validateForm() {
            const passwordValue = passwordInput.value.trim();
            const confirm_passwordValue = confirm_passwordInput.value.trim();

            // Clear previous warning
            passwordWarning.textContent = '';

            if (passwordValue.length < 8) {
                passwordWarning.textContent = 'Password must be 8 characters or longer.';
                return false;
            }

            //if (/[^a-zA-Z0-9]/.test(passwordValue)) {
             //   passwordWarning.textContent = 'Password cannot contain special characters.';
             //   return false;
           // }

            if (passwordValue !== confirm_passwordValue) {
                passwordWarning.textContent = 'Passwords do not match.';
                return false;
            }

            return true;
        }
    </script>
</body>

</html>
