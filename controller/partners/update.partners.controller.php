<?php 
require_once ROOT . '/model/partners.model.php';
require_once ROOT . '/model/partnerships.model.php';

$partners = partners_fetchById($pdo , $_GET['id']);
$partnerships = partnerships_fetchAlllist($pdo);

if(isset($_POST['name'], $_POST['first_name'], $_POST['mail'], $_POST['password'])){
    $success = false;
    if(!empty($_POST['mail'])&& !empty($_POST['id_partnership'])){
        $mail = htmlspecialchars($_POST['mail']);
        // mail valide
        if(filter_var($mail, FILTER_VALIDATE_EMAIL)){
            if(!check_email_exists($pdo, $mail)){
                if(users_update_mail($pdo, $mail, $_SESSION['profil']['id_user'])){
                    $success = true;
                } else {
                    $success = false;
                }
            } else {
                $_SESSION['msg'] = [
                    'css' => 'danger',
                    'txt' => 'Adresse mail déjà utilisée'
                ];
                header('Location: index.php?controller=profil&action=update');
                exit();
            }
        } else {
            $_SESSION['msg'] = [
                'css' => 'danger',
                'txt' => 'Adresse mail invalide'
            ];
            header('Location: index.php?controller=profil&action=update');
            exit();
        }
        
    }
    if(!empty($_POST['name'])){
        $name = htmlspecialchars($_POST['name']);
        if(users_update_name($pdo, $name, $_SESSION['profil']['id_user'])){
           $success = true;
            
        } else {
           $success = false;
        }
    }
    if(!empty($_POST['first_name'])){
        $first_name = htmlspecialchars($_POST['first_name']);
        if(users_update_first_name($pdo, $first_name, $_SESSION['profil']['id_user'])){
           $success = true;
            
        } else {
           $success = false;
        }
    }
    if(!empty($_POST['password'])){
        $password = htmlspecialchars($_POST['password']);
        $password = password_hash($password, PASSWORD_DEFAULT);
        if(users_update_password($pdo, $password, $_SESSION['profil']['id_user'])){
           $success = true;
            
        } else {
           $success = false;
        }
    }
    if(!empty($_POST['various'])){
        $various = htmlspecialchars($_POST['various']);
        if(users_update_various($pdo, $various, $_SESSION['profil']['id_user'])){
           $success = true;
            
        } else {
           $success = false;
        }
    }
    if(!empty($_POST['picture'])){
        $picture = htmlspecialchars($_POST['picture']);
        if(users_update_picture($pdo, $picture, $_SESSION['profil']['id_user'])){
           $success = true;
            
        } else {
           $success = false;
        }
    }
    if($success){
        $_SESSION['msg'] = [
            'css' => 'success',
            'txt' => 'Utilisateur modifié'
        ];
        $_SESSION['profil'] = users_fetchById($pdo, $_SESSION['profil']['id_user']);
        header('Location: index.php?controller=profil&action=update');
        exit;
    } else {
        $_SESSION['msg'] = [
            'css' => 'danger',
            'txt' => 'Une erreur est survenue'
        ];
    }


}

require_once ROOT . '/view/partners/partners.update.view.php';
?>