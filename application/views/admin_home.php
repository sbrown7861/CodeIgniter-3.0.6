<?php include "admin_header.php" ?>

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



                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->



<?php include "admin_footer.php" ?>