<?php

include "admin/config.php";
if(isset($_GET['duration'])){
    
    $duration = intval($_GET['duration']);
    $rental_time = time() + ($duration * 60);
    setcookie('rental_time', $rental_time, $rental_time);

    header("Location: $hostname/restricted.php");
    exit();

}

if(isset($_COOKIE['rental_time'])){
    
    $current_time = time();
    $rental_time = $_COOKIE['rental_time'];
    $duration = $rental_time - $current_time;

    if($duration <= 0){
        header("Location: $hostname/rent-package.php");
        exit();
    }

}else{

    header("Location: $hostname/rent-package.php");

}

echo "Comic book content here";

?>