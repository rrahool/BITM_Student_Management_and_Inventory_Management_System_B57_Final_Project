<?php
if(!isset($_SESSION) )session_start();
include_once('../../../../../vendor/autoload.php');

use App\Admin\AdminAuth;
use App\Message\Message;
use App\Utility\Utility;

$auth= new AdminAuth();
$status= $auth->setData($_POST)->is_registered();

if($status){
    $_SESSION['email']=$_POST['email'];
    Message::message("
                <div class=\"alert alert-success\">
                            <strong>Welcome!</strong> You have successfully logged in.
                </div>");
    
     Utility::redirect('../courseCreate.php');

}else{
    Message::message("
                <div class=\"alert alert-danger\">
                            <strong>Wrong information!</strong> Please try again.
                </div>");

    Utility::redirect('../Profile/student_entry.php');

}


