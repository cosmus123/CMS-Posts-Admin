<?php 

if(isset($_GET['p_id'])){
    
    $the_p_id =  $_GET['p_id'];

    }

   $query = "SELECT * FROM users WHERE user_id = '$the_p_id' ";
   $select_users_by_id = mysqli_query($connection,$query);

   while($row = mysqli_fetch_assoc($select_users_by_id)){
        $user_edit_username = $row['user_username'];
        $user_edit_password = $row['user_password'];
        $user_edit_firstname = $row['user_firstname'];
        $user_edit_lastname = $row['user_lastname'];
        $user_edit_email = $row['user_email'];
        $user_edit_image = $row['user_image']; 
        $user_edit_role = $row['user_role'];   

   }


if(isset($_POST['edit_user'])){

        $user_username = $_POST['user_username'];
        $user_password = $_POST['user_password'];
        $user_firstname = $_POST['user_firstname'];
        $user_lastname = $_POST['user_lastname'];
        $user_email = $_POST['user_email'];
        $user_image = $_POST['user_image']; 
        $user_role = $_POST['user_role'];   


        $query = "UPDATE users SET user_username = '{$user_username}',user_password = '{$user_password}',user_firstname = '{$user_firstname}',user_lastname = '{$user_lastname}',user_email = '{$user_email}',user_image = '{$user_image}' WHERE user_id = $the_p_id ";

        $update_user_query = mysqli_query($connection,$query);

        if(!$update_user_query ){
            die("QUERY FAILED" . mysqli_error($connection));
        }

        echo "<h5><mark>'User Updated'</mark></h5>";

        }

?>

<form action="" method="POST" enctype="multipart/form-data">

        <div class="form-group">
            <label for="title">Username</label>
            <input type="text" value="<?php echo $user_edit_username; ?>" class="form-control" name="user_username">
        </div>
        <div class="form-group">
            <label for="title">Password</label>
            <input type="password" value="<?php echo $user_edit_password; ?>" class="form-control" name="user_password">
        </div>

            <div class="form-group">
                
                <select>
                    <option value="Subscriber"><?php echo $user_edit_role; ?></option>
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
            <input type="text" value="<?php echo $user_edit_firstname; ?>" class="form-control" name="user_firstname">
        </div>

        <div class="form-group">
            <label for="">User Lastname</label>
            <input type="text" value="<?php echo $user_edit_lastname; ?>"  class="form-control" name="user_lastname">
        </div>

        <div class="form-group">
            <label for="">User Email</label>
            <input type="email" value="<?php echo $user_edit_email; ?>" class="form-control" name="user_email">
        </div>

        <div class="form-group">
            <label for="">User Image</label>
            <input type="text" value="<?php echo $user_edit_firstname; ?>" class="form-control" name="user_image">
        </div>

        <div class="form-group">
            <label for="">User Role</label>
            <input type="text" value="<?php echo $user_edit_role; ?>" class="form-control" name="user_role">
        </div>

        <div class="form-group">
            <input type="submit" class="btn btn-primary" type="submit" name="edit_user" value="Edit User">

        </div>

</form>

