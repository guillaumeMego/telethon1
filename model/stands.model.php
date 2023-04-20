<?php

require __DIR__ . '/pdo.php';

/**
 * liste les stands
 *
 * @param PDO $pdo
 * @return void
 */
function stands_fetchAlllistinit(PDO $pdo){
    $sql = 'SELECT * FROM stands';
    $q = $pdo->query($sql);
    return $q->fetchAll(PDO::FETCH_ASSOC);
}

function stands_fetchAlllist(PDO $pdo){
    $sql = 'SELECT * FROM stands';
    $q = $pdo->query($sql);
    return $q->fetchAll(PDO::FETCH_ASSOC);
}

', DATE_FORMAT(date_collect, "%d/%m/%Y") AS date_collect ';

/**
 * trouve un stand avec son id
 *
 * @param PDO $pdo
 * @param integer $id_stand
 * @return void
 */
function stands_fetchById(PDO $pdo, int $id_stand){
    $sql = 'SELECT * FROM stands WHERE stands.id_stand = ?';
    $q = $pdo->prepare($sql);
    $q->execute([$id_stand]);
    return $q->fetch(PDO::FETCH_ASSOC);
}


/**
 * ajoute un stand
 *
 * @param PDO $pdo
 * @param string $name
 * @param string $place
 * @param string $various
 * @return void
 */
function stands_add(PDO $pdo, string $name, string $place, string $various){
    $sql = 'INSERT INTO `stands` (`name`, `place`, `various`, `create_at`, `update_at`)
    VALUES(:name, :place, :various, current_timestamp(), current_timestamp())';
    $q = $pdo->prepare($sql);
    $q->bindValue(':name', $name);
    $q->bindValue(':place', $place);
    $q->bindValue(':various', $various);
    return $q->execute();
}


/**
 * met a jour le stand par rapport a son id
 *
 * @param PDO $pdo
 * @param array $data
 * @param integer $id_stand
 * @return void
 */
function stands_update(PDO $pdo, array $data, int $id_stand){
    $sql = 'UPDATE stands SET ';
    foreach($data as $key=>$value){
        $sql .= $key . ' = \'' . $value . '\', ';
    }
    $sql = substr($sql, 0, -2);
    $sql .=' WHERE id_stand = ' . $id_stand;
    $q = $pdo->prepare($sql);
    return $q->execute();
}


/**
 * supprime un stand avec un id
 *
 * @param PDO $pdo
 * @param integer $id_stand
 * @return void
 */
function stands_delete(PDO $pdo, int $id_stand){
    $sql = 'DELETE FROM stands WHERE id_stand = ?';
    $q = $pdo->prepare($sql);
    return $q->execute([$id_stand]);
}
