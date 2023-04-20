<?php

$title = "Ajouter un partenaire";

ob_start(); ?>

<div class="container h-100">
    <div class="row col-md-10 h-100 mx-auto ">
        <p class="col-md-10 fst-italic fw-bold mb-5 pb-5">Ajouter un partenaire</p>

        
        <form action="index.php?controller=partners&action=create" method="post">
           
                <div class="lb_inp 1">
                    <label for="responsible_name"> Nom </label><br>
                    <input type="text" name="responsible_name" id="responsible_name" class="rounded w-100">
                </div><br>
                <div class="lb_inp 2">
                    <label for="responsible_first_name"> Prénom </label><br>
                    <input type="text" name="responsible_first_name" id="responsible_first_name" class="rounded w-100">
                </div><br>
                <div class="lb_inp 3">
                    <label for="mail"> Mail </label><br>
                    <input type="email" name="mail" id="mail" class="rounded w-100">
                </div><br>
                <div class="lb_inp 4">
                    <label for="phone"> Téléphonne </label><br>
                    <input type="text" name="phone" id="phone" class="rounded w-100">
                </div><br>
                <div class="lb_inp 5">
                    <label for="social_reason"> Raison sociale </label><br>
                    <input type="text" name="social_reason" id="social_reason" class="rounded w-100">
                </div><br>
                <div class="lb_inp 6">
                    <label for="logo"> Logo </label><br>
                    <input type="file" name="logo" id="logo" class="rounded w-100">
                </div><br>
                <div class="lb_inp 7">
                <label for="id_partnership">Catégorie</label><br>
                <select name="id_partnership" id="id_partnership"class="form-select">>
                <?php foreach ($partners as $partner): ?>
                    <option value="<?= $partner['id_partnership']?>" ><?= $partner['partnership_user'] ?></option>
                <?php endforeach ?>
            </select>
                </div><br>
                <div class="d-grid gap-2 col-5 mx-auto">
                <input class="btn btn-info text-white" type="submit" value="Ajouter">
            </div>
        </form>
    </div>
</div>


<?php
$content = ob_get_clean();
require ROOT . '/view/template/template.view.php';