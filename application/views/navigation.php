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
            <a class="navbar-brand" href="#">BLOG ME</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">


                <?php

                $query = "SELECT * FROM categories";
                $select_all_cat_query = mysqli_query($connection, $query);

                if(!$select_all_cat_query){

                    echo "An error has occurred" . mysqli_error();

                }


                while($row = mysqli_fetch_assoc($select_all_cat_query)){

                    $cat_title =  $row['cat_title'];


                    echo "<li><a href='#'>{$cat_title}</a></li>";

                }


                ?>

                <li>
                    <a href="admin">Admin</a>
                </li>



            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>