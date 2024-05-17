<?php include "../admin-header.php";?>

<div id="admin-content">
      <div class="container">
         <div class="row"  style="justify-content: center;">
             <div class="col-md-12">
                 <h1 class="admin-heading">Add Slider</h1>
             </div>
              <div class="col-md-offset-3 col-md-6">
                  <!-- Form -->
                  <form  action="admin/home/f-save-slider.php" method="POST" enctype="multipart/form-data">
                      <div class="form-group">
                          <label for="">Title</label>
                          <input type="text" name="title" class="form-control" autocomplete="off" required>
                      </div>

                      <div class="form-group">
                            <label for="">Slider Image</label><br>
                            <input type="file" id="main_imageInput" onchange="displayMainImage()" name="main-image" required>
                            <img id="selectedMainImage" alt="."  height="150px">
                      </div>
                      
                      
                      <div class="form-group">
                          <label for="exampleInputPassword1"> Description</label>
                          <textarea name="desc" class="form-control" rows="5"  required></textarea>
                      </div>

                      <div class="form-group">
                            <label for="">Logo Image</label><br>
                            <input type="file" id="logo_imageInput" onchange="displayLogoImage()" name="logo-image" required>
                            <img id="selectedLogoImage" alt="."  height="150px">
                      </div>
                    
                      <div class="form-group">
                            <label for="post_title">Button Title</label>
                            <input type="text" name="btn_title" class="form-control" autocomplete="off" required>
                      </div>

                      <div class="form-group">
                            <label for="post_title">Button Link</label>
                            <input type="text" name="btn_link" class="form-control" autocomplete="off" required>
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
    function displayMainImage() {
        // Get the file input element
        var input = document.getElementById('main_imageInput');

        // Get the selected file
        var file = input.files[0];

        if (file) {
            // Create a FileReader
            var reader = new FileReader();

            // Set up the FileReader to display the image
            reader.onload = function (e) {
                var imgElement = document.getElementById('selectedMainImage');
                imgElement.src = e.target.result;
            };

            // Read the selected file as a data URL
            reader.readAsDataURL(file);
        }
    }
    function displayLogoImage() {
        // Get the file input element
        var input = document.getElementById('logo_imageInput');

        // Get the selected file
        var file = input.files[0];

        if (file) {
            // Create a FileReader
            var reader = new FileReader();

            // Set up the FileReader to display the image
            reader.onload = function (e) {
                var imgElement = document.getElementById('selectedLogoImage');
                imgElement.src = e.target.result;
            };

            // Read the selected file as a data URL
            reader.readAsDataURL(file);
        }
    }
</script>