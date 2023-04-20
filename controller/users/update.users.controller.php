<?php 

require_once ROOT . '/model/users.model.php';

if(isset($_POST['name'], $_POST['first_name'], $_POST['mail'], $_POST['password'])){
    if(!empty($_POST['name']) && !empty($_POST['first_name']) && !empty($_POST['mail'])){
        if (isset($_POST['is_admin'])) {
            $is_admin = '1';
        }
        else{
            $is_admin = '0';
        }
        $data = [
            'name' => htmlspecialchars($_POST['name']),
            'first_name' => htmlspecialchars($_POST['first_name']),
            'mail' => htmlspecialchars($_POST['mail']),
            'password' => htmlspecialchars($_POST['password']),
            'is_admin' => htmlspecialchars($is_admin),
            'various' => htmlspecialchars($_POST['various']),
            'picture' => htmlspecialchars($_POST['picture'])
        ];
        if(users_update($pdo, $data, $_GET['id'])){
            $_SESSION['msg'] = [
                'css' => 'success',
                'txt' => 'Utilisateur modifié'
            ];
            header('Location: index.php?controller=users&action=read');
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


$users = users_fetchById($pdo, $_GET['id']);


require_once ROOT . '/view/users/users.update.view.php';
?>