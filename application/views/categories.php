

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


                <form action="" method="post">
                    <div class="form-group">
                        <label for="cat_title">Edit Category</label>

                        <?php



                        if (isset($_GET['edit'])){
                            $cat_id = $_GET['edit'];




                            $query = "SELECT * FROM categories WHERE cat_id = $cat_id ";
                            $select_categories_id = mysqli_query($connection, $query);


                            while($row = mysqli_fetch_assoc($select_categories_id)) {

                                $cat_title = $row['cat_title'];
                                $cat_id = $row['cat_id'];




                                ?>

                               <input value="<?php if(isset($cat_title)){echo $cat_title;}  ?>" type ="text"  class="form-control" name='cat_title'>

                                <br>

                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="update_category" value="Update Category">
                                </div>

                            <?php }} ?>



                        <?php

                        // Update query

                        if(isset($_POST['update_category'])){


                            $the_cat_tile = $_POST['cat_title'];


                            $query = "UPDATE categories SET  cat_title = '$the_cat_tile ' WHERE cat_id = {$cat_id} ";
                            $update_query = mysqli_query($connection , $query);

                            if(!$update_query){

                                die("query failed" . mysqli_error($connection));
                            }
                        }

                        ?>


                    </div>
                </form>


            </div>

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
                                echo "<td><a href='?delete={$cat_id}'>Delete</a></td>";
                                echo "<td><a href='?edit={$cat_id}'>Edit</a></td>";
                                echo "</tr>";

                        }

                        // Delete categories function.

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