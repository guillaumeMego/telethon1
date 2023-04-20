<?php

require __DIR__ . '/pdo.php';

/**
 * somme compteur
 *
 * @param PDO $pdo
 * @return void
 */
function compteur_sum(PDO $pdo){
    $sql = 'SELECT SUM(collect_money) FROM collects';
    $q = $pdo->query($sql);
    return $q->fetch(PDO::FETCH_ASSOC);
}
