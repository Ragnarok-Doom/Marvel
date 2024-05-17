<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
        name : <input type="text" name="name" id=""><br>
        email : <input type="text" name="email" id=""><br>
        sub : <input type="text" name="sub" id=""><br>
        msg : <input type="text" name="msg" id=""><br>
        <input type="submit" value="submit" name="send">
    </form>
</body>
</html> -->

<?php

// if(isset($_POST['send'])){

//     $name = $_POST['name'];
//     $email = $_POST['email'];
//     $subject = $_POST['sub'];
//     $message = $_POST['msg'];

//     $to = "patelmanan074@gmail.com";
//     $headers = 'From: $email';

    

//     if(mail($to, $subject, $message, $headers)){
//         echo "mail sent";
//     }else{
//         echo "not send";
//     }

// }

// if(isset($_POST['submit'])){
    $otp = rand(0000, 9999);

// }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="otp.php" method="post">
        <input type="text" name="email" id="">
        <input type="hidden" name="code" value="<?php echo $otp; ?>">
        <input type="submit" value="submit" name="submit">
    </form>
</body>
</html>