<?php include "../admin-header.php"; 
include "../config.php"; 
?>





<!-- =============== -->
<!-- ALL TRAILERS -->
<!-- =============== -->



<div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-10">
                  <h1 class="admin-heading">All News</h1>
              </div>
              <div class="col-md-2">
                  <a class="add-new" href="admin/news/form-news.php">add news</a>
              </div>
              <div class="col-md-12">
                  <table class="content-table">
                      <thead>
                          <th>S.No.</th>
                          <th>Title</th>
                          <th>Description</th>
                          <th>Category</th>
                          <th>Date</th>
                          <th>Author</th>
                          <th>Edit</th>
                          <th>Delete</th>
                      </thead>
                      <tbody>
                        <?php
                            $limit = 5;
                            if(isset($_GET['page_s'])){
                                $page_s = $_GET['page_s'];
                            }else{
                                $page_s = 1;
                            }
                            $offset = ($page_s - 1) * $limit;
                            $sql = "select * from news
                            left join category on news.category = category.category_id
                            order by id desc limit $offset, $limit";
                            $result = mysqli_query($conn, $sql) or die("query failed");
                            $serial = $offset + 1;
                            while($row = mysqli_fetch_assoc($result)){
                        ?>
                          <tr>
                              <td class='id'><?php echo $serial; ?></td>
                              <td><?php echo $row['title']; ?></td>
                              <td><?php echo $row['description']; ?></td>
                              <td><?php echo $row['category_name']; ?></td>
                              <td><?php echo $row['date']; ?></td>
                              <td><?php echo $row['author']; ?></td>
                              <td class='edit'><a href='admin/news/form-update-news.php?id=<?php echo $row['id']; ?>'><img class="ed-tr-logo" src="logo/edit.png" alt=""></a></td>
                              <td class='delete'><a href='admin/news/delete-news.php?id=<?php echo $row['id']; ?>&cat=<?php echo $row['category']; ?>'><img class="ed-tr-logo" src="logo/trash.png" alt=""></a></td>
                          </tr>
                          <?php $serial++; } ?>
                      </tbody>
                  </table>
                <nav class="">
                <?php

                    $sql_p1 = "select * from news";
                    $result_p1 = mysqli_query($conn, $sql_p1) or die("query failed page 1");
                    if(mysqli_num_rows($result_p1) > 0){
                        $tot_rec = mysqli_num_rows($result_p1);
                        $tot_page = ceil($tot_rec / $limit);

                        echo '<ul class="pagination justify-content-center py-5">';
                        if($page_s > 1){
                            echo '<li class="page-item"><a href="admin/news/index-news.php?page_s='.($page_s - 1).'" class="page-link">Prev</a></li>';
                        }   
                        
                        for($i=1; $i<=$tot_page; $i++){
                            if($i == $page_s){
                                $active = "active";
                            }else{
                                $active = "";
                            }
                            echo '<li class="page-item '.$active.'"><a href="admin/news/index-news.php?page_s='.$i.'" class="page-link">'.$i.'</a></li>';
                        }
                        if($tot_page > $page_s)
                        echo '<li class="page-item"><a href="admin/news/index-news.php?page_s='.($page_s + 1).'" class="page-link">Next</a></li>';
                        echo '</ul>';
                    }
                ?>
                </nav>
              </div>
          </div>
      </div>
  </div>




<!-- =============== -->
<!-- ALL TRAILERS END -->
<!-- =============== -->

<?php include "../admin-footer.php"; ?>