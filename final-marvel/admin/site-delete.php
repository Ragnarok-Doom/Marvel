<?php

include "config.php";

$id = $_GET['id'];
$sql = "delete from register where id = {$id}";

$result = mysqli_query($conn, $sql);

if($result){
    header("Location: {$hostname}/admin/users-index.php");
}

?>