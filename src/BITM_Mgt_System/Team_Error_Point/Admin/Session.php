<?php
/**
 * Created by PhpStorm.
 * User: Web App Develop-PHP
 * Date: 5/29/2017
 * Time: 1:38 PM
 */

Namespace App\Admin;

use App\Message\Message;
use App\Model\Database;
use App\Utility\Utility;
use PDO;


class Session extends Database
{

    public $id;
    public $batch_id;
    public $date;
    public $startTime;
    public $endTime;


    public function setData($postArray){

        if(array_key_exists("id",$postArray)){
            $this->id = $postArray['id'];
        }

        if(array_key_exists("batch_id",$postArray)){
            $this->batch_id = $postArray['batch_id'];
        }

        if(array_key_exists("date",$postArray)){
            $this->date = $postArray['date'];
        }

        if(array_key_exists("startTime",$postArray)){
            $this->startTime = $postArray['startTime'];
        }

        if(array_key_exists("endTime",$postArray)){
            $this->endTime = $postArray['endTime'];
        }

    } // end of setData()

    public function store(){

        $query = "INSERT INTO `tbl_session` (`batch_id`, `date`, `start_time`, `end_time`) VALUES (?, ?, ?, ?);";

        $dataArray = array($this->batch_id, $this->date, $this->startTime, $this->endTime);

        $STH = $this->DBH->prepare($query);
        $result = $STH->execute($dataArray);

        if($result){
            Message::message("Success :) Data Inserted Successfully.");
        }
        else{
            Message::message("Failure :( Data Not Inserted Successfully!");
        }
    } // end of store()


    public function index(){

        $query = "SELECT * FROM `tbl_session`";

        $STH = $this->DBH->query($query);

        $STH->setFetchMode(PDO::FETCH_OBJ);
        $allData = $STH->fetchAll();
        return $allData;

    } // end of index()


    public function selectedSessions($id){

        $query = "SELECT * FROM `tbl_session` WHERE `batch_id`=".$id;

        $STH = $this->DBH->query($query);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $allData = $STH->fetchAll();
        return $allData;

    } // end of index()


    public function view(){

        $query = "SELECT * FROM `tbl_session` WHERE `id`=".$this->id;

        $STH = $this->DBH->query($query);

        $STH->setFetchMode(PDO::FETCH_OBJ);
        $singleData = $STH->fetch();
        return $singleData;

    } // end of view()

    public function update(){

        $query = "UPDATE `tbl_session` SET `date` = ?, `start_time` = ?, `end_time` = ?  WHERE `id` = $this->id;";

        //Utility::dd($query);

        $dataArray = array($this->date, $this->startTime, $this->endTime);

        $STH = $this->DBH->prepare($query);
        $result = $STH->execute($dataArray);

        if($result){
            Message::message("Success :) Data Updated Successfully.");
        }
        else{
            Message::message("Failure :( Data Not Updated!");
        }
    } // end of update()





    public function trash(){
        $query = "UPDATE `tbl_session` SET is_trashed = NOW() WHERE `id` = $this->id;";

        //Utility::dd($query);

        $result = $this->DBH->exec($query);

        if($result){
            Message::message("Success :) Data Trashed Successfully.");
        }
        else{
            Message::message("Failure :( Data Not Trashed!");
        }

    } // end of trash()


    public function trashed(){

        $query = "SELECT * FROM `tbl_session` WHERE is_trashed <> 'No'";

        $STH = $this->DBH->query($query);

        $STH->setFetchMode(PDO::FETCH_OBJ);
        $allData = $STH->fetchAll();
        return $allData;

    } // end of trashed()



    public function recover(){
        $query = "UPDATE `tbl_session` SET is_trashed = 'No' WHERE `id` = $this->id;";

        //Utility::dd($query);

        $result = $this->DBH->exec($query);

        if($result){
            Message::message("Success :) Data Recovered Successfully.");
        }
        else{
            Message::message("Failure :( Data Not Recovered!");
        }

    } // end of recover()

    public function delete(){
        $query = "DELETE FROM `tbl_session` WHERE `id` = $this->id;";

        //Utility::dd($query);

        $result = $this->DBH->exec($query);

        if($result){
            Message::message("Success :) Data Deleted Successfully.");
        }
        else{
            Message::message("Failure :( Data Not Deleted!");
        }


    } // end of delete()





    public function search($requestArray){
        $sql = "";
        if( isset($requestArray['byName']) && isset($requestArray['byCity']) )  $sql = "SELECT * FROM `tbl_session` WHERE `is_trashed` ='No' AND (`course` LIKE '%".$requestArray['search']."%' OR `batch` LIKE '%".$requestArray['search']."%')";
        if(isset($requestArray['byName']) && !isset($requestArray['byCity']) ) $sql = "SELECT * FROM `tbl_session` WHERE `is_trashed` ='No' AND `course` LIKE '%".$requestArray['search']."%'";
        if(!isset($requestArray['byName']) && isset($requestArray['byCity']) )  $sql = "SELECT * FROM `tbl_session` WHERE `is_trashed` ='No' AND `batch` LIKE '%".$requestArray['search']."%'";

        $STH  = $this->DBH->query($sql);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $someData = $STH->fetchAll();

        return $someData;

    }// end of search()


    public function getAllKeywords()
    {
        $_allKeywords = array();
        $WordsArr = array();

        $allData = $this->index();

        foreach ($allData as $oneData) {
            $_allKeywords[] = trim($oneData->course);
        }


        foreach ($allData as $oneData) {

            $eachString= strip_tags($oneData->course);
            $eachString=trim( $eachString);
            $eachString= preg_replace( "/\r|\n/", " ", $eachString);
            $eachString= str_replace("&nbsp;","",  $eachString);

            $WordsArr = explode(" ", $eachString);

            foreach ($WordsArr as $eachWord){
                $_allKeywords[] = trim($eachWord);
            }
        }
        // for each search field block end




        // for each search field block start
        $allData = $this->index();

        foreach ($allData as $oneData) {
            $_allKeywords[] = trim($oneData->batch);
        }
        $allData = $this->index();

        foreach ($allData as $oneData) {

            $eachString= strip_tags($oneData->batch);
            $eachString=trim( $eachString);
            $eachString= preg_replace( "/\r|\n/", " ", $eachString);
            $eachString= str_replace("&nbsp;","",  $eachString);
            $WordsArr = explode(" ", $eachString);

            foreach ($WordsArr as $eachWord){
                $_allKeywords[] = trim($eachWord);
            }
        }
        // for each search field block end


        return array_unique($_allKeywords);


    }// end of getAllKeywords()


    public function indexPaginator($page=1,$itemsPerPage=3){


        $start = (($page-1) * $itemsPerPage);

        if($start<0) $start = 0;


        $sql = "SELECT * from tbl_session  WHERE is_trashed = 'No' LIMIT $start,$itemsPerPage";


        $STH = $this->DBH->query($sql);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $arrSomeData  = $STH->fetchAll();
        return $arrSomeData;


    }// end of indexPaginator()


    public function trashedPaginator($page=1,$itemsPerPage=3){


        $start = (($page-1) * $itemsPerPage);

        if($start<0) $start = 0;


        $sql = "SELECT * from tbl_session WHERE is_trashed <> 'No'  LIMIT $start,$itemsPerPage";


        $STH = $this->DBH->query($sql);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $arrSomeData  = $STH->fetchAll();
        return $arrSomeData;


    }// end of trashedPaginator()


    public function trashList(){

        $sql = "Select * from tbl_session where is_trashed <> 'No'";

        $STH = $this->DBH->query($sql);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        return $STH->fetchAll();
    } // end of trashList()


}