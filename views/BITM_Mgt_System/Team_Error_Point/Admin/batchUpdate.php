<?php

require_once "../../../../vendor/autoload.php";

use App\Admin\Batch;
use App\Utility\Utility;

$obj = new Batch();

$obj->setData($_POST);

$obj->update();

//Utility::dd($_POST);

$course_id = $obj->course_id;

Utility::redirect("batchIndex.php?id=$course_id");