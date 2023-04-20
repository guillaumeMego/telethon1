<?php 

require_once ROOT . '/model/collects.model.php';
require_once ROOT . '/model/stands.model.php';
require_once ROOT . '/model/partners.model.php';

$collect = collects_fetchById($pdo , $_GET['id']);
$stands = stands_fetchAlllist($pdo);
$partners = partners_fetchAlllist($pdo);
$standId = stands_fetchById($pdo, $collect['id_stand']);
$partnerId = stands_fetchById($pdo, $collect['id_stand']);


if(isset($_POST['collect_money'], $_POST['date_collect'], $_POST['id_partner'], $_POST['id_stand'])){
    if(!empty($_POST['collect_money']) && ($_POST['id_partner']) && !empty($_POST['date_collect']) && !empty($_POST['id_stand'])){
        
        $data = [
            'collect_money' => htmlspecialchars($_POST['collect_money']),
            'date_collect' => $_POST['date_collect'],
            'id_partner' => htmlspecialchars($_POST['id_partner']),
            'id_stand' => htmlspecialchars($_POST['id_stand'])
            
        ];
        if(collects_update($pdo, $data, $_GET['id'])){
            $_SESSION['msg'] = [
                'css' => 'success',
                'txt' => 'Collecte modifié'
            ];
            header('Location: index.php?controller=collects&action=read');
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





require_once ROOT . '/view/collects/collects.update.view.php';
?>