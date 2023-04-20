<?php 

require_once ROOT . '/model/partners.model.php';

$partners = partners_fetchAlllist($pdo);

require_once ROOT . '/view/partners/partners.read.view.php';
?>