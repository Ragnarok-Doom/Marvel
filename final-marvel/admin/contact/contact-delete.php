<?php

include "../config.php";

$id = $_GET['id'];

$sql = "delete from contact where id = {$id}";

$result = mysqli_query($conn, $sql);

if($result){
    header("Location: {$hostname}/admin/users-index.php");
}

?>