<?php include('../admin-header.php');
include "../config.php";
?>

<!-- =============== -->
<!-- ALL SLIDERS -->
<!-- =============== -->

<div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-10">
                  <h1 class="admin-heading">All Sliders</h1>
              </div>
              <div class="col-md-2">
                  <a class="add-new" href="admin/home/form-slider.php">add slider</a>
              </div>
              <div class="col-md-12">
                  <table class="content-table">
                      <thead>
                          <th>S.No.</th>
                          <th>Title</th>
                          <th>Description</th>
                          <th>Button</th>
                          <th>link</th>
                          <th>Date</th>
                          <th>Author</th>
                          <th>Edit</th>
                          <th>Delete</th>
                      </thead>
                      <tbody>
                        <?php



                            $limit = 3;
                            if(isset($_GET['page_s'])){
                                $page_s = $_GET['page_s'];
                            }else{
                                $page_s = 1;
                            }
                            $offset = ($page_s - 1) * $limit;
                            $sql1 = "select * from slider order by id desc limit $offset, $limit";
                            $result1 = mysqli_query($conn, $sql1) or die("query 1 failed");
                            if(mysqli_num_rows($result1) > 0){
                                $serial = $offset + 1;
                                while($row = mysqli_fetch_assoc($result1)){

                        ?>
                          <tr>
                              <td class='id'><?php echo $serial; ?></td>
                              <td><?php echo $row['title']; ?></td>
                              <td><?php echo $row['description']; ?></td>
                              <td><?php echo $row['btn_name']; ?></td>
                              <td><?php echo $row['btn_link']; ?></td>
                              <td><?php echo $row['date']; ?></td>
                              <td><?php echo $row['author']; ?></td>
                              <td class='edit'><a href='admin/home/form-update-slider.php?id=<?php echo $row['id']; ?>'><img class="ed-tr-logo" src="logo/edit.png" alt=""></a></td>
                              <td class='delete'><a href='admin/home/delete-slider.php?id=<?php echo $row['id']; ?>'><img class="ed-tr-logo" src="logo/trash.png" alt=""></a></td>
                          </tr>
                          <?php $serial++; }} ?>
                      </tbody>
                  </table>
                <nav class="">

                    <?php

                        $sql_p1 = "select * from slider";
                        $result_p1 = mysqli_query($conn, $sql_p1) or die("query failed page 1");
                        if(mysqli_num_rows($result_p1) > 0){
                            $tot_rec = mysqli_num_rows($result_p1);
                            $tot_page = ceil($tot_rec / $limit);

                            echo '<ul class="pagination justify-content-center py-5">';
                            if($page_s > 1){
                                echo '<li class="page-item"><a href="admin/home/index-slider.php?page_s='.($page_s - 1).'" class="page-link">Prev</a></li>';
                            }   
                            
                            for($i=1; $i<=$tot_page; $i++){
                                if($i == $page_s){
                                    $active = "active";
                                }else{
                                    $active = "";
                                }
                                echo '<li class="page-item '.$active.'"><a href="admin/home/index-slider.php?page_s='.$i.'" class="page-link">'.$i.'</a></li>';
                            }
                            if($tot_page > $page_s)
                            echo '<li class="page-item"><a href="admin/home/index-slider.php?page_s='.($page_s + 1).'" class="page-link">Next</a></li>';
                            echo '</ul>';
                        }
                        
                    ?>
                    
                </nav>
              </div>
          </div>
      </div>
  </div>

  <!-- =============== -->
<!-- ALL SLIDERS END -->
<!-- =============== -->


<!-- =============== -->
<!-- ALL MARVEL UNL COMIC -->
<!-- =============== -->

<div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">All Unlimited Comic</h1>
              </div>
              <div class="col-md-12">
                  <table class="content-table">
                      <thead>
                          <th>S.No.</th>
                          <th>Title</th>
                          <th>Description</th>
                          <th>Button</th>
                          <th>link</th>
                          <th>Date</th>
                          <th>Author</th>
                          <th>Edit</th>
                      </thead>
                      <tbody>
                        <?php

                            $sql2 = "select * from unlimited_comic";
                            $result2 = mysqli_query($conn, $sql2) or die("query failed 2");
                            while($row2 = mysqli_fetch_assoc($result2)){

                        ?>
                          <tr>
                              <td class='id'><?php echo $row2['id']; ?></td>
                              <td><?php echo $row2['title']; ?></td>
                              <td><?php echo $row2['description']; ?></td>
                              <td><?php echo $row2['btn_name']; ?></td>
                              <td><?php echo $row2['btn_link']; ?></td>
                              <td><?php echo $row2['date']; ?></td>
                              <td><?php echo $row2['author']; ?></td>
                              <td class='edit'><a href='admin/home/form-update-unlimited.php'><img class="ed-tr-logo" src="logo/edit.png" alt=""></a></td>
                          </tr>
                          <?php } ?>
                      </tbody>
                  </table>
              </div>
          </div>
      </div>
  </div>


<!-- =============== -->
<!-- ALL MARVEL UNL COMIC END -->
<!-- =============== -->

<?php include('../admin-footer.php'); ?>