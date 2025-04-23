<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
ini_set('memory_limit', '1024M');
ini_set('max_execution_time', '90');
error_reporting(E_ERROR);

define('DS', DIRECTORY_SEPARATOR);
define('DIR_APP', __DIR__);
define('DIR_PROJECT', 'api');

if (file_exists('autoload.php')) {
    include 'autoload.php';
} else {
    echo 'Error to include bootstrap';
    exit;
}
