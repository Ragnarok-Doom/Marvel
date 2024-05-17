<?php include "../admin-header.php"; 

include "../config.php";
// session_start();

if(isset($_POST['submit'])){

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
    
        if ($m_file_size > 60097152) {
            $errors[] = "File size must be 2mb or lower";
        }
    
        if (empty($errors)) {
            $timestamp = date("YmdHis");
            $main_new_file_name = $m_file_info['filename'] . "_" . $timestamp . "." . $m_file_ext;
            move_uploaded_file($m_file_temp, "shop-image/" . $main_new_file_name);
        } else {
            $error_message = implode('\n', $errors);
            echo "<script>alert('$error_message'); history.back();</script>";
            die();
        }
    }
    
    $title = $_POST['title'];
    $desc = trim($_POST['desc']);
    $color = $_POST['color'];
    $material = $_POST['material'];
    $necc = trim($_POST['necc']);
    $price = trim($_POST['price']);
    $author = $_SESSION["name"];
    
    // Insert into the main 'news' table
    $sql = "insert INTO shop(title, image, description, color, material, neccessities, price, author)
            VALUES ('$title', '$main_new_file_name', '$desc', '$color', '$material', '$necc', '$price', '$author')";
    $result = mysqli_query($conn, $sql) or die("query failed");
    
    if ($result) {
        echo '<script>alert("Record added successfully!"); window.location.href = "'.$hostname.' /admin/shop/index-shop.php";</script>';
    } else {
        echo '<script>alert("Failed to add record. Please try again."); window.location.href = "'.$hostname.' /admin/shop/form-shop.php";</script>';
    }
    mysqli_close($conn);
    
}


?>





<div id="admin-content">
      <div class="container">
         <div class="row"  style="justify-content: center;">
             <div class="col-md-12">
                 <h1 class="admin-heading">Add Product</h1>
             </div>
              <div class="col-md-offset-3 col-md-6">
                  <!-- Form -->
                  <form  action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
                      <div class="form-group">
                          <label for="">Title</label>
                          <input type="text" name="title" class="form-control" autocomplete="off" required>
                      </div>
                      
                      <div class="form-group">
                            <label for="">Image</label><br>
                            <input type="file" id="imageInput" onchange="displayImage()" name="main-image" required>
                            <img id="selectedImage" alt="."  height="150px">
                      </div>

                      <div class="form-group">
                          <div class="form-group">
                          <label for="">Description</label>
                            <textarea id="my-textarea" class="form-control" name="desc" rows="4">
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nulla non eligendi labore, quasi sit est at voluptatem, cum qui error facere mollitia laborum. Laudantium eius impedit neque hic velit repellat nemo. Hic asperiores minima qui, quo doloremque cupiditate suscipit inventore at blanditiis modi architecto aliquid consequatur unde praesentium sit eos veritatis iusto necessitatibus obcaecati. Repellendus dignissimos error delectus atque sed et quae nisi id amet similique mollitia quis quidem molestiae illum veritatis nobis, harum laudantium veniam enim ab exercitationem quam dolores necessitatibus. Velit sit libero excepturi, voluptate, obcaecati enim cum ratione quae quos inventore eaque corporis fuga dolores, officiis reprehenderit.
                            </textarea>
                          </div>
                      </div>

                      <div class="form-group">
                          <label for="">Color</label>
                          <input type="text" name="color" class="form-control" value="Red,  Green,  Yellow" autocomplete="off" required>
                      </div>

                      <div class="form-group">
                          <label for="">Material</label>
                          <input type="text" name="material" class="form-control" value="84% staineless steel / 12% polypropylene / 2% ABS / 2% silicone" autocomplete="off" required>
                      </div>

                      <div class="form-group">
                          <div class="form-group">
                          <label for="">Neccessities</label>
                            <textarea id="my-textarea" class="form-control" name="necc" rows="4">
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nulla non eligendi labore, quasi sit est at voluptatem, cum qui error facere mollitia laborum. Laudantium eius impedit neque hic velit repellat nemo. Hic asperiores minima qui, quo doloremque cupiditate suscipit inventore at blanditiis modi architecto aliquid consequatur unde praesentium sit eos veritatis iusto necessitatibus obcaecati. Repellendus dignissimos error delectus atque sed et quae nisi id amet similique mollitia quis quidem molestiae illum veritatis nobis, harum laudantium veniam enim ab exercitationem quam dolores necessitatibus. Velit sit libero excepturi, voluptate, obcaecati enim cum ratione quae quos inventore eaque corporis fuga dolores, officiis reprehenderit.
                            </textarea>
                          </div>
                      </div>

                      <div class="form-group">
                          <label for="">Price ($ - USD)</label>
                          <input type="number" name="price" value="63.25" class="form-control" autocomplete="off" required>
                      </div>

                      <input type="submit" name="submit" class="btn btn-primary" value="Save" required />
                  </form>
                  <!--/Form -->
              </div>
          </div>
      </div>
</div>

<?php include "../admin-footer.php"; ?>

<script>
    function displayImage() {
        // Get the file input element
        var input = document.getElementById('imageInput');

        // Get the selected file
        var file = input.files[0];

        if (file) {
            // Create a FileReader
            var reader = new FileReader();

            // Set up the FileReader to display the image
            reader.onload = function (e) {
                var imgElement = document.getElementById('selectedImage');
                imgElement.src = e.target.result;
            };

            // Read the selected file as a data URL
            reader.readAsDataURL(file);
        }
    }
</script>