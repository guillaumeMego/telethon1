<?php

$title = "Modifier un partenaire";

ob_start(); ?>

<div class="container h-100">
    <div class="row col-md-10 h-100 mx-auto ">
        <p class="col-md-10 fst-italic fw-bold">Modifier un partenaire</p>

        
        <form action="index.php?controller=partners&action=create" method="post" class="form-control border-0">
           
                <div class="lb_inp 1">
                    <label for="responsible_name" class="form-label"> Nom </label><br>
                    <input type="text" name="responsible_name" id="responsible_name" class="form-control" value="<?=$partners['responsible_name'] ?>">
                </div><br>
                <div class="lb_inp 2">
                    <label for="responsible_first_name" class="form-label"> Prénom </label><br>
                    <input type="text" name="responsible_first_name" id="responsible_first_name" class="form-control" value="<?=$partners['responsible_first_name'] ?>">
                </div><br>
                <div class="lb_inp 3">
                    <label for="mail" class="form-label"> Mail </label><br>
                    <input type="email" name="mail" id="mail" class="form-control" value="<?=$partners['mail'] ?>">
                </div><br>
                <div class="lb_inp 4">
                    <label for="phone" class="form-label"> Téléphonne </label><br>
                    <input type="text" name="phone" id="phone" class="form-control" value="<?=$partners['phone'] ?>">
                </div><br>
                <div class="lb_inp 5">
                    <label for="social_reason" class="form-label"> Raison sociale </label><br>
                    <input type="text" name="social_reason" id="social_reason" class="form-control" value="<?=$partners['social_reason'] ?>">
                </div><br>
                <div class="lb_inp 6">
                    <label for="logo" class="form-label"> Logo </label><br>
                    <input type="file" name="logo" id="logo" class="form-control" value="<?=$partners['logo'] ?>">
                    <div class="lb_inp 7">
                <label for="id_partnership" class="form-label">Catégorie</label><br>
                <select name="id_partnership" id="id_partnership"class="form-select">>
                <?php foreach ($partnerships as $partnership): ?>
                    <option value="<?= $partnership['id_partnership']?>" ><?= $partnership['partnership_user'] ?></option>
                <?php endforeach ?>
            </select>
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