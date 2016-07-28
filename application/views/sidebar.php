
<div class="col-md-4">



    <!-- Blog Search Form -->
    <div class="well">
        <h4>Blog Search</h4>

        <form action="<?php base_url('home.php') ?>" method="post">

            <div class="input-group">
                <input name="search" type="text" class="form-control">
                        <span class="input-group-btn">
                            <button name="submit" class="btn btn-default" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                        </span>
            </div>
        </form> <!--End of search form-->
    </div>



    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-md-8">

                <?php

                if (isset($_POST['submit'])) {

                    $search = $_POST['search'];


                    $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%' ";

                    $search_query = mysqli_query($connection, $query);


                    if(!$search_query){

                        die('Query has failed' . mysqli_error($connection));

                    }

                    $count = mysqli_num_rows($search_query);

                    if($count == 0){

                        echo "<h1>No Results Found</h1>";

                    }else{

                        while($row = mysqli_fetch_assoc($search_query)){

                            $post_title =  $row['post_title'];
                            $post_author =  $row['post_author'];
                            $post_date =  $row['post_date'];
                            $post_image =  $row['post_image'];
                            $post_content =  $row['post_content'];

                            ?>

                            <h1 class="page-header">
                                Page Heading
                                <small>Secondary Text</small>
                            </h1>

                            <!-- First Blog Post -->
                            <h2>
                                <a href="#"><?php echo $post_title; ?></a>
                            </h2>
                            <p class="lead">
                                by <a href="index.php"><?php echo $post_author; ?></a>
                            </p>
                            <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date; ?></p>
                            <hr>
                            <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
                            <hr>
                            <p><?php echo $post_content; ?></p>
                            <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                            <hr>

                        <?php }
                    }
                }

                ?>

    <!-- Blog Categories Well -->
    <div class="well">
        <?php

        $query = "SELECT * FROM categories LIMIT 5";
        $select_cat_sidebar = mysqli_query($connection, $query);

        ?>
        <h4>Blog Categories</h4>
        <div class="row">
            <div class="col-lg-12">
                <ul class="list-unstyled">


                    <?php

                    while($row = mysqli_fetch_assoc($select_cat_sidebar)) {

                        $cat_title = $row['cat_title'];


                        echo "<li><a href='#'>{$cat_title}</a></li>";
                    }

                    ?>

                </ul>
            </div>

        </div>

    </div>
                <?php include 'widget.php';?>

</div>