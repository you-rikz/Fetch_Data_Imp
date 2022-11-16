<?php

include "vendor/autoload.php";
// include "config/config.php";

use Models\Student;

$connObj = new MongoDB\Client;
$connection = $connObj->local->students;

$mustache = new Mustache_Engine([
	'loader' => new Mustache_Loader_FilesystemLoader(dirname(__FILE__) . '/templates')
]);