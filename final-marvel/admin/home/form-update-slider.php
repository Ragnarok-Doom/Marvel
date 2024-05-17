<?php include "../admin-header.php"; 

include "../config.php"; 
$s_id = $_GET['id'];
$sql = "select * from slider where id = $s_id";
$result = mysqli_query($conn, $sql) or die("query failed");
if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
        

?>

<div id="admin-content">
      <div class="container">
         <div class="row"  style="justify-content: center;">
             <div class="col-md-12">
                 <h1 class="admin-heading">Update Slider</h1>
             </div>
              <div class="col-md-offset-3 col-md-6">
                  <!-- Form -->
                  <form  action="admin/home/f-save-update-slider.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="hidden" name="sid"  class="form-control" value="<?php echo $row['id']; ?>" placeholder="">
                        </div>
                      <div class="form-group">
                          <label for="">Title</label>
                          <input type="text" value="<?php echo $row['title']; ?>" name="title" class="form-control" autocomplete="off" required>
                      </div>

                      <div class="form-group">
                        <label for="">Slider Image</label>
                        <div class="custom-file">
                            <input type="file" name="new-main-image" onchange="main_previewImage(this, 'main-image-preview')" class="custom-file-input">
                            <label for="" class="custom-file-label">Choose File</label>
                        </div>
                        <img id="main-image-preview"  src="admin/home/home-image/<?php echo $row['main_image']; ?>" height="150px">
                        <input type="hidden" name="old-main-image" value="<?php echo $row['main_image']; ?>">
                      </div>
                      
                      <div class="form-group">
                          <label for="exampleInputPassword1"> Description</label>
                          <textarea name="desc"  class="form-control" rows="5"  required>
                          <?php echo trim($row['description']); ?>
                          </textarea>
                      </div>

                      <div class="form-group">
                        <label for="">Logo Image</label>
                        <div class="custom-file">
                            <input type="file" name="new-logo-image" onchange="logo_previewImage(this, 'logo-image-preview')" class="custom-file-input">
                            <label for="" class="custom-file-label">Choose File</label>
                        </div>
                        <img id="logo-image-preview"  src="admin/home/home-image/<?php echo $row['logo_image']; ?>" height="150px">
                        <input type="hidden" name="old-logo-image" value="<?php echo $row['logo_image']; ?>">
                      </div>
                    
                      <div class="form-group">
                            <label for="post_title">Button Title</label>
                            <input type="text" value="<?php echo $row['btn_name']; ?>" name="btn_title" class="form-control" autocomplete="off" required>
                      </div>

                      <div class="form-group">
                            <label for="post_title">Button Link</label>
                            <input type="text" value="<?php echo $row['btn_link']; ?>" name="btn_link" class="form-control" autocomplete="off" required>
                      </div>

                      <input type="submit" name="submit" class="btn btn-danger" value="Update" required />
                  </form>
                  <!--/Form -->
              </div>
          </div>
      </div>
</div>
<?php  }} ?>


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
    function logo_previewImage(input, imgId) {
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