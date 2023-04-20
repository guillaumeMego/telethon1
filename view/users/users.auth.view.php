<?php

$title = 'Connection';

ob_start();

?>

<div class="container mt-5">
    <div class="row">
        <div class="col-12 offset-md-2 col-md-8">
            <form action="index.php?controller=profil&action=auth" class="form-control p-4 mx-auto border-0" method="post">
                <?php if (isset($_SESSION['msg'])) : ?>
                    <div class="bg-<?= $_SESSION['msg']['css'] ?> p-2 text-center">
                        <?= $_SESSION['msg']['txt'] ?>
                    </div>
                <?php unset($_SESSION['msg']);
                endif; ?>
                <h2 class="text-center fw-bolder">Connexion</h2>
                <div class="fields">
                    <div class="field">
                        <label for="mail">Mail</label><br>
                        <input type="mail" name="mail" id="mail" class="form-control">
                    </div><br>
                    <div class="field">
                        <label for="password">Mot de passe</label><br>
                        <input type="password" name="password" id="password" class="form-control">
                    </div><br>
                    <div class="field d-flex flex-column align-items-center">
                        <input class="btn btn-info text-white btn-lg" type="submit" value="Se connecter">
                        <a href="">Mot de passe oublié</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
require ROOT . '/view/template/connect.template.php';
?>