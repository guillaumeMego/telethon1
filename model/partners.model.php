<?php

require __DIR__ . '/pdo.php';

/**
 * liste les partenaires
 *
 * @param PDO $pdo
 * @return void
 */
function partners_fetchAlllistinit(PDO $pdo){
    $sql = 'SELECT * FROM partners';
    $q = $pdo->query($sql);
    return $q->fetchAll(PDO::FETCH_ASSOC);
}

function partners_fetchAlllist(PDO $pdo){
    $sql = 'SELECT partners.*, partnerships.partnership_user FROM partners INNER JOIN partnerships ON partners.id_partnership = partnerships.id_partnership';
    $q = $pdo->query($sql);
    return $q->fetchAll(PDO::FETCH_ASSOC);
}


/**
 * trouve un partenaires avec son id
 *
 * @param PDO $pdo
 * @param integer $id_partners
 * @return void
 */
function partners_fetchById(PDO $pdo, int $id_partners){
    $sql = 'SELECT * FROM partners WHERE partners.id_partner = ?';
    $q = $pdo->prepare($sql);
    $q->execute([$id_partners]);
    return $q->fetch(PDO::FETCH_ASSOC);
}


/**
 * ajoute un partenaire
 *
 * @param PDO $pdo
 * @param string $responsible_name
 * @param string $responsible_first_name
 * @param string $mail
 * @param string $social_reason
 * @param string $phone
 * @param string $logo
 * @param string $id_partnership
 * @return void
 */
function partners_add(PDO $pdo, string $responsible_name, string $responsible_first_name, string $mail, string $social_reason, string $phone, string $logo, string $id_partnership){
    $sql = 'INSERT INTO `partners` (`responsible_name`, `responsible_first_name`, `mail`, `social_reason`, `phone`, `logo`, `create_at`, `update_at`, `id_partnership`)
    VALUES(:responsible_name, :responsible_first_name, :mail, :social_reason, :phone, :logo, current_timestamp(), current_timestamp(), :id_partnership)';
    $q = $pdo->prepare($sql);
    $q->bindValue(':responsible_name', $responsible_name);
    $q->bindValue(':responsible_first_name', $responsible_first_name);
    $q->bindValue(':mail', $mail);
    $q->bindValue(':social_reason', $social_reason);
    $q->bindValue(':phone', $phone);
    $q->bindValue(':logo', $logo);
    $q->bindValue(':id_partnership', $id_partnership);
    return $q->execute();
}


/**
 * met a jour un parteniare grace a son id
 *
 * @param PDO $pdo
 * @param array $data
 * @param integer $id_partner
 * @return void
 */
function partners_update(PDO $pdo, array $data, int $id_partner){
    $sql = 'UPDATE partners SET ';
    foreach($data as $key=>$value){
        $sql .= $key . ' = \'' . $value . '\', ';
    }
    $sql = substr($sql, 0, -2);
    $sql .=' WHERE id_partner = ' . $id_partner;
    $q = $pdo->prepare($sql);
    return $q->execute();
}


/**
 * supprime un parteraire avec son id
 *
 * @param PDO $pdo
 * @param integer $id_partner
 * @return void
 */
function partners_delete(PDO $pdo, int $id_partner){
    $sql = 'DELETE FROM partners WHERE id_partner = ?';
    $q = $pdo->prepare($sql);
    return $q->execute([$id_partner]);
}