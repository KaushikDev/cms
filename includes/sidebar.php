<div class="col-md-4">
<?php 
if(isset($_POST['submit'])){
    $search = $_POST['search'];

    $query = "SELECT * FROM posts where post_tags like '%$search%'";
    $fetch_all_search_results = mysqli_query($connection, $query);

    if(!$fetch_all_search_results){
        die("There were errors" . mysqli_error($connection));
    }
  
    $count = mysqli_num_rows($fetch_all_search_results);

    if($count == 0){
echo "The search returned ". $count. " results!!";
    }
    else{
        echo "Now showing ". $count. " results!!";
    }
}

?>
<!-- Blog Search Well -->
<div class="well">
    <h4>Blog Search</h4>
    <form action="search.php" method="post">
    <div class="input-group">
        <input name="search" type="text" class="form-control">
        <span class="input-group-btn">
            <button name="submit" class="btn btn-default" type="submit">
                <span class="glyphicon glyphicon-search"></span>
        </button>
        </span>
    </div>
    </form>
    <!-- /.input-group -->
</div>

<!-- Blog Categories Well -->
<div class="well">
    <h4>Blog Categories</h4>
    <div class="row">
        <div class="col-lg-12">
            <ul class="list-unstyled">
            <?php 
                $query = 'SELECT * FROM categories';
                $fetch_all_categories = mysqli_query($connection, $query);

                while($row = mysqli_fetch_assoc($fetch_all_categories)){
                    $cat_title = $row['cat_title'];
                    echo "<li><a href='#'>$cat_title</a></li>";
                }
                ?>
            </ul>
        </div>
    </div>
    <!-- /.row -->
</div>

<!-- Side Widget Well -->
<?php include 'widget.php' ?>

</div>