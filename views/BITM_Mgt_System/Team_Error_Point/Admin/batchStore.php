<?php
require_once "../../../../vendor/autoload.php";

use App\Utility\Utility;
use App\Admin\Batch;

$obj = new Batch();

$obj->setData($_POST);

$obj->store();

$course_id = $obj->course_id;

Utility::redirect("batchIndex.php?id=$course_id");