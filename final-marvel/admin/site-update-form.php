<?php include "admin-header.php"; 

include "config.php";

if(isset($_POST['submit'])){

    $id = $_POST['id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $user = $_POST['user'];
    $contact = $_POST['contact'];

    $sql = "update register set fname = '{$fname}', lname = '{$lname}', email = '{$email}', username = '{$user}', contact = {$contact} where id = {$id}";
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
                 <h1 class="admin-heading">Update Site User</h1>
             </div>
              <div class="col-md-offset-3 col-md-6">
                  <!-- Form -->

                  <?php

                        $id = $_GET['id'];
                        $sql1 = "select * from register where id = {$id}";
                        $result1 = mysqli_query($conn, $sql1) or die("query failed 1");
                        while($row1 = mysqli_fetch_assoc($result1)){

                    ?>

                  <form  action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
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