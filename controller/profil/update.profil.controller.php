<?php 
require_once ROOT . '/model/users.model.php';

if(isset($_POST['name'], $_POST['first_name'], $_POST['mail'], $_POST['password'])){
    if(!empty($_POST['name']) && !empty($_POST['first_name']) && !empty($_POST['mail']) && !empty($_POST['picture'])){
        
        $data = [
            'name' => htmlspecialchars($_POST['name']),
            'first_name' => htmlspecialchars($_POST['first_name']),
            'mail' => htmlspecialchars($_POST['mail']),
            'password' => htmlspecialchars($_POST['password']),
            'various' => htmlspecialchars($_POST['various']),
            'picture' => htmlspecialchars($_POST['picture'])
        ];
        if(users_update($pdo, $data, $_GET['id'])){
            $_SESSION['msg'] = [
                'css' => 'success',
                'txt' => 'Votre profil a été modifié'
            ];
            $_SESSION['profil'] = users_fetchAllByMail($pdo, $_POST['mail']);
            header('Location: index.php?controller=profil&action=update');
            exit;
        } else {
            $_SESSION['msg'] = [
                'css' => 'danger',
                'txt' => 'Une erreur est survenue'
            ];
        }
    }else{
        $_SESSION['msg'] = [
            'css' => 'danger',
            'txt' => 'Veuillez remplir tous les champs'
        ];
    }

    if(!empty($_POST['name']) && !empty($_POST['first_name']) && !empty($_POST['mail'])){
        
        $data = [
            'name' => htmlspecialchars($_POST['name']),
            'first_name' => htmlspecialchars($_POST['first_name']),
            'mail' => htmlspecialchars($_POST['mail']),
            'password' => htmlspecialchars($_POST['password']),
            'various' => htmlspecialchars($_POST['various']),
        ];
        if(users_update($pdo, $data, $_GET['id'])){
            $_SESSION['msg'] = [
                'css' => 'success',
                'txt' => 'Votre profil a été modifié'
            ];
            $_SESSION['profil'] = users_fetchAllByMail($pdo, $_POST['mail']);
            header('Location: index.php?controller=profil&action=update');
            exit;
        } else {
            $_SESSION['msg'] = [
                'css' => 'danger',
                'txt' => 'Une erreur est survenue'
            ];
        }
    }else{
        $_SESSION['msg'] = [
            'css' => 'danger',
            'txt' => 'Veuillez remplir tous les champs'
        ];
    }

}



require_once ROOT . '/view/profils/profils.update.view.php';
?>