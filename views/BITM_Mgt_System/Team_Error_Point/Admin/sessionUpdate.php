<?php

require_once "../../../../vendor/autoload.php";

use App\Admin\Session;
use App\Utility\Utility;

$obj = new Session();

$obj->setData($_POST);

$obj->update();

//Utility::dd($_POST);

Utility::redirect("sessionIndex.php");