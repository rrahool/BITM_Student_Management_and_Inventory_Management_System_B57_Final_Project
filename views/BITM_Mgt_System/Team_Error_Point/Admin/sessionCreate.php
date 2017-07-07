<?php

    if(!isset($_SESSION))session_start();
    include_once('../../../../vendor/autoload.php');

    use App\Message\Message;
    use App\Admin\Course;
    use App\Admin\Batch;
    use App\Admin\Session;
    use App\Utility\Utility;

    $msg = Message::message();

    if(!isset($_GET['id'])) {

        Message::message("You can't visit batchView.php without id (ex: batchView.php?id=23)");
        Utility::redirect("batchIndex.php");
    }

    $objBatch = new Batch();
    $objBatch->setData($_GET);
    $singleData = $objBatch->view();


    $objSession = new Session();

    $id = $singleData->id;
    $allData = $objSession->selectedSessions($id);

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
                    <div class="col-lg-8">

                        <!-- add courses -->
                        <div class="panel panel-flat">
                            <form action="sessionStore.php" method="post" class="form-horizontal">
                                <div class="panel panel-flat">
                                    <div class="panel-heading">
                                        <h5 class="panel-title">Add Session for <?php echo $singleData->batch; ?> </h5>
                                        <div class="heading-elements">
                                            <ul class="icons-list">
                                                <li><a data-action="collapse"></a></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="panel-body">

                                        <input type="hidden" class="form-control" name="batch_id" value="<?php echo $singleData->id ?>">
                                        <div class="row">


                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Session No.: </label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                                        <input type="text" class="form-control" name="session_no" required="required">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Date: </label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                                        <input type="text" id="datepicker" class="form-control" name="date" required="required">
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
                                                        <input type="text" id="startTimepicker" class="form-control" name="startTime" required="required">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>End Time: </label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="icon-alarm"></i></span>
                                                        <input type="text" id="endTimepicker" class="form-control" name="endTime" required="required">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        </div>


                                        <div class="text-right">
                                            <button type="submit" class="btn btn-primary">Add Session <i class="icon-arrow-right14 position-right"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /add courses -->

                        <div class="col-lg-4">
                            <a class="btn btn-danger" href="sessionIndex.php?id=<?php echo $id; ?>" >Existing Sessions of this Batch</a>
                        </div>

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