<?php

include "../config.php";

$id = $_GET['id'];

$sql1 = "select * from trailer where id = {$id}";
$result1 = mysqli_query($conn, $sql1) or die("query failed 1");
$row = mysqli_fetch_assoc($result1);
unlink("home-image/".$row['image']);


$sql = "delete from trailer where id = {$id}";

$result = mysqli_query($conn, $sql);

if($result){
    header("Location: {$hostname}/admin/home/index-trailer.php");
}

?>