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
include  "admin/config.php";
$sql1 = "select * from comic where id = {$id}";
$result = mysqli_query($conn, $sql1) or die("query failed");
while($row1 = mysqli_fetch_assoc($result)){

?>
<div class="container-com">

    <img src="admin/comic/comic-image/<?php echo $row1['image']; ?>" class="main">

    <div class="comic-image">
        <img src="admin/comic/comic-image/<?php echo $row1['image']; ?>" class="min">

        <div class="comic-image-content">
          <h1><?php echo $row1['title']; ?> (<?php echo $row1['year']; ?>) #<?php echo $row1['id']; ?></h1><br><br>
          <h3>Published :<h6><?php echo $row1['pub_date']; ?></h6></h3><br><br>
          <div class="swap">
            <h3>Writer :<br><font style="font-size: medium;"> <a href="#"><?php echo $row1['writer']; ?></a></font></h3>
            <h3>Penciler :<br><font style="font-size: medium;"> <a href="#"><?php echo $row1['penciler']; ?></a></font></h3>
          </div><br><br>
          <h3>Cover Artist :<h6> <a href=""><?php echo $row1['cover_artist']; ?></a></h6></h3>
            <br><br>
            <p><?php echo $row1['description']; ?></p>
        </div>
    </div>

    

    <div class="code">
        <div class="code1">
            <h1>PRINT ISSUE</h1><font style="font-size: small;">Limited Availibility</font>
            <form method="get" action="">
              <input type="text" name="code" id="code" pattern="RAGNAROK" autocomplete="off"  oninvalid="alert('Your Code is Incorrect')" placeholder="ENTER ZIP CODE"><br>
              <button type="submit"><center> FIND A STORE </center></button>
              <?php
                if($row1['category'] == 3){
                  echo '<a class="btn" style="margin: 90px; color: red; BORDER: 2px solid red;" href="media/free1.pdf" download>Download</a>';
                }
              ?>
            </form>
        </div>
        <hr style="margin-left: 50px; background-color: gray; width: 2px; height: auto;">
        <div class="code2">
            <h1>DIGITAL ISSUE</h1>
            <font style="font-size: small;">Read online or on your iPhone, iPad or Android Device</font><br>
            <img src="logo/logo2.png" style="display: block;"><br>
            <h6>Marvel Unlimited Members get unlimited access to this issue and over 30,000 others! </h6>
            <a href="https://play.google.com/store/apps/details?id=com.marvel.unlimited"> <center> FIND A STORE </center></a>
        </div>
        <?php
          if($row1['category'] != 3){
        ?>
        <hr style="margin-left: 50px; background-color: gray; width: 2px; height: auto;">
        <div class="code2">
                <H1>Purchase / Rent</H1>
                <font style="font-size: small;">You can purchase or rent this comic for some time</font>
                <br><br>
                <!-- <h6>Purchase</h6> -->
                <a class="btn btn-outline-danger" style="" href="" onclick="alert('Currently not available for customers!')">Purchase</a>
                <!-- <h6>Rent</h6> --><br><br>
                <a class="btn btn-outline-danger" style="" href="rent-package.php">Rent</a>
        </div>
        <?php
        }
        ?>
    </div>

    <div class="more-details">
      <div class="details-in">
        <div class="details-1">
            <h1>MORE DETAILS</h1>
            <br>
            <h3>EXTENDED CREDIT AND INFO</h3>
            <br>
            <p>
              <font>Rating : </font> Rated T+ <br>
              <font>Format : </font> Comic <br>
              <font>Price : </font> $<?php echo $row1['price']; ?> <br>
              <font>UPC : </font> 759606203681000611 <br>
              <font>FOC Date : </font> Sep 26, 2022
            </p>
        </div>
        <div class="details-2">
          <h3>STORIES</h3>
            <br>
          <p>
            <font>Writer : </font> <?php echo $row1['writer']; ?> <br>
            <font>Inker : </font> <?php echo $row1['title']; ?> <br>
            <font>Colorist : </font> Marte Gracia <br>
            <font>Letterverse : </font> Vc Clayton Cowles <br>
            <font>Penciler : </font> <?php echo $row1['penciler']; ?> <br>
            <font>Editor : </font> Tom Brevoort
          </p>
         </div>
        <div class="details-3">
          <h3>COVER INFORMATION</h3>
            <br>
          <p>
            <font>Editor : </font> Tom Brevoort <br>
            <font>Painter (cover) : </font> Mark Brooks <br>
            <font>Penciler (cover) : </font> <?php echo $row1['penciler']; ?>
          </p>
        </div>
      </div>
    </div>
    <?php } ?>

    
    <div class="recommand">
      <h1>RECOMMANDED COMIC</h1>
      <div class="extra-comic">
      <?php

        $sql2 = "select * from comic order by rand() limit 2";
        $result2 = mysqli_query($conn, $sql2) or die("query failed");
        while($row2 = mysqli_fetch_assoc($result2)){

      ?>
        <div class="extra1">
          <a href="comic-content.php?id=<?php echo $row2['id']; ?>"><img src="admin/comic/comic-image/<?php echo $row2['image']; ?>"></a>
          <br><br>
          <p> <a href="#" class="img-con-link"><?php echo $row2['title']; ?> (<?php echo $row2['year']; ?>) #<?php echo $row2['id']; ?></a></p>
        </div>
        <?php } ?>
      </div>
    </div>
</div>


<?php include "footer.php"; ?>