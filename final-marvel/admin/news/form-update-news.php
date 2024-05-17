<?php include "../admin-header.php"; 
include "../config.php";

if(isset($_POST['submit'])){

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
            
        
            if($m_file_size > 6097152){
                $errors[] = "File size must be 2mb or lower";
                die();
            }
    
            if (empty($errors) === true) {
    
                $timestamp = date("YmdHis");
                $main_new_file_name = $m_file_info['filename'] . "_" . $timestamp . "." . $m_file_ext;
                $main_file_name = $main_new_file_name;
                move_uploaded_file($m_file_temp, "news-image/" . $main_file_name);
    
                if ($_POST['old-image'] != 'default.jpg' && file_exists("news-image/" . $_POST['old-image'])) {
                    unlink("news-image/" . $_POST['old-image']);
                }
    
            }else{
                $error_message = implode('\n', $errors);
                echo "<script>alert('$error_message'); history.back();</script>";
                die();
            }
    }
    
    $id = $_POST['id'];
    $title = $_POST['title'];
    $desc = trim($_POST['desc']);
    $cate = $_POST['cate'];
    $date = date("d M YYYY");
    $author = $_SESSION["name"];
    
    $sql1 = "update news set title = '{$title}', image = '{$main_file_name}', description = '{$desc}', category = '{$cate}', date = '{$date}', author = '{$author}' where id = {$id}";
    
    $result1 = mysqli_query($conn, $sql1) or die("query failed ");
    
    if ($result1 > 0) {
        echo '<script>alert("Record updated successfully!"); window.location.href = "'.$hostname.'/admin/news/index-news.php";</script>';
    } else {
        echo '<script>alert("Failed to update record. Please try again."); window.location.href = "'.$hostname.'/admin/news/form-update-news.php";</script>';
    }

}









$tid = $_GET['id'];
$sql = "select * from news where id = {$tid}";
$result = mysqli_query($conn, $sql) or die("query failed");
while($row = mysqli_fetch_assoc($result)){

?>

<div id="admin-content">
      <div class="container">
         <div class="row"  style="justify-content: center;">
             <div class="col-md-12">
                 <h1 class="admin-heading">Update News</h1>
             </div>
              <div class="col-md-offset-3 col-md-6">
                  <!-- Form -->
                  <form  action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="hidden" name="id"  class="form-control" value="<?php echo $row['id']; ?>" placeholder="">
                        </div>
                      <div class="form-group">
                          <label for="">Title</label>
                          <input type="text" name="title" value="<?php echo $row['title']; ?>" class="form-control" autocomplete="off" required>
                      </div>

                      <div class="form-group">
                            <label for="title">Description</label>
                            <input type="text" value="<?php echo $row['description']; ?>" name="desc" class="form-control" autocomplete="off" required>
                      </div>

                      <div class="form-group">
                        <label for="">Image</label>
                        <div class="custom-file">
                            <input type="file" name="main-image" onchange="main_previewImage(this, 'main-image-preview')" class="custom-file-input">
                            <label for="" class="custom-file-label">Choose File</label>
                        </div>
                        <img id="main-image-preview"  src="admin/news/news-image/<?php echo $row['image']; ?>" height="150px">
                        <input type="hidden" name="old-image" value="<?php echo $row['image']; ?>">
                      </div>

                      <div class="form-group">
                        <label for="">Category</label>
                        <select name="cate" class="form-control">
                            <option disabled selected>Select Category</option>
                            <?php

                                $sql2 = "select * from category";
                                $result2 = mysqli_query($conn, $sql2) or die("query failed");
                                $select = "";

                                if(mysqli_num_rows($result2) > 0){
                                    while($row2 = mysqli_fetch_assoc($result2)){
                                        if($row2['category_id'] == $row['category']){
                                            $select = "selected";
                                        }else{
                                            $select = "";
                                        }
                                        echo "<option {$select} value='{$row2['category_id']}'>{$row2['category_name']}</option>";
                                    }
                                }

                              ?>
                        </select>
                     </div>

                      <input type="submit" name="submit" class="btn btn-primary" value="Update" required />
                  </form>
                  <!--/Form -->
              </div>
          </div>
      </div>
</div>
<?php } ?>

<?php include "../admin-footer.php"; ?>

<script>
    function main_previewImage(input, imgId) {
        var fileInput = input;
        var imagePreview = document.getElementById(imgId);

        if (fileInput.files && fileInput.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                imagePreview.src = e.target.result;
            };

            reader.readAsDataURL(fileInput.files[0]);
        }
    }
</script>