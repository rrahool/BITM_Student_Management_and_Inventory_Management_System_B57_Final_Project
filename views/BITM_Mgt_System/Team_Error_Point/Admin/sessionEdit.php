<?php

    require_once "../../../../vendor/autoload.php";

    use App\Admin\Session;
    use App\Message\Message;
    use App\Utility\Utility;

    $msg = Message::message();

    if(!isset($_GET['id'])) {

        Message::message("You can't visit sessionView.php without id (ex: sessionView.php?id=23)");
        Utility::redirect("courseCreate.php");
    }

    $obj = new Session();

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
            <!-- Main charts -->
            <div class="row">
                <div class="col-lg-7">

                    <!-- add courses -->
                    <div class="panel panel-flat">
                        <form action="sessionUpdate.php" method="post" class="form-horizontal">
                            <div class="panel panel-flat">
                                <div class="panel-heading">
                                    <h5 class="panel-title">Edit Session Schedule</h5>
                                    <div class="heading-elements">
                                        <ul class="icons-list">
                                            <li><a data-action="collapse"></a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="panel-body">

                                    <input type="hidden" class="form-control" name="id" value="<?php echo $singleData->id ?>">

                                    <input type="hidden" class="form-control" name="batch_id" value="<?php echo $singleData->batch_id ?>">

                                    <div class="row">

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Session No.: </label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                                    <input type="text" class="form-control" name="session_no" value="<?php echo $singleData->session_no ?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Date: </label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                                    <input type="text" id="datepicker" class="form-control" name="date" value="<?php echo $singleData->date ?>">
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Start Time: </label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="icon-alarm"></i></span>
                                                    <input type="text" id="startTimepicker" class="form-control" name="startTime" value="<?php echo $singleData->start_time ?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>End Time: </label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="icon-alarm"></i></span>
                                                    <input type="text" id="endTimepicker" class="form-control" name="endTime" value="<?php echo $singleData->end_time ?>">
                                                </div>
                                            </div>
                                        </div>

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

<!-- specifically used for Datepicker, block1 of 2 start -->

<script>
    $( function() {
        $( "#datepicker" ).datepicker({
            dateFormat: 'yy-mm-dd',
            changeMonth: true,
            changeYear: true
        });
    } );
</script>

<!-- specifically used for Datepicker, block1 of 2 end -->

<!-- specifically used for Timepicker, block 2 of 2 start -->

<script>
    $('#startTimepicker').timepicker({
        'timeFormat': 'H:i:s'
    });

    $('#endTimepicker').timepicker({
        'timeFormat': 'H:i:s'
    });
</script>

<!-- specifically used for Timepicker, block 2 of 2 end -->

</body>

</html>

