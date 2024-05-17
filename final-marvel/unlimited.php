<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap-4.6.2-dist/css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/a.js"></script>
    <style>
        .login-header{
            width: 100%;
            height: 60px;
            background: black;
            top: 0;
            position: fixed;
            z-index: 100;
        }
        .login-header a{
            border: 1px solid white;
            color: white;
            margin: 10px;
        }
        .login-header a:hover{
            color: white;
            background: red;
            border: 1px red solid;
        }
        .unl-container img{
            /* margin-top: -50px; */
            opacity: 0.4;
        }
        .un-content img{
            width: 5%;
            opacity: 1;
        }
        .un-content{
            position: absolute;
            opacity: 1;
            display: flex;
            flex-direction: column;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            justify-content: center;
            align-items: center;
            text-align: center;
            color: white;
        }
        .sub1 a{
            color: white;
            text-decoration: none;
            padding: 10px 30px;
            border: 1px solid white;
            margin-left: 1000px;
            margin-top: 300px;
        }
        .sub2 a{
            color: white;
            text-decoration: none;
            padding: 10px 30px;
            border: 1px solid white;
            margin-left: 200px;
            margin-top: 300px;
        }
    </style>
</head>
<body>
    

<div class="login-header">
    <div class="row" style="border: none;">
        <div class="col-2" style="border: none;">
            <a href="index.php" class="" style="border: none;"><img src="logo/logo2.png" class="w-50" style="margin: 5px;" alt=""></a>
        </div>
        <div class="col-8" style="border: none;"></div>
        <div class="col-2" style="text-align: right; border: none;">
            <a href="signin.php" class="btn">LOGIN</a>
        </div>
    </div>
</div>
<div class="unl-container d-flex" style="background-color: rgb(12, 2, 95);">
    <img src="image/sign.jpg" class="w-100" alt="">

    <div class="un-content w-100">
        <img src="logo/lg.png" class="" alt=""><br><br>
        <h1><b>A WORLD OF COMICS AWAITS.</b></h1><br>
        <h3>YOUR ONE-STOP DESTINATION FOR OVER 30,000 COMICS SPANNING THE <br> ENTIRE MARVEL UNIVERSE. START YOUR 7-DAY FREE TRIAL. PLANS AS LOW AS <br>
        $9.99/MONTH.* CANCEL ANYTIME. </h3>
    </div>
</div>
<div class="container-fluid" style="background: black;">
    <div class="sub1 d-flex">
        <img src="image/sub1.jpg" class="w-100" alt="">
        <a href="" class="position-absolute">TRY 7 DAYS FREE</a>
    </div>
    <div class="sub2 d-flex">
        <img src="image/sub2.jpg" class="w-100" alt="">
        <a href="" class="position-absolute">TRY 7 DAYS FREE</a>
    </div>
    <div class="sub1 d-flex">
        <img src="image/sub3.jpg" class="w-100" alt="">
        <a href="" class="position-absolute">TRY 7 DAYS FREE</a>
    </div>
    <div class="sub2 d-flex">
        <img src="image/sub4.jpg" class="w-100" alt="">
        <a href="" class="position-absolute">TRY 7 DAYS FREE</a>
    </div>
</div>



<?php include "footer.php"; ?>