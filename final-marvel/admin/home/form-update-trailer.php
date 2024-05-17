<?php include "../admin-header.php"; 
include "../config.php";
$tid = $_GET['id'];
$sql = "select * from trailer where id = {$tid}";
$result = mysqli_query($conn, $sql) or die("query failed");
while($row = mysqli_fetch_assoc($result)){

?>

<div id="admin-content">
      <div class="container">
         <div class="row"  style="justify-content: center;">
             <div class="col-md-12">
                 <h1 class="admin-heading">Update Trailer</h1>
             </div>
              <div class="col-md-offset-3 col-md-6">
                  <!-- Form -->
                  <form  action="admin/home/f-save-update-trailer.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="hidden" name="tid"  class="form-control" value="<?php echo $row['id']; ?>" placeholder="">
                        </div>
                      <div class="form-group">
                          <label for="">Title</label>
                          <input type="text" name="title" value="<?php echo $row['title']; ?>" class="form-control" autocomplete="off" required>
                      </div>

                      <div class="form-group">
                        <label for="">Trailer Image</label>
                        <div class="custom-file">
                            <input type="file" name="main-image" onchange="main_previewImage(this, 'main-image-preview')" class="custom-file-input">
                            <label for="" class="custom-file-label">Choose File</label>
                        </div>
                        <img id="main-image-preview"  src="admin/home/home-image/<?php echo $row['image']; ?>" height="150px">
                        <input type="hidden" name="old-image" value="<?php echo $row['image']; ?>">
                      </div>

                      <div class="form-group">
                            <label for="title">Button Link</label>
                            <input type="text" value="<?php echo $row['link']; ?>" name="btn_link" class="form-control" autocomplete="off" required>
                      </div>

                      <input type="submit" name="submit" class="btn btn-primary" value="Save" required />
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