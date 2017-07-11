<?php

namespace App\Student;

use App\Model\Database as DB;
use App\Message\Message;
use App\Utility\Utility;
use PDO;

class Student extends DB{

    public $id;
    public $seid;
    public $email="";
    public $email_token="";

    public function __construct()
    {
        parent::__construct();
    }

    public function setData($data=array()){

        if(array_key_exists('id',$data)){
            $this->id=$data['id'];
        }

        if(array_key_exists('seid',$data)){
            $this->id=$data['seid'];
        }

        if(array_key_exists('email',$data)){
            $this->email=$data['email'];
        }


        if(array_key_exists('email_token',$data)){
            $this->email_token=$data['email_token'];
        }
        return $this;
    }


    public function store(){

        $query = "INSERT INTO tbl_attendance (seid, email, batch_id, session_id)
                    SELECT tbl_students.seid, tbl_students.email, tbl_students.batch_id, tbl_session.id
                      FROM tbl_students, tbl_session
                        WHERE tbl_students.seid = '$this->seid' AND date = CURRENT_DATE;";

        $dataArray = array($this->seid, $this->email, $this->email_token);

        $STH = $this->DBH->prepare($query);
        $result = $STH->execute($dataArray);

        if ($result) {
            Message::message("
                <div class=\"alert alert-success\">
                            <strong>Success!</strong> Data has been stored successfully, Please check your email and active your account.
                </div>");
            return Utility::redirect($_SERVER['HTTP_REFERER']);
        } else {
            //Utility::dd($_POST);
            Message::message("
                <div class=\"alert alert-danger\">
                            <strong>Failed!</strong> Data has not been stored successfully.
                </div>");
            return Utility::redirect($_SERVER['HTTP_REFERER']);
        }
    } // end of store()


    public function change_password(){
        $query="UPDATE `db_bitm_mgt`.`tbl_admin` SET `password`=?  WHERE `tbl_admin`.`email` =:email";

        $dataArray = array($this->password);

        $STH =$this->DBH->prepare($query);
        $result = $STH->execute($dataArray);

        if($result){
            Message::message("
             <div class=\"alert alert-info\">
             <strong>Success!</strong> Password has been updated  successfully.
              </div>");
        }
        else {
            echo "Error";
        }

    }

    public function view(){
        $query=" SELECT * FROM tbl_admin WHERE email = '$this->email' ";
        // Utility::dd($query);
        $STH =$this->DBH->query($query);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        return $STH->fetch();

    }// end of view()


    public function validTokenUpdate(){
        $query="UPDATE `db_bitm_mgt`.`tbl_admin` SET  `email_verified`='".'Yes'."' WHERE `tbl_admin`.`email` ='$this->email'";
        $result=$this->DBH->prepare($query);
        $result->execute();

        if($result){
            Message::message("
             <div class=\"alert alert-success\">
             <strong>Success!</strong> Email verification has been successful. Please login now!
              </div>");
        }
        else {
            echo "Error";
        }
        return Utility::redirect('../../../../views/BITM_Mgt/System/Team_Error_Point/Admin/Profile/student_attendance_form.php');
    }

    public function update(){

        $query="UPDATE `db_bitm_mgt`.`tbl_admin` SET `first_name`= ?, `last_name` = ? , `email` = ?, `username` = ?, `password` = ?  WHERE `tbl_admin`.`email` = :email";

        $dataArray = array($this->firstName, $this->lastName, $this->email, $this->password, $this->email_token);

        $result=$this->DBH->prepare($query);

        $result->execute($dataArray);

        if($result){
            Message::message("
             <div class=\"alert alert-info\">
             <strong>Success!</strong> Data has been updated  successfully.
              </div>");
        }
        else {
            echo "Error";
        }
        return Utility::redirect($_SERVER['HTTP_REFERER']);
    }


}