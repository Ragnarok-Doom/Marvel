<?php include "../admin-header.php"; 

include "../config.php";

if(isset($_POST['submit'])){

    if(empty($_FILES['new-image']['name'])){

        $main_file_name = $_POST['old-image'];
    
    }else{
            $main_file_name = $_FILES['new-image']['name'];
            $m_file_size = $_FILES['new-image']['size'];
            $m_file_temp = $_FILES['new-image']['tmp_name']; 
            $m_file_type = $_FILES['new-image']['type'];
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
                move_uploaded_file($m_file_temp, "comic-image/" . $main_file_name);
    
                if ($_POST['old-image'] != 'default.jpg' && file_exists("comic-image/" . $_POST['old-image'])) {
                    unlink("comic-image/" . $_POST['old-image']);
                }
    
            }else{
                $error_message = implode('\n', $errors);
                echo "<script>alert('$error_message'); history.back();</script>";
                die();
            }
    }

    $id = $_POST['id'];
    $title = $_POST['title'];
    $pd = $_POST['date'];
    $cate = $_POST['cate'];
    $writer = $_POST['writer'];
    $penciler = $_POST['penciler'];
    $cov_art = $_POST['cover_artist'];
    $desc = trim($_POST['desc']);
    $price = $_POST['price'];
    
    $sql = "update comic set title = '{$title}', image = '{$main_file_name}', pub_date = '{$pd}', category = '{$cate}', writer = '{$writer}', penciler = '{$penciler}', cover_artist = '{$cov_art}', description = '{$desc}', price = '{$price}' where id = '{$id}'";
    $result = mysqli_query($conn, $sql) or die("query failed");
        
        
        if ($result > 0) {
            echo '<script>alert("Record updated successfully!"); window.location.href = "'.$hostname.' /admin/comic/index-comic.php";</script>';
        } else {
            echo '<script>alert("Failed to update record. Please try again."); history.back();';
        }

}



?>

<div id="admin-content">
      <div class="container">
         <div class="row"  style="justify-content: center;">
             <div class="col-md-12">
                 <h1 class="admin-heading">Update Comic</h1>
             </div>
              <div class="col-md-offset-3 col-md-6">
                  <!-- Form -->

                  <?php

                        $id = $_GET['id'];
                        $sql1 = "select * from comic where id = {$id}";
                        $result1 = mysqli_query($conn, $sql1) or die("query failed 1");
                        while($row1 = mysqli_fetch_assoc($result1)){

                    ?>

                  <form  action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="hidden" name="id" value="<?php echo $row1['id']; ?>" autocomplete="off" required>
                        </div>

                      <div class="form-group">
                          <label for="">Title</label>
                          <input type="text" name="title" value="<?php echo $row1['title']; ?>" title="Alphabets Only" class="form-control" autocomplete="off" required>
                      </div>
                      
                      <div class="form-group">
                        <label for="">Comic Image</label><br>
                        <input type="file" name="new-image" onchange="previewImage(this, 'image-preview')">
                        <img id="image-preview"  src="admin/comic/comic-image/<?php echo $row1['image']; ?>" height="150px">
                        <input type="hidden" name="old-image" value="<?php echo $row1['image']; ?>">
                      </div>

                      <div class="form-group">
                          <label for="">Published Date</label>
                          <input type="date" name="date" value="<?php echo $row1['pub_date']; ?>" class="form-control" autocomplete="off" required>
                      </div>

                      <div class="form-group">
                        <label for="">Category</label>
                        <select name="cate" class="form-control">
                            <?php

                                $sql2 = "select * from comic_category";
                                $result2 = mysqli_query($conn, $sql2) or die("query failed");
                                $select = "";

                                if(mysqli_num_rows($result2) > 0){
                                    while($row2 = mysqli_fetch_assoc($result2)){
                                        if($row2['category_id'] == $row1['category']){
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


                      <div class="form-group">
                          <label for="">Writer</label>
                          <input type="text" name="writer" value="<?php echo $row1['writer']; ?>" class="form-control" autocomplete="off" required>
                      </div>

                      <div class="form-group">
                          <label for="">Penciler</label>
                          <input type="text" value="<?php echo $row1['penciler']; ?>" name="penciler" class="form-control" autocomplete="off" required>
                      </div>

                      <div class="form-group">
                          <label for="">Cover Artist</label>
                          <input type="text" value="<?php echo $row1['cover_artist']; ?>" name="cover_artist" class="form-control" autocomplete="off" required>
                      </div>

                      <div class="form-group">
                          <label for="">Description</label>
                          <textarea name="desc" class="form-control" rows="5" requiredautocomplete="off" required>
                          <?php echo trim($row1['description']); ?>
                          </textarea>
                      </div>

                      <div class="form-group">
                          <label for="">Price</label>
                          <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">$</span>
                                    <input type="text" name="price" value="<?php echo $row1['price']; ?>" class="form-control">
                                </div>
                            </div>
                      </div>

                      <input type="submit" name="submit" class="btn btn-primary" value="Update" required />
                  </form>
                  <?php  } ?>
                  <!--/Form -->
              </div>
          </div>
      </div>
</div>

<?php include "../admin-footer.php"; ?>

<script>
    function previewImage(input, imgId) {
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