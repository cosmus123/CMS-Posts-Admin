
<?php if(isset($_POST['create_user'])){

    $user_username = $_POST['user_username'];
    $user_password = $_POST['user_password'];
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_email = $_POST['user_email'];
    $user_image = $_POST['user_image']; 
    $user_role = $_POST['user_role'];   


$query = "INSERT INTO users(user_username,user_password,user_firstname,user_lastname,user_email,user_image,user_role)";

$query.="VALUES('{$user_username}','{$user_password}','{$user_firstname}','{$user_lastname}','{$user_email}','{$user_image}','{$user_role}')";

$create_user_query = mysqli_query($connection,$query);


function confirm_query($result){
    global $connection;

    if(!$result){
    die("QUERY FAILED".mysqli_error($connection));
} else {
    echo "QUERY AND TABLE HAS BEEN SENT!";
}

confirm_query($create_post_query);
}

echo "User Created"." "."<a href='users.php'>View User</a>";

}

?>

<form action="" method="POST" enctype="multipart/form-data">

    <div class="form-group">
        <label for="title">Username</label>
        <input type="text" class="form-control" name="user_username">
    </div>
    <div class="form-group">
        <label for="title">Password</label>
        <input type="password" class="form-control" name="user_password">
    </div>

        <div class="form-group">
            <select name="user_role" id="">
                    <option value="admin">Admin</option>
                    <option value="subscriber">Subscriber</option>
            </select>            
        </div>

    <div class="form-group">
        <label for="">User Firstname</label>
        <input type="text" class="form-control" name="user_firstname">
    </div>

    <div class="form-group">
        <label for="">User Lastname</label>
        <input type="text" class="form-control" name="user_lastname">
    </div>

    <div class="form-group">
        <label for="">User Email</label>
        <input type="email" class="form-control" name="user_email">
    </div>

    <div class="form-group">
        <label for="">User Image</label>
        <input type="text" class="form-control" name="user_image">
    </div>

    <div class="form-group">
        <label for="">User Role</label>
        <input type="text" class="form-control" name="user_role">
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-primary" type="submit" name="create_user" value="Add User">
    
    </div>

</form>

