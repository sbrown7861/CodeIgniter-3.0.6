<?php

ob_start();

include "admin_header.php" ?>

    <div id="wrapper">


<?php if(!$connection){

    echo "A connection cannot be established.";


} ?>

<?php include "admin_navigation.php" ?>


        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">


                        <h1 class="page-header">
                            Welcome Admin
                            <small>Author:</small>
                        </h1>



        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>Author</th>
                <th>Title</th>
                <th>Category</th>
                <th>Status</th>
                <th>Image</th>
                <th>Tags</th>
                <th>Comments</th>
                <th>Date</th>
            </tr>
            </thead>
            <tbody>


            <?php


            $query = "SELECT * FROM posts";
            $select_posts = mysqli_query($connection, $query);


            while($row = mysqli_fetch_assoc($select_posts)) {

                $post_id = $row['post_id'];
                $post_category_id = $row['post_category_id'];
                $post_title = $row['post_title'];
                $post_author = $row['post_author'];
                $post_date = $row['post_date'];
                $post_image = $row['post_image'];
                $post_content = $row['post_content'];
                $post_tags = $row['post_tags'];
                $post_comment_count = $row['post_comment_count'];
                $post_status = $row['post_status'];

                echo "<tr>";
                echo "<td>{$post_id}</td>";
                echo "<td>{$post_author}</td>";
                echo "<td>{$post_title}</td>";
                echo "<td>{$post_category_id}</td>";
                echo "<td>{$post_status}</td>";
                echo "<td><img width='100' src='../../assets/images/{$post_image}'</td>";
                echo "<td>{$post_tags}</td>";
                echo "<td>{$post_comment_count}</td>";
                echo "<td>{$post_date}</td>";
                echo "<td><a href='?delete={$post_id}'>Delete</a> </td>";
                echo "</tr>";
            }

            ?>

        </table>


        <?php

        if(isset($_GET['delete'])){


            $the_post_id = $_GET['delete'];

            $query = "DELETE FROM posts WHERE post_id = {$the_post_id} ";

            $delete_query = mysqli_query($connection, $query);

            redirect('admin/view_all_posts');


            if(!$delete_query){

                echo "The query has failed " . mysqli_error($connection, $delete_query);

            }

        }

        ?>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->





<?php include "admin_footer.php" ?>
