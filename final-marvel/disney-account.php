<?php
session_start();
include "admin/config.php";
// Check if reg_username session exists
$divisionToShow = isset($_SESSION['reg_username']) ? 2 : 1;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marvel</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/a.js"></script>
    <link rel="stylesheet" href="bootstrap-4.6.2-dist/css/bootstrap.css">
</head>
<body>

<!-- code -->
<div class="container-fluid offer-code">
    <div class="code-content">
        <p>Free Shipping on orders of $75 or more! <b>Code: SHIPMAGIC</b></p>
    </div>
    <a href="" class="cross-link">X</a>
</div>

<br>
<div class="container-fluid disney">
    <div class="row">
        <div class="col-5">

        </div>
        <div class="col-1">
            <a href="http://disney.com" class="dn"><img src="logo/disney.png" class="disney-image" alt=""></a>
        </div>
        <div class="col-4">

        </div>
        <div class="col-1">
            
        </div>
    </div>
</div>

<br>
<div class="container-fluid acc-image">
    <img src="image/shop_user.webp" alt="">
    <h1>Welcome</h1>
</div>

<br>
<div class="container-fluid acc-menu">
    <div class="menu1">
        <a href="" class="menu-setting">
            <img style="background: white;" src="logo/setting.png" alt="">
        </a>
        <a href="" class="menu-setting">
            Info & Settings
        </a>
    </div>
    <div class="menu1">
        <a href="" class="menu-history">
            <img style="background: white;" src="logo/order-his.png" alt="">
        </a>
        <a href="" class="menu-history">
            Order History
        </a>
    </div>
</div>

<?php
if(isset($_SESSION["reg_username"]))
{
?>
    <div class="container-fluid acc-page">
        <div class="signup-account">
            <br><br>
            <h3>Account Details</h3>
            <div class="main-info">
                <div class="content-info">
                    <p>
                        <?php
                            
                            $us_id = isset($_SESSION["user_id"]) ? $_SESSION["user_id"] : "";
                            $sql = "select * from register where id = $us_id";
                            $result = mysqli_query($conn, $sql) or die("query failed");
                            if(mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_assoc($result)){
                        ?>
                        <h5>First Name : <?php echo $row["fname"]; ?></h5>
                        <h5>Last Name : <?php echo $row["lname"]; ?></h5>
                        <h5>Email : <?php echo $row["email"]; ?></h5>
                        <h5>Username : <?php echo $row["username"]; ?></h5>
                        <h5>Country : <?php echo $row["country"]; ?></h5>
                        <h5>Contact : <?php echo $row["contact"]; ?></h5>
                        <h5>Date of Join in Marvel | Disney : <br> 15-Jan-23</h5>
                        <?php }
                            } 
                        ?>
                    </p>
                </div>
                <div class="info-image">
                    <?php
                        $images = array(
                            'rand-image(1).jpg',
                            'rand-image(2).jpg',
                            'rand-image(3).jpg',
                            'rand-image(4).jpg',
                            'rand-image(5).jpg',
                            'rand-image(6).jpg',
                            'rand-image(7).jpg'
                        );
                        $randImage = $images[array_rand($images)];
                        echo '<img src="image/'.$randImage.'" alt="">';
                    ?>
                </div>
            </div>
        </div>
    </div>


    <?php
        $u_id = $_SESSION["user_id"];
        $sql1 = "select * from bill where id = $u_id order by del_date desc";
        $result1 = mysqli_query($conn, $sql1) or die("query 1 failed");
        if(mysqli_num_rows($result1) > 0){
            
    ?>


    <div class="container-fluid mo-page">
        <div class="signup-account">
            <br>
            <br>
            <h3>History of Order</h3>
            <div class="order-content">
                <div class="container">
                    <!-- main row start -->
                    <?php while($row1 = mysqli_fetch_assoc($result1)){ ?>
                    <div class="row">
                        <div class="col-4">
                            <p>JHSJGHDFJSDHFF227</p>
                            <h5><?php echo $row1['prod_list']; ?></h5>
                        </div>
                        <div class="col-2">

                        </div>
                        <div class="col-3" style="text-align: right;">
                            <p>Ordered on</p>
                            <h5><?php echo $row1['del_date']; ?></h5>
                        </div>
                        <div class="col-3" style="text-align: right;">
                            <p>status</p>
                            <h5 style="color: green;"><b>Deliverd</b></h5>
                        </div>
                    </div> <!-- row end -->
                    <br>
                    <div class="row">
                        <div class="col-2">
                            <p>package</p>
                            <h5><?php echo (isset($_SESSION['cart']['quantity'])) ? $_SESSION['cart']['quantity'] : "1"; ?> pcs</h5>
                        </div>
                        <div class="col-3">
                            <p>no. of packages</p>
                            <h5>12</h5>
                        </div>
                        <div class="col-1">

                        </div>
                        <div class="col-2" style="text-align: right;">
                            <p>price</p>
                            <h5>63.25 $</h5>
                        </div>
                        <div class="col-2" style="text-align: right;">
                            <p>dth</p>
                            <h5>40 $</h5>
                        </div>
                        <div class="col-2"  style="text-align: right;">
                            <p>price(+ dth)</p>
                            <h5><?php echo $row1['price'] + 40; ?> $</h5>
                        </div>
                    </div><!-- main row end -->
                    <br>
                    <div class="row" style="text-align: right;">
                        <p>Your order will be delivered by <b> 15 dec 2015</b></p>
                        <br>
                        <hr style="width: 800px; height: 2px; background: #18cafb;">
                    </div>
                    <?php } ?>
                    <br>
                    <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
                        
                        <button type="submit" name="delete-order" style="margin-left: 70%;  padding: 10px 20px; background: gray; color: white; border: 1px solid lightGray">clear order history</button>
                        
                    </form>
                    <?php
                        if(isset($_POST['delete-order'])){
                            $u_id = $_SESSION["user_id"];
                            $del = "delete from bill where id = $u_id";
                            $res = mysqli_query($conn, $del) or die("del failed");
                            if($res){
                                echo '<script>alert("Record deleted Successfully!"); window.location.href = "'.$hostname.'/disney-account.php";</script>';
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <?php 
             
        } //if end
        else
        { 
    ?>


        <div class="container-fluid mo-page">
            <div class="signup-account">
                <br>
                <br>
                <h3>Disney Order History</h3>
                <p>Purchase products <a href="shop.php">disney shop</a> with discount</p>
                <img src="image/rocket.png" alt="">
                <h2><font style="font-size: 50px;">Oops!</font> you have not purchase our products!</h2>
            </div>
        </div>

<?php
    }
}
else
{
    ?>
<div class="container-fluid acc-page">
    <div class="signup-account">
        <br><br>
        <h3>Disney Account Info</h3>
        <p>Please <a href="">sign up</a> to view your account</p>
        <img src="image/shop_acc.jpg" alt="">
        <h2>Oops! you are not logged in!</h2>
    </div>
</div>
<?php } ?>



<div class="container-fluid disney-footer">
   <p>
© Disney, All Rights Reserved &nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp; Terms of Use &nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp; Additional Content Information &nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp; Privacy Policy &nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp; Your US State Privacy Rights &nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp; Do Not Sell or Share My Personal Information &nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp; Children's Online Privacy Policy &nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp; About Disney &nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp; Interest-Based Ads &nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp; California Transparency in Supply Chains Act
    </p>
</div>

<script>
    // Get the cross link element
    var crossLink = document.querySelector('.cross-link');

    // Add click event listener to the cross link
    crossLink.addEventListener('click', function(event) {
        // Get the container div
        event.preventDefault();
        var container = document.querySelector('.offer-code');
        // Hide the container by setting its display property to 'none'
        container.style.display = 'none';
    });

</script>
<script>
  // Get anchor tags and division elements
  var anchor1 = document.querySelector('.menu-setting');
  var anchor2 = document.querySelector('.menu-history');
  var division1 = document.querySelector('.acc-page');
  var division2 = document.querySelector('.mo-page');

  // Function to show division 1 and hide division 2
  function showDivision1() {
    division1.style.display = 'block';
    division2.style.display = 'none';
  }

  // Function to show division 2 and hide division 1
  function showDivision2() {
    division1.style.display = 'none';
    division2.style.display = 'block';
  }

  // Function to add click event listeners based on divisionToShow value
  function setupClickListeners() {
    <?php if ($divisionToShow == 2) { ?>
      anchor1.addEventListener('click', function(event) {
        event.preventDefault();
        showDivision1();
      });

      anchor2.addEventListener('click', function(event) {
        event.preventDefault();
        showDivision2();
      });

      // Show division 1 by default
      showDivision1();
    <?php } else { ?>
      // If divisionToShow is not 2, treat both anchors as opening division 1
      anchor1.addEventListener('click', function(event) {
        event.preventDefault();
        showDivision1();
      });

      anchor2.addEventListener('click', function(event) {
        event.preventDefault();
        showDivision1();
      });

      // Show division 1 by default
      showDivision1();
    <?php } ?>
  }

  // Add click event listener to setup click listeners once the DOM is loaded
  document.addEventListener("DOMContentLoaded", function() {
    setupClickListeners();
  });
</script>



</body>
</html>