<?php

namespace App\Student;

if(!isset($_SESSION) )  session_start();

use App\Message\Message;
use App\Utility\Utility;
use App\Model\Database as DB;
use PDO;

class StudentAuth extends DB{

    public $email = "";
    public $seid = "";

    public function __construct(){
        parent::__construct();
    }

    public function setData($data = Array()){
        if (array_key_exists('email', $data)) {
            $this->email = $data['email'];
        }
        if (array_key_exists('seid', $data)) {
            $this->seid = md5($data['seid']);
        }
        return $this;
    }

    public function is_exist(){

        $query="SELECT * FROM `tbl_student_temp` WHERE `tbl_student_temp`.`email` ='$this->email' AND `tbl_student_temp`.`seid` ='$this->seid' ";
        $STH=$this->DBH->query($query);

        $STH->setFetchMode(PDO::FETCH_OBJ);
        $STH->fetchAll();

        $count = $STH->rowCount();

        if ($count > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function is_registered(){
        $query = "SELECT * FROM `tbl_student_temp` WHERE `email_verified`='" . 'Yes' . "' AND `email`='$this->email' AND `password`='$this->password'";
        $STH=$this->DBH->query($query);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $STH->fetchAll();

        $count = $STH->rowCount();
        if ($count > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function logged_in(){
        if ((array_key_exists('email', $_SESSION)) && (!empty($_SESSION['email']))) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function log_out(){
        $_SESSION['email']="";
        return TRUE;
    }

}