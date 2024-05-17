<?php

include "../config.php";

$id = $_GET['id'];

$sql1 = "select * from movie where id = {$id}";
$result1 = mysqli_query($conn, $sql1) or die("query failed 1");
$row = mysqli_fetch_assoc($result1);
unlink("movie-image/".$row['title_image']);
unlink("movie-image/".$row['poster_image']);
unlink("movie-image/".$row['main_image']);
unlink("movie-image/".$row['img1']);
unlink("movie-image/".$row['img2']);
unlink("movie-image/".$row['img3']);
unlink("movie-image/".$row['img4']);
unlink("movie-image/".$row['img5']);
unlink("movie-image/".$row['img6']);
unlink("movie-image/".$row['img7']);
unlink("movie-image/".$row['img8']);
unlink("movie-image/".$row['img9']);
unlink("movie-image/".$row['img10']);
unlink("movie-image/".$row['img11']);
unlink("movie-image/".$row['img12']);


$sql = "delete from movie where id = {$id}";

$result = mysqli_query($conn, $sql);

if($result){
    
    header("Location: {$hostname}/admin/movie/index-movie.php");
}

?>