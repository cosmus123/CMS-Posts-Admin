<!-- Blog Sidebar Widgets Column -->
<div class="col-md-4">
    <?php
    if(isset($_POST['submit'])){
        echo $search = $_POST['search'];

    }
        
    ?>

<!-- Login -->
<div class="login">
    <h4>Login</h4>
    <!--Login form -->
    <form action="includes/login.php" method="POST"> 
        <div class="form-group">
            <input name="username" type="text" class="form-control" placeholder="Enter Username">   
        </div>
        <div class="input-group">
            <input name="password" type="password" class="form-control" placeholder="Enter Password">   
            <span class="input-group-btn">
                <button class="btn btn-primary" name="login" type="submit">Login</button>          
            </span>
        
        
        </div>

        <br>
    </form><!---Search Form-->
    <!-- /.input-group -->
</div>
            <!-- Blog Categories Well -->
            <div class="well">

                <?php
                    $query = "SELECT * FROM categories";
                    $select_all_categories_query = mysqli_query($connection,$query);
                ?>

                <h4>Blog Categories</h4>
                <div class="row">
                    <div class="col-lg-6">
                        <ul class="list-unstyled">
                            <?php
                                while($row = mysqli_fetch_array($select_all_categories_query)){
                                    $cat_title = $row['cat_title'];
                                    $cat_id = $row['cat_id'];
                                    echo "<li><a href='category.php?category=$cat_id'>{$cat_title}</a></li>";
                                }
                            ?>
                        </ul>
                    </div>                  
                </div>
                <!-- /.row -->
            </div>

</div>
