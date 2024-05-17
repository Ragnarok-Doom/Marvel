<?php

session_start();
if(!isset($_SESSION["username"])){
    include "config.php";
    header("Location: {$hostname} /admin/index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <base href="http://localhost/final-marvel/">
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->
    <link rel="stylesheet" href="css/adminStyle.css">
    <script src="js/a.js"></script>
    <link rel="stylesheet" href="bootstrap-4.6.2-dist/css/bootstrap.css">
</head>
<body>

<div class="fixx" style="position: sticky; top: 0; z-index: 1000; width: 100%; display: block;">


<div class="admin-header" style="">
    <div class="cont">
        <a href="admin/admin-index.php"><img src="logo/marvel-studio.png" alt=""></a>
        <div class="user-logo">
            <div class="user-logo-cont">
                <h5><?php echo $_SESSION["username"]; ?></h5>
                <a href="admin/logout.php">logout</a>
            </div>
            <a href="admin/users-update-form.php?id=<?php echo $_SESSION["user_id"]; ?>"><img src="admin/upload/<?php echo $_SESSION["image"]; ?>" alt=""></a>
        </div>
    </div>
</div>
<div class="navigation">
        <ul>
            <li>
                <div class="btn-group">
                    <a  class="btn dropdown-toggle" data-bs-toggle="dropdown">home</a>
                    <div class="dropdown-menu" style="color: black; background: black;">
                        <a href="admin/home/index-slider.php" class="dropdown-item">Slider & Unlmited</a>
                        <a href="admin/home/index-trailer.php" class="dropdown-item">Trailers</a>
                    </div>
                </div>
            </li>
            <li><a href="admin/news/index-news.php">NEWS</a></li>
            <li><a href="admin/comic/index-comic.php">COMIC</a><li>
            <li><a href="">character</a><li>
            <li><a href="admin/movie/index-movie.php">MOVIES</a><li>
            <li><a href="admin/tvshow/index-tvshow.php">TV SHOWS</a><li>
            <li><a href="admin/shop/index-shop.php">SHOP</a><li>
        </ul>
    <a href="javascript:history.back();" class="btn btn-outline-danger " style="width: 100px; margin-top: -54.9px;">BACK</a>
</div>
</div>
