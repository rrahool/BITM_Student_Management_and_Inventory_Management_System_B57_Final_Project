<?php

require_once "../../../../vendor/autoload.php";

use App\Admin\Batch;
use App\Utility\Utility;

$obj = new Batch();

$obj->setData($_POST);

$obj->update();

//Utility::dd($_POST);

Utility::redirect("batchIndex.php");