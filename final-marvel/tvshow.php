<?php include "header.php"; 
include "admin/config.php";
?>


<div class="news-page">
    <img src="image/Untitled4.png" style="margin-top: -330px;" alt="">
    <h1 style="margin-left: 476px; ">MARVEL TV SHOWS</h1>
</div>



<div class="news-movie">
    <!-- movie header -->
    <div class="hr-set">
        <img src="image/hr-movie.jpg" alt="">
        <h1>MARVEL UPCOMING SERIES</h1>
    </div>

    <!-- movie body -->
    <div class="container-fluid comic-main-container">
        <div class="only-comic">
            <?php

                $sql4 = "select * from tvshow where category = 1";
                $result4 = mysqli_query($conn, $sql4) or die("query failed");
                while($row4 = mysqli_fetch_assoc($result4)){

            ?>
            <div class="the-comic">
                <a href="tvshow-content.php?id=<?php echo $row4['id']; ?>&ct=<?php echo $row4['category']; ?>"><img src="admin/tvshow/tvshow-image/<?php echo $row4['poster_image']; ?>" alt=""></a>
                <div class="comic-image-content">
                    <a href="tvshow-content.php?id=<?php echo $row4['id']; ?>&ct=<?php echo $row4['category']; ?>"><b><h5><?php echo $row4['title']; ?></h5></b></a>
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
        <h1>MARVEL POPULAR SERIES</h1>
    </div>

    <!-- movie body -->
    <div class="container-fluid comic-main-container">
        <div class="only-comic">
            <?php

                $sql4 = "select * from tvshow where category = 2 order by id desc";
                $result4 = mysqli_query($conn, $sql4) or die("query failed");
                while($row4 = mysqli_fetch_assoc($result4)){

            ?>
            <div class="the-comic">
                <a href="tvshow-content.php?id=<?php echo $row4['id']; ?>&tit=<?php echo $row4['title']; ?>"><img src="admin/tvshow/tvshow-image/<?php echo $row4['poster_image']; ?>" alt=""></a>
                <div class="comic-image-content">
                    <a href="tvshow-content.php?id=<?php echo $row4['id']; ?>&tit=<?php echo $row4['title']; ?>"><b><h5><?php echo $row4['title']; ?></h5></b></a>
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
        <h1>MARVEL SERIES ON D+</h1>
    </div>

    <!-- movie body -->
    <div class="container-fluid comic-main-container">
        <div class="only-comic">
            <?php

                $sql4 = "select * from tvshow where category = 5";
                $result4 = mysqli_query($conn, $sql4) or die("query failed");
                while($row4 = mysqli_fetch_assoc($result4)){

            ?>
            <div class="the-comic">
                <a href="tvshow-content.php?id=<?php echo $row4['id']; ?>&tit=<?php echo $row4['title']; ?>"><img src="admin/tvshow/tvshow-image/<?php echo $row4['poster_image']; ?>" alt=""></a>
                <div class="comic-image-content">
                    <a href="tvshow-content.php?id=<?php echo $row4['id']; ?>&tit=<?php echo $row4['title']; ?>"><b><h5><?php echo $row4['title']; ?></h5></b></a>
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
        <h1>MARVEL ON HULU</h1>
    </div>

    <!-- movie body -->
    <div class="container-fluid comic-main-container">
        <div class="only-comic">
            <?php

                $sql4 = "select * from tvshow where  category = 4";
                $result4 = mysqli_query($conn, $sql4) or die("query failed");
                while($row4 = mysqli_fetch_assoc($result4)){

            ?>
            <div class="the-comic">
                <a href="tvshow-content.php?id=<?php echo $row4['id']; ?>&tit=<?php echo $row4['title']; ?>"><img src="admin/tvshow/tvshow-image/<?php echo $row4['poster_image']; ?>" alt=""></a>
                <div class="comic-image-content">
                    <a href="tvshow-content.php?id=<?php echo $row4['id']; ?>&tit=<?php echo $row4['title']; ?>"><b><h5><?php echo $row4['title']; ?></h5></b></a>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>


<?php  include "footer.php"; ?>
