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