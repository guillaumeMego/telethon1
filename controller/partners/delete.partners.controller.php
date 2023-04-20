<?php 

require_once ROOT . '/model/partners.model.php';

if(partners_delete($pdo, $_GET['id'])){
    $_SESSION['msg'] = [
        'css' => 'success',
        'txt' => 'Partenaire supprimé'
    ];
    header('Location: index.php?controller=partners&action=read');
    exit;
} else {
    $_SESSION['msg'] = [
        'css' => 'danger',
        'txt' => 'Une erreur est survenue'
    ];
}

require_once ROOT . '/view/partners/partners.read.view.php';
?>