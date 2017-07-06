<?php

    require_once "../../../../vendor/autoload.php";

    use App\Admin\Trainer;
    use App\Message\Message;
    use App\Utility\Utility;

    $msg = Message::message();

    if(!isset($_GET['id'])) {

        Message::message("You can't visit trainerView.php without id (ex: trainerView.php?id=23)");
        Utility::redirect("index.php");
    }

    $obj = new Trainer();

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

            <!-- Content area -->

            <div class="content">

                <div class="row">
                    <div class="col-md-6">
                        <?php
                        echo "<div style='background-color: lightskyblue; margin-bottom: 7px; border-radius: 5%; font-family: Comic Sans MS;'>
                                <div id='message' class='text-center'>
                                  <strong> $msg </strong>
                                </div>
                           </div>";
                        ?>
                    </div>
                </div>

            <!-- Main charts -->
            <div class="row">
                <div class="col-lg-7">

                    <!-- add courses -->
                    <div class="panel panel-flat">
                        <form action="trainerUpdate.php" method="post" class="form-horizontal">
                            <div class="panel panel-flat">
                                <div class="panel-heading">
                                    <h5 class="panel-title">Edit Trainer Info.</h5>
                                    <div class="heading-elements">
                                        <ul class="icons-list">
                                            <li><a data-action="collapse"></a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="panel-body">

                                    <input type="hidden" class="form-control" name="id" value="<?php echo $singleData->id ?>">

                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">Trainer Name:</label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" name="trainer_name" value="<?php echo $singleData->fullname ?>" required="required">
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">Email:</label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" name="email" value="<?php echo $singleData->email ?>" required="required">
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">Password:</label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" name="password" value="<?php echo $singleData->password ?>" required="required">
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">Course Taken:</label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" name="course_taken" value="<?php echo $singleData->course_taken ?>" required="required">
                                        </div>
                                    </div>


                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary">Update <i class="icon-arrow-right14 position-right"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /add courses -->

                </div>

            </div>
            <!-- /main charts -->


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

