<?php
require_once "../../../../vendor/autoload.php";

use App\Utility\Utility;
use App\Admin\Session;

$obj = new Session();

$obj->setData($_POST);

$obj->store();

//Utility::dd($_POST);

$batch_id = $obj->batch_id;

Utility::redirect("sessionIndex.php?id=$batch_id");