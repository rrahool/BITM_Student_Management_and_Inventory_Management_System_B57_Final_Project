<?php

    require_once "../../../../vendor/autoload.php";

    use App\Message\Message;
    use App\Utility\Utility;
    use App\Model\Database;
    use App\Admin\Batch;

    $obj = new Database();

    $msg = Message::message();

    $obj = new Batch();

    $obj->setData($_GET);

    $singleData = $obj->view();

    $batch_id = $singleData->id;

    $serial = 1;

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>CSV Upload</title>

    <link href="../../../../resources/assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="assets/css/docs.css" rel="stylesheet">


    <script src="../../../../resources/assets/js/jquery.js"></script>
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.js"></script>
    <![endif]-->

</head>

  <body data-spy="scroll" data-target=".bs-docs-sidebar">


            <div class="container">
              <form class="form-horizontal" method="post" action="Uploadpdo2.php" enctype="multipart/form-data">

                  <input type="hidden" class="form-control" name="batch_id" value="<?php echo $batch_id ?>">

                  <div class="control-group">
                      <label class="control-label" for="inputName">Upload CSV File</label>

                      <div class="controls">


                          <input class="btn btn-info" name="file" type="file" id="file" onchange="showCode()" onblur="showCode()" onclick="showCode()" required="required"  />

                      </div>

                  </div>

                  <div class="control-group">
                      <div class="controls">
                          <button type="submit" class="btn">Save CSV</button>
                      </div>
                  </div>

              </form>
            </div>


            <div class="container">

            <div class="span12">

                <section id="c1">
                      <div class="page-header">
                        <h1>Student List of <b><?php echo $singleData->batch ?></b></h1>
                      </div>

                        <table class="table table-bordered table-hover">

                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <?php
                                    echo "<div style='background-color: lightskyblue; border-radius: 5%; font-family: Comic Sans MS;'>
                                <div id='message' class='text-center'>
                                  <strong> $msg </strong>
                                </div>
                           </div>";
                                    ?>
                                </div>
                                <div class="col-md-2"></div>
                            </div>

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

                                                            <a href='batchView.php?id=$rows->seid' title='View'>
                                                                    <button type='button' class=\"btn btn -default btn - icon\">View</button>
                                                                </a>

                                                            <a href='batchEdit.php?id=$rows->seid' title='Edit'>
                                                                    <button type='button' class=\"btn btn - primary btn - icon\">Edit</button>
                                                                </a>

                                                            <a href='batchTrash.php?id=$rows->seid' title='Trash'>
                                                                    <button type='button' class=\"btn btn - warning btn - icon\">Trash</button>
                                                                </a>

                                                            <a href='batchDelete.php?id=$rows->seid' title='Delete'>
                                                                    <button type='button' onclick='return confirm_delete()' class=\"btn btn - danger btn - icon\">Delete</button>
                                                                </a>


                                                        </td>
                                                    </tr>

                                               ";
                                    $serial++;
                                }

                                ?>
                            </tbody>
                        </table>

                </section>

            </div>
        </div>

            <!-- Le javascript
                        ================================================== -->
            <!-- Placed at the end of the document so the pages load faster -->
            <script src="assets/js/jquery.js"></script>
            <script src="assets/js/bootstrap-transition.js"></script>
            <script src="assets/js/bootstrap-alert.js"></script>
            <script src="assets/js/bootstrap-modal.js"></script>
            <script src="assets/js/bootstrap-dropdown.js"></script>
            <script src="assets/js/bootstrap-scrollspy.js"></script>
            <script src="assets/js/bootstrap-tab.js"></script>
            <script src="assets/js/bootstrap-tooltip.js"></script>
            <script src="assets/js/bootstrap-popover.js"></script>
            <script src="assets/js/bootstrap-button.js"></script>
            <script src="assets/js/bootstrap-collapse.js"></script>
            <script src="assets/js/bootstrap-carousel.js"></script>
            <script src="assets/js/bootstrap-typeahead.js"></script>
            <script src="assets/js/bootstrap-affix.js"></script>

            <script src="assets/js/holder/holder.js"></script>

            <script src="assets/js/application.js"></script>

            <script src="assets/js/jqBootstrapValidation.js"></script>

            <script>
                $(function () { $("input,select,textarea").not("[type=submit]").jqBootstrapValidation(); } );
            </script>

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



  </body>
</html>
