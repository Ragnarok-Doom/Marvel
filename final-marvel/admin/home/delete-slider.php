<?php

include "../config.php";

$id = $_GET['id'];

$sql1 = "select * from slider where id = {$id}";
$result1 = mysqli_query($conn, $sql1) or die("query failed 1");
$row = mysqli_fetch_assoc($result1);
unlink("home-image/".$row['main_image']);
unlink("home-image/".$row['logo_image']);


$sql = "delete from slider where id = {$id}";

$result = mysqli_query($conn, $sql);

if($result){
    
    header("Location: {$hostname}/admin/home/index-slider.php");
}

?>