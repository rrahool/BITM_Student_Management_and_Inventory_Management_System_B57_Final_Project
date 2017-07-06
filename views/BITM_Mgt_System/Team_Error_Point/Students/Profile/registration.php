<?php

include_once('../../../../../vendor/autoload.php');

use App\Admin\Admin;
use App\Admin\AdminAuth;
use App\Message\Message;
use App\Utility\Utility;

$auth= new AdminAuth();

$status= $auth->setData($_POST)->is_exist();

if($status){
    Message::setMessage("<div class='alert alert-danger'>
    <strong>Taken!</strong> Email has already been taken. </div>");
    return Utility::redirect($_SERVER['HTTP_REFERER']);
}else{
    $_POST['email_token'] = md5(uniqid(rand()));
    $obj= new Admin();
    $obj->setData($_POST)->store();

    require '../../../../../vendor/phpmailer/phpmailer/PHPMailerAutoload.php';
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPDebug  = 0;
    $mail->SMTPAuth   = true;
    $mail->SMTPSecure = "ssl";
    $mail->Host       = "smtp.gmail.com";
    $mail->Port       = 465;
    $mail->AddAddress($_POST['email']);
    $mail->Username="teamerrorpoint@gmail.com";
    $mail->Password="bitmPHPB57";
    $mail->SetFrom('teamerrorpoint@gmail.com','Administrator Mail Confirmation');
    $mail->AddReplyTo("teamerrorpoint@gmail.com","Administrator Mail Confirmation");
    $mail->Subject    = "Your Account Activation Link";
    $message =  "
       Please click this link to verify your account:
       http://localhost/BITM_Mgt_System_B57_Final_Project/views/BITM_Mgt_System/Team_Error_Point/Admin/Profile/emailverification.php?email=".$_POST['email']."&email_token=".$_POST['email_token'];



    $mail->MsgHTML($message);
    $mail->Send();
}
