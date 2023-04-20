<?php 

require_once ROOT . '/model/collects.model.php';


/* $collects = collects_fetchAlllist($pdo); */
$collects = collects_fetchAlllistTest($pdo);






require_once ROOT . '/view/collects/collects.read.view.php';
?>