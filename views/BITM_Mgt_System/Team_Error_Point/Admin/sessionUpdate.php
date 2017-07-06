<?php

require_once "../../../../vendor/autoload.php";

use App\Admin\Session;
use App\Utility\Utility;

$obj = new Session();

$obj->setData($_POST);

$obj->update();

//Utility::dd($_POST);


$batch_id = $obj->batch_id;

Utility::redirect("sessionIndex.php?id=$batch_id");