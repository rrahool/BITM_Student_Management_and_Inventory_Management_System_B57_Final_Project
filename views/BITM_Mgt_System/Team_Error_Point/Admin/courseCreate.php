<?php

    if(!isset($_SESSION))session_start();
    include_once('../../../../vendor/autoload.php');

    use App\Message\Message;
    use App\Admin\Course;

    $msg = Message::message();

    $objCourse = new Course();

    $allData = $objCourse->index();

    $serial = 1;
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
                    <div class="col-md-6">
                        <!-- Basic layout-->
                        <form action="courseStore.php" method="post" class="form-horizontal">
                            <div class="panel panel-flat">
                                <div class="panel-heading">
                                    <h5 class="panel-title">Add New Course</h5>
                                    <div class="heading-elements">
                                        <ul class="icons-list">
                                            <li><a data-action="collapse"></a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="panel-body">

                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">Course Name:</label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" name="course_name" required="required">
                                        </div>
                                    </div>

                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary">Add Course<i class="icon-arrow-right14 position-right"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- /basic layout -->
                    </div>
                </div>
                <!-- /main charts -->

                <!-- Bordered table -->
                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h5 class="panel-title">Existing Courses</h5>
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
                                <th>#</th>
                                <th>Course ID</th>
                                <th width="40%">Course Name</th>
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
												<td>$row->name</td>
												<td>
													<a href='batchCreate.php?id=$row->id' title='Batch'>
														<button type='button' class=\"btn btn-success btn-icon\">Create Batch</button>
													</a>

													<a href='courseView.php?id=$row->id' title='View'>
															<button type='button' class=\"btn btn-default btn-icon\">View</button>
														</a>

													<a href='courseEdit.php?id=$row->id' title='Edit'>
															<button type='button' class=\"btn btn-primary btn-icon\">Edit</button>
														</a>

													<a href='courseTrash.php?id=$row->id' title='Trash'>
															<button type='button' class=\"btn btn-warning btn-icon\">Trash</button>
														</a>

													<a href='courseDelete.php?id=$row->id' title='Delete'>
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
