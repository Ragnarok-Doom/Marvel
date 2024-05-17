<?php

include "../config.php";

$id = $_GET['id'];

$sql1 = "select * from tvshow where id = {$id}";
$result1 = mysqli_query($conn, $sql1) or die("query failed 1");
$row = mysqli_fetch_assoc($result1);
unlink("tvshow-image/".$row['title_image']);
unlink("tvshow-image/".$row['poster_image']);
unlink("tvshow-image/".$row['main_image']);
unlink("tvshow-image/".$row['img1']);
unlink("tvshow-image/".$row['img2']);
unlink("tvshow-image/".$row['img3']);
unlink("tvshow-image/".$row['img4']);
unlink("tvshow-image/".$row['img5']);
unlink("tvshow-image/".$row['img6']);
unlink("tvshow-image/".$row['img7']);
unlink("tvshow-image/".$row['img8']);
unlink("tvshow-image/".$row['img9']);
unlink("tvshow-image/".$row['img10']);
unlink("tvshow-image/".$row['img11']);
unlink("tvshow-image/".$row['img12']);


$sql = "delete from tvshow where id = {$id}";

$result = mysqli_query($conn, $sql);

if($result){
    
    header("Location: {$hostname}/admin/tvshow/index-tvshow.php");
}

?>