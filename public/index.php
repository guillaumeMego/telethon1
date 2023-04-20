<?php
session_start();
require  'inc/config.php';
require_once ROOT . '/tools/tools.php';


    if (isset($_GET['controller'])) {
        switch ($_GET['controller']) {
            case 'users':
            case 'profil':
            case 'stands':
            case 'collects':
            case 'partners':
                $controller = $_GET['controller'];
                break;
            default:
                $controller = '404';
        }
    } else {
        $controller = 'collects';
    }
    if(!isset($_SESSION['profil']))
        {
            $controller = 'profil';
        }
    
require_once ROOT . '/controller/' . $controller . '/index.php';
