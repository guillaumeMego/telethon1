<?php 

require_once ROOT . '/model/stands.model.php';

if(isset($_POST['name'], $_POST['place'], $_POST['various'])) {
    if(!empty($_POST['name']) && !empty($_POST['place'])) {
        $name = htmlspecialchars($_POST['name']);
        $place = htmlspecialchars($_POST['place']);
        $various = htmlspecialchars($_POST['various']);
        

        if(stands_add($pdo, $name, $place, $various)) {
            $_SESSION['msg'] = [
                'css' => 'success',
                'txt' => 'Stand ajouté'
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
} require_once ROOT . '/view/stands/stands.create.view.php';


?>