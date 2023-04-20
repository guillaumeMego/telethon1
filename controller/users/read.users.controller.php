<?php 

require_once ROOT . '/model/users.model.php';

$users = users_fetchAlllist($pdo);

require_once ROOT . '/view/users/users.read.view.php';
?>