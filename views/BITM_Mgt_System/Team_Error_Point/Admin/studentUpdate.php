<?php

require_once "../../../../vendor/autoload.php";

use App\Admin\Student;
use App\Utility\Utility;

$obj = new Student();

$obj->setData($_POST);

$obj->update();

//Utility::dd($_POST);


$batch_id = $obj->batch_id;

Utility::redirect("studentCreate.php?id=$batch_id");