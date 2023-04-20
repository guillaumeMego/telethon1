<?php


if (isset($_GET['action'])){
    switch ($_GET['action']) {
        case 'read':
        case 'create':
        case 'update':
        case 'delete':
        case 'auth':
            $action = $_GET['action'];
            break;
        default:
            $action = ROOT . 'controller/404/index.php';
    }
}
else {
    $action = 'read';
}

require_once __DIR__ . '/' . $action . '.users.controller.php';


