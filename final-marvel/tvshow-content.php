<?php include "admin/config.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <!-- <base href="http://localhost/final-marvel/"> -->
  <link rel="stylesheet" href="bootstrap-4.6.2-dist/css/bootstrap.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/comic.css">
  <style>
   * {
    margin: 0;
    padding: 0;
}

.movie-header {
    width: 100%;
    height: 500px;
    display: flex;
    background: black;
    position: relative;
}

.main-img {
    margin-left: auto;
    position: relative;
}
.overlay {
    /* content: ""; */
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 500px;
    z-index: 1;
    background: linear-gradient(to right, rgba(0, 0, 0, 1), rgba(0, 0, 0, 1), rgba(0, 0, 0, 0.9), rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0)); /* Adjust gradient colors and opacity as needed */
}

.title-img {
    position: absolute;
    top: 0;
    left: 0;
    width: 500px;
    height: 350px;
    margin: 60px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    gap: 50px;
    z-index: 2;
}

.title-img a {
    color: white;
    text-decoration: none;
    padding: 10px 30px;
    background: red;
    font-weight: 900;
}

.official-trailer{
    width: 100%;
    height: auto;
    padding: 100px;
}
.official-trailer h3{
    color: gray;
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
}
.official-trailer h2{
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
}
.title-image{
    width: 100%;
    height: 300px;
    background: black;
    display: flex;
    justify-content: center;
    align-items: center;
}


.movie-information{
    position: relative;
    width: 100%;
    height: 650px;
    display: flex;
    /* background: red; */
    justify-content: center;
    margin-top: -30px;
}


/* MOVIE INFO */
.movie-information .movie-overview{
    width: 70%;
    height: auto;
    padding: 10px;
    position: absolute;
    /* margin-top: 330px;
    margin-left: 250px; */
    background: white;
}
.movie-information .movie-overview h1{
    position: relative;
    margin: 50px 100px;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
}
.movie-information .movie-overview .content-photo{
    position: relative;
    display: flex;
}
.movie-information .movie-overview .content-photo .paragraph{
    width: 38%;
    height: 450px;
    margin-left: 100px;
}
.movie-information .movie-overview .content-photo .paragraph p{
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
}

.movie-information .movie-overview .content-photo .paragraph .writters-line1{
    display: flex;
    position: relative;
    margin-top: 50px;
    gap: 50px;
}
.movie-information .movie-overview .content-photo .paragraph .writters-line1 h4{
    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    color: gray;
    font-weight: 500;
    font-size: 15px;
}
.movie-information .movie-overview .content-photo .paragraph .writters-line1 h4 font{
    color: black;
    font-size:17px;
    font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
}
.movie-information .movie-overview .movie-image{
    width: 38%;
    height: auto;
    position: relative;
}
.movie-information .movie-overview .movie-image img{
    width: 50%;
    margin: 20px 150px;
}

/* gallery */
.gallery{
    width: 100%;
    height: auto;
    padding: 0 100px 100px 100px;
}
/* related */
.related-movies{
    width: 100%;
    height: auto;
    background: black;
    padding: 30px 50px;
}
.card img{
    width: 100%;
}



  </style>
</head>
<body>

<div class="container-fluid container-header">
    <div class="row row-signin">
        <div class="col-2 header-signin-logo">
            <center><a href="signin.php"><img src="logo/in-logo.png" alt=""> &nbsp; sign in | join</a></center>
        </div>
        <div class="col-8 header-marvel-image">
            <center><a href="index.php"><img src="logo/logo2.png" alt=""></center></a>
        </div>
        <div class="col-2 header-subscribe-logo">
            <center><a href="unlimited.php"><img src="logo/ultimate-logo.png" alt="">&nbsp; <b>marvel unlimited</b><br><font style="font-weight: 100; letter-spacing: 0;">subscribe</font></a></center>
        </div>
    </div>
</div>

<?php
    $id = $_GET['id'];
    
    if(!isset($_GET['ct'])){

        $sql1 = "select * from tvshow where id = $id";
        $result1 = mysqli_query($conn, $sql1) or die("query failed 1");
        while($row = mysqli_fetch_assoc($result1)){
?>



<div class="movie-header">
    <img src="admin/tvshow/tvshow-image/<?php echo $row['main_image']; ?>" class="main-img" alt="">
    <div class="overlay"></div>
    <div class="title-img">
        <img src="admin/tvshow/tvshow-image/<?php echo $row['title_image']; ?>" style="width: 400px;" alt="">
        <a href="<?php echo $row['button_link']; ?>"><?php echo $row['button_name']; ?></a>
    </div>
</div>


<div class="official-trailer">
    <h1>OFFICIAL TRAILER</h1>
	<iframe width="100%" height="600px" src="https://www.youtube.com/embed/pWdKf3MneyI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>   
	
	<div class="trailer-h23">
        <br>
		<h3>TRAILERS & EXTRAS</h3>
		<h2>Marvel Studios' <?php echo $row['title']; ?> | Official Trailer</h2>
	</div>
</div>



<div class="title-image">
    <img src="admin/tvshow/tvshow-image/<?php echo $row['title_image']; ?>" style="width: 400px;" alt="">
</div>



<div class="movie-information">

	<!-- MOVIE INFORMATION -->
	<div class="movie-overview">

		<h1>OVERVIEW</h1>

		<div class="content-photo">
			<div class="paragraph">
				<p><?php echo $row['description']; ?></p>
				<div class="writters-line1">
					<h4>DIRECTED BY <br> <font><?php echo $row['director']; ?></font></h4>
					<h4>WRITTEN BY <br> <font><?php echo $row['writter']; ?></font></h4>
					<h4>RATING <br> <font><?php echo $row['rating']; ?></font></h4>
				</div>
				<div class="writters-line1">
					<h4>RUN TIME <br> <font><?php echo $row['run_time']; ?></font></h4>
					<h4>RELEASE DATE <br> <font><?php echo $row['release_date']; ?></font></h4>
				</div>
			</div>
			<div class="movie-image">
				<img src="admin/tvshow/tvshow-image/<?php echo $row['poster_image']; ?>">
			</div>
		</div>

	</div>
</div>

<div class="gallery">
    <h1>GALLERY</h1>
    <br><br><br>
    <div class="row">
        <div class="col">
            <div class="card-columns" style="padding: 0 50px;">
                <div class="card border">
                    <img src="admin/tvshow/tvshow-image/<?php echo $row['img1']; ?>" alt="" class="img-fluid">
                </div>
                <div class="card border">
                    <img src="admin/tvshow/tvshow-image/<?php echo $row['img2']; ?>" alt="" class="img-fluid">
                </div>
                <div class="card border">
                    <img src="admin/tvshow/tvshow-image/<?php echo $row['img3']; ?>" alt="" class="img-fluid">
                </div>
                <div class="card border">
                    <img src="admin/tvshow/tvshow-image/<?php echo $row['img4']; ?>" alt="" class="img-fluid">
                </div>
                <div class="card border">
                    <img src="admin/tvshow/tvshow-image/<?php echo $row['img5']; ?>" alt="" class="img-fluid">
                </div>
                <div class="card border">
                    <img src="admin/tvshow/tvshow-image/<?php echo $row['img6']; ?>" alt="" class="img-fluid">
                </div>
                <div class="card border">
                    <img src="admin/tvshow/tvshow-image/<?php echo $row['img7']; ?>" alt="" class="img-fluid">
                </div>
                <div class="card border">
                    <img src="admin/tvshow/tvshow-image/<?php echo $row['img8']; ?>" alt="" class="img-fluid">
                </div>
                <div class="card border">
                    <img src="admin/tvshow/tvshow-image/<?php echo $row['img9']; ?>" alt="" class="img-fluid">
                </div>
                <div class="card border">
                    <img src="admin/tvshow/tvshow-image/<?php echo $row['img10']; ?>"  alt="" class="img-fluid" style="width: 100%;">
                </div>
                <div class="card border">
                    <img src="admin/tvshow/tvshow-image/<?php echo $row['img11']; ?>" alt="" class="img-fluid">
                </div>
                <div class="card border">
                    <img src="admin/tvshow/tvshow-image/<?php echo $row['img12']; ?>" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</div>


<div class="related-movies">
    <h1 style="color: white;">RELATED MOVIES</h1>
    <div class="comic-main-container">
        <div class="only-comic" STYLE="">
            <?php

                $title = $_GET['tit'];
                $tit = substr($title, 0, strpos($title, ' '));
                $sql4 = "select * from tvshow where title like '%$tit%' order by rand() limit 5";
                $result4 = mysqli_query($conn, $sql4) or die("query failed");
                while($row4 = mysqli_fetch_assoc($result4)){

            ?>
            <div class="the-comic" STYLE="">
                <a href="tvshow-content.php?id=<?php echo $row4['id']; ?>&tit=<?php echo $row4['title']; ?>"><img src="admin/tvshow/tvshow-image/<?php echo $row4['poster_image']; ?>" alt=""></a><br>
                <!-- <div class="comic-image-content"> -->
                    <a href="tvshow-content.php?id=<?php echo $row4['id']; ?>&tit=<?php echo $row4['title']; ?>" style="color: white; text-align: center;"><b><h5><?php echo $row4['title']; ?></h5></b></a>
                <!-- </div> -->
            </div>
            <?php } ?>
        </div>
    </div>
</div>
<?php } ?>

<?php }else{ 

$sql2 = "select * from tvshow where id = $id";
$result2 = mysqli_query($conn, $sql2) or die("query failed");
while($row2 = mysqli_fetch_assoc($result2)){

?>

<body style="background: black;">
<div class="upcom" style="width: 100%; height: 90vh; display: flex; justify-content: center; align-items: center; gap: 50px;">
    <img src="admin/tvshow/tvshow-image/<?php echo $row2['poster_image']; ?>" alt="" style="width: 300px; height: 500px;">
    <h1 style="color: white;">NOT <br> AVAILABLE</h1>
</div>
</body>

<?php }} ?>

</body>
</html>