<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

        include "admin/config.php";

        if(!isset($_COOKIE['rental_time'])){

            echo '<script>alert("Please choose package for Digital Comics!"); window.location.href = "'.$hostname.'/index.php";</script>';

        }else{
            $pdfFilePath = 'media/free1.pdf';
            if(file_exists($pdfFilePath)){
                header('Content-type: application/pdf');
                readfile($pdfFilePath);
            }else{
                echo 'PDF file not found';
            }
        }
    ?>
</body>
</html>