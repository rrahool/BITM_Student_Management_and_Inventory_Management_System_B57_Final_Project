<?php

    require_once "../../../../vendor/autoload.php";

    use App\Admin\Course;
    use App\Message\Message;
    use App\Utility\Utility;

    $msg = Message::message();

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

        <?php include 'inc/sidebar.php'; ?>

        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Content area -->
            <div class="content">

                <!-- Main charts -->
                <div class="row">
                    <div class="col-md-6">
                        <!-- Basic layout-->
                        <form action="courseUpdate.php" method="post" class="form-horizontal">
                            <div class="panel panel-flat">
                                <div class="panel-heading">
                                    <h5 class="panel-title">Edit Course Information</h5>
                                    <div class="heading-elements">
                                        <ul class="icons-list">
                                            <li><a data-action="collapse"></a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="panel-body">

                                    <input type="hidden" class="form-control" name="id" value="<?php echo $singleData->id ?>">

                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">Course Name:</label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" name="course_name" value="<?php echo $singleData->name ?>" required="required">
                                        </div>
                                    </div>

                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary">Update <i class="icon-arrow-right14 position-right"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- /basic layout -->
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

<script>

    jQuery(

        function($) {
            $('#message').fadeOut (550);
            $('#message').fadeIn (550);
            $('#message').fadeOut (550);
            $('#message').fadeIn (550);
            $('#message').fadeOut (550);
            $('#message').fadeIn (550);
            $('#message').fadeOut (550);
        }
    )
</script>

<script type="text/javascript">
    function confirm_delete(){
        return confirm('Are you sure to Delete?');
    }
</script>

</body>


</html>
