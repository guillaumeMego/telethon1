<?php 

if (isset($_GET['action'])){
    switch ($_GET['action']) {
        case 'logout':
        case 'auth':
            $action = $_GET['action'];
            break;
        default:
            $action = ROOT . 'controller/404/index.php';
    }
}
else {
    $action = 'auth';
}

require_once __DIR__ . '/' . $action . '.profil.controller.php';

