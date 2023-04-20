<?php 

require_once ROOT . '/model/stands.model.php';

if(isset($_POST['name'], $_POST['place'], $_POST['various'])){
    if(!empty($_POST['name']) && !empty($_POST['place'])){
        
        $data = [
            'name' => htmlspecialchars($_POST['name']),
            'place' => htmlspecialchars($_POST['place']),
            'various' => htmlspecialchars($_POST['various'])
            
        ];
        if(stands_update($pdo, $data, $_GET['id'])){
            $_SESSION['msg'] = [
                'css' => 'success',
                'txt' => 'Stand modifié'
            ];
            header('Location: index.php?controller=stands&action=read');
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


$stands = stands_fetchById($pdo, $_GET['id']);


require_once ROOT . '/view/stands/stands.update.view.php';
?>