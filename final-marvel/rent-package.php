<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap-4.6.2-dist/css/bootstrap.css">
    <script src="js/a.js"></script>
    <style>
        body{
            background-color: rgb(10, 9, 9);
        }
        .container-fluid{
            color: white;
            padding: 50px;
        }
        li{
            list-style: none;
        }
        .logo-img{
            width: 150px;
        }
        .logo-con{
            width: 20px;
        }
        .col-3{
            /* padding: 10px 0; */
        }
        .row a{
            display: none;
        }
        .column2:hover,
        .column3:hover,
        .column4:hover{
            background: rgba(19, 19, 19, 0.8);
            border-radius: 50px;
            .row a{
                display: block;
                color: white;
                text-decoration: none;
                background: red;
                border-radius: 10px;
                padding: 10px 20px;
                font-size: 15px;
                font-weight: 500;
            }
        }
        .row{
            padding: 20px 0;
        }
        .column2 .row,
        .column3 .row,
        .column4 .row{
            justify-content: center;
        }
    </style>
</head>
<body>


<div class="container-fluid" style="display: flex; justify-content: space-between;">
    <div class="">
        <h4>Choose the plan that's right for you</h4><br>
        <li><img src="logo/mark.png" style="width: 15px;" alt=""> Unlimited comics and TV shows all you want is premium</li>
        <li><img src="logo/mark.png" style="width: 15px;" alt=""> Change or cancel your plan anytime.</li>
    </div>
    <div class="">
        <img src="logo/marvel-studio.png" style="width: 400px;" alt="">
    </div>
</div>

<div class="container-fluid" style="padding: 0 50px;">

    <div class="row main-row">
        <div class="col-3 column1">
            <div class="row">
                <h4 style="color: black;">.</h4>
            </div>
            <div class="row ">
                <img src="logo/logo2.png" class="logo-img" style="margin: 0 80px;" alt="">
            </div>
            <div class="row">
                <img src="logo/hd.png" class="logo-con" alt=""><span style="padding: 0 10px;">HD available</span>
            </div>
            <div class="row">
                <img src="logo/led-tv.png" class="logo-con" alt=""><span style="padding: 0 10px;">4k + HDR available</span>
            </div>
            <div class="row">
                <img src="logo/computer.png" class="logo-con" alt=""><span style="padding: 0 10px;">Watch on your laptop and TV</span>
            </div>
            <div class="row">
                <img src="logo/smartphone.png" class="logo-con" alt=""><span style="padding: 0 10px;">Watch on your mobile phone and tablet</span>
            </div>
            <div class="row">
                <img src="logo/target.png" class="logo-con" alt=""><span style="padding: 0 10px;">Rental time for your comic (in days)</span>
            </div>
        </div>
        <div class="col-3 column2">
            <div class="row">
                <h4>Basic</h4>
            </div>
            <div class="row">
                <h2>$3.99</h2>
            </div>
            <div class="row">
                <span style="border: 2px solid gray; border-radius: 50px; margin: 0 30px;">✖</span>
            </div>
            <div class="row">
                <span style="border: 2px solid gray; border-radius: 50px; margin: 0 30px;">✖</span>
            </div>
            <div class="row">
                <img src="logo/check.png" class="logo-con" style="margin: 0 30px;" alt="">
            </div>
            <div class="row">
                <img src="logo/check.png" class="logo-con" style="margin: 0 30px;" alt="">
            </div>
            <div class="row">
                <font style="margin: 0 35px;">1</font>
            </div>
            <div class="row">
                <a href="rent_comic.php?duration=1" onclick="alert('Your package is Accepeted! \n Duration : 1 Day \n Enjoy my friend')" style="">Choose Plan</a>
            </div>
        </div>
        <div class="col-3 column3">
            <div class="row">
                <h4>Standard</h4>
            </div>
            <div class="row">
                <h2>$10.99</h2>
            </div>
            <div class="row">
                <img src="logo/check.png" class="logo-con" style="margin: 0 30px;" alt="">
            </div>
            <div class="row">
                <span style="border: 2px solid gray; border-radius: 50px; margin: 0 30px;">✖</span>
            </div>
            <div class="row">
                <img src="logo/check.png" class="logo-con" style="margin: 0 30px;" alt="">
            </div>
            <div class="row">
                <img src="logo/check.png" class="logo-con" style="margin: 0 30px;" alt="">
            </div>
            <div class="row">
                <font style="margin: 0 35px;">2</font>
            </div>
            <div class="row">
                <a href="rent_comic.php?duration=2" onclick="alert('Your package is Accepeted! \n Duration : 2 Day \n Enjoy my friend')">Choose Plan</a>
            </div>
        </div>
        <div class="col-3 column4">
            <div class="row">
                <h4>Premium</h4>
            </div>
            <div class="row">
                <h2>$13.99</h2>
            </div>
            <div class="row">
                <img src="logo/check.png" class="logo-con" style="margin: 0 30px;" alt="">
            </div>
            <div class="row">
                <img src="logo/check.png" class="logo-con" style="margin: 0 30px;" alt="">
            </div>
            <div class="row">
                <img src="logo/check.png" class="logo-con" style="margin: 0 30px;" alt="">
            </div>
            <div class="row">
                <img src="logo/check.png" class="logo-con" style="margin: 0 30px;" alt="">
            </div>
            <div class="row">
                <font style="margin: 0 35px;">4</font>
            </div>
            <div class="row">
                <a href="rent_comic.php?duration=4" onclick="alert('Your package is Accepeted! \n Duration : 4 Day \n Enjoy my friend')">Choose Plan</a>
            </div>
        </div>
    </div>
</div>   

</body>
</html>