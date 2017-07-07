<?php

require_once "../../../../vendor/autoload.php";

use App\Message\Message;
use App\Utility\Utility;

session_start();

$id = $_POST['batch_id'];

//Utility::dd($_POST);

$delimiter = ".";
$basename = basename($_FILES['file']['name']);

$extension= end(explode($delimiter, $basename));

if (isset ($_FILES['file']) && $extension== 'csv')
{

    $file = $_FILES['file']['tmp_name'];

    $handle = fopen($file, "r");

    try {

        $DBH = new PDO("mysql:host=localhost;dbname=db_bitm_mgt", "root", "");
//			$STMR = $dbh->prepare("TRUNCATE TABLE tbl_csv_upload");
//			$STMR->execute();

        $STH = $DBH->prepare("INSERT INTO tbl_students (`batch_id`, `seid`, `name`, `email`, `phone`) VALUES ($id, ?, ?, ?, ?)");

        if ($handle !== FALSE)
        {
            fgets($handle);

            while (($data = fgetcsv($handle, 1000, ',')) !== FALSE)
            {
                $STH->execute($data);
            }
            fclose($handle);

            $DBH = null;

            Message::message("Success :) Data Inserted Successfully.");

            Utility::redirect("studentCreate.php?id=$id");


        }

    } catch(PDOException $e) {

        die($e->getMessage());

    }


}
else
{
    // Error mesage id File type is not CSV or File Size is greater then 10MB.
    Message::message("Failure :( Data Not Inserted!");
    Utility::redirect("studentCreate.php?id=$id");
}
?>