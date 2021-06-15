
<?php
  if(isset($_GET['p_id'])){
    
    $the_p_id =  $_GET['p_id'];

    }
   $query = "SELECT * FROM posts WHERE post_id = '$the_p_id' ";
   $select_posts_by_id = mysqli_query($connection,$query);

   while($row = mysqli_fetch_assoc($select_posts_by_id)){
            $post_edit_id = $row['post_id'];
            $post_edit_author = $row['post_author'];
            $post_edit_title = $row['post_title'];
            $post_edit_category = $row['post_category_id'];
            $post_edit_status = $row['post_status'];   
            $post_edit_image = $row['post_image'];
            $post_edit_tags = $row['post_tags'];
            $post_edit_comment_count = $row['post_comment_count'];
            $post_edit_date = $row['post_date'];
            $post_edit_content = $row['post_content'];
   }

   if(isset($_POST['update_edit_post'])){
       
       $post_update_category = $_POST['post_categories_select'];

       $post_update_title = $_POST['post_title'];
       $post_update_author = $_POST['post_author'];

       $post_update_date = date('d-m-y');

       $post_update_content = $_POST['post_content'];
       $post_update_tags = $_POST['post_tags'];
       $post_update_comment = $_POST['post_comment_count'];
       $post_update_status = $_POST['post_status'];     

        $query = "UPDATE posts SET post_title = '{$post_update_title}',post_category_id = '{$post_update_category}',post_date = now(),post_author = '{$post_update_author}',post_status = '{$post_update_status}',post_tags = '{$post_update_tags}',post_comment_count = '{$post_update_comment}',post_content = '{$post_update_content}' WHERE post_id = $the_p_id ";

        $update_posts = mysqli_query($connection,$query);

        if(!$update_posts){
            die("QUERY FAILED" . mysqli_error($connection));
        }

        echo "<h5><mark>Post Updated</mark></h5>";
  }

?>

<form action="" method="POST" enctype="multipart/form-data">

        <div class="form-group">
            <label for="post_id">Post Id</label>
            <input type="text" value="<?php echo $post_edit_id; ?>" class="form-control" name="post_id">
        </div>

        <div class="form-group">
            <label for="post_title">Post Title</label>
            <input type="text" value="<?php echo $post_edit_title; ?>" class="form-control" name="post_title">
        </div>

        <div class="form-group">
            <select name="post_categories_select">
                <?php 
                    $query = "SELECT * FROM categories ";
                    $select_categories = mysqli_query($connection,$query);
        
                    while($row = mysqli_fetch_assoc($select_categories)){
                            $cat_id = $row['cat_id'];
                            $cat_title = $row['cat_title']; 

                            echo "<option value='$cat_id'>{$cat_title}</option>";
                    }
                
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="post_author">Post Author</label>
            <input type="text" value="<?php echo $post_edit_author; ?>" class="form-control" name="post_author">
        </div>

        <div class="form-group">
            <label for="post_status">Post Status</label>
            <input type="text" value="<?php echo $post_edit_status; ?>" class="form-control" name="post_status">
        </div>

        <div class="form-group">
            <label for="post_category">Post Category</label>
            <input type="text" value="<?php echo $post_edit_category; ?>" class="form-control" name="post_category">
        </div>

        <div class="form-group">
            <img width="100" src="../images/<?php echo $post_edit_image;?>" alt="">
        </div>

        <div class="form-group">
            <label for="post_tags">Post Tags</label>
            <input type="text" value="<?php echo $post_edit_tags; ?>" class="form-control" name="post_tags">
        </div>

        <div class="form-group">
            <label for="post_date">Post Date </label>
            <input type="text" value="<?php echo $post_edit_date; ?>" class="form-control" name="post_date">
        </div>

        <div class="form-group">
            <label for="post_comment_count">Post Comment Count</label>
            <input type="text" value="<?php echo $post_edit_comment_count; ?>" class="form-control" name="post_comment_count">
        </div>

        <div class="form-group">
            <label for="post_content">Post Content</label>
            <textarea name="post_content" class="form-control" id="" cols="30" rows="10"><?php echo $post_edit_content; ?>
            </textarea>
        </div>

        <div class="form-group">
            <input type="submit" class="btn btn-primary" type="submit" name="update_edit_post" value="Update Post">

        </div>

</form>