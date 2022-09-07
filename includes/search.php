<?php 
include './db.php';
include './header.php';
?>

    <!-- Navigation -->
 <?php include './navigation.php'; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <?php 
                $query = 'SELECT * from posts';
                $fetch_all_posts = mysqli_query($connection, $query);

                while($row = mysqli_fetch_assoc($fetch_all_posts)){
                    $postTitle = $row['post_title'];
                    $postAuthor = $row['post_author'];
                    $postContent = $row['post_content'];
                    $postDate = $row['post_date'];
                    $postImage = $row['post_image'];
                    
                ?>
                        <h2>
                            <a href="#"><?php echo $postTitle; ?></a>
                        </h2>
                        <p class="lead">
                            by <a href="index.php"><?php echo $postAuthor; ?></a>
                        </p>
                        <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $postDate; ?></p>
                        <hr>
                        <img class="img-responsive" src="<?php echo $postImage; ?>" alt="">
                        <hr>
                        <p><?php echo $postContent; ?></p>
                        <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                        <hr>


                <?php } ?>

            </div>

            <!-- Blog Sidebar Widgets Column -->

         <?php include 'includes/sidebar.php'; ?>

        </div>
        <!-- /.row -->

        <hr>
<!-- Footer -->
        <?php include "includes/footer.php" ?>