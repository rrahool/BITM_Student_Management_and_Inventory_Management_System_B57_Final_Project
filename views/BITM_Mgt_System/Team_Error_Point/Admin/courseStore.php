<?php
require_once "../../../../vendor/autoload.php";

use App\Utility\Utility;
use App\Admin\Course;

$obj = new Course();

$obj->setData($_POST);

$obj->store();

//Utility::dd($_POST);

Utility::redirect("courseCreate.php");