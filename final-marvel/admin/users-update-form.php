<?php include "admin-header.php"; 

include "config.php";

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
    
                $timestamp = date("dHis");
                $main_new_file_name = $m_file_info['filename'] . "_" . $timestamp . "." . $m_file_ext;
                $main_file_name = $main_new_file_name;
                move_uploaded_file($m_file_temp, "upload/" . $main_file_name);
    
                if ($_POST['old-image'] != 'default.jpg' && file_exists("upload/" . $_POST['old-image'])) {
                    unlink("upload/" . $_POST['old-image']);
                }
    
            }else{
                $error_message = implode('\n', $errors);
                echo "<script>alert('$error_message'); history.back();</script>";
                die();
            }
    }
        $id = $_POST['id'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $user = $_POST['user'];
        $contact = $_POST['contact'];
    
        $sql = "update user set image = '{$main_file_name}', fname = '{$fname}', lname = '{$lname}', email = '{$email}', username = '{$user}', contact = {$contact} where id = {$id}";
        $result = mysqli_query($conn, $sql) or die("query failed");
        
        
        if ($result > 0) {
            echo '<script>alert("Record updated successfully!"); window.location.href = "'.$hostname.' /admin/users-index.php";</script>';
        } else {
            echo '<script>alert("Failed to update record. Please try again."); history.back();';
        }

}



?>

<div id="admin-content">
      <div class="container">
         <div class="row"  style="justify-content: center;">
             <div class="col-md-12">
                 <h1 class="admin-heading">Update User</h1>
             </div>
              <div class="col-md-offset-3 col-md-6">
                  <!-- Form -->

                  <?php

                        $id = $_GET['id'];
                        $sql1 = "select * from user where id = {$id}";
                        $result1 = mysqli_query($conn, $sql1) or die("query failed 1");
                        while($row1 = mysqli_fetch_assoc($result1)){

                    ?>

                  <form  action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="hidden" name="id" value="<?php echo $row1['id']; ?>" autocomplete="off" required>
                        </div>

                      <div class="form-group">
                          <label for="">First Name</label>
                          <input type="text" name="fname" value="<?php echo $row1['fname']; ?>" pattern="[a-zA-Z]+" title="Alphabets Only" class="form-control" autocomplete="off" required>
                      </div>

                      <div class="form-group">
                          <label for="">Last Name</label>
                          <input type="text" name="lname" value="<?php echo $row1['lname']; ?>" pattern="[a-zA-Z]+" title="Alphabets Only" class="form-control" autocomplete="off" required>
                      </div>

                      <div class="form-group">
                        <label for="">Profile Image</label><br>
                        <input type="file" name="new-image" onchange="previewImage(this, 'image-preview')">
                        <img id="image-preview"  src="admin/upload/<?php echo $row1['image']; ?>" height="150px">
                        <input type="hidden" name="old-image" value="<?php echo $row1['image']; ?>">
                      </div>

                      <div class="form-group">
                          <label for="">Email</label>
                          <input type="email" name="email" value="<?php echo $row1['email']; ?>" class="form-control" autocomplete="off" required>
                      </div>

                      <div class="form-group">
                          <label for="">Username</label>
                          <input type="text" pattern=".{8,}" value="<?php echo $row1['username']; ?>" title="Must Contain 8 Characters" maxlength="8" name="user" class="form-control" autocomplete="off" required>
                      </div>

                      <div class="form-group">
                          <label for="">Contact</label>
                          <input type="text" maxlength="10" value="<?php echo $row1['contact']; ?>" pattern="[0-9]{10}" title="Must Contain 10 Numbers Only" name="contact" class="form-control" autocomplete="off" required>
                      </div>

                      <input type="submit" name="submit" class="btn btn-primary" value="Update" required />
                  </form>
                  <?php  } ?>
                  <!--/Form -->
              </div>
          </div>
      </div>
</div>

<?php include "admin-footer.php"; ?>

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