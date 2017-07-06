<?php

require_once "../../../vendor/autoload.php";

use App\City\City;
use App\Utility\Utility;

$obj = new City();

$obj->setData($_GET);

$obj->trash();

Utility::redirect("courseTrashed.php");