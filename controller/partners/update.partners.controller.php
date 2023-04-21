<?php 
require_once ROOT . '/model/partners.model.php';
require_once ROOT . '/model/partnerships.model.php';
require_once ROOT . '/model/users.model.php';

$partners = partners_fetchById($pdo , $_GET['id']);
$partnerships = partnerships_fetchAlllist($pdo);

if(isset($_POST['mail'], $_POST['responsible_name'], $_POST['responsible_first_name'], $_POST['phone'], $_POST['social_reason'], $_POST['id_partnership'])){
    

    if(!empty($_POST['mail']) && empty($_FILES['logo']['name'])){
        $data = [
            'mail' => htmlspecialchars($_POST['mail']),
            'responsible_name' => htmlspecialchars($_POST['responsible_name']),
            'responsible_first_name' => htmlspecialchars($_POST['responsible_first_name']),
            'phone' => htmlspecialchars($_POST['phone']),
            'social_reason' => htmlspecialchars($_POST['social_reason']),
            'id_partnership' => htmlspecialchars($_POST['id_partnership'])
        ];
        if(filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)){
            if(!check_email_partners_exists($pdo, $_POST['mail'])){
                if(partners_update($pdo, $data, $_GET['id'])){
                    $_SESSION['msg'] = [ 
                        'css' => 'success',
                        'txt' => 'Partenaire modifié'
                    ];
                    header('Location: index.php?controller=partners&action=update&id='.$_GET['id']);
                    exit();
                }else{
                    $_SESSION['msg'] = [ 
                        'css' => 'danger',
                        'txt' => 'Erreur lors de la modification du partenaire'
                    ];
                    header('Location: index.php?controller=partners&action=update&id='.$_GET['id']);
                    exit();
                }
            }else{
                $_SESSION['msg'] = [ 
                    'css' => 'danger',
                    'txt' => 'Mail déjà utilisé'
                ];
                header('Location: index.php?controller=partners&action=update&id='.$_GET['id']);
                exit();
            }
        }

    }else{
        $_SESSION['msg'] = [ 
            'css' => 'danger',
            'txt' => 'Veuillez remplir le mail'
        ];
    }
    if(!empty($_FILES['logo'])){
        $data = [
            'mail' => htmlspecialchars($_POST['mail']),
            'responsible_name' => htmlspecialchars($_POST['responsible_name']),
            'responsible_first_name' => htmlspecialchars($_POST['responsible_first_name']),
            'phone' => htmlspecialchars($_POST['phone']),
            'social_reason' => htmlspecialchars($_POST['social_reason']),
            'id_partnership' => htmlspecialchars($_POST['id_partnership']),
            'logo' => $_FILES['logo']['name']
        ];
    
        if(!empty($_POST['mail'])){
            if(filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)){
                if(!check_email_partners_exists($pdo, $_POST['mail'])){
                    if(partners_update($pdo, $data, $_GET['id'])){
                        $_SESSION['msg'] = [ 
                            'css' => 'success',
                            'txt' => 'Partenaire modifié'
                        ];
                        header('Location: index.php?controller=partners&action=update&id='.$_GET['id']);
                        exit();
                    }else{
                        $_SESSION['msg'] = [ 
                            'css' => 'danger',
                            'txt' => 'Erreur lors de la modification du partenaire'
                        ];
                        header('Location: index.php?controller=partners&action=update&id='.$_GET['id']);
                        exit();
                    }
                }else{
                    $_SESSION['msg'] = [ 
                        'css' => 'danger',
                        'txt' => 'Mail déjà utilisé'
                    ];
                    header('Location: index.php?controller=partners&action=update&id='.$_GET['id']);
                    exit();
                }
            }
    
        }else{
            $_SESSION['msg'] = [ 
                'css' => 'danger',
                'txt' => 'Veuillez remplir le mail'
            ];
        }
    }
}
   


require_once ROOT . '/view/partners/partners.update.view.php';
?>