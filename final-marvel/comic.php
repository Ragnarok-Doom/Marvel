<?php include "header.php"; 
include "admin/config.php";
?>


<div class="news-page">
    <img src="image/main-image.jpg" style="margin-top: -290px;" alt="">
    <h1 style="margin-left: 533px; ">MARVEL COMICS</h1>
</div>



<div class="news-movie">
    <!-- movie header -->
    <div class="hr-set" style="overflow: hidden;">
        <img src="image/more-image.jpg" style="width: 400px; height: 200px;">
        <h1>MARVEL NEW RELAEASE</h1>
    </div>

    <!-- movie body -->
    <div class="container-fluid comic-main-container">
        <div class="only-comic">
            <?php

                $sql4 = "select * from comic where category = 1";
                $result4 = mysqli_query($conn, $sql4) or die("query failed");
                while($row4 = mysqli_fetch_assoc($result4)){

            ?>
            <div class="the-comic">
                <a href="comic-content.php?id=<?php echo $row4['id']; ?>"><img src="admin/comic/comic-image/<?php echo $row4['image']; ?>" alt=""></a>
                <div class="comic-image-content">
                    <a href="comic-content.php?id=<?php echo $row4['id']; ?>"><b><h5><?php echo $row4['title']; ?></h5></b></a>
                    <span><?php echo $row4['year']; ?></span>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>


<div class="news-movie">
    <!-- movie header -->
    <div class="hr-set" style="overflow: hidden;">
        <img src="image/more-image.jpg" style="width: 400px; height: 200px;">
        <h1>MARVEL BEST SELLING</h1>
    </div>

    <!-- movie body -->
    <div class="container-fluid comic-main-container">
        <div class="only-comic">
            <?php

                $sql4 = "select * from comic where category = 2";
                $result4 = mysqli_query($conn, $sql4) or die("query failed");
                while($row4 = mysqli_fetch_assoc($result4)){

            ?>
            <div class="the-comic">
                <a href="comic-content.php?id=<?php echo $row4['id']; ?>"><img src="admin/comic/comic-image/<?php echo $row4['image']; ?>" alt=""></a>
                <div class="comic-image-content">
                    <a href="comic-content.php?id=<?php echo $row4['id']; ?>"><b><h5><?php echo $row4['title']; ?></h5></b></a>
                    <span><?php echo $row4['year']; ?></span>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>



<div class="news-movie">
    <!-- movie header -->
    <div class="hr-set" style="overflow: hidden;">
        <img src="image/more-image.jpg" style="width: 400px; height: 200px;">
        <h1>MARVEL FREE COMICS</h1>
    </div>

    <!-- movie body -->
    <div class="container-fluid comic-main-container">
        <div class="only-comic">
            <?php

                $sql4 = "select * from comic where category = 3";
                $result4 = mysqli_query($conn, $sql4) or die("query failed");
                while($row4 = mysqli_fetch_assoc($result4)){

            ?>
            <div class="the-comic">
                <a href="comic-content.php?id=<?php echo $row4['id']; ?>"><img src="admin/comic/comic-image/<?php echo $row4['image']; ?>" alt=""></a>
                <div class="comic-image-content">
                    <a href="comic-content.php?id=<?php echo $row4['id']; ?>"><b><h5><?php echo $row4['title']; ?></h5></b></a>
                    <span><?php echo $row4['year']; ?></span>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>


<?php  include "footer.php"; ?>
