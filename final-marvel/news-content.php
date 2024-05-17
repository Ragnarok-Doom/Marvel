<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap-4.6.2-dist/css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/a.js"></script>
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        body{
        }
        .back-box{
            height: 50px;
            background: black;
        }
        .back-box a{
            color: white;
            border: 1px solid white;
            margin: 5px;
        }
        .back-box a:hover{
            color: white;
            border: 1px solid white;
        }
        .news-image{
            width: 700px;
            border: 2px solid red;
            border-radius: 20px;
            padding: 50px;
        }
        h1{

        }
        p{
            font-weight: 500;
            font-size: 18px;
        }
    </style>
</head>
<?php
    include "admin/config.php";
    $nid = $_GET['nid'];
    $sql = "select * from news
    left join category on news.category = category.category_id
    where id = {$nid}";
    $result = mysqli_query($conn, $sql) or die("query failed");
    while($row = mysqli_fetch_assoc($result)){
?>
<body>
    <div class="container-fluid back-box">
        <a href="javascript:history.back();" class="btn">BACK</a>
    </div>
        <div class="container-fluid" style="background: linear-gradient(to right, rgba(150, 150, 150, 1), rgba(0, 0, 0, 0.1) 50%, rgba(150, 150, 150, 1) 100%);">
        <br><br>
            <div class="news-image" style="position: relative; top: 50%; left: 50%; transform: translateX(-50%) translateY(0%);">
                <h1><?php echo $row['title']; ?></h1>
                <img src="admin/news/news-image/<?php echo $row['image']; ?>" style="width: 600px; display: block;" alt="">
                <br><br>
                <p>
                    Category  :  <?php echo $row['category_name']; ?>
                    <br>
                    Author : <?php echo $row['author']; ?>
                    <br>
                    Published Date : <?php echo $row['date']; ?>
                </p>
                <br>
                <br>
                <?php echo $row['description']; ?>
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptatum tempore quaerat numquam sequi dignissimos accusamus, officia fugit quia exercitationem molestias fugiat, commodi culpa fuga excepturi nulla quod quo provident saepe at corrupti alias hic. Libero distinctio iusto ipsa unde animi nam vitae dolorem deleniti, id repellat asperiores. Consequatur aut recusandae perferendis velit neque pariatur voluptates culpa explicabo voluptatum optio, sint totam expedita in animi enim aliquam nisi. Eaque fugit mollitia quam vel. Repellat at illum esse voluptatum consequuntur aspernatur ipsam. Quas facere ab blanditiis deleniti pariatur consequatur porro, suscipit enim? Ipsam ducimus repellat quam neque aliquid id necessitatibus sequi dicta.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas itaque consequatur, dicta consequuntur architecto magni voluptatem maxime impedit dolor delectus. Suscipit nobis asperiores at repellendus quod quis est fugiat nesciunt tenetur voluptate, incidunt sapiente quisquam accusamus id sequi. Earum ut ipsum debitis a ipsam iure aut quia animi amet est neque nisi, ab similique vitae commodi reprehenderit. Natus corrupti dicta assumenda possimus quaerat culpa illo nisi accusantium similique! Dolorem beatae explicabo recusandae natus nisi. Architecto deserunt perspiciatis doloribus necessitatibus ex iusto amet quis explicabo accusantium eaque beatae aut molestias, porro, vitae tempore sed laudantium. Iusto id eveniet hic consequuntur ipsam?
            </div>
            <br><br>
        </div>
        <?php } ?>
<?php include "footer.php"; ?>