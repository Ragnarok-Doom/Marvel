<?php
    session_start();
    include "admin/config.php";

    


if(isset($_POST['submit'])){
    
    $_SESSION['cart'] = array(
        'prod_id' => $_POST['prod_id'],
        'image' => $_POST['image'],
        'title' => $_POST['title'],
        'quantity' => $_POST['quantity'],
        'final_price' => $_POST['final_price']
    );


}




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

<!-- disney image and cart -->
<div class="container-fluid disney">
    <div class="row">
        <div class="col-5">
            <a href="index.php" style="padding: 10px 20px; border: 1px solid blue; border-radius: 10px;">BACK</a>
        </div>
        <div class="col-1">
            <a href="http://disney.com" class="dn"><img src="logo/disneystore.png" class="disney-image" alt=""></a>
        </div>
        <div class="col-4">

        </div>
        <div class="col-1">
            <a href="" id="cart-icon"><img src="logo/cart.png" class="cart-image" alt=""></a>
        </div>
    </div>
</div>




<!-- cart -->
<!-- cart -->
<div class="cart">
                
    <div class="cart-logo">
        <img src="logo/logo2.png" alt="">
        <img src="logo/disney.png" alt="">
    </div>
    
    <h5>Your cart</h5>
    <!-- content -->
    <?php
        if(isset($_SESSION['cart'])){
            $cart = $_SESSION['cart'];
    ?>
    <br><br>
    <div class="cart-content" style="display: flex; gap: 10px;">
        <img src="admin/shop/shop-image/<?php echo $cart['image']; ?>" style="width: 100px; display: block;" alt="">
        <div class="cart-cont-tit">
            <?php echo "<h4>".$cart['title']."</h4>"; ?>
            <div style="display: flex; justify-content: space-between;">
                <p>Quantity <br> <?php echo $cart['quantity']; ?></p>
                <p>Final Price <br> <?php echo $cart['final_price']; ?></p>
            </div>
        </div>
    </div>

    <!-- total -->
    <div class="total">
        <div class="total-title">Total</div>
        <div class="total-price">$. <?php echo $cart['final_price']; ?></div>
    </div>
    <!-- buy buton -->
    <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
    <center>
        <button  class="btn-buy" type="submit" name="order-bill" style="text-decoration: none; color: white;">Buy Now</button>
    </center>
    </form>

    <?php

        if(isset($_POST['order-bill'])){
            if(isset($_SESSION["reg_username"])){
                header("Location: $hostname/billing.php");
            }
            else{
                echo '<script>alert("Please Register yourself!"); window.location.href = "'.$hostname.' /signup.php";</script>';
            }
        }

    ?>



    <!-- cart close -->
    <?php }else { echo "<br><br><center><img src='image/spider.png' style='width: 100%;'><br><br><h4 style='letter-spacing: 0.1em;''><font style='font-size: 35px;'>Oops!</font>  Cart is Empty!</h4></center>"; } ?>

    <b style="text-style: normal;" id="close-cart">X</b>
        

    
</div>






<br>

<!-- shop image -->
<div class="shop-title">
    <img src="image/shop_title.png" alt="">
</div>

<br><br>
<div class="hr-thing" style="display: flex; align-items: center; justify-content: center;">
    <hr style="width: 90%; height: 1px; background: red;">
    <h1 align="center" style="font-weight: 100; position: absolute; letter-spacing: 0.5em; background: white;">&nbsp;Marvel Products</h1>
</div>
<br>

<div class="container-fluid shopping-items">
    <div class="row">
        <?php
            include "admin/config.php";
            $sql = "SELECT * FROM shop";
            $result = mysqli_query($conn, $sql) or die("query failed");
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){
                    
        ?>
        <div class="col-3">
            <div class="item-container">
                <div class="item-image">
                    <a href="?pid=<?php echo $row['id']; ?>" id="product-link">
                        <img src="admin/shop/shop-image/<?php echo $row['image']; ?>" alt="">
                    </a>
                </div>
                <br>
                <h5><a href="?pid=<?php echo $row['id']; ?>" id="product-link"><?php echo $row['title']; ?></a></h5>
                <p>price : $<?php echo $row['price']; ?></p>
            </div>
        </div>
        <?php }} ?>
    </div>
</div>




<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
<!-- product details -->
<div class="pro-detail">
    <div class="pro-div">
        <span class="close">&times;</span>
        <?php
            $id = $_GET['pid'];
            $sql1 = "select * from shop where id = {$id}";
            $result1 = mysqli_query($conn, $sql1) or die("query failed");
            if(mysqli_num_rows($result1) > 0){
                while($row1 = mysqli_fetch_assoc($result1)){
                    
        ?>
        <div class="pro-flex">

        <input type="hidden" value="<?php echo $row1['id']; ?>" name="prod_id">

            <div class="pro-flex-image">
                <img src="admin/shop/shop-image/<?php echo $row1['image']; ?>" alt="">
                <input type="hidden" value="<?php echo $row1['image']; ?>" name="image">
            </div>
            <div class="pro-flex-content">
                <h3><input type="text" name="title" value="<?php echo $row1['title']; ?>" readonly></h3>
                <hr style="background: red;">
                <div class="row" style="width: 500px;">
                    <div class="col-6">
                        <p>Status : <font style="color: green;">Available</font></p>
                    </div>
                    <div class="col-6">
                        <p>Colors : <span><?php echo $row1['color']; ?></span></p>
                    </div>
                    <div class="col-6">
                        <p>Height * Width : 182 inch by 15 cm * 100 cm</p>
                    </div>
                    <div class="col-6">
                        <p>Material : <?php echo $row1['material']; ?></p>
                    </div>
                    <div class="col-12">
                        <p>Product Id : <?php echo $row1['id']; ?></p>
                    </div>
                    <div class="col-12">
                        <li><?php echo $row1['description']; ?></li>
                    </div>
                    
                </div>
                
            </div>
            
        </div>
        <br>
        <div class="row">
                <div class="col-6" style="border: none;">
                    <p>Neccessities  :  
                        <br>
                        <?php echo $row1['neccessities']; ?>
                    </p>
                </div>
                <div class="col-2">
                    <p style="color: green; font-weight: 900;">Price : 
                        <br>
                        <?php echo $row1['price']; ?> $(USD)
                    </p>
                </div>
                <div class="col-2">
                    <p style="color: green; font-weight: 900;">
                        Quantity  :
                        <br><br>
                        <input type="number" name="quantity" id="quantityInput" style="width: 30%;" value="1" min="1" max="10" oninput="calculateFinalPrice()">
                    </p>
                </div>
                <div class="col-2">
                    <p style="color: green; font-weight: 900;">
                        Final Price  :
                        <br><br>
                        <input type="number" name="final_price" id="finalPriceInput" value="63.25" style="width: 60%;" readonly>
                    </p>
                </div>
            </div>
        <br>
            <button type="submit" name="submit" class="add-cart"><img src="logo/cart.png" alt="">  &nbsp; Add to Cart</button>
        

        <?php }} ?>
    </div>
</div>

</form>





<div id="load-more-container" style="text-align: center;">
    <a href="" id="load-more" style="padding: 20px 30px; background: red; color: white;">load more</a>
</div>
<br><br><br>


<div class="container-fluid shop-toy">
    <img src="image/shop_toy.webp" alt="">
    <div class="toy-content">
        <h4>Time Flies</h4>
        <h6>Supercharge playtime with toys that spark their imagination</h6>
        <a href="">shop marvel toys</a>
    </div>
</div>

<br>
<h1 style="text-align: center; font-weight: 100;">Marvel Fan Favourite</h1>
<br>


<div class="container-fluid top-rated">
    <div class="top-items">
        <div class="itm"><a href=""><img src="image/shop2.png" alt=""></a></div>
        <div class="itm"><a href=""><img src="image/shop3.png" alt=""></a></div>
        <div class="itm"><a href=""><img src="image/shop4.png" alt=""></a></div>
        <div class="itm"><a href=""><img src="image/shop5.png" alt=""></a></div>
        <div class="itm"><a href=""><img src="image/shop6.png" alt=""></a></div>
        <div class="itm"><a href=""><img src="image/shop2.png" alt=""></a></div>
        <div class="itm"><a href=""><img src="image/shop2.png" alt=""></a></div>
        <div class="itm"><a href=""><img src="image/shop2.png" alt=""></a></div>
    </div>
</div>

<br><br>


<div class="container-fluid visa-image">
    <div class="visa-content">
        <p>
            <font style="font-size: 30px;">$</font><font style="font-size: 100px;">100.00</font>
            <br>
            <b><font style="font-size: 30px;">Statement Credit</font></b>
            <br>
            after first purchase with a new Disney <sup>@</sup>Visa<sup>@</sup>Card.
            <br>
            restrictions apply.
        </p>
        
    </div>
    <img src="image/shop_card.webp" alt="">
</div>



<div class="container-fluid disney-account">
    <div class="acc">
        <a href="about-us.php">About Us</a>
        <br>
        <a href="disney-account.php">Account Info</a>
    </div>
    <div class="media-logo">
        <p>Sign up for our emails to get the inside scoop on special offers and <br> new products.</p><br>
        <a class="sn" href="signup.php">Sign Up</a>
        <br><br><br>
        <div class="logos">
            <a href=""><img src="media/instagram.png" alt=""></a>
            <a href=""><img src="media/snapchat.png" alt=""></a>
            <a href=""><img src="media/twitter.png" alt=""></a>
            <a href=""><img src="media/youtube.png" alt=""></a>
            <a href=""><img src="media/facebook.jpg" alt=""></a>
        </div>
    </div>
</div>



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




    let productDetailesLink = document.querySelector("#product-link");
    let cl = document.querySelector(".close");
    let productDetailes = document.querySelector(".pro-detail");
    productDetailesLink.addEventListener("click", function(event) {
        event.preventDefault();
        productDetailes.style.display = "block";
    });
    cl.addEventListener("click", function(event) {
        event.preventDefault();
        productDetailes.style.display = "none";
    });



    // final price
    function calculateFinalPrice() {
    var quantity = document.getElementById("quantityInput").value;
    var pricePerUnit = 63.25;
    var finalPrice = quantity * pricePerUnit;
    document.getElementById("finalPriceInput").value = finalPrice.toFixed(2);
}





    // cart
let cartIcon = document.querySelector("#cart-icon")
let cart = document.querySelector(".cart")
let closecart = document.querySelector("#close-cart")

// open cart
cartIcon.onclick = (event) =>{
    event.preventDefault();
    cart.classList.add("active");
};
// close cart
closecart.onclick = () =>{
    cart.classList.remove("active");
};





</script>


</body>
</html>