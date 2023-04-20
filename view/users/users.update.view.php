<?php

$title = "Modifier un utilisateur";

ob_start(); ?>

<div class="container h-100">
    <div class="row col-md-10 h-100 mx-auto">
        <p class="col-md-10 fst-italic fw-bold">Modifier un utilisateur</p>

        
        <form action="index.php?controller=users&action=update&id=<?= $_GET['id'] ?>" method="post" class="form-control border-0">
           
                <div class="lb_inp 1">
                    <label for="name" class="form-label"> Nom </label><br>
                    <input type="text" name="name" id="name" class="form-control" value="<?=htmlspecialchars($users['name']) ?>">
                </div><br>
                <div class="lb_inp 2">
                    <label for="first_name" class="form-label"> Prénom </label><br>
                    <input type="text" name="first_name" id="first_name" class="form-control" value="<?=htmlspecialchars($users['first_name'] )?>">
                </div><br>
                <div class="lb_inp 3">
                    <label for="mail" class="form-label"> Mail </label><br>
                    <input type="mail" name="mail" id="mail" class="form-control" value="<?=htmlspecialchars($users['mail']) ?>">
                </div><br>
                <div class="lb_inp 4">
                    <label for="password" class="form-label"> Mot de passe </label><br>
                    <input type="password" name="password" id="password" class="form-control">
                </div><br>
                <div class="lb_inp 5">
                <label for="is_admin"> Administrateur </label><br>
                <?php if($users['is_admin'] == 1) { ?>
                    <input type="checkbox" name="is_admin" id="is_admin" class="form-check-input" checked>
                <?php } else { ?>
                <input type="checkbox" name="is_admin" id="is_admin" class="form-check-input">
                <?php } ?>
                </div><br>
                <div class="lb_inp 6">
                    <label for="various" class="form-label"> Divers </label><br>
                    <input type="text" name="various" id="various" class="form-control" value="<?=$users['various'] ?>">
                </div><br>
                <div class="lb_inp 7">
                    <label for="picture" class="form-label"> Photo de profil </label><br>
                    <input type="file" name="picture" id="picture" class="form-control" value="<?=$users['picture'] ?>">
                </div><br>
                <div class="d-grid gap-2 col-5 mx-auto">
                <input class="btn btn-info text-white" type="submit" value="Modifier">
            </div>
        </form>
    </div>
</div>

<?php
$content = ob_get_clean();
require ROOT . '/view/template/template.view.php';