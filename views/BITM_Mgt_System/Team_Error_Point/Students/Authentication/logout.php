<?php
if(!isset($_SESSION) )session_start();
include_once('../../../../../vendor/autoload.php');

use App\Message\Message;
use App\Utility\Utility;
use App\Admin\AdminAuth;

$auth= new AdminAuth();
$status= $auth->log_out();

session_destroy();
session_start();

Message::message("
                <div class=\"alert alert-success\">
                            <strong>Logout!</strong> You have been logged out successfully.
                </div>");
return Utility::redirect('../Profile/admin_login.php');