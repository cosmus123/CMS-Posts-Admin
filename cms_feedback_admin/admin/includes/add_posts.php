

            <?php if(isset($_POST['create_post'])){

                $post_category = $_POST['post_categories_select'];

                
                $post_title = $_POST['post_title'];
                $post_author = $_POST['post_author'];

                $post_date = date('d-m-y');

                $post_image = $_FILES['post_image']['name'];
                $post_image_temp = $_FILES['post_image']['tmp_name'];

                $post_content = $_POST['post_content'];
                $post_tags = $_POST['post_tags'];

                $post_status = $_POST['post_status'];                                         

                move_uploaded_file($post_image_temp, "../images/$post_image");

                $query = "INSERT INTO posts(post_category_id,post_title,post_author,post_date,post_image,post_content,post_tags,post_status)";

                $query.="VALUES('{$post_category}','{$post_title }','{$post_author}','$post_date}','{$post_image}','{$post_content}','{$post_tags}','{$post_status}')";

                $create_post_query = mysqli_query($connection,$query);


                function confirm_query($result){
                    global $connection;

                    if(!$result){
                    die("QUERY FAILED".mysqli_error($connection));
                } else {
                    echo "QUERY AND TABLE HAS BEEN SENT!";
                }

                confirm_query($create_post_query);

            }

            echo "<h5><mark>Post Created</mark></h5>";

            }

?>

                <form action="" method="POST" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="title">Post Title</label>
                        <input type="text" class="form-control" name="post_title">
                    </div>

                    <div class="form-group">
                            <select name="post_categories_select" id="">
                                        <?php 
                                        
                                            $query = "SELECT * FROM categories ";
                                            $select_categories = mysqli_query($connection,$query);
                                
                                            while($row = mysqli_fetch_assoc($select_categories)){
                                                $cat_id = $row['cat_id'];
                                                $cat_title = $row['cat_title']; 

                                            echo "<option value='{$cat_id}'>{$cat_title}</option>";
                                            }
                                        
                                        ?>
                            </select>            
                    </div>

                    <div class="form-group">
                        <label for="title">Post Author</label>
                        <input type="text" class="form-control" name="post_author">
                    </div>

                    <div class="form-group">
                        <label for="post_status">Post Status</label>
                        <input type="text" class="form-control" name="post_status">
                    </div>

                    <div class="form-group">
                        <label for="post_image">Post Images</label>
                        <input type="file" class="form-control" name="post_image">
                    </div>

                    <div class="form-group">
                        <label for="post_tags">Post Tags</label>
                        <input type="text" class="form-control" name="post_tags">
                    </div>

                    <div class="form-group">
                        <label for="post_tags">Post Comment Count</label>
                        <input type="text" class="form-control" name="post_comment_count_form">
                    </div>

                    <div class="form-group">
                        <label for="post_content">Post Content</label>
                        <textarea name="post_content" class="form-control" id="" cols="30" rows="10"></textarea>
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" type="submit" name="create_post" value="Add Post">
                    
                    </div>

                </form>

