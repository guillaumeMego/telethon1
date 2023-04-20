<?php 

require_once ROOT . '/model/stands.model.php';

$stands = stands_fetchAlllist($pdo);

require_once ROOT . '/view/stands/stands.read.view.php';
?>