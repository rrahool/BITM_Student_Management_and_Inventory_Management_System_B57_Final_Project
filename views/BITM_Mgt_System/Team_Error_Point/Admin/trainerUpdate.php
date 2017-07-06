<?php

require_once "../../../../vendor/autoload.php";

use App\Admin\Trainer;
use App\Utility\Utility;

$obj = new Trainer();

$obj->setData($_POST);

$obj->update();

//Utility::dd($_POST);

Utility::redirect("trainerIndex.php");