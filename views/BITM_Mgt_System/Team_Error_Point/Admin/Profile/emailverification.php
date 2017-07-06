<?php

if(!isset($_SESSION) )session_start();

include_once('../../../../../vendor/autoload.php');

use App\Message\Message;
use App\Utility\Utility;
use App\Admin\Admin;

$obj= new Admin();

$obj->setData($_GET);

$singleAdmin = $obj->view();


if($singleAdmin->email_token == $_GET['email_verified']) {
    $obj->setData($_GET)->validTokenUpdate();
}
else{

    if($singleAdmin->email_token=='Yes'){
    Message::message("
             <div class=\"alert alert-info\">
             <strong>Don't worry! </strong>This email already verified. Please login!
              </div>");
    Utility::redirect("admin_login.php");
   }
    else{
    Message::message("
             <div class=\"alert alert-info\">
             <strong>Sorry! </strong>This Token is Invalid. Please signup with a valid email!
              </div>");
    Utility::redirect("admin_login.php");
   }
}