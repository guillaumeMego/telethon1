<?php 
require_once ROOT . '/model/users.model.php';

if(isset($_POST['mail'], $_POST['password'])){
    if(!empty($_POST['mail']) && !empty($_POST['password'])){
        $hash = users_get_password($pdo, $_POST['mail']);
        if (is_string($hash)) {
            if (password_verify($_POST['password'], $hash)) {
                $_SESSION['profil'] = users_fetchAllByMail($pdo, $_POST['mail']);
                header('Location: index.php?controller=collects&action=read');
            } else {
                $_SESSION['msg'] = [
                    'css' => 'warning',
                    'txt' => 'Les identifiants ne correspondent pas'
                ];
            }
        }
    }else{
        $_SESSION['msg'] = [
            'css' => 'danger',
            'txt' => 'Veuillez remplir tous les champs'
        ];
    }
}



require_once ROOT . '/view/users/users.auth.view.php';
?>