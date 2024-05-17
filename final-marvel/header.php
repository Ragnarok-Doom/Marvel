<?php 
    session_start();
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
    <link rel="stylesheet" href="css/char.css">
</head>
<body>

<div class="container-fluid container-header">
    <div class="row row-signin">
        <div class="col-1">

        </div>
        <div class="col-2 header-signin-logo">
            <center><a href="signin.php"><img src="logo/in-logo.png" alt=""> &nbsp; sign in | join</a></center>
        </div>
        <div class="col-6 header-marvel-image">
            <center><a href="index.php"><img src="logo/logo2.png" alt=""></center></a>
        </div>
        <div class="col-2 header-subscribe-logo">
            <center><a href="unlimited.php"><img src="logo/ultimate-logo.png" alt="">&nbsp; <b>marvel unlimited</b><br><font style="font-weight: 100; letter-spacing: 0;">subscribe</font></a></center>
        </div>
        <div class="col-1">

        </div>
    </div>
    <div class="navigation">
        <ul>
            <?php
                include "admin/config.php";
                if (isset($_GET['cid'])) {
                    $cid = $_GET['cid'];
                }
                
                $sql = "select * from navigation";
                $result = mysqli_query($conn, $sql) or die("query failed");
                
                if (mysqli_num_rows($result) > 0) {
                    $active = "";
                
                    while ($row = mysqli_fetch_assoc($result)) {
                        if (isset($_GET['cid'])) {
                            $active = ($row['navi_id'] == $cid) ? "active" : "";
                        }
                
                        // Check if sessions are created
                        $displayRecord = true;
                
                        if (isset($_SESSION["reg_username"])) {
                        } else {
                            if ($row['navi_id'] == 3) {
                                $displayRecord = false;
                            }
                        }
                        
                        if ($displayRecord) {
                            if($row['navi_id'] == 3){
                                echo "<li><a class='$active' style='' href='{$row['navi_link']}?cid={$row['navi_id']}'>{$row['navi_name']}</a></li>";
                            }else{
                                echo "<li><a class='$active' href='{$row['navi_link']}?cid={$row['navi_id']}'>{$row['navi_name']}</a></li>";
                            }
                            
                        }
                    }
                }
            ?>
        </ul>
    </div>

</div>





<?php
    
    if(!isset($_SESSION["reg_username"])){
?>
<div id="delayedDiv" style="display: none; z-index: 500;">
    <div class="justify-content-center">
        <div class="">
            <button class="btn btn-primary" id="openModalBtn" data-bs-toggle="modal" data-bs-target="#myModal" hidden>open modal box</button>

            <div class="modal fade" id="myModal" data-bs-backdrop="static">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <img src="logo/marvel-studio.png" alt="" style="width: 50%;">
                            <button class="close" id="closeModalBtn" data-bs-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <h5 class="modal-title">Want more features ?</h5>
                            To get more features from our site you have to register yourself as a marvel fan , if already registered then please login first.
                            <br><br>
                            <b>Available Features : </b>
                            
                                <li>Character Site</li>
                                <li>Shop Site</li>
                                <li>Comic Purchase</li>
                                <li>Movie Purchase</li>
                            
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-danger" id="closeModalFooterBtn" data-bs-dismiss="modal">close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    var delayedDiv = document.getElementById("delayedDiv");
    var openModalBtn = document.getElementById("openModalBtn");
    var closeModalBtn = document.getElementById("closeModalBtn");
    var closeModalFooterBtn = document.getElementById("closeModalFooterBtn");

    setTimeout(function() {
        delayedDiv.style.display = "block";
        openModalBtn.click();
    }, 60000);

    // Event listener for the close button inside the modal header
    closeModalBtn.addEventListener("click", function() {
        delayedDiv.style.display = "none";
    });

    // Event listener for the close button inside the modal footer
    closeModalFooterBtn.addEventListener("click", function() {
        delayedDiv.style.display = "none";
    });
});

</script>
<?php } ?>
