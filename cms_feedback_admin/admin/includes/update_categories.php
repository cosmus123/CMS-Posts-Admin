


<form action="" method="POST">
   <div class="form-group">
   <label for="cat_title">Edit Category</label>

   <?php
       if (isset($_GET['edit'])){

         $cat_id = $_GET['edit'];    

         $query = "SELECT * FROM categories WHERE cat_id={$cat_id} ";
         $select_categories_id = mysqli_query($connection,$query);

         while($row = mysqli_fetch_assoc($select_categories_id)){
           $cat_id = $row['cat_id'];
           $cat_title = $row['cat_title'];      
          
         ?>

           <input type="text" value="<?php if(isset($cat_title)) {echo $cat_title;} ?>" class="form-control" name="cat_title">          

      <?php } }    ?>  
  
  
      <?php  //Update Query    
           if(isset($_POST['update_categories'])){
               $connection = mysqli_connect('localhost','root','','cms');
                if($connection) {
                    echo "We are connected with database";
                }else {
                    echo "We are  NOT connected";
                }
               $the_cat_title = $_POST['cat_title'];

               $query1 = "UPDATE categories SET cat_title = '{$the_cat_title}' WHERE cat_id = {$cat_id} ";
               $update_query = mysqli_query($connection,$query1);
               
               if(!$update_query){
                   die("QUERY FAILED Cat").mysqli_error($connection);
               }


           }      
       ?>          
   </div>
   <div class="form-groupe">
       <button type="submit" class="btn btn-primary" name="update_categories">Update Category</button>

   </div>

</form>