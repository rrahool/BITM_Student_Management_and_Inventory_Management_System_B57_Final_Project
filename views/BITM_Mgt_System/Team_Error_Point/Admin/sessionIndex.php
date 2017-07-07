<?php

if(!isset($_SESSION))session_start();
include_once('../../../../vendor/autoload.php');


    use App\Admin\Batch;
    use App\Admin\Session;
    use App\Utility\Utility;
    use App\Message\Message;

    $msg = Message::message();

    $objBatch = new Batch();
    $objBatch->setData($_GET);
    $singleData = $objBatch->view();


    $objSession = new Session();

    $id = $singleData->id;
    $allData = $objSession->selectedSessions($id);

    $serial = 1;

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

                <!-- Bordered table -->
                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h5 class="panel-title">Existing <?php echo $singleData->batch; ?> Sessions</h5>
                        <div class="heading-elements">
                            <ul class="icons-list">
                                <a class="btn btn-success" href="sessionCreate.php?id=<?php echo $id; ?>">Add More Session</a>
                                <li><a data-action="collapse"></a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Session No.</th>
                                <th>Date</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach($allData as $row){

                                echo "
							<tr>
								<td>$row->session_no</td>
								<td>$row->date</td>
								<td>$row->start_time</td>
								<td>$row->end_time</td>
								<td>

									<a href='sessionView.php?id=$row->id' title='View'>
											<button type='button' class=\"btn btn-default btn-icon\">View</button>
										</a>

									<a href='sessionEdit.php?id=$row->id' title='Edit'>
											<button type='button' class=\"btn btn-primary btn-icon\">Edit</button>
										</a>

									<a href='sessionTrash.php?id=$row->id' title='Trash'>
											<button type='button' class=\"btn btn-warning btn-icon\">Trash</button>
										</a>

									<a href='sessionDelete.php?id=$row->id' title='Delete'>
											<button type='button' onclick='return confirm_delete()' class=\"btn btn-danger btn-icon\">Delete</button>
										</a>

								</td>
							</tr>
						";
                                $serial++;
                            }
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