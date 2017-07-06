<?php

    require_once "../../../../vendor/autoload.php";

    use App\Admin\Course;
    use App\Message\Message;
    use App\Utility\Utility;

    if(!isset($_GET['id'])) {

        Message::message("You can't visit courseView.php without id (ex: courseView.php?id=23)");
        Utility::redirect("index.php");
    }

    $obj = new Course();

    $obj->setData($_GET);

    $singleData = $obj->view();

?>


<?php include 'inc/header.php';?>


<!-- Page container -->
<div class="page-container">

    <!-- Page content -->
    <div class="page-content">


        <?php include 'inc/sidebar.php';?>


        <!-- Main content -->
        <div class="content-wrapper">


            <!-- Bordered table -->
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h5 class="panel-title">View Course</h5>
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li><a data-action="collapse"></a></li>
                        </ul>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Course ID</th>
                            <th width="50%">Course Name</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            echo "
                                <tr>
                                    <td>$singleData->id</td>
                                    <td width=\"50%\">$singleData->name</td>

                                </tr>
						    ";
                        ?>

                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /bordered table -->

            <!-- Footer -->
            <div class="footer text-muted"">
            &copy; 2017. <a href="#">BITM Management System Web App</a> by <a href="teamerrorpoint@gmail.com" target="_blank">Team Error Point - PHP B57</a>

        </div>
        <!-- /footer -->

    </div>
    <!-- /content area -->

</div>

<!-- /main content -->

</div>
<!-- /page content -->

</div>
<!-- /page container -->



</body>

</html>