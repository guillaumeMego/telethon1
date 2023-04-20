<?php 

require_once ROOT . '/model/collects.model.php';
require_once ROOT . '/model/stands.model.php';
require_once ROOT . '/model/partners.model.php';

$collect = collects_fetchById($pdo , $_GET['id']);
$stands = stands_fetchAlllist($pdo);
$partners = partners_fetchAlllist($pdo);


if(isset($_POST['collect_money'], $_POST['date_collect'], $_POST['various'])){
    if(!empty($_POST['collect_money']) && ($_POST['place']) && !empty($_POST['date_collect']) && !empty($_POST['various'])){
        
        $data = [
            'collect_money' => htmlspecialchars($_POST['collect_money']),
            'date_collect' => htmlspecialchars($_POST['date_collect']),
            'id_partner' => htmlspecialchars($_POST['id_partner']),
            'id_stand' => htmlspecialchars($_POST['id_partner'])
            
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