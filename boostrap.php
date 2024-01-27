<?php

$web_root = $_SERVER['HTTP_HOST'];

if (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
    $web_root = 'https://' . $_SERVER['HTTP_HOST'];
} else {
    $web_root = 'http://' . $_SERVER['HTTP_HOST'];
}

$web_root .= '/mvc_test_demo';
define('_WEB_ROOT', $web_root);

// config load
require_once 'config/database.php';
// core load
require_once 'core/Controller.php';
require_once 'core/Connection.php';
require_once 'core/Model.php';

require_once 'app/app.php';