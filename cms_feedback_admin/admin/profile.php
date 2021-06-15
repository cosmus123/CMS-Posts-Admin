
<?php include "includes/admin_header.php"; ?>

<?php 

    if(isset($_SESSION['username'])){
        $username = $_SESSION['username'];

    $query = "SELECT * FROM users WHERE user_username = '{$username}' ";

    $select_user_profile_query = mysqli_query($connection,$query);

    while($row = mysqli_fetch_array($select_user_profile_query)){
        $users_id = $row['user_id'];
        $username = $row['user_username'];
        $users_password = $row['user_password'];
        $users_firstname = $row['user_firstname'];
        $users_lastname = $row['user_lastname'];
        $users_email = $row['user_email'];
        $users_image = $row['user_image'];
        $users_role = $row['user_role'];

        }
    }

?>

<?php

if(isset($_POST['edit_user'])){

    $user_username = $_POST['user_username'];
    $user_password = $_POST['user_password'];
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_email = $_POST['user_email'];
    $user_image = $_POST['user_image']; 
    $user_role = $_POST['user_role'];   


    $query = "UPDATE users SET user_username = '{$user_username}',user_password = '{$user_password}',user_firstname = '{$user_firstname}',user_lastname = '{$user_lastname}',user_email = '{$user_email}',user_image = '{$user_image}' WHERE user_username = '{$username}' ";

    $update_user_query = mysqli_query($connection,$query);

    if(!$update_user_query ){
        die("QUERY FAILED" . mysqli_error($connection));
        }
    }


?>

<div id="wrapper">


    <!-- Navigation -->
    <?php include "includes/admin_navigation.php"; ?>

        <div id="page-wrapper">

                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="row">
                        <!-- Page Div col-lg-12 -->
                        <div class="col-lg-12">
                            <h1 class="page-header">
                                Welcome to the User's Profile Page !
                                <small>CM</small>   
                            </h1>   
                                            
                                <!-- Add Category Form -->
                                <div class="col-xs-6">
                            
                                    <form action="" method="POST" enctype="multipart/form-data">

                                    <div class="form-group">
                                        <label for="title">Username</label>
                                        <input type="text" value="<?php echo $username; ?>" class="form-control" name="user_username">
                                    </div>
                                    <div class="form-group">
                                        <label for="title">Password</label>
                                        <input type="password" value="<?php echo $users_password; ?>" class="form-control" name="user_password">
                                    </div>

                                        <div class="form-group">
                                            
                                            <select>
                                                <option value="Subscriber"><?php echo $users_role; ?></option>
                                                    <?php
                                                    if($user_edit_role == 'Admin'){
                                                        echo "<option value='Subscriber'>Subscriber</option>";
                                                        }
                                                    else {
                                                        echo "<option value='Admin'>Admin</option>";
                                                        
                                                    }
                                                    ?>
                                            </select>            
                                        </div>

                                    <div class="form-group">
                                        <label for="">User Firstname</label>
                                        <input type="text" value="<?php echo $users_firstname; ?>" class="form-control" name="user_firstname">
                                    </div>

                                    <div class="form-group">
                                        <label for="">User Lastname</label>
                                        <input type="text" value="<?php echo $users_lastname; ?>"  class="form-control" name="user_lastname">
                                    </div>

                                    <div class="form-group">
                                        <label for="">User Email</label>
                                        <input type="email" value="<?php echo $users_email; ?>" class="form-control" name="user_email">
                                    </div>

                                    <div class="form-group">
                                        <label for="">User Image</label>
                                        <input type="text" value="<?php echo $users_firstname; ?>" class="form-control" name="user_image">
                                    </div>

                                    <div class="form-group">
                                        <label for="">User Role</label>
                                        <input type="text" value="<?php echo $users_role; ?>" class="form-control" name="user_role">
                                    </div>

                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary" type="submit" name="edit_user" value="Update Profile">

                                    </div>

                                    </form>

                                </div>
                                <!-- Add Category Form -->
                            </div>
                            <!-- Page Div .col-lg-12 -->
                        </div>
                        <!-- /.row -->

                    </div>
                    <!-- /.container-fluid -->

            </div>
                <!-- /#page-wrapper -->

    <?php include "includes/admin_footer.php";?>


