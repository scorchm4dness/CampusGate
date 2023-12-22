<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campus Gate</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #f0f0f0; /* Set a background color if needed */
        }

        header, footer {
            width: 100%;
            height: 50px; /* Set the height of your header and footer */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        header {
            background-image: url('/CampusGate/dist/img/campusgate_bg.png'); /* Path to your header image */
            display: flex;
            align-items: center;
            padding: 10px;
            color: #fff;
        }
        header h3 {
            margin-left: auto; /* Move "Sign In" to the right */
            margin-right: 20px;
        }

        header img {
            max-width: 100px;
            height: 50px;
            margin-right: 20px;
        }

        header h2 {
            margin: 0;
        }
        section {
            text-align: left;
            padding: 2em;
            display: flex;
            align-items: center;
        }

        section div:first-child {
            margin-left: 70px;
        }

        section div:last-child {
            margin-left: 100px;
            margin-top: -90px; /* Adjust the negative margin-top as needed */
            color: #333; /* Adjust text color */
            font-size: 22px; /* Adjust text size */
      
        }

        section div:last-child a {
            display: inline-block;
            margin: 0 auto; /* Center the button */
        }


        footer {
            background-image: url('/CampusGate/dist/img/campusgate_bg.png'); /* Path to your footer image */
            position: fixed;
            bottom: 0;
            text-align: center;
            padding: 5px;
        }

        .content {
            padding: 20px;
            text-align: center;
            margin-top: 120px; /* Adjust this margin based on the height of your header */
        }
        .s {
    position: fixed;
    top: 86%;
    right: 0px;
    text-align: right;
   
}
          
        
    </style>
</head>
<body>
    <header>
        <img src="\CampusGate\dist\img\cg.png" alt="CampusLogo" height="20px">
        <h2>Campus Gate</h2>
        <h3><a href="login.php" style="color: white; text-decoration: none;">Sign In</a></h3>
        <a href="admin_signup.php" style="text-decoration: none; padding: 10px 20px; background-color: #3498db; color: #fff; border-radius: 5px; margin-right: 20px;">Get Started</a>
    </header>

    <section>
        <div>
            <img src="\CampusGate\dist\img\des1.png" alt="Company Logo" width="500px" height="500px">
        </div>

        <div>
            <p><b>Elevate Campus Efficiency with CampusGate:</b></p>
            <p>Your Monitoring Platform for Attendance and Violation Tracking in Educational Institutions!
            Navigate the complexities of attendance management effortlessly with CampusGate</p>
            <a href="admin_signup.php" style="text-decoration: none; padding: 10px 20px; background-color: #3498db; color: #fff; border-radius: 5px;">Get Started</a>
        </div>
        
            

    </section>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> CampusGate. All rights reserved.</p>
    </footer>
</body>
</html>
