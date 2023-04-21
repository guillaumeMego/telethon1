<?php 

require_once ROOT . '/model/users.model.php';

if(isset($_POST['name'], $_POST['first_name'], $_POST['mail'], $_POST['password'])){
    $success = false;
    if(!empty($_POST['mail'])){
        $mail = htmlspecialchars($_POST['mail']);
        // mail valide
        if(filter_var($mail, FILTER_VALIDATE_EMAIL)){
            if(!check_email_exists($pdo, $mail)){
                if(users_update_mail($pdo, $mail, $_GET['id'])){
                    $success = true;
                } else {
                    $success = false;
                }
            } else {
                $_SESSION['msg'] = [
                    'css' => 'danger',
                    'txt' => 'Adresse mail déjà utilisée'
                ];
                header('Location: index.php?controller=users&action=update');
                exit();
            }
        } else {
            $_SESSION['msg'] = [
                'css' => 'danger',
                'txt' => 'Adresse mail invalide'
            ];
            header('Location: index.php?controller=users&action=update');
            exit();
        }
        
    }
    if(!empty($_POST['name'])){
        $name = htmlspecialchars($_POST['name']);
        if(users_update_name($pdo, $name, $_GET['id'])){
           $success = true;
            
        } else {
           $success = false;
        }
    }
    if(!empty($_POST['first_name'])){
        $first_name = htmlspecialchars($_POST['first_name']);
        if(users_update_first_name($pdo, $first_name, $_GET['id'])){
           $success = true;
            
        } else {
           $success = false;
        }
    }
    if(!empty($_POST['password'])){
        $password = htmlspecialchars($_POST['password']);
        $password = password_hash($password, PASSWORD_DEFAULT);
        if(users_update_password($pdo, $password, $_GET['id'])){
           $success = true;
            
        } else {
           $success = false;
        }
    }
    if(!empty($_POST['various'])){
        $various = htmlspecialchars($_POST['various']);
        if(users_update_various($pdo, $various, $_GET['id'])){
           $success = true;
            
        } else {
           $success = false;
        }
    }
    if(!empty($_POST['picture'])){
        $picture = $_FILES['picture'];
        if($picture = imageUpload($picture)){

        if(users_update_picture($pdo, $picture, $_GET['id'])){
           $success = true;
            
        } else {
           $success = false;
        }
    }
    }
    if($success){
        $_SESSION['msg'] = [
            'css' => 'success',
            'txt' => 'Utilisateur modifié'
        ];
        header('Location: index.php?controller=profil&action=update');
        exit;
    } else {
        $_SESSION['msg'] = [
            'css' => 'danger',
            'txt' => 'Une erreur est survenue'
        ];
    }


}



$users = users_fetchById($pdo, $_GET['id']);


require_once ROOT . '/view/users/users.update.view.php';
