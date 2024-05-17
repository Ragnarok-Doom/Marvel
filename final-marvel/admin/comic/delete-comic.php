<?php

include "../config.php";

$id = $_GET['id'];

$sql1 = "select * from comic where id = {$id}";
$result1 = mysqli_query($conn, $sql1) or die("query failed 1");
$row = mysqli_fetch_assoc($result1);
unlink("comic-image/".$row['image']);


$sql = "delete from comic where id = {$id}";

$result = mysqli_query($conn, $sql);

if($result){
    
    header("Location: {$hostname}/admin/comic/index-comic.php");
}

?>