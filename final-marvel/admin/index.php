<?php

include "config.php";
session_start();

if(isset($_SESSION["username"])){
    header("Location:{$hostname}/admin/admin-index.php");
}

?>


<!doctype html>
<html>
   <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>ADMIN | Login</title>
        <base href="http://localhost/final-marvel/">
        <link rel="stylesheet" href="css/adminStyle.css">
        <script src="js/a.js"></script>
        <link rel="stylesheet" href="bootstrap-4.6.2-dist/css/bootstrap.css">
    </head>

    <body>
        <div id="wrapper-admin" class="body-content" >
            <div class="container">
                <div class="row" >
                    <div class="col-md-offset-4 col-md-4" style="margin: auto;">
                        <img class="logo" src="logo/marvel-studio.png"><br>
                        <h3 class="heading">Admin</h3>
                        <!-- Form Start -->

                        <?php

                        if(isset($_POST['login'])){
                            include "config.php";

                            $username = $_POST['username'];
                            $password = $_POST['password'];

                            if(empty($username) || empty($password)){
                                echo "<div class='alert alert-danger'>User Must Fill all Details!</div>";
                            }else{
                                $sql = "select * from user where username = '{$username}' and password = '{$password}'";
                                $result = mysqli_query($conn, $sql) or die("query failed");

                            if(mysqli_num_rows($result) > 0){
                                
                                while($row = mysqli_fetch_assoc($result)){

                                    session_start();
                                    $_SESSION["name"] = $row['fname'];
                                    $_SESSION["username"] = $row['username'];
                                    $_SESSION["user_id"] = $row['id'];
                                    $_SESSION["image"] = $row['image'];
                                    $_SESSION["doj"] = $row['doj'];

                                    header("Location:{$hostname}/admin/admin-index.php");
                                }

                            }else{
                                echo "<div class='alert alert-danger'>Username and password are not matched.</div>";
                            }
                            }
                        }

                        ?>

                        <form  action="<?php $_SERVER['PHP_SELF']; ?>" method ="POST">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" maxlength="8" class="form-control" placeholder="" required>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" maxlength="8" name="password" class="form-control" placeholder="" required>
                            </div>
                            <input type="submit" name="login" class="btn btn-primary" value="login" />
                        </form>
                        <!-- /Form  End -->
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
