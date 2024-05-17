<?php include "admin/config.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap-4.6.2-dist/css/bootstrap.css">
    
    <style>
        body{
            background-image: url('image/sin.jpg');
            background-size: cover;
        }
        .signin-container{
            width: 500px;
            border: 2px solid white;
            height: auto;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            border-radius: 20px;
            padding: 26px;
            color: white;
        }
        .signin-container img{
            width: 30%;
            display: block;
            margin: auto;
            padding-bottom: 30px;
        }
        input[type="submit"]{
            background: red;
            color: white;
            padding: 10px 100px;
        }
        .overlay a{
            position: absolute;
            z-index: 5000;
            padding: 10px 16px;
            color: black;
            background: white;
            border-radius: 500px;
            font-weight: 900;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            margin: 10px 50px;
        }
        .overlay a:hover{
            text-decoration: none;
        }
    </style>

    <script src="js/a.js"></script>
</head>
<body>
<div class="overlay">
    <div class="row">
        <div class="col-11"></div>
        <div class="co" style="">
            <a href="javascript:history.back()">X</a>
        </div>
    </div>
</div>
    <div class="signin-container">
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="row">
            <div class="col-12">
                <a href="index.php"><img src="logo/logo2.png" alt=""></a>
            </div>
            <div class="col">
                <h3 align="center" style="color: red; font-weight: 900;">ACCOUNT REGISTER</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="my-input">First Name</label>
                    <input id="my-input" class="form-control" autocomplete="off" placeholder="Ex. Peter" type="text" name="fname">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="my-input">Last Name</label>
                    <input id="my-input" class="form-control" autocomplete="off" placeholder="Ex. Parker" type="text" name="lname">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="my-input">Email</label>
                    <input id="my-input" class="form-control" autocomplete="off" placeholder="Ex. peter1@gmail.com" type="email" name="email">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="my-input">Username</label>
                    <input id="my-input" maxlength="8" class="form-control" autocomplete="off" placeholder="Create Username" type="text" name="username">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="my-input">Password</label>
                    <input id="my-input" maxlength="8" class="form-control" autocomplete="off" placeholder="Create Password" type="text" name="password">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="my-input">Confirm Password</label>
                    <input id="my-input" maxlength="8" class="form-control" autocomplete="off" placeholder="Confirm Password" type="text" name="cpassword">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="my-select">Country</label>
                    <select id="my-select" class="form-control" name="country">
                        <option selected disabled>Select Country</option>
                        <option>United State of America(USA)</option>
                        <option>Australia</option>
                        <option>India</option>
                        <option>United Kingdom(UK)</option>
                        <option>New Zeland</option>
                        <option>Denmark</option>
                    </select>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="my-input">Contact</label>
                    <input id="my-input" maxlength="10" class="form-control" autocomplete="off" placeholder="1234567890" pattern="[0-9]+" type="text" name="contact">
                </div>
            </div>
            <div class="col-8">
                <div class="form-check">
                    <input id="my-input" class="form-check-input" type="checkbox" name="" value="true" required>
                    <label for="my-input" class="form-check-label text-secondary">I Accept All Terms And Conditions</label>
                </div>
            </div>
            <div class="col-4">
                <p style="font-size: 12px;"><a style="color: red;" href="signin.php">Already have Account?</a></p>
            </div>
        </div><br>
        <div class="row">
            <div class="col" style="text-align: center;">
                <input type="submit" value="Register" name="submit">
            </div>
        </div>
        </form>
    </div>
</body>
</html>

<?php
session_start(); // Start session at the beginning

if(isset($_POST['submit'])){
    // Assuming $conn is your database connection
    
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $cpass = $_POST['cpassword'];
    $country = $_POST['country'];
    $contact = $_POST['contact'];
    $date = date("Y-m-d"); // Correct format for MySQL date field

    if($pass == $cpass){
        // Hash the password
        // $hashed_password = password_hash($pass, PASSWORD_DEFAULT);

        // Prepare and bind SQL statement
        $sql = "INSERT INTO register(fname, lname, email, username, password, cpassword, country, contact, doj) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "sssssssss", $fname, $lname, $email, $user, $pass, $cpass, $country, $contact, $date);
        
        // Execute the statement
        if(mysqli_stmt_execute($stmt)){
            $_SESSION["user_id"] = mysqli_insert_id($conn); // Get the inserted ID
            $_SESSION["reg_username"] = $user;
            $_SESSION["fname"] = $fname;
            $_SESSION["lname"] = $lname;
            $_SESSION["email"] = $email;
            $_SESSION["contact"] = $contact;
            $_SESSION["country"] = $country;
            
            echo '<script>alert("You are now Member of the Marvel Universe!"); window.location.href = "'.$hostname.'/index.php";</script>';

            $subject = "Marvel Cinematic Universe";
            $to = "patelmanan1612@gmail.com";
            $headers = "From: {$email}";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
            $message = "
                            <html>
                            <head>
                            </head>
                            <body>
                                ☢☣⚠🚸🔰♻⚜〽🔱🔆<br>
                            <h1>Hey {$fname}!</h1>
                            <p>Just remember your username and password...</p>
                            <table border='2' cellspacing='0' cellpadding='10px' style='border: 2px solid red;'>
                                <tr>
                                    <td>Username</td>
                                    <td>Password</td>
                                </tr>
                                <tr>
                                    <td>{$user}</td>
                                    <td>{$pass}</td>
                                </tr>
                            </table>
                            <br>
                                Thank you for visiting Marvel Cinematic Universe.
                            </body>
                            </html>
                       ";

            if(mail($to, $subject, $message, $headers)){
                exit;
            }

             // Terminate script after successful insertion
        }else{
            echo '<script>alert("Something is Wrong!"); window.location.href = "javascript:history.back()";</script>';
            exit; // Terminate script on failure
        }
    }else{
        echo '<script>alert("Password and Confirm password are not matched!"); window.location.href = "javascript:history.back()";</script>';
        exit; // Terminate script on mismatched passwords
    }
}
?>
