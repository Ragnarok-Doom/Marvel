<?php include "admin-header.php"; 
include "config.php"; ?>

<div id="admin-content">
      <div class="container">
          <div class="row">

              <div class="col-md-12">
              <div class="acordion" id="accor">
                <!-- card 1 -->
                <div class="card">
                    <div class="card-header">
                        <button class="btn btn-block btn-link text-left" data-bs-toggle="collapse" data-bs-target="#cynDiv1">+ Admin Users</button>
                    </div>
                    <div id="cynDiv1" class="collapse show" data-bs-parent="#accor">
                        <div class="card card-body">
                            <div class="row">
                                <div class="col-md-10">
                                    <h1 class="admin-heading">All Admin Users</h1>
                                </div>
                                <div class="col-md-2">
                                    <a class="add-new" href="admin/users.php">add user</a>
                                </div>
                                <div class="col-md-12">
                                <table class="content-table">
                                    <thead>
                                        <th>S.No.</th>
                                        <th>Full Name</th>
                                        <th>Email</th>
                                        <th>Username</th>
                                        <th>Date of Join</th>
                                        <th>Contact</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </thead>
                                    <tbody>
                                        <?php

                                            $limit = 4;
                                            if(isset($_GET['page_s'])){
                                                $page_s = $_GET['page_s'];
                                            }else{
                                                $page_s = 1;
                                            }
                                            $offset = ($page_s - 1) * $limit;
                                            $sql1 = "select * from user order by id desc limit $offset, $limit";
                                            $result1 = mysqli_query($conn, $sql1) or die("query failed");
                                            if(mysqli_num_rows($result1) > 0){
                                                $serial = $offset + 1;
                                                while($row = mysqli_fetch_assoc($result1)){

                                        ?>
                                        <tr>
                                            <td class='id'><?php echo $serial; ?></td>
                                            <td><?php echo $row['fname'] . " " . $row['lname']; ?></td>
                                            <td><?php echo $row['email']; ?></td>
                                            <td><?php echo $row['username']; ?></td>
                                            <td><?php echo $row['doj']; ?></td>
                                            <td><?php echo $row['contact']; ?></td>
                                            <td class='edit'><a href='admin/users-update-form.php?id=<?php echo $row['id']; ?>'><img class="ed-tr-logo" src="logo/edit.png" alt=""></a></td>
                                            <td class='delete'><a href='admin/users-delete.php?id=<?php echo $row['id']; ?>'><img class="ed-tr-logo" src="logo/trash.png" alt=""></a></td>
                                        </tr>
                                        <?php $serial++; }} ?>
                                    </tbody>
                                </table>
                                <nav class="">

                                    <?php

                                        $sql_p1 = "select * from user";
                                        $result_p1 = mysqli_query($conn, $sql_p1) or die("query failed page 1");
                                        if(mysqli_num_rows($result_p1) > 0){
                                            $tot_rec = mysqli_num_rows($result_p1);
                                            $tot_page = ceil($tot_rec / $limit);

                                            echo '<ul class="pagination justify-content-center py-5">';
                                            if($page_s > 1){
                                                echo '<li class="page-item"><a href="admin/users-index.php?page_s='.($page_s - 1).'" class="page-link">Prev</a></li>';
                                            }   
                                            
                                            for($i=1; $i<=$tot_page; $i++){
                                                if($i == $page_s){
                                                    $active = "active";
                                                }else{
                                                    $active = "";
                                                }
                                                echo '<li class="page-item '.$active.'"><a href="admin/users-index.php?page_s='.$i.'" class="page-link">'.$i.'</a></li>';
                                            }
                                            if($tot_page > $page_s)
                                            echo '<li class="page-item"><a href="admin/users-index.php?page_s='.($page_s + 1).'" class="page-link">Next</a></li>';
                                            echo '</ul>';
                                        }
                                        
                                    ?>
                                    
                                </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- card 2 -->
                <div class="card">
                    <div class="card-header">
                        <button class="btn btn-block btn-link text-left" data-bs-toggle="collapse" data-bs-target="#cynDiv2">+ Site Users</button>
                    </div>
                    <div id="cynDiv2" class="collapse" data-bs-parent="#accor">
                        <div class="card card-body">
                            <div class="row">
                                <div class="col-md-10">
                                    <h1 class="admin-heading">All Site Users</h1>
                                </div>
                                <div class="col-md-2">
                                </div>
                                <div class="col-md-12">
                                <table class="content-table">
                                    <thead>
                                        <th>S.No.</th>
                                        <th>Full Name</th>
                                        <th>Email</th>
                                        <th>Username</th>
                                        <th>Date of Join</th>
                                        <th>Country</th>
                                        <th>Contact</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </thead>
                                    <tbody>
                                        <?php

                                            $limit = 4;
                                            if(isset($_GET['page_a'])){
                                                $page_a = $_GET['page_a'];
                                            }else{
                                                $page_a = 1;
                                            }
                                            $offset = ($page_a - 1) * $limit;
                                            $sql1 = "select * from register order by id desc limit $offset, $limit";
                                            $result1 = mysqli_query($conn, $sql1) or die("query failed");
                                            if(mysqli_num_rows($result1) > 0){
                                                $serial = $offset + 1;
                                                while($row = mysqli_fetch_assoc($result1)){

                                        ?>
                                        <tr>
                                            <td class='id'><?php echo $serial; ?></td>
                                            <td><?php echo $row['fname'] . " " . $row['lname']; ?></td>
                                            <td><?php echo $row['email']; ?></td>
                                            <td><?php echo $row['username']; ?></td>
                                            <td><?php echo $row['doj']; ?></td>
                                            <td><?php echo $row['country']; ?></td>
                                            <td><?php echo $row['contact']; ?></td>
                                            <td class='edit'><a href='admin/site-update-form.php?id=<?php echo $row['id']; ?>'><img class="ed-tr-logo" src="logo/edit.png" alt=""></a></td>
                                            <td class='delete'><a href='admin/site-delete.php?id=<?php echo $row['id']; ?>'><img class="ed-tr-logo" src="logo/trash.png" alt=""></a></td>
                                        </tr>
                                        <?php $serial++; }} ?>
                                    </tbody>
                                </table>
                                <nav class="">

                                    <?php

                                        $sql_p1 = "select * from register";
                                        $result_p1 = mysqli_query($conn, $sql_p1) or die("query failed page 1");
                                        if(mysqli_num_rows($result_p1) > 0){
                                            $tot_rec = mysqli_num_rows($result_p1);
                                            $tot_page = ceil($tot_rec / $limit);

                                            echo '<ul class="pagination justify-content-center py-5">';
                                            if($page_a > 1){
                                                echo '<li class="page-item"><a href="admin/users-index.php?page_a='.($page_a - 1).'#cynDiv2" class="page-link">Prev</a></li>';
                                            }   
                                            
                                            for($i=1; $i<=$tot_page; $i++){
                                                if($i == $page_a){
                                                    $active = "active";
                                                }else{
                                                    $active = "";
                                                }
                                                echo '<li class="page-item '.$active.'"><a href="admin/users-index.php?page_a='.$i.'#cynDiv2" class="page-link">'.$i.'</a></li>';
                                            }
                                            if($tot_page > $page_a)
                                            echo '<li class="page-item"><a href="admin/users-index.php?page_a='.($page_a + 1).'#cynDiv2" class="page-link">Next</a></li>';
                                            echo '</ul>';
                                        }
                                        
                                    ?>
                                    
                                </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- card 3 -->
                <div class="card">
                    <div class="card-header">
                        <button class="btn btn-block btn-link text-left" data-bs-toggle="collapse" data-bs-target="#cynDiv3">+ Complains</button>
                    </div>
                    <div id="cynDiv3" class="collapse" data-bs-parent="#accor">
                        <div class="card card-body">
                        <div class="row">
                                <div class="col-md-10">
                                    <h1 class="admin-heading">Users Complain</h1>
                                </div>
                                <div class="col-md-2">
                                </div>
                                <div class="col-md-12">
                                <table class="content-table">
                                    <thead>
                                        <th>S.No.</th>
                                        <th>Full Name</th>
                                        <th>Email</th>
                                        <th>Subject</th>
                                        <th>Description</th>
                                        <th>Delete</th>
                                    </thead>
                                    <tbody>
                                        <?php

                                            $limit = 4;
                                            if(isset($_GET['page_a'])){
                                                $page_a = $_GET['page_a'];
                                            }else{
                                                $page_a = 1;
                                            }
                                            $offset = ($page_a - 1) * $limit;
                                            $sql1 = "select * from contact order by id desc limit $offset, $limit";
                                            $result1 = mysqli_query($conn, $sql1) or die("query failed");
                                            if(mysqli_num_rows($result1) > 0){
                                                $serial = $offset + 1;
                                                while($row = mysqli_fetch_assoc($result1)){
                                        ?>
                                        <tr>
                                            <td class='id'><?php echo $serial; ?></td>
                                            <td><?php echo $row['fname'] . " " . $row['lname']; ?></td>
                                            <td><?php echo $row['email']; ?></td>
                                            <td><?php echo $row['subject']; ?></td>
                                            <td><?php echo $row['description']; ?></td>
                                            <td class='delete'><a href='admin/contact/contact-delete.php?id=<?php echo $row['id']; ?>'><img class="ed-tr-logo" src="logo/trash.png" alt=""></a></td>
                                        </tr>
                                        <?php $serial++; }} ?>
                                    </tbody>
                                </table>
                                <nav class="">

                                    <?php

                                        $sql_p1 = "select * from contact";
                                        $result_p1 = mysqli_query($conn, $sql_p1) or die("query failed page 1");
                                        if(mysqli_num_rows($result_p1) > 0){
                                            $tot_rec = mysqli_num_rows($result_p1);
                                            $tot_page = ceil($tot_rec / $limit);

                                            echo '<ul class="pagination justify-content-center py-5">';
                                            if($page_a > 1){
                                                echo '<li class="page-item"><a href="admin/users-index.php?page_a='.($page_a - 1).'#cynDiv3" class="page-link">Prev</a></li>';
                                            }   
                                            
                                            for($i=1; $i<=$tot_page; $i++){
                                                if($i == $page_a){
                                                    $active = "active";
                                                }else{
                                                    $active = "";
                                                }
                                                echo '<li class="page-item '.$active.'"><a href="admin/users-index.php?page_a='.$i.'#cynDiv3" class="page-link">'.$i.'</a></li>';
                                            }
                                            if($tot_page > $page_a)
                                            echo '<li class="page-item"><a href="admin/users-index.php?page_a='.($page_a + 1).'#cynDiv3" class="page-link">Next</a></li>';
                                            echo '</ul>';
                                        }
                                        
                                    ?>
                                    
                                </nav>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>

                <!-- card 4 -->
                <div class="card">
                    <div class="card-header">
                        <button class="btn btn-block btn-link text-left" data-bs-toggle="collapse" data-bs-target="#cynDiv4">+ User Cart</button>
                    </div>
                    <div id="cynDiv4" class="collapse" data-bs-parent="#accor">
                        <div class="card card-body">
                        <div class="row">
                                <div class="col-md-10">
                                    <h1 class="admin-heading">Users Shopping</h1>
                                </div>
                                <div class="col-md-2">
                                </div>
                                <div class="col-md-12">
                                <table class="content-table">
                                    <thead>
                                        <th>S.No.</th>
                                        <th>Full Name</th>
                                        <th>Email</th>
                                        <th>Contact</th>
                                        <th>Product List</th>
                                        <th>Address</th>
                                        <th>City</th>
                                        <th>Country</th>
                                        <th>Pincode</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <th>Delete</th>
                                    </thead>
                                    <tbody>
                                        <?php

                                            $limit = 4;
                                            if(isset($_GET['page_a'])){
                                                $page_a = $_GET['page_a'];
                                            }else{
                                                $page_a = 1;
                                            }
                                            $offset = ($page_a - 1) * $limit;
                                            $sql1 = "select * from bill order by id desc limit $offset, $limit";
                                            $result1 = mysqli_query($conn, $sql1) or die("query failed");
                                            if(mysqli_num_rows($result1) > 0){
                                                $serial = $offset + 1;
                                                while($row = mysqli_fetch_assoc($result1)){
                                        ?>
                                        <tr>
                                            <td class='id'><?php echo $serial; ?></td>
                                            <td><?php echo $row['fname'] . " " . $row['lname']; ?></td>
                                            <td><?php echo $row['email']; ?></td>
                                            <td><?php echo $row['contact']; ?></td>
                                            <td><?php echo $row['prod_list']; ?></td>
                                            <td><?php echo $row['add1'] . " " . $row['add2']; ?></td>
                                            <td><?php echo $row['city']; ?></td>
                                            <td><?php echo $row['country']; ?></td>
                                            <td><?php echo $row['pincode']; ?></td>
                                            <td><?php echo $row['quantity']; ?></td>
                                            <td><?php echo $row['price']; ?></td>
                                            <td class='delete'><a href='admin/bill/bill-delete.php?id=<?php echo $row['id']; ?>'><img class="ed-tr-logo" src="logo/trash.png" alt=""></a></td>
                                        </tr>
                                        <?php $serial++; }} ?>
                                    </tbody>
                                </table>
                                <nav class="">

                                    <?php

                                        $sql_p1 = "select * from bill";
                                        $result_p1 = mysqli_query($conn, $sql_p1) or die("query failed page 1");
                                        if(mysqli_num_rows($result_p1) > 0){
                                            $tot_rec = mysqli_num_rows($result_p1);
                                            $tot_page = ceil($tot_rec / $limit);

                                            echo '<ul class="pagination justify-content-center py-5">';
                                            if($page_a > 1){
                                                echo '<li class="page-item"><a href="admin/users-index.php?page_a='.($page_a - 1).'#cynDiv4" class="page-link">Prev</a></li>';
                                            }   
                                            
                                            for($i=1; $i<=$tot_page; $i++){
                                                if($i == $page_a){
                                                    $active = "active";
                                                }else{
                                                    $active = "";
                                                }
                                                echo '<li class="page-item '.$active.'"><a href="admin/users-index.php?page_a='.$i.'#cynDiv4" class="page-link">'.$i.'</a></li>';
                                            }
                                            if($tot_page > $page_a)
                                            echo '<li class="page-item"><a href="admin/users-index.php?page_a='.($page_a + 1).'#cynDiv4" class="page-link">Next</a></li>';
                                            echo '</ul>';
                                        }
                                        
                                    ?>
                                    
                                </nav>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>

            </div>
              </div>
              <div class="col-md-12">
                  
              </div>
          </div>
      </div>
  </div>

<?php include "admin-footer.php"; ?>