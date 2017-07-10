<?php
if(!isset($_SESSION) )session_start();
include_once('../../../../../vendor/autoload.php');

use App\Student\Student;
use App\Student\StudentAuth;
use App\Message\Message;
use App\Utility\Utility;

$auth= new StudentAuth();

$status= $auth->setData($_POST)->is_exist();

if($status){

    $_SESSION['email']=$_POST['email'];

    Message::message("
                <div class=\"alert alert-success\">
                            <strong>Welcome!</strong> You have successfully logged in.
                </div>");
    
     Utility::redirect('../Profile/dashboard.php');

}else{
    Message::message("
                <div class=\"alert alert-danger\">
                            <strong>Wrong information!</strong> Please try again.
                </div>");

    Utility::redirect('../Profile/student_entry.php');

}


