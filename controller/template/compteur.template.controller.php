<?php 

require_once ROOT . '/model/compteur.model.php';


$compteur = compteur_sum($pdo);






require_once ROOT . '/view/template/template.view.php';
?>