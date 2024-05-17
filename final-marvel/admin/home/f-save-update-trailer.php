<?php

include "../config.php";

if(empty($_FILES['main-image']['name'])){

    $main_file_name = $_POST['old-image'];
}
else
{
        $main_file_name = $_FILES['main-image']['name'];
        $m_file_size = $_FILES['main-image']['size'];
        $m_file_temp = $_FILES['main-image']['tmp_name']; 
        $m_file_type = $_FILES['main-image']['type'];
        $m_file_info = pathinfo($main_file_name);
        $m_file_ext = strtolower($m_file_info['extension']);
        $m_extensions = array("jpeg", "jpg", "png");

        $errors = array();
    
        if ((in_array($m_file_ext, $m_extensions) === false)) {
            $errors[] = "This extension file is not allowed. Please choose a JPG or PNG file.";
            die();
        }
        
    
        if($m_file_size > 2097152){
            $errors[] = "File size must be 2mb or lower";
            die();
        }

        if (empty($errors) === true) {

            $timestamp = date("YmdHis");
            $main_new_file_name = $m_file_info['filename'] . "_" . $timestamp . "." . $m_file_ext;
            $main_file_name = $main_new_file_name;
            move_uploaded_file($m_file_temp, "home-image/" . $main_file_name);

            if ($_POST['old-image'] != 'default.jpg' && file_exists("home-image/" . $_POST['old-image'])) {
                unlink("home-image/" . $_POST['old-image']);
            }

        }else{
            $error_message = implode('\n', $errors);
            echo "<script>alert('$error_message'); history.back();</script>";
            die();
        }
}

$t_id = $_POST['tid'];
$title = $_POST['title'];
$btn_link = $_POST['btn_link'];
$date = date("d M YYYY");

$sql = "update trailer set  title = '{$title}', image = '{$main_file_name}', link = '{$btn_link}', date = '{$date}', author = 'cynthia' where id = {$t_id}";


$result = mysqli_query($conn, $sql) or die("query failed ");

if ($result > 0) {
    echo '<script>alert("Record updated successfully!"); window.location.href = "'.$hostname.'/admin/home/index-trailer.php";</script>';
} else {
    echo '<script>alert("Failed to update record. Please try again."); window.location.href = "'.$hostname.'/admin/home/form-update-trailer.php";</script>';
}

?>