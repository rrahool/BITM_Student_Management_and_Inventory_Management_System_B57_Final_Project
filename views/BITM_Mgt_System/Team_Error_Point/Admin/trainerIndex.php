<?php

    if(!isset($_SESSION))session_start();
    include_once('../../../../vendor/autoload.php');

    use App\Admin\Trainer;
    use App\Message\Message;

    $msg = Message::message();

    $objTrainer = new Trainer();

    $allData = $objTrainer->index();

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
                    <h5 class="panel-title">Existing Trainer</h5>
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <a class="btn btn-success" href="trainerCreate.php">Add More Trainer</a>
                            <li><a data-action="collapse"></a></li>
                        </ul>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Trainer ID</th>
                            <th>Trainer Name</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Course Taken</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach($allData as $row){

                            echo "
							<tr>
								<td>$serial</td>
								<td>$row->id</td>
								<td>$row->fullname</td>
								<td>$row->email</td>
								<td>$row->password</td>
								<td>$row->course_taken</td>

								<td>
									<a href='trainerView.php?id=$row->id' title='View'>
											<button type='button' class=\"btn btn-default btn-icon\">View</button>
										</a>

									<a href='trainerEdit.php?id=$row->id' title='Edit'>
											<button type='button' class=\"btn btn-primary btn-icon\">Edit</button>
										</a>

									<a href='trainerTrash.php?id=$row->id' title='Trash'>
											<button type='button' class=\"btn btn-warning btn-icon\">Trash</button>
										</a>

									<a href='trainerDelete.php?id=$row->id' title='Delete'>
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