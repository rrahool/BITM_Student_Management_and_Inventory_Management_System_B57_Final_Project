<?php

if(!isset($_SESSION) )session_start();
include_once('../../../../../vendor/autoload.php');

use App\Student\StudentAuth;
use App\Student\Student;
use App\Message\Message;
use App\Utility\Utility;

$auth= new StudentAuth();

$status= $auth->setData($_POST)->is_exist();

if($status){

    $_POST['email_token'] = md5(uniqid(rand()));

    $obj= new Student();
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


}else{

    Message::setMessage("<div class='alert alert-danger'>
                            <strong>Taken!</strong> Sorry, Wrong Information. </div>");
    return Utility::redirect($_SERVER['HTTP_REFERER']);

}
