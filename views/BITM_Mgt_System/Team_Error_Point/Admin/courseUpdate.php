<?php

require_once "../../../../vendor/autoload.php";

use App\Admin\Course;
use App\Utility\Utility;

$obj = new Course();

$obj->setData($_POST);

$obj->update();


Utility::redirect("courseCreate.php");