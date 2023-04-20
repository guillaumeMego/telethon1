<?php

require __DIR__ . '/pdo.php';

/**
 * liste les collects
 *
 * @param PDO $pdo
 * @return void
 */
function collects_fetchAlllist(PDO $pdo){
    $sql = 'SELECT * FROM collects';
    $q = $pdo->query($sql);
    return $q->fetchAll(PDO::FETCH_ASSOC);
}

function collects_fetchAlllistTest(PDO $pdo){
    $sql = 'SELECT collects.*, stands.name, DATE_FORMAT(date_collect, "%d/%m/%Y") AS date_collect FROM collects INNER JOIN stands ON collects.id_stand = stands.id_stand';
    $q = $pdo->query($sql);
    return $q->fetchAll(PDO::FETCH_ASSOC);
}

/**
 * liste  le nom du stand associe a la collect
 *
 * @param PDO $pdo
 * @return void
 */
function collects_namestandlist(PDO $pdo){
    $sql = 'SELECT name FROM stands
        INNER JOIN collects on collects.id_stand = stands.id_stand 
        IN (SELECT collects.id_stand FROM collects)';
    $q = $pdo->query($sql);
    return $q->fetchAll(PDO::FETCH_ASSOC);
}

/**
 * retourne le nom du stand associe a la collect
 *
 * @param PDO $pdo
 * @param integer $id_stand
 * @return void
 */
function collects_namestand(PDO $pdo, int $id_stand){
    $sql = 'SELECT name FROM stands
    INNER JOIN collects on collects.id_stand = stands.id_stand 
    IN (SELECT collects.id_stand FROM collects WHERE collects.id_stand = ' . $id_stand . ')';
    $q = $pdo->prepare($sql);
    $q->execute([$id_stand]);
    return $q->fetch(PDO::FETCH_ASSOC);
}

'SELECT name FROM stands
    INNER JOIN collects on stands.id_stand = collects.id_stand WHERE id_stand = ?';

/**
 * trouve une collecte avec son id
 *
 * @param PDO $pdo
 * @param integer $id_collect
 * @return void
 */
function collects_fetchById(PDO $pdo, int $id_collect){
    $sql = 'SELECT * FROM collects WHERE collects.id_collect = ?';
    $q = $pdo->prepare($sql);
    $q->execute([$id_collect]);
    return $q->fetch(PDO::FETCH_ASSOC);
}


/**
 * Undocumented function
 *
 * @param PDO $pdo
 * @param [type] $collect_money
 * @param [type] $date_collect
 * @param [type] $id_partner
 * @param [type] $id_stand
 * @return void
 */
function collects_add(PDO $pdo,  $collect_money, $date_collect, $id_partner, $id_stand){
    $sql = "INSERT INTO `collects`(`collect_money`, `date_collect`, `create_at`, `id_partner`, `id_stand`) 
    VALUES (:collect_money, :date_collect, current_timestamp(), :id_partner, :id_stand)";
    $q = $pdo->prepare($sql);
    $q->bindValue(':collect_money', $collect_money);
    $q->bindValue(':date_collect', $date_collect);
    $q->bindValue(':id_partner', $id_partner);
    $q->bindValue(':id_stand', $id_stand);
    return $q->execute();
}


/**
 * met a jour une collecte par rapport a son id
 *
 * @param PDO $pdo
 * @param array $data
 * @param integer $id_collect
 * @return void
 */
function collects_update(PDO $pdo, array $data, int $id_collect){
    $sql = 'UPDATE collects SET ';
    foreach($data as $key=>$value){
        $sql .= $key . ' = \'' . $value . '\', ';
    }
    $sql = substr($sql, 0, -2);
    //$sql .= " 'update_at' = current_timestamp()";
    $sql .=' WHERE id_collect = ' . $id_collect;
    var_dump($sql);
    $q = $pdo->prepare($sql);
    return $q->execute();
}


/**
 * supprime une collecte avec son id
 *
 * @param PDO $pdo
 * @param integer $id_collect
 * @return void
 */
function collects_delete(PDO $pdo, int $id_collect){
    $sql = 'DELETE FROM collects WHERE id_collect = ?';
    $q = $pdo->prepare($sql);
    return $q->execute([$id_collect]);
}
