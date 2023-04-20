<?php

$title = "Ajouter un stand";

ob_start(); ?>

<div class="container h-100">
    <div class="row col-md-10 h-100 mx-auto ">
        <p class="col-md-10 fst-italic fw-bold mb-5 pb-5">Ajouter un stand</p>

        
        <form action="index.php?controller=stands&action=create" method="post">
           
                <div class="lb_inp 1">
                    <label for="name"> Nom </label><br>
                    <input type="text" name="name" id="name" class="rounded w-100">
                </div><br>
                <div class="lb_inp 2">
                    <label for="place"> Lieu </label><br>
                    <input type="text" name="place" id="place" class="rounded w-100">
                </div><br>
                <div class="lb_inp 3">
                    <label for="various"> Divers </label><br>
                    <input type="text" name="various" id="various" class="rounded w-100">
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