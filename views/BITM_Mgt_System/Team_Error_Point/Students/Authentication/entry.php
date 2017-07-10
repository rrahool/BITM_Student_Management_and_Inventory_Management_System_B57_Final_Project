<?php
if(!isset($_SESSION) )session_start();
include_once('../../../../../vendor/autoload.php');

use App\Student\Student;
use App\Student\StudentAuth;
use App\Message\Message;
use App\Utility\Utility;

$msg = Message::message();

$auth= new StudentAuth();

$status= $auth->setData($_POST)->is_exist();

if($status){

    $allData = $auth->setData($_POST)->check_batchNsessionSchedule();

    if($allData) {

        $_SESSION['email']=$_POST['email'];

        Message::message("
                <div class=\"alert alert-success\">
                            <strong>Welcome!</strong> You have successfully logged in.
                </div>");


        echo "
        <!doctype html>
        <html lang=\"en\">
            <head>
                <meta charset=\"utf-8\">
                <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
                <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
                <title>Dashboard</title>

                <!-- Global stylesheets -->
                <link href=\"https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900\" rel=\"stylesheet\" type=\"text/css\">
                <link href=\"../../../../../resources/assets/css/icons/icomoon/styles.css\" rel=\"stylesheet\" type=\"text/css\">
                <link href=\"../../../../../resources/assets/css/bootstrap.css\" rel=\"stylesheet\" type=\"text/css\">
                <link href=\"../../../../../resources/assets/css/core.css\" rel=\"stylesheet\" type=\"text/css\">
                <link href=\"../../../../../resources/assets/css/components.css\" rel=\"stylesheet\" type=\"text/css\">
                <link href=\"../../../../../resources/assets/css/colors.css\" rel=\"stylesheet\" type=\"text/css\">
                <!-- /global stylesheets -->

                <!-- Core JS files -->
                <script type=\"text/javascript\" src=\"../../../../../resources/assets/js/plugins/loaders/pace.min.js\"></script>
                <script type=\"text/javascript\" src=\"../../../../../resources/assets/js/core/libraries/jquery.min.js\"></script>
                <script type=\"text/javascript\" src=\"../../../../../resources/assets/js/core/libraries/bootstrap.min.js\"></script>
                <script type=\"text/javascript\" src=\"../../../../../resources/assets/js/plugins/loaders/blockui.min.js\"></script>
                <!-- /core JS files -->

                <!-- Theme JS files -->
                <script type=\"text/javascript\" src=\"../../../../../resources/assets/js/plugins/visualization/d3/d3.min.js\"></script>
                <script type=\"text/javascript\" src=\"../../../../../resources/assets/js/plugins/visualization/d3/d3_tooltip.js\"></script>
                <script type=\"text/javascript\" src=\"../../../../../resources/assets/js/plugins/forms/styling/switchery.min.js\"></script>
                <script type=\"text/javascript\" src=\"../../../../../resources/assets/js/plugins/forms/styling/uniform.min.js\"></script>
                <script type=\"text/javascript\" src=\"../../../../../resources/assets/js/plugins/forms/selects/bootstrap_multiselect.js\"></script>
                <script type=\"text/javascript\" src=\"../../../../../resources/assets/js/plugins/ui/moment/moment.min.js\"></script>
                <script type=\"text/javascript\" src=\"../../../../../resources/assets/js/plugins/pickers/daterangepicker.js\"></script>

                <script type=\"text/javascript\" src=\"../../../../../resources/assets/js/core/app.js\"></script>
                <script type=\"text/javascript\" src=\"../../../../../resources/assets/js/pages/dashboard.js\"></script>

                <script type=\"text/javascript\" src=\"../../../../../resources/assets/js/plugins/ui/ripple.min.js\"></script>
                <!-- /theme JS files -->

                <script src=\"../../../../../resources/assets/js/jquery.js\"></script>

                <!-- specifically used for Datepicker, block 1 of 2 start -->

                <link rel=\"stylesheet\" href=\"../../../../../resources/assets/css/jquery-ui.css\">
                <script src=\"../../../../../resources/assets/js/jquery-1.12.4.js\"></script>
                <script src=\"../../../../../resources/assets/js/jquery-ui.js\"></script>

                <!-- specifically used for Datepicker, block 1 of 2 end -->

                <!-- specifically used for Timepicker, block 1 of 2 start -->

                <link rel=\"stylesheet\" href=\"../../../../../resources/assets/css/jquery.timepicker.css\">
                <script src=\"../../../../../resources/assets/js/jquery.timepicker.js\"></script>
                <script src=\"../../../../../resources/assets/js/jquery.timepicker.min.js\"></script>

                <!-- specifically used for Timepicker, block 1 of 2 end -->


            </head>

            <body>

            <div class=\"page-container\">
                <div class=\"page-content\">
                    <div class=\"content-wrapper\">


                            <div class=\"content\">

                                <div class=\"row\">
                                    <div class=\"col-md-6\">
                                        <div style='background-color: lightskyblue; margin-bottom: 7px; border-radius: 5%; font-family: Comic Sans MS;'>
                                            <div id='message' class='text-center'>
                                              <strong> $msg </strong>
                                            </div>
                                       </div>;
                                    </div>
                                </div>

                                <div class=\"row\">

                                    <div class=\"text-center\">

                                        <h1><b>Hello User</b></h1>

                                    </div>


                                </div>

                                <div class=\"table-responsive\">
                                    <table class=\"table table-bordered\">
                                        <thead>
                                        <tr>
                                            <th>SEID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Batch</th>
                                            <th>Date</th>
                                            <th>Session</th>
                                        </tr>
                                        </thead>
                                        <tbody>" ;

        foreach($allData as $col){
            echo "
                                                        <tr>
                                                            <td>$col->seid</td>
                                                            <td>$col->name</td>
                                                            <td>$col->email</td>
                                                            <td>$col->batch_id</td>
                                                            <td>$col->date</td>
                                                            <td>$col->session_no</td>
                                                        </tr>
                                                    ";
        }

        echo "

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                    </div>
                </div>
            </div>


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
        </html> ";

    }

    else {
        Message::message("
                <div class=\"alert alert-danger\">
                            <strong>Oops!</strong> You are late.
                </div>");

        Utility::redirect('../Profile/student_entry.php');

    }

}

 else {
    Message::message("
                <div class=\"alert alert-danger\">
                            <strong>Wrong Information!</strong> SEID or Email Doesn't Exist.
                </div>");

    Utility::redirect('../Profile/student_entry.php');

}


?>