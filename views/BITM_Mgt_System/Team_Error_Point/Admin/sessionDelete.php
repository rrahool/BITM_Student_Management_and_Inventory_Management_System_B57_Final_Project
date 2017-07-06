<?php

if(isset($_SERVER['HTTP_REFERER']))
    $path = $_SERVER['HTTP_REFERER'];

require_once "../../../../vendor/autoload.php";

use App\Admin\Session;
use App\Utility\Utility;

$obj = new Session();

$obj->setData($_GET);

$obj->delete();

Utility::redirect($path);