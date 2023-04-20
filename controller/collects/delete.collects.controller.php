<?php 

require_once ROOT . '/model/collects.model.php';

if(collects_delete($pdo, $_GET['id'])){
    $_SESSION['msg'] = [
        'css' => 'success',
        'txt' => 'Collecte supprimé'
    ];
    header('Location: index.php?controller=collects&action=read');
    exit;
} else {
    $_SESSION['msg'] = [
        'css' => 'danger',
        'txt' => 'Une erreur est survenue'
    ];
}

require_once ROOT . '/view/collects/collects.read.view.php';
?>