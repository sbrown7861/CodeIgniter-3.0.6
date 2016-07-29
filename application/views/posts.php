<?php include "admin_header.php" ?>

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


                    <?php

                    if(isset($_GET['source'])){

                        $source = $_GET['source'];



                    }else{

                        $source = '';

                    }

                    switch($source){

                        case "add_posts" ;
                            include "add_post.php";
                            break;


                        case "edit_posts";
                            include "edit_post.php";
                            break;



                        default:

                            include "admin_view_all_posts.php";

                            break;


                    }


                    ?>



                </div>


            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->



<?php include "includes/admin_footer.php" ?>