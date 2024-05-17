<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap-4.6.2-dist/css/bootstrap.css">
    
    <style>
        body{
            
            background-image: url('image/up.jpg');
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
            padding: 30px;
            color: white;
        }
        .overlay{
            position: absolute;
            background: linear-gradient(to right, rgba(0, 25, 49, 1), rgba(0, 0, 0, 0.1) 50%, rgba(0, 25, 49, 1) 100%);
            width: 100vw;
            height: 100vh;
            opacity: 0.5;
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
            border: 1px solid white
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
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="my-input">Username</label>
                    <input id="my-input" maxlength="8" class="form-control" placeholder=" Username" type="text" name="username">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="my-input">Password</label>
                    <input id="my-input" maxlength="8" class="form-control" placeholder=" Password" type="text" name="password">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <a style="color: rgb(0, 2, 25);" href="">Forgot Password</a>
            </div>
            <div class="col-6" align="right">
                <a style="color: red;" href="signup.php"><b>Don't have any Account?</b></a>
            </div>
        </div><br>
        <div class="row">
            <div class="col" style="text-align: center;">
                <input type="submit" value="Login" name="login">
            </div>
        </div>
        </form>
    

<?php

if(isset($_POST['login'])){
    include "admin/config.php";

    $username = $_POST['username'];
    $password = $_POST['password'];

    if(empty($username) || empty($password)){
        echo "<div class='alert alert-danger'>User Must Fill all Details!</div>";
    }else{
        $sql = "select * from register where username = '{$username}' and password = '{$password}'";
        $result = mysqli_query($conn, $sql) or die("query failed");

    if(mysqli_num_rows($result) > 0){
        
        while($row = mysqli_fetch_assoc($result)){

            session_start();
            $_SESSION["user_id"] = $row['id'];
            $_SESSION["reg_username"] = $row['username'];
            $_SESSION["fname"] = $row['fname'];
            $_SESSION["lname"] = $row['lname'];
            $_SESSION["email"] = $row['email'];
            $_SESSION["contact"] = $row['contact'];
            $_SESSION["country"] = $row['country'];

            echo '<script>alert("Hey! old friend long time no see!"); window.location.href = "'.$hostname.'/index.php";</script>';
        }

    }else{
        echo "<br><div class='alert alert-danger w-100'>Username and password are not matched.</div>";
    }
    }
}

?>

</div>
</body>
</html>