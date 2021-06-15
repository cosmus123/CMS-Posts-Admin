

<div class="table-responsive">
  <table class="table table-bordered table-hover">
                                    
                                            <thead>
                                                <tr class="active">
                                                    <th>User_Id</th>
                                                    <th>Username</th>
                                                    <th>Password</th>
                                                    <th>Firstname</th>
                                                    <th>Lastname</th>
                                                    <th>Email</th>
                                                    <th>Image</th>
                                                    <th>Role</th>
                                                    <th>Admin</th>
                                                    <th>Subscriber</th>
                                                    <th>Edit</th>
                                                    <th>Delete</th>
                                                </tr>
                                            </thead>
                                    
                                       
                                        <tbody>
                                      
                                    <?php
                                                $query = "SELECT * FROM users";
                                                $select_users = mysqli_query($connection,$query);

                                                while($row = mysqli_fetch_assoc($select_users)){

                                                $users_id = $row['user_id'];
                                                $users_username = $row['user_username'];
                                                $users_password = $row['user_password'];
                                                $users_firstname = $row['user_firstname'];
                                                $users_lastname = $row['user_lastname'];
                                                $users_email = $row['user_email'];
                                                $users_image = $row['user_image'];
                                                $users_role = $row['user_role'];

                                                echo "<tr>";
                                                echo "<td>$users_id</td>";
                                                echo "<td>$users_username</td>";
                                                echo "<td>$users_password</td>";
                                                echo "<td>$users_firstname</td>";
                                                echo "<td>$users_lastname</td>";
                                                echo "<td>$users_email</td>";
                                                echo "<td>$users_image</td>";
                                                echo "<td>$users_role</td>";

                                                echo "<td><a href='users.php?admin=$users_id'><button class='btn btn-success'>Admin</button></a></td>";
                                                echo "<td><a href='users.php?subscriber=$users_id'><button class='btn btn-info'>Subscriber</button></a></td>";
                                                echo "<td><a href='users.php?source=edit_users&p_id={$users_id}'><button class='btn btn-warning'>Edit</button></a></td>";
                                                echo "<td><a href='users.php?delete=$users_id'><button class='btn btn-danger'>Delete</button></a></td>";
                                                echo "</tr>";        
                     
                                                }
                                                ?>
                                 
                                                
                                                <?php

                                                if(isset($_GET['admin'])){

                                                    $the_users_admin_id = $_GET['admin'];

                                                    $query = "UPDATE users SET user_role = 'Admin' WHERE user_id = $the_users_admin_id ";
                                                    $admin_query = mysqli_query($connection,$query);

                                                header("Location: users.php");

                                                }

                                                 if(isset($_GET['subscriber'])){

                                                    $the_users_subscriber_id = $_GET['subscriber'];

                                                    $query = "UPDATE users SET user_role = 'Subscriber' WHERE user_id = $the_users_subscriber_id ";
                                                    $subscriber_query = mysqli_query($connection,$query);

                                                header("Location: users.php");

                                                }
                                                

                                                if(isset($_GET['delete'])){

                                                    $the_post_delete_id = $_GET['delete'];

                                                $query = "DELETE FROM users WHERE user_id = {$the_post_delete_id}";
                                                      $delete_query = mysqli_query($connection,$query);

                                                header("Location: users.php");

                                                }
                                                ?>
                    </tbody>
                   
</table>
</div>  
                                                 
                            