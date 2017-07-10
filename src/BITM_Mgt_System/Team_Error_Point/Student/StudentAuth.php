<?php

namespace App\Student;

if(!isset($_SESSION) )  session_start();

use App\Message\Message;
use App\Utility\Utility;
use App\Model\Database as DB;
use PDO;

class StudentAuth extends DB{

    public $seid = "";
    public $email = "";

    public function __construct(){
        parent::__construct();
    }

    public function setData($postArray = Array()){

        if (array_key_exists('seid', $postArray)) {
            $this->seid = $postArray['seid'];
        }

        if (array_key_exists('email', $postArray)) {
            $this->email = $postArray['email'];
        }
        return $this;
    }

    public function is_exist(){

        $query="SELECT * FROM `tbl_students` WHERE `seid` = '$this->seid' AND `email` ='$this->email' ";

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

    public function check_batchNsessionSchedule(){

        $query="SELECT * FROM `tbl_students` AS st INNER JOIN `tbl_session` AS ses ON st.batch_id = ses.batch_id WHERE `seid` = '$this->seid' AND ses.date = CURRENT_DATE AND CURRENT_TIME BETWEEN ses.start_time AND ADDTIME(ses.start_time, '04:30:00') ;";

        $STH =$this->DBH->query($query);

        $STH->setFetchMode(PDO::FETCH_OBJ);
        $allData = $STH->fetchAll();
        return $allData;

    }



    public function is_registered(){
        $query = "SELECT * FROM `tbl_admin` WHERE `email_verified`='" . 'Yes' . "' AND `email`='$this->email' AND `password`='$this->password'";
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