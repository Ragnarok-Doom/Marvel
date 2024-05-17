
    <?php include "header.php"; ?>



    <!-- SLIDERS -->

    <div class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="6000" data-bs-pause="false">
        <?php

            include "admin/config.php";
            $sql = "select * from slider";
            $result = mysqli_query($conn, $sql) or die("query failed");
            $indicatorCount = 0; // Initialize a variable to track the indicator count

            if (mysqli_num_rows($result)) {

        ?>
            <div class="carousel-inner">

                    <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                    ?>

                    <div class="carousel-item c-item <?php echo ($indicatorCount == 0) ? 'active' : ''; ?>">
                        <img src="admin/home/home-image/<?php echo $row['main_image']; ?>" alt="" class="d-block c-img">
                        <div class="carousel-caption">
                            <div class="carousel-inner-caption">
                                <img src="admin/home/home-image/<?php echo $row['logo_image']; ?>" alt="">
                                <br><br>
                                <h1><b><?php echo $row['title']; ?></b></h1>
                                <h6><?php echo $row['description']; ?></h6>
                                <br>
                                <a href="https://<?php echo $row['btn_link']; ?>" class="btn btn-danger"><b><?php echo $row['btn_name']; ?></b></a>
                            </div>
                        </div>
                    </div>

                    <?php
                        echo '<li style="list-style: none;" data-bs-target=".carousel" data-bs-slide-to="' . $indicatorCount . '"';
                        if ($indicatorCount == 0) {
                            echo ' class="active"';
                        }
                        echo '></li>';
                        $indicatorCount++;
                    }
                    ?>
            </div>
            <ol class="carousel-indicators">
                <?php
                    $indicatorCount = 0;
                    mysqli_data_seek($result, 0); // Resetting the result pointer to the beginning

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<li data-bs-target=".carousel" data-bs-slide-to="' . $indicatorCount . '"';
                        if ($indicatorCount == 0) {
                            echo ' class="active"';
                        }
                        echo '></li>';
                        $indicatorCount++;
                    }
                ?>
            </ol>

        <?php
        }
        ?>
    

            <div class="container-fluid cont-slider-media">
                <div class="slider-media">
                    <div class="slider-media-images-container">
                        <a href=""><img src="media/instagram.png" style="margin-top: -5px; margin-left: -10px;" alt=""></a>
                        <a href=""><img src="media/facebook.jpg" alt=""></a>
                        <a href=""><img src="media/snapchat.png" alt=""></a>
                        <a href=""><img src="media/twitter.png" alt=""></a>
                        <a href=""><img src="media/youtube.png" style="border-radius: 5px; width: 30px;" alt=""></a>
                    </div>
                </div>
            </div>
    </div>

    <!-- SLIDERS END -->






    <!-- MARVEL UNLIMITED -->

    <?php

    $sql2 = "select * from unlimited_comic";
    $result2 = mysqli_query($conn, $sql2) or die("query 2 failed");
    if(mysqli_num_rows($result2)){

        while($row2 = mysqli_fetch_assoc($result2)){

    ?>

    <div class="comic-web">
        <div class="web-container" style="background-image: url('admin/home/home-image/<?php  echo $row2['image']; ?>')">
            <div class="container-content">
                <img src="logo/logo3.png">
                <div class="comic-text">
                    <h4 id="a">AVAILABLE  NOW</h4><br><br>
                    <h2><?php  echo $row2['title']; ?></h2>
                    <h6><?php  echo $row2['description']; ?></h6><br><br>
                    <a href="<?php  echo $row2['btn_link']; ?>"><?php  echo $row2['btn_name']; ?></a>
                </div>
            </div>
            <div class="container-image">
            </div>
        </div>
    </div>

    <?php  }}  ?>

    <!-- MARVEL UNLIMITED END -->





    <!-- COMIC -->

    <div class="container-fluid comic-main-container">
        <div class="comics-container">
            <?php

                $sql4 = "select * from comic limit 10";
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

    <div class="container">
        <a href="comic.php">load more</a>
    </div>

    <!-- COMIC END -->




    <!-- NEWS -->

    <hr style="width: 90%; height: 2px; background: LightGray; margin: 10px auto;">
    <div class="container-fluid news-container">
        <h1>LATEST NEWS FROM MARVEL UNIVERSE</h1><br>
        <div class="news-parts-cont">
            <?php
                $sql5 = "select * from news
                left join category on news.category = category.category_id
                limit 5";
                $result5 = mysqli_query($conn, $sql5) or die("query failes");
                while($row5 = mysqli_fetch_assoc($result5)){
            ?>
            <div class="media">
                <img src="admin/news/news-image/<?php echo $row5['image']; ?>" class="mr-3 w-50" alt="">
                <div class="media-body">
                    <p><?php echo $row5['category_name']; ?></p>
                    <a href="news-content.php?nid=<?php echo $row5['id']; ?>"><h3><?php echo $row5['title']; ?></h3></a>
                    <h3><?php echo $row5['description']; ?>...</h3>
                    <br>
                    <p><?php echo $row5['date']; ?></p>
                </div>
            </div>
            <?php } ?>
        </div>
        <div class="new-trailers">
            <h5>TRAILERS</h5>
            <?php

                $sql3 = "select * from trailer order by rand()";
                $result3 = mysqli_query($conn, $sql3) or die("query failed");
                while($row3 = mysqli_fetch_assoc($result3)){

            ?>
                <a href="<?php echo $row3['link']; ?>"><img src="admin/home/home-image/<?php echo $row3['image']; ?>" alt=""></a>
            <?php } ?>
        </div>
    </div>

    

    <div class="container">
        <a href="news.php">load more</a>
    </div>
    <a href="" class="btn  btn-danger">hel</a>

    <!-- NEWS END -->
    
    <?php include "insider.php"; ?>
    <?php include "footer.php"; ?>

