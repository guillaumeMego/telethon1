<?php 

require_once ROOT . '/model/users.model.php';

if(users_delete($pdo, $_GET['id'])){
    $_SESSION['msg'] = [
        'css' => 'success',
        'txt' => 'Utilisateur supprimé'
    ];
    header('Location: index.php?controller=users&action=read');
    exit;
} else {
    $_SESSION['msg'] = [
        'css' => 'danger',
        'txt' => 'Une erreur est survenue'
    ];
}

require_once ROOT . '/view/users/users.read.view.php';
?>