<?php
require_once "../../../../vendor/autoload.php";

use App\Utility\Utility;
use App\Admin\Trainer;

$obj = new Trainer();

$obj->setData($_POST);

$obj->store();

//Utility::dd($_POST);

Utility::redirect("trainerIndex.php");