<?php

require __DIR__ . '/pdo.php';

/**
 * liste les partenaires
 *
 * @param PDO $pdo
 * @return void
 */
function partners_fetchAlllist(PDO $pdo){
    $sql = 'SELECT * FROM partners';
    $q = $pdo->query($sql);
    return $q->fetchAll(PDO::FETCH_ASSOC);
}


/**
 * trouve un stand avec son id
 *
 * @param PDO $pdo
 * @param integer $id_partners
 * @return void
 */
function partners_fetchById(PDO $pdo, int $id_partners){
    $sql = 'SELECT * FROM partners WHERE partners.id_partners = ?';
    $q = $pdo->prepare($sql);
    $q->execute([$id_partners]);
    return $q->fetch(PDO::FETCH_ASSOC);
}



function partners_add(PDO $pdo, string $responsible_name, string $responsible_first_name, string $mail, string $social_reason, string $phone, string $logo){
    $sql = 'INSERT INTO `stands` (`responsible_name`, `responsible_first_name`, `mail`, `social_reason`, `phone`, `logo`, `create_at`, `update_at`)
    VALUES(:responsible_name, :responsible_first_name, :mail, :social_reason, phone, current_timestamp(), current_timestamp())';
    $q = $pdo->prepare($sql);
    $q->bindValue(':responsible_name', $responsible_name);
    $q->bindValue(':responsible_first_name', $responsible_first_name);
    $q->bindValue(':mail', $mail);
    $q->bindValue(':social_reason', $social_reason);
    $q->bindValue(':phone', $phone);
    return $q->execute();
}