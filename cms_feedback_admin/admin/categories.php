<?php include "includes/admin_header.php" ?>;

    <div id="wrapper">
        <!-- Navigation -->
        <?php include "includes/admin_navigation.php" ?>;

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to Category Page !
                            <small>CM</small>
                        </h1>
                        <div class="col-xs-6">
                            <?php
                                if(isset($_POST['submit'])){
                                    $cat_title = $_POST['cat_title'];
                                    if($cat_title == "" || empty($cat_title)){
                                        echo "This field should not be empty";
                                    }else {
                                        $query = "INSERT INTO categories(cat_title) VALUE('{$cat_title}') ";
                                        
                                        $create_category_query = mysqli_query($connection, $query);

                                    if(!$create_category_query){
                                        die('QUERY FAILED' . mysqli_error($connection));
                                    }
                                        }
                                    
                                    }
                            ?>

                            <!-- Form Add Category -->
                            <form action="" method="POST">
                                <div class="form-group">
                                
                                <label for="cat-title">Add Category</label>
                                    <input type="text" class="form-control" name="cat_title">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary" name="submit">Add Category</button>
                                </div>
                            </form>

                            <?php 

                            if(isset($_GET['edit'])){
                                $cat_id = $_GET['edit'];

                                include "includes/update_categories.php";   
                            }                   

                            ?>                            
                        </div>
                                   
                        <!-- Add Category Form -->
                        <div class="col-xs-6">
                            <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr class="active">
                                        <th>Id</th>
                                        <th>Category Title</th>
                                        <th>Delete Row</th>
                                        <th>Edit Row</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php //Find all categories query
                                 $query = "SELECT * FROM categories";
                                 $select_categories = mysqli_query($connection,$query);

                                while($row = mysqli_fetch_assoc($select_categories)){
                                    $cat_id = $row['cat_id'];
                                    $cat_title = $row['cat_title'];
                                    echo "<tr>";
                                    echo "<td>{$cat_id}</td>";
                                    echo "<td>{$cat_title}</td>";
                                    echo "<td><a href='categories.php?delete={$cat_id}'><button class='btn btn-danger'>Delete</button></a></td>";
                                    echo "<td><a href='categories.php?edit={$cat_id}'><button class='btn btn-warning'>Edit</button></a></td>";
                                    echo "</tr>";

                                 } 
                                ?>

                                 <?php  //Delete Query
                                 
                                 if(isset($_GET['delete'])){
                                    global $connection;
                                    $the_cat_id = $_GET['delete'];

                                    $query = "DELETE  FROM categories WHERE cat_id={$the_cat_id} ";
                                    $delete_query = mysqli_query($connection,$query);
                                        
                                        if(!$delete_query){
                                            die("Query FAILED!".mysqli_error($connection));
                                        }
                                    header("Location: categories.php");
                                 }

                                ?>  
                                
                                </tbody>
                            </table>
                            </div>        
                        </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->



    <?php include "includes/admin_footer.php" ?>;

 