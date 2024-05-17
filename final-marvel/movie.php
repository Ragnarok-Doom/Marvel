<?php include "header.php"; 
include "admin/config.php";
?>


<div class="news-page">
    <img src="image/news.jpg" style="margin-top: -430px;" alt="">
    <h1 style="margin-left: 533px; ">MARVEL MOVIE</h1>
</div>



<div class="news-movie">
    <!-- movie header -->
    <div class="hr-set">
        <img src="image/hr-movie.jpg" alt="">
        <h1>MARVEL UPCOMING</h1>
    </div>

    <!-- movie body -->
    <div class="container-fluid comic-main-container">
        <div class="only-comic">
            <?php

                $sql4 = "select * from movie where category = 1";
                $result4 = mysqli_query($conn, $sql4) or die("query failed");
                while($row4 = mysqli_fetch_assoc($result4)){

            ?>
            <div class="the-comic">
                <a href="movie-content.php?id=<?php echo $row4['id']; ?>&ct=<?php echo $row4['category']; ?>"><img src="admin/movie/movie-image/<?php echo $row4['poster_image']; ?>" alt=""></a>
                <div class="comic-image-content">
                    <a href="movie-content.php?id=<?php echo $row4['id']; ?>&ct=<?php echo $row4['category']; ?>"><b><h5><?php echo $row4['title']; ?></h5></b></a>
                    <span>Projected Date : <?php echo $row4['release_date']; ?></span>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>


<div class="news-movie">
    <!-- movie header -->
    <div class="hr-set">
        <img src="image/hr-movie.jpg" alt="">
        <h1>MARVEL MOVIES</h1>
    </div>

    <!-- movie body -->
    <div class="container-fluid comic-main-container">
        <div class="only-comic">
            <?php

                $sql4 = "select * from movie where category = 2 order by id desc";
                $result4 = mysqli_query($conn, $sql4) or die("query failed");
                while($row4 = mysqli_fetch_assoc($result4)){

            ?>
            <div class="the-comic">
                <a href="movie-content.php?id=<?php echo $row4['id']; ?>&tit=<?php echo $row4['title']; ?>"><img src="admin/movie/movie-image/<?php echo $row4['poster_image']; ?>" alt=""></a>
                <div class="comic-image-content">
                    <a href="movie-content.php?id=<?php echo $row4['id']; ?>&tit=<?php echo $row4['title']; ?>"><b><h5><?php echo $row4['title']; ?></h5></b></a>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>



<div class="news-movie">
    <!-- movie header -->
    <div class="hr-set">
        <img src="image/hr-movie.jpg" alt="">
        <h1>MARVEL X - SERIES</h1>
    </div>

    <!-- movie body -->
    <div class="container-fluid comic-main-container">
        <div class="only-comic">
            <?php

                $sql4 = "select * from movie where category = 3";
                $result4 = mysqli_query($conn, $sql4) or die("query failed");
                while($row4 = mysqli_fetch_assoc($result4)){

            ?>
            <div class="the-comic">
                <a href="movie-content.php?id=<?php echo $row4['id']; ?>&tit=<?php echo $row4['title']; ?>"><img src="admin/movie/movie-image/<?php echo $row4['poster_image']; ?>" alt=""></a>
                <div class="comic-image-content">
                    <a href="movie-content.php?id=<?php echo $row4['id']; ?>&tit=<?php echo $row4['title']; ?>"><b><h5><?php echo $row4['title']; ?></h5></b></a>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>

<div class="news-movie">
    <!-- movie header -->
    <div class="hr-set">
        <img src="image/hr-movie.jpg" alt="">
        <h1>MARVEL OTHERS</h1>
    </div>

    <!-- movie body -->
    <div class="container-fluid comic-main-container">
        <div class="only-comic">
            <?php

                $sql4 = "select * from movie where  category = 4";
                $result4 = mysqli_query($conn, $sql4) or die("query failed");
                while($row4 = mysqli_fetch_assoc($result4)){

            ?>
            <div class="the-comic">
                <a href="movie-content.php?id=<?php echo $row4['id']; ?>&tit=<?php echo $row4['title']; ?>"><img src="admin/movie/movie-image/<?php echo $row4['poster_image']; ?>" alt=""></a>
                <div class="comic-image-content">
                    <a href="movie-content.php?id=<?php echo $row4['id']; ?>&tit=<?php echo $row4['title']; ?>"><b><h5><?php echo $row4['title']; ?></h5></b></a>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>


<?php  include "footer.php"; ?>
