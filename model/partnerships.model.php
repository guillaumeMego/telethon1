<?php


require __DIR__ . '/pdo.php';

/**
 * liste les partenariats
 *
 * @param PDO $pdo
 * @return void
 */
function partnerships_fetchAlllist(PDO $pdo){
    $sql = 'SELECT * FROM partnerships';
    $q = $pdo->query($sql);
    return $q->fetchAll(PDO::FETCH_ASSOC);
}


/**
 * trouve un partenariat avec son id
 *
 * @param PDO $pdo
 * @param integer $id_partnership
 * @return void
 */
function partnerships_fetchById(PDO $pdo, int $id_partnership){
    $sql = 'SELECT * FROM partnership WHERE partnership.id_partnership = ?';
    $q = $pdo->prepare($sql);
    $q->execute([$id_partnership]);
    return $q->fetch(PDO::FETCH_ASSOC);
}