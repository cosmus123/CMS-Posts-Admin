
  <div class="table-responsive">
  <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr class="active">
                                                <th>Id</th>
                                                <th>Author</th>
                                                <th>Comments</th>
                                                <th>Email</th>
                                                <th>Status</th>
                                                <th>Response</th>
                                                <th>Date</th>
                                                <th>Approved</th>
                                                <th>Unnapproved</th>
                                                <th>Delete</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                      
                                                <?php
                                                $query = "SELECT * FROM comments";
                                                $select_comments = mysqli_query($connection,$query);

                                                while($row = mysqli_fetch_assoc($select_comments)){

                                                $comment_id = $row['comment_id'];
                                                $comment_post_id = $row['comment_post_id'];
                                                $comment_author = $row['comment_author'];
                                                $comment_content = $row['comment_content'];
                                                $comment_email = $row['comment_email'];
                                                $comment_status = $row['comment_status'];
                                                $comment_date = $row['comment_date'];
    

                                                echo "<tr>";
                                                echo "<td>$comment_id</td>";
                                                echo "<td>$comment_author</td>";
                                                echo "<td>$comment_content</td>";


                                                echo "<td>$comment_email</td>";
                                                echo "<td>$comment_status</td>";

                                                $query = "SELECT * FROM posts WHERE post_id=$comment_post_id ";
                                                $select_post_id_query = mysqli_query($connection,$query);
                                                while($row = mysqli_fetch_assoc($select_post_id_query )){
                                                        $post_id = $row['post_id'];
                                                        $post_title = $row['post_title'];
                                                        
                                                        echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";

                                                }           

               
                                                echo "<td>$comment_date</td>";
                                                echo "<td><a href='comments.php?approve=$comment_id'><button class='btn btn-primary'>Approved</button></a></td>";
                                                echo "<td><a href='comments.php?unnaprove=$comment_id'><button class='btn btn-default'>Unnaproved</button></a></td>";
                                                echo "<td><a href='comments.php?delete=$comment_id '><button class='btn btn-danger'>Delete</button></a></td>";
                     
                     
                                                }
                                                ?>
                                 
                                                
                                                <?php

                                                if(isset($_GET['approve'])){

                                                    $the_comment_approve_id = $_GET['approve'];

                                                    $query = "UPDATE comments SET comment_status = 'Approved' WHERE comment_id = $the_comment_approve_id ";
                                                    $approve_query = mysqli_query($connection,$query);

                                                header("Location: comments.php");

                                                }

                                                 if(isset($_GET['unnaprove'])){

                                                    $the_comment_unnaprove_id = $_GET['unnaprove'];

                                                    $query = "UPDATE comments SET comment_status = 'Unnaproved' WHERE comment_id = $the_comment_unnaprove_id ";
                                                    $unnaprove_query = mysqli_query($connection,$query);

                                                header("Location: comments.php");

                                                }
                                                
                                                if(isset($_GET['delete'])){

                                                    $the_comment_delete_id = $_GET['delete'];

                                                $query = "DELETE FROM comments WHERE comment_id = {$the_comment_delete_id}";
                                                      $delete_query = mysqli_query($connection,$query);

                                                header("Location: comments.php");

                                                }

                                                ?>
                    </tbody>
        </table>
</div>
                                                 
                            