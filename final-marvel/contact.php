<?php include "header.php"; ?>
<style>
.cont-details{
	width: 100%;
	height: auto;
	padding: 100px;
	display: flex;
	justify-content: center;
	align-items: center;
}
.company-details{
	width: 50%;
	height: auto;
	padding: 20px;
}
.contact-form{
	width: 50%;
	height: auto;
	padding: 20px;
}
input[type="submit"]{
    background: blue;
    color: white;
    width: 100%;
    padding: 15px 0;
    border: 0;
    text-transform: uppercase;
    border-radius: 10px;
}
input[type="submit"]:hover{
    background: red;
} 
</style>

<!-- front image -->
<div class="news-page" style="background: blue;">
    <img src="image/contact.jpg" style="margin-top: -100px; opacity: 0.7;" alt="">
    <h1 style="margin-left: 620px; ">CONTACT US</h1>
</div>


<!-- contact details -->
<div class="cont-details">
    <div class="company-details">
        <h2>How we can  help you:</h2>
        <br>
        <h4>See our platform in action</h4>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta, exercitationem.</p>
        <h4>Master Performance Marketing</h4>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Fugit, distinctio sint. Fuga doloribus facere dolore velit dolorem aliquam exercitationem! Asperiores dolore illo suscipit sed voluptas?</p>
        <h4>Explore Life at Marvel</h4>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam doloribus ex asperiores consectetur nemo distinctio?</p>
        <br>
        <h2>Points of Contact</h2>
        <br>
        <h5>U.S | TUNE</h5>
        <p>11:350 McComick Rd. EP IIL Suite 200,<br>Hunt Valley, MD 21031</p>
        <br>
        <h5>Billing Inquries</h5>
        <p>(1855) 979-7887</p>
        <br>
        <h5>Information and Sales</h5>
        <p><font style="color: blue;">partnermarketing@marvel.com</font></p>
        <br>
        <h5>Verification Employement</h5>
        <p><font style="color: blue;">par@cont.com</font></p>
        <br>
        <h2>Additional Office Locations</h2>
        <br>
        <h4>New York</h4>
        <p>Tustr.231, Vrindn, 1. DC, 10510, Berlin</p>
    </div>
    <div class="contact-form">
        <img src="logo/marvel-studio.png" style="display: block; width: 100%;" alt="">
        <br><br><br><br>
        <?php
        // session_start();
            $fname = isset($_SESSION["fname"]) ? $_SESSION["fname"] : "";
            $lname = isset($_SESSION["lname"]) ? $_SESSION["lname"] : "";
            $email = isset($_SESSION["email"]) ? $_SESSION["email"] : "";
        ?>
        <h6>Please notice: all fields are required.</h6>
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="form-group">
                <label for="my-input">First Name</label>
                <input id="my-input" class="form-control" type="text" name="fname" value="<?php echo $fname; ?>">
            </div>
            <div class="form-group">
                <label for="my-input">Last Name</label>
                <input id="my-input" class="form-control" type="text" name="lname" value="<?php echo $lname; ?>">
            </div>
            <div class="form-group">
                <label for="my-input">Email</label>
                <input id="my-input" class="form-control" type="email" name="email" value="<?php echo $email; ?>">
            </div>
            <div class="form-group">
                <label for="my-input">Subject</label>
                <input id="my-input" class="form-control" type="text" name="subject">
            </div>
            <div class="form-group">
                <label for="my-textarea">Description</label>
                <textarea id="my-textarea" class="form-control" name="desc" rows="6"></textarea>
            </div>
            <div class="form-check">
                <input id="my-input" class="form-check-input" type="checkbox" name="chk" value="true" required>
                <label for="my-input" class="form-check-label">I understand and agree to the <font style="color: blue;">privacy policy</font> of marvel cinematic universe.</label>
            </div>
            <br>
            <input type="submit" name="submit" value="send message">
        </form>
        <?php

            if(isset($_POST['submit'])){

                $fnamee = $_POST['fname'];
                $lnamee = $_POST['lname'];
                $emaill = $_POST['email'];
                $sub = $_POST['subject'];
                $desc = $_POST['desc'];

                if(isset($_SESSION["reg_username"])){

                $sql = "insert into contact(fname, lname, email, subject, description) values('{$fnamee}', '{$lnamee}', '{$emaill}', '{$sub}', '{$desc}')";
                $result = mysqli_query($conn, $sql) or die("query failed");
                if($result){
                    echo "<br><div class='alert alert-success w-100'>Your Complain Registered Successfully.</div>";
                }else{
                    echo "<br><div class='alert alert-danger w-100'>Username and password are not matched.</div>";
                }

            }else{
                echo '<script>alert("Please Register yourself!");
                        window.location.href = "'.$hostname.' /signup.php";</script>';
            }

            }

        ?>
    </div>
</div>


<?php include "footer.php"; ?>


