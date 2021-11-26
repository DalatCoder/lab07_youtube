<?php

$controller_name = $_GET['controller'];
$action_name = $_GET['action'];

if (!$controller_name || !$action_name) {
    $controller_name = $_REQUEST['controller'];
    $action_name = $_REQUEST['action'];
}

if (!$controller_name || !$action_name) {
    die('Không có controller và phương thức');
}

include __DIR__ . "/controllers/$controller_name.php";

$controller = new $controller_name();
$controller->$action_name();
