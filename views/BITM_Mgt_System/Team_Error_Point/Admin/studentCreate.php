<?php

    if(!isset($_SESSION)) session_start();
    include_once('../../../../vendor/autoload.php');

    use App\Message\Message;
    use App\Model\Database;
    use App\Admin\Batch;
    use App\Admin\Student;

    $obj = new Database();

    $msg = Message::message();

    $obj = new Batch();

    $obj->setData($_GET);

    $singleData = $obj->view();

    $batch_id = $singleData->id;

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
                            <div class="panel panel-flat">
                                <div class="panel-heading">
                                    <h5 class="panel-title">Add New Student</h5>
                                    <div class="heading-elements">
                                        <ul class="icons-list">
                                            <li><a data-action="collapse"></a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="panel-body">

                                    <div class="text-center">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_form_inline">Import CSV File <i class="icon-play3 position-right"></i></button>
                                    </div>


                                    <!-- Inline form modal -->
                                    <div id="modal_form_inline" class="modal fade">
                                        <div class="modal-dialog">
                                            <div class="modal-content text-center">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Import Student Information</h5>
                                                </div>

                                                <form action="studentCreate_CSVUpload.php" method="post" enctype="multipart/form-data" class="form-inline">

                                                    <div class="modal-body">

                                                        <input type="hidden" class="form-control" name="batch_id" value="<?php echo $batch_id ?>">
                                                        <div class="form-group has-feedback">
                                                            <label><b>Upload File: </b></label>
                                                            <input name="file" type="file" id="file" required="required" class="form-control btn btn-default">
                                                            <div class="form-control-feedback">
                                                                <i class="icon-user text-muted"></i>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="modal-footer text-center">
                                                        <button type="submit" class="btn btn-primary">Save <i class="icon-arrow-right5"></i></button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /inline form modal -->

                                </div>
                            </div>
                        <!-- /basic layout -->
                    </div>

                </div>
                <!-- /main charts -->




                <!-- Bordered table -->
                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h5 class="panel-title">Student List of <b><?php echo $singleData->batch ?></b></h5>
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
                                <th>Batch ID</th>
                                <th>SEID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php

                            $query = "SELECT `batch_id`, `seid`, `name`, `email`, `phone` FROM `tbl_students` WHERE `batch_id`=".$batch_id;

                            $STH = $obj->DBH->query($query);

                            $STH->setFetchMode(PDO::FETCH_OBJ);

                            $allData = $STH->fetchAll();

                            foreach($allData as $rows)
                            {

                                echo "
                                                    <tr>
                                                        <td>$serial</td>
                                                        <td>$rows->batch_id</td>
                                                        <td>$rows->seid</td>
                                                        <td>$rows->name</td>
                                                        <td>$rows->email</td>
                                                        <td>$rows->phone</td>
                                                        <td>

                                                            <a href='studentProfileView.php?id=$rows->seid' title='View'>
                                                                    <button type='button' class=\"btn border-warning text-warning-600 btn-flat btn-icon\"><i class=\"icon-pin-alt\"></i>View</button>
                                                            </a>

                                                            <a href='studentEdit.php?id=$rows->seid' title='Edit'>
                                                                    <button type='button' class=\"btn btn-primary btn-icon\">Edit</button>
                                                                </a>

                                                            <a href='studentTrash.php?id=$rows->seid' title='Trash'>
                                                                    <button type='button' class=\"btn btn-warning btn-icon\">Trash</button>
                                                                </a>

                                                            <a href='studentDelete.php?id=$rows->seid' title='Delete'>
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
