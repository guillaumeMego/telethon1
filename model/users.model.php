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
 * verifie si l'utilisateur existe
 *
 * @param PDO $pdo
 * @param string $mail
 * @return void
 */
function check_email_exists(PDO $pdo, string $mail) {
    $sql = 'SELECT COUNT(*) as count FROM users WHERE mail = :mail';
    $q = $pdo->prepare($sql);
    $q->execute(['mail' => $mail]);
    $result = $q->fetch(PDO::FETCH_ASSOC);
    return $result['count'] > 0;
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
 * @param [type] $picture
 * @return void
 */
function users_add(PDO $pdo, string $name, string $first_name, string $mail, string $password, int $is_admin, string $various, $picture){
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


function users_update_name(PDO $pdo, string $name, string $id_user){
    $sql = 'UPDATE users SET `name` = :name, `update_at` = current_timestamp() WHERE id_user = :id_user';
    $q = $pdo->prepare($sql);
    $q->bindValue(':name', $name);
    $q->bindValue(':id_user', $id_user);
    return $q->execute();
}

function users_update_first_name(PDO $pdo, string $first_name, string $id_user){
    $sql = 'UPDATE users SET `first_name` = :first_name, `update_at` = current_timestamp() WHERE id_user = :id_user';
    $q = $pdo->prepare($sql);
    $q->bindValue(':first_name', $first_name);
    $q->bindValue(':id_user', $id_user);
    return $q->execute();
}

function users_update_mail(PDO $pdo, string $mail, string $id_user){
    $sql = 'UPDATE users SET `mail` = :mail, `update_at` = current_timestamp() WHERE id_user = :id_user';
    $q = $pdo->prepare($sql);
    $q->bindValue(':mail', $mail);
    $q->bindValue(':id_user', $id_user);
    return $q->execute();
}

function users_update_password(PDO $pdo, string $password, string $id_user){
    $sql = 'UPDATE users SET `password` = :password, `update_at` = current_timestamp() WHERE id_user = :id_user';
    $q = $pdo->prepare($sql);
    $q->bindValue(':password', $password);
    $q->bindValue(':id_user', $id_user);
    return $q->execute();
}

function users_update_is_admin(PDO $pdo, string $is_admin, string $id_user){
    $sql = 'UPDATE users SET `is_admin` = :is_admin, `update_at` = current_timestamp() WHERE id_user = :id_user';
    $q = $pdo->prepare($sql);
    $q->bindValue(':is_admin', $is_admin);
    $q->bindValue(':id_user', $id_user);
    return $q->execute();
}

function users_update_various(PDO $pdo, string $various, string $id_user){
    $sql = 'UPDATE users SET `various` = :various, `update_at` = current_timestamp() WHERE id_user = :id_user';
    $q = $pdo->prepare($sql);
    $q->bindValue(':various', $various);
    $q->bindValue(':id_user', $id_user);
    return $q->execute();
}

function users_update_picture(PDO $pdo, $picture, $id_user){
    $sql = 'UPDATE users SET `picture` = :picture, `update_at` = current_timestamp() WHERE id_user = :id_user';
    $q = $pdo->prepare($sql);
    $q->bindValue(':picture', $picture);
    $q->bindValue(':id_user', $id_user);
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
            $chemin = "public/asset/img/users/" . $image['name'];
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

/* '{ ["picture"]=> array(6) { ["name"]=> string(25) "babouche_a_vectoriser.png" ["full_path"]=> string(25) "babouche_a_vectoriser.png" ["type"]=> string(9) "image/png" ["tmp_name"]=> string(60) "/home/clients/5651b8c6daf1e874a0c30721767bd935/tmp/php66ktXE" ["error"]=> int(0) ["size"]=> int(42598) } }'; */