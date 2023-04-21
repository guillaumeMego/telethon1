<?php 

require_once ROOT . '/model/partners.model.php';
require_once ROOT . '/model/partnerships.model.php';

$partners = partnerships_fetchAlllist($pdo);

if(isset($_POST['mail'], $_POST['id_partnership'])) {
    if(!empty($_POST['mail']) && !empty($_POST['id_partnership'])) {
        $responsible_name = htmlspecialchars($_POST['responsible_name']);
        $responsible_first_name = htmlspecialchars($_POST['responsible_first_name']);
        $mail = htmlspecialchars($_POST['mail']);
        $social_reason = htmlspecialchars($_POST['social_reason']);
        $phone = htmlspecialchars($_POST['phone']);
        $logo = $_FILES['logo']['name'];
        $id_partnership = htmlspecialchars($_POST['id_partnership']);

        if(partners_add($pdo, $responsible_name, $responsible_first_name, $mail, $social_reason, $phone, $logo, $id_partnership)) {
            $_SESSION['msg'] = [
                'css' => 'success',
                'txt' => 'Partenaire ajouté'
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
} 
require_once ROOT . '/view/partners/partners.create.view.php';


?>