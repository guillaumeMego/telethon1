<?php

$title = "Ajouter un utilisateurs";

ob_start(); ?>

<div class="container h-100">
    <div class="row col-md-10 h-100 mx-auto ">
    <h3 style="font-family: PT Serif; font-weight: bold; font-style: italic; font-size: 22px;">
    Ajouter un utilisateurs</h3>

        
        <form action="index.php?controller=users&action=create" method="post" class="form-control border-0" enctype="multipart/form-data">
           
                <div class="lb_inp 1">
                    <label for="name" class="form-label"> Nom </label><br>
                    <input type="text" name="name" id="name" class="form-control">
                </div><br>
                <div class="lb_inp 2">
                    <label for="first_name" class="form-label"> Prénom </label><br>
                    <input type="text" name="first_name" id="first_name" class="form-control">
                </div><br>
                <div class="lb_inp 3">
                    <label for="mail" class="form-label"> Mail </label><br>
                    <input type="email" name="mail" id="mail" class="form-control">
                </div><br>
                <div class="lb_inp 4">
                    <label for="password" class="form-label"> Mot de passe </label><br>
                    <input type="password" name="password" id="password" class="form-control">
                </div><br>
                <div class="lb_inp 5">
                <label for="is_admin" class="form-check-label"> Administrateur </label><br>
                <input type="checkbox" name="is_admin" id="is_admin" class="form-check-input">
                </div><br>
                <div class="lb_inp 6">
                    <label for="various" class="form-label"> Divers </label><br>
                    <input type="text" name="various" id="various" class="form-control">
                </div><br>
                <div class="lb_inp 7" class="form-label">
                    <label for="picture"> Photo de profil </label><br>
                    <input type="file" name="picture" id="picture" class="form-control">
                </div><br>
                <div class="d-grid gap-2 col-5 mx-auto">
                <input class="btn btn-sm btn-info text-white my-4" type="submit" value="Ajouter">
            </div>
        </form>
    </div>
</div>


<?php
$content = ob_get_clean();
require ROOT . '/view/template/template.view.php';