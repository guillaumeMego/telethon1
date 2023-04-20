<?php 

$title = 'Connection';
?>

<form action="index.php?controller=profil&action=auth" class="form-control p-4 mx-auto w-25" method="post">
<?php if(isset($_SESSION['msg'])) : ?>
        <div class="bg-<?= $_SESSION['msg']['css'] ?> p-2 text-center">
            <?= $_SESSION['msg']['txt'] ?>
        </div>
    <?php unset($_SESSION['msg']); endif; ?>
<h2 class="display-6 text-center">Connexion</h2>
    <div class="fields">
        <div class="field">
            <label for="mail">Mail</label><br>
            <input type="mail" name="mail" id="mail" class="form-control">
        </div><br>
        <div class="field">
            <label for="password">Mot de passe</label><br>
            <input type="password" name="password" id="password" class="form-control">
        </div><br>
        <div class="field">
            <input class="btn btn-info text-white" type="submit" value="Se connecter">
        </div>
    </div>
</form>

<?php 
$content =ob_get_clean();
require ROOT . '/view/template/connect.template.php';
?>