<?php include "admin-header.php"; 

include "config.php";

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
            move_uploaded_file($m_file_temp, "upload/" . $main_new_file_name);
        } else {
            $error_message = implode('\n', $errors);
            echo "<script>alert('$error_message'); history.back();</script>";
            die();
        }
    }
    
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $c_pass = $_POST['cpass'];
    $contact = $_POST['contact'];
    $date = date("d M YYYY");
    
    // Check if username or email or password already exists
    $checkQuery = "SELECT * FROM user WHERE username = '{$user}' OR email = '{$email}' OR password = '{$pass}'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        // Username, Email, or Password already exists, show an error message
        echo '<script>alert("Username, Email, or Password already exists!"); window.location.href = "'.$hostname.'/admin/users.php";</script>';
    } else {
        // Check if passwords match
        if ($pass == $c_pass) {
            // Insert new record
            $sql = "INSERT INTO user(image, fname, lname, email, username, password, c_password, contact, doj) VALUES('{$main_new_file_name}', '{$fname}', '{$lname}', '{$email}', '{$user}', '{$pass}', '{$c_pass}', {$contact}, '{$date}')";
            $result = mysqli_query($conn, $sql) or die("query failed");

            if ($result > 0) {
                echo '<script>alert("Record added successfully!"); window.location.href = "'.$hostname.'/admin/users-index.php";</script>';
            } else {
                echo '<script>alert("Failed to add record. Please try again."); history.back();</script>';
            }
        } else {
            // Passwords do not match, show an error message
            echo '<script>alert("Password Not Matched!"); window.location.href = "'.$hostname.'/admin/users.php";</script>';
        }
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
                          <label for="">First Name</label>
                          <input type="text" name="fname" pattern="[a-zA-Z]+" title="Alphabets Only" class="form-control" autocomplete="off" required>
                      </div>

                      <div class="form-group">
                          <label for="">Last Name</label>
                          <input type="text" name="lname" pattern="[a-zA-Z]+" title="Alphabets Only" class="form-control" autocomplete="off" required>
                      </div>

                      <div class="form-group">
                            <label for="">Profile Image</label><br>
                            <input type="file" id="imageInput" onchange="displayImage()" name="main-image" required>
                            <img id="selectedImage" alt="."  height="150px">
                      </div>

                      <div class="form-group">
                          <label for="">Email</label>
                          <input type="email" name="email" class="form-control" autocomplete="off" required>
                      </div>

                      <div class="form-group">
                          <label for="">Username</label>
                          <input type="text" pattern=".{8,}"  title="Must Contain 8 Characters" maxlength="8" name="user" class="form-control" autocomplete="off" required>
                      </div>

                      <div class="form-group">
                            <label for="post_title">Password</label>
                            <input type="text"  title="Must Contain 8 Character Password" maxlength="8" name="pass" class="form-control" autocomplete="off" required>
                      </div>

                      <div class="form-group">
                            <label for="post_title">Confirm Password</label>
                            <input type="text"  title="Must Contain 8 Character Password" maxlength="8" name="cpass" class="form-control" autocomplete="off" required>
                      </div>

                      <div class="form-group">
                          <label for="">Contact</label>
                          <input type="text" maxlength="10" pattern="[0-9]{10}" title="Must Contain 10 Numbers Only" name="contact" class="form-control" autocomplete="off" required>
                      </div>

                      <input type="submit" name="submit" class="btn btn-primary" value="Save" required />
                  </form>
                  <!--/Form -->
              </div>
          </div>
      </div>
</div>

<?php include "admin-footer.php"; ?>

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