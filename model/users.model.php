<?php

require __DIR__ . '/pdo.php';

/**
 * liste les utilisateurs
 *
 * @param PDO $pdo
 * @return void
 */
function users_fetchAlllist(PDO $pdo){
    $sql = 'SELECT * FROM users';
    $q = $pdo->query($sql);
    return $q->fetchAll(PDO::FETCH_ASSOC);
}


/**
 * trouve un utilisateur avec son id
 *
 * @param PDO $pdo
 * @param integer $id_user
 * @return void
 */
function users_fetchById(PDO $pdo, int $id_user){
    $sql = 'SELECT * FROM users WHERE users.id_user = ?';
    $q = $pdo->prepare($sql);
    $q->execute([$id_user]);
    return $q->fetch(PDO::FETCH_ASSOC);
}


/**
 * recupere tout d'un utilisateur avec son mail
 *
 * @param PDO $pdo
 * @param string $mail
 * @return void
 */
function users_fetchAllByMail(PDO $pdo, string $mail){
    $sql = 'SELECT id_user, name, first_name, mail, is_admin, various, picture FROM users WHERE mail = ?';
    $q = $pdo->prepare($sql);
    $q->execute([$mail]);
    return $q->fetch(PDO::FETCH_ASSOC);
}


/**
 * recuperre le mot de passe de l'utilisateur avec son mail
 *
 * @param PDO $pdo
 * @param string $mail
 * @return void
 */
function users_get_password(PDO $pdo, string $mail){
    $sql = 'SELECT password FROM users WHERE mail = ?';
    $q = $pdo->prepare($sql);
    $q->execute([$mail]);
    return $q->fetchColumn();
}


/**
 * ajoute un utilisateur
 *
 * @param PDO $pdo
 * @param string $name
 * @param string $first_name
 * @param string $mail
 * @param string $password
 * @param integer $is_admin
 * @param string $various
 * @param string $picture
 * @return void
 */
function users_add(PDO $pdo, string $name, string $first_name, string $mail, string $password, int $is_admin, string $various, string $picture){
    $sql = 'INSERT INTO `users` (`name`, `first_name`, `mail`, `password`, `is_admin`, `various`, `picture`, `create_at`, `update_at`)
    VALUES(:name, :first_name, :mail, :password, :is_admin, :various, :picture, current_timestamp(), current_timestamp())';
    $q = $pdo->prepare($sql);
    $q->bindValue(':name', $name);
    $q->bindValue(':first_name', $first_name);
    $q->bindValue(':mail', $mail);
    $q->bindValue(':password', $password);
    $q->bindValue(':is_admin', $is_admin);
    $q->bindValue(':various', $various);
    $q->bindValue(':picture', $picture);
    return $q->execute();
}


/**
 * met a jour l'utilisateur par rapport a son id
 *
 * @param PDO $pdo
 * @param array $data
 * @param integer $id_user
 * @return void
 */
function users_update(PDO $pdo, array $data, int $id_user){
    $sql = 'UPDATE users SET ';
    foreach($data as $key=>$value){
        $sql .= $key . ' = \'' . $value . '\', ';
    }
    $sql = substr($sql, 0, -2);
    $sql .=' WHERE id_user = ' . $id_user;
    $q = $pdo->prepare($sql);
    return $q->execute();
}


function users_update_name(PDO $pdo, string $name){
    $sql = 'INSERT INTO `users` (`name`, `update_at`)
    VALUES(:name, current_timestamp())';
    $q = $pdo->prepare($sql);
    $q->bindValue(':name', $name);
    return $q->execute();
}

function users_update_first_name(PDO $pdo, string $first_name){
    $sql = 'INSERT INTO `users` (`first_name`, `update_at`)
    VALUES(:first_name, current_timestamp())';
    $q = $pdo->prepare($sql);
    $q->bindValue(':first_name', $first_name);
    return $q->execute();
}



/**
 * supprime un utilisateur avec l'id
 *
 * @param PDO $pdo
 * @param integer $id_user
 * @return void
 */
function users_delete(PDO $pdo, int $id_user){
    $sql = 'DELETE FROM users WHERE id_user = ?';
    $q = $pdo->prepare($sql);
    return $q->execute([$id_user]);
}

/**
 * Verification de l'image
 *
 * @param PDO $pdo
 * @param string $mail
 * @return void
 */
function imageUpload($image)
    {
        $tailleMax = 2097152;
        $extensionsValides = array('jpg', 'jpeg', 'gif', 'png');
        if ($image['size'] <= $tailleMax) {
            $extensionUpload = strtolower(substr(strrchr($image['name'], '.'), 1));
            if (in_array($extensionUpload, $extensionsValides)) {
                $chemin = "public/asset/img/article/" . $image['name'];
                $resultat = move_uploaded_file($image['tmp_name'], $chemin);
                if ($resultat) {
                    return $chemin;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }