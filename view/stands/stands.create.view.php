<?php

$title = "Ajouter un stand";

ob_start(); ?>

<div class="container h-100">
    <div class="row col-md-10 h-100 mx-auto ">
    <h3 style="font-family: PT Serif; font-weight: bold; font-style: italic; font-size: 22px;">
    Ajouter un stand</h3>

        
        <form action="index.php?controller=stands&action=create" method="post" class="form-control border-0">
           
                <div class="lb_inp 1">
                    <label for="name" class="form-label"> Nom </label><br>
                    <input type="text" name="name" id="name" class="form-control">
                </div><br>
                <div class="lb_inp 2">
                    <label for="place" class="form-label"> Lieu </label><br>
                    <input type="text" name="place" id="place" class="form-control">
                </div><br>
                <div class="lb_inp 3">
                    <label for="various" class="form-label"> Divers </label><br>
                    <input type="text" name="various" id="various" class="form-control">
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