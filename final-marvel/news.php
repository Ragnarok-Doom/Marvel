<?php include  "header.php";
include "admin/config.php";
?>

<div class="news-page">
    <img src="image/main-movie.jpg" alt="">
    <h1>MARVEL NEWS</h1>
</div>

<div class="news-movie">
    <!-- movie header -->
    <div class="hr-set">
        <img src="image/hr-movie.jpg" alt="">
        <h1>MARVEL MOVIES</h1>
    </div>

    <!-- movie body -->
    <div class="movie-body">
        <h1>LATEST MARVEL MOVIES</h1>
        <?php
            $sql_m1 = "select * from news
            left join category on news.category = category.category_id
            where category = 1
            order by rand()
            limit 1";
            $result_m1 = mysqli_query($conn, $sql_m1) or die("query m1 failed");
            while($row_m1 = mysqli_fetch_assoc($result_m1)){
        ?>
        <div class="media">
            <img src="admin/news/news-image/<?php echo $row_m1['image']; ?>" class="mr-3 w-50" alt="">
            <div class="media-body">
                <p style="text-transform: uppercase;"><?php echo $row_m1['category_name']; ?></p>
                <a href="news-content.php?nid=<?php echo $row_m1['id']; ?>"><h2><?php echo $row_m1['title']; ?></h2></a>
                <h1><?php echo $row_m1['description']; ?>...</h1>
                <br>
                <p><?php echo $row_m1['date']; ?></p>
            </div>
        </div>
        <?php } ?>
        <br><br>
        <div class="media-container d-flex" style="gap: 20px;">
        <?php
            $limit = 3;
            if(isset($_GET['page_m'])){
                $page_m = $_GET['page_m'];
            }else{
                $page_m = 1;
            }
            $offset = ($page_m - 1) * $limit;
            $sql_m2 = "select * from news
            left join category on news.category = category.category_id
            where category = 1
            limit $limit
            
            offset $offset";
            $result_m2 = mysqli_query($conn, $sql_m2) or die("query m2 failed");
            while($row_m2 = mysqli_fetch_assoc($result_m2)){
        ?>
            <div class="media" style="flex-direction: column;">
                <a href="news-content.php?nid=<?php echo $row_m2['id']; ?>"><img src="admin/news/news-image/<?php echo $row_m2['image']; ?>" class="mr-3 w-100" alt=""></a>
                
                <div class="media-body w-100">
                    <br>
                    <p style="text-transform: uppercase;"><?php echo $row_m2['category_name']; ?></p>
                    <a href="news-content.php?nid=<?php echo $row_m2['id']; ?>"><h2><?php echo $row_m2['title']; ?></h2></a>
                    <h1><?php echo $row_m2['description']; ?>...</h1>
                    <p><?php echo $row_m2['date']; ?></p>
                </div>
            </div>
        <?php } ?>
        </div>
        <nav aria-label="Page navigation" class="m-ex">
        <?php

            $sql_p1 = "select * from news where category = 1";
            $result_p1 = mysqli_query($conn, $sql_p1) or die("query failed page 1");
            if(mysqli_num_rows($result_p1) > 0){
                $tot_rec = mysqli_num_rows($result_p1);
                $tot_page = ceil($tot_rec / $limit);

                echo '<ul class="pagination justify-content-center py-5">';
                if($page_m > 1){
                    echo '<li class="page-item"><a href="news.php?page_m='.($page_m - 1).'" class="page-link">Prev</a></li>';
                }   
                
                for($i=1; $i<=$tot_page; $i++){
                    if($i == $page_m){
                        $active = "active";
                    }else{
                        $active = "";
                    }
                    echo '<li class="page-item '.$active.'"><a href="news.php?page_m='.$i.'" class="page-link">'.$i.'</a></li>';
                }
                if($tot_page > $page_m)
                echo '<li class="page-item"><a href="news.php?page_m='.($page_m + 1).'" class="page-link">Next</a></li>';
                echo '</ul>';
            }
                        
        ?>
        </nav>
    </div>
</div>


<div class="news-movie">
    <!-- movie header -->
    <div class="hr-set">
        <img src="image/hr-movie.jpg" alt="">
        <h1>MARVEL TV SHOWS</h1>
    </div>

    <!-- movie body -->
    <div class="movie-body">
        <h1>LATEST MARVEL TV SHOWS</h1>
        <?php
            $sql_m1 = "select * from news
            left join category on news.category = category.category_id
            where category = 2
            order by rand()
            limit 1";
            $result_m1 = mysqli_query($conn, $sql_m1) or die("query m1 failed");
            while($row_m1 = mysqli_fetch_assoc($result_m1)){
        ?>
        <div class="media">
            <img src="admin/news/news-image/<?php echo $row_m1['image']; ?>" class="mr-3 w-50" alt="">
            <div class="media-body">
                <p style="text-transform: uppercase;"><?php echo $row_m1['category_name']; ?></p>
                <a href="news-content.php?nid=<?php echo $row_m1['id']; ?>"><h2><?php echo $row_m1['title']; ?></h2></a>
                <h1><?php echo $row_m1['description']; ?>...</h1>
                <br>
                <p><?php echo $row_m1['date']; ?></p>
            </div>
        </div>
        <?php } ?>
        <br><br>
        <div class="media-container d-flex" style="gap: 20px;">
        <?php
            $limit = 3;
            if(isset($_GET['page_s'])){
                $page_s = $_GET['page_s'];
            }else{
                $page_s = 1;
            }
            $offset = ($page_s - 1) * $limit;
            $sql_m2 = "select * from news
            left join category on news.category = category.category_id
            where category = 2
            limit $limit
            offset $offset";
            $result_m2 = mysqli_query($conn, $sql_m2) or die("query m2 failed");
            while($row_m2 = mysqli_fetch_assoc($result_m2)){
        ?>
            <div class="media" style="flex-direction: column;">
                <a href="news-content.php?nid=<?php echo $row_m2['id']; ?>"><img src="admin/news/news-image/<?php echo $row_m2['image']; ?>" class="mr-3 w-100" alt=""></a>
                
                <div class="media-body w-100">
                    <br>
                    <p style="text-transform: uppercase;"><?php echo $row_m2['category_name']; ?></p>
                    <a href="news-content.php?nid=<?php echo $row_m2['id']; ?>"><h2><?php echo $row_m2['title']; ?></h2></a>
                    <h1><?php echo $row_m2['description']; ?>...</h1>
                    <p><?php echo $row_m2['date']; ?></p>
                </div>
            </div>
        <?php } ?>
        </div>
        <nav aria-label="Page navigation" class="m-ex">
        <?php

            $sql_p1 = "select * from news where category = 2";
            $result_p1 = mysqli_query($conn, $sql_p1) or die("query failed page 1");
            if(mysqli_num_rows($result_p1) > 0){
                $tot_rec = mysqli_num_rows($result_p1);
                $tot_page = ceil($tot_rec / $limit);

                echo '<ul class="pagination justify-content-center py-5">';
                if($page_s > 1){
                    echo '<li class="page-item"><a href="news.php?page_s='.($page_s - 1).'" class="page-link">Prev</a></li>';
                }   
                
                for($i=1; $i<=$tot_page; $i++){
                    if($i == $page_s){
                        $active = "active";
                    }else{
                        $active = "";
                    }
                    echo '<li class="page-item '.$active.'"><a href="news.php?page_s='.$i.'" class="page-link">'.$i.'</a></li>';
                }
                if($tot_page > $page_s)
                echo '<li class="page-item"><a href="news.php?page_s='.($page_s + 1).'" class="page-link">Next</a></li>';
                echo '</ul>';
            }
                        
        ?>
        </nav>
    </div>
</div>


<div class="news-movie">
    <!-- movie header -->
    <div class="hr-set">
        <img src="image/hr-movie.jpg" alt="">
        <h1>MARVEL COMICS</h1>
    </div>

    <!-- movie body -->
    <div class="movie-body">
        <h1>LATEST MARVEL COMICS</h1>
        <?php
            $sql_m1 = "select * from news
            left join category on news.category = category.category_id
            where category = 3
            order by rand()
            limit 1";
            $result_m1 = mysqli_query($conn, $sql_m1) or die("query m1 failed");
            while($row_m1 = mysqli_fetch_assoc($result_m1)){
        ?>
        <div class="media">
            <img src="admin/news/news-image/<?php echo $row_m1['image']; ?>" class="mr-3 w-50" alt="">
            <div class="media-body">
                <p style="text-transform: uppercase;"><?php echo $row_m1['category_name']; ?></p>
                <a href="news-content.php?nid=<?php echo $row_m1['id']; ?>"><h2><?php echo $row_m1['title']; ?></h2></a>
                <h1><?php echo $row_m1['description']; ?>...</h1>
                <br>
                <p><?php echo $row_m1['date']; ?></p>
            </div>
        </div>
        <?php } ?>
        <br><br>
        <div class="media-container d-flex" style="gap: 20px;">
        <?php
            $limit = 3;
            if(isset($_GET['page_c'])){
                $page_c = $_GET['page_c'];
            }else{
                $page_c = 1;
            }
            $offset = ($page_c - 1) * $limit;
            $sql_m2 = "select * from news
            left join category on news.category = category.category_id
            where category = 3
            limit $limit
            offset $offset";
            $result_m2 = mysqli_query($conn, $sql_m2) or die("query m2 failed");
            while($row_m2 = mysqli_fetch_assoc($result_m2)){
        ?>
            <div class="media" style="flex-direction: column;">
                <a href="news-content.php?nid=<?php echo $row_m2['id']; ?>"><img src="admin/news/news-image/<?php echo $row_m2['image']; ?>" class="mr-3 w-100" alt=""></a>
                
                <div class="media-body w-100">
                    <br>
                    <p style="text-transform: uppercase;"><?php echo $row_m2['category_name']; ?></p>
                    <a href="news-content.php?nid=<?php echo $row_m2['id']; ?>"><h2><?php echo $row_m2['title']; ?></h2></a>
                    <h1><?php echo $row_m2['description']; ?>...</h1>
                    <p><?php echo $row_m2['date']; ?></p>
                </div>
            </div>
        <?php } ?>
        </div>
        <nav aria-label="Page navigation" class="m-ex">
        <?php

            $sql_p1 = "select * from news where category = 3";
            $result_p1 = mysqli_query($conn, $sql_p1) or die("query failed page 1");
            if(mysqli_num_rows($result_p1) > 0){
                $tot_rec = mysqli_num_rows($result_p1);
                $tot_page = ceil($tot_rec / $limit);

                echo '<ul class="pagination justify-content-center py-5">';
                if($page_c > 1){
                    echo '<li class="page-item"><a href="news.php?page_c='.($page_c - 1).'" class="page-link">Prev</a></li>';
                }   
                
                for($i=1; $i<=$tot_page; $i++){
                    if($i == $page_c){
                        $active = "active";
                    }else{
                        $active = "";
                    }
                    echo '<li class="page-item '.$active.'"><a href="news.php?page_c='.$i.'" class="page-link">'.$i.'</a></li>';
                }
                if($tot_page > $page_c)
                echo '<li class="page-item"><a href="news.php?page_c='.($page_c + 1).'" class="page-link">Next</a></li>';
                echo '</ul>';
            }
                        
        ?>
        </nav>
    </div>
</div>


<div class="news-movie">
    <!-- movie header -->
    <div class="hr-set">
        <img src="image/hr-movie.jpg" alt="">
        <h1>MARVEL GAMES</h1>
    </div>

    <!-- movie body -->
    <div class="movie-body">
        <h1>LATEST MARVEL GAMES</h1>
        <?php
            $sql_m1 = "select * from news
            left join category on news.category = category.category_id
            where category = 4
            order by rand()
            limit 1";
            $result_m1 = mysqli_query($conn, $sql_m1) or die("query m1 failed");
            while($row_m1 = mysqli_fetch_assoc($result_m1)){
        ?>
        <div class="media">
            <img src="admin/news/news-image/<?php echo $row_m1['image']; ?>" class="mr-3 w-50" alt="">
            <div class="media-body">
                <p style="text-transform: uppercase;"><?php echo $row_m1['category_name']; ?></p>
                <a href="news-content.php?nid=<?php echo $row_m1['id']; ?>"><h2><?php echo $row_m1['title']; ?></h2></a>
                <h1><?php echo $row_m1['description']; ?>...</h1>
                <br>
                <p><?php echo $row_m1['date']; ?></p>
            </div>
        </div>
        <?php } ?>
        <br><br>
        <div class="media-container d-flex" style="gap: 20px;">
        <?php
            $limit = 3;
            if(isset($_GET['page_g'])){
                $page_g = $_GET['page_g'];
            }else{
                $page_g = 1;
            }
            $offset = ($page_g - 1) * $limit;
            $sql_m2 = "select * from news
            left join category on news.category = category.category_id
            where category = 4
            limit $limit
            offset $offset";
            $result_m2 = mysqli_query($conn, $sql_m2) or die("query m2 failed");
            while($row_m2 = mysqli_fetch_assoc($result_m2)){
        ?>
            <div class="media" style="flex-direction: column;">
                <a href="news-content.php?nid=<?php echo $row_m2['id']; ?>"><img src="admin/news/news-image/<?php echo $row_m2['image']; ?>" class="mr-3" style="width: 450px;" alt=""></a>
                
                <div class="media-body w-100">
                    <br>
                    <p style="text-transform: uppercase;"><?php echo $row_m2['category_name']; ?></p>
                    <a href="news-content.php?nid=<?php echo $row_m2['id']; ?>"><h2><?php echo $row_m2['title']; ?></h2></a>
                    <h1><?php echo $row_m2['description']; ?>...</h1>
                    <p><?php echo $row_m2['date']; ?></p>
                </div>
            </div>
        <?php } ?>
        </div>
        <nav aria-label="Page navigation" class="m-ex">
        <?php

            $sql_p1 = "select * from news where category = 4";
            $result_p1 = mysqli_query($conn, $sql_p1) or die("query failed page 1");
            if(mysqli_num_rows($result_p1) > 0){
                $tot_rec = mysqli_num_rows($result_p1);
                $tot_page = ceil($tot_rec / $limit);

                echo '<ul class="pagination justify-content-center py-5">';
                if($page_g > 1){
                    echo '<li class="page-item"><a href="news.php?page_g='.($page_g - 1).'" class="page-link">Prev</a></li>';
                }   
                
                for($i=1; $i<=$tot_page; $i++){
                    if($i == $page_g){
                        $active = "active";
                    }else{
                        $active = "";
                    }
                    echo '<li class="page-item '.$active.'"><a href="news.php?page_g='.$i.'" class="page-link">'.$i.'</a></li>';
                }
                if($tot_page > $page_g)
                echo '<li class="page-item"><a href="news.php?page_g='.($page_g + 1).'" class="page-link">Next</a></li>';
                echo '</ul>';
            }
                        
        ?>
        </nav>
    </div>
</div>


<div class="news-movie">
    <!-- movie header -->
    <div class="hr-set">
        <img src="image/hr-movie.jpg" alt="">
        <h1>MARVEL CULTURE | LIFESTYLE</h1>
    </div>

    <!-- movie body -->
    <div class="movie-body">
        <h1>LATEST MARVEL CULTURE | LIFESTYLE</h1>
        <?php
            $sql_m1 = "select * from news
            left join category on news.category = category.category_id
            where category = 5
            order by rand()
            limit 1";
            $result_m1 = mysqli_query($conn, $sql_m1) or die("query m1 failed");
            while($row_m1 = mysqli_fetch_assoc($result_m1)){
        ?>
        <div class="media">
            <img src="admin/news/news-image/<?php echo $row_m1['image']; ?>" class="mr-3 w-50" alt="">
            <div class="media-body">
                <p style="text-transform: uppercase;"><?php echo $row_m1['category_name']; ?></p>
                <a href="news-content.php?nid=<?php echo $row_m1['id']; ?>"><h2><?php echo $row_m1['title']; ?></h2></a>
                <h1><?php echo $row_m1['description']; ?>...</h1>
                <br>
                <p><?php echo $row_m1['date']; ?></p>
            </div>
        </div>
        <?php } ?>
        <br><br>
        <div class="media-container d-flex" style="gap: 20px;">
        <?php
            $limit = 3;
            if(isset($_GET['page_l'])){
                $page_l = $_GET['page_l'];
            }else{
                $page_l = 1;
            }
            $offset = ($page_l - 1) * $limit;
            $sql_m2 = "select * from news
            left join category on news.category = category.category_id
            where category = 5
            limit $limit
            offset $offset";
            $result_m2 = mysqli_query($conn, $sql_m2) or die("query m2 failed");
            while($row_m2 = mysqli_fetch_assoc($result_m2)){
        ?>
            <div class="media" style="flex-direction: column;">
                <a href="news-content.php?nid=<?php echo $row_m2['id']; ?>"><img src="admin/news/news-image/<?php echo $row_m2['image']; ?>" class="mr-3" style="width: 450px;" alt=""></a>
                
                <div class="media-body w-100">
                    <br>
                    <p style="text-transform: uppercase;"><?php echo $row_m2['category_name']; ?></p>
                    <a href="news-content.php?nid=<?php echo $row_m2['id']; ?>"><h2><?php echo $row_m2['title']; ?></h2></a>
                    <h1><?php echo $row_m2['description']; ?>...</h1>
                    <p><?php echo $row_m2['date']; ?></p>
                </div>
            </div>
        <?php } ?>
        </div>
        <nav aria-label="Page navigation" class="m-ex">
        <?php

            $sql_p1 = "select * from news where category = 5";
            $result_p1 = mysqli_query($conn, $sql_p1) or die("query failed page 1");
            if(mysqli_num_rows($result_p1) > 0){
                $tot_rec = mysqli_num_rows($result_p1);
                $tot_page = ceil($tot_rec / $limit);

                echo '<ul class="pagination justify-content-center py-5">';
                if($page_l > 1){
                    echo '<li class="page-item"><a href="news.php?page_l='.($page_l - 1).'" class="page-link">Prev</a></li>';
                }   
                
                for($i=1; $i<=$tot_page; $i++){
                    if($i == $page_l){
                        $active = "active";
                    }else{
                        $active = "";
                    }
                    echo '<li class="page-item '.$active.'"><a href="news.php?page_l='.$i.'" class="page-link">'.$i.'</a></li>';
                }
                if($tot_page > $page_l)
                echo '<li class="page-item"><a href="news.php?page_l='.($page_l + 1).'" class="page-link">Next</a></li>';
                echo '</ul>';
            }
                        
        ?>
        </nav>
    </div>
</div>

<?php include "insider.php"; ?>
<?php include "footer.php"; ?>