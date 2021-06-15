<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog Post - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/blog-post.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Main Page</a>
            </div>

            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">

                <!-- Blog Post -->
              
<!-- Blog Entries Column -->

                <?php
                    $connection = mysqli_connect('localhost','root','','cms');

                        if(isset($_GET['p_id'])){
                            $the_post_id_get = $_GET['p_id'];
                        }

                    $query = "SELECT * FROM posts WHERE post_id = $the_post_id_get ";
                    $select_all_posts_query = mysqli_query($connection,$query);

                    while($row = mysqli_fetch_array($select_all_posts_query)){
                            $post_title = $row['post_title'];
                            $post_author = $row['post_author'];
                            $post_date = $row['post_date'];
                            $post_image = $row['post_image'];
                            $post_content = $row['post_content'];
                            
                ?>

                <h1 class="page-header">
                    Web Development
                    <small>Done by CM</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php echo $post_title ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span><?php echo $post_date ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image;?>" alt="">
                <hr>
                <p><?php echo $post_content ?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>         

                <?php           
                }
                ?>

</div>
       
    <div class="row">
   
                <!-- Blog Comments -->
                <?php

                if(isset($_POST['create_comment'])) {
                    $the_post_id = $_GET['p_id'];//get the p_id from the url
                    $connection = mysqli_connect('localhost','root','','cms');
                    
                    
                    $comment_author = $_POST['comment_author'];
                    $comment_email = $_POST['comment_email'];
                    $comment_content = $_POST['comment_content'];

                $query = "INSERT INTO comments(comment_post_id,comment_author,comment_email,comment_content,comment_status,comment_date) ";

                $query.= "VALUES ('{$the_post_id}','{$comment_author}','{$comment_email}','{$comment_content}','Unapproved',now())";

                $create_comment_query = mysqli_query($connection,$query);

                    if(!$create_comment_query){
                        die('QUERY FAILED !' . mysqli_error($connection));
                    }

                $query = "UPDATE posts SET post_comment_count = post_comment_count+1 WHERE post_id = $the_post_id ";
                $update_comment_count = mysqli_query($connection,$query);

                if(!$update_comment_count){
                    die("QUERY FAILED ").mysqli_error($connection);
                    }
                }


                ?>  
            <div class="col-md-8">
                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form" method="POST">
                        <div class="form-group">
                        <label for="Author">Your Name</label>
                            <input type="text" class="form-control" name="comment_author">
                        </div>
                        <div class="form-group">
                            <label for="Email">Email</label>
                            <input type="email" class="form-control" name="comment_email">
                        </div>
                        <div class="form-group">
                            <label for="Comment">Your Comment</label>
                            <textarea class="form-control" rows="3" name="comment_content"></textarea>
                        </div>
                        <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
                    </form>
                    <?php
                    if(isset($_POST['create_comment'])){

                    echo "<h5><mark>Post Created</mark></h5>";

                    }

                    ?>
                
                </div>

                <hr>

                <!-- Posted Comments -->

                <?php
                 if(isset($_GET['p_id'])){
                    $the_post_id = $_GET['p_id'];
            
                }
                $connection = mysqli_connect('localhost','root','','cms');
                $query = "SELECT * FROM comments WHERE comment_post_id = $the_post_id ";
                $query .= "AND comment_status = 'Approved' ";
                $query .= "ORDER BY comment_id DESC ";
                $select_comment_query = mysqli_query($connection,$query);
                if(!$select_comment_query){
                    die('QUERY FAILED' . mysqli_error($connection));
                }
                while($row = mysqli_fetch_array($select_comment_query)){
                    $comment_date = $row['comment_date'];
                    $comment_content = $row['comment_content'];
                    $comment_author = $row['comment_author'];
              
                ?>

                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment_author ?>
                            <small><?php echo $comment_date ?></small>
                        </h4>
                        <?php echo $comment_content ?>
                    </div>
                </div>
     
 

        <?php } ?>

        <hr> 

</div>
 <!-- /.row -->

        <hr>

        <!-- Footer -->
        <?php include "includes/footer.php"; ?>

</div>
<!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
