<?php include "../admin-header.php"; 

include "../config.php";

function processImage($file, $type, $old_image)
{
    $file_name = $file['name'];
    $file_size = $file['size'];
    $file_temp = $file['tmp_name'];
    $file_info = pathinfo($file_name);
    $file_ext = strtolower($file_info['extension']);
    $allowed_extensions = array("jpeg", "jpg", "png");
    $errors = array();

    // Check if it's a valid image file
    if (!in_array($file_ext, $allowed_extensions) && !empty($file_ext)) {
        $errors[] = "Invalid file extension for $type image. Please choose a JPG or PNG file.";
    }

    // If no errors, move the file to the 'movie-image' folder
    if (empty($errors)) {
        // Delete the old image if it exists
        if (!empty($old_image)) {
            $old_image_path = "movie-image/" . $old_image;
            if (file_exists($old_image_path)) {
                unlink($old_image_path);
            }
        }

        $timestamp = date("His");
        $new_file_name = $file_info['filename'] . "_" . $timestamp . "." . $file_ext;
        move_uploaded_file($file_temp, "movie-image/" . $new_file_name);
        return $new_file_name;
    } else {
        global $error_message;
        $error_message .= implode("<br>", $errors);
        return "";
    }
}

if (isset($_POST['submit'])) {

    $id = $title = $cate = $btn_name = $btn_link = $tr_link = $desc = $director = $writter = $rating = $run_time = $date = "";
    $title_image = $old_title_image = $poster_image = $old_poster_image = $main_image = $old_main_image = "";
    $img1_image = $old_img1_image = $img2_image = $old_img2_image = $img3_image = $old_img3_image = $img4_image = $old_img4_image = $img5_image = $old_img5_image = $img6_image = $old_img6_image = $img7_image = $old_img7_image = $img8_image = $old_img8_image = $img9_image = $old_img9_image = $img10_image = $old_img10_image = $img11_image = $old_img11_image = $img12_image = $old_img12_image = "";
    $error_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate and process form data
    // ... (similar to the previous code, retrieve and validate form fields)
        $id = $_POST['id'];
        $title = $_POST['title'];
        $btn_name = $_POST['btn_name'];
        $btn_link = $_POST['btn_link'];
        $cate = $_POST['cate'];
        $trailer_link = $_POST['tr_link'];
        $desc = trim($_POST['desc']);
        $director = $_POST['director'];
        $writter = $_POST['writter'];
        $rating = $_POST['rating'];
        $run_time = $_POST['run_time'];

    // Process title image if provided
    if (isset($_FILES['title-image']) && $_FILES['title-image']['error'] == 0) {
        $title_image = processImage($_FILES['title-image'], "title", $_POST['old-title-image']);
    } else {
        // If no new file is provided, use the old image filename
        $title_image = $_POST['old-title-image'];
    }

    // Process poster image if provided
    if (isset($_FILES['poster-image']) && $_FILES['poster-image']['error'] == 0) {
        $poster_image = processImage($_FILES['poster-image'], "poster", $_POST['old-poster-image']);
    } else {
        $poster_image = $_POST['old-poster-image'];
    }

    // Process main image if provided
    if (isset($_FILES['main-image']) && $_FILES['main-image']['error'] == 0) {
        $main_image = processImage($_FILES['main-image'], "main", $_POST['old-main-image']);
    } else {
        $main_image = $_POST['old-main-image'];
    }

    // Process gallery images if provided
    $galleryImages = array();
    for ($i = 1; $i <= 12; $i++) {
        $inputName = "img" . $i . "-image";
        if (isset($_FILES[$inputName]) && $_FILES[$inputName]['error'] == 0) {
            $galleryImages[$i] = processImage($_FILES[$inputName], "img" . $i, $_POST["old-$inputName"]);
        } else {
            $galleryImages[$i] = $_POST["old-$inputName"];
        }
    }

    // If there are no errors, perform database update
    if (empty($errors)) {
        // Use appropriate database table and column names
        $sql = "UPDATE movie 
                SET title = '$title', category = '$cate', title_image = '$title_image', poster_image = '$poster_image', main_image = '$main_image', 
                    img1 = '" . $galleryImages[1] . "', img2 = '" . $galleryImages[2] . "', img3 = '" . $galleryImages[3] . "', 
                    img4 = '" . $galleryImages[4] . "', img5 = '" . $galleryImages[5] . "', img6 = '" . $galleryImages[6] . "', 
                    img7 = '" . $galleryImages[7] . "', img8 = '" . $galleryImages[8] . "', img9 = '" . $galleryImages[9] . "', 
                    img10 = '" . $galleryImages[10] . "', img11 = '" . $galleryImages[11] . "', img12 = '" . $galleryImages[12] . "', 
                    button_name = '$btn_name', button_link = '$btn_link', trailer_link = '$tr_link', description = '$desc', director = '$director', 
                    writter = '$writter', rating = '$rating', run_time = '$run_time' 
                WHERE id = $id";

                $result = mysqli_query($conn, $sql) or die("Error: " . $sql . "<br>" . mysqli_error($conn));

                if ($result > 0) {
                    echo '<script>alert("Record added successfully!"); window.location.href = "'.$hostname.' /admin/movie/index-movie.php";</script>';
                } else {    
                    echo '<script>alert("Failed to add record. Please try again."); window.location.href = "'.$hostname.' /admin/movie/form-update-movie.php";</script>';
                }
    }
}

}


?>

<div id="admin-content">
      <div class="container">
         <div class="row"  style="justify-content: center;">
             <div class="col-md-12">
                 <h1 class="admin-heading">Update Movie</h1>
             </div>
              <div class="col-md-offset-3 col-md-6">
                  <!-- Form -->

                  <?php

                        $id = $_GET['id'];
                        $sql1 = "select * from movie where id = {$id}";
                        $result1 = mysqli_query($conn, $sql1) or die("query failed 1");
                        while($row1 = mysqli_fetch_assoc($result1)){

                    ?>

                  <form  action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="hidden" name="id" value="<?php echo $row1['id']; ?>" autocomplete="off" required>
                        </div>

                      <div class="form-group">
                          <label for="">Title</label>
                          <input type="text" name="title" value="<?php echo $row1['title']; ?>" title="Alphabets Only" class="form-control" autocomplete="off">
                      </div>
                      
                      <div class="form-group">
                        <label for="">Title Image</label><br>
                        <input type="file" name="title-image" onchange="title_previewImage(this, 'title-image-preview')">
                        <img id="title-image-preview"  src="admin/movie/movie-image/<?php echo $row1['title_image']; ?>" height="150px">
                        <input type="hidden" name="old-title-image" value="<?php echo $row1['title_image']; ?>">
                      </div>

                      <div class="form-group">
                        <label for="">Category</label>
                        <select name="cate" class="form-control">
                            <?php

                                $sql2 = "select * from movie_category";
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
                            <label for="">Poster Image</label><br>
                            <input type="file" name="poster-image" onchange="poster_previewImage(this, 'poster-image-preview')">
                            <img id="poster-image-preview"  src="admin/movie/movie-image/<?php echo $row1['poster_image']; ?>" height="150px">
                            <input type="hidden" name="old-poster-image" value="<?php echo $row1['poster_image']; ?>">
                       </div>

                      <div class="form-group">
                            <label for="">Main Image</label><br>
                            <input type="file" name="main-image" onchange="main_previewImage(this, 'main-image-preview')">
                            <img id="main-image-preview"  src="admin/movie/movie-image/<?php echo $row1['main_image']; ?>" height="150px">
                            <input type="hidden" name="old-main-image" value="<?php echo $row1['main_image']; ?>">
                      </div>

                      <div class="form-group">
                          <label for="">Button Name</label>
                          <input type="text" name="btn_name" value="<?php echo $row1['button_name']; ?>" class="form-control" autocomplete="off">
                      </div>

                      <div class="form-group">
                          <label for="">Button Link</label>
                          <input type="text" name="btn_link" value="<?php echo $row1['button_link']; ?>" class="form-control" autocomplete="off">
                      </div>

                      <div class="form-group">
                          <label for="">Trailer Link</label>
                          <input type="text" name="tr_link" value="<?php echo $row1['trailer_link']; ?>" class="form-control" autocomplete="off">
                      </div>

                      <div class="form-group">
                          <label for="">Description</label>
                          <textarea name="desc" class="form-control" rows="5"autocomplete="off">
                          <?php echo trim($row1['description']); ?>
                          </textarea>
                      </div>

                      <div class="form-group">
                          <label for="">Director</label>
                          <input type="text" name="director" value="<?php echo $row1['director']; ?>" class="form-control" autocomplete="off">
                      </div>

                      <div class="form-group">
                          <label for="">Writter</label>
                          <input type="text" value="<?php echo $row1['writter']; ?>" name="writter" class="form-control" autocomplete="off">
                      </div>

                      <div class="form-group">
                          <label for="">Rating</label>
                          <input type="text" value="<?php echo $row1['rating']; ?>" name="rating" class="form-control" autocomplete="off">
                      </div>

                      <div class="form-group">
                          <label for="">Run Time</label>
                          <input type="text" value="<?php echo $row1['run_time']; ?>" name="run_time" class="form-control" autocomplete="off">
                      </div>

                      <!-- <input type="submit" name="submit" class="btn btn-primary" value="Update" /> -->
                  <!-- </form> -->
                  
                  <!--/Form -->
              </div>
          </div>
      </div>
</div>


<div id="admin-content">
    <div class="container">
        <div class="row"  style="justify-content: center;">
            <div class="col-md-12">
                <h1 class="admin-heading">Update Gallery</h1>
            </div>
                <div class="row" style="justify-content: center; padding: 20px; box-shadow: 0 0 5px 2px rgba(0, 0, 0, 0.1); border-radius: 10px;">
                    <div class="col-md-offset-3 col-md-5">
                        <div class="form-group">
                            <label for="">Poster Image</label><br>
                            <input type="file" name="img1-image" onchange="img1_previewImage(this, 'img1-image-preview')">
                            <img id="img1-image-preview"  src="admin/movie/movie-image/<?php echo $row1['img1']; ?>" height="150px">
                            <input type="hidden" name="old-img1-image" value="<?php echo $row1['img1']; ?>">
                        </div>  
                    </div>
                    <div class="col-md-offset-3 col-md-5">
                        <div class="form-group">
                            <label for="">Poster Image</label><br>
                            <input type="file" name="img2-image" onchange="img2_previewImage(this, 'img2-image-preview')">
                            <img id="img2-image-preview"  src="admin/movie/movie-image/<?php echo $row1['img2']; ?>" height="150px">
                            <input type="hidden" name="old-img2-image" value="<?php echo $row1['img2']; ?>">
                        </div>  
                    </div>
                    <div class="col-md-offset-3 col-md-5">
                        <div class="form-group">
                            <label for="">Poster Image</label><br>
                            <input type="file" name="img3-image" onchange="img3_previewImage(this, 'img3-image-preview')">
                            <img id="img3-image-preview"  src="admin/movie/movie-image/<?php echo $row1['img3']; ?>" height="150px">
                            <input type="hidden" name="old-img3-image" value="<?php echo $row1['img3']; ?>">
                        </div>  
                    </div>
                    <div class="col-md-offset-3 col-md-5">
                        <div class="form-group">
                            <label for="">Poster Image</label><br>
                            <input type="file" name="img4-image" onchange="img4_previewImage(this, 'img4-image-preview')">
                            <img id="img4-image-preview"  src="admin/movie/movie-image/<?php echo $row1['img4']; ?>" height="150px">
                            <input type="hidden" name="old-img4-image" value="<?php echo $row1['img4']; ?>">
                        </div>  
                    </div>
                    <div class="col-md-offset-3 col-md-5">
                        <div class="form-group">
                            <label for="">Poster Image</label><br>
                            <input type="file" name="img5-image" onchange="img5_previewImage(this, 'img5-image-preview')">
                            <img id="img5-image-preview"  src="admin/movie/movie-image/<?php echo $row1['img5']; ?>" height="150px">
                            <input type="hidden" name="old-img5-image" value="<?php echo $row1['img5']; ?>">
                        </div>  
                    </div>
                    <div class="col-md-offset-3 col-md-5">
                        <div class="form-group">
                            <label for="">Poster Image</label><br>
                            <input type="file" name="img6-image" onchange="img6_previewImage(this, 'img6-image-preview')">
                            <img id="img6-image-preview"  src="admin/movie/movie-image/<?php echo $row1['img6']; ?>" height="150px">
                            <input type="hidden" name="old-img6-image" value="<?php echo $row1['img6']; ?>">
                        </div>  
                    </div>
                    <div class="col-md-offset-3 col-md-5">
                        <div class="form-group">
                            <label for="">Poster Image</label><br>
                            <input type="file" name="img7-image" onchange="img7_previewImage(this, 'img7-image-preview')">
                            <img id="img7-image-preview"  src="admin/movie/movie-image/<?php echo $row1['img7']; ?>" height="150px">
                            <input type="hidden" name="old-img7-image" value="<?php echo $row1['img7']; ?>">
                        </div>  
                    </div>
                    <div class="col-md-offset-3 col-md-5">
                        <div class="form-group">
                            <label for="">Poster Image</label><br>
                            <input type="file" name="img8-image" onchange="img8_previewImage(this, 'img8-image-preview')">
                            <img id="img8-image-preview"  src="admin/movie/movie-image/<?php echo $row1['img8']; ?>" height="150px">
                            <input type="hidden" name="old-img8-image" value="<?php echo $row1['img8']; ?>">
                        </div>  
                    </div>
                    <div class="col-md-offset-3 col-md-5">
                        <div class="form-group">
                            <label for="">Poster Image</label><br>
                            <input type="file" name="img9-image" onchange="img9_previewImage(this, 'img9-image-preview')">
                            <img id="img9-image-preview"  src="admin/movie/movie-image/<?php echo $row1['img9']; ?>" height="150px">
                            <input type="hidden" name="old-img9-image" value="<?php echo $row1['img9']; ?>">
                        </div>  
                    </div>
                    <div class="col-md-offset-3 col-md-5">
                        <div class="form-group">
                            <label for="">Poster Image</label><br>
                            <input type="file" name="img10-image" onchange="img10_previewImage(this, 'img10-image-preview')">
                            <img id="img10-image-preview"  src="admin/movie/movie-image/<?php echo $row1['img10']; ?>" height="150px">
                            <input type="hidden" name="old-img10-image" value="<?php echo $row1['img10']; ?>">
                        </div>  
                    </div>
                    <div class="col-md-offset-3 col-md-5">
                        <div class="form-group">
                            <label for="">Poster Image</label><br>
                            <input type="file" name="img11-image" onchange="img11_previewImage(this, 'img11-image-preview')">
                            <img id="img11-image-preview"  src="admin/movie/movie-image/<?php echo $row1['img11']; ?>" height="150px">
                            <input type="hidden" name="old-img11-image" value="<?php echo $row1['img11']; ?>">
                        </div>  
                    </div>
                    <div class="col-md-offset-3 col-md-5">
                        <div class="form-group">
                            <label for="">Poster Image</label><br>
                            <input type="file" name="img12-image" onchange="img12_previewImage(this, 'img12-image-preview')">
                            <img id="img12-image-preview"  src="admin/movie/movie-image/<?php echo $row1['img12']; ?>" height="150px">
                            <input type="hidden" name="old-img12-image" value="<?php echo $row1['img12']; ?>">
                        </div>  
                    </div>
                    
                </div>
                <br><br><br>

                <input type="submit" name="submit" class="btn btn-primary" style="padding: 0 50px" value="Update" required />

            </form>
            <?php  } ?>
        </div>
    </div>
</div>














<?php include "../admin-footer.php"; ?>

<script>
    function title_previewImage(input, imgId) {
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
    function poster_previewImage(input, imgId) {
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

    // galley
    function img1_previewImage(input, imgId) {
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
    function img2_previewImage(input, imgId) {
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
    function img3_previewImage(input, imgId) {
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
    function img4_previewImage(input, imgId) {
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
    function img5_previewImage(input, imgId) {
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
    function img6_previewImage(input, imgId) {
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
    function img7_previewImage(input, imgId) {
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
    function img8_previewImage(input, imgId) {
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
    function img9_previewImage(input, imgId) {
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
    function img10_previewImage(input, imgId) {
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
    function img11_previewImage(input, imgId) {
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
    function img12_previewImage(input, imgId) {
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