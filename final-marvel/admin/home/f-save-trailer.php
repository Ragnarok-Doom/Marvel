<?php

include "../config.php";
session_start();

if (isset($_FILES['main-image'])) {

    $main_file_name = $_FILES['main-image']['name'];
    $m_file_size = $_FILES['main-image']['size'];
    $m_file_temp = $_FILES['main-image']['tmp_name'];
    $m_file_type = $_FILES['main-image']['type'];
    $m_file_info = pathinfo($main_file_name);
    $m_file_ext = strtolower($m_file_info['extension']);
    $m_extensions = array("jpeg", "jpg", "png");

    $errors = array();

    // Check if it's a valid image file
    if (in_array($m_file_ext, $m_extensions) === false) {
    }

    if (!in_array($m_file_ext, $m_extensions)) {
        $errors[] = "This extension file is not allowed. Please choose a JPG or PNG file.";
    }

    if ($m_file_size > 2097152) {
        $errors[] = "File size must be 2mb or lower";
    }

    if (empty($errors)) {
        $timestamp = date("YmdHis");
        $main_new_file_name = $m_file_info['filename'] . "_" . $timestamp . "." . $m_file_ext;
        move_uploaded_file($m_file_temp, "home-image/" . $main_new_file_name);
    } else {
        $error_message = implode('\n', $errors);
        echo "<script>alert('$error_message'); history.back();</script>";
        die();
    }
}

$title = $_POST['title'];
$btn_link = $_POST['btn_link'];
$date = date("d M YYYY");


$sql = "insert into trailer(title, image, link, date, author) values('$title', '$main_new_file_name', '$btn_link', '$date', '{$_SESSION["name"]}')";
$result = mysqli_query($conn, $sql) or die("query failed");

if ($result > 0) {
    echo '<script>alert("Record added successfully!"); window.location.href = "'.$hostname.' /admin/home/index-trailer.php";</script>';
} else {
    echo '<script>alert("Failed to add record. Please try again."); window.location.href = "'.$hostname.' /admin/home/form-update-trailer.php";</script>';
}

?>