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
                move_uploaded_file($m_file_temp, "shop-image/" . $main_file_name);
    
                if ($_POST['old-image'] != 'default.jpg' && file_exists("shop-image/" . $_POST['old-image'])) {
                    unlink("shop-image/" . $_POST['old-image']);
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
    $color = $_POST['color'];
    $material = $_POST['material'];
    $necc = trim($_POST['necc']);
    $price = $_POST['price'];
    $author = $_SESSION["name"];
    
    $sql1 = "update shop set title = '{$title}', image = '{$main_file_name}', description = '{$desc}', color = '{$color}', material = '{$material}', neccessities = '{$necc}', price = '{$price}', author = '{$author}' where id = {$id}";
    
    $result1 = mysqli_query($conn, $sql1) or die("query failed ");
    
    if ($result1 > 0) {
        echo '<script>alert("Record updated successfully!"); window.location.href = "'.$hostname.'/admin/shop/index-shop.php";</script>';
    } else {
        echo '<script>alert("Failed to update record. Please try again."); window.location.href = "'.$hostname.'/admin/shop/form-update-shop.php";</script>';
    }

}









$tid = $_GET['id'];
$sql = "select * from shop where id = {$tid}";
$result = mysqli_query($conn, $sql) or die("query failed");
while($row = mysqli_fetch_assoc($result)){

?>

<div id="admin-content">
      <div class="container">
         <div class="row"  style="justify-content: center;">
             <div class="col-md-12">
                 <h1 class="admin-heading">Update Product</h1>
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
                        <label for="">Image</label>
                        <div class="custom-file">
                            <input type="file" name="main-image" onchange="main_previewImage(this, 'main-image-preview')" class="custom-file-input">
                            <label for="" class="custom-file-label">Choose File</label>
                        </div>
                        <img id="main-image-preview"  src="admin/shop/shop-image/<?php echo $row['image']; ?>" height="150px">
                        <input type="hidden" name="old-image" value="<?php echo $row['image']; ?>">
                      </div>

                      <div class="form-group">
                          <label for="">Description</label>
                          <textarea name="desc" class="form-control" rows="5"autocomplete="off">
                          <?php echo trim($row['description']); ?>
                          </textarea>
                      </div>

                      <div class="form-group">
                          <label for="">Color</label>
                          <input type="text" name="color" value="<?php echo $row['color']; ?>" class="form-control" autocomplete="off" required>
                      </div>

                      <div class="form-group">
                          <label for="">Material</label>
                          <input type="text" name="material" value="<?php echo $row['material']; ?>" class="form-control" autocomplete="off" required>
                      </div>

                      <div class="form-group">
                          <label for="">Neccessities</label>
                          <textarea name="necc" class="form-control" rows="5"autocomplete="off">
                          <?php echo trim($row['neccessities']); ?>
                          </textarea>
                      </div>

                      <div class="form-group">
                          <label for="">Price</label>
                          <input type="number" name="price" value="<?php echo $row['price']; ?>" class="form-control" autocomplete="off" required>
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