<?php 

require_once ROOT . '/model/collects.model.php';
require_once ROOT . '/model/partners.model.php';
require_once ROOT . '/model/stands.model.php';

$partners = partners_fetchAlllist($pdo);
$stands = stands_fetchAlllist($pdo);

if(isset($_POST['collect_money'], $_POST['date_collect'], $_POST['id_stand'])) {
    if(!empty($_POST['collect_money']) && !empty($_POST['date_collect']) && !empty($_POST['id_stand'])) {
        $collect_money = htmlspecialchars($_POST['collect_money']);
        $date_collect = htmlspecialchars($_POST['date_collect']);
        $id_stand = htmlspecialchars($_POST['id_stand']);
        $id_partner = $_POST['id_partner'];
        

        if(collects_add($pdo, $collect_money, $date_collect, $id_partner, $id_stand)) {
            $_SESSION['msg'] = [
                'css' => 'success',
                'txt' => 'Collecte ajouté'
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
} require_once ROOT . '/view/collects/collects.create.view.php';


?>