
  <div class="table-responsive">
  <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr class="active">
                                                <th>Id</th>
                                                <th>Category</th>
                                                <th>Title</th>
                                                <th>Author</th>
                                                <th>Date</th>
                                                <th>Image</th>
                                                <th>Content</th>
                                                <th>Tags</th>
                                                <th>Comment</th>
                                                <th>Status</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                      
                                        <?php
                                                $query = "SELECT * FROM posts ORDER BY post_id ";
                                                $select_posts = mysqli_query($connection,$query);

                                                while($row = mysqli_fetch_assoc($select_posts)){
                                                $post_id = $row['post_id'];
                                                $post_category = $row['post_category_id'];
                                                $post_title = $row['post_title'];
                                                $post_author = $row['post_author'];
                                                $post_date = $row['post_date'];
                                                $post_image = $row['post_image'];
                                                $post_content = $row['post_content'];
                                                $post_tags = $row['post_tags'];
                                                $post_comment = $row['post_comment_count'];
                                                $post_status = $row['post_status'];

                                                echo "<tr>";
                                                echo "<td>$post_id</td>";

                                                  
                                                $query = "SELECT * FROM categories WHERE cat_id = {$post_category} ";
                                                $select_categories_id = mysqli_query($connection,$query);
                                       
                                                while($row = mysqli_fetch_assoc($select_categories_id)){
                                                  $cat_id = $row['cat_id'];
                                                  $cat_title = $row['cat_title'];  
                                                  echo "<td>{$cat_title}</td>";
                                                }
                                                

                                                $query = "SELECT * FROM posts ";
                                                $select_comment_posts_id = mysqli_query($connection,$query);
                                                while($row = mysqli_fetch_assoc($select_comment_posts_id)){
                                                 $post_comment_count = $row['post_comment_count'];
                                                }
                                               
                                                echo "<td>$post_title</td>"; 
                                                echo "<td>$post_author</td>";
                                                echo "<td>$post_date</td>";
                                                echo "<td><img height='50' src='../images/$post_image'></td>";
                                                echo "<td>$post_content</td>";
                                                echo "<td>$post_tags</td>";
                                                echo "<td>$post_comment</td>";
                                                echo "<td>$post_status</td>";
                                                echo "<td><a href='posts.php?source=edit_posts&p_id={$post_id}'><button class='btn btn-warning'>Edit</button></a></td>";
                                                echo "<td><a href='posts.php?delete={$post_id}'><button class='btn btn-danger'>Delete</button></a></td>";
                                                echo "</tr>";
                                            }
                                                
                                            ?>
                                                
                                        <?php

                                                if(isset($_GET['delete'])){

                                                    $the_post_delete_id = $_GET['delete'];

                                                $query = "DELETE FROM posts WHERE post_id = {$the_post_delete_id}";
                                                $delete_query = mysqli_query($connection,$query);

                                                header("Location: posts.php");

                                                }

                                        ?>
                    </tbody>
</table>
</div>
                                                 
                            