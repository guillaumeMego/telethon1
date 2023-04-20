<?php 

require_once ROOT . '/model/stands.model.php';

if(stands_delete($pdo, $_GET['id'])){
    $_SESSION['msg'] = [
        'css' => 'success',
        'txt' => 'Stand supprimé'
    ];
    header('Location: index.php?controller=stands&action=read');
    exit;
} else {
    $_SESSION['msg'] = [
        'css' => 'danger',
        'txt' => 'Une erreur est survenue'
    ];
}

require_once ROOT . '/view/stands/stands.read.view.php';
?>