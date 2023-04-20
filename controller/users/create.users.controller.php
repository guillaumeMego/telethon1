<?php 

require_once ROOT . '/model/users.model.php';

if(isset($_POST['name'], $_POST['first_name'], $_POST['mail'], $_POST['password'])) {
    if(!empty($_POST['name']) && !empty($_POST['first_name']) && !empty($_POST['mail']) && !empty($_POST['password'])) {
        $name = htmlspecialchars($_POST['name']);
        $first_name = htmlspecialchars($_POST['first_name']);
        $email = htmlspecialchars($_POST['mail']);
        $password = htmlspecialchars($_POST['password']);
        $password = password_hash($password, PASSWORD_DEFAULT);
        //$is_admin = htmlspecialchars($_POST['is_admin']);
        if (isset($_POST['is_admin'])) {
            $is_admin = '1';
        }
        else{
            $is_admin = '0';
        }
        $various = htmlspecialchars($_POST['various']);
        $picture = htmlspecialchars($_POST['picture']);

        if(users_add($pdo, $name, $first_name, $email, $password, (int)$is_admin, $various, $picture)) {
            $_SESSION['msg'] = [
                'css' => 'success',
                'txt' => 'Utilisateur ajouté'
            ];
            
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
} require_once ROOT . '/view/users/users.create.view.php';


?>