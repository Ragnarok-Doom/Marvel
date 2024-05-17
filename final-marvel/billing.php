<?php include "admin/config.php"; 

session_start();
if(!isset($_SESSION["reg_username"])){
    header("Location: {$hostname}/index.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        body{
            background: black;
            overflow: hidden;
        }

        .body-container{
            width: 100%;
            height: 100vh;
            display: flex;
        }
        .body-container img{
            width: 100vw;
            height: 100vh;
        }
        .body-container .content{
            position: absolute;
            color: white;
            /* width: 1350px; */
            height: auto;
            /* background: red; */
            margin: 0;
            padding: 0;
            top: 50%;
            left: 50%;
            transform: translateX(-50%) translateY(-50%);
        }
        .content h1{
            text-align: center;
        }
        .form-content{
            background: rgba(0, 0, 0, 0.6);
            width: 1100px;
            height: 680px;
            margin: auto;
        }
        form{
            padding: 50px;
            display: flex;
            justify-content: space-between;
            /* background: green; */
            
        }
        .flex-div{
            width: 400px;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }
        input[type="text"]{
            width: 400px;
            height: 30px;
            background: rgba(150, 149, 149, 0.5);
            border: none;
            color: white;
            padding: 10px;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            font-size: 20px;
            letter-spacing: 0.1em;
        }
        input[type="email"]{
            width: 400px;
            height: 30px;
            background: rgba(150, 149, 149, 0.5);
            border: none;
            color: white;
            padding: 10px;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            font-size: 20px;
            letter-spacing: 0.1em;
        }
        textarea{
            padding: 10px 10px;
            background: rgba(150, 149, 149, 0.5);
            border: none;
            color: white;
        }
        label{
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            text-transform: capitalize;
            font-size: 20px;
        }
        input::placeholder{
            text-transform: capitalize;
            padding: 10px;
            color: white;
            font-size: 15px;
        }
        span{
            text-transform: capitalize;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }
        button{
            height: 40px;
            color: white;
            font-size: 16px;
            text-transform: capitalize;
            background: red;
            border: 2px solid red;
            cursor: pointer;
            letter-spacing: 0.1em;
        }
        button:hover{
            background: green;
            border: 2px solid green;
        }
        h4{
            text-transform: capitalize;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            letter-spacing: 0.1em;
        }
        a{
            text-decoration: underline;
            color: white;
            text-transform: capitalize;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            font-weight: 900;
            
        }
        h1{
            text-transform: capitalize;
            letter-spacing: 0.1em;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            font-size: 40px;
            margin-left: -850px;
        }
        h2{
            /* margin-top: -100px; */
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            font-size: 15px;
            /* margin-left: 1090px; */
            /* transform: rotate(90deg); */
            letter-spacing: 0.5em;
        }
    </style>
</head>
<body>


<?php


$user_id = isset($_SESSION["user_id"]) ? $_SESSION["user_id"] : "";
$fname = isset($_SESSION["fname"]) ? $_SESSION["fname"] : "";
$lname = isset($_SESSION["lname"]) ? $_SESSION["lname"] : "";
$email = isset($_SESSION["email"]) ? $_SESSION["email"] : "";
$contact = isset($_SESSION["contact"]) ? $_SESSION["contact"] : "";
$country = isset($_SESSION["country"]) ? $_SESSION["country"] : "";
$prod_list = isset($_SESSION["cart"]) ? $_SESSION["cart"]["title"] : "";
$final_price = isset($_SESSION["cart"]) ? $_SESSION["cart"]["final_price"] : "";
$prod_id = isset($_SESSION["cart"]) ? $_SESSION["cart"]["prod_id"] : "";
$prod_quan = isset($_SESSION["cart"]) ? $_SESSION["cart"]["quantity"] : "1";

?>




<div class="body-container">
        <img src="image/subscriber.jpg" alt="">
        <div class="content">
            <h1>order form</h1>
            <div class="form-content">
                <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
                    <div class="flex-div">
                        <div class="inputbx">

                        <!-- user id -->
                        <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">

                            <!-- first name -->
                            <label>name</label><br><input type="text" id="fname" title="Only Alphabets" pattern="[a-zA-Z]+" placeholder="first name" name="fname" value="<?php echo $fname; ?>" required>
                        </div>
                        <div class="inputbx">
                            <!-- last name -->
                            <input type="text" placeholder="last name" id="lname" title="Only Alphabets" pattern="[a-zA-Z]+" name="lname" value="<?php echo $lname; ?>"  required>
                        </div>
                        <div class="inputbx">
                            <!-- email -->
                            <label>email</label><br><input type="email"  value="<?php echo $email; ?>" id="email" placeholder="email" name="email"  required>
                        </div>
                        <div class="inputbx">
                            <!-- contact no -->
                            <label>contact number</label><br><input type="text" id="contact" title="Only numbers and must be 8 characters" placeholder="contact no"  value="<?php echo $contact; ?>" maxlength="10" name="pno"  required>
                        </div>
                        <div class="inputbx">
                            <!-- prod list -->
                            <label>Product List</label><br>
                            <textarea name="prod_list" id="" cols="52" rows="8" readonly>
                                > <?php echo trim($prod_list, " "); ?>
                            </textarea>
                        </div>
                        <h4>want more products?</h4>
                        <a href="shop.php">click here</a>
                    </div>
                    <div class="flex-div">
                        <div class="inputbx">
                            <!-- address -->
                            <label>address</label><br><input type="text" placeholder="line1" id="add1" name="add1" maxlength="40"  required>
                        </div>
                        <div class="inputbx">
                            <!-- line 2 -->
                            <input type="text" placeholder="line2" id="add2" name="add2" maxlength="40" >
                        </div>
                            <div class="city-state" style="display: flex;">
                                <!-- city -->
                                <input type="text" placeholder="city" id="city" name="city" style="width: 200px;" pattern="[a-zA-Z]+"  required>&nbsp;&nbsp;&nbsp;&nbsp;
                                <!-- country -->
                                <input type="text"  value="<?php echo $country; ?>" placeholder="country" id="country" name="country" style="width: 165px"  required>
                            </div>
                            <!-- pin code -->
                            <input type="text" placeholder="pincode" id="pincode" name="pincode" maxlength="7" pattern="\d{7}" required>


                            
                            <div class="inputbx" style="display: flex;">
                                <!-- tot price -->
                                <div class="radio-div" style="">
                                <label>Total Price : </label>
                                    <input type="text" name="price"  value="<?php echo $final_price; ?>" style="width: 90%;" readonly>
                                </div>
                                <div class="">
                                    <img src="logo/disney.png" style="width: 200px; height: 100px;" alt="">
                                </div>
                            </div>


                            <!-- payement -->
                        <label>payment</label>
                        <div class="inputbx">
                            <div class="radio-div" style="display: flex; justify-content: space-between;">
                                &nbsp;
                                <span style="color: gray;"><input type="radio" id="p" name="p" value="o" disabled>&nbsp;&nbsp;online</span>
                                <span>                       <input type="radio" id="p" name="p" value="c" required>&nbsp;&nbsp;cash on delivery</span>
                                <span style="color: gray;"><input type="radio" id="p" name="p" value="r" disabled>&nbsp;&nbsp;via cards</span><br>
                            </div>
                        </div>
                        
                        <h2>no return policy</h2>
                            
                        <button type="submit" name="submit">order</button>
                    </div>
                </form>
            </div>
            
        </div>
    </div>

    <div class="" style="position: fixed; top: 0; left: 0;">
        <a href="index.php"><img src="logo/logo2.png" alt="" style="width: 200px;"></a>
    </div>

</body>
</html>


<?php

if(isset($_POST['submit'])){


        $u_ser_id = $_POST['user_id'];
        $f_name = $_POST['fname'];
        $l_name = $_POST['lname'];
        $e_mail = $_POST['email'];
        $p_no = $_POST['pno'];
        $p_rod_list = $_POST['prod_list'];
        $a_dd1 = $_POST['add1'];
        $a_dd2 = $_POST['add2'];
        $c_ity = $_POST['city'];
        $c_ountry = $_POST['country'];
        $p_incode = $_POST['pincode'];
        $p_quantity = $prod_quan;
        $p_rice = $_POST['price'];
        $d_ate = date("d M Y");

        $sql = "insert into bill values($u_ser_id, '{$f_name}', '{$l_name}', '{$e_mail}', '{$p_no}', '{$p_rod_list}', '{$a_dd1}', '{$a_dd2}', '{$c_ity}', '{$c_ountry}', '{$p_incode}', '{$p_quantity}', '{$p_rice}', '{$d_ate}')";
        $result = mysqli_query($conn, $sql) or die("query failed");
        if(mysqli_num_rows($result) > 0){
            echo '<script>alert("Something is Wrong!");</script>';
        }
        else{
            echo '<script>alert("Your product is Accepted!"); window.location.href = "'.$hostname.'/shop.php";</script>';
            unset($_SESSION['cart']);
        }

}

?>