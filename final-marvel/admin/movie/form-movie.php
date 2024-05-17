<?php include "../admin-header.php"; 


include "../config.php";

if(isset($_POST['submit'])){

    $title = $cate = $btn_name = $btn_link = $trailer_link = $desc = $director = $writter = $rating = $run_time = $date = "";
    $title_image = $poster_image = $main_image = "";
    $img1 = $img2 = $img3 = $img4 = $img5 = $img6 = $img7 = $img8 = $img9 = $img10 = $img11 = $img12  = "";
    $error_message = "";

        $title = $_POST['title'];
        $btn_name = $_POST['btn_name'];
        $btn_link = $_POST['btn_link'];
        $cate = $_POST['cate'];
        $trailer_link = $_POST['trailer_link'];
        $desc = trim($_POST['desc']);
        $director = $_POST['director'];
        $writter = $_POST['writter'];
        $rating = $_POST['rating'];
        $run_time = $_POST['run_time'];
        $date = $_POST['date'];

    // Process title image if provided
    if (isset($_FILES['title-image']) && $_FILES['title-image']['error'] == 0) {
        $title_image = processImage($_FILES['title-image'], "title");
    }

    // Process poster image if provided
    if (isset($_FILES['poster-image']) && $_FILES['poster-image']['error'] == 0) {
        $poster_image = processImage($_FILES['poster-image'], "poster");
    }

    // Process main image if provided
    if (isset($_FILES['main-image']) && $_FILES['main-image']['error'] == 0) {
        $main_image = processImage($_FILES['main-image'], "main");
    }

    if (isset($_FILES['img1-image']) && $_FILES['img1-image']['error'] == 0) {
        $img1 = processImage($_FILES['img1-image'], "img");
    }
    if (isset($_FILES['img2-image']) && $_FILES['img2-image']['error'] == 0) {
        $img2 = processImage($_FILES['img2-image'], "img");
    }
    if (isset($_FILES['img3-image']) && $_FILES['img3-image']['error'] == 0) {
        $img3 = processImage($_FILES['img3-image'], "img");
    }
    if (isset($_FILES['img4-image']) && $_FILES['img4-image']['error'] == 0) {
        $img4 = processImage($_FILES['img4-image'], "img");
    }
    if (isset($_FILES['img5-image']) && $_FILES['img5-image']['error'] == 0) {
        $img5 = processImage($_FILES['img5-image'], "img");
    }
    if (isset($_FILES['img6-image']) && $_FILES['img6-image']['error'] == 0) {
        $img6 = processImage($_FILES['img6-image'], "img");
    }
    if (isset($_FILES['img7-image']) && $_FILES['img7-image']['error'] == 0) {
        $img7 = processImage($_FILES['img7-image'], "img");
    }
    if (isset($_FILES['img8-image']) && $_FILES['img8-image']['error'] == 0) {
        $img8 = processImage($_FILES['img8-image'], "img");
    }
    if (isset($_FILES['img9-image']) && $_FILES['img9-image']['error'] == 0) {
        $img9 = processImage($_FILES['img9-image'], "img");
    }
    if (isset($_FILES['img10-image']) && $_FILES['img10-image']['error'] == 0) {
        $img10 = processImage($_FILES['img10-image'], "img");
    }
    if (isset($_FILES['img11-image']) && $_FILES['img11-image']['error'] == 0) {
        $img11 = processImage($_FILES['img11-image'], "img");
    }
    if (isset($_FILES['img12-image']) && $_FILES['img12-image']['error'] == 0) {
        $img12 = processImage($_FILES['img12-image'], "img");
    }

    // Process gallery images if provided
    // $galleryImages = array();
    // for ($i = 1; $i <= 12; $i++) {
    //     $inputName = "img" . $i . "-image";
    //     if (isset($_FILES[$inputName]) && $_FILES[$inputName]['error'] == 0) {
    //         $galleryImages[$i] = processImage($_FILES[$inputName], "img" . $i);
    //     }
    // }

    // If there are no errors, perform database insertion
    if (empty($errors)) {
        
        $sql = "insert into movie(title, title_image, category, poster_image, main_image, button_name, button_link, trailer_link, description, director, writter, rating, run_time, release_date, img1, img2, img3, img4, img5, img6, img7, img8, img9, img10, img11, img12) values('$title', '$title_image', '$cate' , '$poster_image', '$main_image', '$btn_name', '$btn_link', '$trailer_link', '$desc', '$director', '$writter', '$rating', '$run_time', '$date', '$img1', '$img2', '$img3', '$img4', '$img5', '$img6', '$img7', '$img8', '$img9', '$img10', '$img11', '$img12')";
        $result = mysqli_query($conn, $sql) or die("query failed 1" . mysqli_error($conn));
        
        if ($result > 0) {
            echo '<script>alert("Record added successfully!"); window.location.href = "'.$hostname.' /admin/movie/index-movie.php";</script>';
        } else {    
            echo '<script>alert("Failed to add record. Please try again."); window.location.href = "'.$hostname.' /admin/movie/form-movie.php";</script>';
        }
    }
}

function processImage($file, $type)
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
?>

<div id="admin-content">
      <div class="container">
         <div class="row"  style="justify-content: center;">
             <div class="col-md-12">
                 <h1 class="admin-heading">Add Movie</h1>
             </div>
              <div class="col-md-offset-3 col-md-6">
                <!-- Form -->
                <form  action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
                  
                      <div class="form-group">
                          <label for="">Title</label>
                          <input type="text" name="title" title="Alphabets Only" class="form-control" autocomplete="off" required>
                      </div>

                      <div class="form-group">
                            <label for="">Title Image</label><br>
                            <input type="file" id="title_imageInput" onchange="title_displayImage()" name="title-image">
                            <img id="title_selectedImage" alt="."  height="150px">
                      </div>

                      <div class="form-group">
                        <label for="">Category</label>
                        <select name="cate" class="form-control" required>
                            <option disabled selected>Select Category</option>
                            <?php
                                $sql2 = "select * from movie_category";
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
                            <label for="">Poster Image</label><br>
                            <input type="file" id="poster_imageInput" onchange="poster_displayImage()" name="poster-image" required>
                            <img id="poster_selectedImage" alt="."  height="150px">
                      </div>

                      <div class="form-group">
                            <label for="">Main Image</label><br>
                            <input type="file" id="main_imageInput" onchange="main_displayImage()" name="main-image">
                            <img id="main_selectedImage" alt="."  height="150px">
                      </div>

                      <div class="form-group">
                          <label for="">Button Name</label>
                          <input type="text" name="btn_name" value="WATCH NOW"  class="form-control" autocomplete="off" >
                      </div>

                      <div class="form-group">
                          <label for="">Button Link</label>
                          <input type="text" name="btn_link" value="marvel.com"  class="form-control" autocomplete="off" >
                      </div>

                      <div class="form-group">
                          <label for="">Trailer Link</label>
                          <input type="text" name="trailer_link" value="marvel.com" class="form-control" autocomplete="off" >
                      </div>

                      <div class="form-group">
                            <label for="post_title">Description</label>
                            <textarea name="desc" class="form-control" rows="5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum amet doloribus laudantium doloremque consectetur unde dolorum repellat blanditiis asperiores, accusantium perspiciatis, non mollitia. Dolor maiores dignissimos expedita veritatis eligendi, molestiae praesentium sequi porro. Molestiae, aliquam. Aliquid vitae illum ad voluptatum?</textarea>
                      </div>

                      <div class="form-group">
                          <label for="">Director</label>
                          <input type="text" name="director" value="Joe Russo"  class="form-control" autocomplete="off" >
                      </div>

                      <div class="form-group">
                          <label for="">Writter</label>
                          <input type="text" name="writter" value="Stan Lee" class="form-control" autocomplete="off" >
                      </div>

                      <div class="form-group">
                            <label for="post_title">Rating</label>
                            <input type="text" name="rating" value="Lgt+5" class="form-control" autocomplete="off" >
                      </div>

                      <div class="form-group">
                            <label for="post_title">Run Time</label>
                            <input type="text" name="run_time" value="171mins" class="form-control" autocomplete="off" >
                      </div>

                      <div class="form-group">
                          <label for="">Release Date</label>
                          <input type="date" name="date" value="2021-05-11" title="Alphabets Only" class="form-control" autocomplete="off" required>
                      </div>

                      <!-- <input type="submit" name="submit" class="btn btn-primary" value="Save" required /> -->

                <!-- </form> -->
                <!-- /Form -->
              </div>
          </div>
      </div>
</div>



<div id="admin-content">
    <div class="container">
        <div class="row"  style="justify-content: center;">
            <div class="col-md-12">
                <h1 class="admin-heading">Add Gallery</h1>
            </div>
                <div class="row" style="justify-content: center; padding: 20px; box-shadow: 0 0 5px 2px rgba(0, 0, 0, 0.1); border-radius: 10px;">
                    <div class="col-md-offset-3 col-md-5">
                        <div class="form-group">
                            <label for="">Gallery Image 1</label><br>
                            <input type="file" id="img1_imageInput" onchange="img1_displayImage()" name="img1-image">
                            <img id="img1_selectedImage" alt="."  height="150px">
                        </div>
                    </div>
                    <div class="col-md-offset-3 col-md-5">
                        <div class="form-group">
                            <label for="">Gallery Image 2</label><br>
                            <input type="file" id="img2_imageInput" onchange="img2_displayImage()" name="img2-image">
                            <img id="img2_selectedImage" alt="."  height="150px">
                        </div>
                    </div>
                    <div class="col-md-offset-3 col-md-5">
                        <div class="form-group">
                                <label for="">Gallery Image 3</label><br>
                                <input type="file" id="img3_imageInput" onchange="img3_displayImage()" name="img3-image">
                                <img id="img3_selectedImage" alt="."  height="150px">
                        </div>
                    </div>
                    <div class="col-md-offset-3 col-md-5">
                        <div class="form-group">
                                <label for="">Gallery Image 4</label><br>
                                <input type="file" id="img4_imageInput" onchange="img4_displayImage()" name="img4-image">
                                <img id="img4_selectedImage" alt="."  height="150px">
                        </div>
                    </div>
                    <div class="col-md-offset-3 col-md-5">
                        <div class="form-group">
                                <label for="">Gallery Image 5</label><br>
                                <input type="file" id="img5_imageInput" onchange="img5_displayImage()" name="img5-image">
                                <img id="img5_selectedImage" alt="."  height="150px">
                        </div>
                    </div>
                    <div class="col-md-offset-3 col-md-5">
                        <div class="form-group">
                                <label for="">Gallery Image 6</label><br>
                                <input type="file" id="img6_imageInput" onchange="img6_displayImage()" name="img6-image">
                                <img id="img6_selectedImage" alt="."  height="150px">
                        </div>
                    </div>
                    <div class="col-md-offset-3 col-md-5">
                        <div class="form-group">
                                <label for="">Gallery Image 7</label><br>
                                <input type="file" id="img7_imageInput" onchange="img7_displayImage()" name="img7-image">
                                <img id="img7_selectedImage" alt="."  height="150px">
                        </div>
                    </div>
                    <div class="col-md-offset-3 col-md-5">
                        <div class="form-group">
                                <label for="">Gallery Image 8</label><br>
                                <input type="file" id="img8_imageInput" onchange="img8_displayImage()" name="img8-image">
                                <img id="img8_selectedImage" alt="."  height="150px">
                        </div>
                    </div>
                    <div class="col-md-offset-3 col-md-5">
                        <div class="form-group">
                                <label for="">Gallery Image 9</label><br>
                                <input type="file" id="img9_imageInput" onchange="img9_displayImage()" name="img9-image">
                                <img id="img9_selectedImage" alt="."  height="150px">
                        </div>
                    </div>
                    <div class="col-md-offset-3 col-md-5">
                        <div class="form-group">
                                <label for="">Gallery Image 10</label><br>
                                <input type="file" id="img10_imageInput" onchange="img10_displayImage()" name="img10-image">
                                <img id="img10_selectedImage" alt="."  height="150px">
                        </div>
                    </div>
                    <div class="col-md-offset-3 col-md-5">
                        <div class="form-group">
                                <label for="">Gallery Image 11</label><br>
                                <input type="file" id="img11_imageInput" onchange="img11_displayImage()" name="img11-image">
                                <img id="img11_selectedImage" alt="."  height="150px">
                        </div>
                    </div>
                    <div class="col-md-offset-3 col-md-5">
                        <div class="form-group">
                                <label for="">Gallery Image 12</label><br>
                                <input type="file" id="img12_imageInput" onchange="img12_displayImage()" name="img12-image">
                                <img id="img12_selectedImage" alt="."  height="150px">
                        </div>
                    </div>
                    
                </div>
                <br><br><br>

                <input type="submit" name="submit" class="btn btn-primary" style="padding: 0 50px" value="Save" required />

            </form>
        </div>
    </div>
</div>









<?php include "../admin-footer.php"; ?>

<script>
    function title_displayImage() {
        // Get the file input element
        var input = document.getElementById('title_imageInput');

        // Get the selected file
        var file = input.files[0];

        if (file) {
            // Create a FileReader
            var reader = new FileReader();

            // Set up the FileReader to display the image
            reader.onload = function (e) {
                var imgElement = document.getElementById('title_selectedImage');
                imgElement.src = e.target.result;
            };

            // Read the selected file as a data URL
            reader.readAsDataURL(file);
        }
    }
    function poster_displayImage() {
        // Get the file input element
        var input = document.getElementById('poster_imageInput');

        // Get the selected file
        var file = input.files[0];

        if (file) {
            // Create a FileReader
            var reader = new FileReader();

            // Set up the FileReader to display the image
            reader.onload = function (e) {
                var imgElement = document.getElementById('poster_selectedImage');
                imgElement.src = e.target.result;
            };

            // Read the selected file as a data URL
            reader.readAsDataURL(file);
        }
    }
    function main_displayImage() {
        // Get the file input element
        var input = document.getElementById('main_imageInput');

        // Get the selected file
        var file = input.files[0];

        if (file) {
            // Create a FileReader
            var reader = new FileReader();

            // Set up the FileReader to display the image
            reader.onload = function (e) {
                var imgElement = document.getElementById('main_selectedImage');
                imgElement.src = e.target.result;
            };

            // Read the selected file as a data URL
            reader.readAsDataURL(file);
        }
    }


    function img1_displayImage() {
        var input = document.getElementById('img1_imageInput');
        var file = input.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function (e) {
                var imgElement = document.getElementById('img1_selectedImage');
                imgElement.src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    }
    function img2_displayImage() {
        var input = document.getElementById('img2_imageInput');
        var file = input.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function (e) {
                var imgElement = document.getElementById('img2_selectedImage');
                imgElement.src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    }
    function img3_displayImage() {
        var input = document.getElementById('img3_imageInput');
        var file = input.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function (e) {
                var imgElement = document.getElementById('img3_selectedImage');
                imgElement.src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    }
    function img4_displayImage() {
        var input = document.getElementById('img4_imageInput');
        var file = input.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function (e) {
                var imgElement = document.getElementById('img4_selectedImage');
                imgElement.src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    }
    function img5_displayImage() {
        var input = document.getElementById('img5_imageInput');
        var file = input.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function (e) {
                var imgElement = document.getElementById('img5_selectedImage');
                imgElement.src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    }
    function img6_displayImage() {
        var input = document.getElementById('img6_imageInput');
        var file = input.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function (e) {
                var imgElement = document.getElementById('img6_selectedImage');
                imgElement.src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    }
    function img7_displayImage() {
        var input = document.getElementById('img7_imageInput');
        var file = input.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function (e) {
                var imgElement = document.getElementById('img7_selectedImage');
                imgElement.src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    }
    function img8_displayImage() {
        var input = document.getElementById('img8_imageInput');
        var file = input.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function (e) {
                var imgElement = document.getElementById('img8_selectedImage');
                imgElement.src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    }
    function img9_displayImage() {
        var input = document.getElementById('img9_imageInput');
        var file = input.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function (e) {
                var imgElement = document.getElementById('img9_selectedImage');
                imgElement.src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    }
    function img10_displayImage() {
        var input = document.getElementById('img10_imageInput');
        var file = input.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function (e) {
                var imgElement = document.getElementById('img10_selectedImage');
                imgElement.src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    }
    function img11_displayImage() {
        var input = document.getElementById('img11_imageInput');
        var file = input.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function (e) {
                var imgElement = document.getElementById('img11_selectedImage');
                imgElement.src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    }
    function img12_displayImage() {
        var input = document.getElementById('img12_imageInput');
        var file = input.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function (e) {
                var imgElement = document.getElementById('img12_selectedImage');
                imgElement.src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    }

</script>