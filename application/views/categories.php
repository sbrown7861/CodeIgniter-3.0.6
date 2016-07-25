

<?php

ob_start();

$connection = mysqli_connect('localhost', 'root', 'root','cms');

include "admin_header.php" ?>

    <div id="wrapper">


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

                <div class="col-xs-6"></div>

                <?php






                if (isset($_POST['submit'])) {

                $cat_title = $_POST['cat_title'];


                if ($cat_title == '' || empty($cat_title)) {

                echo "This field should not be empty.";

                } else {


                $query = "INSERT INTO categories(cat_title) ";
                $query .= "VALUE('{$cat_title}')";

                $create_category_query = mysqli_query($connection, $query);


                if (!$create_category_query) {

                die("The query has failed" . mysqli_error($connection));

                }
                }





                } ?>




                <form action="" method="post">
                    <div class="form-group">
                        <label for="cat_title">Add Category</label>
                        <input type="text" class="form-control" name="cat_title">
                    </div>

                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                    </div>

                </form>


                <?php  // Update and Include Query


                if(isset($_GET['edit'])){


                    $cat_id = $_GET['edit'];

                    redirect('admin/AdminUpdateCategories').'?edit='.$cat_id;

                }



                ?>




                <!--Add category form section-->

                <div class="col-xs-6">


                    <table class="table table-bordered table-hover">

                        <thead>

                        <tr>
                            <th>ID</th>
                            <th>Category Title</th>
                        </tr>
                        </thead>
                        <tbody>



                        <?php // Find all categories query.








                            $query = "SELECT * FROM categories";
                            $select_categories = mysqli_query($connection,$query);


                            while($row = mysqli_fetch_assoc($select_categories)) {

                                $cat_title = $row['cat_title'];
                                $cat_id = $row['cat_id'];

                                echo "<tr>";
                                echo "<td>{$cat_id}</td>";
                                echo "<td>{$cat_title}</td>";
                                echo "<td><a href='http://localhost:8888/Brown_Skyler_ASSL/CodeIgniter-3.0.6/index.php/admin/AdminUpdateCategories/categories?delete={$cat_id}'>Delete</a></td>";
                                echo "<td><a href='categories?edit={$cat_id}'>Edit</a></td>";
                                echo "</tr>";






                        }




                        // Delete categories function housed in the functions page.





                            if(isset($_GET['delete'])){


                                $the_cat_id = $_GET['delete'];


                                $query = "DELETE FROM categories WHERE cat_id = {$the_cat_id} ";
                                $delete_query = mysqli_query($connection , $query);

                                // Header refreshes the page after the delete id has been sent to the url.

                                redirect('admin/categories');




                        }

                        ?>

                        <tr>


                        </tr>

                        </tbody>

                    </table>
                </div>


            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->



<?php include "admin_footer.php" ?>