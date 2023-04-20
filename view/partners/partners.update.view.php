<?php

$title = "Modifier un partenaire";

ob_start(); ?>

<div class="container h-100">
    <div class="row col-md-10 h-100 mx-auto ">
        <p class="col-md-10 fst-italic fw-bold mb-5 pb-5">Modifier un partenaire</p>

        
        <form action="index.php?controller=partners&action=create" method="post">
           
                <div class="lb_inp 1">
                    <label for="responsible_name"> Nom </label><br>
                    <input type="text" name="responsible_name" id="responsible_name" class="rounded w-100" value="<?=htmlspecialchars($partners['responsible_name'] )?>">
                </div><br>
                <div class="lb_inp 2">
                    <label for="responsible_first_name"> Prénom </label><br>
                    <input type="text" name="responsible_first_name" id="responsible_first_name" class="rounded w-100" value="<?=htmlspecialchars($partners['responsible_first_name'] )?>">
                </div><br>
                <div class="lb_inp 3">
                    <label for="mail"> Mail </label><br>
                    <input type="email" name="mail" id="mail" class="rounded w-100" value="<?=htmlspecialchars($partners['mail'] )?>">
                </div><br>
                <div class="lb_inp 4">
                    <label for="phone"> Téléphonne </label><br>
                    <input type="text" name="phone" id="phone" class="rounded w-100" value="<?=htmlspecialchars($partners['phone'] )?>">
                </div><br>
                <div class="lb_inp 5">
                    <label for="social_reason"> Raison sociale </label><br>
                    <input type="text" name="social_reason" id="social_reason" class="rounded w-100" value="<?=htmlspecialchars($partners['social_reason'] )?>">
                </div><br>

                <div class="d-grid gap-2 col-5 mx-auto">
                <input class="btn btn-info" type="submit" value="Ajouter">
            </div>
        </form>
    </div>
</div>


<?php
$content = ob_get_clean();
require ROOT . '/view/template/template.view.php';