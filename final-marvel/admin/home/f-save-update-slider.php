<?php

include "../config.php";

if(empty($_FILES['new-main-image']['name'])){

    $main_file_name = $_POST['old-main-image'];

}else{
        $main_file_name = $_FILES['new-main-image']['name'];
        $m_file_size = $_FILES['new-main-image']['size'];
        $m_file_temp = $_FILES['new-main-image']['tmp_name']; 
        $m_file_type = $_FILES['new-main-image']['type'];
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

            if ($_POST['old-main-image'] != 'default.jpg' && file_exists("home-image/" . $_POST['old-main-image'])) {
                unlink("home-image/" . $_POST['old-main-image']);
            }

        }else{
            $error_message = implode('\n', $errors);
            echo "<script>alert('$error_message'); history.back();</script>";
            die();
        }
    }

    if(empty($_FILES['new-logo-image']['name'])){

        $logo_file_name = $_POST['old-logo-image'];
    
    }else{
    
            $logo_file_name = $_FILES['new-logo-image']['name'];
            $l_file_size = $_FILES['new-logo-image']['size'];
            $l_file_temp = $_FILES['new-logo-image']['tmp_name']; 
            $l_file_type = $_FILES['new-logo-image']['type'];
            $l_file_info = pathinfo($logo_file_name);
            $l_file_ext = strtolower($l_file_info['extension']);
            $l_extensions = array("jpeg", "jpg", "png");
    
            $errors = array();
        
            if ((in_array($l_file_ext, $l_extensions) === false)) {
                $errors[] = "This extension file is not allowed. Please choose a JPG or PNG file.";
                die();
            }
            
        
            if($l_file_size > 2097152){
                $errors[] = "File size must be 2mb or lower";
                die();
            }
    
            if (empty($errors) === true) {
    
                $timestampp = date("dHYmsi");
                $logo_new_file_name = $l_file_info['filename'] . "_" . $timestampp . "." . $l_file_ext;
                $logo_file_name = $logo_new_file_name;
                move_uploaded_file($l_file_temp, "home-image/" . $logo_file_name);
    
                if ($_POST['old-logo-image'] != 'default.jpg' && file_exists("home-image/" . $_POST['old-logo-image'])) {
                    unlink("home-image/" . $_POST['old-logo-image']);
                }
    
            }else{
                $error_message = implode('\n', $errors);
                echo "<script>alert('$error_message'); history.back();</script>";
                die();
            }
}

$s_id = $_POST['sid'];
$title = $_POST['title'];
$desc = trim($_POST['desc']);
$btn_title = $_POST['btn_title'];
$btn_link = $_POST['btn_link'];
$date = date("d M YYYY");

$sql = "update slider set main_image ='{$main_file_name}', logo_image ='{$logo_file_name}', title ='{$title}', description ='{$desc}', btn_name ='{$btn_title}', btn_link = '{$btn_link}', date = '{$date}', author = 'cynthia' where id = {$s_id}";


$result = mysqli_query($conn, $sql) or die("query failed");

if ($result > 0) {
    echo '<script>alert("Record updated successfully!"); window.location.href = "'.$hostname.'/admin/home/index-slider.php";</script>';
} else {
    echo '<script>alert("Failed to update record. Please try again."); window.location.href = "'.$hostname.'/admin/home/form-update-slider.php";</script>';
}

?>