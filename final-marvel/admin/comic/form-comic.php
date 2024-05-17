<?php include "../admin-header.php"; 

include "../config.php";

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
    
        if ($m_file_size > 2097152) {
            $errors[] = "File size must be 2mb or lower";
        }
    
        if (empty($errors)) {
            $timestamp = date("YmdHis");
            $main_new_file_name = $m_file_info['filename'] . "_" . $timestamp . "." . $m_file_ext;
            move_uploaded_file($m_file_temp, "comic-image/" . $main_new_file_name);
        } else {
            $error_message = implode('\n', $errors);
            echo "<script>alert('$error_message'); history.back();</script>";
            die();
        }
    }
    
    $title = $_POST['title'];
    $pd = $_POST['date'];
    $cate = $_POST['cate'];
    $writer = $_POST['writer'];
    $penciler = $_POST['penciler'];
    $cov_art = $_POST['cover_artist'];
    $desc = trim($_POST['desc']);
    $price = $_POST['price'];
    $year = date("YYYY");
    
    
    $sql = "insert into comic(title, image, pub_date, category, writer, penciler, cover_artist, description, price, year, author) values('$title', '$main_new_file_name', '$pd' , '$cate', '$writer', '$penciler', '$cov_art', '$desc', '$price', '$year' , '{$_SESSION["name"]}')";
    $result = mysqli_query($conn, $sql) or die("query failed");
    
    if ($result > 0) {
        echo '<script>alert("Record added successfully!"); window.location.href = "'.$hostname.' /admin/comic/index-comic.php";</script>';
    } else {
        echo '<script>alert("Failed to add record. Please try again."); window.location.href = "'.$hostname.' /admin/comic/form-comic.php";</script>';
    }

}

?>

<div id="admin-content">
      <div class="container">
         <div class="row"  style="justify-content: center;">
             <div class="col-md-12">
                 <h1 class="admin-heading">Add User</h1>
             </div>
              <div class="col-md-offset-3 col-md-6">
                  <!-- Form -->
                  <form  action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
                  
                      <div class="form-group">
                          <label for="">Title</label>
                          <input type="text" name="title" title="Alphabets Only" class="form-control" autocomplete="off" required>
                      </div>
                      
                      <div class="form-group">
                            <label for="">Comic Image</label><br>
                            <input type="file" id="imageInput" onchange="displayImage()" name="main-image" required>
                            <img id="selectedImage" alt="."  height="150px">
                      </div>

                      <div class="form-group">
                          <label for="">Published Date</label>
                          <input type="date" name="date" title="Alphabets Only" class="form-control" autocomplete="off" required>
                      </div>

                      <div class="form-group">
                        <label for="">Category</label>
                        <select name="cate" class="form-control" required>
                            <option disabled selected>Select Category</option>
                            <?php

                                $sql2 = "select * from comic_category";
                                $result2 = mysqli_query($conn, $sql2) or die("query failed");

                                if(mysqli_num_rows($result2) > 0){
                                    while($row2 = mysqli_fetch_assoc($result2)){
                                        echo "<option value='{$row2['category_id']}'>{$row2['category_name']}</option>";
                                    }
                                }

                              ?>
                        </select>
                      </div>


                      <div class="form-group">
                          <label for="">Writer</label>
                          <input type="text" name="writer"  class="form-control" autocomplete="off" required>
                      </div>

                      <div class="form-group">
                          <label for="">Penciler</label>
                          <input type="text" name="penciler" class="form-control" autocomplete="off" required>
                      </div>

                      <div class="form-group">
                            <label for="post_title">Cover Artist</label>
                            <input type="text" name="cover_artist" class="form-control" autocomplete="off" required>
                      </div>

                      <div class="form-group">
                            <label for="post_title">Description</label>
                            <textarea name="desc" class="form-control" rows="5"  required></textarea>
                      </div>

                      <div class="form-group">
                          <label for="">Price</label>
                          <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">$</span>
                                    <input type="text" name="price" id="" class="form-control">
                                </div>
                            </div>
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