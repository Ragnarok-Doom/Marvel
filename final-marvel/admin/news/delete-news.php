<?php

include "../config.php";

$id = $_GET['id'];
$cat = $_GET['cat'];

$sql1 = "select * from news where id = {$id}";
$result1 = mysqli_query($conn, $sql1) or die("query failed 1");
$row = mysqli_fetch_assoc($result1);
unlink("news-image/".$row['image']);


$sql = "delete from news where id = {$id}";
$result = mysqli_query($conn, $sql) or die("query failed");

if($result){
    switch ($cat) {
        case "movie":
            $category_table = "news_movie";
            break;
        case "series":
            $category_table = "news_series";
            break;
        case "game":
            $category_table = "news_game";
            break;
        case "comic":
            $category_table = "news_comic";
            break;
        case "culture":
            $category_table = "news_culture";
            break;
        default:
            $category_table = "";
    }
    if (!empty($category_table)) {
        // Insert into the specific category table using prepared statement
        $sql2 = "delete from $category_table where id = {$id}";
        $result2 = mysqli_query($conn, $sql2) or die("query failed 2");
    }
}

if($result){
    header("Location: {$hostname}/admin/news/index-news.php");
}

?>